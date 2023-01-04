<?php

namespace App\Http\Controllers;

use App\Models\Children_Type;
?>
<form action='{{route('children_type.store')}}' method='post'>
    @csrf
    <div class="form-group mb-3">
        <label for="simpleinput">Tên</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Mô tả</label>
        <input type="text" name="description" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="example-password">Kalo trong một ngày</label>
        <input type="text" name="kalo_day" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label for="example-password">Chất đậm trong một ngày</label>
        <input type="text" name="protein" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="example-password">Chất béo trong một ngày</label>
        <input type="text" name="lipid" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="example-password">Tinh bột trong một ngày</label>
        <input type="text" name="carb" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="example-password">Số tiền ăn một ngày</label>
        <input type="text" name="cost" class="form-control">
    </div>

    <button class="btn btn-info">Thêm</button>

</form>