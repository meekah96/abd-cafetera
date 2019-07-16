@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection

@section('custom-css')	
<style>
	.header-button
	{
		margin-bottom: 15px;
	}
</style>
@endsection

@section('header-content')	
<div >
<h3>Deliver Agenda</h3>
</div>
<div class="row">
	

</div>
@endsection



@section('main-content')

	<table id="deliver_boy_purcase_grid" class="table table-bordered">
		<thead>
			<tr>
				<th>Actions</th>
				<th>Reference Number</th>
				<th>Picked By</th>
				<th>Status</th>
				<th>Pick Time</th>
				<th>Ordered Time</th>
			</tr>
		</thead>
	</table>
@endsection

@section('custom-scripts')	
	<script>

		function pick_delivery(id)
		{

				swal.fire({
				title: 'Are you sure?',
				text: 'You are going to pick this product!',
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
						window.location='/chef/order/preperation?id='+id+'&deliver=on';
					}
					
				});
					
		}

		$(document).ready(function()
		{
			$('#deliver_boy_purcase_grid').DataTable({
				"ajax" : '/deliver-boy/product/view?type=json',
				'columns': [
					{
						'data': 'id',
						'sortable': false,
						'render': function(data, type, full) {
							console.log(full.status);
							var html = '';
							if(full.deliverd_by == 0 )
							{
								html += '<a onclick="pick_delivery('+data+')" type="button" class="btn btn-success btn-xs dt-cancel"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></a>';
							}
							
							return html;
						}
					},
					{'data': 'reference_no'},
					{'data': 'name',
						'render': function(data, type, full) 
						{
							if(data!= null) return data;
							else return '-'
						}
					},
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

		});

		$('#add_category').on('click', function()
		{
			window.location = '/admin/product/create';
		})
	</script>
@endsection