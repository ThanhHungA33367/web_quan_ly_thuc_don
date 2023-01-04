<?php
namespace App\Http\Controllers;
use App\Models\Dish;
?>
<form>
    @csrf
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

    <label for="example-email">Nhóm trẻ</label>
    <select class="custom-select mb-3" name="children_type_id">

        @foreach($children_type_data as $each1)
            <option value="{{$each1->id}}" {{ ( $each1->id === $object->children_type_id) ? 'selected' : '' }}>
                {{$each1->name}}
            </option>
        @endforeach
    </select>
    <div class="form-group mb-3">
        <label for="example-email">Mô tả</label>
        <input type="text" name="description"  class="form-control" value="{{$object->description}}">
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Hàm lượng kalo</label>
        <input type="text" name="kalo"  class="form-control" value="{{$object->kalo}}">
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Hàm lượng chất đạm</label>
        <input type="text" name="protein"  class="form-control" value="{{$object->protein}}">
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Hàm lượng chất béo</label>
        <input type="text" name="lipid"  class="form-control" value="{{$object->lipid}}">
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Hàm lượng tinh bột</label>
        <input type="text" name="carb"  class="form-control" value="{{$object->carb}}">
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Giá tiền</label>
        <input type="text" name="cost"  class="form-control" value="{{$object->cost}}">
    </div>
</form>    