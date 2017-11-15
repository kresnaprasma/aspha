@extends('layout.admin')

@section('content')
  <section class="content">
    {!! Form::model($vehiclecollateral = new \App\VehicleCollateral, ['route' => 'master.vehiclecollateral.store','class'=>'form-horizontal','id'=>'formCreateVehicleCollateral']) !!}
      @include('admin.master.vehiclecollateral._form',['edit'=>false])
    {!! Form::close() !!}
  </section>
@stop

@section('scripts')
  @include('admin.master.vehiclecollateral._js')
@stop