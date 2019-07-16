@extends('layouts.app')

@section('htmlheader_title')
Home
@endsection


@section('header-content')

<h3> Edit Category</h3>

@endsection




@section('main-content')

<form id="frm_update_category" class="form" role="form" method="POST" action="{{ url('/admin/product/update') }}">

	{!! csrf_field() !!}
	<input type="hidden" id="id" class="form-control input-sm" name="id" value="{{$product->id}}">


	<div class="row">

		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">Product Name</label>
					<input type="text" value="{{$product->title}}" id="name" class="form-control input-sm" name="name">
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">Product Quanity</label>
				<input type="text" value="{{$product->quantity}}" id="quantity" class="form-control input-sm" name="quantity">
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">Product Price</label>
				<input type="text" value="{{$product->price}}" id="price" class="form-control input-sm" name="price">
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">Product Type</label>
				<select type="name" class="form-control input-sm" name="type">
					<option value="">Please Select</option>
					<option @if($product->type == 1) selected="selected" @endif value="1">Sri Lankan</option>
					<option @if($product->type == 2) selected="selected"  @endif value="2">Chinese</option>
				</select>
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<label class="control-label">Description</label>
				<textarea id="description" class="form-control input-sm" name="description">{{$product->description}}</textarea>
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<label for="picture">Insert Picture</label>
				<input type="file" name="picture" class="form-control-file" id="picture">
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<label for="picture">Inserted Picture</label>
			<img style="height: 300px; border: 1px solid gainsboro;" id="product_pic" src='/admin/product/view-image/{{$product->id}}/{{$product->image}}' alt="product_pic">
			</div>
		</div>



	<div class="col-md-12">
		<button type="submit" class="btn btn-primary float-right"><i class="fa fa-btn fa-save"></i>UPDATE</button>
		<button type="button" id="btn-cancel" class="btn btn-default float-right"><iclass="fa fa-btn fa-close"></i>CANCEL</button>
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

			$("#frm_update_category").validate({
				submitHandler: function() {
					event.preventDefault();
					$('#frm_update_category').ajaxSubmit(function(response) {

						if(response == true)
						{
							swal.fire({
							title: 'Success',
							text: 'The record successfully updated',
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
							text: 'The record is not updated',
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
				}
				},
				messages: {
					name: 'Please verify Name',
					description: 'Please verify description',
					type: 'Please verify Type',
					price: { required: 'Please verify Price', number: 'Price can be only in digits'},
					quantity: { required: 'Please verify Quantity', number: 'Quantity can be only in digits'}
				}
        	});

		});
</script>
@endsection