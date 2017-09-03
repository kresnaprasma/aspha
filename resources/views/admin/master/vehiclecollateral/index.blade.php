@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Vehicle Collateral</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            {{-- <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> --}}
          </div>
        </div>

        <div class="box-body">
          <div class="col-md-12 box-body-header">  
            <div class="col-md-8">
              <a href="/admin/master/vehiclecollateral/create" type="button" class="btn btn-default">
                <i class="fa fa-plus" aria-hidden="true"></i> New
              </a>
              {{-- <button type="button" class="btn btn-default" onclick="AddCollateral()">
                <i class="fa fa-plus" aria-hidden="true"> New</i>
              </button> --}}
              <button type="button" class="btn btn-default" onclick="deleteCollateral()">
                <i class="fa fa-times" aria-hidden="true"></i> Delete
              </button>

              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">Print</a></li>
                  <li><a href="#">Import</a></li>
                  <li><a href="{{ url('admin/vehiclecollateral/downloadExcel/xls') }}">Export</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Find</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
                <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
            </div>

            {!! Form::open(['route'=>'admin.master.vehiclecollateral.delete', 'id'=>'formDeleteCollateral']) !!}

          </div>

              @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $message }}</p>
                  </div>
              @endif

          <table class="table table-bordered table-striped table-color" id="tableCollateral">
            <thead>
              <th><input type="checkbox" name="check_all"></th>
              <th>Merk</th>
              <th>Type</th>
              <th>Tahun Kendaraan</th>
              <th>Harga</th>
            </thead>
            <tbody>
              @foreach($VehicleCollaterals as $vc)
                <tr>
                  <td>
                    <input type="checkbox" id="idTableCollateral" name="id[]" class="checkin" value="{{ $vc->id }}"/>
                  </td>
                  {{-- <td>
                    {{ $vc->id }}
                  </td> --}}
                  <td>
                    {{ $vc->merks['name'] }}
                    <input type="hidden" id="merkTableCollateral" name="merk_id[]" value="{{ $vc->merk_id }}">
                  </td>
                  <td>
                    {{ $vc->types['name'] }}
                    <input type="hidden" id="typeTableCollateral" name="type_id[]" value="{{ $vc->type_id }}">
                  </td>
                  <td>
                    {{ $vc->vehicle_date }}
                    <input type="hidden" id="dateTableCollateral" name="vehicle_date[]" value="{{ $vc->vehicle_date }}">
                  </td>
                  <td>
                    <p>Rp{{ number_format($vc->vehicle_price, 2) }}</p>
                    <input type="hidden" id="priceTableCollateral" name="vehicle_price[]" value="{{ $vc->vehicle_price }}">
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {!! Form::close() !!}
        </div><!-- box body -->
      </div>
    </div>
  </div>

  @include('admin.master.vehiclecollateral._modal')
@stop

@section('scripts')

  <script type="text/javascript">
    var tableCollateral = $('#tableCollateral').DataTable({
      "dom": "rtip",
          "pageLength": 10,
          "retrieve": true,
    });

    $("#searchDtbox").keyup(function(){
      tableCollateral.search($(this).val()).draw();
    });

    $('#tableCollateral tbody').on('dblclick', 'tr', function(){
      if ( $(this).hasClass('selected') ) {
        $(this).removeClass('selected');
      }
      else {
        tableCollateral.$('tr.selected').removeClass('selected');
        $(this).addClass('selected'); 

          var id = $(this).find('#idTableCollateral').val();
          var merks_id = $(this).find('#merkTableCollateral').val();
          var types_id = $(this).find('#typeTableCollateral').val();
          var vehicle_date = $(this).find('#dateTableCollateral').val();
          var vehicle_price = $(this).find('#priceTableCollateral').val();
          GetEditDropdown(merks_id);
          
          EditCollateral(id, merks_id, types_id, vehicle_date, vehicle_price);
      }
    });

    $('select[id="merks_id"]').on('change', function() { 
      var merks_id = $(this).val();
      GetEditDropdown(merks_id);    
    });

    function AddCollateral() {
      $('#createCollateralModal').modal('show');
    }

    function EditCollateral(id, merks_id, types_id, vehicle_date, vehicle_price) {
      $("#editCollateral").attr('action', '/admin/master/vehiclecollateral/' + id);
      $('#idCollateral').val(id);
      $("#merkCollateral").val(merks_id);
      $("#typeCollateral").val(types_id);
      $("#dateCollateral").val(vehicle_date);
      $("#priceCollateral").val(vehicle_price);

      $("#editCollateralModal").modal("show");
    }

    function deleteCollateral() {
      if ($('.checkin').is(':checked')) {
        $('#deleteCollateralModal').modal("show");
      }
      else
      {
        $('#deleteNoModal').modal("show");
      }
    }

    function DeleteCollateral() {
      $("#formDeleteCollateral").submit();
    }

    function GetEditDropdown(merks_id) {
      if (merks_id) {
        $.ajax({
          url: '/admin/vehiclecollateral/type/'+ merks_id,
          type: "GET",
          dataType: "json",
          success:function(data) {

            $('#typeCollateral').empty();
            $.each(data, function(key, value) {
              $('#typeCollateral').append('<option value="'+ key +'">'+ value + '</option>');
            });
          }
        });
      }else{
        $('#typeCollateral').empty();
      }
    }
  </script>
@stop