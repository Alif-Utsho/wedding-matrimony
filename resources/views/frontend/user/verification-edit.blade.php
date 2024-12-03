@extends('frontend.layouts.usermaster')
@section('user_content')
    <div class="col-md-8 col-lg-9">

        <section>
            <div class="container">
                <div class="row">
                    <div class="inn">
                        <div class="rhs">
                            <div class="form-login">
                                <form action="{{ route('user.verificationEdit.submit') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <!--PROFILE BIO-->
                                    <div class="edit-pro-parti">
                                        <div class="form-tit">
                                            <h4>Verify with NID or Passport</h4>
                                            <h1>Account Verification</h1>
                                        </div>

                                        <div class="form-group">
                                            <label class="lb">Front Side:</label>
                                            <input type="file" class="form-control" name="image">
                                            @error('image')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="lb">Back Side:</label>
                                            <input type="file" class="form-control" name="image_back">
                                            @error('image_back')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <!--END PROFILE BIO-->

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
