<?php

namespace App\Http\Controllers;

use App\Models\Dish;
?>

@section('content')
    <div class='card'>
        @if (count($errors) >0)
        <ul>
            @foreach($errors->all() as $error)
                <li class="text-danger"> {{ $error }}</li>
            @endforeach
        </ul>
    @endif
<form id="form_add_ingredient" enctype= 'multipart/form-data' method = 'post'>
    @csrf
    <div class="form-group mb-3">
        <label for="simpleinput">Tên món ăn</label>
        <input type="text" class="form-control" value="{{$object->name}}" readonly>
    </div>

    <?php  $a = 1 ?>
    <div class="form-group mt-3">
        <label for="example-email"> Nhóm thực phẩm </label>
        <Br>
        <label>
            <select id="provinces"  class="custom-select">
                <option selected disabled>Chọn nhóm</option>
                @foreach($ingredient1 as $each)
                    <option value="{{$each->id}}">{{$each->name}}</option>
                @endforeach
            </select>
        </label>
        </div>
    <div class="form-group mt-3">

        <label for="example-email">Thành phần món ăn</label>
        <input type="hidden" name="dish_id[]" value="{{$object->id}}">
        <input type="hidden" name="id_dish" value="{{$object->id}}">
    @for($i = 0; $i < $a ; $i++)
    </div>

    <div id="selectIngredient"></div>
    @endfor
    <button class="btn btn-info " style="margin-top: 0px; margin-left: 120px" id ='add_ingredient'>Thêm</button>
    <div id="receive_data"></div>

<div id="show">
    <table>
        <tr>
            <th >Thực phẩm</th> &nbsp; &nbsp;
            <th style="padding-left: 50px">Số lượng</th>
            <th style="margin-left: 50px"></th>

        </tr>
        @foreach($object1 as $each)
            <tr style="padding-top: 20px">
                <td>
                    {{$each->ingredients_name}}
                </td>
                <td style="padding-left: 70px";>
                    {{$each->quantity}}
                </td>
                <td>
                    <button class="btn btn-xs btn-danger " style=" margin-left:50px" id="mediumButton"  onclick="Delete1({{$each->id}},{{$each->quantity}},{{$object->id}},{{$each->ingredient_id}},this)" type="button">Xóa</button>
                </td>
                {{-- <td>
                    <button class="btn btn-xs btn-danger " style=" margin-left:50px" id="mediumButton"  onclick="Update1({{$each->id}},this)" type="button">Sửa</button>
                </td> --}}
            </tr>
        @endforeach
    </table>
</div>
</form>

<script>
    $(document).ready(function (){
        $('#provinces').on('change',function() {
            let ingredient_type_Id = $(this).val();
            $.ajax({
                url: `/select/ingredient_type/${ingredient_type_Id}`,
                method:"get",
                beforeSend: function() {
                    $('#loader').show();
                },
                success: function(res) {
                    $('#selectIngredient').html(res);

                },
                complete: function() {
                    $('#loader').hide();
                },
            })
        });
    })
    $('#add_ingredient').on('click',function (e){
        e.preventDefault();
        var form = $('#form_add_ingredient');
        var data = new FormData(form[0]);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: `/dish/store_ingredient_dish`,
            type: 'POST',
            data:data,
            cache: false,
            processData: false,
            contentType : false,
            success: function (res) {
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
        });
    })
    function Delete1(id,quantity,id_dish,id_ingredient,_this){
        var result = confirm("Bạn có chắc muốn xóaaa không?");
        if (result) {
            $.ajax({
                url: `/dish/delete_ingredient`,
                method:"get",
                data:{
                    id:id,
                    quantity:quantity,
                    id_dish:id_dish,
                    id_ingredient:id_ingredient,
                },
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(res) {
                    $(_this).closest('tr').remove();


                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    // alert("Page " + href + " cannot open. Error:" + error);
                    // $('#loader').hide();
                },
                timeout: 8000
            })
        }
    }

    // function Update1(id){
    //     $.ajax({
    //             url: `/dish/edit_dish_ingredient/${id}`,
    //             method:"get",
    //             data:{
    //             },
    //             beforeSend: function() {
    //                 $('#loader').show();
    //             },
    //             // return the result
    //             success: function(res) {
    //                 $("#detail").html(res)
    //                 $('#mediumModal').modal("show");
    //             },
    //             complete: function() {
    //                 $('#loader').hide();
    //             },
    //             error: function(jqXHR, testStatus, error) {
    //                 console.log(error);
    //                 // alert("Page " + href + " cannot open. Error:" + error);
    //                 // $('#loader').hide();
    //             },
    //             timeout: 8000
    //         })
    // }

</script>
