@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Job Sub Category</h4>
                <div class="page-title-right">
                    <button type="button" class="btn btn-primary btn-sm createcatmodel" data-bs-toggle="modal"
                            data-bs-target="#jobSubCatModal">
                        Create New Sub Category
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sub Category List</h4>
                <div class="table-responsive">
                    <table class="table mb-0" id="allsubcat">

                        <thead class="table-light job-list-header bg-fountain-blue">
                        <tr>
                            <th>Region</th>
                            <th>Main Category</th>
                            <th>Sub Category Name</th>
                            <th>Sub Category Price</th>
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



    <div class="modal fade" id="jobSubCatModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create New Sub Category</h5>
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
                        <label>Main Category</label>
                        <select class="form-control main_cat_id"></select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control sub_cat_name">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Category Price</label>
                        <input type="number" class="form-control sub_cat_price">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="newSubCatSave">Save</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editsubcategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Update Sub Category</h5>
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
                        <label>Main Category</label>
                        <select class="form-control main_cat_id edit_main_cat_id"></select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control edit_sub_cat_name">
                        <input type="hidden" class="form-control edit_sub_cat_id">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Category Price</label>
                        <input type="number" class="form-control edit_sub_cat_price">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateSubCatSave">Update</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="deletesubcategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Sub Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>are you sure to delete this main category ?</label>
                        <input type="hidden" class="form-control delete_sub_cat_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="deleteSubCat">Delete</button>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('js')
    <script>


        function deletesubcat(id) {
            $('.delete_sub_cat_id').val(id);
        }

        function editsubcat(id) {
            var id = id;
            $.ajax({
                type: "POST",
                url: "{{route('admin.job.sub.category.single')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': id,
                },
                success: function (data) {

                    $('.edit_sub_cat_id').val(id);
                    $('.edit_sub_cat_name').val(data.category_name);
                    $('.edit_sub_cat_price').val(data.category_price);
                    $('.update_region').val(data.region_name);
                    getEditRegion(data.region_name, data.main_cat_id);

                }
            });
        };


        function getEditRegion(reg_name, main_cat) {
            $.ajax({
                type: "POST",
                url: "{{route('admin.main.category.by.region')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'reg_name': reg_name
                },
                success: function (data) {

                    $('.edit_main_cat_id').empty();
                    $('.edit_main_cat_id').append(
                        `<option value="">select country</option>`
                    );
                    $.each(data, function (index, value) {
                        $('.edit_main_cat_id').append(
                            `<option value="${value.id}">${value.category_name}</option>`
                        );
                    });
                    $('.edit_main_cat_id').val(main_cat);
                }
            });


        }


        $(document).ready(function () {


            let getAllSubCat = () => {
                $('#allsubcat').DataTable().destroy();
                $('#allsubcat').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('admin.job.sub.category.get') }}",
                    columns: [
                        {data: 'region_name', name: 'region_name', class: 'text-center'},
                        {data: 'main_cat_id', name: 'main_cat_id', class: 'text-center'},
                        {data: 'category_name', name: 'category_name', class: 'text-center'},
                        {data: 'category_price', name: 'category_price', class: 'text-center'},
                        {data: 'created_at', name: 'created_at', class: 'text-center'},
                        {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
                    ]
                });
            };


            getAllSubCat();
            $('#newSubCatSave').click(function () {
                let create_region = $('.create_region').val();
                let main_cat_id = $('.main_cat_id').val();
                let sub_cat_name = $('.sub_cat_name').val();
                let sub_cat_price = $('.sub_cat_price').val();
                if (sub_cat_name == '') {

                } else if (main_cat_id == 0) {

                } else if (sub_cat_price == '') {

                } else {
                    $.ajax({
                        type: "POST",
                        url: "{{route('admin.job.sub.category.save')}}",
                        data: {
                            '_token': "{{csrf_token()}}",
                            'create_region': create_region,
                            'main_cat_id': main_cat_id,
                            'sub_cat_name': sub_cat_name,
                            'sub_cat_price': sub_cat_price,
                        },
                        success: function (data) {
                            console.log(data);
                            $('#jobSubCatModal').modal('hide');
                            getAllSubCat();
                        }
                    });
                }
            });


            $('#updateSubCatSave').click(function () {
                let update_region = $('.update_region').val();
                let edit_main_cat_id = $('.edit_main_cat_id').val();
                let edit_sub_cat_name = $('.edit_sub_cat_name').val();
                let edit_sub_cat_id = $('.edit_sub_cat_id').val();
                let edit_sub_cat_price = $('.edit_sub_cat_price').val();
                if (edit_sub_cat_name == '') {

                } else if (edit_main_cat_id == 0) {

                } else {
                    $.ajax({
                        type: "POST",
                        url: "{{route('admin.job.sub.category.update')}}",
                        data: {
                            '_token': "{{csrf_token()}}",
                            'update_region': update_region,
                            'edit_main_cat_id': edit_main_cat_id,
                            'edit_sub_cat_name': edit_sub_cat_name,
                            'edit_sub_cat_id': edit_sub_cat_id,
                            'edit_sub_cat_price': edit_sub_cat_price,
                        },
                        success: function (data) {
                            console.log(data);
                            $('#editsubcategory').modal('hide');
                            getAllSubCat();
                        }
                    });
                }
            });


            $('#deleteSubCat').click(function () {
                let delete_sub_cat_id = $('.delete_sub_cat_id').val();
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.job.sub.category.delete')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'delete_sub_cat_id': delete_sub_cat_id,
                    },
                    success: function (data) {
                        console.log(data);
                        $('#deletesubcategory').modal('hide');
                        getAllSubCat();
                    }
                });
            });


            $('.create_region').change(function () {
                let reg_name = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.main.category.by.region')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'reg_name': reg_name
                    },
                    success: function (data) {

                        $('.main_cat_id').empty();
                        $('.main_cat_id').append(
                            `<option value="">select country</option>`
                        );
                        $.each(data, function (index, value) {
                            $('.main_cat_id').append(
                                `<option value="${value.id}">${value.category_name}</option>`
                            );
                        })
                    }
                });
            });



            $(document).on('change','.create_region',function () {
                let country = $(this).val();
                console.log(country)
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.main.category.by.country')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'country': country
                    },
                    success: function (data) {
                        console.log(data)

                        $('.main_cat_id').empty();
                        $('.main_cat_id').append(
                            `<option value="">select country</option>`
                        );
                        $.each(data, function (index, value) {
                            $('.main_cat_id').append(
                                `<option value="${value.id}">${value.category_name}</option>`
                            );
                        })
                    }
                });
            })




            $('.update_region').change(function () {
                let reg_name = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.main.category.by.region')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'reg_name': reg_name
                    },
                    success: function (data) {

                        $('.main_cat_id').empty();
                        $('.main_cat_id').append(
                            `<option value="">select country</option>`
                        );
                        $.each(data, function (index, value) {
                            $('.main_cat_id').append(
                                `<option value="${value.id}">${value.category_name}</option>`
                            );
                        })
                    }
                });
            });


        })
    </script>
@endsection
