$(document).ready(function(){
	if($('#changeMod').length){
		$('.your-checkbox').prop('indeterminate', true)

		$('#changeMod').on('change', function(){
			var url = window.location.href;
			    
			if (url.indexOf('?') > -1) url += '&mod=1'
			else url += '?mod=1'
			
			if($(this).is(':checked')){
				window.location.href = url;
			} else {
				url = url.replace('?mod=1', '');
				url = url.replace('&mod=1', '');
				window.location.href = url;	
			}
		})
	}
})