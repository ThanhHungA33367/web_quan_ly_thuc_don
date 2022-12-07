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

    <div class="form-group mb-3">
        <label for="example-email">Kalo/Day</label>
        <input type="text" name="kalo_day"  class="form-control" value="{{$object->kalo_day}}" >
    </div>
    <label for="example-email">Nhóm thực phẩm</label>
    <select class="custom-select mb-3" name="ingredient_type_id">

        @foreach($ingredient_type_data as $each)
            <option value="{{$each->id}}" {{ ( $each->id === $object->ingredient_type_id) ? 'selected' : '' }}>
                {{$each->name}}
            </option>
        @endforeach
    </select>

    <button class="btn btn-info" >Sửa</button>

</form>
