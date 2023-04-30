@extends('layouts.user')
@section('title')
    Change Password
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
                            <a class="nav-link " href="{{route('user.profile')}}" role="tab" aria-selected="true">
                                <i class="fas fa-home"></i>
                                Personal Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active"  href="{{route('user.change.password')}}" role="tab" aria-selected="false">
                                <i class="far fa-user"></i>
                                Change Password
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">

                        <div class="tab-pane active" id="changePassword" role="tabpanel">
                            <form action="{{route('user.change.password.update')}}" method="post">
                                @csrf
                                <div class="row g-2">

                                    <div class="col-lg-6">
                                        <div>
                                            <label for="newpasswordInput" class="form-label">New
                                                Password*</label>
                                            <input type="password" name="n_pass" class="form-control" id="newpasswordInput" placeholder="Enter new password">
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
                            @foreach ($devices as $item)


                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                                        <i class="ri-smartphone-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>{{ $item->login_device }}</h6>
                                    <p class="text-muted mb-0">{{ $item->created_at->diffForHumans() }}</p>
                                </div>
                                <div>
                                    <a href="javascript:void(0);">Logout</a>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
