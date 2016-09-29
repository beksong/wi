@extends('layouts.reportmaster')
@section('content')
    <div class="container">
        <div class="row">
            <p style="margin-bottom:0 px;margin-top:100px"><center><h1>
                INSTRUMEN<br>
                EVALUASI PASCA DIKLAT<br>
                DIKLATPIM TINGKAT IV<br>
            </h1></center></p>
            <hr style="margin-left: 20px; margin-right: 20px; margin-top:5px">
        </div>
        <div class="row">
            <center>
                <img src="{{ url('images/image001.png')}}" style="width:180px;height:300px;margin-top:150px;margin-bottom:100px;">
            </center>
        </div>
        <div class="row">
            <center>
                <p style="margin-bottom: 0px; margin-top:100px;margin-bottom:100px">
                    <h3>
                        BADAN PENDIDIKAN DAN PELATIHAN<br>
                        PROVINSI SULAWESI TENGAH<br>
                        TAHUN {{date("Y")}}
                    </h3>
                </p>
            </center>
        </div>
        <div class="page-break"></div>
        <div class="row">
            <center>
                <h3>INSTRUMEN<br>EVALUASI DIKLATPIM TINGKAT IV<br>( BAGI ALUMNI )<br></h3>
            </center>
            <h4><u><b>A. IDENTITAS PESERTA DIKLAT</b></u></h4>
            <table>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nama Peserta</td>
                        <td>: {{$mentorings->alumni->name}}</td>
                    </tr>
                    <tr>
                        <td>Jabatan Pada Saat Mengikuti Diklat </td>
                        <td>: {{$mentorings->alumni->unitkerja_diklat}}</td>
                    </tr>
                    <tr>
                        <td>Jabatan Saat Ini</td>
                        <td>: {{$mentorings->alumni->jabatan}}</td>
                    </tr>
                    <tr>
                        <td>Unit Kerja saat ini</td>
                        <td>: {{$mentorings->alumni->unitkerja_skrg}}</td>
                    </tr>
                    <tr>
                        <td>Instansi</td>
                        <td>: {{$mentorings->alumni->unitkerja_skrg}}</td>
                    </tr>
                    <tr>
                        <td>Nomor Telepon</td>
                        <td>: {{$mentorings->alumni->hp}}</td>
                    </tr>
                    <tr>
                        <td>Unit Kerja</td>
                        <td>: {{$mentorings->alumni->email}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div class="row">
            <h4><u><b>B. IDENTITAS MENTOR / ATASAN SAAT INI :</b></u></h4>
            <table>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nama Mentor pada saat Diklat</td>
                    <td> : {{$mentorings->mentor->name}}</td>
                </tr>
                <tr>
                    <td>Status Mentor Saat Diklat</td>
                    <td> 
                        <ul>
                            <li>{{$mentorings->mentor->jabatan}}</li>
                            <li>{{$mentorings->status_mentor_diklat}}</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>Status Mentor Saat Ini</td>
                    <td>
                        <ul>
                            <li>{{$mentorings->status_mentor_skrg}}</li>
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row">
            <h4><u><b>C. PERKEMBANGAN PROYEK PERUBAHAN DIKLATPIM TINGKAT IV</b></u></h4>
            @foreach($quesioners as $key=>$quesioner)
                @if($quesioner->id==19)
                    <p>{{$key+1}}. {{$quesioner->question}}</p>
                    <table class="table table-responsive table-bordered">
                        <tr>
                            <td>Jangka Waktu</td>
                            <td>Durasi</td>
                            <td>Target Capaian (Milestone)</td>
                            <td>Kondisi Saat ini</td>
                        </tr>
                        <tr>
                            <td>Jangka Pendek</td>
                                @for($i=0;$i<=2;$i++)
                                    <td>{{$quesioner->respon[$i]->answer}}</td>
                                @endfor
                        </tr>
                        <tr>
                            <td>Jangka Menengah</td>
                            @for($i=3;$i<=5;$i++)
                                    <td>{{$quesioner->respon[$i]->answer}}</td>
                                @endfor
                        </tr>
                        <tr>
                            <td>Jangka Panjang</td>
                            @for($i=6;$i<=8;$i++)
                                    <td>{{$quesioner->respon[$i]->answer}}</td>
                                @endfor
                        </tr>
                    </table>
                @else
                    @if($quesioner->id==31)
                        <h4><u><b>D. DAMPAK DIKLAT PIM TERHADAP PENINGKATAN KINERJA</b></u></h4>
                        <p>{{$key-13}}. {{$quesioner->question}}</p>
                            Jawab : <br>
                            @foreach($quesioner->respon as $respon)
                                <p style="margin-left:25px;">{{$respon->opsi->pilihan}}
                                    <br>{{$respon->answer}}
                                </p>
                            @endforeach
                    @elseif($key>13)
                        <p>{{$key-13}}. {{$quesioner->question}}</p>
                            Jawab :<br>
                            @foreach($quesioner->respon as $respon)
                                <p style="margin-left:25px;">{{$respon->opsi->pilihan}}
                                    <br>{{$respon->answer}}
                                </p>
                            @endforeach
                    @else
                        <p>{{$key+1}}. {{$quesioner->question}}</p>
                            Jawab :<br>
                            @foreach($quesioner->respon as $respon)
                                <p style="margin-left:25px;">{{$respon->opsi->pilihan}}
                                    <br>{{$respon->answer}}
                                </p>
                            @endforeach
                    @endif
                @endif
            @endforeach
        </div>
    </div>
@endsection
