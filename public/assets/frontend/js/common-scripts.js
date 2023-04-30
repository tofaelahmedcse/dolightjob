
(function($){
	$(function(){



        // Phone nav click function
        $('.hamburger').click(function () {
            $("body").toggleClass("navShown");
            $(".nav-wrap").fadeToggle()
        });

        var header = new Headroom(document.querySelector('header'), {
            tolarence: 80,
            offset: 55,
            classes: {

                initial: 'headroom',
                pinned: 'slidedown',
                unpinned: 'slideup',
                top: "headroom--top",
                notTop: "headroom--not-top",
                bottom: "headroom--bottom",
                notBottom: "headroom--not-bottom",
                frozen: "headroom--frozen",

            }
        });
        header.init();
        
        if ($('.tab-wrap').length) {
            $('.tab-trigger ul li').eq(0).find('a').addClass('tab-active')
            $('.tab-content-item').hide();
            $('.tab-content-item').eq(0).show();
            $('.tab-trigger ul li').each(function () {
                var $$this = $(this)
                $$this.find('a').click(function (e) {
                    e.preventDefault()
                    $('.tab-content-item').hide();
                    $('.tab-trigger ul li a').removeClass('tab-active')
                    $(this).addClass('tab-active')

                    var activeTab = $(this).attr('href');
                    $(activeTab).fadeIn();
                    return false;
                });
            })
        }
		
	})// End ready function.
   

})(jQuery)

