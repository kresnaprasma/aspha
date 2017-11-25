@extends('layout.admin')

@section('content')
    {!! Form::model($pricehistory ,['route'=>['pricehistory.update', $pricehistory->id],'id'=>'formPriceHistory', 'method'=>'PUT']) !!}
    <div class="row">
        <div class="col-md-12">
            @include('admin.pricehistory._form',['edit'=>true])
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('scripts')
    @include('admin.pricehistory._js')
@stop