@extends('layouts.user')
@section('title')
    My Profile
@endsection
@section('user')
   <br>
   <br>
   <br>



    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <form action="{{ route('user.avatar.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                            <img src="{{ asset('images') }}/{{ Auth::user()->avatar }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                <input id="profile-img-file-input" type="file" class="profile-img-file-input" name="avatar">
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-light text-body">
                                                        <button type="submit" style="border-style: none">  <i class="fas fa-check">Upload</i></button>
                                                    </span>

                                </label>
                            </div>
                        </div>
                        <h5 class="fs-16 mb-1">{{Auth::user()->name}}</h5>
                        <p class="text-muted mb-0">{{Auth::user()->email}}</p>
                    </div>
                </div>
            </form>
            </div>
            <!--end card-->


            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('user.profile')}}" role="tab" aria-selected="true">
                                <i class="fas fa-home"></i>
                                Personal Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('user.change.password')}}" role="tab" aria-selected="false">
                                <i class="far fa-user"></i>
                                Change Password
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <form action="{{route('user.profile.update')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label">Full
                                                Name</label>
                                            <input type="text" name="name" value="{{$user->name}}"  class="form-control" id="firstnameInput" placeholder="Enter your firstname" >
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="lastnameInput" class="form-label">Email Address</label>
                                            <input type="text" name="email" value="{{$user->email}}" readonly disabled class="form-control" id="lastnameInput" placeholder="Enter your lastname" >
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Phone
                                                Number</label>
                                            <input type="text" name="phone_number" value="{{$user->phone_number}}" class="form-control" id="phonenumberInput" placeholder="Enter your phone number">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="JoiningdatInput" class="form-label">Joining
                                                Date</label>
                                            <input type="text" name="joining_date"  value="{{$user->joining_date}}" class="form-control flatpickr-input" disabled readonly>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <!--end col-->

                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="websiteInput1" class="form-label">Website</label>
                                            <input type="text" name="website" value="{{$user->website}}" class="form-control" id="websiteInput1" placeholder="www.example.com" >
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="cityInput" class="form-label">City</label>
                                            <input type="text" name="city" value="{{$user->city}}" class="form-control" id="cityInput" placeholder="City">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="countryInput" class="form-label">Country</label>
                                            <input type="text" name="country" value="{{$user->country}}" class="form-control" id="countryInput" placeholder="Country" >
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="zipcodeInput" class="form-label">Zip
                                                Code</label>
                                            <input type="text" name="zip_code" value="{{$user->zip_code}}" class="form-control" minlength="4" maxlength="6" id="zipcodeInput" placeholder="Enter zipcode" >
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3 pb-2">
                                            <label for="exampleFormControlTextarea" class="form-label">Description</label>
                                            <textarea class="form-control" name="description" id="exampleFormControlTextarea" placeholder="Enter your description" rows="3">{!! $user->description !!}</textarea>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Updates</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end tab-pane-->


                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
