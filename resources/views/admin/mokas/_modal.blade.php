{{-- Delete Modal Mokas--}}
<div class="modal fade" id="deleteMokasModal" tabindex="-1" role="dialog" aira-labelledby="DeleteMokas">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismis="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="CreateMokas">Please Confirm</h4>
			</div>
			<div class="modal-body">
				<p class="modal-body">
					<i class="fa fa-question-circle fa-lg"></i>
					Are you sure you want to delete this Stock?
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-danger" onclick=DeleteMokas()><i class="fa fa-times-circle"></i> Yes
			</div>
		</div>
	</div>
</div>

{{-- View Discount Modal --}}
<div class="modal fade" id="viewPriceSalesHistoryModal" tabindex="-1" role="dialog" aira-labelledby="CreateSalesHistory">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismis="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="CreateCash">Price Sales History List</h4>
			</div>
			<div class="modal-body">
				<div class="col-md-4">
			    	<input type="text" id="searchDtbox" class="form-control" placeholder="Search">
		   		</div>
				<table class="table table-striped" id="tablePriceSalesHistory">
					<thead>
						<th></th>
						<th>Type</th>
						<th>Selling Price</th>
						<th>Discount</th>
					</thead>
					<tbody>
						@foreach($pricesaleshistory as $psh)
						<tr>
							<td>
								<input type="hidden" id="idtablePriceSalesHistory" name="id[]" class="checkin" value="{{ $psh->id }}">
							</td>
							<td>{{ $psh->types['name'] }}</td>
							<td>{{ $psh->selling_price }}</td>
							<td>{{ $psh->discount }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>