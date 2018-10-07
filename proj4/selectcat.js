function addEvent() {
	var len = $('.displayResults tr').length;
	//var sku = new Array();
	//var quantity = new Array();
	for(var i=1; i<=len;i++) {
		$('#addToCart'+i).click(function(event) {
			$('.messageLine').html("");
			var sku = $(this).parent().children('#sku').attr('value');
			var quantity = $(this).parent().children('#quantity').val();
			if (isNaN(quantity)||quantity == 0) {
				$(this).parent().children('.messageLine').html("Please enter a valid quantity");
			}
			else if(quantity > 0) {
			$(this).parent().children('.messageLine').html("");
			var chocolateTitle = $(this).parent().parent().children('.title').html();
			var el = document.getElementById("overlay");
			$('#overlay p').html(giveAnAlert(chocolateTitle, quantity, sku));
			el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
			writeCookie(sku,quantity);
			$('#displayOffForCart').load('checkout.html');
			}
			else {
				$(this).parent().children('.messageLine').html("Please enter a valid quantity");
				}
		});
	}
	$('.continuePage').click(function(event) {
		el = document.getElementById("overlay");
		el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
		$('.messageLine').html("");
	});
}