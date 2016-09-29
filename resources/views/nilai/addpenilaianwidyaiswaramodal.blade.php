<div class="modal fade bs-example-modal-lg" id="addpenilaianwidyaiswaramodal" tabindex="-1" role="form" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Input Penilaian Terhadap Widyaiswara</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/nilai/add') }}">
                        {!! csrf_field() !!}
                        
                        <div class="form-group">
                            <div class="control-label">
                                <label class="col-sm-4">Nama Widyaiswara</label>
                            </div>
                            
                            <div class="col-md-6">
                                <select class="form-control" id="widyaiswara_id" name="widyaiswara_id">
                                        <option value="" selected>--Pilih Nama Widyaiswara--</option>
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

                        <div class="form-group">
                            <div class="control-label">
                                <label class="col-sm-4">Lembaga Penyelenggara Diklat</label>
                            </div>
                            
                            <div class="col-md-8">
                                <select class="form-control" id="lembaga_id" name="lembaga_id">
                                        <option value="" selected>--Pilih Lembaga Penyelenggara Diklat--</option>
                                    @foreach($lembagas as $l=>$lembaga)
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

                        <div class="form-group">
                            <div class="control-label">
                                <label class="col-sm-4">Nama Angkatan Diklat</label>
                            </div>
                            
                            <div class="col-md-8">
                                <select class="form-control" id="angkatan_id" name="angkatan_id">
                                    <option value="">--Pilih Angkatan Diklat--</option>
                                </select>
                                @if ($errors->has('angkatan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('angkatan_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="control-label">
                                <label class="col-sm-4">Nama Mata Diklat</label>
                            </div>
                            
                            <div class="col-md-8">
                                <select class="form-control" id="matadiklat_id" name="matadiklat_id">
                                    <option value="" selected>--Pilih Angkatan Diklat--</option>
                                    @foreach($matadiklats as $ms=>$matadiklat)
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
                        
                        <div class="form-group">
                            <div class="control-label">
                                <label class="col-sm-4">Tanggal Pelaksanaan</label>
                            </div>
                            
                            <div class="col-md-5">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="tgl" id="tgl" placeholder="tgl Pelaksanaan">
                                    <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                                </div>
                                @if ($errors->has('tgl'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="control-label">
                                <label class="col-sm-4">Jumlah JP</label>
                            </div>
                            
                            <div class="col-md-5">
                                <input class="form-control" type="number" name="jp" id="jp" placeholder="Jumlah JP">
                                @if ($errors->has('tgl'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
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