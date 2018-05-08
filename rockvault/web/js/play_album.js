$(document).ready(function() {
    $('.albums .item span').click(function() {
        $('.track-list-body .row').children().remove();
        $('.albums .item').css('background-color', '');
        $(this).closest('.item').css('background-color', '#E6E6E6');
        $('.track-list-body').css('padding', '10px 0 20px 0');
        
        $(this).closest('.item').children('.track').each(function(index) {
            $('.track-list-body .row').append(
                '<div class="item col-lg-6"><span>' + (index + 1) + '. ' + $(this).text() + '</span></div>');
        });

        $('.track-list-body .item span').click(function() {
            $('.track-list-body .item').css('background-color', '');
            $(this).closest('.item').css('background-color', '#E6E6E6');
        });
    });
});