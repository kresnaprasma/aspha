@extends('layout.admin')

@section('content')

    {!! Form::model($mokas = new \App\Mokas, ['route'=>'admin.mokas.store','id'=>'formMokas']) !!}
    <div class="row">
        <div class="col-md-12">
            @include('admin.mokas._formtab',['edit'=>false])
        </div>
    </div>
    {!! Form::close() !!}
    @include('admin.mokas._modal')
@stop

@section('scripts')
    @include('admin.mokas._js')
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function() {
        $('select[id="merk_id"]').on('change', function() {
            var merkID = $(this).val();
            if(merkID) {
                $.ajax({
                    url: '/admin/mokas/type/'+merkID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        
                        $('select[id="type_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[id="type_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[id="type_id"]').empty();
            }
        });
    });
    </script>
@stop