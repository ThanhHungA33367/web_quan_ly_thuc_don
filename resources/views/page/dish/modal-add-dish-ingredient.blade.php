<?php
namespace App\Http\Controllers;
use App\Models\Dish;
?>
<form action = '{{route('dish.store_ingredient_dish',$object->id)}}'  method = 'post' >
    @csrf




    <div class="form-group mb-3">
        <label for="simpleinput">Tên món ăn</label>
        <input type="text"  class="form-control" value="{{$object->name}}" readonly>
    </div>

    <div class="form-group mt-3">
        <label for="example-email">Thành phần món ăn</label>


            @foreach($ingredient as $each)
            <input type="hidden" name="dish_id[]"  value="{{$object->id}}">
            <select class="custom-select " name="ingredient_id[]">
                <option value="{{$each->id}}">
                    {{$each->name}}
                </option>

            </select>
            <div class="form-group mt-3 ">
                <label for="example-email" >Số lượng</label>
                <input type="text" name="quantity[]" id=""  class="form-control" >
            </div>
            @endforeach

    </div>


    <button class="btn btn-info mt-5" >Thêm</button>
</form>

