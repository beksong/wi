<div class="modal fade" id="delMentoringModal" tabindex="-1" role="form" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Yakin Akan Menghapus Data Mentoring?</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/mentoring/delete') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" id="mentoring_id" name="mentoring_id">
                        <div class="form-group{{ $errors->has('mentor_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Mentor</label>

                            <div class="col-md-6">
                                <select class="form-control" id="mentor_id" name="mentor_id" readonly>
                                    <option value="" selected>--Pilih Mentor--</option>
                                    @foreach($mentors as $mentor)
                                        <option value="{{$mentor->id}}">{{$mentor->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('mentor_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mentor_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mentor_id') ? ' has-error' : '' }}">
                            <label class="col-sm-4 control-label">Status Mentor Saat Diklat</label>
                            <div class="col-sm-8">
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="status_mentor_diklat" id="status_mentor_diklat" value="Atasan Langsung" disabled>Atasan Langsung
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="status_mentor_diklat" id="status_mentor_diklat" value="Bukan Atasan Langsung" disabled>Bukan Atasan Langsung
                                  </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mentor_id') ? ' has-error' : '' }}">
                            <label class="col-sm-4 control-label">Status Mentor Saat ini</label>
                            <div class="col-sm-8">
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="status_mentor_skrg" id="status_mentor_skrg" value="Atasan Langsung" disabled>Atasan Langsung
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="status_mentor_skrg" id="status_mentor_skrg" value="Bukan Atasan Langsung" disabled>Bukan Atasan Langsung
                                  </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alumni_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Alumni</label>

                            <div class="col-md-6">
                                <select class="form-control" id="alumni_id" name="alumni_id" readonly>
                                    <option value="" selected>--Pilih Alumni--</option>
                                    @foreach($alumnis as $alumni)
                                        <option value="{{$alumni->id}}">{{$alumni->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('alumni_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alumni_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lembaga_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Penyelenggara Diklat</label>

                            <div class="col-md-8">
                                <select class="form-control" id="lembaga_id" name="lembaga_id" readonly>
                                    <option value="" selected>--Pilih Lembaga Penyelenggara Diklat--</option>
                                    @foreach($lembagas as $lembaga)
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
                            <label class="col-md-4 control-label">Penyelenggara Diklat</label>

                            <div class="col-md-8">
                                <select class="form-control" id="angkatan_id" name="angkatan_id" readonly>
                                    <option value="" selected>--Pilih Nama Diklat Yang Diikuti--</option>
                                </select>
                                @if ($errors->has('angkatan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('angkatan_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-danger">
                                    <i class="glyphicon glyphicon-trash"></i> Hapus
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