@extends('layouts.app')

@section('htmlheader_title')
Home
@endsection


@section('header-content')

<h3> Create Product</h3>

@endsection




@section('main-content')

<form id="frm_create_category" class="form" role="form" method="POST" action="{{ url('/admin/product/store') }}">

	{!! csrf_field() !!}
	<div class="row">

		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">Product Name</label>
				<input type="text" id="name" class="form-control input-sm" name="name">
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">Product Quanity</label>
				<input type="text" id="quantity" class="form-control input-sm" name="quantity">
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">Product Price</label>
				<input type="text" id="price" class="form-control input-sm" name="price">
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">Product Type</label>
				<select type="name" class="form-control input-sm" name="type">
					<option value="">Please Select</option>
					<option value="1">Sri Lankan</option>
					<option value="2">Chinese</option>
				</select>
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<label class="control-label">Description</label>
				<textarea id="description" class="form-control input-sm" name="description"></textarea>
			</div>
		</div>


		<div class="col-md-12">
				<div class="form-group">
					<label for="picture">Insert Picture</label>
					<input type="file" name="picture" class="form-control-file" id="picture">
				</div>
			</div>


		<div class="col-md-12">
			<button type="submit" class="btn btn-primary float-right"><i class="fa fa-btn fa-save"></i> CREATE</button>
			<button type="button" id="btn-cancel" class="btn btn-default float-right"><i
					class="fa fa-btn fa-close"></i>CANCEL</button>
		</div>
	</div>

</form>

@endsection

@section('custom-scripts')
<script>
	$(document).ready(function()
	{

		$.validator.setDefaults({
			ignore: '', // ignore hidden fields
			errorClass: 'validation-error-label',
			successClass: 'validation-valid-label',
			highlight: function(element, errorClass) {
				$(element).removeClass(errorClass);
			},
			unhighlight: function(element, errorClass) {
				$(element).removeClass(errorClass);
			},
			invalidHandler: function(event, validator) {
			$('#over_all_error').show();
			},
			// Different components require proper error label placement
			errorPlacement: function(error, element) {
				// Input with icons and Select2
				if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
					error.appendTo( element.parent() );
				}
				// Input group, styled file input
				else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
					error.appendTo( element.parent().parent() );
				}

				else {
					error.insertAfter(element);
				}
			},
			validClass: "validation-valid-label",
			success: function(label) {
				label.remove();
			}
		});
			
		$('#btn-cancel').on('click', function()
		{
			window.location = '/admin/product/get-product';
		});

		$("#frm_create_category").validate({
			submitHandler: function() {
				event.preventDefault();
				$('#frm_create_category').ajaxSubmit(function(response) {

					if(response == true)
					{
						swal.fire({
						title: 'Success',
						text: 'The record successfully created',
						type: 'success',
						showCancelButton: false,
						confirmButtonText: 'Ok',
						closeOnConfirm: true
						}).then( function()
						{
							window.location = '/admin/product/get-product';
						});

						
					}

					else
					{
						swal.fire({
						title: 'Error',
						text: 'The record is not created',
						type: 'warning',
						showCancelButton: false,
						confirmButtonText: 'Ok',
						closeOnConfirm: true
						}, function() {
						
						});
					}
					
				});
			},
			rules: {
				name: 'required',
				description: 'required',
				type: 'required',
				price: {
					required: true,
					number: true
				}, 
				quantity:{
					required: true,
					number: true
				}, 
				picture: 'required'
			},
			messages: {
				name: 'Please verify Name',
				description: 'Please verify description',
				type: 'Please verify Type',
				price: { required: 'Please verify Price', number: 'Price can be only in digits'},
				quantity: { required: 'Please verify Quantity', number: 'Quantity can be only in digits'},
				picture: 'Please Insert A picure'
			}
		});

	});
</script>
@endsection