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
                        <li class="breadcrumb-item active" aria-current="page">Appearance</li>
                        <li class="breadcrumb-item active" aria-current="page">Blog and Articles</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="box-com box-qui box-lig box-tab box-form">
            <div class="tit">
                <h3>Blogs</h3>
                <div class="dropdown">
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.blog.manage') }}">Manage blog posts</a></li>

                    </ul>
                </div>
            </div>

            <div class="form-inp mt-2">
                <form action="{{ route('admin.blog.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--PROFILE BIO-->
                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">    
                    <div class="edit-pro-parti">
                        <div class="form-group">
                            <label class="lb">Title:</label>
                            <input type="text" class="form-control" placeholder="Enter title*" name="title"
                                value="{{ $blog->title }}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="lb">Short Description:</label>
                            <input type="text" class="form-control" placeholder="Enter short description"
                                name="short_description" value="{{ $blog->short_description }}">
                            @error('short_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="lb">Blog photo:</label>
                            <div class="fil-img-uplo">
                                <span class="dumfil">Upload image</span>
                                <input type="file" name="image" accept="image/*,.jpg,.jpeg,.png" id="fileInput">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <img src="{{ asset($blog->image) }}" alt="" class="backend-img">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="lb">Descriptions:</label>
                            <textarea value="{{ $blog->name }}" class="form-control" id="" cols="30" rows="10"
                                name="description">{{ $blog->description }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="lb">Category:</label>
                            <select class="form-select chosen-select" data-placeholder="Select Category" name="category"    >
                                <option value="">Select</option>
                                @foreach ($blog_categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $blog->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="chosenini">
                            <div class="form-group">
                                <label class="lb">Tags:</label>
                                <select class="chosen-select" data-placeholder="Select blog Tags" multiple name="tags[]">
                                    <option></option>
                                    @foreach ($blog_tags as $tag)
                                        <option value="{{ $tag->id }}" {{ in_array($tag->id, $blog->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                @error('tags')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="lb">Author Name:</label>
                            <input type="text" class="form-control" placeholder="Enter Author Name" name="author_name"
                                value="{{ $blog->author_name }}">
                            @error('author_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="lb">Author Image:</label>
                            <div class="fil-img-uplo">
                                <span class="dumfil">Upload image</span>
                                <input type="file" name="author_image" accept="image/*,.jpg,.jpeg,.png" id="fileInput">
                                @error('author_image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <img src="{{ asset($blog->author_image) }}" alt="" class="backend-img">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="lb">Date:</label>
                            <input type="date" class="form-control" placeholder="Enter Date" name="date"
                                value="{{ $blog->date }}">
                            @error('date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="lb">Trending</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="mySwitch1" name="trending"
                                    {{ $blog->trending ? 'checked' : '' }}>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="lb">Front Page</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="mySwitch1" name="front_page"
                                    {{ $blog->front_page ? 'checked' : '' }}>
                            </div>
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
@endsection
