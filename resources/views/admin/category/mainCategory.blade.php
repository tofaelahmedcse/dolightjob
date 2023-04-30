@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Job Main Category</h4>
                <div class="page-title-right">
                    <button type="button" class="btn btn-primary btn-sm createcatmodel" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                        Create New Category
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Main Category List</h4>
                <div class="table-responsive">
                    <table class="table mb-0" id="allmaincat">

                        <thead class="table-light job-list-header bg-fountain-blue">
                        <tr>
                            <th>Region</th>
                            <th>Category Name</th>
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



    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create New Main Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Region</label>
                        <select class="form-control create_region region_name">
                            <option value="">select region</option>
                            @foreach($all_reg as $reg)
                                <option value="{{$reg->region}}">{{$reg->region}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control cat_name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="newMainCatSave">Save</button>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="editmaincategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Update Main Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Region</label>
                        <select class="form-control update_region edit_region_name">
                            <option value="">select region</option>
                            @foreach($all_reg as $reg)
                                <option value="{{$reg->region}}">{{$reg->region}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control edit_cat_name">
                        <input type="hidden" class="form-control edit_main_cat_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateMainCatSave">Update</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="deletemaincategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Main Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>are you sure to delete this main category ?</label>
                        <input type="hidden" class="form-control delete_main_cat_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="deleteMainCat">Delete</button>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('js')
    <script>

        function deletemaincat(id) {
            $('.delete_main_cat_id').val(id);
        }

        function editmaincat(id) {
            var id = id;
            $.ajax({
                type: "POST",
                url: "{{route('admin.job.main.category.single')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': id,
                },
                success: function (data) {
                    $('.edit_main_cat_id').val(id);
                    $('.update_region').val(data.region_name);
                    $('.edit_cat_name').val(data.category_name);
                    getEditRegion(data.region_name, data.country_id);
                }
            });
        };


        $(document).ready(function () {


            $('.createcatmodel').click(function () {
                $('.region_name').val('');
                $('.cat_name').val('');
            })


            let getAllMainCat = () => {
                $('#allmaincat').DataTable().destroy();
                $('#allmaincat').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('admin.job.main.category.get') }}",
                    columns: [
                        {data: 'region_name', name: 'region_name', class: 'text-center'},
                        {data: 'category_name', name: 'category_name', class: 'text-center'},
                        {data: 'created_at', name: 'created_at', class: 'text-center'},
                        {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
                    ]
                });
            };

            getAllMainCat();
            $('#newMainCatSave').click(function () {
                let cat_name = $('.cat_name').val();
                let region_name = $('.region_name').val();
                if (cat_name == '') {

                } else {
                    $.ajax({
                        type: "POST",
                        url: "{{route('admin.job.main.category.save')}}",
                        data: {
                            '_token': "{{csrf_token()}}",
                            'cat_name': cat_name,
                            'region_name': region_name,
                        },
                        success: function (data) {
                            console.log(data);
                            $('#staticBackdrop').modal('hide');
                            getAllMainCat();
                        }
                    });
                }
            });


            $('#updateMainCatSave').click(function () {
                let edit_cat_name = $('.edit_cat_name').val();
                let edit_main_cat_id = $('.edit_main_cat_id').val();
                let update_region = $('.update_region').val();
                if (edit_cat_name == '') {

                } else {
                    $.ajax({
                        type: "POST",
                        url: "{{route('admin.job.main.category.update')}}",
                        data: {
                            '_token': "{{csrf_token()}}",
                            'edit_cat_name': edit_cat_name,
                            'edit_main_cat_id': edit_main_cat_id,
                            'update_region': update_region,
                        },
                        success: function (data) {

                            $('#editmaincategory').modal('hide');
                            getAllMainCat();
                        }
                    });
                }
            });


            $('#deleteMainCat').click(function () {
                let delete_main_cat_id = $('.delete_main_cat_id').val();
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.job.main.category.delete')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'delete_main_cat_id': delete_main_cat_id,
                    },
                    success: function (data) {

                        $('#deletemaincategory').modal('hide');
                        getAllMainCat();
                    }
                });
            });


        })
    </script>
@endsection
