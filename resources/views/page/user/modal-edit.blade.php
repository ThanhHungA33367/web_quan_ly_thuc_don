<?php
namespace App\Http\Controllers;
use App\Models\User;
?>
<form action = '{{route('user.update',$object->id)}}'  method="post" enctype="multipart/form-data">
    @csrf

    @method('put')

    <div class="form-group mb-3">
        <label for="example-email">Email</label>
        <input type="text" name="email"  class="form-control" value="{{$object->email}}" readonly>
    </div>

    <div class="form-group mb-3">
        <label for="simpleinput">Mật khẩu</label>
        <input type="text" name="hashed_password" class="form-control" value="{{$object->hashed_password}}">
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Họ và tên</label>
        <input type="text" name="full_name"  class="form-control" value="{{$object->full_name}}">
    </div>

    <div class="form-group mb-3">
        <label for="example-email"> Tên trường</label>
        <input type="text" name="school_name"  class="form-control" value="{{$object->school_name}}">
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Số điện thoại</label>
        <input type="text" name="phone"  class="form-control" value="{{$object->phone}}">
    </div>

    <button class="btn btn-info" >Sửa</button>

</form>