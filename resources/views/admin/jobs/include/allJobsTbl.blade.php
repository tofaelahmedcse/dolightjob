@foreach($jobs as $job)
<tr>
    <th>{{$job->user->name ?? ''}}<br>{{$job->user->email ?? ''}}</th>
    <th>{{$job->job_title}}</th>
    <th>{{number_format($job->est_job_cost,2)}}</th>
    <th>
        @if($job->job_status == 1)
            Pending
        @elseif($job->job_status == 2)
            Approved
        @elseif($job->job_status == 3)
            Pushed
        @elseif($job->job_status == 4)
            Rejected
        @else
            Not Set
        @endif
    </th>
    <th>{{\Carbon\Carbon::parse($job->created_at)->format('Y-m-d')}}</th>
    <th>
        <a href="{{route('admin.job.details', $job->id)}}"><button type="button" class="btn btn-sm btn-light ">View</button></a>
    </th>
</tr>
@endforeach
