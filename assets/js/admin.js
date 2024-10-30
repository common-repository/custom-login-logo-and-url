let WPPCLLU_modal = ( show = true ) => {
	if(show) {
		jQuery('#wppcllu-modal').show();
	}
	else {
		jQuery('#wppcllu-modal').hide();
	}
}

jQuery(function($){
	
	$('#wppcllu_report-copy').click(function(e) {
		e.preventDefault();
		$('#wppcllu_tools-report').select();

		try {
			var successful = document.execCommand('copy');
			if( successful ){
				$(this).html('<span class="dashicons dashicons-saved"></span>');
			}
		} catch (err) {
			console.log('Oops, unable to copy!');
		}
	});
})