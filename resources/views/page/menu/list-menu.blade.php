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
                    <th>Nhóm trẻ</th>
                    <th>Ngày</th>
                    <th>Kalo</th>
                    <th>Chất đạm</th>
                    <th>Chất béo</th>
                    <th>Tinh bột</th>
                    <th>Giá tiền</th>
                    <th></th>
                </tr>
                </thead>
                <?php  $i = 1;?>
                @foreach ($data as $each)
                    <tr>
                        <td>
                            {{$i++}}
                        </td>
                        <td>
                            {{ $each->name }}
                        </td>
                        <td>
                            {{ $each->description }}
                        </td>
                        <td>
                            {{ $each->children_type_name }}
                        </td>
                        <td>
                            {{ $each->menu_date }}
                        </td>
                        <td>
                            {{ $each->kalo}}
                        </td>
                        <td>
                            {{ $each->protein }}
                        </td>
                        <td>
                            {{ $each->lipid }}
                        </td>
                        <td>
                            {{ $each->carb }}
                        </td>
                        <td>
                            {{ $each->cost }}
                        </td>
                        <td width=150 style="text-align: center">
                            <button id="mediumButton" onclick="Select({{$each->id}})" class="btn btn-xs btn-info ">Xem</button>
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
        
        function Select(id){
            $.ajax({
                url: `/menu/detail/${id}`,
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
                url: `/menu/delete`,
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
