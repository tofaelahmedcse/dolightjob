@extends('layouts.user')
@section('title')
    Transfer Balance
@endsection
@section('user')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">


                <div class="card-body">

                    <div class="live-preview">
                        <form class="row g-3" action="{{route('user.transfer.balance.save')}}" method="post">
                            @csrf


                            <div class="col-md-4">
                                <label for="validationDefault01" class="form-label">Eraning Balance</label>
                                <input type="text" class="form-control amount" name="amount"
                                       value="{{number_format(Auth::user()->earning_bal,2)}}"
                                       readonly>
                            </div>

                            <div class="col-md-4">
                                <label for="validationDefault01" class="form-label">Transfer Amount</label>
                                <input type="text" class="form-control trn_am" name="trn_am"
                                       placeholder="Exp: 0.00"
                                >
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit" id="submit_btn">Submit</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection
@section('js')

@endsection
