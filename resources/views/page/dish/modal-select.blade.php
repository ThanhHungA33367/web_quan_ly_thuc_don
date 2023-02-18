<?php
namespace App\Http\Controllers;
use App\Models\Dish;
?>
<form>
    @csrf
    <div class="form-group mb-3">
        <label for="simpleinput">Tên</label>
        <input type="text" name="name" class="form-control" value="{{$object->name}}" readonly>
    </div>
    
    <div class="form-group mb-3">
        <label for="simpleinput">Nhóm món ăn</label>
        <input type="text" name="dish_type" class="form-control" value="{{$dish_type_data->name}}" readonly>
    </div>

    <div class="form-group mb-3">
        <label for="simpleinput">Nhóm trẻ</label>
        <input type="text" name="children_type" class="form-control" value="{{$children_type_data->name}}" readonly>
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Mô tả</label>
        <input type="text" name="description"  class="form-control" value="{{$object->description}}" readonly>
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Hàm lượng kalo</label>
        <input type="text" name="kalo"  class="form-control" value="{{$object->kalo}}" readonly>
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Hàm lượng chất đạm</label>
        <input type="text" name="protein"  class="form-control" value="{{$object->protein}}" readonly>
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Hàm lượng chất béo</label>
        <input type="text" name="lipid"  class="form-control" value="{{$object->lipid}}" readonly>
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Hàm lượng tinh bột</label>
        <input type="text" name="carb"  class="form-control" value="{{$object->carb}}" readonly>
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Giá tiền</label>
        <input type="text" name="cost"  class="form-control" value="{{$object->cost}}" readonly>
    </div>
</form>
