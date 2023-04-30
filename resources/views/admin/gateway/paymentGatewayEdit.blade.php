@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">


                <div class="card-body">

                    <div class="live-preview">
                        <form class="row g-3" action="{{route('admin.payment.gateway.update')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Gateway Name</label>
                                <input type="text" class="form-control" name="gateway_name"
                                       value="{{$gateway_edit->gateway_name}}">

                                <input type="hidden" class="form-control edit_main_cat_id"
                                       name="gateway_edit" value="{{$gateway_edit->id}}">
                                
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Gateway Number</label>
                                <input type="text" class="form-control" name="gateway_number"
                                       value="{{$gateway_edit->gateway_number}}">
                            </div>

                            <div class="col-md-12">
                                <label for="validationDefault01" class="form-label">Gateway Note</label>
                                <textarea type="text" class="form-control edit_cat_name"
                                          name="gateway_note"
                                          id="pay-msg">{!! $gateway_edit->gateway_note !!}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label for="validationDefault01" class="form-label">Gateway Min Amount</label>
                                <input type="text" class="form-control" name="min_price"
                                       value="{{$gateway_edit->min_price}}">
                            </div>

                            <div class="col-md-4">
                                <label for="validationDefault01" class="form-label">Gateway Max Amount</label>
                                <input type="text" class="form-control" name="max_price"
                                       value="{{$gateway_edit->max_price}}">
                            </div>

                            <div class="col-md-4">
                                <label for="validationDefault01" class="form-label">Status</label>
                                <select class="form-control update_country edit_country_id"
                                        name="is_active">
                                    <option value="0">select any</option>
                                    <option
                                        value="1" {{$gateway_edit->is_active == 1 ? 'selected' : ''}}>
                                        Active
                                    </option>
                                    <option
                                        value="2" {{$gateway_edit->is_active == 2 ? 'selected' : ''}}>
                                        In-Active
                                    </option>
                                </select>
                            </div>


                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection

@section('js')
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>


    <script>
        CKEDITOR.replace('pay-msg');
    </script>

@endsection
