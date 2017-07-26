@extends('layout.admin')

@section('content')
  <section class="content">
    {!! Form::model($user = new \App\User, ['route' => 'admin.master.user.store','class'=>'form-horizontal','id'=>'formCreateUser']) !!}
      @include('admin.master.user._form')
    {!! Form::close() !!}
  </section>
@stop

@section('scripts')
  <script type="text/javascript">
    
  </script>
@stop