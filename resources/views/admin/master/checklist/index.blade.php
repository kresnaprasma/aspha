@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Checklist</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            {{-- <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> --}}
          </div>
        </div>

        <div class="box-body">
          <div class="col-md-12 box-body-header">  
            <div class="col-md-8">
              <button type="button" class="btn btn-default" onclick="AddChecklist()">
                <i class="fa fa-plus" aria-hidden="true"></i> New
              </button>
              <button type="button" class="btn btn-default" onclick="deleteChecklist()">
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

          {!! Form::open(['route'=>'admin.master.checklist.delete', 'id'=>'formDeleteChecklist']) !!}
          <table class="table table-bordered table-striped table-color" id="tableChecklist">
            <thead>
              <th><input type="checkbox" id="check_all"/></th>
              <th>Id</th>
              <th>Name</th>                           
            </thead>
            <tbody>
              @foreach ($checklists as $ch)
               	<tr>
                  <td>
                    <input type="checkbox" id="idTableChecklist" name="id[]" class="checkin" value="{{ $ch->id }}"/>
                  </td>
               		<td>
                    {{ $ch->id }}
                  </td>
               		<td>
                    {{ $ch->name }}
                    <input type="hidden" id="nameTableChecklist" name="name[]" value="{{ $ch->name }}">
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

  @include('admin.master.checklist._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableChecklist = $('#tableChecklist').DataTable({
      "dom": "rtip",
          "pageLength": 10,
          "retrieve": true,
    });

    $("#searchDtbox").keyup(function() {
      tableChecklist.search($(this).val()).draw();
    });
    $('#tableChecklist tbody').on('dblclick', 'tr', function () {
      if ( $(this).hasClass('selected') ) {
        $(this).removeClass('selected');
      }
      else {
        tableChecklist.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var id = $(this).find('#idTableChecklist').val();
        var name = $(this).find('#nameTableChecklist').val();

        EditChecklist(id, name);
      }
    });

    function AddChecklist() {
      $('#createChecklistModal').modal('show');
    }

    function EditChecklist(id, name) {
      $("#editChecklist").attr('action', '/admin/master/checklist/' + id);
      $('#idChecklist').val(id);
      $("#nameChecklist").val(name);
      $("#editChecklistModal").modal("show");
    }

    function deleteChecklist() {
      if ($('.checkin').is(':checked')) 
      {
        $('#deleteChecklistModal').modal("show");
      }
      else
      {
        $('#deleteNoModal').modal("show");
      }
    }
    function DeleteChecklist()
    {
      $("#formDeleteChecklist").submit();
    }

	</script>
@stop