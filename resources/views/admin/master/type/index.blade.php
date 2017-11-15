@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Type</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            {{-- <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> --}}
          </div>
        </div>

        <div class="box-body">
          <div class="col-md-12 box-body-header">
            <div class="col-md-8">
              <button type="button" class="btn btn-default" onclick="AddType()">
                <i class="fa fa-plus" aria-hidden="true"></i> New
              </button>
              <button type="button" class="btn btn-default" onclick="deleteType()">
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

          {!! Form::open(['route'=>'master.type.delete', 'id'=>'formDeleteType']) !!}
          <table class="table table-bordered table-striped table-color" id="tableType">
            <thead>
              <th><input type="checkbox" id="check_all"/></th>
              <th>Code Type</th>
              <th>Name</th>
              <th>Merk</th>                           
            </thead>
            <tbody>
            @if(!empty($types) && $types->count())
              @foreach ($types as $t)
               	<tr>
                  <td>
                  <input type="checkbox" id="codeTableType" name="id[]" class="checkin" value="{{ $t->id }}">
                  </td>
               		<td>
                    {{ $t->id }}
                  </td>
               		<td>
                    {{ $t->name }}
                    <input type="hidden" id="nameTableType" name="name[]" value="{{ $t->name }}">
                  </td>
                  <td>
                    {{ $t->merk->name }}
                    <input type="hidden" id="merkTableType" name="merk_id[]" value="{{ $t->merk_id }}"> 
                  </td>                 
               	</tr>
              @endforeach
            @else
                <tr>
                  <td colspan="20">There are no data.</td>
                </tr>
            @endif
            </tbody>
          </table>
          {!! Form::close() !!}
        </div><!-- /.box-body -->
      </div>
		</div>
	</div>

  @include('admin.master.type._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableType = $('#tableType').DataTable({
      "dom": "rtip",
          "pageLength": 10,
          "retrieve": true,
    });

    $("#searchDtbox").keyup(function() {
      tableType.search($(this).val()).draw();
    });
    $('#tableType tbody').on('dblclick', 'tr', function () {
      if ( $(this).hasClass('selected') ) {
        $(this).removeClass('selected');
      }
      else {
        tableType.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var id = $(this).find('#codeTableType').val();
        var name = $(this).find('#nameTableType').val();
        var merk_id = $(this).find('#merkTableType').val(); 

        EditType(id, name, merk_id);
      }
    });

    function AddType() {
      $('#createTypeModal').modal('show');
    }

    function EditType(id, name, merk_id) {
      $("#editType").attr('action', '/master/type/' + id);
      $('#codeType').val(id);
      $("#nameType").val(name);
      $("#merkType").val(merk_id);
      $("#editTypeModal").modal("show");
    }

    function deleteType() {
      if ($('.checkin').is(':checked')) 
      {
        $('#deleteTypeModal').modal("show");
      }
      else
      {
        $('#deleteNoModal').modal("show");
      }
    }
    function DeleteType()
    {
      $("#formDeleteType").submit();
    }

	</script>
@stop