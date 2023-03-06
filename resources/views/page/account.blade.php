@extends('layout.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thông tin tài khoản</div>
                <div class="card-body">
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Tên người dùng:</strong> {{ $user->full_name }}</p>
                    @if(Auth::user()->status !== 0)
                    <p><strong>Tên trường:</strong> {{ $user->school_name }}</p>
                    @endif
                    <p><strong>Số điện thoại:</strong> {{ $user->phone }}</p>
                    <p><strong>Loại người dùng:</strong> {{ $role }}</p>
                </div>
                <hr>

                <div class="row">
                    <button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#changePasswordModal">
                        Thay đổi mật khẩu
                    </button>
                    @include('page.modal-change-password')  
                    <button  type="button" id="mediumButton"  onclick="Edit({{$user->id}})" class="btn btn-xs btn-info ">
                        Thay đổi thông tin
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
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
    function Edit(id){
            $.ajax({
                url: `/my-account/edit/${id}`,
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
</script>

@endsection