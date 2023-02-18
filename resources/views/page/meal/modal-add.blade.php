<?php
namespace App\Http\Controllers;
use App\Models\Meal;
?>
<form action = '{{route('meal.store')}}'  method = 'post' >
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
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Mô tả</label>
        <input type="text" name="description"  class="form-control" >
    </div>
    <button class="btn btn-info" >Thêm</button>

</form>