@extends('backend.layouts.master')
@section('content')
    <div class="pan-rhs">
        <div class="row main-head">
            <div class="col-md-6">
                <div class="tit">
                    <h1>Blog and Articles</h1>
                </div>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Appriance</li>
                        <li class="breadcrumb-item active" aria-current="page">Blog and Articles</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-com box-qui box-lig box-tab">
                    <div class="tit">
                        <h3>Blog Categories</h3>
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#addblogcategory">Add new blog category</a></li>
                            </ul>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Posted on</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show_data as $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><span class="hig-blu">{{ $value->name }}</span></td>

                                    <td>{{ $value->created_at->format('d, M Y') }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-toggle="dropdown">
                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#edit-category-{{ $value->id }}">Edit</a></li>
                                            <li><a class="dropdown-item" href="{{ route('admin.blog.category.delete', $value->id) }}">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="edit-category-{{ $value->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                            
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit category</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="form-inp">
                                                    <form action="{{ route('admin.blog.category.update') }}">
                                                        @csrf
                                                        <input type="hidden" value="{{ $value->id }}" name="category_id">
                                                        <div class="edit-pro-parti">
                                                            <div class="form-group">
                                                                <label class="lb">Title:</label>
                                                                <input type="text" class="form-control" placeholder="Enter title*" name="name" value="{{ $value->name }}"
                                                                    required>
                                                            </div>
                            
                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="submit" class="cta-full cta-colr">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addblogcategory">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create new category</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-inp">
                        <form action="{{ route('admin.blog.category.store') }}">
                            @csrf
                            <!--PROFILE BIO-->
                            <div class="edit-pro-parti">
                                <div class="form-group">
                                    <label class="lb">Title:</label>
                                    <input type="text" class="form-control" placeholder="Enter title*" name="name"
                                        required>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="cta-full cta-colr">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
