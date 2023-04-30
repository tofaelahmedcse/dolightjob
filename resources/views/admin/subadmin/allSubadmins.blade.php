@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">All Sub-Admins</h4>
                <div class="page-title-right">
                    <button type="button" class="btn btn-primary btn-sm createsubadminmodel" data-bs-toggle="modal" data-bs-target="#createsubadminmodel">
                        Create Sub-Admin
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sub-Admin List</h4>
                <div class="table-responsive">
                    <table class="table mb-0" id="allwithdraw">

                        <thead class="table-light job-list-header bg-fountain-blue">
                        <tr>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Phone</th>
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




    <div class="modal fade" id="createsubadminmodel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create New Sub-Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.sub.admin.save')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label> Name</label>
                        <input type="text" name="name" class="form-control cat_name" >
                    </div>
                    <br>
                    <div class="form-group">
                        <label> Email</label>
                        <input type="text" name="email" class="form-control cat_name" >
                    </div>
                    <br>
                    <div class="form-group">
                        <label> Phone Number</label>
                        <input type="text" name="phone_number" class="form-control cat_name" >
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Account Password</label>
                        <input type="text" name="password" class="form-control cat_name" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="newMainCatSave">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editsubadminmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create New Sub-Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.sub.admin.update')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Name</label>
                            <input type="text" name="name" class="form-control name" >
                            <input type="hidden" name="edit_sub_admin" class="form-control edit_sub_admin" >
                        </div>
                        <br>
                        <div class="form-group">
                            <label> Email</label>
                            <input type="text" name="email" class="form-control email" >
                        </div>
                        <br>
                        <div class="form-group">
                            <label> Phone Number</label>
                            <input type="text" name="phone_number" class="form-control phone_number" >
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Account Password</label>
                            <input type="text" name="password" class="form-control cat_name" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="newMainCatSave">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="deletesubadminmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create New Sub-Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.sub.admin.delete')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label> are you sure to delete this sub-admin?</label>
                            <input type="hidden" name="delete_sub_admin" class="form-control delete_sub_admin" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="newMainCatSave">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection

@section('js')
    <script>


        function deletesubadmin(id) {
            $('.delete_sub_admin').val(id);
        }


        function editsubadmin(id){
            var id = id;
            $.ajax({
                type : "POST",
                url : "{{route('admin.sub.admin.get.single')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'id' : id,
                },
                success:function (data) {
                    $('.edit_sub_admin').val(id);
                    $('.name').val(data.name);
                    $('.email').val(data.email);
                    $('.phone_number').val(data.phone_number);
                }
            });
        }


        $(document).ready(function () {


            let getAllUsers = () =>{
                $('#allwithdraw').DataTable().destroy();
                $('#allwithdraw').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('admin.get.all.subadmins') }}",
                    columns: [
                        { data: 'name', name: 'name',class: 'text-center' },
                        { data: 'email', name: 'email',class: 'text-center' },
                        { data: 'phone_number', name: 'phone_number',class: 'text-center' },
                        { data: 'created_at', name: 'created_at',class: 'text-center' },
                        {data: 'action', name: 'action', orderable: false, searchable: false,class: 'text-center'},
                    ]
                });
            };

            getAllUsers();



        })
    </script>
@endsection
