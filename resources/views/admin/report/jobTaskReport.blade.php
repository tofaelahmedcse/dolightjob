@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Job Task Report</h4>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Report List</h4>
                <div class="table-responsive">
                    <table class="table mb-0" id="alldeposit">

                        <thead class="table-light job-list-header bg-fountain-blue">
                        <tr>
                            <th>Reported By</th>
                            <th>Reported To</th>
                            <th>Task ID</th>
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
    </div>

@endsection

@section('js')
    <script>

        function deletedeposit(id) {
            $('.delete_dep_id').val(id);
        }

        function editdepsoit(id) {
            $('.edit_dep_id').val(id);
        }


        $(document).ready(function () {


            let getAllDeposit = () => {
                $('#alldeposit').DataTable().destroy();
                $('#alldeposit').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('admin.user.task.report.get') }}",
                    columns: [
                        {data: 'user_id', name: 'user_id', class: 'text-center'},
                        {data: 'applied_user_id', name: 'applied_user_id', class: 'text-center'},
                        {data: 'apply_id', name: 'apply_id', class: 'text-center'},
                        {
                            data: 'is_review', class: 'text-center',
                            render: function (data) {
                                if (data == 0) {
                                    return 'New Report';
                                } else if (data == 1) {
                                    return 'Reviewed';
                                }  else {
                                    return 'not set'
                                }
                            }
                        },
                        {data: 'created_at', name: 'created_at', class: 'text-center'},
                        {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
                    ]
                });
            };

            getAllDeposit();


        })
    </script>
@endsection
