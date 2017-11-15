@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Credit Type</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>

        <div class="box-body">
          <div class="col-md-12 box-body-header">
            <div class="col-md-8">
              <button type="button" class="btn btn-default" onclick="AddCreditType()">
                <i class="fa fa-plus" aria-hidden="true"></i> New
              </button>
              <button type="button" class="btn btn-default" onclick="deleteCreditType()">
                <i class="fa fa-times" aria-hidden="true"></i> Delete
              </button>

              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">Print</a></li>
                  <li><a href="#">Import</a></li>
                  <li><a href="#">Export</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Find</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
                <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
            </div>
          </div>

          {!! Form::open(['route'=>'master.credittype.delete', 'id'=>'formDeleteCreditType']) !!}
          <table class="table table-bordered table-striped table-color" id="tableCreditType">
            <thead>
              <th><input type="checkbox" id="check_all"/></th>
              <th>Id</th>
              <th>Name</th>                           
            </thead>
            <tbody>
              @foreach ($credittypes as $ct)
               	<tr>
                  <td>
                    <input type="checkbox" id="idTableCreditType" name="id[]" class="checkin" value="{{ $ct->id }}"/>
                  </td>
               		<td>
                    {{ $ct->id }}
                  </td>
               		<td>
                    {{ $ct->name }}
                    <input type="hidden" id="nameTableCreditType" name="name[]" value="{{ $ct->name }}">
                  </td>
               	</tr>
              @endforeach
            </tbody>
          </table>
          {!! Form::close() !!}
        </div><!-- /.box-body -->
      </div>
		</div>
	</div>

  @include('admin.master.credittype._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableCreditType = $('#tableCreditType').DataTable({
      "dom": "rtip",
          "pageLength": 10,
          "retrieve": true,
    });

    $("#searchDtbox").keyup(function() {
      tableCreditType.search($(this).val()).draw();
    });
    $('#tableCreditType tbody').on('dblclick', 'tr', function () {
      if ( $(this).hasClass('selected') ) {
        $(this).removeClass('selected');
      }
      else {
        tableCreditType.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var id = $(this).find('#idTableCreditType').val();
        var name = $(this).find('#nameTableCreditType').val();

        EditCreditType(id, name);
      }
    });

    function AddCreditType() {
      $('#createCreditTypeModal').modal('show');
    }

    function EditCreditType(id, name) {
      $("#editCreditType").attr('action', '/master/credittype/' + id);
      $('#idCreditType').val(id);
      $("#nameCreditType").val(name);
      $("#editCreditTypeModal").modal("show");
    }

    function deleteCreditType() {
      if ($('.checkin').is(':checked')) 
      {
        $('#deleteCreditTypeModal').modal("show");
      }
      else
      {
        $('#deleteNoModal').modal("show");
      }
    }
    function DeleteCreditType()
    {
      $("#formDeleteCreditType").submit();
    }

	</script>
@stop