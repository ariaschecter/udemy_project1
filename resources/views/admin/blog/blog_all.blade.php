@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Blogs</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Blogs Data</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Blog Category</th>
                                    <th>Blog Title</th>
                                    <th>Blog Tags</th>
                                    <th>Blog Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $blog->blog_category_id }}</td>
                                        <td>{{ $blog->blog_title }}</td>
                                        <td>{{ $blog->blog_tags }}</td>
                                        <td><img src="{{ asset($blog->blog_image) }}" alt="blog Image" style="width: 50px; height: 50px"></td>
                                        <td>
                                            <a href="{{ route('edit.blog', $blog->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('delete.multi.image', $blog->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>
@endsection
