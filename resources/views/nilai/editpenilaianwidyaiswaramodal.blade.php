<div class="modal fade bs-example-modal-lg" id="editpenilaianwidyaiswaramodal" tabindex="-1" role="form" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Ubah Data Penilaian Terhadap Widyaiswara</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/nilai/update') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" id="nilai_id" name="nilai_id" class="form-control">
                        <div class="form-group{{ $errors->has('widyaiswara_id') ? ' has-error' : '' }}">
                            <label class="col-md-5 control-label">Nama Widyaiswara</label>
                            <div class="col-md-6">
                                <select class="form-control" id="widyaiswara_id" name="widyaiswara_id">
                                    <option value="">--Pilih Nama Widyaiswara--</option>
                                    @foreach($widyaiswaras as $w=>$widyaiswara)
                                        <option value="{{$widyaiswara->id}}">{{$widyaiswara->nama}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('widyaiswara_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('widyaiswara_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lembaga_id') ? ' has-error' : '' }}">
                            <label class="col-md-5 control-label">Lembaga Penyelenggara Diklat</label>
                            <div class="col-md-6">
                                <select class="form-control" id="lembaga_id" name="lembaga_id">
                                        <option value="">--Pilih Lembaga Penyelenggara--</option>
                                    @foreach($lembagas as $a=>$lembaga)
                                        <option value="{{$lembaga->id}}">{{$lembaga->nama}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('lembaga_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lembaga_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('angkatan_id') ? ' has-error' : '' }}">
                            <label class="col-md-5 control-label">Nama Diklat / Angkatan</label>
                            <div class="col-md-6">
                                <select class="form-control" id="angkatan_id" name="angkatan_id">
                                    <option value="">--Pilih Nama Diklat / Angkatan</option>
                                </select>

                                @if ($errors->has('angkatan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('angkatan_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('matadiklat_id') ? ' has-error' : '' }}">
                            <label class="col-md-5 control-label">Nama Mata Diklat</label>

                            <div class="col-md-6">
                                <select class="form-control" id="matadiklat_id" name="matadiklat_id">
                                    <option value="">--Pilih Mata Diklat--</option>
                                    @foreach($matadiklats as $mk=>$matadiklat)
                                        <option value="{{$matadiklat->id}}">{{$matadiklat->nama}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('matadiklat_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('matadiklat_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tgl') ? ' has-error' : '' }}">
                            <label class="col-md-5 control-label">Tanggal Pelaksanaan Diklat</label>

                            <div class="input-group col-sm-3">
                                <input type="text" name="tgl" id="tgl" class="form-control datetimepicker datetimepicker-inline" placeholder="Tahun-Bulan-Tanggal"></input>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                @if ($errors->has('tgl'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jp') ? ' has-error' : '' }}">
                            <label class="col-md-5 control-label">Jumlah JP</label>

                            <div class="col-sm-3">
                                <input type="text" name="jp" id="jp" class="form-control" placeholder="Jumlah JP"></input>
                                @if ($errors->has('jp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                                <button type="submit" class="btn btn-success">
                                    <i class="glyphicon glyphicon-floppy-disk"></i> Simpan
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