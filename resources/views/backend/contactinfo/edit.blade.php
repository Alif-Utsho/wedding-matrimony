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
                    <form action="{{ route('admin.contactinfo.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-5">
                            <div class="edit-pro-parti">
                                <h1>Contact Infos</h1>
                            </div>
                            <div class="row">

                                <div class="form-group">
                                    <label class="lb">Bio:</label>
                                    <textarea class="form-control" name="bio">{{ $contactinfo->bio }}</textarea>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="lb">Email:</label>
                                        <input type="text" class="form-control" name="email" placeholder="Branding email" value="{{ $contactinfo->email }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="lb">Phone:</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Branding phone" value="{{ $contactinfo->phone }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="lb">Address:</label>
                                        <input type="text" class="form-control" name="address" placeholder="Branding address" value="{{ $contactinfo->address }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="lb">Whatsapp:</label>
                                        <input type="text" class="form-control" name="whatsapp" placeholder="Branding whatsapp" value="{{ $contactinfo->whatsapp }}">
                                    </div>
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
