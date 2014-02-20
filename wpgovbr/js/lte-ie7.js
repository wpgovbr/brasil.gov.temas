/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-flickr' : '&#xe000;',
			'icon-twitter' : '&#xe001;',
			'icon-youtube' : '&#xe002;',
			'icon-facebook' : '&#xe005;',
			'icon-feed' : '&#xe004;',
			'icon-newspaper' : '&#xe003;',
			'icon-camera' : '&#xe006;',
			'icon-bubbles' : '&#xe007;',
			'icon-mic' : '&#xe008;',
			'icon-tv' : '&#xe009;',
			'icon-volume-high' : '&#xe00a;',
			'icon-calendar' : '&#xe00b;',
			'icon-folder' : '&#xe00c;',
			'icon-tag' : '&#xe00d;',
			'icon-location' : '&#xe00e;',
			'icon-print' : '&#xf02f;',
			'icon-search' : '&#xe00f;',
			'icon-menu' : '&#xe010;',
			'icon-home' : '&#xe011;',
			'icon-pencil' : '&#xe012;',
			'icon-bubble' : '&#xe013;',
			'icon-arrow-left' : '&#xe014;',
			'icon-arrow-right' : '&#xe015;',
			'icon-envelope' : '&#xe016;',
			'icon-font' : '&#xf031;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};