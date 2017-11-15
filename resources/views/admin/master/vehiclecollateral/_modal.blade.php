{{-- Delete Modal --}}
<div class="modal fade" id="deleteCollateralModal" tabindex="-1" role="dialog" aira-labelledby="Delete Customer">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismis="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="CreateCustomer">Please Confirm</h4>
			</div>
			<div class="modal-body">
				<p class="modal-body">
					<i class="fa fa-question-circle fa-lg"></i>
					Are you sure you want to delete this Collateral?
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-danger" onclick=DeleteCollateral()><i class="fa fa-times-circle"></i> Yes
			</div>
		</div>
	</div>
</div>