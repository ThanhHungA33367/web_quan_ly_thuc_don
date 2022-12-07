<?php
namespace App\Http\Controllers;
use App\Models\Ingredient_Type;
?>
<form action = '{{route('ingredient_type.store')}}'  method = 'post' >
    @csrf
    <div class="form-group mb-3">
        <label for="simpleinput">Nhóm thực phẩm</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Mô tả</label>
        <input type="text" name="description"  class="form-control" >
    </div>

    <button class="btn btn-info" >Thêm</button>

</form>

