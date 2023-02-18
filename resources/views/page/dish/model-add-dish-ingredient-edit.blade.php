<?php
namespace App\Http\Controllers;
use App\Models\Dish;
?>
<form action = '{{route('edit_dish_ingredient.update',$object->id)}}'  method="post" enctype="multipart/form-data">
    @csrf

    @method('put')
    <div class="form-group mb-3">
        <label for="simpleinput">Thực phẩm</label>
        <input type="text" readonly name="name" class="form-control" value="{{$ingredient->name}}">
    </div>
    <div class="form-group mb-3">
        <label for="simpleinput">Số lượng</label>
        <input type="text" name="quantity" class="form-control" value="{{$object->quantity}}">
    </div>

    <button class="btn btn-info" >Sửa</button>
</form>