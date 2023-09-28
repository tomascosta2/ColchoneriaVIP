window.addEventListener('load', () => {
	
	$('#addCoupon').on('click', () => {
		$('#couponsForm').toggleClass('d-none');
	});
	$('#coupon_submit').on('click', () => {
		if (!$('#coupon_code_totals').val()) {
			return
		}
		
		$('#coupon_code').val($('#coupon_code_totals').val());
		$('#FormCart')[0].submit();
	});

});