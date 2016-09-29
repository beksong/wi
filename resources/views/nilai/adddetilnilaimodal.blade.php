<div class="modal fade bs-example-modal-lg" id="addpenilaianwidyaiswaramodal" tabindex="-1" role="form" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Input Detail Penilaian Terhadap Widyaiswara</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/detailnilaiwi/add') }}">
                        {!! csrf_field() !!}
                        @foreach($nilai as $n=>$nilaiwi)
                        @endforeach
                        <input type="hidden" id="nilai_id" name="nilai_id" value="{{$nilaiwi->id}}">
                        
                        <!--loop ItemNilai-->
                        @foreach($itemnilais as $i=>$itemnilai)
                            <div class="form-group">
                                
                                
                                <div class="control-label">
                                    <label class="col-sm-1">{{$i+1}}</label>
                                </div>
                                
                                <div class="col-md-6">
                                    <input type="hidden" class="form-control" id="itemnilai_id[]" name="itemnilai_id[]" value="{{$itemnilai->id}}">
                                    <p>{{$itemnilai->uraian}}</p>
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="nilai[]" name="nilai[]" placeholder="Nilai Widyaiswara">
                                    @if ($errors->has('widyaiswara_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('widyaiswara_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-7">
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