@extends('layouts.admin')
@section('admin')


    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <h4 class="card-title">All Deposit List</h4>
            <form class="d-flex">
                <input class="form-control me-2 searchdep" type="search" placeholder="Search" aria-label="Search">
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
                            <th>Gateway</th>
                            <th>Sender No.</th>
                            <th>Transaction No.</th>
                            <th>Amount USD</th>
                            <th>USD Rate</th>
                            <th>Amount Received</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody class="show_all_dep">
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
        function deletedeposit(id) {
            $('.delete_dep_id').val(id);
        }

        function editdepsoit(id) {
            $('.edit_dep_id').val(id);
        }


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
                    var myurl = ENDPOINT + '/admin/all-deposit-get?page=' + page
                    getData(myurl);
                    currentscrollHeight = scrollHeight;
                }
            });


            function getAllDep(){
                page = 1;
                currentscrollHeight = 0;
                let searchdep = $('.searchdep').val();
                $('.sim_loader').show();
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.all.deposit.get')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'type' : 1,
                        'searchdep':searchdep
                    },
                    success: function (data) {
                        console.log(data);

                        $('.show_all_dep').empty();
                        if (data.count_ses > 0){
                            $('.show_all_dep').append(data.view);
                        }

                        $('.show_animation').hide();

                    }
                });
            };

            getAllDep();


            $('#search').click(function (){
                getAllDep();
            })



        });


        function getData(myurl) {
            $('.show_animation').show();
            let searchdep = $('.searchdep').val();
            $.ajax({
                url: myurl,
                type: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'type': 1,
                    'searchdep':searchdep
                },
                datatype: "html"
            }).done(function(data) {
                console.log(data)
                if (data.count_ses > 0) {
                    $('.show_all_dep').append(data.view)
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
