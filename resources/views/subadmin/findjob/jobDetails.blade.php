@extends('layouts.subadmins')
@section('title')
    Job Details
@endsection
@section('subadmin')

    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-n4 mx-n4">
                <div class="bg-soft-warning">
                    <div class="card-body pb-0 px-4">
                        <div class="row mb-3">
                            <div class="col-md">
                                <div class="row align-items-center g-3">
                                    <div class="col-md-auto">
                                        <div class="avatar-md">
                                            <div class="avatar-title bg-white rounded-circle">
                                                <img src="{{asset('assets/dashboard/')}}/images/brands/slack.png" alt=""
                                                     class="avatar-xs">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div>
                                            <h4 class="fw-bold">{{$job_details->job_title}}</h4>
                                            <div class="hstack gap-3 flex-wrap">
                                                <div>Job ID : <span class="fw-medium">{{$job_details->id}}</span>
                                                </div>
                                                <div class="vr"></div>
                                                <div>Create Date : <span
                                                        class="fw-medium">{{\Carbon\Carbon::parse($job_details->created_at)->toFormattedDateString()}}</span>
                                                </div>
                                                <div class="vr"></div>
                                                <div>Time : <span
                                                        class="fw-medium">{{$job_details->est_day}} Days</span></div>
                                                <div class="vr"></div>
                                                <?php
                                                $cat_name = \App\Models\job_main_category::where('id', $job_details->main_category)->first();
                                                ?>
                                                <div>Category : <span class="fw-medium">
                                                        @if ($cat_name)
                                                            {{$cat_name->category_name}}
                                                        @endif
                                                    </span></div>
                                                <div class="vr"></div>
                                                <?php
                                                $sub_cat_name = \App\Models\job_sub_category::where('id', $job_details->sub_category)->first();
                                                ?>
                                                <div>Sub Category : <span class="fw-medium">
                                                        @if ($sub_cat_name)
                                                            {{$sub_cat_name->category_name}}
                                                        @endif
                                                    </span></div>
                                                <div class="vr"></div>
                                                <div>Job Status :
                                                    @if ($job_details->job_status == 1)
                                                        <span class="fw-medium badge bg-success">In-Review</span>
                                                    @elseif($job_details->job_status == 2)
                                                        <span class="fw-medium badge bg-success">Active</span>
                                                    @elseif($job_details->job_status == 3)
                                                        <span class="fw-medium badge bg-success">Pushed</span>
                                                    @elseif($job_details->job_status == 4)
                                                        <span class="fw-medium badge bg-success">Rejected</span>
                                                    @else
                                                        <span class="fw-medium badge bg-success">Not Set</span>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs-custom border-bottom-0">
                            <li class="nav-item">
                                <a class="nav-link active fw-semibold"
                                   href="{{route('user.find.job.details',$job_details->id)}}">
                                    Overview
                                </a>
                            </li>
                            @if ($job_details->user_id == Auth::user()->id)
                                <li class="nav-item">
                                    <a class="nav-link fw-semibold"
                                       href="{{route('user.job.apply.memebers',$job_details->id)}}">
                                        Applied Member
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                    <!-- end card body -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="tab-content text-muted">
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="card">
                            <img src="{{asset($job_details->thumbnail)}}"
                                 class="img-fluid d-block w-100 mb-3" alt="" height="100">
                            <div class="card-body">
                                <div class="text-muted mb-3">
                                    <h6 class="mb-3 fw-semibold text-uppercase">What specific tasks
                                        need to be Completed?</h6>
                                    <p>{!! $job_details->specific_task !!}</p>
                                </div>
                                <div class="text-muted mb-3">
                                    <h6 class="mb-3 fw-semibold text-uppercase">Required proof the
                                        job was Completed</h6>
                                    <p>{!! $job_details->require_proof !!}</p>

                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                        <?php
                        $check_apply = \App\Models\job_apply::select('id', 'job_id', 'user_id', 'is_submit')->where('job_id', $job_details->id)->where('user_id', Auth::user()->id)->first();
                        ?>
                        @if ($check_apply)
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Submit Required Work
                                        Proof</h4>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    @if ($check_apply->is_submit == 0)
                                        <div class="mb-3">
                                            <form action="{{route('user.job.apply.submit')}}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <p>প্রশ্ন : আপনি ভিডিও টি কত মিনিট দেখেছেন তা বলতে হবে
                                                        ভিডিও শুরুতে একটি স্কিন শর্ট এবং সম্পূর্ন ভিডিও দেখে
                                                        আরেক টি স্কিন শর্ট দিন</p>
                                                    <textarea class="form-control" rows="5" name="answer"
                                                              placeholder="Answer client required information"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <p>#1 Upload Screenshot Prove</p>
                                                    <input type="file" name="prove_one" class="form-control">
                                                    <input type="hidden" name="apply_id" value="{{$check_apply->id}}"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <p>#2 Upload Screenshot Prove</p>
                                                    <input type="file" name="prove_two" class="form-control">
                                                </div>
                                                <div>
                                                    @if ($check_apply->is_submit == 0)
                                                        <button type="submit"
                                                                class="btn btn-success" style="width: 100%">Submit
                                                        </button>
                                                    @else
                                                        <button type="button"
                                                                class="btn btn-success" disabled>Already Submited
                                                        </button>
                                                    @endif

                                                </div>
                                            </form>
                                        </div>
                                    @else
                                        <div class="mb-3">
                                            <form action="{{route('user.job.apply.submit')}}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <p>YOU HAVE SUBMITTED JOB REQUIRED PROOF</p>
                                                </div>

                                            </form>
                                        </div>
                                    @endif

                                </div>
                                <!-- end card body -->
                            </div>
                        @endif
                        <!-- end card -->
                    </div>
                    <!-- ene col -->
                    <div class="col-xl-3 col-lg-4">
                        <div class="card">


                        </div>

                        <div class="card">
                            <div class="card-header align-items-center d-flex border-bottom-dashed">
                                <h4 class="card-title mb-0 flex-grow-1">Members</h4>
                            </div>
                            <div class="card-body">

                                <div data-simplebar style="height: 235px;" class="mx-n3 px-3">
                                    @foreach ($applied_user as $app_users)
                                            <?php
                                            $user_name = \App\Models\User::select('id', 'name')->where('id', $app_users->user_id)->first();
                                            ?>
                                        <div class="vstack gap-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-xs flex-shrink-0 me-3">
                                                    <img src="{{asset('assets/dashboard/')}}/images/users/avatar-2.jpg"
                                                         alt=""
                                                         class="img-fluid rounded-circle">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-13 mb-0"><a
                                                            class="text-body d-block">{{$user_name->name}}</a>
                                                    </h5>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                    @endforeach

                                </div>

                            </div>
                            <!-- end card body -->
                        </div>


                        <!-- end card -->
                    </div>


                    <!-- end col -->
                </div>
            </div>


        </div>
        <!-- end col -->
    </div>
@endsection
