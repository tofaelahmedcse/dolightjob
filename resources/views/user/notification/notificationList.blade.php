@extends('layouts.user')
@section('title')
    Notification
@endsection
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Notifications</h4>
                <div class="page-title-right">

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Notification List</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table
                            class="table table-borderless table-nowrap align-middle mb-0">
                            <thead class="table-light">
                            <tr class="text-muted">
                                <th scope="col" style="width: 20%;">Type</th>
                                <th scope="col" style="width: 60%;">Title</th>
                                <th scope="col" style="width: 10%;">Date</th>
                                <th scope="col" style="width: 10%;">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($notifications as $noti)
                                <tr>
                                    <td>
                                        @if($noti->type == 1)
                                            Job
                                        @elseif($noti->type == 2)
                                            Deposit
                                        @elseif($noti->type == 3)
                                            Withdraw
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                    <td>
                                        {{$noti->title}}
                                    </td>
                                    <td>
                                        {{\Carbon\Carbon::parse($noti->created_date)->format('Y-m-d')}}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-light " data-bs-toggle="modal"
                                                data-bs-target="#viewnotification{{$noti->id}}">View
                                        </button>
                                    </td>
                                </tr>



                                <div class="modal fade" id="viewnotification{{$noti->id}}" data-bs-backdrop="static"
                                     data-bs-keyboard="false" tabindex="-1"
                                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <form action="{{route('user.all.notification.update.status')}}" method="post">
                                            @csrf

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Notification
                                                        Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>{!! $noti->description !!}</label>
                                                        <input type="hidden" class="form-control " name="user_noti_id"
                                                               value="{{$noti->id}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary" id="deleteMainCat">
                                                        Mark as Read
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            @endforeach

                            </tbody><!-- end tbody -->
                        </table><!-- end table -->

                    </div><!-- end table responsive -->

                </div><!-- end card body -->

            </div><!-- end card -->
        </div>
    </div>
@endsection
