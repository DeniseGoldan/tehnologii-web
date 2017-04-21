function adjustBodyOffsetWhenResizing() {
	$('body').css('padding-top', ($('.navbar-default').outerHeight(true)-40)+ 'px' );
}
$(window).resize(adjustBodyOffsetWhenResizing);
$(document).ready(adjustBodyOffsetWhenResizing);
