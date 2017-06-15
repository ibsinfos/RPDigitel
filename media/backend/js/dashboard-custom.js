$(document).ready(function(){
	// script used for Files popup used in add product
	$('.fileSelectModal').on('click', '.panel', function () {
		//alert('hi');
		var chkbox = $(this).find('.chkBox');
		//var chkbox = $(this).find('.chkBox').prop('checked', true);
		if(chkbox.is(':checked')) { 
			chkbox.prop('checked', false);
		} else {
			chkbox.prop('checked', true);
		}
	});

	// script used for datatable checkbox
	$('#datatable, .mailBoxWrap').on('click', '#checkAll', function () {
		$(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
	});

	// script used for mail box checkbox
	$('.mailBoxWrap').on('click', '#checkAll', function () {
		$(this).closest('.mailBoxWrap').find('td input:checkbox').prop('checked', this.checked);
	});

});