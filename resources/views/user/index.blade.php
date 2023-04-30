@extends('layouts.user')
@section('title')
    Dashboard
@endsection
@section('user')


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row dashboard-item">

        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body bg-grd-blue rounded-3">
                            <div class="d-flex">
                                <div class="flex-grow-1 ">
                                    <p class="fw-medium text-white ">Total Jobs</p>
                                    <h4 class="mb-0 text-white ">{{number_format($total_jobs,2)}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body bg-grd-jelly-bean rounded-3">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="fw-medium text-white ">Pending Jobs</p>
                                    <h4 class="mb-0 text-white ">{{$pen_jobs}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body bg-grd-blumine rounded-3">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class=" text-white  fw-medium">Approved Jobs</p>
                                    <h4 class=" text-white  mb-0">{{$app_jobs}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body bg-grd-moody-blue rounded-3">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class=" text-white  fw-medium">Rejected Jobs</p>
                                    <h4 class=" text-white  mb-0">{{$rej_jobs}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body bg-grd-blue-smoke rounded-3">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class=" text-white  fw-medium">Total Deposit</p>
                                    <h4 class=" text-white  mb-0">{{$gnl->site_currency}} {{number_format($to_dep,2)}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body bg-grd-wedgewood rounded-3">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-white fw-medium">Pending Deposit</p>
                                    <h4 class="mb-0 text-white">{{$gnl->site_currency}} {{number_format($pen_dep,2)}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body bg-grd-cerulean rounded-3">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-white fw-medium">Approved Deposit</p>
                                    <h4 class="mb-0 text-white">{{$gnl->site_currency}} {{number_format($app_dep,2)}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body bg-grd-summer-green rounded-3">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-white fw-medium">Rejected Deposit</p>
                                    <h4 class="mb-0 text-white">{{$gnl->site_currency}} {{number_format($rej_dep,2)}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body bg-grd-good-purple rounded-3">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-white fw-medium">Total Withdraw</p>
                                    <h4 class="mb-0 text-white">{{$gnl->site_currency}} {{number_format($tot_wid,2)}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body bg-grd-good-samaritan rounded-3">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-white fw-medium">Pending Withdraw</p>
                                    <h4 class="mb-0 text-white">{{$gnl->site_currency}} {{number_format($pen_wid,2)}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body bg-grd-deep-blue rounded-3">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-white fw-medium">Approved Withdraw</p>
                                    <h4 class="mb-0 text-white">{{$gnl->site_currency}} {{number_format($app_wid,2)}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body bg-grd-good-light-green rounded-3">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-white fw-medium">Rejected Withdraw</p>
                                    <h4 class="mb-0 text-white">{{$gnl->site_currency}} {{number_format($rej_wid,2)}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            <!-- end row -->


        </div>
    </div>
    <!-- end row -->

    <div class="row mb-4">
        <div class="col-xl-6">
            <div class="card h-100">
                <div class="card-header align-items-center d-flex d-flex px-2 py-3">
                    <h4 class="card-title mb-0 flex-grow-1">Recent Jobs</h4>
                </div><!-- end card header -->
                <div class="card-body p-0 bg-grd-silk-blue overflow-hidden">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                            <thead class="table-light bg-fountain-blue">
                            <tr class="text-muted">
                                <th scope="col">Title</th>
                                <th scope="col">EST Amount</th>
                                <th scope="col">Created Date</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($recent_jobs as $rec_job)
                                <tr>
                                    <td title="data">{{$rec_job->job_title}}</td>
                                    <td>{{$gnl->site_currency}} {{number_format($rec_job->est_job_cost,2)}}</td>
                                    <td>{{\Carbon\Carbon::parse($rec_job->created_at)->format('Y-m-d')}}</td>
                                </tr>
                            @endforeach



                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div><!-- end table responsive -->
                </div><!-- end card body -->
            </div><!-- end card -->
        </div>
        <div class="col-xl-6">
            <div class="card h-100">
                <div class="card-header align-items-center d-flex px-2 py-3">
                    <h4 class="card-title mb-0 flex-grow-1">Recent Deposit</h4>
                </div><!-- end card header -->
                <div class="card-body p-0 bg-grd-silk-blue overflow-hidden">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-hover table-nowrap align-middle mb-0 rounded-3 overflow-hidden">
                            <thead class="table-light bg-fountain-blue">
                            <tr class="text-muted">
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($recent_dep as $rec_dep)
                                <tr>
                                    <td title="data">{{$gnl->site_currency}} {{$rec_dep->amount}}</td>
                                    <td>
                                        @if ($rec_dep->status == 0)

                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($rec_dep->status == 1)

                                            <span class="badge bg-success">Approved</span>
                                        @elseif($rec_dep->status == 2)

                                            <span class="badge bg-danger">Rejected</span>
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($rec_dep->created_at)->format('Y-m-d')}}</td>
                                </tr>
                            @endforeach

                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div><!-- end table responsive -->
                </div><!-- end card body -->
            </div><!-- end card -->
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card h-100">
                <div class="card-header align-items-center d-flex d-flex px-2 py-3">
                    <h4 class="card-title mb-0 flex-grow-1">Recent Withdraw</h4>
                </div><!-- end card header -->
                <div class="card-body p-0 bg-grd-silk-blue overflow-hidden">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                            <thead class="table-light bg-fountain-blue">
                            <tr class="text-muted">
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($recent_with as $rec_with)
                                <tr>
                                    <td title="data">{{$gnl->site_currency}} {{$rec_with->amount}}</td>
                                    <td>
                                        @if ($rec_with->status == 0)

                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($rec_with->status == 1)

                                            <span class="badge bg-success">Approved</span>
                                        @elseif($rec_with->status == 2)

                                            <span class="badge bg-danger">Rejected</span>
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($rec_with->created_at)->format('Y-m-d')}}</td>
                                </tr>
                            @endforeach

                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div><!-- end table responsive -->
                </div><!-- end card body -->
            </div><!-- end card -->
        </div>

    </div>
@endsection
