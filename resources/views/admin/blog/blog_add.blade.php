@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    }
</style>

<div class="page-content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">

                <h4 class="card-title">Add Blog Page </h4>

                <form method="post" action="{{ route('store.blog') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="blog_category_id" class="col-sm-2 col-form-label">Blog Category</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default Select Example" name="blog_category_id" id="blog_category_id">
                                <option selecter>Open this select menu</option>
                                @foreach ($blogCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->blog_category }}</option>
                                @endforeach

                            </select>
                            @error('blog_category_id')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="blog_title" class="col-sm-2 col-form-label">Blog Title</label>
                        <div class="col-sm-10">
                            <input name="blog_title" class="form-control" type="text" value="{{ old('blog_title') }}" id="blog_title">
                            @error('blog_title')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="blog_tags" class="col-sm-2 col-form-label">Blog Tags</label>
                        <div class="col-sm-10">
                            <input name="blog_tags" value="home,tech" class="form-control" type="text" id="blog_tags" data-role="tagsinput">
                            @error('blog_tags')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="blog_description" class="col-sm-2 col-form-label">Blog Description</label>
                        <div class="col-sm-10">
                            <textarea name="blog_description" id="elm1" cols="30" rows="10">{{ old('blog_description') }}</textarea>
                            @error('blog_description')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="blog_image" class="col-sm-2 col-form-label">Blog Image </label>
                        <div class="col-sm-10">
                            <input name="blog_image" class="form-control" type="file"  id="image">
                            @error('blog_image')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                       <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                      <div class="col-sm-10">
                          <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no-image.jpg') }}" alt="Card image cap">
                      </div>
                  </div>
                  <!-- end row -->
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Blog Data">
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
