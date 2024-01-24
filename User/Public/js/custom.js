$(document).ready(function() {
    if($('.li-countdown').length) {
        let data = $('.li-countdown').attr('data-timer');
        $(".li-countdown").countdown(`${data}`, function (event) {
            $(this).text(
                event.strftime('%D days %H:%M:%S')
            );
        });
    }
})
