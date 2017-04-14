function adjustBodyOffsetWhenResizing() {
	$('body').css('padding-top', $('.navbar-default').outerHeight(true)+ 'px' );
}
$(window).resize(adjustBodyOffsetWhenResizing);
$(document).ready(adjustBodyOffsetWhenResizing);
