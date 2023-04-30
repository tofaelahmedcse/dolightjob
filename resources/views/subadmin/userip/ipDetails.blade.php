@extends('layouts.subadmins')
@section('subadmin')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Use IP Check for : {{$get_ips->device_ip}}</h4>
                    <div class="flex-shrink-0">

                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Login Device</th>
                                    <th scope="col">Login Users</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user_ips as $userip)
                                    <?php
                                    $user = \App\Models\User::select('name', 'email', 'phone_number')->where('id', $userip->user_id)->first();
                                    ?>
                                    <tr>
                                        <td>
                                            @if($user)
                                                {{$user->name}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($user)
                                                {{$user->email}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($user)
                                                {{$user->phone_number}}
                                            @endif
                                        </td>
                                        <td>{{$userip->device_ip}}</td>
                                        <td>{{$userip->login_device}}</td>
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
