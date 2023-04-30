@extends('layouts.admin')
@section('admin')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Profile</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">


                <div class="card-body">

                    <div class="live-preview">
                        <form class="row g-3" action="{{route('admin.profile.save')}}" method="post">
                            @csrf
                            <div class="col-md-4">
                                <label for="validationDefault01" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name"
                                       value="{{Auth::user()->name}}">
                            </div>

                            <div class="col-md-4">
                                <label for="validationDefault01" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email"
                                       value="{{Auth::user()->email}}">
                            </div>

                            <div class="col-md-4">
                                <label for="validationDefault01" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number"
                                       value="{{Auth::user()->phone_number}}">
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
        // CKEDITOR.replace('job-msg');
        // CKEDITOR.replace('dep-msg');
        // CKEDITOR.replace('wit-msg');
    </script>

@endsection
