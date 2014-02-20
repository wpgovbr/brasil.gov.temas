<style type="text/css">
/* ******************************* ESTILOS DA AGENDA ************************* */
#sidebar {
    padding-top: 15px;
}

#sidebar .current .children {
    display: block;
}
#sidebar .current {
    font-weight: bold;
}
#sidebar .current .children {
    font-weight: normal;
}
#sidebar ul:first-child {
    margin-bottom: 20px;
}
#sidebar ul a {
    color: #655;
    display: block;
    text-decoration: none;
}
#sidebar ul li {
    border-bottom: 1px solid #d5d7d4;
}
#sidebar ul li ul li {
    border-bottom: 1px dotted #d5d7d4;
    font-size: 9pt;
}
#sidebar ul li ul li a {
    padding-left: 15px;
}
#sidebar ul li ul li ul li a {
    padding-left: 30px;
}
#sidebar .children li:last-child {
    border-bottom: 0;
}
#sidebar li li a {
    -webkit-transition: all .2s linear;
    -moz-transition: all .2s linear;
    -o-transition: all .2s linear;
    transition: all .2s linear;
}
#sidebar li li:hover a:hover {
    background: #faf8f6;
}
#sidebar .box {
    background: #fff;
    border: 1px solid #e4e2e1;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    margin-bottom: 20px;
    padding: 5px;
    -webkit-transition: all .2s linear;
    -moz-transition: all .2s linear;
    -o-transition: all .2s linear;
    transition: all .2s linear;
}
#sidebar .box h4 {
    background-color: #faf8f6;
    background-repeat: no-repeat;
    background-position: 6px 7px;
    border-bottom: 1px solid #e4e2e1;
    font-weight: normal;
    margin: -5px -5px 5px -5px;
    padding: 5px;
    -moz-border-radius-topleft: 5px;
    -webkit-border-top-left-radius: 5px;
    -moz-border-radius-topright: 5px;
    -webkit-border-top-right-radius: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    -webkit-transition: all .2s linear;
    -moz-transition: all .2s linear;
    -o-transition: all .2s linear;
    transition: all .2s linear;
}
#sidebar .box:hover h4 {
    border-bottom: 1px solid #faf8f6;
}
#sidebar .box h4 span {
    color: #666;
    font-size: 85%}
#sidebar .box ul {
    font-size: 85%}
#sidebar .box ul li {
    border: 0;
}
#sidebar .tag {
    padding: 0;
    margin-bottom: 45px;
}
#sidebar .tag h4 {
    margin: 0;
}
#sidebar .tag #tagcloud {
    margin: 5px 5px 0 5px;
}
#sidebar .tag #tagcloud a {
    color: #555;
    margin: auto 8px;
    text-decoration: none;
}
#sidebar .category a:hover, #sidebar .schedule a:hover, #sidebar #tagcloud a:hover {
    text-decoration: underline;
}
#sidebar .tag #more_tagcloud_before {
    background: url(../img/bg_tagcloud.png) top center;
    display: block;
    height: 60px;
    margin: -60px 0 0 0;
    position: relative;
    width: 100%}
#sidebar .tag #more_tagcloud {
    color: #004f80;
    cursor: pointer;
    display: block;
    font-size: 12px;
    font-weight: bold;
    line-height: 20px;
    margin: 0 -5px -31px -5px;
    padding-bottom: 0;
    position: relative;
    text-align: center;
    text-decoration: none;
    -webkit-transition: all .2s linear;
    -moz-transition: all .2s linear;
    -o-transition: all .2s linear;
    transition: all .2s linear;
}
#sidebar .tag #more_tagcloud span {
    background: url(../img/bg_tagcloud.png) 0 60px;
    -moz-border-radius-bottomleft: 5px;
    -webkit-border-bottom-left-radius: 5px;
    -moz-border-radius-bottomright: 5px;
    -webkit-border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    border: 1px solid #e4e2e1;
    border-top: 0;
    display: inline-block;
    margin: 0 auto 0;
    padding: 5px 10px;
    text-transform: uppercase;
}
#sidebar .tag #more_tagcloud:hover {
    color: #555;
}
#sidebar .state select {
    width: 100%}
