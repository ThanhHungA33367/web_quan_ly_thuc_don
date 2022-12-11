<?php
namespace App\Http\Controllers;
use App\Models\Children_Type;
?>
<form action = '{{route('children_type.update',$object->id)}}'  method="post" enctype="multipart/form-data">
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

    <div class="form-group mb-3">
        <label for="example-password">Kalo/Ngày</label>
        <input type="text" name="kalo_day" class="form-control" value="{{$object->kalo_day}}">
    </div>
    <div class="form-group mb-3">
        <label for="example-password">Chất đạm trong một ngày</label>
        <input type="text" name="protein" class="form-control" value="{{$object->protein}}">
    </div>
    <div class="form-group mb-3">
        <label for="example-password">Chất béo trong một ngày</label>
        <input type="text" name="lipid" class="form-control" value="{{$object->lipid}}">
    </div>
    <div class="form-group mb-3">
        <label for="example-password">Tinh bột trong một ngày</label>
        <input type="text" name="carb" class="form-control" value="{{$object->carb}}">
    </div>
    <div class="form-group mb-3">
        <label for="example-password">Số tiền ăn một ngày</label>
        <input type="text" name="cost" class="form-control" value="{{$object->cost}}">
    </div>
    <button class="btn btn-info" >Sửa</button>

</form>
