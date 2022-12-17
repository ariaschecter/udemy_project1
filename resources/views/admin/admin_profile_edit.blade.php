@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">

                <h4 class="card-title">Edit Profile Page </h4>

                <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input name="name" class="form-control" type="text" value="{{ $user->name }}"  id="inputName">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">User Email</label>
                        <div class="col-sm-10">
                            <input name="email" class="form-control" type="email" value="{{ $user->email }}"  id="email" readonly>
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">UserName</label>
                        <div class="col-sm-10">
                            <input name="username" class="form-control" type="text" value="{{ $user->username }}"  id="username">
                        </div>
                    </div>
                    <!-- end row -->


                  <div class="row mb-3">
                      <label for="image" class="col-sm-2 col-form-label">Profile Image </label>
                      <div class="col-sm-10">
                  <input name="profile_image" class="form-control" type="file"  id="image">
                      </div>
                  </div>
                  <!-- end row -->

                    <div class="row mb-3">
                       <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                      <div class="col-sm-10">
                          <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/admin_images/'.$user->profile_image) }}" alt="Card image cap">
                      </div>
                  </div>
                  <!-- end row -->
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">
                  </form>



              </div>
          </div>

  </div>
</div>

<script>
  $(document).ready(function() {
    $('#image').change(function(e) {
      const reader = new FileReader();
      reader.onload = function(e) {
        $('#showImage').attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    })
  })
</script>

@endsection
