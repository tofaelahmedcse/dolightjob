@extends('layouts.admin')
@section('title')
    Find Job
@endsection
@section('admin')
    <div class="loading">Loading</div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Find Job</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="d-flex filter-all">
        <div class="me-2 mb-3">
            <label>Region</label>
            <select class="form-select form-select-sm reg_fil">
                <option value="">Select Any</option>
                @foreach($all_reg as $reg)
                    <option value="{{$reg->region}}">{{$reg->region}}</option>
                @endforeach
            </select>
        </div>
        <div class="me-2 mb-3">
            <label>Job Category</label>
            <select class="form-select form-select-sm mcat_filter">
                <option value="">Select Any</option>
            </select>
        </div>
        <div class="me-2 mb-3">
            <label>Sub category</label>
            <select class="form-select form-select-sm scat_filter">
                <option value="">Select Any</option>
            </select>
        </div>
        <div class="me-2 mb-3">
            <label>Job title</label>
            <input type="text" class="form-control form-control-sm search_title" placeholder="Enter Here..">
        </div>
        <div class="me-2 mb-3 align-self-end">
            <button type="button" class="btn btn-sm btn-primary" id="goBtn">Go</button>
        </div>
    </div>
    <div class="row all_jobs">

    </div>



    <div class="row shimmer_loader_animation">

        <div class="shimmer-loader d-none d-md-block">
            @for($i=0;$i<24;$i++)
                <div class="shimmer-items">
                    <div class="line-container w-100">
                        <div class="line-items animate"></div>
                        <div class="line-items animate"></div>
                        <div class="line-items animate"></div>
                    </div>
                </div>
            @endfor
        </div>
    </div>


    <div class="row no_job_found">
        <h3 class="text-center">No Job Found</h3>
    </div>

    <div class="row no_more_jobs">
        <h3 class="text-center">No More Jobs</h3>
    </div>

@endsection
@include('admin.findjob.include.findJobInc')
