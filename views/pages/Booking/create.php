<style>
	body {
		background: #f5f7fb;
	}

	.card {
		border: none;
		border-radius: 15px;
		box-shadow: 0 5px 15px rgba(0, 0, 0, .1);
	}

	.card-header {
		background: #0d6efd;
		color: #fff;
		font-size: 22px;
		font-weight: bold;
		border-radius: 15px 15px 0 0 !important;
	}

	.section-title {
		background: #f1f3f5;
		padding: 8px 15px;
		border-left: 5px solid #0d6efd;
		margin-top: 20px;
		margin-bottom: 20px;
		font-weight: bold;
	}

	.form-label {
		font-weight: 600;
	}

	.table th {
		width: 220px;
		background: #f8f9fa;
	}

	.total-box {
		font-size: 18px;
		font-weight: bold;
	}

	.btn {
		min-width: 120px;
	}
</style>

<div class="container my-5">

	<div class="card">

		<div class="card-header">
			Travel Agency Booking Form
		</div>

		<div class="card-body">

		

				<div class="section-title">
					Customer Information
				</div>

				<div class="row">

					<div class="col-md-6 mb-3">
						<label class="form-label">Customer</label>
						<!-- <select class="form-select" name="customer_id">
								<option>Select Customer</option>
								<option value="1">John Smith</option>
								<option value="2">Alice Johnson</option>
								<option value="3">Michael Brown</option>
							</select> -->

						<?php echo  Customer::html_select("customer_id") ?>
					</div>

					<div class="col-md-6 mb-3">
						<label class="form-label">Passport No</label>
						<input type="text" id="passport" class="form-control" readonly value>
					</div>

					<div class="col-md-6 mb-3">
						<label class="form-label">Phone</label>
						<input type="text" id="phone" class="form-control" readonly value="">
					</div>

					<div class="col-md-6 mb-3">
						<label class="form-label">Email</label>
						<input type="email" id="email" class="form-control" readonly value="">
					</div>

				</div>

				<div class="section-title">
					Package Information
				</div>

				<div class="row">

					<div class="col-md-6 mb-3">
						<label class="form-label">Tour Package</label>
						<!-- <select class="form-select" name="package_id">
							<option>Select Package</option>
							<option value="1">Dubai Luxury Tour</option>
							<option value="2">Bangkok Holiday</option>
							<option value="3">Cox's Bazar Tour</option>
						</select> -->
						<?php echo Package::html_select("package_id"); ?>
					</div>

					<div class="col-md-3 mb-3">
						<label class="form-label">Travel Date</label>
						<input type="date" class="form-control travel_date" name="travel_date">
					</div>

					<div class="col-md-3 mb-3">
						<label class="form-label">Duration</label>
						<input type="text" id="duration" class="form-control" value="" readonly>
					</div>

					<div class="col-md-6 mb-3">
						<label class="form-label">Hotel</label>
						<input type="text" id="hotel" class="form-control" readonly>
					</div>
					<div class="col-md-6 mb-3">
						<label class="form-label">Transport</label>
						<input type="text" id="transport" class="form-control" readonly>
					</div>

					<div class="col-md-6 mb-3">
						<label class="form-label">Flight</label>
						<input type="text" id="flight" class="form-control" readonly>
					</div>
					<div class="col-md-6 mb-3">
						<label class="form-label">Price</label>
						<input type="number" name="total_price" id="price" class="form-control" readonly>
					</div>

				</div>

				<div class="section-title">
					Booking Details
				</div>

				<div class="row">

					<div class="col-md-3 mb-3">
						<label class="form-label">Booking Date</label>
						<input type="date" class="form-control booking_date"  name="booking_date">
					</div>

					<div class="col-md-3 mb-3">
						<label class="form-label">Travelers</label>
						<input type="number" class="form-control" value="1" name="travelers">
					</div>

					<div class="col-md-3 mb-3">
						<label class="form-label">Employee</label>
						<!-- <select class="form-select" name="employee_id">
							<option>Rahim</option>
							<option>Karim</option>
						</select> -->
						<?php echo Employee::html_select("employee_id"); ?>
					</div>

					<div class="col-md-3 mb-3">
						<label class="form-label">Status</label>
						<select class="form-select" name="status">
							<option>Pending</option>
							<option>Confirmed</option>
							<option>Cancelled</option>
						</select>
					</div>

				</div>

				<div class="section-title">
					Payment Information
				</div>

				<table class="table table-bordered">

					<tr>
						<th>Flight Price</th>
						<td><input type="number" step="0.01" class="form-control" id="flight_price" name="flight_price" value="0" readonly></td>
					</tr>
					<tr>
						<th>Hotel Price</th>
						<td><input type="number" step="0.01" class="form-control" id="hotel_price" name="hotel_price" value="0" readonly></td>
					</tr>
					<tr>
						<th>Transport Price</th>
						<td><input type="number" step="0.01" class="form-control" id="transport_price" name="transport_price" value="0" readonly></td>
					</tr>
					<tr>
						<th>Package Price</th>
						<td><input type="number" step="0.01" class="form-control" id="package_price" name="package_price" value="0"></td>
					</tr>

					<tr>
						<th>Discount</th>
						<td><input type="number" step="0.01" class="form-control" id="discount" name="discount" value="0"></td>
					</tr>

					<tr>
						<th>VAT</th>
						<td><input type="number" step="0.01" class="form-control" id="vat" name="vat" value="0"></td>
					</tr>

					<tr>
						<th>Advance Payment</th>
						<td><input type="number" step="0.01" class="form-control" id="advance_payment" name="advance_payment" value="0"></td>
					</tr>

					<tr>
						<th>Payment Method</th>
						<td>
							<select class="form-select" id="payment_method" name="payment_method">
								<option>Cash</option>
								<option>Bkash</option>
								<option>Nagad</option>
								<option>Card</option>
								<option>Bank Transfer</option>
							</select>
						</td>
					</tr>

					<tr>
						<th>Grand Total</th>
						<td class="total-box text-primary">
							<span id="grand_total">0</span> BDT
							<input type="hidden" name="grand_total" id="grand_total_input" value="0">
						</td>
					</tr>

				</table>

				<div class="section-title ">
					Additional Notes
				</div>

				<textarea class="form-control additional_note" rows="4" name="remarks"></textarea>

				<div class="mt-4 text-end">

					<button class="btn btn-success btn_save_booking">
						Save Booking
					</button>

					<button type="reset" class="btn btn-secondary">
						Reset
					</button>

					<button type="button" class="btn btn-primary">
						Print Invoice
					</button>

				</div>

	

		</div>

	</div>

