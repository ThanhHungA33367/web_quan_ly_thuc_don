<?php
namespace App\Http\Controllers;
use App\Models\Dish_Type;
?>
<form action = '{{route('ingredient.store')}}'  method = 'post' >
    @csrf
    <div class="form-group mb-3">
        <label for="simpleinput">Tên</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label for="example-email">Kalo/Day</label>
        <input type="text" name="kalo_day"  class="form-control" >
    </div>
    <label for="example-email">Nhóm thực phẩm</label>
    <div class="form-group mb-3">
    <select class="custom-select mb-3" name="ingredient_type_id">
        @foreach($ingredient_type_data as $each)
            <option value="{{$each->id}}">
                {{$each->name}}
            </option>
        @endforeach
    </select>
    </div>


    <button class="btn btn-info" >Thêm</button>

</form>

