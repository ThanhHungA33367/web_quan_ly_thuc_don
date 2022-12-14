<?php

namespace App\Http\Controllers;

use App\Models\Dish;
?>


<form id="form_add_ingredient" enctype= 'multipart/form-data'>
    @csrf
    <div class="form-group mb-3">
        <label for="simpleinput">Tên món ăn</label>
        <input type="text" class="form-control" value="{{$object->name}}" readonly>
    </div>

    <?php  $a = 1 ?>

    <div class="form-group mt-3">
        <label for="example-email">Thành phần món ăn</label>

        <input type="hidden" name="dish_id[]" value="{{$object->id}}">
        <input type="hidden" name="id_dish" value="{{$object->id}}">
        <label>
            <select id="provinces"  class="custom-select">
                <option selected disabled>Chọn nhóm</option>
                @foreach($ingredient1 as $each)
                    <option value="{{$each->id}}">{{$each->name}}</option>
                @endforeach
            </select>
        </label>

    @for($i = 0; $i < $a ; $i++)
    </div>
    <div id="selectIngredient"></div>
    @endfor
    <div id="receive_data"></div>


    <button class="btn btn-info " style="margin-top: 100px; margin-left: 120px" id ='add_ingredient'>Thêm</button>
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
                alert('Updated completed.');
                $("#receive_data").html(res);
            },
            error: function (data) {
                // Android.passParams(url);
            }
        });
    })


</script>
