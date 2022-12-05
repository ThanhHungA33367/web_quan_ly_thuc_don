@extends('layout.master')
@section('content')
    <div class='card'>
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
            <button  id="mediumButton"  onclick="Add()" class="btn btn-xs btn-info ">Thêm</button>
            <form class="float-right form-group form-inline">
                <label class="mr-2">Search:</label>
                <input type="search" name="q" value="{{ $search }}" class="form-control">
            </form>

            <table class="table table-bordered ">
                <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Tên bữa ăn</th>
                    <th>Mô tả</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>

                @foreach ($data as $each)
                    <tr>
                        <td>
                            {{ $each->id }}
                        </td>
                        <td>
                            {{ $each->name }}
                        </td>
                        <td>
                            {{ $each->description }}
                        </td>
                        <td width = 150 style="text-align: center">
                            <button  id="mediumButton"  onclick="Edit({{$each->id}})" class="btn btn-xs btn-info ">Sửa</button>
                        </td>
                        <td width = 150 style="text-align: center">
                            <button  id="mediumButton"  onclick="Delete({{$each->id}},this)" class="btn btn-xs btn-danger ">Xóa</button>
                        </td>
                    </tr>
                    

                @endforeach
            </table>

            <div class="modal" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" >
                            <div id="detail">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <script>
        function Add(){
            $.ajax({
                url: `/meal/create`,
                method:"get",
                data:{

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
        function Edit(id){
            $.ajax({
                url: `/meal/edit/${id}`,
                method:"get",
                data:{

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
        function Delete(id,_this){
            $.ajax({
                url: `/meal/delete`,
                method:"get",
                data:{
                    id:id,
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
