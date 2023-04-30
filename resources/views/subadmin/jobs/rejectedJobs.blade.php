@extends('layouts.subadmins')
@section('subadmin')
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <h4 class="card-title">Rejected Jobs List</h4>
            <form class="d-flex">
                <input class="form-control me-2 searchjob" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="button" id="search">Search</button>
            </form>
        </div>
    </nav>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0" id="alldeposit">
                        <thead class="table-light job-list-header bg-fountain-blue">
                        <tr>
                            <th>User</th>
                            <th>Job Title</th>
                            <th>Job Amount</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="show_all_jobs">

                        </tbody>

                        <tbody class="show_animation">
                        @for ($i = 0; $i < 40; $i++)
                            <tr data-tableexport-display="none">
                                <td>
                                    <div class="line-items animate"></div>
                                </td>
                                <td>
                                    <div class="line-items animate"></div>
                                </td>
                                <td>
                                    <div class="line-items animate"></div>
                                </td>
                                <td>
                                    <div class="line-items animate"></div>
                                </td>
                                <td>
                                    <div class="line-items animate"></div>
                                </td>
                                <td>
                                    <div class="line-items animate"></div>
                                </td>


                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>



@endsection

@section('js')
    <script>
        $('.show_animation').show();
        $(document).ready(function () {


            var ENDPOINT = "{{ url('/') }}";
            var page = 1;
            var current_page = 0;
            let bool = false;
            let lastPage;
            var currentscrollHeight = 0;


            $(window).scroll(function() {
                const scrollHeight = $(document).height();
                const scrollPos = Math.floor($(window).height() + $(window).scrollTop());
                const isBottom = scrollHeight - 100 < scrollPos;
                if (isBottom && currentscrollHeight < scrollHeight) {
                    page++;
                    //alert('calling...');
                    var myurl = ENDPOINT + '/subadmin/rejected-jobs-get?page=' + page
                    getData(myurl);
                    currentscrollHeight = scrollHeight;
                }
            });




            function getAllJobs(){
                page = 1;
                currentscrollHeight = 0;
                let searchjob = $('.searchjob').val();
                $('.show_animation').show();
                $.ajax({
                    type: "POST",
                    url: "{{route('subadmin.rejected.jobs.get')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'type' : 1,
                        'searchjob':searchjob
                    },
                    success: function (data) {
                        console.log(data);

                        $('.show_all_jobs').empty();
                        if (data.count_ses > 0){
                            $('.show_all_jobs').append(data.view);
                        }
                        $('.show_animation').hide();
                    }
                });
            };



            getAllJobs();
            $('#search').click(function (){
                getAllJobs();
            })
        });




        function getData(myurl) {
            $('.show_animation').show();
            let searchjob = $('.searchjob').val();
            $.ajax({
                url: myurl,
                type: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'type': 1,
                    'searchjob':searchjob
                },
                datatype: "html"
            }).done(function(data) {
                console.log(data)
                if (data.count_ses > 0) {
                    $('.show_all_jobs').append(data.view)
                } else {

                }
                $('.show_animation').hide();
                // location.hash = myurl;
            }).fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('No response from server');
                $('.show_animation').hide();
            });
        }
    </script>
@endsection
