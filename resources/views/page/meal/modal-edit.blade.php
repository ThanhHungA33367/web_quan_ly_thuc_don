<?php
namespace App\Http\Controllers;
use App\Models\Meal;
?>
<form action = '{{route('meal.update',$object->id)}}'  method="post" enctype="multipart/form-data">
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
        <label for="simpleinput">Tên</label>
        <input type="text" name="name" class="form-control" value="{{$object->name}}">
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Mô tả</label>
        <input type="text" name="description"  class="form-control" value="{{$object->description}}">
    </div>

    <button class="btn btn-info" >Sửa</button>

</form>
