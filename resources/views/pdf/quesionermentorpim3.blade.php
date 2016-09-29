@extends('layouts.reportmaster')
@section('content')
    <div class="container">
        <div class="row">
            <p style="margin-bottom:0 px;margin-top:100px"><center><h1>
                INSTRUMEN<br>
                EVALUASI PASCA DIKLAT<br>
                DIKLATPIM TINGKAT III<br>
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
                <h3>INSTRUMEN<br>EVALUASI DIKLATPIM TINGKAT III<br>( BAGI MENTOR )<br></h3>
            </center>
            <h4>IDENTITAS MENTOR / ATASAN LANGSUNG</h4>
            <table>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nama Mentor</td>
                        <td>: {{$mentorings->mentor->name}}</td>
                    </tr>
                    <tr>
                        <td>Jabatan Pada Saat ini </td>
                        <td>: {{$mentorings->mentor->jabatan}}</td>
                    </tr>
                    <tr>
                        <td>Unit Kerja saat ini</td>
                        <td>: {{$mentorings->mentor->unitkerja}}</td>
                    </tr>
                    <tr>
                        <td>Nomor Telepon</td>
                        <td>: {{$mentorings->mentor->hp}}</td>
                    </tr>
                    <tr>
                        <td>Unit Kerja</td>
                        <td>: {{$mentorings->mentor->email}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nama Alumni Diklat</td>
                        <td> : {{$mentorings->alumni->name}}</td>
                    </tr>
                    <tr>
                        <td>Judul Proyek Perubahan</td>
                        <td> : {{$mentorings->judulpp}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <h4>A. <u><b>PERKEMBANGAN PROYEK PERUBAHAN DIKLATPIM TINGKAT III</b></u></h4>
        @foreach($mentorings->respon as $key=>$respon)
            @if($mentorings->respon==null)
                <h3>Belum Ada Jawaban</h3>
            @endif

            @if($key>9)
                {{$key-9}}.
            @else
                {{$key+1}}. 
            @endif
            
            {{$respon->quesioner->question}}
                <br><p style="margin-left:28px;">Jawab : {{$respon->opsi->pilihan}}</p>
                    <p style="margin-left:28px;">{{$respon->answer}}</p>
            @if($key==9)
                <h4><u><b>B. DAMPAK DIKLATPIM TINGKAT III TERHADAP PENINGKATAN KINERJA</b></u></h4>
            @endif
        @endforeach
    </div>
@endsection
