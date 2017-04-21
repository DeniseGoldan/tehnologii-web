function adjustPaddingOfSmallerForms() {
	$('.smaller-form-last-element').css('padding-bottom', ($('.biggest-form').outerHeight(true)*0.1)+ 'px' );
}
$(window).resize(adjustPaddingOfSmallerForms);
$(document).ready(adjustPaddingOfSmallerForms);
