@foreach($users as $user)
<tr>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->phone_number}}</td>
    <td>
        @if($user->account_status == 1)
            In-Active
        @elseif($user->account_status == 2)
            Active
        @elseif($user->account_status == 3)
            Blocked
        @else
        Not Set
        @endif
    </td>
    <td>{{\Carbon\Carbon::parse($user->created_at)->format('Y-m-d')}}</td>
    <td>
        <a href="{{route('admin.user.details',$user->id)}}">
            <button class="btn btn-success btn-sm" ><i class="fas fa-edit"></i> </button>
        </a>
    </td>
</tr>
@endforeach