</div>
<script>
	// package
	$("#package_id").on("change", function() {

		let id = $(this).val();

		$.ajax({

			url: `<?php echo $base_url ?>/api/customer/package_find/${id}`,

			method: "GET",
			success: function(response) {

				// console.log(response); 
				let data = JSON.parse(response);
				console.log(data);
				$("#hotel").val(data.hotel.name + "|" + data.hotel.price_per_night);
				$("#flight").val(data.flight.flight_no);
				$("#transport").val(data.transport.vehicle_type);
				$("#duration").val(data.package.duration + " Days");
				$("#flight_price").val(data.flight.price);
				$("#hotel_price").val(data.hotel.price_per_night);
				$("#transport_price").val(data.transport.price);
				$("#price").val(data.package.price);
				$("#package_price").val(data.package.price);
				calculateGrandTotal();

			},

			error: function(xhr) {

				console.log(xhr.responseText);

			}

		});

	});
	$("#discount, #vat, #package_price, #advance_payment").on("input", calculateGrandTotal);

	function calculateGrandTotal() {
		let flightPrice = parseFloat($("#flight_price").val()) || 0;
		let hotelPrice = parseFloat($("#hotel_price").val()) || 0;
		let transportPrice = parseFloat($("#transport_price").val()) || 0;
		let packagePrice = parseFloat($("#package_price").val()) || 0;
		let discount = parseFloat($("#discount").val()) || 0;
		let vat = parseFloat($("#vat").val()) || 0;
		let advance = parseFloat($("#advance_payment").val()) || 0;

		let subtotal = flightPrice + hotelPrice + transportPrice + packagePrice;
		let grandTotal = subtotal - discount + vat;
		let due = grandTotal - advance;

		$("#grand_total").text(grandTotal.toLocaleString());
		$("#grand_total_input").val(grandTotal.toFixed(2));
		$("#due_amount").text(due.toLocaleString());
		$("#due_amount_input").val(due.toFixed(2));
	}

	// customer 
	$("#customer_id").on("change", function() {

		let id = $(this).val();
		// alert(id)

		$.ajax({

			url: `<?php echo $base_url ?>/api/customer/find/${id}`,

			method: "GET",

			success: function(response) {

				console.log(response);
				let data = JSON.parse(response);

				$("#passport").val(data.customer.passport_no);
				$("#phone").val(data.customer.phone);
				$("#email").val(data.customer.email);
			},

			error: function(xhr) {
				console.log(xhr.responseText);
			}

		});

	});



   	$(".btn_save_booking").on("click", function() {

     $customer_id= $("#customer_id").val();
	 $package_id= $("#package_id").val();
	 $travel_date= $(".travel_date").val();
	 $booking_date= $(".booking_date").val();
	 $employee_id= $("#employee_id").val();
	 $grand_total= $("#grand_total").text();
	 $discount=  parseFloat($("#discount").val()) || 0;
	 $vat= parseFloat($("#vat").val()) || 0;
	 $advance= parseFloat($("#advance_payment").val()) || 0; 
	 $payment_method_id=  $("#payment_method").val();
	 $additional_note=$(".additional_note").val();


	//  let data={

	//  $customer_id,
	//  $package_id,
	//  $travel_date,
	//  $booking_date,
	//  $employee_id,
	//  $grand_total,
	//  $discount,
	//  $vat,
	//  $advance,
	//  $payment_method_id,
	//  $additional_note
	//  }

      $.ajax({
		 url:"<?php echo $base_url?>/api/booking/booking_process/",
		 method:"Post",
		 data:{	 $customer_id,
				$package_id,
				$travel_date,
				$booking_date,
				$employee_id,
				$grand_total,
				$discount,
				$vat,
				$advance,
				$payment_method_id,
				$additional_note},
		  success:function(res){
            console.log(res);
			
		  },
		  error:function(err){
           console.log(err);
		   
		  }
	  });
	  


	})


</script>