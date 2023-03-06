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
                    <th>Email</th>
                    <th>Tên</th>
                    <th>Trường</th>
                    <th>Số điện thoại</th>
                    <th></th>
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
                            {{ $each->email }}
                        </td>
                        <td>
                            {{ $each->full_name }}
                        </td>
                        <td>
                            {{ $each->school_name }}
                        </td>
                        <td>
                            {{ $each->phone }}
                        </td>
                        
                        @if ($each->status !== 0)
                        <td id="user">    
                            Normal user
                        </td>
                        <td width = 150 style="text-align: center">
                            <button  id="mediumButton"  onclick="Change({{$each->id}},this)" class="btn btn-xs btn-info ">Nâng quyền</button>
                        </td>
                       
                        @endif
                        @if ($each->status === 0)
                        <td>
                            Admin
                        </td>
                        @endif
                        
                    </tr>

                @endforeach
            </table>
            {{ $data->links('pagination::bootstrap-4', ['onEachSide' => 3]) }}

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
        // function Add(){
        //     $.ajax({
        //         url: `/user/create`,
        //         method:"get",
        //         data:{

        //         },
        //         beforeSend: function() {
        //             $('#loader').show();
        //         },
        //         // return the result
        //         success: function(res) {
        //             $("#detail").html(res)
        //             $('#mediumModal').modal("show");
        //         },
        //         complete: function() {
        //             $('#loader').hide();
        //         },
        //         error: function(jqXHR, testStatus, error) {
        //             console.log(error);
        //             // alert("Page " + href + " cannot open. Error:" + error);
        //             // $('#loader').hide();
        //         },
        //         timeout: 8000
        //     })
        // }
        // function Edit(id){
        //     $.ajax({
        //         url: `/user/edit/${id}`,
        //         method:"get",
        //         data:{

        //         },
        //         beforeSend: function() {
        //             $('#loader').show();
        //         },
        //         // return the result
        //         success: function(res) {
        //             $("#detail").html(res)
        //             $('#mediumModal').modal("show");
        //         },
        //         complete: function() {
        //             $('#loader').hide();
        //         },
        //         error: function(jqXHR, testStatus, error) {
        //             console.log(error);
        //             // alert("Page " + href + " cannot open. Error:" + error);
        //             // $('#loader').hide();
        //         },
        //         timeout: 8000
        //     })
        // }
        function Change(id,_this){
            $.ajax({
                url: `/user/change`,
                method:"get",
                data:{
                    id:id,
                },
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(res) {
                    var result = confirm("Người dùng sẽ trở thành Admin?");
                    if (result) {
                        //$(_this).closest('tr').remove();
                        $('#user').html('Admin');
                        $(_this).hide();
                        alert('Cập nhật người dùng thành công');
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
