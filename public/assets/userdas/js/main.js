
(function($){
	$(function(){

    $('.account-register-input').each(function(){
        var $_this = (this)
        $('.account-register-input').find('input, textarea').on('keyup', function() {
            var $$_this = $(this)

        if ($$_this.val() == '') {
            $$_this.parent('.account-register-input').removeClass('add-border');
        } else {
            $$_this.parent('.account-register-input').addClass('add-border');
        }
    });

    })

    $('.wizard>.actions').find('li:last-child').html('<button class="submit_job" id="post_job" type="button" role="menuitem">finish</button>')
    $('.actions ul li a').eq(1).click(function(){
        setTimeout(function(){
            if($('#basic-example-p-3:visible').length){
                console.log('thias')
                $('.wizard>.actions').find('li:last-child').show()
            }
        }, 500)
    })

    $('.actions ul li a').eq(0).click(function(){
        $('.wizard>.actions').find('li:last-child').hide()
    })

    $('.wizard .steps>ul>li a').eq(0).click(function(){
        $('.wizard>.actions').find('li:last-child').hide()
    })

    $('.wizard .steps>ul>li a').eq(1).click(function(){
        $('.wizard>.actions').find('li:last-child').hide()
    })

    $('.wizard .steps>ul>li a').eq(2).click(function(){
        $('.wizard>.actions').find('li:last-child').hide()
    })

    $('.wizard .steps>ul>li a:last').click(function(){
        setTimeout(function(){
            if($('#basic-example-p-3:visible').length){
                console.log('thias')
                $('.wizard>.actions').find('li:last-child').show()
            }
        }, 500)
    })


    if($(window).width() < 767){
        $('#basic-example-t-0, #basic-example-t-1, #basic-example-t-2, #basic-example-t-3').text('')
    }

            // console.log(thisHtml)

	})// End ready function.
})(jQuery)

