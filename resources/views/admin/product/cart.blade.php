<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>ABC Cafeteria</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/swiper.css') }}" rel="stylesheet">
	<link href="{{ asset('/fonts/ionicons.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/checkout.css') }}" rel="stylesheet">
	<link href="{{ asset('/fonts/beyond_the_mountains-webfont.css') }}" rel="stylesheet">

</head>

<body>
	<section id="checkout" class="checkout">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h5>Shopping Checkout</h5>
					<!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank"> -->
					<form>
						<table class="table table-hover table-bordered co-table table-responsive">
							<thead class="co-thead">
								<tr>
									<th width=1%></th>
									<th width=10%>Qty</th>
									<th width=50%>Item Name</th>
									<th width=20%>Cost</th>
									<th width=25% class="text-xs-right">Subtotal</th>
								</tr>
							</thead>
							<tbody id="output" class="co-tbody"> </tbody>
						</table>
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#paypal_card">Checkout with
							PayPal</a>
						<a onclick="continue_shopping()" class="btn btn-success">Continue Shopping</a>
					</form>
					<hr class="my-5">
				</div>
				





				<div class="form-res col-md-6">
					<h5>Delivery Details</h5>
					<form>
						<div class="form-row">
							<div class="form-group col-md-6">
								<!--                                <label for="fname">First name</label>-->
								<input type="text" class="form-control" id="fname" placeholder="First name"
									target="_blank">
							</div>
							<div class="form-group col-md-6 co-label">
								<!--                                <label for="lname">Last name</label>-->
								<input type="text" class="form-control" id="lname" placeholder="Last name"
									target="_blank">
							</div>
						</div>
						<div class="form-group">
							<!--                            <label for="inputAddress">Address</label>-->
							<textarea type="text" class="form-control" class="form-control" id="inputAddress" rows="2"
								placeholder="Address 1" target="_blank" required></textarea>
						</div>
						<div class="form-group">
							<!--                            <label for="inputAddress2">Address 2 (optional)</label>-->
							<textarea type="text" class="form-control" class="form-control" id="inputAddress2" rows="2"
								placeholder="Address 2 (Optional)" target="_blank"></textarea>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<!--                                <label for="inputCity">City</label>-->
								<input type="text" class="form-control" id="inputCity" target="_blank"
									placeholder="City">
							</div>
							<div class="form-group col-md-4">
								<!--                                <label for="inputState">State</label>-->
								<select id="inputState" class="form-control" target="_blank">
									<option selected>State</option>
									<option>Central Province</option>
									<option>Eastern Province </option>
									<option>Northern Province </option>
									<option>Southern Province </option>
									<option>Western Province </option>
									<option>North Western Province</option>
									<option>North Central Province</option>
									<option>Uva Province</option>
									<option>Sabaragamuwa Province</option>
								</select>
							</div>
							<div class="form-group col-md-2">
								<!--                                <label for="inputZip">Zip</label>-->
								<input type="text" class="form-control" id="inputZip" target="_blank" placeholder="Zip">
							</div>
						</div>

						<select class="custom-select">
							<option selected>Payment Method</option>
							<option value="1">Pay via Cash</option>
							<option value="2">Pay via Paypal</option>
							<option value="3">Other</option>
						</select>
					</form>
				</div>
			</div>
		</div>

	</section>

	<!-- SCIPTS -->
	<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/swiper.js') }}"></script>
	<script src="{{ asset('/js/scripts.js') }}"></script>

	<script>

		var shopcart = [];
		$(document).ready(function() {
			outputCart();
			$('#output').on('click', '.remove-item', function() {
				var itemToDelete = $('.remove-item').index(this);
				shopcart.splice(itemToDelete, 1);
				sessionStorage["sca"] = JSON.stringify(shopcart);
				outputCart();
			})



		$('#output').on('change', '.dynqua', function() {
			var iteminfo = $(this.dataset)[0];
			var itemincart = false;
			var removeItem = false;
			var itemToDelete = 0;
			console.log(shopcart);
			var qty = $(this).val();
			$.each(shopcart, function(index, value) {
				if (value.id == iteminfo.id) {
					if (qty <= 0) {
						removeItem = true;
						itemToDelete = index;
					} else {
						shopcart[index].qty = qty;
						itemincart = true;
					}
				}
			})
			if (removeItem) {
				shopcart.splice(itemToDelete, 1);
			}

			sessionStorage["sca"] = JSON.stringify(shopcart);
			outputCart();
		})

		function outputCart() {
			if (sessionStorage["sca"] != null) {
				shopcart = JSON.parse(sessionStorage["sca"].toString());
			}
			console.log(sessionStorage["sca"]);
			console.log(shopcart);
			var holderHTML = '';
			var total = 0;
			var itemCnt = 0;
			$.each(shopcart, function(index, value) {
				var stotal = value.qty * value.price;
				var a = (index + 1);




				total += stotal;
				itemCnt += parseInt(value.qty);
				holderHTML += '<tr><td><span class="ion-ios-trash remove-item mr-10" style="font-size: 25px; color: rgba(209, 36, 36, 0.67);"></span></td><td><input size="5"  style="width:69px;" type="number" class="dynqua form-control"  name="quantity_' + a + '" value="' + value.qty + '" data-id="' + value.id + '"></td><td><input type="hidden" name="item_name_' + a + '" value="' + value.name + ' ' + value.s + '">' + value.name + '(' + value.s + ')</td><td><input type="hidden" name="amount_' + a + '" value="' + formatMoney(value.price) + '"> Rs. ' + formatMoney(value.price) + ' </td><td class="text-xs-right"> Rs. ' + formatMoney(stotal) + '</td></tr>';
			})
			holderHTML += '<tr><td colspan="4" class="text-xs-right">Total</td><td class="text-xs-right">Rs. ' + formatMoney(total) + '</td></tr>';
			$('#output').html(holderHTML);
		}

		function formatMoney(n) {
			return (n / 100).toFixed(2);
		}
	});
	</script>


</body>

</html>