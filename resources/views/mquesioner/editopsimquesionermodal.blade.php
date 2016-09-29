<div class="modal fade" id="editopsimodal" tabindex="-1" role="form" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Data Opsi Master Quesioner Pasca Diklat</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/opsimquesioner/edit') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" class="form-control" id="opsi_id" name="opsi_id">
                        <div class="form-group{{ $errors->has('pilihan') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Opsi</label>

                            <div class="col-md-8">
                                <textarea class="form-control" id="pilihan" name="pilihan"></textarea>
                                @if ($errors->has('pilihan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pilihan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('uraian') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Jawaban Uraian</label>

                            <div class="col-sm-1">
                                <input type="checkbox" class="form-control" id="uraian" name="uraian" >
                                @if ($errors->has('uraian'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('uraian') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-1">
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