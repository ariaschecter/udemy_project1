@extends('admin.admin_master')
@section('admin')

<div class="page-content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <center>
            <img class="rounded-circle avatar-xl mt-3" src="{{ asset('upload/admin_images/'. $user->profile_image) }}" alt="Card image cap">
          </center>
            <div class="card-body">
                <h4 class="card-title">Name : {{ $user->name }}</h4> <hr>
                <h4 class="card-title">Username : {{ $user->username }}</h4> <hr>
                <h4 class="card-title">Email : {{ $user->email }}</h4> <hr>
              <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light"> Edit Profile</a>
            </div>
        </div>
      </div>
  </div>

  </div>
</div>

@endsection
