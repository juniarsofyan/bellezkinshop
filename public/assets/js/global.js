$(document).ready(function() {
	// add product to cart
	$("#add").click(function() {
		let product_code = $("#product_code").val();
		let qty = $("#qty").val();

		$.ajax({
			type: "GET",
			url:
				"http://localhost/beshop/public/cart/add?product_code=" +
				product_code +
				"&qty=" +
				qty,
			// data: data,
			success: function() {
				alert("added to cart");
			}
		});
	});

	$(".remove-item").click(function() {
		var product_code = $(this).attr("product-code");
		var $ele = $(this)
			.parent()
			.parent();

		$.ajax({
			type: "GET",
			url:
				"http://localhost/beshop/public/cart/remove?product_code=" +
				product_code,
			success: function(data) {
				$ele.fadeOut().remove();
			}
		});
	});

	$(".cart-product-qty").change(function() {
		let product_code = $(this).attr("product-code");
		let price_after_discount = $(this).attr("price-after-discount");
		let qty = $(this).val();
		calculateTotal(product_code, price_after_discount, qty);
	});

	$(".cart-product-qty").bind("keyup", function() {
		let product_code = $(this).attr("product-code");
		let price_after_discount = $(this).attr("price-after-discount");
		let qty = $(this).val();
		calculateTotal(product_code, price_after_discount, qty);
	});
});

function calculateTotal(product_code, price_after_discount, qty) {
	$.ajax({
		type: "GET",
		url:
			"http://localhost/beshop/public/cart/set?product_code=" +
			product_code +
			"&qty=" +
			qty,
		success: function(data) {
			let subtotal = price_after_discount * qty;
			$("#subtotal-" + product_code).html(subtotal);
		}
	});
}
