@extends('layouts.user')
@section('title')
    Deposit
@endsection
@section('user')

    <div class="alert alert-secondary" role="alert">
        <strong>
            <marquee>{!! $gnl->with_noti_msg !!}</marquee>
        </strong>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">


                <div class="card-body">

                    <div class="live-preview">
                        <form class="row g-3" action="{{route('user.deposit.save')}}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <label for="validationDefault01" class="form-label">Deposit Type</label>
                                <select class="form-control deposit_type" name="deposit_type" required>
                                    <option value="">select any</option>
                                    @foreach($payment_gateway as $gateway)
                                        <option value="{{$gateway->id}}">{{$gateway->gateway_name}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-xl-12 ">
                                <div class="card details_info">
                                    <div class="card-body">
                                        <div class="">
                                            <div class="alert alert-success" role="alert">
                                                <p class="gateway_note"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="validationDefault01" class="form-label">Amount of Deposit (USD)</label>
                                <input type="text" class="form-control amount" name="amount" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationDefault01" class="form-label">USD Rate</label>
                                <input type="text" class="form-control usd_rate" name="usd_rate"
                                       value="{{$gen_settings->usd_rate}}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="validationDefault01" class="form-label">You Have to Send (BDT)</label>
                                <input type="text" class="form-control total_usd" name="total_usd" value="0.00"
                                       readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Sender Number</label>
                                <input type="text" class="form-control" name="sender_number" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Transaction ID</label>
                                <input type="text" class="form-control" name="transaction_number" required>
                            </div>


                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div> <!-- end col -->
    </div>



    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Withdraw List</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table mb-0" id="alldeposit">
                            <thead class="table-light job-list-header bg-fountain-blue">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col" style="width: 20%;">Type</th>
                                <th scope="col">Amount</th>
                                <th scope="col" style="width: 16%;">Deposit Date</th>
                                <th scope="col" style="width: 12%;">Status</th>
                            </tr>
                            </thead>
                            <tbody class="job-list-item">
                            @foreach($all_deposit as $dep)
                                <tr>
                                    <td>{{$dep->transaction_id}}</td>
                                    <td>Deposit</td>
                                    <td>{{$gnl->site_currency}} {{number_format($dep->amount,2)}}</td>
                                    <td>
                                        {{\Carbon\Carbon::parse($dep->created_at)->format('Y-m-d')}}
                                    </td>
                                    <td>
                                        @if ($dep->status == 0)

                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($dep->status == 1)

                                            <span class="badge bg-success">Approved</span>
                                        @elseif($dep->status == 2)

                                            <span class="badge bg-danger">Rejected</span>
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div><!-- end table responsive -->

                </div><!-- end card body -->
                {{$all_deposit->links()}}
            </div><!-- end card -->
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.details_info').hide();
            $('.deposit_type').change(function () {
                let dep_id = $(this).val();

                $.ajax({
                    type: "POST",
                    url: "{{route('user.deposit.get.gateway.details')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'dep_id': dep_id,
                    },
                    success: function (data) {
                        console.log(data);
                        if (data) {
                            $('.gateway_note').empty();
                            let details = `<p class="gateway_note">${data.gateway_note}</p>`;
                            $('.gateway_note').append(details);
                            $('.details_info').show();
                        } else {
                            $('.details_info').hide();
                        }

                    }
                });

            });

            $('.amount').keyup(function () {
                let am = $(this).val();
                let usd_rate = $('.usd_rate').val();
                let to_usd = am * usd_rate;
                $('.total_usd').val(to_usd);


            })

        })
    </script>
@endsection
