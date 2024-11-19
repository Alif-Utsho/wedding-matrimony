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
                        <h3>Blogs</h3>
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#addhomreviews">Add new blog post</a></li>
                                <li><a class="dropdown-item"
                                        href="https://rn53themes.net/themes/matrimo/index.html#hom-cus-revi">View user
                                        reviews</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="form-inp">
                        <form>
                            <!--PROFILE BIO-->
                            <div class="edit-pro-parti">
                                <div class="form-group">
                                    <label class="lb">Title:</label>
                                    <input type="text" class="form-control" placeholder="Enter title*" required="">
                                </div>
                                <div class="form-group">
                                    <label class="lb">Tag line:</label>
                                    <input type="text" class="form-control" placeholder="Enter tag line" required="">
                                </div>
                                <div class="form-group">
                                    <label class="lb">Blog photo:</label>
                                    <div class="fil-img-uplo">
                                        <span class="dumfil">Upload image</span>
                                        <input type="file" name="gallery_image[]" accept="image/*,.jpg,.jpeg,.png"
                                            id="fileInput">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="lb">Descriptions:</label>
                                    <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
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
