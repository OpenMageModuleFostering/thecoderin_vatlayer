Validation.add('vatlayer-validate', 'Please enter valid VAT Number', function(v){
	// alert(v);
	if (v == 'undefined' || v == '' || v == 'NA') {
		return true;
	} else {
		var URL = BASE_URL + 'vatlayer/ajax/index/vat/'+encodeURIComponent(v);	
		var ok = false;
		new Ajax.Request(URL, {
			method: 'get',
			asynchronous: false,	
			onSuccess: function(transport) {
				var obj = response = eval('(' + transport.responseText + ')');
				validateTrueEmailMsg = obj.msg;
				if (obj.status == false) {
					Validation.get('vatlayer-validate').error = validateTrueEmailMsg;
					ok = false;
				} else {
					ok = true;
				}
			},
			onComplete: function() {
				if ($('advice-vatlayer-validate-billing:taxvat')) {
					$('advice-vatlayer-validate-billing:taxvat').remove();	
				}
			}
		});
		return ok;
	}
});