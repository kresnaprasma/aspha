<!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">User Manajemen</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', "Name", ['class'=>'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('name', old('name'), ['class'=>'form-control','required','autofocus']) !!}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', "E-mail", ['class'=>'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('email', old('email'), ['class'=>'form-control','required']) !!}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                    {!! Form::label('role_id', 'Role',['class'=>'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::select('role_id',$roles, old('roles_id'), ['class'=>'form-control','required']) !!}
                        @if ($errors->has('role_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('role_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password', 'Password', ['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-6">
                        {!! Form::password('password', null, ['class'=>'form-control','required']) !!}
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('password-confirm', 'Confirm Password',['class'=>'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::password('password_confirmation', null, ['class'=>'form-control','id'=>'password-confirm','required']) !!}
                    </div>
                </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
      </div>
      <!-- /.box -->
