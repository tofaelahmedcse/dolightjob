@extends('layouts.user')
@section('title')
    Transaction
@endsection
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">All Transaction</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">


                <div class="card-body">

                    <div class="live-preview">
                        <div class="table-responsive">
                            <table class="table mb-0" id="alldeposit">
                                <thead class="table-light job-list-header bg-fountain-blue">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th >Type</th>
                                    <th >Amount</th>
                                    <th >Deposit Date</th>
                                    <th >Status</th>
                                </tr>
                                </thead>
                                <tbody class="job-list-item">
                                @foreach ($transations as $tran)
                                    <tr>
                                        <th scope="row">{{$tran->transaction_id}}</th>
                                        <th scope="">
                                            @if($tran->type == 1)
                                                Deposit
                                            @else
                                                Withdraw
                                            @endif
                                        </th>
                                        <th scope="">{{$tran->amount}}</th>
                                        <th scope="">{{\Carbon\Carbon::parse($tran->created_at)->toFormattedDateString()}}</th>
                                        <th scope="">
                                            @if ($tran->status == 0)

                                                <span class="badge bg-warning">Pending</span>
                                            @elseif($tran->status == 1)

                                                <span class="badge bg-success">Approved</span>
                                            @elseif($tran->status == 2)

                                                <span class="badge bg-danger">Rejected</span>
                                            @else
                                                Not Set
                                            @endif
                                        </th>
                                    </tr>


                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>


                </div><!-- end card-body -->

            </div><!-- end card -->
            {{$transations->links()}}
        </div>
        <!-- end col -->


        <!-- end col -->
    </div>
@endsection
