@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">


                <div class="card-body">

                    <div class="live-preview">
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light job-list-header bg-fountain-blue">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Min Amount</th>
                                    <th scope="col">Max Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($gateway as $payg)
                                    <tr>
                                        <th scope="row">{{$payg->gateway_name}}</th>
                                        <td>{{$payg->gateway_number}}</td>
                                        <td>{{$payg->min_price}}</td>
                                        <td>{{$payg->max_price}}</td>
                                        <td>
                                            @if ($payg->is_active == 1)
                                                Active
                                            @elseif($payg->is_active == 2)
                                                In-Active
                                            @else
                                                Not Set
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{route('admin.payment.gateway.edit',$payg->id)}}">
                                                <button type="button" class="btn btn-sm btn-light ">Edit
                                                </button>
                                            </a>

                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->


        <!-- end col -->
    </div>
@endsection



