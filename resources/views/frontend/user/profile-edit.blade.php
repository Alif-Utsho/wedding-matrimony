@extends('frontend.layouts.master')
@section('content')

<section>
    <div class="login pro-edit-update">
        <div class="container">
            <div class="row">
                <div class="inn">
                    <div class="rhs">
                            <div class="form-login">
                                <form>
                                    <!--PROFILE BIO-->
                                    <div class="edit-pro-parti">
                                        <div class="form-tit">
                                            <h4>Basic info</h4>
                                            <h1>Edit my profile</h1>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Name:</label>
                                            <input type="text" class="form-control" placeholder="Enter your full name" value="{{ Auth::guard('user')->user()->name }}"
                                                name="name">
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Email:</label>
                                            <input type="email" class="form-control" id="email" value="{{ Auth::guard('user')->user()->email }}"
                                                placeholder="Enter email" name="email" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Phone:</label>
                                            <input type="number" class="form-control" id="phone" value="{{ Auth::guard('user')->user()->phone }}"
                                                placeholder="Enter phone number" name="phone" disabled>
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
                                                <select class="form-select chosen-select" data-placeholder="Select your Gender">
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                  </select>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="lb">City:</label>
                                                <select class="form-select chosen-select" data-placeholder="Select your City">
                                                    <option>Chennai</option>
                                                    <option>Newyork</option>
                                                    <option>London</option>
                                                    <option>Chicago</option>
                                                  </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Date of birth:</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Age:</label>
                                                <input type="number" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Height:</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Weight:</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Fathers name:</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Mothers name:</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Address:</label>
                                            <input type="text" class="form-control" >
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
                                            <select class="form-select chosen-select" data-placeholder="Select your Hobbies">
                                                <option>Business</option>
                                                <option>Employee</option>
                                                <option>Government</option>
                                                <option>Jobless</option>
                                              </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Company name:</label>
                                            <input type="text" class="form-control" >
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Salary:</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Job total experience:</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="lb">Degree:</label>
                                            <input type="text" class="form-control" >
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="lb">School:</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="lb">College:</label>
                                                <input type="text" class="form-control" >
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
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Facebook:</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Instagram:</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="lb">X:</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Youtube:</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="lb">Linkedin:</label>
                                                <input type="text" class="form-control" >
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
                                                <select class="chosen-select" data-placeholder="Select your Hobbies" multiple>
                                                    <option></option>
                                                    <option>Modelling </option>
                                                    <option>Watching </option>
                                                    <option>movies </option>
                                                    <option>Playing </option>
                                                    <option>volleyball</option> 
                                                    <option>Hangout with family </option>
                                                    <option>Adventure travel </option>
                                                    <option>Books reading </option>
                                                    <option>Music </option>
                                                    <option>Cooking </option>
                                                    <option>Yoga</option>
                                                </select>
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