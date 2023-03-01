@extends('layout.master')
@section('content')
<div class='card'>
    <div id ='response'></div>
    @if ($errors->any())
    <div class="card-header">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class='card-body'>
        @if(Auth::user()->status !== 1)
        <button id="mediumButton" onclick="Add()" class="btn btn-xs btn-info ">Thêm</button>
        @endif
        <form class="float-right form-group form-inline">
            <label class="mr-2">Search:</label>
            <input type="search" name="q" value="{{ $search }}" class="form-control">
        </form>

        <table class="table table-bordered ">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Nhóm món ăn</th>
                    <th>Nhóm trẻ</th>
                    <th>Mô tả</th>
                    <th></th>
                    @if(Auth::user()->status !== 1)
                    <th></th>
                    <th></th>
                        <th></th>
                    @endif


                </tr>
            </thead>
            <?php $i = 1; ?>
            @foreach ($data as $each)
            <tr>
                <td>
                    {{$i++}}
                </td>
                <td>
                    {{ $each->name }}
                </td>
                <td>
                    {{ $each->dishtypename }}
                </td>
                <td>
                    {{ $each->childrentypename }}
                </td>

                <td>
                    {{ $each->description }}
                </td>
                <td width=150 style="text-align: center">
                    <button id="mediumButton" onclick="Select({{$each->id}})" class="btn btn-xs btn-info ">Xem</button>
                </td>
                @if(Auth::user()->status !== 1)
                <td width=150 style="text-align: center">

                    <button id="mediumButton" onclick="Add_Ingredient({{$each->id}})" class="btn btn-xs btn-info ">Thêm thành phần</button>
                </td>

                <td width=150 style="text-align: center">
                    <button id="mediumButton" onclick="Edit({{$each->id}})" class="btn btn-xs btn-info ">Sửa</button>
                </td>

                <td width=150 style="text-align: center">
                    <button id="mediumButton" onclick="Delete({{$each->id}},this)" class="btn btn-xs btn-danger ">Xóa</button>
                </td>
                @endif


            </tr>

            @endforeach

        </table>
        <div class="modal" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="detail">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
            function Add_Ingredient(id) {
                $('#mediumModal').modal({
                    backdrop: 'static',
                    keyboard: false
                })
                $.ajax({
                    url: `/dish/create_ingredient_dish/${id}`,
                    method: "get",
                    data: {

                    },
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    // return the result
                    success: function(res) {
                        $("#detail").html(res)
                        $('#mediumModal').modal("show");
                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                    error: function(jqXHR, testStatus, error) {
                        console.log(error);
                        // alert("Page " + href + " cannot open. Error:" + error);
                        // $('#loader').hide();
                    },
                    // error :function( data ) {
                    //     if( data.status === 422 ) {
                    //         var errors = $.parseJSON(data.responseText);
                    //         $.each(errors, function (key, value) {
                    //         // console.log(key+ " " +value);
                    //         $('#response').addClass("alert alert-danger");

                    //         if($.isPlainObject(value)) {
                    //             $.each(value, function (key, value) {                           
                    //                 console.log(key+ " " +value);
                    //             $('#response').show().append(value+"<br/>");
                    //             });
                    //         }else{
                    //         $('#response').show().append(value+"<br/>"); //this is my div with messages
                    //         }
                    //     });
                    //     }}
                    timeout: 8000
                })
            }

            function Select(id) {
                $.ajax({
                    url: `/dish/select/${id}`,
                    method: "get",
                    data: {

                    },
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    // return the result
                    success: function(res) {
                        $("#detail").html(res)
                        $('#mediumModal').modal("show");
                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                    error: function(jqXHR, testStatus, error) {
                        console.log(error);
                        // alert("Page " + href + " cannot open. Error:" + error);
                        // $('#loader').hide();
                    },
                    timeout: 8000
                })
            }

            function Add() {
                $.ajax({
                    url: `/dish/create`,
                    method: "get",
                    data: {

                    },
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    // return the result
                    success: function(res) {
                        $("#detail").html(res)
                        $('#mediumModal').modal("show");
                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                    error: function(jqXHR, testStatus, error) {
                        console.log(error);
                        // alert("Page " + href + " cannot open. Error:" + error);
                        // $('#loader').hide();
                    },
                    timeout: 8000
                })
            }

            function Edit(id) {
                $.ajax({
                    url: `/dish/edit/${id}`,
                    method: "get",
                    data: {

                    },
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    // return the result
                    success: function(res) {
                        $("#detail").html(res)
                        $('#mediumModal').modal("show");
                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                    error: function(jqXHR, testStatus, error) {
                        console.log(error);
                        // alert("Page " + href + " cannot open. Error:" + error);
                        // $('#loader').hide();
                    },
                    timeout: 8000
                })
            }

            function Delete(id, _this) {
                $.ajax({
                    url: `/dish_type/delete`,
                    method: "get",
                    data: {
                        id: id,
                    },
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    // return the result
                    success: function(res) {
                        var result = confirm("Bạn có chắc muốn xóa  không?");
                        if (result) {
                            $(_this).closest('tr').remove();

                        }

                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                    error: function(jqXHR, testStatus, error) {
                        console.log(error);
                        // alert("Page " + href + " cannot open. Error:" + error);
                        // $('#loader').hide();
                    },
                    timeout: 8000
                })
            }
        </script>
        @endsection