.box a.image {
    text-decoration: none;
}
.box .desc {
    border: 1px solid #e4e2e1;
    border-bottom: 0;
    color: #666;
    font-size: 75%;
    padding: 5px;
    text-align: center;
}
.box #schedule_list {
    border: 1px solid #e4e2e1;
    color: #666;
    font-size: 77%;
    padding: 5px;
}
.box #schedule_list li a {
    color: #666;
    text-decoration: none;
}
.box #schedule_list li a:hover {
    text-decoration: underline;
}
.jCal {
    height: 21px;
    text-align: center;
    vertical-align: top;
    width: 100%}
.jCalMo {
    width: 100%;
    float: left;
    overflow: visible;
    height: 100%;
    padding: 0 2px;
    white-space: nowrap;
}
.jCal .month, .jCal .monthSelect, .jCal .monthName, .jCal .monthYear {
    line-height: 16px;
    height: 16px;
    text-align: center;
    vertical-align: bottom;
    font-size: 8pt;
    cursor: pointer;
    float: left;
}
.jCal .monthName {
    padding: 0 2px;
    text-align: right;
}
.jCal .monthYear {
    float: right;
    padding: 0 2px;
    text-align: left;
}
.jCal .monthSelector {
    position: absolute;
}
.jCal .monthSelectorShadow {
    background: gray;
    padding: 0;
    position: absolute;
}
.jCal .monthNameHover {
    background: #ededed;
    color: gray;
}
.jCal .monthYearHover {
    background: #ededed url(../img/cal_double-arrow-vert.gif) center right no-repeat;
    color: gray;
}
.jCal .monthSelectHover {
    background: #069;
    color: #FFF;
}
.jCalMo .dow, .jCalMo .day, .jCalMo .pday, .jCalMo .aday, .jCalMo .overDay, .jCalMo .invday, .jCalMo .selectedDay {
    width: 13.1%;
    font-size: 8pt;
    color: #000;
    border-right: 1px solid #CCC;
    border-bottom: 1px solid #CCC;
    border-left: 1px solid #EEE;
    text-align: center;
    cursor: default;
    float: left;
}
.jCalMo .dow {
    background: #EEE;
    border-bottom: 0;
}
.jCalMo .day, .jCalMo .invday {
    height: 30px;
    text-align: center;
}
.jCalMo .day {
    cursor: pointer;
    background: #FFF;
}
.jCalMo .invday {
    color: gray;
    background: #eee;
}
.jCalMo .pday, .jCalMo .aday {
    height: 30px;
    background: #e3e3e3;
    color: #CCC;
}
.jCalMo .selectedDay {
    color: #666;
    background: #ccc;
}
.jCalMo .overDay {
    color: #666;
    background: #eee;
}
.jCal .left {
    background: url(../img/arrow-left.png) center center no-repeat;
    width: 16px;
    height: 16px;
    vertical-align: middle;
    cursor: pointer;
    float: left;
    margin: 0px;
}
.jCal .right {
    background: url(../img/arrow-right.png) center center no-repeat;
    width: 16px;
    height: 16px;
    vertical-align: middle;
    cursor: pointer;
    float: right;
    margin: 0px;
}
.jCalMask, .jCalMove {
    position: absolute;
    overflow: hidden;
}
.aec-credit{
	display:none;
}
.aec-eventlist li {
	list-style:none;
}
.fc-event{
	display:block;
}
.fc-event-title, .fc-event-time{
	display:block;
	padding-bottom: 15px;
	white-space:pre-wrap;
}

</style>
<script src="<?php bloginfo('template_directory'); ?>/js/jCal.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	$('#calendar').jCal({
		day: new Date(),
<?php if (isset($_GET['data'])){  $data = explode("-", $_GET['data']); echo "sDate: new Date(" . $data[0] . ", " . ($data[1] - 1) . "," . $data[2] . ", 0, 0, 0), "; } ?>
		days: 1,
		showMonths: 1,
		monthSelect:false,
		dow: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
		ml: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
		ms: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		dCheck:	function (day) { return (day.getDay()); },
		callback: function (day, days) {
			$('#calendar').val( days );
			date = day.getFullYear() + '-' + (day.getMonth() + 1) + '-' + day.getDate();
			alert(date);
			window.location = "?data=" + date;
			return true;
		}
	});
});
</script>
<div id='sidebar'style="width:270px;">
<div class="box schedule">
	<h4><span aria-hidden="true" class="icon-calendar"></span> Calend&aacute;rio</h4>
	<div id="calendar" class="clearfix">Carregando calend&aacute;rio...</div>
</div>
</div>