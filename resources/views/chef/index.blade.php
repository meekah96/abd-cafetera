@extends('layouts.app')

@section('htmlheader_title')
Home
@endsection

@section('custom-css')
<style>
	.header-button {
		margin-bottom: 15px;
	}

	.timeinput
	{
		border-radius: 0;
		height: 35px;
		padding: 0px 5px;
		box-shadow: none;
		width: 86%;
	}
</style>
@endsection

@section('header-content')
<div>
	<h3>Chef Agenda</h3>
</div>
<div class="row">


</div>
@endsection



@section('main-content')

<table id="chef_grid" class="table table-bordered">
	<thead>
		<tr>
			<th>Actions</th>
			<th>Reference Number</th>
			<th>Venue</th>
			<th>Status</th>
			<th>Pick Time</th>
			<th>Ordered Time</th>
		</tr>
	</thead>
</table>


<!-- Modal -->
<div class="modal fade" id="preparation_model" tabindex="-1" role="dialog" aria-labelledby="preparation_model"
	aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header  bg-primary">
				<h5 class="modal-title" id="exampleModalLabel">Preapare Food</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="order_id" id="order_id">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="form-group">
							<label for="time_picker">Food will be ready after</label>
							<div class="well" style="padding:inherit;">
								<div id="datetimepicker1" class="input-append">
									<input class="timeinput" name="prepataion_time" id="prepataion_time"  data-format="hh:mm" type="text"></input>
									<span style="padding: 0px 0px 0px 5px;" class="add-on glyphicon glyphicon-time">
										<i data-time-icon="icon-time" data-date-icon="icon-calendar">
										</i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" onclick="prepare_changes()" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

@endsection

@section('custom-scripts')
<script>
	function cancel_order(id)
		{

				swal.fire({
				title: 'Are you sure?',
				text: 'You are going to cancel this product, which you will get only 50% as refund!',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#dd6b55',
				cancelButtonColor: '#999',
				confirmButtonText: 'Yes!',
				cancelButtonText: 'No',
				closeOnConfirm: false
				}).then( function(isConfirm)
				{	

					if(isConfirm.value)
					{
						window.location='/customer/product/cancel?id='+id;
					}
					
				});
					
		}

		function start_prepration(id)
		{
			$('#order_id').val(id);
			$('#preparation_model').modal('show');
		}

		function prepare_changes()
		{	

			swal.fire({
				title: 'Are you sure?',
				text: 'You are going to put this product in preparation!',
				type: 'info',
				showCancelButton: true,
				cancelButtonColor: '#999',
				confirmButtonText: 'Yes!',
				cancelButtonText: 'No',
				closeOnConfirm: false
				}).then( function(isConfirm)
				{	
					if(isConfirm.value)
					{
						window.location='/chef/order/preperation?prepration_time='+$('#prepataion_time').val()+'&id='+$('#order_id').val();
					}
					
			});

			
		}

		function prepare_ready(id)
		{	

			swal.fire({
				title: 'Are you sure?',
				text: 'You are going to put this product in Ready!',
				type: 'info',
				showCancelButton: true,
				cancelButtonColor: '#999',
				confirmButtonText: 'Yes!',
				cancelButtonText: 'No',
				closeOnConfirm: false
				}).then( function(isConfirm)
				{	
					if(isConfirm.value)
					{
						window.location='/chef/order/preperation?id='+id;
					}
					
			});

			
		}

		$(document).ready(function()
		{
			$('#chef_grid').DataTable({
				"ajax" : '/chef/product/view?type=json',
				'columns': [
					{
						'data': 'id',
						'sortable': false,
						'render': function(data, type, full) {

							var html = '';

							if(full.status == 0)
							{
								html += '<a title="Move to Preparation"  style="margin-right:16px;" onclick="start_prepration('+data+')" type="button" class="btn btn-success btn-xs dt-cancel"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>';
							}

							if(full.status != 2)
							{
								html += '<a title="Make Ready" onclick="prepare_ready('+data+')" type="button" class="btn btn-primary btn-xs dt-cancel"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>';
							}
							
							return html;
						}
					},
					{'data': 'reference_no'},
					{'data': 'venue'},
					{'data': 'status',
					'render': function(data, type, full) {
							var status = '';
							if(data == 0)
							{
								status = '<span class="label label-default">Ordered</span>'
							}

							else if(data == 1)
							{
								status = '<span class="label label-warning">On Prepearation</span>'
							}
							else if(data == 2)
							{
								status = '<span class="label label-success">Ready</span>'
							}
							else if(data == 3)
							{
								status = '<span class="label label-info">Delivery On Process</span>'
							}
							else if(data == 4)
							{
								status = '<span class="label label-primary">Delivered</span>'
							}

							else if(data == -1)
							{
								status = '<span class="label label-danger">Cancelled</span>'
							}
							return status;
						}

					
					},
					{'data': 'pick_time'},
					{'data': 'created_at'}
				]
			})

			$('#datetimepicker1').datetimepicker({
				pickDate: false
			});

		});

		$('#add_category').on('click', function()
		{
			window.location = '/admin/product/create';
		})
</script>
@endsection