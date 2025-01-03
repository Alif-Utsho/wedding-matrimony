@extends('backend.layouts.master')
@section('content')
    <div class="pan-rhs">
        <div class="row main-head">
            <div class="col-md-4">
                <div class="tit">
                    <h1>Logo and Favicon</h1>
                </div>
            </div>
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Appearance</li>
                        <li class="breadcrumb-item active" aria-current="page">Logo</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-com box-qui box-lig box-form">
                    <div class="form-inp">
                        <form action="{{ route('admin.generalsetting.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-5">
                                <div class="edit-pro-parti">
                                    <h1>General Settings</h1>
                                </div>
                                <div class="form-tit">
                                    <h4>Branding Name</h4>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="lb">Name:</label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Branding name" value="{{ $generalsetting->name }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="lb">Phone Number:</label>
                                        <input type="text" class="form-control" name="phone"
                                            placeholder="Branding phone" value="{{ $generalsetting->phone }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="lb">Email Address:</label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Branding email" value="{{ $generalsetting->email }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="lb">Address:</label>
                                        <input type="text" class="form-control" name="address"
                                            placeholder="Branding address" value="{{ $generalsetting->address }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label class="lb">Facebook Url:</label>
                                        <input type="text" class="form-control" name="fb_link"
                                            placeholder="Enter facebook link" value="{{ $generalsetting->fb_link }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="lb">Linkedin Url:</label>
                                        <input type="text" class="form-control" name="linkedin_link"
                                            placeholder="Enter linkedin link" value="{{ $generalsetting->linkedin_link }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="lb">X Url:</label>
                                        <input type="text" class="form-control" name="x_link"
                                            placeholder="Enter twitter link" value="{{ $generalsetting->x_link }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="lb">YouTube Url:</label>
                                        <input type="text" class="form-control" name="youtube_link"
                                            placeholder="Enter youtube link" value="{{ $generalsetting->youtube_link }}">
                                    </div>
                                </div>
                            </div>

                            <!--PROFILE BIO-->
                            <div class="mb-5">
                                <div class="form-tit">
                                    <h4>Branding logo</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="lb">Logo:</label>
                                        <div class="fil-img-uplo">
                                            <span class="dumfil">Upload image</span>
                                            <input type="file" name="logo" accept="image/*,.jpg,.jpeg,.png"
                                                id="fileInput">
                                        </div>
                                        <div>
                                            <img src="{{ asset($generalsetting->logo) }}" alt=""
                                                class="backend-img">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="lb">Fav icon:</label>
                                        <div class="fil-img-uplo">
                                            <span class="dumfil">Upload image</span>
                                            <input type="file" name="favicon" accept="image/*,.jpg,.jpeg,.png"
                                                id="fileInput">
                                        </div>
                                        <div>
                                            <img src="{{ asset($generalsetting->favicon) }}" alt=""
                                                class="backend-img float-end">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5">
                                <div class="form-tit">
                                    <h4>Branding Description</h4>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <textarea class="form-control" name="description">{{ $generalsetting->description }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="cta-full cta-colr">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
