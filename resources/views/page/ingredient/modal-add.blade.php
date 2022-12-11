<?php

namespace App\Http\Controllers;

use App\Models\Dish_Type;
?>
<form action='{{route('ingredient.store')}}' method='post'>
    @csrf
    <div class="form-group mb-3">
        <label for="simpleinput">Tên</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Nhóm thực phẩm</label>
        <select class="custom-select mb-3" name="ingredient_type_id">
            @foreach($ingredient_type_data as $each)
            <option value="{{$each->id}}">
                {{$each->name}}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Kalo trên 100g</label>
        <input type="text" name="kalo_day" class="form-control">
    </div>


    <div class="form-group mb-3">
        <label for="example-password">Chất đậm trên 100g</label>
        <input type="text" name="protein" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="example-password">Chất béo trên 100g</label>
        <input type="text" name="lipid" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="example-password">Tinh bột trên 100g</label>
        <input type="text" name="carb" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="example-password">Giá tiền trên 100g</label>
        <input type="text" name="cost" class="form-control">
    </div>



    <div class="form-group mb-3">
        <label for="example-password">Chất đậm trên 100g</label>
        <input type="text" name="protein" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="example-password">Chất béo trên 100g</label>
        <input type="text" name="lipid" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="example-password">Tinh bột trên 100g</label>
        <input type="text" name="carb" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="example-password">Giá tiền trên 100g</label>
        <input type="text" name="cost" class="form-control">
    </div>
    <button class="btn btn-info">Thêm</button>

</form>