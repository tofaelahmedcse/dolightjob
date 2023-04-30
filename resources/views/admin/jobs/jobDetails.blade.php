@extends('layouts.admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Job Info</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <form action="{{route('admin.job.details.update')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="project-title-input">Project Title</label>
                            <input type="text" value="{{$job_edit->job_title}}" class="form-control"
                                   id="project-title-input" placeholder="Enter project title">
                            <input type="hidden" name="edit_job_id" value="{{$job_edit->id}}" class="form-control"
                                   id="project-title-input" placeholder="Enter project title">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="project-thumbnail-img">Thumbnail Image</label>
                            @if (file_exists($job_edit->thumbnail) && !empty($job_edit->thumbnail))
                                <img src="{{asset($job_edit->thumbnail)}}" style="height: 200px;width: 100%">
                            @endif
                            <input class="form-control" id="project-thumbnail-img" type="file"
                                   accept="image/png, image/gif, image/jpeg">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="project-title-input">What specific tasks need to be
                                Completed?</label>
                            <textarea type="text" cols="7" rows="7" class="form-control" id="project-title-input"
                                      placeholder="Enter project title">{!! $job_edit->specific_task !!}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="project-title-input">Required proof the job was
                                Completed</label>
                            <textarea type="text" cols="7" rows="7" class="form-control" id="project-title-input"
                                      placeholder="Enter project title">{!! $job_edit->require_proof !!}</textarea>
                        </div>

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div>
                                    <label for="datepicker-deadline-input" class="form-label">Old Worker</label>
                                    <input type="text" class="form-control" value="{{$job_edit->worker_need}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <label for="datepicker-deadline-input" class="form-label">New Worker Need</label>
                                    <input type="text" class="form-control new_workder">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <label for="datepicker-deadline-input" class="form-label">Each worker Earn</label>
                                    <input type="text" class="form-control" value="{{$job_edit->each_worker_earn}}"
                                           readonly>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="col-lg-4">
                                <div>
                                    <label for="datepicker-deadline-input" class="form-label">Require
                                        Screenshots</label>
                                    <input type="text" class="form-control" value="{{$job_edit->screenshot}}" readonly>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div>
                                    <label for="datepicker-deadline-input" class="form-label">Estimated Day</label>
                                    <input type="text" class="form-control" value="{{$job_edit->est_day}}">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div>
                                    <label for="datepicker-deadline-input" class="form-label">Total Job Cost</label>
                                    <input type="text" class="form-control" value="{{$job_edit->est_job_cost}}"
                                           readonly>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <label for="datepicker-deadline-input" class="form-label">Job Status</label>
                                    <select class="form-control" name="job_status">
                                        <option value="0">select any</option>
                                        <option value="1" {{$job_edit->job_status == 1 ?'selected':''}}>Pending</option>
                                        <option value="2" {{$job_edit->job_status == 2 ?'selected':''}}>Approved
                                        </option>
                                        <option value="3" {{$job_edit->job_status == 3 ?'selected':''}}>Pushed</option>
                                        <option value="4" {{$job_edit->job_status == 4 ?'selected':''}}>Rejected
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12" style="margin-top: 20px;">
                                <div>
                                    <label for="datepicker-deadline-input" class="form-label">Description</label>
                                    <textarea type="text" cols="7" rows="7" class="form-control"
                                              name="notification_details"
                                              required>{!! $gen->default_job_msg !!}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-12" style="margin-top: 20px;">
                                <button class="btn btn-block btn-primary" style="width: 100%">Submit</button>
                            </div>

                        </div>


                    </div>
                    <!-- end card body -->
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-4">

                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Region And Category</h5>
                    </div>
                    <?php
                    $main_cat = \App\Models\job_main_category::where('id', $job_edit->main_category)->first();
                    $sub_main_cat = \App\Models\job_sub_category::where('id', $job_edit->sub_category)->first();
                    $country = \App\Models\all_job_country::where('job_id', $job_edit->id)->get();
                    $array_coun = [];
                    foreach ($country as $coun) {
                        array_push($array_coun, str($coun->country_name));
                    }

                    $coun_name = implode(", ", $array_coun);


                    ?>
                    <div class="card-body">
                        <div>
                            <label for="choices-text-input" class="form-label">Region</label>
                            <input class="form-control" type="text" value="{{$job_edit->region_name}}" readonly/>
                        </div>
                        <div>
                            <label for="choices-text-input" class="form-label">Country</label>
                            <input class="form-control" type="text" value="{{$coun_name}}" readonly/>
                        </div>
                        <div class="mb-3">
                            <label for="choices-categories-input" class="form-label">Main Categories</label>
                            @if ($main_cat)
                                <input class="form-control" type="text" value="{{$main_cat->category_name}}" readonly/>
                            @else
                                <input class="form-control" type="text" value="" readonly/>
                            @endif

                        </div>

                        <div class="mb-3">
                            <label for="choices-categories-input" class="form-label">Sub Categories</label>
                            @if ($sub_main_cat)
                                <input class="form-control" type="text" value="{{$sub_main_cat->category_name}}"
                                       readonly/>
                            @else
                                <input class="form-control" type="text" value="" readonly/>
                            @endif
                        </div>


                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->


                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">User Info</h5>
                    </div>
                    <?php
                    $user_info = \App\Models\User::where('id', $job_edit->user_id)->first();


                    ?>
                    <div class="card-body">
                        <div>
                            <label for="choices-text-input" class="form-label">ID</label>
                            <input class="form-control" type="text" value="{{$user_info->user_ref_id}}" readonly/>
                        </div>
                        <br>
                        <div>
                            <label for="choices-text-input" class="form-label">Name</label>
                            <input class="form-control" type="text" value="{{$user_info->name}}" readonly/>
                        </div>
                        <br>
                        <div>
                            <label for="choices-text-input" class="form-label">Email</label>
                            <input class="form-control" type="text" value="{{$user_info->email}}" readonly/>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="choices-categories-input" class="form-label">Phone Number</label>
                            <input class="form-control" type="text" value="{{$user_info->phone_number}}" readonly/>

                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="choices-categories-input" class="form-label">Balance</label>
                            <input class="form-control" type="text" value="{{$user_info->balance}}" readonly/>
                        </div>


                    </div>
                    <!-- end card body -->
                </div>


                <!-- end card -->
            </div>


            <!-- end col -->
        </div>
    </form>
    <!-- end row -->
@endsection
