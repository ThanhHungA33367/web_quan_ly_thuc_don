<?php
namespace App\Http\Controllers;
use App\Models\Dish_Type;
?>
<form action = '{{route('dish_type.update',$object->id)}}'  method="post" enctype="multipart/form-data">
    @csrf

    @method('put')
    <div class="form-group mb-3">
        <label for="simpleinput">Tên</label>
        <input type="text" name="name" class="form-control" value="{{$object->name}}">
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Mô tả</label>
        <input type="text" name="description"  class="form-control" value="{{$object->description}}">
    </div>

    <button class="btn btn-info" >Sửa</button>

</form>
