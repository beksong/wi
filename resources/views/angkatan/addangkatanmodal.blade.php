<div class="modal fade" id="addAngkatan" tabindex="-1" role="form" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Data Angkatan Diklat Baru</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/angkatan') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" class="form-control" id="lembaga_id" name="lembaga_id" style="editable:false">
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Lembaga Diklat</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" id="nama" name="nama" readonly="true">

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama_diklat') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Diklat</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" id="nama_diklat" name="nama_diklat" >

                                @if ($errors->has('nama_diklat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_diklat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jenis_diklat') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Jenis Diklat</label>

                            <div class="col-md-8">
                                <select id="jenis_diklat" name="jenis_diklat" class="form-control">
                                    <option value="">--Pilih Jenis Diklat--</option>
                                    <option value="Prajabatan Pola Minimalis Gol I,II,III">Prajabatan Pola Minimalis Gol I,II,III</option>
                                    <option value="Prajabatan Kategori 1 & 2 Gol I, II, III">Prajabatan Kategori 1 & 2 Gol I, II, III</option>
                                    <option value="PIM III">PIM III</option>
                                    <option value="PIM IV">PIM IV</option>
                                </select>

                                @if ($errors->has('jenis_diklat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jenis_diklat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tahun') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tahun Penyelenggaraan</label>

                            <div class="col-md-4">
                                <input type="number" class="form-control" id="tahun" name="tahun" >

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
                                <input type="text" class="form-control" id="angkatan" name="angkatan" >

                                @if ($errors->has('tahun'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tahun') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
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