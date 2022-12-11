<?php
namespace App\Http\Controllers;
use App\Models\Dish;
?>
<form action = '{{route('dish.update',$object->id)}}'  method="post" enctype="multipart/form-data">
    @csrf

    @method('put')
    <div class="form-group mb-3">
        <label for="simpleinput">Tên</label>
        <input type="text" name="name" class="form-control" value="{{$object->name}}">
    </div>
    <div class="form-group mb-3">
        <label for="simpleinput">Tên</label>
        <input type="text" name="name" class="form-control" value="{{$object->name}}">
    </div>

    <label for="example-email">Nhóm món ăn</label>
    <select class="custom-select mb-3" name="dish_type_id">

        @foreach($dish_type_data as $each)
            <option value="{{$each->id}}" {{ ( $each->id === $object->dish_type_id) ? 'selected' : '' }}>
                {{$each->name}}
            </option>
        @endforeach
    </select>
    <label for="example-email">Tên bữa ăn</label>
    <select class="custom-select mb-3" name="meal_id">

        @foreach($meal_data as $each1)
            <option value="{{$each1->id}}" {{ ( $each1->id === $object->meal_id) ? 'selected' : '' }}>
                {{$each1->name}}
            </option>
        @endforeach
    </select>
    <div class="form-group mb-3">
        <label for="example-email">Mô tả</label>
        <input type="text" name="description"  class="form-control" value="{{$object->description}}">
    </div>
    <button class="btn btn-info" >Sửa</button>

</form>
