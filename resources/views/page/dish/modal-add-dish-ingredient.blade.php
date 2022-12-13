<?php

namespace App\Http\Controllers;

use App\Models\Dish;
?>
<form action='{{route('dish.store_ingredient_dish',$object->id)}}' method='post'>
    @csrf

    <div class="form-group mb-3">
        <label for="simpleinput">Tên món ăn</label>
        <input type="text" class="form-control" value="{{$object->name}}" readonly>
    </div>

    <?php $i = 1;
    $a = 1 ?>
    @foreach($ingredient1 as $each1)
    <div class="form-group mt-3">
        <label for="example-email">Thành phần món ăn</label>

        <input type="hidden" name="dish_id[]" value="{{$object->id}}">


        <select class="custom-select " name="ingredient_id[]">

            @foreach($ingredient as $each)
            @if($each->ingredient_type_id === $each1->id )
            @if($a === 1)
            <option selected disabled> Nhóm: {{$each->ingredient_type_name}}</option>
            <?php $a++; ?>
            @endif

            <option value="{{$each->id}}">
                {{$each->name}}
            </option>

            @endif

            @endforeach
            <?php $i++;
            $a = $a - 1 ?>

        </select>
        <div class="form-group mt-3">
            <label for="example-email">Số Lượng</label>
            <input type="text" name="quantity[]" class="form-control">
        </div>
        @endforeach


    </div>

    <button class="btn btn-info mt-5">Thêm</button>
</form>