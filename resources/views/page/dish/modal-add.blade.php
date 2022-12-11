<?php
namespace App\Http\Controllers;
use App\Models\Dish;
?>
<form action = '{{route('dish.store')}}'  method = 'post' >
    @csrf
    <div class="form-group mb-3">
        <label for="simpleinput">Tên</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Nhóm món ăn</label>

        <select class="custom-select mb-3" name="dish_type_id">
            @foreach($dish_type_data as $each)
                <option value="{{$each->id}}">
                    {{$each->name}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="example-email">Tên bữa ăn</label>
        <select class="custom-select mb-3" name="meal_id">
            @foreach($meal_data as $each)
                <option value="{{$each->id}}">
                    {{$each->name}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="example-email">Mô tả</label>
        <input type="text" name="description"  class="form-control" >
    </div>
    <button class="btn btn-info" >Thêm</button>
</form>

