<?php
namespace App\Http\Controllers;
use App\Models\Dish_Type;
?>
<form action = '{{route('ingredient.update',$object->id)}}'  method="post" enctype="multipart/form-data">
    @csrf

    @method('put')
    <div class="form-group mb-3">
        <label for="simpleinput">Tên</label>
        <input type="text" name="name" class="form-control" value="{{$object->name}}">
    </div>

    <label for="example-email">Nhóm thực phẩm</label>
    <select class="custom-select mb-3" name="ingredient_type_id">

        @foreach($ingredient_type_data as $each)
            <option value="{{$each->id}}" {{ ( $each->id === $object->ingredient_type_id) ? 'selected' : '' }}>
                {{$each->name}}
            </option>
        @endforeach
    </select>

    <div class="form-group mb-3">
        <label for="example-password">Kalo trên 100g</label>
        <input type="text" name="kalo_day" class="form-control" value="{{$object->kalo_day}}">
    </div>

    <div class="form-group mb-3">
        <label for="example-password">Chất đạm trên 100g</label>
        <input type="text" name="protein" class="form-control" value="{{$object->protein}}">
    </div>

    <div class="form-group mb-3">
        <label for="example-password">Chất béo trên 100g</label>
        <input type="text" name="lipid" class="form-control" value="{{$object->lipid}}">
    </div>

    <div class="form-group mb-3">
        <label for="example-password">Tinh bột trên 100g</label>
        <input type="text" name="carb" class="form-control" value="{{$object->carb}}">
    </div>

    <div class="form-group mb-3">
        <label for="example-password">Giá tiền trên 100g</label>
        <input type="text" name="cost" class="form-control" value="{{$object->cost}}">
    </div>

    <button class="btn btn-info" >Sửa</button>

</form>
