@extends('layout.admin')

@section('content')
  <section class="content">
    {!! Form::model($supplier = new \App\Supplier, ['route' => 'admin.master.supplier.store','class'=>'form-horizontal','id'=>'formCreateSupplier']) !!}
      @include('admin.master.supplier._form',['edit'=>false])
    {!! Form::close() !!}
  </section>
@stop

@section('scripts')
  @include('admin.master.supplier._js')
@stop