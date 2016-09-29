@extends('layouts.applogin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
              Anda Disini : <li><a href="#">Pasca Diklat</a></li>
              <li class="active"><a href="{{url('/mentoring')}}">Mentoring</a></li>
              <li class="active"><a href="{{url('/mentoring/detil/'.$mentorings->id)}}">Detil Mentoring</a></li>
              <li class="active"><a href="{{url('/quesioner/alumni/'.$pertanyaan->diklat.'/'.$mentorings->id.'/'.$nomor)}}">Quesioner mentorings</a></li>
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
                <div class="panel-heading"><span class="glyphicon glyphicon-file"></span> Quesioner Pasca Diklat Oleh Alumni Diklat PIM III - An. {{$mentorings->alumni->name}}
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="{{url('/quesioner/alumni/PIM III/add/'.$nomor)}}">
                        {!! csrf_field() !!}
                      <div class="form-group">
                        <label for="exampleInputEmail1">{{$nomor}}. {{$pertanyaan->question}}</label>
                            <input type="hidden" value="{{$pertanyaan->id}}" id="quesioner_id" name="quesioner_id">
                            <input type="hidden" value="{{$mentorings->id}}" id="mentoring_id" name="mentoring_id">
                            @if(count($jawab)==0)
                                @if($nomor==3)
                                    @foreach($pertanyaan->opsi as $key=>$opsi)
                                        <input type="hidden" id="opsi_id[]" name="opsi_id[]" value="{{$opsi->id}}">
                                    @endforeach
                                    <table class="table table-responsive table-bordered table-hover">
                                        <thead>
                                            <th><center>Jangka Waktu</center></th>
                                            <th><center>Durasi</center></th>
                                            <th><center>Target Capaian (milestone)</center></th>
                                            <th><center>Kondisi Saat Ini</center></th>
                                        </thead>
                                        <thead>
                                            <th><center>(1)</center></th>
                                            <th><center>(2)</center></th>
                                            <th><center>(3)</center></th>
                                            <th><center>(4)</center></th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Jangka Pendek</td>
                                                <td><textarea class="form-control" id="uraian[]" name="uraian[]" placeholder="Bulan... sd ..."></textarea></td>
                                                <td><textarea class="form-control" id="uraian[]" name="uraian[]" placeholder="Uraikan Target Capaian Milestone"></textarea></td>
                                                <td><textarea class="form-control" id="uraian[]" name="uraian[]" placeholder="Uraikan Kondisi Saat Ini"></textarea></td>                                                    
                                            </tr>
                                            <tr>
                                                <td>Jangka Menengah</td>
                                                <td><textarea class="form-control" id="uraian[]" name="uraian[]" placeholder="Bulan... sd ..."></textarea></td>
                                                <td><textarea class="form-control" id="uraian[]" name="uraian[]" placeholder="Uraikan Target Capaian Milestone"></textarea></td>
                                                <td><textarea class="form-control" id="uraian[]" name="uraian[]" placeholder="Uraikan Kondisi Saat Ini"></textarea></td>                                                    
                                            </tr>
                                            <tr>
                                                <td>Jangka Panjang</td>
                                                <td><textarea class="form-control" id="uraian[]" name="uraian[]" placeholder="Bulan... sd ..."></textarea></td>
                                                <td><textarea class="form-control" id="uraian[]" name="uraian[]" placeholder="Uraikan Target Capaian Milestone"></textarea></td>
                                                <td><textarea class="form-control" id="uraian[]" name="uraian[]" placeholder="Uraikan Kondisi Saat Ini"></textarea></td>                                                    
                                            </tr>
                                        </tbody>
                                    </table>
                                @else
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
                                            <textarea class="form-control" id="uraian[]" name="uraian[]" placeholder="Uraikan jawaban anda" style="hidden=true"></textarea>
                                        @else
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="opsi_id[]" name="opsi_id[]" value="{{$opsi->id}}">{{$opsi->pilihan}}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            @else
                                @if($nomor==3)
                                    @foreach($pertanyaan->opsi as $key=>$opsi)
                                        <input type="hidden" id="opsi_id[]" name="opsi_id[]" value="{{$opsi->id}}">
                                    @endforeach
                                    <table class="table table-responsive table-bordered table-hover">
                                        <thead>
                                            <th><center>Jangka Waktu</center></th>
                                            <th><center>Durasi</center></th>
                                            <th><center>Target Capaian (milestone)</center></th>
                                            <th><center>Kondisi Saat Ini</center></th>
                                        </thead>
                                        <thead>
                                            <th><center>(1)</center></th>
                                            <th><center>(2)</center></th>
                                            <th><center>(3)</center></th>
                                            <th><center>(4)</center></th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Jangka Pendek</td>
                                                @foreach($mentorings->respon as $key=>$respon)
                                                    @if($key==3)
                                                        @break
                                                    @endif      
                                                    <td><textarea class="form-control" id="uraian[]" name="uraian[]" placeholder="Bulan... sd ...">{{$respon->answer}}</textarea></td>                                              
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>Jangka Menengah</td>
                                                @foreach($mentorings->respon as $key=>$respon)
                                                    @if($key==3 || $key==4 || $key==5)
                                                        <td><textarea class="form-control" id="uraian[]" name="uraian[]" placeholder="Bulan... sd ...">{{$respon->answer}}</textarea></td>
                                                    @endif                                                    
                                                @endforeach                                                   
                                            </tr>
                                            <tr>
                                                <td>Jangka Panjang</td>
                                                @foreach($mentorings->respon as $key=>$respon)
                                                    @if($key==6 || $key==7 || $key==8)
                                                        <td><textarea class="form-control" id="uraian[]" name="uraian[]" placeholder="Bulan... sd ...">{{$respon->answer}}</textarea></td>
                                                    @endif                                                    
                                                @endforeach                                                   
                                            </tr>
                                        </tbody>
                                    </table>
                                @else
                                    @foreach($pertanyaan->opsi as $key=>$opsi)
                                        <!-- check if the option value match with the array value -->
                                       @if(in_array($opsi->id,$jawab))
                                       <!-- if the value match than check  -->
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
                                                <textarea class="form-control" id="uraian[]" name="uraian[]" placeholder="Bulan... sd ...">@foreach($mentorings->respon as $key=>$respon){{$respon->answer}} @break @endforeach</textarea>
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
                                                <textarea class="form-control" id="uraian[]" name="uraian[]" placeholder="Bulan... sd ...">@foreach($mentorings->respon as $key=>$respon){{$respon->answer}}@endforeach</textarea>
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