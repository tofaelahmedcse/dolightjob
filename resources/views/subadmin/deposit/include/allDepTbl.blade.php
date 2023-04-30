@foreach($all_deposit as $dep)
    <?php
        $gateway = \App\Models\gateway::select('id','gateway_name')->where('id',$dep->gateway_id)->first();
    ?>
    <tr>
        <td>{{$dep->user->name ?? ''}}<br>({{$dep->user->email ?? ''}})</td>
        <td>
            @if($gateway)
                {{$gateway->gateway_name}}
            @endif
        </td>
        <td>{{$dep->sender_number}}</td>
        <td>{{$dep->transaction_number}}</td>
        <td>{{number_format($dep->amount,2)}}</td>
        <td>{{number_format($dep->usd_rate,2)}}</td>
        <td>{{number_format($dep->total_usd,2)}}</td>
        <td>
            @if($dep->status == 0)
                Pending
            @elseif($dep->status == 1)
                Completed
            @elseif($dep->status == 2)
                Rejected
            @else
                Not Set
            @endif
        </td>
        <td>{{$dep->created_at}}</td>
        <td>
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editdepositmodal{{$dep->id}}"><i class="fas fa-edit"></i> </button>
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#deletedepositmodal{{$dep->id}}"><i class="fas fa-trash"></i> </button>



            <div class="modal fade" id="editdepositmodal{{$dep->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Update Deposit Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('admin.deposit.status.change')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <select class="form-control" name="status">
                                        <option value="1">Approved</option>
                                        <option value="2">Rejected</option>
                                    </select>
                                    <input type="hidden" class="form-control edit_dep_id" name="edit_dep_id" value="{{$dep->id}}">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Comment</label>
                                    <textarea class="form-control" cols="5" rows="5"
                                              name="deposit_comment">{!! $gen->default_dep_msg !!}</textarea>
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


            <div class="modal fade" id="deletedepositmodal{{$dep->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete Deposit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('admin.deposit.delete')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>are you sure to delete this deposit ?</label>
                                    <input type="hidden" class="form-control delete_dep_id" name="delete_dep_id" value="{{$dep->id}}">
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
