@foreach ($all_jobs as $job)

    <div class="col-md-6 project-card">
        <div class="card card-height-100">
            <div class="card-body">
                <div class="d-flex flex-column h-100">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted mb-4">Created Date
                                : {{\Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</p>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="d-flex gap-1 align-items-center">
                                <button type="button" class="btn avatar-xs mt-n1 p-0 favourite-btn">
                                    {{$job->each_worker_earn}}
                                </button>
                                <div class="dropdown">
                                    <button
                                        class="btn btn-link text-muted p-1 mt-n2 py-0 text-decoration-none fs-15"
                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                             height="24" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-more-horizontal icon-sm">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item"
                                           href="{{route('admin.find.job.details',$job->id)}}"><i
                                                class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                            View</a>
                                        @if ($job->user_id == Auth::user()->id)
                                            <a class="dropdown-item" href="{{route('admin.find.job.details',$job->id)}}"><i
                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                               data-bs-target="#removeProjectModal"><i
                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                Remove</a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mb-2">
                        <div class="flex-shrink-0 me-3 align-self-center">
                            <div class="avatar-sm">
                                                    <span class="avatar-title bg-soft-danger rounded p-2">
                                                        <img src="assets/images/brands/dribbble.png" alt=""
                                                             class="img-fluid p-1">
                                                    </span>
                            </div>
                        </div>
                        <div class="flex-grow-1 align-self-center">
                            <h5 class="mb-1 fs-15"><a href="{{route('admin.find.job.details',$job->id)}}"
                                                      class="text-dark">{{$job->job_title}}</a>
                            </h5>
                        </div>
                    </div>
                    <div class="mt-auto">
                        <div class="d-flex mb-2">
                            <div class="flex-grow-1">
                                <div>Tasks</div>
                            </div>
                            <?php
                            $count_workder = \App\Models\job_apply::where('job_id', $job->id)->where('is_submit', '!=', null)->where('status', '!=', 3)->count();
                            $percen = ($count_workder * 100) / $job->worker_need;
                            ?>
                            <div class="flex-shrink-0">
                                <div><i class="ri-list-check align-bottom me-1 text-muted"></i>
                                    {{$count_workder}}/{{$job->worker_need}}</div>
                            </div>
                        </div>
                        <div class="progress progress-sm animated-progress">

                            <div class="progress-bar bg-success" role="progressbar"
                                 aria-valuenow="{{$count_workder}}" aria-valuemin="0"
                                 aria-valuemax="{{$job->worker_need}}"
                                 style="width: {{$percen}}%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card body -->
            <div class="card-footer bg-transparent border-top-dashed py-2">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="text-muted">

                            <i class="ri-user-line me-1 align-bottom"></i> Posted By:
                            {{$job->user->name ?? ''}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card footer -->
        </div>
    </div>

@endforeach

