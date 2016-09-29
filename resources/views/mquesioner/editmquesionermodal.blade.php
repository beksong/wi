<div class="modal fade" id="editmquesioner" tabindex="-1" role="form" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Ubah Data Master Quesioner Pasca Diklat</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/mquesioner/edit') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" class="form-control" id="question_id" name="question_id">
                        <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Quesioner</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" id="question" name="question" >
                                @if ($errors->has('question'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('diklat') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Diklat</label>

                            <div class="col-md-8">
                                <select id="diklat" name="diklat" class="form-control">
                                    <option value="" selected>--Pilih Jenis Diklat--</option>
                                    <option value="PIM III">PIM III</option>
                                    <option value="PIM IV">PIM IV</option>
                                    <option value="Prajabatan Gol I,II,III Minimalis">Prajabatan Gol I,II,III Minimalis</option>
                                </select>

                                @if ($errors->has('diklat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('diklat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('questionfor') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Quesioner Untuk</label>

                            <div class="col-md-4">
                                <select id="questionfor" name="questionfor" class="form-control">
                                    <option value="" selected>--Pilih Quesioner Jenis Quesioner</option>
                                    <option value="mentor">Mentor</option>
                                    <option value="alumni">Alumni</option>
                                </select>
                                @if ($errors->has('questionfor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('questionfor') }}</strong>
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