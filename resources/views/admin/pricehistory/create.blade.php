@extends('layout.admin')

@section('content')

    {!! Form::model($pricehistory = new \App\PriceHistory, ['route'=>'admin.pricehistory.store','id'=>'formPriceHistory']) !!}
    <div class="row">
        <div class="col-md-12">
            @include('admin.pricehistory._form',['edit'=>false])
        </div>
    </div>
    {!! Form::close() !!}
    @include('admin.pricehistory._modal')
@stop

@section('scripts')
    @include('admin.pricehistory._js')
@stop