<?php
namespace App\Http\Controllers;
use App\Models\Dish;
?>
<form action = '{{route('dish.store')}}'  method = 'post' >
    @csrf
    @if (count($errors) >0)
    <ul>
        @foreach($errors->all() as $error)
            <li class="text-danger"> {{ $error }}</li>
        @endforeach
    </ul>
    @endif
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
        <label for="example-email">Nhóm trẻ</label>
        <select class="custom-select mb-3" name="children_type_id">
            @foreach($children_type_data as $each)
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

