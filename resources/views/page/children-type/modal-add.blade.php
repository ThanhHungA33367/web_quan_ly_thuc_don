<?php
namespace App\Http\Controllers;
use App\Models\Children_Type;
?>
<form action = '{{route('children_type.store')}}'  method = 'post' >
    @csrf
    <div class="form-group mb-3">
        <label for="simpleinput">Tên</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Mô tả</label>
        <input type="text" name="description"  class="form-control" >
    </div>

    <div class="form-group mb-3">
        <label for="example-password">Kalo/Ngày</label>
        <input type="text" name="kalo_day" class="form-control" >
    </div>
    <button class="btn btn-info" >Thêm</button>

</form>

