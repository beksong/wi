<div class="modal fade" id="mentorModal" tabindex="-1" role="form" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Update Data Mentor</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/editmentor') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" class="form-control" id="mentor_id" name="mentor_id">

                        <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nip Mentor</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="nip" name="nip" >

                                @if ($errors->has('nip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Mentor</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="name" name="name" >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hp') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nomor Hp Mentor</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="hp" name="hp" >

                                @if ($errors->has('hp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Email Mentor</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="email" name="email" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Jabatan Mentor</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="jabatan" name="jabatan" >

                                @if ($errors->has('jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jabatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('unitkerja') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Unit Kerja Mentor</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="unitkerja" name="unitkerja" >

                                @if ($errors->has('unitkerja'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('unitkerja') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="glyphicon glyphicon-pencil"></i> Ubah
                                </button>
                            </div>
                        </div>
                    </form>

                </div><!-- ENd MOdal Body-->
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>