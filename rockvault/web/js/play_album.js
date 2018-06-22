$(document).ready(function() {
    $('.albums .item span').click(function() {
        $('.track-list-body .row').children().remove();
        $('.albums .item').css('background-color', '').removeClass('is-active');
        $(this).closest('.item').css('background-color', '#E6E6E6').addClass('is-active');
        $('.track-list-body').css('padding', '10px 0 20px 0');

        $(this).closest('.item').children('.track').each(function(index) {
            $('.track-list-body .row').append(
                '<div class="item ' + (!index ? '' : 'is-active') + ' col-lg-6"><span>' + (index + 1) + '. ' + $(this).text() + '</span></div>');
        });

        $('.track-list-body .item span').click(function() {
            $('.track-list-body .item').css('background-color', '');
            $(this).closest('.item').css('background-color', '#E6E6E6');
            $('.track-list audio').remove();

            var src = '/mp3/' + $('.artist-name').text() + '/' +
                $('.albums .item.is-active span').text() + '/' +
                $(this).text().substr($(this).text().indexOf('. ') + '. '.length) + '.mp3';

            $('.track-list #audio-container').append('<audio style="width: 100%;" controls controlsList="nodownload">' +
                '<source src="' + src + '" type="audio/mpeg"></audio>');
        });
    });
});