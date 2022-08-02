@extends('frontend.master')
@section('content')
 <!-- Change Password Form Card Starts -->
 <div class="login-form container w-50 mt-5 mb-5">
    <h3>Change Password</h3>
    <!-- Change Password Form Starts -->
    <form action="{{url('/password_updated')}}" class="needs-validation w-85 mx-auto mt-5 font-weight-bold" autocomplete="off" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <input type="hidden" value="{{Auth::user()->id}}" name="id">
      <div class="form-group">
        <label for="oldPassword">Old Password: </label>
        <input type="password" class="form-control" placeholder="******" name="old_pass" id="oldPassword"
          required minlength="6">
        <div class="valid-feedback">
          <i class="far text-success fa-thumbs-up"></i> OK
        </div>
        <div class="invalid-feedback">
          <i class="fas text-danger fa-exclamation-triangle"></i> Some error in old password.
        </div>
      </div>

      <div class="form-group">
        <label for="newPassword">New Password: </label>
        <input type="password" class="form-control" placeholder="******" name="new_pass" id="newPassword"
          aria-describedby="passwordHelp" required minlength="6">
        <small id="passwordHelp" class="form-text text-muted"><i class="fas text-primary fa-info"></i> Password must be at least 6 characters.</small>
        <div class="valid-feedback">
          <i class="far text-success fa-thumbs-up"></i> OK
        </div>
        <div class="invalid-feedback">
          <i class="fas text-danger fa-exclamation-triangle"></i> Some error in password.
        </div>
      </div>

      <div class="form-group">
        <label for="newPassword2">Re-Type New Password: </label>
        <input type="password" class="form-control" placeholder="******" name="con_pass" id="newPassword2"
          aria-describedby="passwordHelp" required minlength="6">
        <small id="passwordHelp" class="form-text text-muted"><i class="fas text-primary fa-info"></i> Re-Type new password.</small>
        <div class="valid-feedback">
          <i class="far text-success fa-thumbs-up"></i> OK
        </div>
        <div class="invalid-feedback">
          <i class="fas text-danger fa-exclamation-triangle"></i> Some error in password.
        </div>
      </div>

      <button type="submit" class="btn btn-warning shadow btn-sm rounded">Update</button>
    </form> <!-- Change Password Form Ends -->
  </div> <!-- Change Password Form Card Ends -->
@endsection
