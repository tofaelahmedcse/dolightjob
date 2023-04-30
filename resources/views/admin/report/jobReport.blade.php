@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">All Job Report</h4>
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
                            <th>Job Title</th>
                            <th>Reason</th>
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
                    "ajax": "{{ route('admin.job.report.get') }}",
                    columns: [
                        {data: 'user_id', name: 'user_id', class: 'text-center'},
                        {data: 'job_id', name: 'job_id', class: 'text-center'},
                        {data: 'report_summery', name: 'report_summery', class: 'text-center'},
                        {data: 'created_at', name: 'created_at', class: 'text-center'},
                        {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
                    ]
                });
            };

            getAllDeposit();


        })
    </script>
@endsection
