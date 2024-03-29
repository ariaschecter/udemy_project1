@extends('admin.admin_master')
@section('admin')

<div class="page-content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">

                <h4 class="card-title">Change Password Page </h4>

                @if(count($errors))
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger alert-dismissable fade show">{{ $error }}</p>
                    @endforeach
                @endif

                <form method="post" action="{{ route('change.password') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="oldPassword" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                            <input name="oldPassword" class="form-control" type="password" value=""  id="oldPassword">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                            <input name="password" class="form-control" type="password" value=""  id="password">
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row mb-3">
                        <label for="passwordConfirmation" class="col-sm-2 col-form-label">Password Confirmation</label>
                        <div class="col-sm-10">
                            <input name="passwordConfirmation" class="form-control" type="password" value=""  id="passwordConfirmation">
                        </div>
                    </div>
                    <!-- end row -->

                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
                  </form>



              </div>
          </div>

  </div>
</div>

@endsection
