@extends('layouts.user')
@section('title')
    My Jobs
@endsection
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">My Jobs</h4>
                <div class="page-title-right">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">My Jobs List</h4>
                <div class="table-responsive">
                    <table class="table mb-0" id="alldeposit">
                        <thead class="table-light job-list-header bg-fountain-blue">
                        <tr>
                            <th>Thumbnail</th>
                            <th>ID</th>
                            <th>Job Title</th>
                            <th>Payment</th>
                            <th>Job Done</th>
                            <th>Pending</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="job-list-item">
                        @foreach($my_jobs as $job)
                            <?php
                            $count_workder = \App\Models\job_apply::where('job_id',$job->id)->count();
                            $percen = ($count_workder * 100) / $job->worker_need;
                            $pending = $job->worker_need - $count_workder;
                            ?>
                            <tr>
                                <td>
                                    <div class="avatar-sm bg-light rounded p-1 me-2">
                                        @if (file_exists($job->thumbnail) && !empty($job->thumbnail))
                                            <img src="{{asset($job->thumbnail)}}" alt=""  class="img-fluid d-block">
                                        @else
                                            <img src="https://themesfinity.com/wp-content/uploads/2018/02/default-placeholder.png" alt=""  class="img-fluid d-block">
                                        @endif

                                    </div>
                                </td>
                                <td>{{$job->job_id}}</td>
                                <td>{{substr($job->job_title,0,15)}}</td>
                                <td>{{$job->each_worker_earn}}</td>
                                <td>{{$job->each_worker_earn}}
                                    <span class="badge badge-soft-danger fs-12">
                                        {{$percen}}%
                                    </span>
                                </td>
                                <td>{{$pending}}</td>
                                <td>
                                    @if ($job->job_status == 1)
                                        In-Review
                                    @elseif($job->job_status == 2)
                                        Approved
                                    @elseif($job->job_status == 3)
                                        Pushed
                                    @elseif($job->job_status == 4)
                                        Rejected
                                    @else
                                        Not Set
                                    @endif
                                </td>
                                <td>{{\Carbon\Carbon::parse($job->created_at)->format('Y-m-d')}}</td>
                                <td>
                                    <a href="{{route('user.find.job.details',$job->id)}}" class="btn btn-sm btn-soft-primary">View</a>
                                    <a href="{{route('user.job.edit',$job->id)}}" class="btn btn-sm btn-soft-secondary">Edit</a>
                                    <a href="{{route('user.job.delete',$job->id)}}" class="btn btn-sm btn-soft-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
        {{$my_jobs->links()}}
    </div>




    <div class="modal fade" id="deletemaincategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Main Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>are you sure to delete this main category ?</label>
                        <input type="hidden" class="form-control delete_main_cat_id" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="deleteMainCat">Delete</button>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('js')
    <script>





    </script>
@endsection
