@extends('layouts.user')
@section('css')
    <style>
        .rating {
            float: left;
        }

        /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t
          follow these rules. Every browser that supports :checked also supports :not(), so
          it doesn’t make the test unnecessarily selective */
        .rating:not(:checked) > input {
            position: absolute;
            top: -9999px;
            clip: rect(0, 0, 0, 0);
        }

        .rating:not(:checked) > label {
            float: right;
            width: 1em;
            /* padding:0 .1em; */
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 300%;
            /* line-height:1.2; */
            color: #ddd;
        }

        .rating:not(:checked) > label:before {
            content: '★ ';
        }

        .rating > input:checked ~ label {
            color: dodgerblue;

        }

        .rating:not(:checked) > label:hover,
        .rating:not(:checked) > label:hover ~ label {
            color: dodgerblue;

        }

        .rating > input:checked + label:hover,
        .rating > input:checked + label:hover ~ label,
        .rating > input:checked ~ label:hover,
        .rating > input:checked ~ label:hover ~ label,
        .rating > label:hover ~ input:checked ~ label {
            color: dodgerblue;

        }

        .rating > label:active {
            position: relative;
            top: 2px;
            left: 2px;
        }
    </style>
@endsection
@section('title')
    Apply Members
@endsection
@section('user')
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
                                <a class="nav-link fw-semibold"
                                   href="{{route('user.find.job.details',$job_details->id)}}">
                                    Overview
                                </a>
                            </li>


                            @if ($job_details->user_id == Auth::user()->id)
                                <li class="nav-item">
                                    <a class="nav-link active fw-semibold"
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



    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                            <thead class="table-light">
                            <tr class="text-muted">
                                <th scope="col">Name</th>
                                <th scope="col" style="width: 20%;">Task ID</th>
                                <th scope="col">Submited Date</th>
                                <th scope="col" style="width: 16%;">Status</th>
                                <th scope="col" style="width: 12%;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($apply_jobs as $app_job)
                                <?php
                                $user_name = \App\Models\User::select('id', 'name')->where('id', $app_job->user_id)->first();
                                ?>
                                <tr>
                                    <td><img src="{{asset('assets/dashboard/')}}/images/users/avatar-1.jpg" alt=""
                                             class="avatar-xs rounded-circle me-2">
                                        <a href="#" class="text-body fw-medium">
                                            @if ($user_name)
                                                {{$user_name->name}}
                                            @endif
                                        </a></td>
                                    <td>{{$app_job->task_name}}</td>
                                    <td>{{\Carbon\Carbon::parse($app_job->created_at)->toFormattedDateString()}}</td>

                                    <td>
                                        @if ($app_job->status == 0)
                                            <span class="badge badge-soft-success p-2">Applied</span>
                                        @elseif($app_job->status == 1)
                                            <span class="badge badge-soft-success p-2">Submitted</span>
                                        @elseif($app_job->status == 2)
                                            <span class="badge badge-soft-success p-2">Approved</span>
                                        @elseif($app_job->status == 3)
                                            <span class="badge badge-soft-success p-2">Rejected</span>
                                        @else
                                            <span class="badge badge-soft-success p-2">Not Set</span>
                                        @endif

                                    </td>
                                    <td>
                                        @if($app_job->status == 1 )
                                            <button type="button" class="btn btn-sm btn-primary btn-light "
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#inviteMembersModal{{$app_job->id}}">View Details
                                            </button>
                                        @endif
                                        <?php

                                        $count_report = \App\Models\apply_member_report::where('apply_id', $app_job->id)->where('applied_user_id', $user_name->id)->count();
                                        ?>
                                        @if($count_report < 1)
                                            @if($app_job->is_submit == 1)
                                            <button type="button" class="btn btn-sm btn-primary btn-light "
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#inviteMembersreportModal{{$app_job->id}}">Report
                                            </button>
                                                @endif
                                        @endif
                                    </td>
                                </tr>



                                <div class="modal fade" id="inviteMembersModal{{$app_job->id}}" tabindex="-1"
                                     aria-labelledby="inviteMembersModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <form action="{{route('user.job.apply.memebers.change.status')}}" method="post">
                                            @csrf
                                            <div class="modal-content border-0">
                                                <div class="modal-header p-3 ps-4 bg-soft-success">
                                                    <h5 class="modal-title" id="inviteMembersModalLabel">Rate This</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-4">

                                                    <div class="row">
                                                        <div class="col-md-12 mb-3 border">
                                                            <img src="{{asset($app_job->prove_one)}}"
                                                                 class="img-fluid d-block w-100" style="height: 400px"
                                                                 alt="">
                                                        </div>
                                                        <div class="col-md-12 mb-3 border">
                                                            <img src="{{asset($app_job->prove_two)}}"
                                                                 class="img-fluid d-block w-100" style="height: 400px"
                                                                 alt="">
                                                        </div>
                                                    </div>
                                                    <div class="live-preview">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item align-top">Basic Rater</li>
                                                            <li class="list-inline-item">
                                                                <div class="rating">
                                                                    <input type="radio" id="star5" name="rating"
                                                                           value="5"/><label for="star5" title="Meh">5
                                                                        stars</label>
                                                                    <input type="radio" id="star4" name="rating"
                                                                           value="4"/><label for="star4"
                                                                                             title="Kinda bad">4
                                                                        stars</label>
                                                                    <input type="radio" id="star3" name="rating"
                                                                           value="3"/><label for="star3"
                                                                                             title="Kinda bad">3
                                                                        stars</label>
                                                                    <input type="radio" id="star2" name="rating"
                                                                           value="2"/><label for="star2"
                                                                                             title="Sucks big tim">2
                                                                        stars</label>
                                                                    <input type="radio" id="star1" name="rating"
                                                                           value="1"/><label for="star1"
                                                                                             title="Sucks big time">1
                                                                        star</label>
                                                                </div>
                                                            </li>
                                                        </ul>

                                                        <!-- end table responsive -->
                                                    </div>
                                                    <ul class="list-inline text-center review-btn mt-3">
                                                        <li class="list-inline-item safic">
                                                            <button type="button" class="btn btn-sm btn-outline-dark">
                                                                <label class="form-check-label">
                                                                    <input type="radio" value="1"
                                                                           class="form-check-input  d-none"
                                                                           id="satisfied"
                                                                           name="is_sat">Satisfied
                                                                </label>
                                                            </button>
                                                        </li>
                                                        <li class="list-inline-item unsatic">
                                                            <button type="button" class="btn btn-sm btn-outline-dark">
                                                                <label class="form-check-label">
                                                                    <input type="radio" value="2"
                                                                           class="form-check-input  d-none"
                                                                           id="unsatisfied"
                                                                           name="is_sat">Unsatisfied
                                                                </label>
                                                            </button>
                                                        </li>
                                                    </ul>


                                                    <div class="col-md-12 mb-3 border un_satic_div">
                                                        <textarea class="form-control un_satic_comment"
                                                                  name="un_satic_comment"></textarea>
                                                    </div>
                                                    <input type="hidden" value="{{$app_job->id}}" name="apply_id">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light w-xs"
                                                            data-bs-dismiss="modal">Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-success w-xs">Apply</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- end modal-content -->
                                    </div>
                                </div>



                                <div class="modal fade" id="inviteMembersreportModal{{$app_job->id}}" tabindex="-1"
                                     aria-labelledby="inviteMembersModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <form action="{{route('user.job.apply.memebers.submit.report')}}" method="post">
                                            @csrf
                                            <div class="modal-content border-0">
                                                <div class="modal-header p-3 ps-4 bg-soft-success">
                                                    <h5 class="modal-title" id="inviteMembersModalLabel">View
                                                        Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <div class="search-box mb-3">
                                                        <label>Report Summery</label>
                                                        <textarea class="form-control" cols="7" rows="7"
                                                                  name="report_desc"></textarea>
                                                        <input type="hidden" value="{{$app_job->id}}"
                                                               name="report_apply_id">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light w-xs"
                                                            data-bs-dismiss="modal">Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-success w-xs">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- end modal-content -->
                                    </div>
                                </div>

                            @endforeach

                            </tbody><!-- end tbody -->
                        </table><!-- end table -->

                    </div><!-- end table responsive -->

                </div><!-- end card body -->

            </div><!-- end card -->
            {{$apply_jobs->links()}}
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.un_satic_div').hide();
            $('.unsatic').click(function () {
                $('.un_satic_div').show();
            })

            $('.safic').click(function () {
                $('.un_satic_div').hide();
            })
        })
    </script>
@endsection
