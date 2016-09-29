<div class="modal fade" id="delAngkatan" tabindex="-1" role="form" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <legend>Yakin Akan Menghapus Data?</legend>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/angkatan/delete') }}">
                        {!! csrf_field() !!}

                        <input type="hidden" class="form-control" id="lembaga_id" name="lembaga_id">
                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"></label>

                            <div class="col-md-8">
                                <input type="hidden" class="form-control" id="angkatan_id" name="angkatan_id" >

                                @if ($errors->has('id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama_lembaga') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Lembaga Diklat</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" id="nama_lembaga" name="nama_lembaga" readonly="true">
                                @if ($errors->has('nama_lembaga'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_lembaga') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama_diklat') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Diklat</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" id="nama_diklat" name="nama_diklat" readonly="true" >

                                @if ($errors->has('nama_diklat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_diklat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tahun') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tahun Penyelenggaraan</label>

                            <div class="col-md-4">
                                <input type="number" class="form-control" id="tahun" name="tahun" readonly="true">

                                @if ($errors->has('tahun'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tahun') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('angkatan') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Angkatan Ke</label>

                            <div class="col-md-3">
                                <input type="text" class="form-control" id="angkatan" name="angkatan" readonly="true" >

                                @if ($errors->has('angkatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('angkatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-danger">
                                    <i class="glyphicon glyphicon-remove-circle"></i> Hapus
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