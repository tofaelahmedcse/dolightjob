@extends('layouts.admin')
@section('admin')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">General Settings</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">


                <div class="card-body">

                    <div class="live-preview">
                        <form class="row g-3" action="{{route('admin.general.settings.save')}}" method="post">
                            @csrf
                            <div class="col-md-3">
                                <label for="validationDefault01" class="form-label">Site Name</label>
                                <input type="text" class="form-control" name="site_name"
                                       value="{{$gen->site_name}}">
                            </div>

                            <div class="col-md-3">
                                <label for="validationDefault01" class="form-label">Site Email</label>
                                <input type="text" class="form-control" name="site_email"
                                       value="{{$gen->site_email}}">
                            </div>

                            <div class="col-md-3">
                                <label for="validationDefault01" class="form-label">Site Phone Number</label>
                                <input type="text" class="form-control" name="site_phone"
                                       value="{{$gen->site_phone}}">
                            </div>

                            <div class="col-md-3">
                                <label for="validationDefault01" class="form-label">Welcome Balance</label>
                                <input type="text" class="form-control" name="welcome_balance"
                                       value="{{number_format($gen->welcome_balance,2)}}">
                            </div>

                            <div class="col-md-12">
                                <label for="validationDefault01" class="form-label">Site Address</label>
                                <textarea class="form-control" cols="4" rows="4"
                                          name="site_address">{!! $gen->site_address !!}</textarea>
                            </div>

                            <div class="col-md-3">
                                <label for="validationDefault01" class="form-label">Is Maintenance</label>
                                <select class="form-control" name="is_under_main">
                                    <option value="0">select any</option>
                                    <option value="1" {{$gen->is_under_main == 1 ? 'selected' :''}}>Yes</option>
                                    <option value="2" {{$gen->is_under_main == 2 ? 'selected' :''}}>No</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="validationDefault01" class="form-label">Job Auto Post</label>
                                <select class="form-control" name="job_auto_post">
                                    <option value="0">select any</option>
                                    <option value="1" {{$gen->job_auto_post == 1 ? 'selected' :''}}>Yes</option>
                                    <option value="2" {{$gen->job_auto_post == 2 ? 'selected' :''}}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="validationDefault01" class="form-label">Auto Post Date</label>
                                <input type="number" class="form-control" name="auto_post_date"
                                       value="{{$gen->auto_post_date}}">
                            </div>

                            <div class="col-md-3">
                                <label for="validationDefault01" class="form-label">USD Rate</label>
                                <input type="text" class="form-control" name="usd_rate"
                                       value="{{number_format($gen->usd_rate,2)}}">
                            </div>

                            <div class="col-md-3">
                                <label for="validationDefault01" class="form-label">Job Service Charge(%)</label>
                                <input type="text" class="form-control" name="service_charge"
                                       value="{{$gen->service_charge}}">
                            </div>

                            <div class="col-md-3">
                                <label for="validationDefault01" class="form-label">Job Post Min Amount</label>
                                <input type="text" class="form-control" name="job_post_min_amt"
                                       value="{{number_format($gen->job_post_min_amt,2)}}">
                            </div>

                            <div class="col-md-3">
                                <label for="validationDefault01" class="form-label">ScreenShot Price</label>
                                <input type="text" class="form-control" name="screenshot_price"
                                       value="{{number_format($gen->screenshot_price,2)}}">
                            </div>

                            <div class="col-md-3">
                                <label for="validationDefault01" class="form-label">Site Currency</label>
                                <input type="text" class="form-control" name="site_currency"
                                       value="{{$gen->site_currency}}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Default Job Message</label>
                                <textarea class="form-control" id="job-msg" cols="4" rows="4"
                                          name="default_job_msg">{!! $gen->default_job_msg !!}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Default Deposit Message</label>
                                <textarea class="form-control" id="dep-msg" cols="4" rows="4"
                                          name="default_dep_msg">{!! $gen->default_dep_msg !!}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Default Withdraw Message</label>
                                <textarea class="form-control" id="wit-msg" cols="4" rows="4"
                                          name="default_with_msg">{!! $gen->default_with_msg !!}</textarea>
                            </div>


                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Dashboard Notification
                                    Message</label>
                                <textarea class="form-control" id="wit-msg" cols="4" rows="4"
                                          name="das_noti_msg">{!! $gen->das_noti_msg !!}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Deposit Notification Message</label>
                                <textarea class="form-control" id="wit-msg" cols="4" rows="4"
                                          name="dep_noti_msg">{!! $gen->dep_noti_msg !!}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Withdraw Notification
                                    Message</label>
                                <textarea class="form-control" id="wit-msg" cols="4" rows="4"
                                          name="with_noti_msg">{!! $gen->with_noti_msg !!}</textarea>
                            </div>

                            <div class="col-md-3">
                                <label for="validationDefault01" class="form-label">Withdraw Service Charge (%)</label>
                                <input type="text" class="form-control" name="with_ser_charge"
                                       value="{{number_format($gen->with_ser_charge,2)}}">
                            </div>

                            <div class="col-md-3">
                                <label for="validationDefault01" class="form-label">Job Unsatisfaction Limit (%)</label>
                                <input type="number" class="form-control" name="job_unsatis_limit"
                                       value="{{$gen->job_unsatis_limit}}">
                            </div>


                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection

@section('js')
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>


    <script>
        // CKEDITOR.replace('job-msg');
        // CKEDITOR.replace('dep-msg');
        // CKEDITOR.replace('wit-msg');
    </script>

@endsection
