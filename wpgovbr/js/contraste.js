$(document).ready(function() {
    $('#siteaction-contraste a').click(
        function (e) {
            if ($.cookie('contraste') === null) 
			{
				$.cookie('the_cookie', 'the_value', { expires: 7, path: '/' });
                $.cookie('contraste', 'on', { path: '/' });
                $('body').addClass('contraste');
                e.preventDefault();
                return false
            } 
			else 
			{
                if ($.cookie('contraste') == 'on') {
                    $.cookie('contraste', 'off', { path: '/' });
                    $('body').removeClass('contraste');
                    e.preventDefault();
                    return false
                } 
				else 
				{
                    $.cookie('contraste', 'on', { path: '/' });
                    $('body').addClass('contraste');
                    e.preventDefault();
                    return false
                }
            }
        });
    if ($.cookie('contraste') == 'on') 
	{
        $('body').addClass('contraste');
        return false
    }
});

/*

jQuery(function ($) {
    $('#siteaction-contraste a').click(
        function (e) {
            if ($.cookie('contraste') === null) 
			{
                $.cookie('contraste', 'on');
                $('body').addClass('contraste');
                e.preventDefault();
                return false
            } 
			else 
			{
                if ($.cookie('contraste') == 'on') {
                    $.cookie('contraste', 'off');
                    $('body').removeClass('contraste');
                    e.preventDefault();
                    return false
                } 
				else 
				{
                    $.cookie('contraste', 'on');
                    $('body').addClass('contraste');
                    e.preventDefault();
                    return false
                }
            }
        });
    if ($.cookie('contraste') == 'on') 
	{
        $('body').addClass('contraste');
        return false
    }
});


$('#siteaction-contraste a').click(
				function(e){e.preventDefault();
							if($('body').hasClass('contraste'))
							{
								$('body').removeClass('contraste');
							}
							else
							{
								$('body').addClass('contraste');
							}
						}
					)
*/