<?php
namespace App\Http\Controllers;
use App\Models\User;
?>
<form action = '{{route('account.update',$object->id)}}'  method="post" enctype="multipart/form-data">
    @csrf
    @if (count($errors) >0)
    <ul>
        @foreach($errors->all() as $error)
            <li class="text-danger"> {{ $error }}</li>
        @endforeach
    </ul>
    @endif
    
    @method('put')
    <div class="form-group mb-3">
        <label for="simpleinput">Email</label>
        <input type="text" name="email" class="form-control" value="{{$object->email}}" required>
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Họ và tên</label>
        <input type="text" name="full_name"  class="form-control" value="{{$object->full_name}}" required>
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Trường</label>
        <input type="text" name="school_name"  class="form-control" value="{{$object->school_name}}" required>
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Số điện thoại</label>
        <input type="text" name="phone"  class="form-control" value="{{$object->phone}}" required>
    </div>

    <button class="btn btn-info" >Sửa</button>

</form>
