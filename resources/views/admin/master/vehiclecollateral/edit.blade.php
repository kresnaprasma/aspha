@extends('layout.admin')

@section('content')
  <section class="content">
    {!! Form::model($vehiclecollateral, ['route' => ['master.vehiclecollateral.update', $vehiclecollateral->id],'class'=>'form-horizontal','id'=>'formCreateVehicleCollateral','method'=>'PATCH']) !!}
      @include('admin.master.vehiclecollateral._form',['edit'=>true])
    {!! Form::close() !!}
  </section>
@stop

@section('scripts')
  @include('admin.master.vehiclecollateral._js')
@stop