@extends('layouts.subadmins')
@section('subadmin')
   <br>
   <br>
   <br>



    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSiMcc9W6s78W6i8ZTNMtPrBDg5hvws2htOXfOxTaEPkgLumwbtLQVVIHZtZmSU92XoLXA&usqp=CAU" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-light text-body">
                                                        <i class="ri-camera-fill"></i>
                                                    </span>
                                </label>
                            </div>
                        </div>
                        <h5 class="fs-16 mb-1">{{$user->name}}</h5>
                        <p class="text-muted mb-0">{{$user->email}}</p>
                    </div>
                </div>
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
                            <a class="nav-link " href="{{route('subadmin.user.details',$user->id)}}" role="tab" aria-selected="true">
                                <i class="fas fa-home"></i>
                                Personal Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active"  href="{{route('subadmin.user.change.password',$user->id)}}" role="tab" aria-selected="false">
                                <i class="far fa-user"></i>
                                Change Password
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">

                        <div class="tab-pane active" id="changePassword" role="tabpanel">
                            <form action="{{route('subadmin.user.change.password.update')}}" method="post">
                                @csrf
                                <div class="row g-2">

                                    <div class="col-lg-6">
                                        <div>
                                            <label for="newpasswordInput" class="form-label">New
                                                Password*</label>
                                            <input type="password" name="n_pass" class="form-control" id="newpasswordInput" placeholder="Enter new password">
                                            <input type="hidden" name="user_id" value="{{$user->id}}" class="form-control" id="newpasswordInput" placeholder="Enter new password">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="confirmpasswordInput" class="form-label">Confirm
                                                Password*</label>
                                            <input type="password" name="c_pass" class="form-control" id="confirmpasswordInput" placeholder="Confirm password">
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success">Change
                                                Password</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                            <div class="mt-4 mb-3 border-bottom pb-2">
                                <div class="float-end">
                                    <a href="javascript:void(0);" class="link-primary">All Logout</a>
                                </div>
                                <h5 class="card-title">Login History</h5>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                                        <i class="ri-smartphone-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>iPhone 12 Pro</h6>
                                    <p class="text-muted mb-0">Los Angeles, United States - March 16 at
                                        2:47PM</p>
                                </div>
                                <div>
                                    <a href="javascript:void(0);">Logout</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                                        <i class="ri-tablet-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>Apple iPad Pro</h6>
                                    <p class="text-muted mb-0">Washington, United States - November 06
                                        at 10:43AM</p>
                                </div>
                                <div>
                                    <a href="javascript:void(0);">Logout</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                                        <i class="ri-smartphone-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>Galaxy S21 Ultra 5G</h6>
                                    <p class="text-muted mb-0">Conneticut, United States - June 12 at
                                        3:24PM</p>
                                </div>
                                <div>
                                    <a href="javascript:void(0);">Logout</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                                        <i class="ri-macbook-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>Dell Inspiron 14</h6>
                                    <p class="text-muted mb-0">Phoenix, United States - July 26 at
                                        8:10AM</p>
                                </div>
                                <div>
                                    <a href="javascript:void(0);">Logout</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
