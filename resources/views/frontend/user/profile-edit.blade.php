@extends('frontend.layouts.master')
@section('content')
    <section>
        <div class="login pro-edit-update">
            <div class="container">
                <div class="row">
                    <div class="inn">
                        <div class="rhs">
                            <div class="form-login">
                                <form action="{{ route('user.profileEdit.submit') }}" method="POST" id="profile-edit-form" enctype="multipart/form-data">
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
                                                value="{{ Auth::guard('user')->user()->name ?? old('name') }}" name="name">
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
                                            @if($user->profile && $user->profile->image)
                                                <img src="{{ asset($user->profile->image) }}" width="150" loading="lazy" alt="">
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="lb">Email:</label>
                                            <input type="email" class="form-control" id="email"
                                                value="{{ Auth::guard('user')->user()->email }}" placeholder="Enter email"
                                                disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Phone:</label>
                                            <input type="number" class="form-control" id="phone"
                                                value="{{ Auth::guard('user')->user()->phone }}"
                                                placeholder="Enter phone number" disabled>
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
                                                <select class="form-select chosen-select"
                                                    data-placeholder="Select your Gender" name="gender">
                                                    <option value="">Select</option>
                                                    @foreach(\App\Enums\GenderEnum::options() as $value => $label)
                                                        <option value="{{ $value }}" 
                                                            {{ (isset($user->profile->gender) && $user->profile->gender == $value) ? 'selected' : (old('gender') == $value ? 'selected' : '') }}>
                                                            {{ $label }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('gender')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="lb">City:</label>
                                                <select class="form-select chosen-select"
                                                    data-placeholder="Select your City" name="city_id"
                                                    value="{{ $user->profile->city_id ?? old('city_id') }}">
                                                    <option value="">Select</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}" {{ $user->profile && $city->id===$user->profile->city_id ? 'selected' : '' }}>{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('city_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Date of birth:</label>
                                                <input type="date" class="form-control" id="birth_date" name="birth_date"
                                                    value="{{ $user->profile->birth_date ?? old('birth_date') }}"
                                                    placeholder="YYYY-MM-DD">
                                                @error('birth_date')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Age:</label>
                                                <input type="number" class="form-control" id="age" name="age"
                                                    value="{{ $user->profile->age ?? old('age') }}" readonly>
                                                @error('age')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Height (in cm):</label>
                                                <input type="text" class="form-control" id="height" name="height"
                                                    value="{{ $user->profile->height ?? old('height') }}"
                                                    placeholder="Enter height in cm">
                                                <span id="heightError" style="color: red; display: none;"><small>Please
                                                        enter a valid height.</small></span>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Weight (in kg):</label>
                                                <input type="text" class="form-control" id="weight" name="weight"
                                                    value="{{ $user->profile->weight ?? old('weight') }}"
                                                    placeholder="Enter weight in kg">
                                                <span id="weightError" style="color: red; display: none;"><small>Please
                                                        enter a valid weight.</small></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Fathers name:</label>
                                                <input type="text" class="form-control" name="fathers_name"
                                                    value="{{ $user->profile->fathers_name ?? old('fathers_name') }}">
                                                @error('fathers_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Mothers name:</label>
                                                <input type="text" class="form-control" name="mothers_name"
                                                    value="{{ $user->profile->mothers_name ?? old('mothers_name') }}">
                                                @error('mothers_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Address:</label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ $user->profile->address ?? old('address') }}">
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
                                            <select class="form-select chosen-select"
                                                data-placeholder="Select your Hobbies" name="type">
                                                <option value="">Select</option>
                                                @foreach(\App\Enums\JobType::getValues() as $jobType)
                                                    <option value="{{ $jobType }}" {{ $user->profile && $user->profile->career->type == $jobType ? 'selected' : '' }}>
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
                                                value="{{ $user->profile ? $user->profile->career->company_name : old('company_name') }}">
                                            @error('cpmpany_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Salary:</label>
                                                <input type="text" class="form-control" name="salary"
                                                    value="{{ $user->profile ? $user->profile->career->salary : old('salary') }}">
                                                @error('salary')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Job total experience:</label>
                                                <input type="text" class="form-control" name="experience"
                                                    value="{{ $user->profile ? $user->profile->career->experience : old('experience') }}">
                                                @error('experience')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="lb">Degree:</label>
                                            <input type="text" class="form-control" name="degree"
                                                value="{{ $user->profile ? $user->profile->career->degree : old('degree') }}">
                                            @error('degree')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="lb">School:</label>
                                                <input type="text" class="form-control" name="school"
                                                    value="{{ $user->profile ? $user->profile->career->school : old('school') }}">
                                                @error('school')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="lb">College:</label>
                                                <input type="text" class="form-control" name="college"
                                                    value="{{ $user->profile ? $user->profile->career->college : old('college') }}">
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
                                                    value="{{ $user->profile->socialmedia->whatsApp ?? old('whatsApp') }}">
                                                @error('whatsApp')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Facebook:</label>
                                                <input type="text" class="form-control" name="facebook"
                                                    value="{{ $user->profile->socialmedia->facebook ?? old('facebook') }}">
                                                @error('facebook')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Instagram:</label>
                                                <input type="text" class="form-control" name="instagram"
                                                    value="{{ $user->profile->socialmedia->instagram ?? old('instagram') }}">
                                                @error('instagram')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="lb">X:</label>
                                                <input type="text" class="form-control" name="x"
                                                    value="{{ $user->profile->socialmedia->x ?? old('x') }}">
                                                @error('x')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Youtube:</label>
                                                <input type="text" class="form-control" name="youtube"
                                                    value="{{ $user->profile->socialmedia->youtube ?? old('youtube') }}">
                                                @error('youtube')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Linkedin:</label>
                                                <input type="text" class="form-control" name="linkedin"
                                                    value="{{ $user->profile->socialmedia->linkedin ?? old('linkedin') }}">
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
                                                <select class="chosen-select" data-placeholder="Select your Hobbies"
                                                    multiple name="hobbies[]">
                                                    <option></option>
                                                    @php
                                                        $userHobbies = $user->profile ? $user->profile->hobbies->pluck('hobby_id')->toArray() : [];
                                                    @endphp
                                                    @foreach ($hobbies as $hobby)
                                                        <option value="{{ $hobby->id }}"
                                                            {{ in_array($hobby->id, $userHobbies) ? 'selected' : '' }}>
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
        </div>
    </section>
@endsection
