$(".location-sub-category input").click(function () {
    $(this).closest('button').toggleClass("active");
});
$(".job-sub-category button").click(function () {
    $(".job-sub-category button").removeClass("active");
    $(this).addClass("active");
});