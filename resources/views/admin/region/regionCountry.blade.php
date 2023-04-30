@extends('layouts.admin')
@section('admin')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Region & Country</h4>
                <div class="page-title-right">
                    <button type="button" class="btn btn-primary btn-sm createcatmodel" data-bs-toggle="modal"
                            data-bs-target="#createreg">
                        Create New Region & Country
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Region & Country List</h4>
                <div class="table-responsive">
                    <table class="table mb-0" id="allcountry">

                        <thead class="table-light job-list-header bg-fountain-blue">
                        <tr>
                            <th>Region Name</th>
                            <th>Country Name</th>
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




    <div class="modal fade" id="createreg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">


            <div class="modal-content">
                <form action="{{route('admin.region.country.save')}}" method="post">
                    @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create Region & Country</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Region</label>
{{--                        <input type="text" class="form-control cat_name" name="region_name">--}}
                        <select class="form-control" name="region_name">
                            <option value="">select region</option>
                            @foreach($all_reg as $alreg)
                            <option value="{{$alreg->region}}">{{$alreg->region}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Country Name</label>
                        <input type="text" class="form-control cat_name" name="country_name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="newMainCatSave">Save</button>
                </div>
            </div>
            </form>
        </div>
    </div>




    <div class="modal fade" id="editreg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">


            <div class="modal-content">
                <form action="{{route('admin.region.country.update')}}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Create Region & Country</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Region</label>
{{--                            <input type="text" class="form-control edit_reg_name" name="region_name">--}}
                            <select class="form-control edit_reg_name" name="region_name">
                                <option value="">select region</option>
                                @foreach($all_reg as $alreg)
                                    <option value="{{$alreg->region}}">{{$alreg->region}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" class="form-control edit_reg_id" name="region_edit">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Country Name</label>
                            <input type="text" class="form-control edit_coun_name" name="country_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="newMainCatSave">Save</button>
                    </div>
            </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="deletereg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Region & Country</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
               <form action="{{route('admin.region.country.delete')}}" method="post">
                   @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label>are you sure to delete this region & country ?</label>
                        <input type="hidden" class="form-control delete_reg_id" name="delete_reg_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="deleteMainCat">Delete</button>
                </div>
               </form>
            </div>
        </div>
    </div>





@endsection

@section('js')
    <script>


        function deletereg(id) {
            $('.delete_reg_id').val(id);
        }

        function editreg(id) {
            var id = id;
            $.ajax({
                type: "POST",
                url: "{{route('admin.region.country.single')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': id,
                },
                success: function (data) {
                    $('.edit_reg_id').val(id);
                    $('.edit_reg_name').val(data.region);
                    $('.edit_coun_name').val(data.country_name);
                }
            });
        };


        $(document).ready(function () {


            let getAllRegion = () =>{
                $('#allcountry').DataTable().destroy();
                $('#allcountry').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('admin.region.country.get') }}",
                    columns: [
                        { data: 'region', name: 'region',class: 'text-center' },
                        { data: 'country_name', name: 'country_name',class: 'text-center' },
                        { data: 'created_at', name: 'created_at',class: 'text-center' },
                        {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
                    ]
                });
            };

            getAllRegion();

        })
    </script>
@endsection
