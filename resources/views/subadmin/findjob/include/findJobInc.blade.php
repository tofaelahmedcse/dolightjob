@section('js')
    <script>
        $('.loading').hide();
        $('.no_job_found').hide();
        $('.no_more_jobs').hide();
        $('.shimmer_loader_animation').show();

        $(document).ready(function () {


            $('.reg_fil').change(function () {
                $('.loading').show();
                let reg_fil = $('.reg_fil').val();
                $.ajax({
                    type: "POST",
                    url: "{{route('subadmin.job.find.mcat.by.reg')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'reg_fil': reg_fil,
                    },
                    success: function (data) {
                        console.log(data);
                        $('.mcat_filter').empty();
                        $('.mcat_filter').append(
                            `<option value="0">select any</option>`
                        )
                        $.each(data, function (index, value) {
                            $('.mcat_filter').append(
                                `<option value="${value.id}">${value.category_name}</option>`
                            )
                        })
                        $('.loading').hide();
                    }
                });
            });


            $('.mcat_filter').change(function () {
                $('.loading').show();
                let mcat_filter = $('.mcat_filter').val();
                let country_filter = $('.country_filter').val();
                let reg_fil = $('.reg_fil').val();
                $.ajax({
                    type: "POST",
                    url: "{{route('subadmin.job.find.scat.by.mcat')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'mcat_filter': mcat_filter,
                        'country_filter': country_filter,
                        'reg_fil': reg_fil,
                    },
                    success: function (data) {
                        console.log(data);
                        $('.scat_filter').empty();
                        $('.scat_filter').append(
                            `<option value="0">select any</option>`
                        )
                        $.each(data, function (index, value) {
                            $('.scat_filter').append(
                                `<option value="${value.id}">${value.category_name}</option>`
                            )
                        });

                        $('.loading').hide();
                    }
                });
            });

            $('.loading').show();
            $('.shimmer_loader_animation').show();
            $.ajax({
                type: "POST",
                url: "{{route('subadmin.find.job.get.all')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                },
                success: function (data) {

                    if(data.count > 0){
                        $('.all_jobs').empty();
                        $('.all_jobs').append(data.view);
                        $('.loading').hide();
                        $('.shimmer_loader_animation').hide();
                    }else {
                        $('.all_jobs').empty();
                        $('.no_job_found').show();
                        $('.loading').hide();
                        $('.shimmer_loader_animation').hide();
                    }



                }
            });


            $('#goBtn').click();

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
                    console.log('paisi calling');
                    console.log(page);
                    var myurl = ENDPOINT + '/subadmin/find-job-get-all?page=' + page
                    getData(myurl);
                    currentscrollHeight = scrollHeight;
                }
            });


            $('#goBtn').click(function () {
                page = 1;
                currentscrollHeight = 0;

                $('.loading').show();
                $('.shimmer_loader_animation').show();
                let reg_fil = $('.reg_fil').val();
                let country_filter = $('.country_filter').val();
                let mcat_filter = $('.mcat_filter').val();
                let scat_filter = $('.scat_filter').val();
                let search_title = $('.search_title').val();
                $.ajax({
                    type: "POST",
                    url: "{{route('subadmin.find.job.get.all')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'reg_fil': reg_fil,
                        'country_filter': country_filter,
                        'mcat_filter': mcat_filter,
                        'scat_filter': scat_filter,
                        'search_title': search_title,
                    },
                    success: function (data) {
                        console.log(data);

                        if(data.count > 0){
                            $('.all_jobs').empty();
                            $('.all_jobs').append(data.view);
                            $('.loading').hide();
                            $('.shimmer_loader_animation').hide();
                        }else {
                            $('.all_jobs').empty();
                            $('.no_job_found').show();
                            $('.loading').hide();
                            $('.shimmer_loader_animation').hide();
                        }

                    }
                });
            })


        });


        function getData(myurl) {
            $('.loading').show();
            $('.shimmer_loader_animation').show();
            let reg_fil = $('.reg_fil').val();
            let country_filter = $('.country_filter').val();
            let mcat_filter = $('.mcat_filter').val();
            let scat_filter = $('.scat_filter').val();
            let search_title = $('.search_title').val();
            $.ajax(
                {
                    url: myurl,
                    type: "POST",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'reg_fil': reg_fil,
                        'country_filter': country_filter,
                        'mcat_filter': mcat_filter,
                        'scat_filter': scat_filter,
                        'search_title': search_title,
                    },
                    datatype: "html"
                }).done(function (data) {
                if (data.count > 0){
                    $('.all_jobs').append(data.view);
                    $('.loading').hide();
                    $('.shimmer_loader_animation').hide();
                }else {
                    $('.no_more_jobs').show();
                    $('.loading').hide();
                    $('.shimmer_loader_animation').hide();
                }


            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                alert('No response from server');
            });
        }



    </script>
@endsection
