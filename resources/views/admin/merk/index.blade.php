@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Merk</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            {{-- <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> --}}
          </div>
        </div>

        <div class="box-body">
          <div class="col-md-12 box-body-header">  
            <div class="col-md-8">
              <button type="button" class="btn btn-default" onclick="AddMerk()">
                <i class="fa fa-plus" aria-hidden="true"></i> New
              </button>
              <button type="button" class="btn btn-default" onclick="deleteMerk()">
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

          {!! Form::open(['route'=>'admin.merk.delete', 'id'=>'formDeleteMerk']) !!}
          <table class="table table-bordered table-striped table-color" id="tableMerk">
            <thead>
              <th><input type="checkbox" id="check_all"/></th>
              <th>Id</th>
              <th>Name</th>                           
            </thead>
            <tbody>
              @foreach ($merks as $m)
               	<tr>
                  <td>
                    <input type="checkbox" id="idTableMerk" name="id[]" class="checkin" value="{{ $m->id }}"/>
                  </td>
               		<td>
                    {{ $m->id }}
                  </td>
               		<td>
                    {{ $m->name }}
                    <input type="hidden" id="nameTableMerk" name="name[]" value="{{ $m->name }}">
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

  @include('admin.merk._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableMerk = $('#tableMerk').DataTable({
      "dom": "rtip",
          "pageLength": 10,
          "retrieve": true,
    });

    $("#searchDtbox").keyup(function() {
      tableMerk.search($(this).val()).draw();
    });
    $('#tableMerk tbody').on('dblclick', 'tr', function () {
      if ( $(this).hasClass('selected') ) {
        $(this).removeClass('selected');
      }
      else {
        tableMerk.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var id = $(this).find('#idTableMerk').val();
        var name = $(this).find('#nameTableMerk').val();

        EditMerk(id, name);
      }
    });

    function AddMerk() {
      $('#createMerkModal').modal('show');
    }

    function EditMerk(id, name) {
      $("#editMerk").attr('action', '/admin/merk/' + id);
      $('#idMerk').val(id);
      $("#nameMerk").val(name);
      $("#editMerkModal").modal("show");
    }

    function deleteMerk() {
      if ($('.checkin').is(':checked')) 
      {
        $('#deleteMerkModal').modal("show");
      }
      else
      {
        $('#deleteNoModal').modal("show");
      }
    }
    function DeleteMerk()
    {
      $("#formDeleteMerk").submit();
    }

	</script>
@stop