@extends('layouts.admin')
@section('admin')

    <div class="row">
        <div class="col-xxl-12">
            <h5 class="mb-3">Default Tabs</h5>
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab" aria-selected="false">
                                All  <span class="badge badge-pill bg-danger" data-key="t-new">0</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-bs-toggle="tab" href="#deposit" role="tab" aria-selected="false">
                                Deposit <span class="badge badge-pill bg-danger" data-key="t-new">0</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#withdraw" role="tab" aria-selected="false">
                                Withdraw <span class="badge badge-pill bg-danger" data-key="t-new">0</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content  text-muted">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            <h6>All Notification</h6>
                            <div class="table-responsive">
                                <table class="table mb-0" id="alldeposit">

                                    <thead class="table-light job-list-header bg-fountain-blue">
                                    <tr>
                                        <th>User Email</th>
                                        <th>Gateway</th>
                                        <th>Sender No.</th>
                                        <th>Transaction No.</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->



    </div>
@endsection
