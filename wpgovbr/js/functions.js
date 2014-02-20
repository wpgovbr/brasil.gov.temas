function setActiveStyleSheet(title) {
  var i, a, main;
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
    if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) {
      a.disabled = true;
      if(a.getAttribute("title") == title) a.disabled = false;
    }
  }
}

function getActiveStyleSheet() {
  var i, a;
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
    if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title") && !a.disabled) return a.getAttribute("title");
  }
  return null;
}

function getPreferredStyleSheet() {
  var i, a;
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
    if(a.getAttribute("rel").indexOf("style") != -1
       && a.getAttribute("rel").indexOf("alt") == -1
       && a.getAttribute("title")
       ) return a.getAttribute("title");
  }
  return null;
}

function createCookie(name,value,days) {
  if (days) {
    var date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
  }
  else expires = "";
  document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1,c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
  }
  return null;
}

window.onload = function(e) {
  var cookie = readCookie("style");
  var title = cookie ? cookie : getPreferredStyleSheet();
  setActiveStyleSheet(title);
}

window.onunload = function(e) {
  var title = getActiveStyleSheet();
  createCookie("style", title, 365);
}

var cookie = readCookie("style");
var title = cookie ? cookie : getPreferredStyleSheet();
setActiveStyleSheet(title);


$(document).ready(function (){

	if(!Modernizr.input.placeholder){
		$('[placeholder]').focus(function() {
		  var input = $(this);
		  if (input.val() == input.attr('placeholder')) {
			input.val('');
			input.removeClass('placeholder');
		  }
		}).blur(function() {
		  var input = $(this);
		  if (input.val() == '' || input.val() == input.attr('placeholder')) {
			input.addClass('placeholder');
			input.val(input.attr('placeholder'));
		  }
		}).blur();
		$('[placeholder]').parents('form').submit(function() {
		  $(this).find('[placeholder]').each(function() {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
			  input.val('');
			}
		  })
		});
	}

	$.fn.extend({
		scrollTo : function(speed, easing) {
			return this.each(function() {
				var targetOffset = $(this).offset().top;
				$('html,body').animate({ scrollTop: targetOffset }, speed, easing);
			});
		}
	});

	$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {

      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
         if (target.length) {
           $('html,body').animate({
               scrollTop: target.offset().top
          }, 1000);
          return false;
      }
    }
	});

	$.fn.accessibleDropDown = function() {
	  var el = $(this);

	  $("li", el).mouseover(function() {
	    $(this).addClass("hover");
	  }).mouseout(function() {
	    $(this).removeClass("hover");
	  });

	  $("a", el).focus(function() {
	    $(this).parents("li").addClass("hover");
	  }).blur(function() {
	    $(this).parents("li").removeClass("hover");
	  });
	}

	$("#nav").accessibleDropDown();
	column1 = $(".page-128 .children li:lt(13)");
	column2 = $(".page-128 .children li:gt(12)");
	$(".page-128 .children").append('<div class="column" id="column1"></div>');
	$(".page-128 .children").append('<div class="column" id="column2"></div>');
	column1.appendTo($('#column1'));
	column2.appendTo($('#column2'));



	// news
	$("#tagcloud").each(function() {
	  $.data(this, "realHeight", $(this).height());
	}).css({ overflow: "hidden", height: "160px" });

	$('#more_tagcloud, #more_tagcloud_before').click(function() {
		if ($('#tagcloud').height() == $('#tagcloud').data("realHeight")) {
			$('#tagcloud').animate({ height: '160px' }, 600).css("margin-bottom", 0);
			$('#more_tagcloud_before').show();
			$('#more_tagcloud span').text('Mais');
			$('header').scrollTo('slow','swing');
		} else {
			$('#tagcloud').animate({ height: $('#tagcloud').data("realHeight") }, 600).css("margin-bottom", 5);
			$('#more_tagcloud span').text('Menos');
			$('#more_tagcloud_before').hide();
			$('.tag').scrollTo('slow','swing');
		}
	});


	// schedule
	$('h2.setor').click(function() {
		$(this).next('div.agenda').slideToggle();
		$(this).scrollTo('slow','swing');
	});


	// breadcrumbs' improvement
	if ($("#breadcrumbs").length > 0) {

		var totalWidth = 0;
		$("#breadcrumbs li:not(:last)").each(function(index) {
		    totalWidth += parseInt($(this).width(), 10);
		});
		avaliable = $("#breadcrumbs").width() - totalWidth - 3;

		$("#breadcrumbs li:last").css({ 'width': avaliable, 'overflow' : 'hidden', 'white-space' : 'nowrap' });

	}

	$('.icon-print').click(function() {
		window.print();
		return false;
	});


	$('#send').click(function(e){

		$('#respond input[type=text], #respond textarea').each(function(){

			error = false;

			if ($(this).hasClass('required')) {
				if ($(this).val() == "") {
					alert("Verifique o campo: " + $(this).attr('placeholder'));
					$(this).focus();
					error = true;
					return false;
				}
			}

			if ($(this).attr('id') == 'email') {
				var re = /\S+@\S+\.\S+/;
				if(!re.test($(this).val())) {
					alert("O email informado é inválido.");
					error = true;
					return false;
				}
			}

			// if ($(this).attr('id') == 'challenge') {
			// 	if($(this).val() != $('#challenge_hash').val()) {
			// 		alert("O valor da soma está incorreto.");
			// 		error = true;
			// 		return false;
			// 	}
			// }
		});

		if (error != true) $('#commentform').submit();

	});


	$("#contrast").click(function() {

		if (getActiveStyleSheet() == "high") {
			setActiveStyleSheet('default');
		} else {
			setActiveStyleSheet('high');
		}

	});

});