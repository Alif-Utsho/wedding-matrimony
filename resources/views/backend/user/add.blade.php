@extends('backend.layouts.master')
@section('content')
    <div class="pan-rhs">
        <div class="row main-head">
            <div class="col-md-4">
                <div class="tit">
                    <h1>Add new user</h1>
                </div>
            </div>
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add new users</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-com box-qui box-lig box-form">
                    <div class="form-inp">
                        <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!--PROFILE BIO-->
                            <div class="edit-pro-parti">
                                <div class="form-tit">
                                    <h4>Basic info</h4>
                                    <h1>Edit my profile</h1>
                                </div>
                                <div class="form-group">
                                    <label class="lb">Name:</label>
                                    <input type="text" class="form-control" placeholder="Enter your full name"
                                        value="{{ old('name') }}" name="name">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="lb">Profile Image:</label>
                                    <input type="file" class="form-control" name="image">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="lb">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}" placeholder="Enter email">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="lb">Phone:</label>
                                    <input type="number" class="form-control" id="phone" name="phone"
                                        value="{{ old('phone') }}" placeholder="Enter phone number">
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="lb">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        value="" placeholder="Enter password">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <!--END PROFILE BIO-->
                            <!--PROFILE BIO-->
                            <div class="edit-pro-parti">
                                <div class="form-tit">
                                    <h4>Basic info</h4>
                                    <h1>Advanced bio</h1>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="lb">Gender:</label>
                                        <select class="form-select chosen-select" data-placeholder="Select your Gender"
                                            name="gender">
                                            <option value="">Select</option>
                                            @foreach (\App\Enums\GenderEnum::options() as $value => $label)
                                                <option value="{{ $value }}"
                                                    {{ old('gender') == $value ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('gender')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label class="lb">Religion:</label>
                                        <select class="form-select chosen-select" data-placeholder="Select your Religion"
                                            name="religion">
                                            <option value="">Select</option>
                                            @foreach (\App\Enums\Religion::all() as $value => $label)
                                                <option value="{{ $label }}"
                                                    {{ old('religion') == $label ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('religion')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="lb">Date of birth:</label>
                                        <input type="date" class="form-control" id="birth_date" name="birth_date"
                                            value="{{ old('birth_date') }}" placeholder="YYYY-MM-DD">
                                        @error('birth_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="lb">Age:</label>
                                        <input type="number" class="form-control" id="age" name="age"
                                            value="{{ old('age') }}" readonly>
                                        @error('age')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="lb">Height (in cm):</label>
                                        <input type="text" class="form-control" id="height" name="height"
                                            value="{{ old('height') }}" placeholder="Enter height in cm">
                                        <span id="heightError" style="color: red; display: none;"><small>Please
                                                enter a valid height.</small></span>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="lb">Weight (in kg):</label>
                                        <input type="text" class="form-control" id="weight" name="weight"
                                            value="{{ old('weight') }}" placeholder="Enter weight in kg">
                                        <span id="weightError" style="color: red; display: none;"><small>Please
                                                enter a valid weight.</small></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="lb">Fathers name:</label>
                                        <input type="text" class="form-control" name="fathers_name"
                                            value="{{ old('fathers_name') }}">
                                        @error('fathers_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="lb">Mothers name:</label>
                                        <input type="text" class="form-control" name="mothers_name"
                                            value="{{ old('mothers_name') }}">
                                        @error('mothers_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="lb">City:</label>
                                    <select class="form-select chosen-select" data-placeholder="Select your City"
                                        name="city_id" value="{{ old('city_id') }}">
                                        <option value="">Select</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                {{ $city->id == old('city_id') ? 'selected' : '' }}>{{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="lb">Address:</label>
                                    <input type="text" class="form-control" name="address"
                                        value="{{ old('address') }}">
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!--END PROFILE BIO-->
                            <!--PROFILE BIO-->
                            <div class="edit-pro-parti">
                                <div class="form-tit">
                                    <h4>Job details</h4>
                                    <h1>Job & Education</h1>
                                </div>
                                <div class="form-group">
                                    <label class="lb">Job type:</label>
                                    <select class="form-select chosen-select" data-placeholder="Select your Hobbies"
                                        name="type">
                                        <option value="">Select</option>
                                        @foreach (\App\Enums\JobType::getValues() as $jobType)
                                            <option value="{{ $jobType }}"
                                                {{ old('type') == $jobType ? 'selected' : '' }}>
                                                {{ $jobType }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="lb">Company name:</label>
                                    <input type="text" class="form-control" name="company_name"
                                        value="{{ old('company_name') }}">
                                    @error('cpmpany_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="lb">Salary:</label>
                                        <input type="text" class="form-control" name="salary"
                                            value="{{ old('salary') }}">
                                        @error('salary')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="lb">Job total experience:</label>
                                        <input type="text" class="form-control" name="experience"
                                            value="{{ old('experience') }}">
                                        @error('experience')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="lb">Degree:</label>
                                    <input type="text" class="form-control" name="degree"
                                        value="{{ old('degree') }}">
                                    @error('degree')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="lb">School:</label>
                                        <input type="text" class="form-control" name="school"
                                            value="{{ old('school') }}">
                                        @error('school')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="lb">College:</label>
                                        <input type="text" class="form-control" name="college"
                                            value="{{ old('college') }}">
                                        @error('college')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--END PROFILE BIO-->
                            <!--PROFILE BIO-->
                            <div class="edit-pro-parti">
                                <div class="form-tit">
                                    <h4>Media</h4>
                                    <h1>Social media</h1>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="lb">WhatsApp:</label>
                                        <input type="text" class="form-control" name="whatsApp"
                                            value="{{ old('whatsApp') }}">
                                        @error('whatsApp')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="lb">Facebook:</label>
                                        <input type="text" class="form-control" name="facebook"
                                            value="{{ old('facebook') }}">
                                        @error('facebook')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="lb">Instagram:</label>
                                        <input type="text" class="form-control" name="instagram"
                                            value="{{ old('instagram') }}">
                                        @error('instagram')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="lb">X:</label>
                                        <input type="text" class="form-control" name="x"
                                            value="{{ old('x') }}">
                                        @error('x')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="lb">Youtube:</label>
                                        <input type="text" class="form-control" name="youtube"
                                            value="{{ old('youtube') }}">
                                        @error('youtube')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="lb">Linkedin:</label>
                                        <input type="text" class="form-control" name="linkedin"
                                            value="{{ old('linkedin') }}">
                                        @error('linkedin')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--END PROFILE BIO-->
                            <!--PROFILE BIO-->
                            <div class="edit-pro-parti">
                                <div class="form-tit">
                                    <h4>interests</h4>
                                    <h1>Hobbies</h1>
                                </div>
                                <div class="chosenini">
                                    <div class="form-group">
                                        <select class="chosen-select" data-placeholder="Select your Hobbies" multiple
                                            name="hobbies[]">
                                            <option></option>
                                            @foreach ($hobbies as $hobby)
                                                <option value="{{ $hobby->id }}">
                                                    {{ $hobby->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('hobbies')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
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
@endsection
