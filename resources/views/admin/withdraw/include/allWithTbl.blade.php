@foreach($withdraw as $witd)
<tr>
    <td>{{$witd->transaction_id}}</td>
    <td>{{$witd->user->name ?? ''}}<br>{{$witd->user->email ?? ''}}</td>
    <td>
        @if($witd->withdraw_type == 1)
            Bkash
        @elseif($witd->withdraw_type == 2)
            Rocket
        @else
        Not Set
        @endif
    </td>
    <td>{{$witd->receiver_number}}</td>
    <td>{{number_format($witd->amount,2)}}</td>
    <td>{{number_format($witd->usd_rate,2)}}</td>
    <td>{{number_format($witd->user_will_get,2)}}</td>
    <td>
        @if($witd->status == 0)
            Pending
        @elseif($witd->withdraw_type == 1)
            Completed
        @elseif($witd->withdraw_type == 2)
            Rejected
        @else
            Not Set
        @endif
    </td>
    <td>{{\Carbon\Carbon::parse($witd->created_at)->format('Y-m-d')}}</td>
    <td>
        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editwithmodal{{$witd->id}}"><i class="fas fa-edit"></i> </button>
        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#deletewithmodal{{$witd->id}}"><i class="fas fa-trash"></i> </button>


        <div class="modal fade" id="editwithmodal{{$witd->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Withdraw Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('admin.withdraw.status.change')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Select Status</label>
                                <select class="form-control" name="status">
                                    <option value="1">Approved</option>
                                    <option value="2">Rejected</option>
                                </select>
                                <input type="hidden" class="form-control edit_with_id" name="edit_with_id" value="{{$witd->id}}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Comment</label>
                                <textarea class="form-control" cols="5" rows="5"
                                          name="with_comment">{!! $gen->default_dep_msg !!}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="modal fade" id="deletewithmodal{{$witd->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Delete Withdraw</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('admin.withdraw.delete')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>are you sure to delete this withdraw ?</label>
                                <input type="hidden" class="form-control delete_with_id" name="delete_with_id" value="{{$witd->id}}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="deleteMainCat">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </td>
</tr>



@endforeach
