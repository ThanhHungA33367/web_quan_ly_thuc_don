<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="{{ route('password.update') }}" id="changePasswordForm">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
              <label for="current_password">Mật khẩu hiện tại</label>
              <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
              @error('current_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group">
              <label for="new_password">Mật khẩu mới</label>
              <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" required>
                @error('new_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
              <label for="new_password_confirmation">Xác nhận mật khẩu</label>
              <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-primary">Xác nhận</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <script>
      $(document).ready(function() {
        // add an event listener to the change password form
        $('#changePasswordForm').submit(function(event) {
            event.preventDefault(); // prevent the form from submitting normally

            // send an AJAX request to update the user's password
            $.ajax({
                type: 'PUT',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    // display a success message
                    $('#changePasswordModal').modal('hide');
                    toastr.success(response.message);
                    // clear the form inputs
                    $('#changePasswordForm')[0].reset();
                },
                error: function(response, data) {
                    toastr.error(response.responseJSON.message);
                    $.each(data.responseJSON.errors, function(key, value) {
                        toastr.error(value);
                    });
                }
            });
        });
    });

      
  </script>