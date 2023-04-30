@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Job Task Report Details</h4>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0" id="alldeposit">

                        <thead class="table-light">
                        </thead>
                        <tbody>
                        <?php
                        $job_apply = \App\Models\job_apply::where('id', $job_report->apply_id)->first();
                        $job = \App\Models\all_job::where('id', $job_report->job_id)->first();
                        $created_by = \App\Models\User::where('id', $job->user_id)->first();
                        $reported_to = \App\Models\User::where('id', $job_report->applied_user_id)->first();
                        ?>
                        <tr>
                            <td><strong>Job ID</strong> : {{$job_apply->id}}</td>
                        </tr>
                        <tr>
                            <td><strong>Job Title</strong> : {!! $job->job_title !!} </td>
                        </tr>
                        <tr>
                            <td><strong>Task ID</strong> : {!! $job_apply->task_name !!} </td>
                        </tr>
                        <tr>
                            <td><strong>Job Created By</strong> : {{$created_by->name}}</td>
                        </tr>
                        <tr>
                            <td><strong>Reported By</strong> : {{$created_by->name}}</td>
                        </tr>
                        <tr>
                            <td><strong>Reported To</strong> : @if($reported_to)
                                    {{$reported_to->name}}
                                @endif</td>
                        </tr>
                        <tr>
                            <td><strong>Reason</strong> : {{$job_report->report_desc}}</td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Status</strong> :
                                @if($job_report->is_review == 0)
                                    Need Action
                                @elseif($job_report->is_review == 1)
                                    Reviewed
                                @else
                                    Not Set
                                @endif

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>


            </div>

        </div>
        @if($job_report->is_review == 0)
            <a href="{{route('admin.user.task.report.makereviewed',$job_report->id)}}">
                <button class="btn btn-success btn-sm ">Mark as Review</button>
            </a>
        @endif
    </div>
@endsection
