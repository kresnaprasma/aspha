<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Employee Forms {{ $emp->nip }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div id="message-alert"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="outer-div">          
                    <div class="inner-div">
                        <img id="profile_img">
                    </div>
                    <button type="button" class="btn-upload-profile fileinput-button">
                      <i class="fa fa-camera" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btn-delete-profile" onclick="deletePicture()" style="display: hidden">
                      <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                    @if ($emp->pictures()->count() > 0)
                        <input type="hidden" id="profile_id" name="profile_id" value="{{ $emp->pictures()->first()->id }}" />
                    @else 
                        <input type="hidden" id="profile_id" name="profile_id" value="" />
                    @endif
                </div>


                <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                    {!! Form::label('nip', "Nip", ['class'=>'control-label']) !!}
                    @if ($edit)
                        {!! Form::text('nip', $emp->nip, ['class'=>'form-control', 'id'=>'nip','autofocus']) !!}
                    @else 
                        {!! Form::text('nip',null, ['class'=>'form-control', 'id'=>'nip','autofocus']) !!}
                    @endif
                    {!! Form::hidden('id', null, ['id'=>'id_employee']) !!}
                    @if ($errors->has('nip'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nip') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', "Name", ['class'=>'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class'=>'form-control', 'id'=>'name']) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('alias') ? ' has-error' : '' }}">
                    {!! Form::label('alias', "Alias", ['class'=>'control-label']) !!}
                    {!! Form::text('alias', old('alias'), ['class'=>'form-control', 'id'=>'alias']) !!}
                    @if ($errors->has('alias'))
                        <span class="help-block">
                            <strong>{{ $errors->first('alias') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', "Email", ['class'=>'control-label']) !!}
                    {!! Form::text('email', old('email'), ['class'=>'form-control', 'id'=>'email']) !!}
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('facebook_account') ? ' has-error' : '' }}">
                    {!! Form::label('facebook_account', "Facebook Account", ['class'=>'control-label']) !!}
                    {!! Form::text('facebook_account', old('facebook_account'), ['class'=>'form-control', 'id'=>'facebook_account']) !!}
                    @if ($errors->has('facebook_account'))
                        <span class="help-block">
                            <strong>{{ $errors->first('facebook_account') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('instagram_account') ? ' has-error' : '' }}">
                    {!! Form::label('instagram_account', "Instagram Account", ['class'=>'control-label']) !!}
                    {!! Form::text('instagram_account', old('instagram_account'), ['class'=>'form-control', 'id'=>'instagram_account']) !!}
                    @if ($errors->has('instagram_account'))
                        <span class="help-block">
                            <strong>{{ $errors->first('instagram_account') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                    {!! Form::label('city', "City", ['class'=>'control-label']) !!}
                    {!! Form::text('city', old('city'), ['class'=>'form-control', 'id'=>'city']) !!}
                    @if ($errors->has('city'))
                        <span class="help-block">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- /.col -->

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    {!! Form::label('address', "Address", ['class'=>'control-label']) !!}
                    {!! Form::textarea('address', old('address'), ['class'=>'form-control', 'id'=>'address']) !!}
                    @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('kelurahan') ? ' has-error' : '' }}">
                    {!! Form::label('kelurahan', "Kelurahan", ['class'=>'control-label']) !!}
                    {!! Form::text('kelurahan', old('kelurahan'), ['class'=>'form-control', 'id'=>'kelurahan']) !!}
                    @if ($errors->has('kelurahan'))
                        <span class="help-block">
                            <strong>{{ $errors->first('kelurahan') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('kecamatan') ? ' has-error' : '' }}">
                    {!! Form::label('kecamatan', "Kecamatan", ['class'=>'control-label']) !!}
                    {!! Form::text('kecamatan', old('kecamatan'), ['class'=>'form-control', 'id'=>'kecamatan']) !!}
                    @if ($errors->has('kecamatan'))
                        <span class="help-block">
                            <strong>{{ $errors->first('kecamatan') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                    {!! Form::label('province', "Province", ['class'=>'control-label']) !!}
                    {!! Form::text('province', old('province'), ['class'=>'form-control', 'id'=>'province']) !!}
                    @if ($errors->has('province'))
                        <span class="help-block">
                            <strong>{{ $errors->first('province') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    {!! Form::label('phone', "Phone", ['class'=>'control-label']) !!}
                    {!! Form::text('phone', old('phone'), ['class'=>'form-control', 'id'=>'phone']) !!}
                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- /.col -->

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                    {!! Form::label('birthday', "Birthday", ['class'=>'control-label']) !!}
                    {!! Form::date('birthday', old('birthday'), ['class'=>'form-control', 'id'=>'birthday']) !!}
                    @if ($errors->has('birthday'))
                        <span class="help-block">
                            <strong>{{ $errors->first('birthday') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('birthplace') ? ' has-error' : '' }}">
                    {!! Form::label('birthplace', "Birthplace", ['class'=>'control-label']) !!}
                    {!! Form::text('birthplace', old('birthplace'), ['class'=>'form-control', 'id'=>'birthplace']) !!}
                    @if ($errors->has('birthplace'))
                        <span class="help-block">
                            <strong>{{ $errors->first('birthplace') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('mother_name') ? ' has-error' : '' }}">
                    {!! Form::label('mother_name', "Mother Name", ['class'=>'control-label']) !!}
                    {!! Form::text('mother_name', old('mother_name'), ['class'=>'form-control', 'id'=>'mother_name']) !!}
                    @if ($errors->has('mother_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mother_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('marrital') ? ' has-error' : '' }}">
                    {!! Form::label('marrital', "Marrital", ['class'=>'control-label']) !!}
                    {!! Form::text('marrital', old('marrital'), ['class'=>'form-control', 'id'=>'marrital']) !!}
                    @if ($errors->has('marrital'))
                        <span class="help-block">
                            <strong>{{ $errors->first('marrital') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('blood_type') ? ' has-error' : '' }}">
                    {!! Form::label('blood_type', "Blood Type", ['class'=>'control-label']) !!}
                    {!! Form::select('blood_type', ['A'=>'A', 'AB'=>'AB','B'=>'B','O'=>'O'],old('blood_type'), ['class'=>'form-control', 'id'=>'blood_type']) !!}
                    @if ($errors->has('blood_type'))
                        <span class="help-block">
                            <strong>{{ $errors->first('blood_type') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                    {!! Form::label('zipcode', "Zipcode", ['class'=>'control-label']) !!}
                    {!! Form::text('zipcode', old('zipcode'), ['class'=>'form-control', 'id'=>'zipcode']) !!}
                    @if ($errors->has('zipcode'))
                        <span class="help-block">
                            <strong>{{ $errors->first('zipcode') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                    {!! Form::label('gender', "Gender", ['class'=>'control-label']) !!}
                    {!! Form::select('gender', ['male'=>'Male', 'female'=>'Female'],old('gender'), ['class'=>'form-control', 'id'=>'gender']) !!}
                    @if ($errors->has('gender'))
                        <span class="help-block">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Bank Account</h3>
    </div>
    <!-- /.box-header -->

    <div class="box-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('bank_account') ? ' has-error' : '' }}">
                    {!! Form::label('bank_account', "Bank Account", ['class'=>'control-label']) !!}
                    {!! Form::text('bank_account', old('bank_account'), ['class'=>'form-control', 'id'=>'bank_account','autofocus']) !!}
                    @if ($errors->has('bank_account'))
                        <span class="help-block">
                            <strong>{{ $errors->first('bank_account') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('bank_branch') ? ' has-error' : '' }}">
                    {!! Form::label('bank_branch', "Bank Branch", ['class'=>'control-label']) !!}
                    {!! Form::text('bank_branch', old('bank_branch'), ['class'=>'form-control', 'id'=>'bank_branch']) !!}
                    @if ($errors->has('bank_branch'))
                        <span class="help-block">
                            <strong>{{ $errors->first('bank_branch') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- /.col -->

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('bank_name') ? ' has-error' : '' }}">
                    {!! Form::label('bank_name', "Bank Name", ['class'=>'control-label']) !!}
                    {!! Form::text('bank_name', old('bank_name'), ['class'=>'form-control', 'id'=>'bank_name']) !!}
                    @if ($errors->has('bank_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('bank_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('npwp') ? ' has-error' : '' }}">
                    {!! Form::label('npwp', "Npwp", ['class'=>'control-label']) !!}
                    {!! Form::text('npwp', old('npwp'), ['class'=>'form-control', 'id'=>'npwp']) !!}
                    @if ($errors->has('npwp'))
                        <span class="help-block">
                            <strong>{{ $errors->first('npwp') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-body -->
</div>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Job Status</h3>
    </div>
    <!-- /.box-header -->

    <div class="box-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('job_status') ? ' has-error' : '' }}">
                    {!! Form::label('job_status', "Job Status", ['class'=>'control-label']) !!}
                    {!! Form::select('job_status', ['Active'=>'Active', 'Skorsing'=>'Skorsing', 'Move'=>'Move', 'Retired'=>'Retired', 'Fired'=>'Fired'],old('job_status'), ['class'=>'form-control', 'id'=>'job_status','autofocus']) !!}
                    @if ($errors->has('job_status'))
                        <span class="help-block">
                            <strong>{{ $errors->first('job_status') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('job_start') ? ' has-error' : '' }}">
                    {!! Form::label('job_start', "Job Start", ['class'=>'control-label']) !!}
                    {!! Form::date('job_start', old('job_start'), ['class'=>'form-control', 'id'=>'job_start','autofocus']) !!}
                    @if ($errors->has('job_start'))
                        <span class="help-block">
                            <strong>{{ $errors->first('job_start') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('job_end') ? ' has-error' : '' }}">
                    {!! Form::label('job_end', "Job End", ['class'=>'control-label']) !!}
                    {!! Form::date('job_end', old('job_end'), ['class'=>'form-control', 'id'=>'job_end','autofocus']) !!}
                    @if ($errors->has('job_end'))
                        <span class="help-block">
                            <strong>{{ $errors->first('job_end') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- /.col -->

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('branch_id') ? ' has-error' : '' }}">
                    {!! Form::label('branch_id', "Branch", ['class'=>'control-label']) !!}
                    {!! Form::select('branch_id',$branch_list, old('branch_id'), ['class'=>'form-control', 'id'=>'branch_id']) !!}
                    @if ($errors->has('branch_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('branch_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('department_no') ? ' has-error' : '' }}">
                    {!! Form::label('department_no', "Department", ['class'=>'control-label']) !!}
                    {!! Form::select('department_no',$department_list, old('department_no'), ['class'=>'form-control', 'id'=>'department_no']) !!}
                    @if ($errors->has('department_no'))
                        <span class="help-block">
                            <strong>{{ $errors->first('department_no') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('position_no') ? ' has-error' : '' }}">
                    {!! Form::label('position_no', "Position", ['class'=>'control-label']) !!}
                    {!! Form::select('position_no', $position_list, old('position_no'), ['class'=>'form-control', 'id'=>'position_no']) !!}
                    @if ($errors->has('position_no'))
                        <span class="help-block">
                            <strong>{{ $errors->first('position_no') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('grade') ? ' has-error' : '' }}">
                    {!! Form::label('grade', "Grade", ['class'=>'control-label']) !!}
                    {!! Form::text('grade', old('grade'), ['class'=>'form-control', 'id'=>'grade']) !!}
                    @if ($errors->has('grade'))
                        <span class="help-block">
                            <strong>{{ $errors->first('grade') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <div class="box-footer">
            @if ($edit)
                <button type="button" class="btn btn-primary" onclick="save()">Update</button>
            @else
                <button type="button" class="btn btn-primary" onclick="save()">Save</button>
            @endif
        </div>
    </div>
</div>
