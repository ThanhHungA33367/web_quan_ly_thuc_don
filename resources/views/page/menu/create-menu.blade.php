@extends('layout.master')
@section('content')
<div class='card-body'>

    
    <form id="form_add_menu">
        @csrf
        <div id ="response"></div>
        <div class="form-group mb-3">
            <label for="simpleinput">Tên thực đơn</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="simpleinput">Ngày</label>
            <input type="date" name="menu_date" class="form-control" min="{{date("Y-m-d")}}">
        </div>
        <div class="form-group mb-3">
            <label for="simpleinput">Nhóm trẻ</label>
            <select class="custom-select mb-3" name="children_type_id" id="children_type_change">
                <option selected disabled> Chọn nhóm trẻ</option>
                @foreach($children_type as $each)
                <option value="{{$each->id}}"> {{$each->name}} </option>
                @endforeach
            </select>

        </div>
        <div class="input-fields" id="input-fields">

        </div>
        <div class="form-group mb-3">
            <label for="example-email">Mô tả</label>
            <input type="text" name="description" class="form-control">
        </div>
        <button class="btn btn-info" id="add_menu" type="button">Thêm</button>
    </form>
</div>

<script>
    $('.dynamic-ar').on('click', (function(e) {
        let meal_id = e.target.getAttribute('data')
        e.preventDefault();
        let element = e.target
        var more_fields = `
   
             <select class="custom-select mb-3 select_dish_type" name="dish_id[]"  value="" data="${meal_id}">
                <option selected disabled> Chọn món</option>
                @isset($dish1)
                @foreach($dish1 as $each2)
                <option value="{{$each2->id}}">{{$each2->name}}</option>
                @endforeach
                @endisset
            </select>
       
        
            `;

        let div = document.createElement('div')
        div.innerHTML = more_fields
        element.parentElement.querySelector(".meal").appendChild(div);
        BindOnchange();
    }));


    function BindOnchange() {
        $('.select_dish_type').on('change', function(event) {
            let dish_type_id = $(this).val();
            let element = event.target
            console.log(dish_type_id);

        });
    }


    $(document).ready(BindOnchange);

    $('#add_menu').on('click', function(e) {
        e.preventDefault();
        var form = $('#form_add_menu');
        var data = new FormData(form[0]);

        let nodeList = document.getElementsByClassName('select_dish_type')
        let array = []
        for (let i = 0; i < nodeList.length; i++) {
            const node = nodeList[i];
            let value = node.value
            let meal_id = node.getAttribute('data')
            array.push({
                dish_id: value,
                meal_id: meal_id
            })
        }

        data.append('mealdish', JSON.stringify(array))

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: `/create_menu/store`,
            type: 'POST',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res) {
                $("#show").hide();
                alert('Updated completed.');
                $("#receive_data").html(res);
            },
            error :function( data ) {
                if( data.status === 422 ) {
                var errors = $.parseJSON(data.responseText);
                $.each(errors, function (key, value) {
                // console.log(key+ " " +value);
                $('#response').addClass("alert alert-danger");

                if($.isPlainObject(value)) {
                    $.each(value, function (key, value) {                       
                        console.log(key+ " " +value);
                    $('#response').show().append(value+"<br/>");

                    });
                }else{
                $('#response').show().append(value+"<br/>"); //this is my div with messages
                }
            });
          }}
        }),
    $(document).ready(function() {
        $('#children_type_change').on('change', function() {
            let children_type_id = $(this).val();
            $.ajax({
                url: `/create_menu/send/${children_type_id}`,
                method: "get",
                beforeSend: function() {
                    $('#loader').show();
                },
                success: function(res) {
                    $("#input-fields").html(res);
                },
                complete: function() {
                    $('#loader').hide();
                },
            })
        });
    })
})
</script>
@endsection