@extends('layouts.user')
@section('title')
    Post Job
@endsection
@section('user')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Create Job</h4>
                    <form action="{{route('user.post.job.save')}}" method="post" enctype="multipart/form-data" id="post_job">
                    <div id="basic-example">
                        <!-- Seller Details -->
                        <h3>Location</h3>
                        <section>

                                @csrf
                                <div class="row">
                                    <div>
                                        <div class="mb-4">
                                            <div>
                                                <h5 class="mb-1">Select Location</h5>
                                            </div>
                                        </div>
                                        <ul class="list-inline nav mb-3 location-category">
                                            @foreach($all_reg as $reg)

                                                <li class="list-inline-item mb-2 regg_name {{$loop->first ? 'active':''}}"
                                                    data-id="{{$reg->region}}">

                                                    <button type="button"
                                                            class="btn btn-sm btn-outline-primary reg_btn {{$loop->first ? 'active':''}}"
                                                            data-bs-toggle="tab" data-bs-target="#{{$reg->region}}">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio"
                                                                       value="{{$reg->region}}"
                                                                       class="form-check-input d-none reg_name"
                                                                       {{$loop->first ? 'checked':''}}
                                                                       name="region_name">{{$reg->region}}
                                                            </label>
                                                        </div>
                                                    </button>

                                                </li>

                                            @endforeach

                                        </ul>
                                        <div class="tab-content location-sub-category">
                                            <hr>
                                            <h6 class="mb-3">Select Country</h6>
                                            @foreach($all_reg as $regn)
                                                <div class="tab-pane show {{$loop->first ? 'show active' : ''}}"
                                                     id="{{$regn->region}}">
                                                    <?php
                                                    $countrys = \App\Models\region_country::where('region', $regn->region)->orderBy('country_name','ASC')->get();
                                                    ?>
                                                    <ul class="list-inline">
                                                        @foreach($countrys as $count)
                                                            <li class="list-inline-item mb-3 country_id job_coun_id"
                                                                data-id="{{$count->id}}">
                                                                <button type="button"
                                                                        class="btn btn-sm btn-light country_btn"
                                                                        data-id="{{$count->id}}">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox"
                                                                               class="form-check-input d-none country_name"
                                                                               value="{{$count->id}}"
                                                                               name="country_name[]">{{$count->country_name}}
                                                                    </label>
                                                                </button>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                        @endforeach
                                        <!-- /for loop -->

                                        </div>
                                    </div>
                                </div>




                        </section>

                        <!-- Company Document -->
                        <h3>Category</h3>
                        <section>
{{--                            <form>--}}
                                <div class="row">
                                    <div>
                                        <div>
                                            <div class="">
                                                <div>
                                                    <h5 class="mb-1">Select Category</h5>
                                                </div>
                                            </div>
                                            <br>
                                            <ul class="list-inline nav mb-3 location-category main_cats">
                                                <li class="list-inline-item mb-2">
                                                    <button type="button"
                                                            class="btn btn-sm btn-outline-primary active"
                                                            data-bs-toggle="tab" data-bs-target="#assignment">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio"
                                                                       class="form-check-input d-none main_category"
                                                                       name="job-category">
                                                            </label>
                                                        </div>
                                                    </button>
                                                </li>

                                            </ul>
                                            <div class="tab-content location-sub-category">
                                                <hr>
                                                <h6 class="mb-3">Select Sub Category</h6>
                                                <div class="tab-pane show active" id="jobsubcats">
                                                    <ul class="list-inline sub_cats">


                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


{{--                            </form>--}}
                        </section>

                        <!-- Bank Details -->
                        <h3>Job Details</h3>
                        <section>
                            <div>
{{--                                <form>--}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Job Title <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="job_title" class="form-control job_title"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Thumbnail Image</label>
                                                <input type="file" name="thumbnail" class="form-control" id="fileup">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>What specific tasks need to be Completed? <span
                                                        class="text-danger">*</span></label>
                                                <textarea class="form-control specific_task" name="specific_task"
                                                          cols="7" rows="7"
                                                          placeholder="Write here..." required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Required proof the job was Completed <span
                                                        class="text-danger">*</span></label>
                                                <textarea class="form-control require_proof" name="require_proof"
                                                          cols="7" rows="7"
                                                          placeholder="Write here..." required></textarea>
                                            </div>
                                        </div>

                                    </div>

{{--                                </form>--}}
                            </div>
                        </section>

                        <!-- Confirm Details -->
                        <h3>Budget</h3>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Worker Need <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="worker_need"
                                                       class="form-control worker_need" value="1"
                                                       placeholder="Enter here..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Each worker Earn <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="each_worker_earn"
                                                       class="form-control each_worker_earn"
                                                       placeholder="Enter here..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Require Screenshots <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control screen_short" name="screenshot">
                                                    <option value="">select any</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Estimated Day <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control est_day" name="est_day">
                                                    <option value="">select any</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold text-center">Estimated
                                                Job
                                                Cost</h5>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">$</span>
                                                <input type="text" name="est_job_cost"
                                                       class="form-control est_job_cost"
                                                       placeholder="Enter here..." readonly>
                                            </div>
                                            <p class="text-danger text-center">My
                                                Balance {{$gen_settings->site_currency}} {{number_format(Auth::user()->balance,2)}}</p>
                                            <p class="text-danger text-center">Minimum
                                                spend {{$gen_settings->site_currency}} {{number_format($gen_settings->job_post_min_amt,2)}}</p>
                                            <div class="text-center">
                                                <button type="button"
                                                        class="btn btn-sm btn-warning">Please
                                                    Deposit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    </form>

                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
@include('user.job.include.postJobInc')
