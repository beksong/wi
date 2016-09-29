<div class="modal fade bs-example-modal-md" id="editwidyaiswaramodal" tabindex="-1" role="form" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Ubah Data Widyaiswara</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/widyaiswara/edit') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" class="form-control" id="widyaiswara_id" name="widyaiswara_id">

                        <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nip Widyaiswara</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="nip" name="nip" >

                                @if ($errors->has('nip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Widyaiswara</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="nama" name="nama" >

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
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