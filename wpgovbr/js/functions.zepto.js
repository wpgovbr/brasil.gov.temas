/* Zepto plugin : slide transition v1.0
   https://github.com/Ilycite/zepto-slide-transition/
*/
(function(a){a.fn.slideDown=function(g){var c=this.css("position");this.show();this.css({position:"absolute",visibility:"hidden"});var e=this.css("margin-top");var h=this.css("margin-bottom");var d=this.css("padding-top");var f=this.css("padding-bottom");var b=this.css("height");this.css({position:c,visibility:"visible",overflow:"hidden",height:0,marginTop:0,marginBottom:0,paddingTop:0,paddingBottom:0});this.animate({height:b,marginTop:e,marginBottom:h,paddingTop:d,paddingBottom:f},g)};a.fn.slideUp=function(h){if(this.height()>0){var g=this;var c=g.css("position");var b=g.css("height");var e=g.css("margin-top");var i=g.css("margin-bottom");var d=g.css("padding-top");var f=g.css("padding-bottom");this.css({visibility:"visible",overflow:"hidden",height:b,marginTop:e,marginBottom:i,paddingTop:d,paddingBottom:f});g.animate({height:0,marginTop:0,marginBottom:0,paddingTop:0,paddingBottom:0},{duration:h,queue:false,complete:function(){g.hide();g.css({visibility:"visible",overflow:"hidden",height:b,marginTop:e,marginBottom:i,paddingTop:d,paddingBottom:f})}})}};a.fn.slideToggle=function(b){if(this.height()==0){this.slideDown()}else{this.slideUp()}}})(Zepto);

(function ($) {
	// menu
	$("#dropmenu li > a ").on('click', function(e){
		var nodes = $(this).parent().find('ul').size();
		var current = $(this).parent().find('ul');
		if (nodes > 0) {
			$('ul.children').each(function(){
				if ($(this).html() == current.html()) {
					current.slideToggle();
				} else {
					$(this).hide();
				}
			});

			return false;
		}
	});

	$('h2.setor').click(function() {
		$(this).next('div.agenda').slideToggle();
	});

})(Zepto);

setTimeout(function () { window.scrollTo(0, 1); }, 1000);