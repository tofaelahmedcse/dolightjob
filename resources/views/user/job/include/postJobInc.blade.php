@section('js')


<script>
    $(document).ready(function() {

        // $('.wizard>.actions').find('li:last-child').html('<button class="job_submit" id="job_submit" type="submit" role="menuitem">finish</button>')



        $('.regg_name').click(function() {
            $('.regg_name').each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                }
            });

            $('.reg_name').each(function() {
                $(this).prop('checked', true);
            });
            $(this).addClass('active');
            $(this).closest('.regg_name').find("input[name='region_name']").prop('checked', true);
            let a = $(this).closest('.regg_name').find("input[name='region_name']").val();
            $('.sub_cats').empty();

        });


        let reg_name = $("input[name='region_name']:checked").val();

        $.ajax({
            type: "POST",
            url: "{{route('user.post.job.get.all.main.category')}}",
            data: {
                '_token': "{{csrf_token()}}",
                'reg_name': reg_name,
            },
            success: function(data) {
                $('.main_cats').empty();
                $.each(data, function(index, value) {
                    $('.main_cats').append(
                        `
                             <li class="list-inline-item mb-2 m_cat_name" data-id="${value.id}">
                                            <button type="button"
                                                    class="btn btn-sm btn-outline-primary m_cat_btn" data-id="${value.id}"
                                                    data-bs-toggle="tab" data-bs-target="#assignment">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio"
                                                               class="form-check-input d-none main_cat_name" value="${value.id}"
                                                               name="main_category">${value.category_name}
                                                    </label>
                                                </div>
                                            </button>
                                        </li>
                            `
                    );
                });

                $('.main_cat_name').each(function(tab, index) {
                    if (index == 0) {
                        tab.removeClass('active');
                    }
                });


            }
        });


        $('.sub_cats').empty();


        $(document).on('click', '.regg_name', function() {
            let reg_name_change = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "{{route('user.post.job.get.all.main.category')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'reg_name': reg_name_change,
                },
                success: function(data) {

                    $('.main_cats').empty();
                    $.each(data, function(index, value) {
                        $('.main_cats').append(
                            `
                             <li class="list-inline-item mb-2 m_cat_name" data-id="${value.id}">
                                            <button type="button"
                                                    class="btn btn-sm btn-outline-primary m_cat_btn" data-id="${value.id}"
                                                    data-bs-toggle="tab" data-bs-target="#assignment">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio"
                                                               class="form-check-input d-none main_cat_name" value="${value.id}"
                                                               name="main_category">${value.category_name}
                                                    </label>
                                                </div>
                                            </button>
                                        </li>
                            `
                        );
                    });

                    $('.main_cat_name').each(function(tab, index) {
                        if (index == 0) {
                            tab.removeClass('active');
                        }
                    });


                }
            });
        })


        $(document).on('click', '.m_cat_name', function() {
            let reg_name = $("input[name='region_name']:checked").val();
            let main_cat = $(this).data('id');


            $('.m_cat_name').each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                }
            });

            $('.main_cat_name').each(function() {
                $(this).prop('checked', false);
            });
            $(this).addClass('active');
            $(this).closest('.m_cat_name').find("input[name='main_category']").prop('checked', true);
            $(this).closest('.m_cat_name').find("input[name='main_category']").val();
            $.ajax({
                type: "POST",
                url: "{{route('user.post.job.get.all.sub.category')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'main_cat': main_cat,
                },
                success: function(data) {
                    console.log(data)
                    $('.sub_cats').empty();
                    $.each(data, function(index, value) {
                        $('.sub_cats').append(
                            `
                          <li class="list-inline-item mb-3 s_cat_name" data-id="${value.id}">
                                                    <button type="button" class="btn btn-sm btn-primary">
                                                        <label class="form-check-label">
                                                            <input type="radio"
                                                                   class="form-check-inline d-none" value="${value.id}"
                                                                   name="sub_category">${value.category_name}
                                                        </label>
                                                    </button>
                                                </li>
`
                        );
                    });

                    $('.sub_cat_name').each(function(tab, index) {
                        if (index == 0) {
                            tab.removeClass('active');
                        }
                    });


                }
            });

        });


        $('.job_coun_id').click(function() {
            console.log('paisi')
            $('.country_btn').each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                    $(this).closest('.country_btn').css({
                        "background": "",
                        "color": ""
                    });
                }

                if ($(this).closest('.country_id').find(".country_name").prop('checked') == true) {
                    $(this).closest('.country_btn').addClass('active');
                    $(this).closest('.country_btn').css({
                        "background": "#556ee6",
                        "color": "wheat"
                    });
                }

            });
        })



        $(document).on('click', '.job-sub-category button', function() {
            $(".job-sub-category button").removeClass("active");
            $(this).addClass("active");
        });


        $(document).on('click', '.s_cat_name', function() {
            console.log($(this).data('id'))
            let sub_cat_id = $("input[name='sub_category']:checked").val();
            let s_cat_id = $(this).data('id');

            $('.s_cat_name').each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                }
            });


            $('.sub_cat_name').each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                }
            });


            $('.sub_cat_btn').each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                }

                if ($(this).closest('.s_cat_name').find("input[name='sub_category']").prop('checked') == true) {
                    $(this).closest('.sub_cat_btn').addClass('active');
                    $(this).closest('.sub_cat_btn').css({
                        "background": "#556ee6",
                        "color": "wheat"
                    });
                }

            });

            $('.sub_cat_name').each(function() {
                $(this).prop('checked', false);
            });

            $(this).addClass('active');
            // $(this).css({"background": "yellow"});
            $(this).closest('.s_cat_name').find("input[name='sub_category']").prop('checked', true);

            let scat = $(this).closest('.s_cat_name').find("input[name='sub_category']").val();

            $.ajax({
                type: "POST",
                url: "{{route('user.post.job.get.sub.category.price')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'sub_cat_id': s_cat_id,
                },
                success: function(data) {
                    $('.cat_amount').val(data.category_price);
                    $('.each_worker_earn').val(data.category_price);
                    showTotalAmount();

                }
            });
        });



        $('.worker_need').keyup(function() {
            showTotalAmount();
        });

        $('.each_worker_earn').change(function() {
            let cat_am = $('.cat_amount').val();
            let eran_money = parseFloat($(this).val(), 2);
            if (cat_am > eran_money) {
                alert('cant');
                $('.each_worker_earn').val(cat_am);
            } else {
                showTotalAmount();
            }


        });


        $('.screen_short').change(function() {
            showTotalAmount();
        });


        function showTotalAmount() {
            let service_charge = "{{$gen_settings->service_charge}}";
            let screen_short_price = "{{$gen_settings->screenshot_price}}";
            let each_workder_earn = $('.each_worker_earn').val();
            let worker = $('.worker_need').val();

            let sub_total = parseFloat(worker, 2) * parseFloat(each_workder_earn, 2);
            let charge = (sub_total * service_charge) / 100;

            let screen_short = $('.screen_short').val();
            let screen_short_total = screen_short * screen_short_price;


            let total = parseFloat(sub_total, 2) + parseFloat(charge, 2) + screen_short_total;
            $('.est_job_cost').val(parseFloat(total).toFixed(2));


        };


        $("#fileup").change(function() {
            $('#wizardPicturePreview').attr('src', '');
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#wizardPicturePreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        };


        $(document).on('click', '.submit_job', function() {
            $('#post_job').submit();
        })


        $(document).on('submit', '#post_job', function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            let rame = $('.reg_name').val();


            let reg_name = $(".regg_name.active").data('id');


            // var main_cat = $(".m_cat_name").find(".active");
            var main_cat = $(".m_cat_name.active").data('id');
            var scat_cat = $(".s_cat_name.active").data('id');


            var coun_array = [];
            $('.country_name:checked').each(function() {
                coun_array.push($(this).val());
            });


            var subcat_array = [];
            $('.sub_cat_name:checked').each(function() {
                subcat_array.push($(this).val());
            });

            var job_title = $('.job_title').val();
            var specific_task = $('.specific_task').val();
            var require_proof = $('.require_proof').val();
            var worker_need = $('.worker_need').val();
            var each_worker_earn = $('.each_worker_earn').val();
            var screen_short = $('.screen_short').val();
            var est_day = $('.est_day').val();


            if (reg_name == null || reg_name == "") {
                swal("Please Select Region", "", "warning");
            } else if (coun_array == null || coun_array == "") {
                swal("Please Select Country", "", "warning");
            } else if (main_cat == null || main_cat == "") {
                swal("Please Select Main Category", "", "warning");
            } else if (scat_cat == null || scat_cat == "") {
                swal("Please Select Sub Category", "", "warning");
            } else if (job_title == null || job_title == "") {
                swal("Please Enter Job Title", "", "warning");
            } else if (specific_task == null || specific_task == "") {
                swal("Please Enter Specific Task", "", "warning");
            } else if (require_proof == null || require_proof == "") {
                swal("Please Enter Require Proof", "", "warning");
            } else if (worker_need == null || worker_need == "") {
                swal("Please Enter Worker Need", "", "warning");
            } else if (each_worker_earn == null || each_worker_earn == "") {
                swal("Please Enter Each Worker Earn", "", "warning");
            } else if (screen_short == null || screen_short == "") {
                swal("Please Enter Screen Short Required", "", "warning");
            } else if (est_day == null || est_day == "") {
                swal("Please Enter Estimated Day", "", "warning");
            } else {
                $.ajax({
                    type: 'POST',
                    url: "{{route('user.post.job.save')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        console.log(data)
                        if (data == 'balance_error') {
                            swal('You have Insufficient balance', 'warning');
                        }

                        if (data == 'job_created') {
                            swal('Job Successfully Created', 'success');
                            setTimeout(window.location.href = "{{route('user.my.jobs')}}", 2000);
                        }


                    },
                    error: function(data) {


                    }
                });
            }


        });


    })
</script>
@endsection
