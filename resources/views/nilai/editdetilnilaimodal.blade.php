<div class="modal fade bs-example-modal-lg" id="editdetilnilaimodal" tabindex="-1" role="form" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Ubah Data Penilaian Terhadap Widyaiswara</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/detailnilaiwi/edit') }}">
                        {!! csrf_field() !!}

                        <input type="hidden" class="form-control" id="detil_id" name="detil_id" readonly="true" >
                        <input type="hidden" class="form-control" id="nilai_id" name="nilai_id" readonly="true">
                        <input type="hidden" class="form-control" id="item_nilai_id" name="item_nilai_id" readonly="true">

                        <div class="form-group{{ $errors->has('uraian') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">Uraian</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" id="uraian" name="uraian" readonly="true">

                                @if ($errors->has('uraian'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('uraian') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nilai') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">Nilai</label>

                            <div class="col-md-4">
                                <input type="text" class="form-control" id="nilai" name="nilai" >

                                @if ($errors->has('nilai'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nilai') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
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