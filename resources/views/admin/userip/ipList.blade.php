@extends('layouts.admin')
@section('admin')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Use IP List</h4>
                    <div class="flex-shrink-0">

                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light job-list-header bg-fountain-blue">
                                <tr>
                                    <th scope="col">Device IP</th>
                                    <th scope="col">Login Device</th>
                                    <th scope="col">Login Users</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users_ips as $userip)
                                    <?php
                                    $count_user = \App\Models\user_device_ip::where('device_ip', $userip->device_ip)->where('login_device', $userip->login_device)->count();
                                    ?>
                                    <tr>
                                        <td>{{$userip->device_ip}}</td>
                                        <td>{{$userip->login_device}}</td>
                                        <td>{{$count_user}}</td>
                                        <td><a href="{{route('admin.user.ip.view.details',$userip->id)}}"
                                               class="link-success">View More <i
                                                    class="ri-arrow-right-line align-middle"></i></a></td>
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
