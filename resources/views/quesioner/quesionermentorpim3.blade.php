@extends('layouts.applogin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
              Anda Disini : <li><a href="#">Pasca Diklat</a></li>
              <li class="active"><a href="{{url('/mentoring')}}">Mentoring</a></li>
              <li class="active"><a href="{{url('/mentoring/detil/'.$mentorings->id)}}">Detil Mentoring</a></li>
              <li class="active"><a href="{{url('/quesioner/mentor/'.$pertanyaan->diklat.'/'.$mentorings->id.'/'.$pertanyaan->id)}}">Quesioner mentorings</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel panel-heading">
                    Pilih Nomor Quesioner
                </div>
                <div class="panel-body">
                    @for($i=1;$i<=$jumlahPertanyaan;$i++)
                        <div class="col-sm-1">
                            <div class="btn-group">
                                <a href="{{url('/quesioner/'.$pertanyaan->questionfor.'/'.$pertanyaan->diklat.'/'.$mentorings->id.'/'.$i)}}" class="btn btn-warning">{{$i}}</a>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <!--////-->
        <div class="col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-file"></span> Quesioner Pasca Diklat {{$mentorings->angkatan->jenis_diklat}} Oleh Mentor ( {{$mentorings->mentor->name}} )
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="{{url('/quesioner/mentor/PIM III/add')}}">
                        {!! csrf_field() !!}
                      <div class="form-group">
                        <label for="exampleInputEmail1">{{$pertanyaan->id}}. {{$pertanyaan->question}}</label>
                            <input type="hidden" value="{{$pertanyaan->id}}" id="quesioner_id" name="quesioner_id">
                            <input type="hidden" value="{{$mentorings->id}}" id="mentoring_id" name="mentoring_id">
                            @if(count($jawab)==0)
                                @foreach($pertanyaan->opsi as $key=>$opsi)
                                    @if($opsi->uraian==1)
                                        @if($opsi->pilihan==null)
                                            <input type="hidden" id="opsi_id[]" name="opsi_id[]" value="{{$opsi->id}}">
                                        @else
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="opsi_id[]" name="opsi_id[]" value="{{$opsi->id}}">{{$opsi->pilihan}}
                                                </label>
                                            </div>
                                        @endif
                                        <textarea class="form-control" id="uraian[]" name="uraian[]" placeholder="Uraikan Jawaban Anda"></textarea>
                                    @else
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="opsi_id[]" name="opsi_id[]" value="{{$opsi->id}}">{{$opsi->pilihan}}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                @foreach($pertanyaan->opsi as $key=>$opsi)
                                    @if(in_array($opsi->id,$jawab))
                                        @if($opsi->uraian!=null)
                                            @if($opsi->pilihan!=null)
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" id="opsi_id[]" name="opsi_id[]" value="{{$opsi->id}}" checked="checked">{{$opsi->pilihan}}
                                                    </label>
                                                </div>
                                            @else
                                                <input type="hidden" id="opsi_id[]" name="opsi_id[]" value="{{$opsi->id}}">
                                            @endif
                                            <textarea id="uraian[]" name="uraian[]" class="form-control">@foreach($mentorings->respon as $key=>$respon){{$respon->answer}} @break @endforeach</textarea>
                                        @else
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="opsi_id[]" name="opsi_id[]" value="{{$opsi->id}}" checked="checked">{{$opsi->pilihan}}
                                                </label>
                                            </div>
                                        @endif
                                    @else
                                        @if($opsi->uraian!=null)
                                            @if($opsi->pilihan!=null)
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" id="opsi_id[]" name="opsi_id[]" value="{{$opsi->id}}">{{$opsi->pilihan}}
                                                    </label>
                                                </div>
                                            @else
                                                <input type="hidden" id="opsi_id[]" name="opsi_id[]" value="{{$opsi->id}}">
                                            @endif
                                            <textarea id="uraian[]" name="uraian[]" placeholder="uraikan jawaban"></textarea>
                                        @else
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="opsi_id[]" name="opsi_id[]" value="{{$opsi->id}}">{{$opsi->pilihan}}
                                                </label>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach   
                            @endif
                      </div>
                        @if($jawab==null)
                            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                        @else
                            <button type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection