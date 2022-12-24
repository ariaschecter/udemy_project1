@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
    <div class="container-fluid">

        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add Blog Category Page </h4>

                    <form method="post" action="{{ route('store.blog.category') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="blog_category" class="col-sm-2 col-form-label">Blog Category Name</label>
                            <div class="col-sm-10">
                                <input name="blog_category" class="form-control" type="text" value="{{ old('blog_category') }}" id="blog_category">
                                @error('blog_category')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Blog Category">
                    </form>
                </div>
            </div>
    </div>
    </div>
@endsection
