@extends('layout.admin')

@section('content')
    {!! Form::model($pricesaleshistory ,['route'=>['pricesaleshistory.update', $pricesaleshistory->id],'id'=>'formPriceSalesHistory', 'method'=>'PUT']) !!}
    <div class="row">
        <div class="col-md-12">
            @include('admin.pricesaleshistory._form',['edit'=>true])
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('scripts')
    @include('admin.pricesaleshistory._js')
    {{-- <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script> --}}
    
    <script type="text/javascript">
    $(document).ready(function() {
        $('select[id="merk_id"]').on('change', function() {
            var merkID = $(this).val();
            if(merkID) {
                $.ajax({
                    url: '/pricesaleshistory/type/'+merkID,
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