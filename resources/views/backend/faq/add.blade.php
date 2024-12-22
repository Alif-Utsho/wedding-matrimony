@extends('backend.layouts.master')
@section('content')
    <div class="pan-rhs">
        <div class="row main-head">
            <div class="col-md-6">
                <div class="tit">
                    <h1>FAQ</h1>
                </div>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Appearance</li>
                        <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="box-com box-qui box-lig box-tab box-form">
            <div class="tit">
                <h3>FAQs</h3>
                <div class="dropdown">
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.faq.manage') }}">Manage faq posts</a></li>

                    </ul>
                </div>
            </div>

            <div class="form-inp mt-2">
                <form action="{{ route('admin.faq.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--PROFILE BIO-->
                    <div class="edit-pro-parti">
                        <div class="form-group">
                            <label class="lb">Question:</label>
                            <input type="text" class="form-control" placeholder="Enter question*" name="question"
                                value="{{ old('question') }}">
                            @error('question')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="lb">Answer:</label>
                            <input type="text" class="form-control" placeholder="Enter answer*" name="answer"
                                value="{{ old('answer') }}">
                            @error('answer')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="cta-full cta-colr">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
