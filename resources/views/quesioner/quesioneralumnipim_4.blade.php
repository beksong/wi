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
                    <form role="form" method="post" action="{{url('/quesioner/alumni/PIM IV/add/'.$nomor)}}">
                        {!! csrf_field() !!}
                      <div class="form-group">
                        <label for="exampleInputEmail1">{{$nomor}}. {{$pertanyaan->question}}</label>
                            <input type="hidden" value="{{$pertanyaan->id}}" id="quesioner_id" name="quesioner_id">
                            <input type="hidden" value="{{$mentorings->id}}" id="mentoring_id" name="mentoring_id">
                            @if(count($jawab)==0)
                                @if(count($pertanyaan->opsi)==0)
                                    @if($nomor==3)
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
                                                    <td><textarea class="form-control" id="tbopsi[]" name="tbopsi[]" placeholder="Bulan... sd ..."></textarea></td>
                                                    <td><textarea class="form-control" id="tbopsi[]" name="tbopsi[]" placeholder="Uraikan Target Capaian Milestone"></textarea></td>
                                                    <td><textarea class="form-control" id="tbopsi[]" name="tbopsi[]" placeholder="Uraikan Kondisi Saat Ini"></textarea></td>                                                    
                                                </tr>
                                                <tr>
                                                    <td>Jangka Menengah</td>
                                                    <td><textarea class="form-control" id="tbopsi[]" name="tbopsi[]" placeholder="Bulan... sd ..."></textarea></td>
                                                    <td><textarea class="form-control" id="tbopsi[]" name="tbopsi[]" placeholder="Uraikan Target Capaian Milestone"></textarea></td>
                                                    <td><textarea class="form-control" id="tbopsi[]" name="tbopsi[]" placeholder="Uraikan Kondisi Saat Ini"></textarea></td>                                                    
                                                </tr>
                                                <tr>
                                                    <td>Jangka Panjang</td>
                                                    <td><textarea class="form-control" id="tbopsi[]" name="tbopsi[]" placeholder="Bulan... sd ..."></textarea></td>
                                                    <td><textarea class="form-control" id="tbopsi[]" name="tbopsi[]" placeholder="Uraikan Target Capaian Milestone"></textarea></td>
                                                    <td><textarea class="form-control" id="tbopsi[]" name="tbopsi[]" placeholder="Uraikan Kondisi Saat Ini"></textarea></td>                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                    @else
                                        <textarea class="form-control" id="uraian" name="uraian" placeholder="Uraikan jawaban anda" style="hidden=true"></textarea>
                                    @endif
                                @else
                                    @foreach($pertanyaan->opsi as $key=>$check)
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="opsi[]" name="opsi[]" value="{{$check->id}}">{{$check->pilihan}}
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            @else
                                @if(count($pertanyaan->opsi)==0)
                                    @if($nomor==3)
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
                                                    @for($i=0;$i<=2;$i++)
                                                        <td><textarea class="form-control" id="tbopsi[]" name="tbopsi[]" placeholder="Bulan... sd ...">{{$jawab[$i]}}</textarea></td>                                                    
                                                    @endfor
                                                </tr>
                                                <tr>
                                                    <td>Jangka Menengah</td>
                                                    @for($i=3;$i<=5;$i++)
                                                        <td><textarea class="form-control" id="tbopsi[]" name="tbopsi[]" placeholder="Bulan... sd ...">{{$jawab[$i]}}</textarea></td>                                                    
                                                    @endfor                                                   
                                                </tr>
                                                <tr>
                                                    <td>Jangka Panjang</td>
                                                    @for($i=6;$i<=8;$i++)
                                                        <td><textarea class="form-control" id="tbopsi[]" name="tbopsi[]" placeholder="Bulan... sd ...">{{$jawab[$i]}}</textarea></td>                                                    
                                                    @endfor                                                   
                                                </tr>
                                            </tbody>
                                        </table>
                                    @else
                                        <textarea class="form-control" id="uraian" name="uraian" placeholder="Uraikan jawaban anda" style="hidden=true">@foreach($jawab as $jawaban){{$jawaban}}@endforeach</textarea>
                                    @endif
                                @else
                                    @foreach($pertanyaan->opsi as $key=>$check)
                                        <div class="checkbox">
                                            <label>
                                                @if(in_array($check->id,$jawab))
                                                    <input type="checkbox" id="opsi[]" name="opsi[]" value="{{$check->id}}" checked="checked">{{$check->pilihan}}
                                                @else
                                                    <input type="checkbox" id="opsi[]" name="opsi[]" value="{{$check->id}}">{{$check->pilihan}}
                                                @endif
                                            </label>
                                        </div>

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