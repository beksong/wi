@extends('layouts.applogin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach($nilai as $key=>$infonilai)

            @endforeach
            <ol class="breadcrumb">
              Anda Disini : <li><a href="#">Monev Widyaiswara</a></li>
              <li class="active"><a href="{{url('/pengampu')}}">Nama Diklat dan Mata Diklat Yang Diampu Widyaiswara</a></li>
              <li class="active"><a href="{{url('/detailnilaiwi/'.$infonilai->id)}}">Detail Penilaian Terhadap Widyaiswara</a></li>
            </ol>
            <!--end panel form mentor-->
            
            <div class="panel">
                <div class="panel-body">
                    <legend>Data Penilaian Widyaiswara</legend>                     
                    <div class="col-sm-4">Nama Widyaiswara</div><p class="col-offset-sm-5">: {{$infonilai->widyaiswara->nama}}</p>
                    <div class="col-sm-4">Nama Diklat</div><p class="col-offset-sm-5">: {{$infonilai->angkatan->nama_diklat}}</p>
                    <div class="col-sm-4">Angkatan Ke</div><p class="col-offset-sm-5">: {{$infonilai->angkatan->angkatan}}</p>
                    <div class="col-sm-4">Lembaga Penyelenggara Diklat</div><p class="col-offset-sm-5">: {{$infonilai->angkatan->lembaga->nama}}</p>
                    <div class="col-sm-4">Nama Mata Diklat Yang Diampu</div><p class="col-offset-sm-5">: {{$infonilai->matadiklat->nama}}</p>
                    <div class="col-sm-4">Jumlah JP</div><p class="col-offset-sm-5">: {{$infonilai->jp}}</p>
                    <div class="col-sm-4">Tanggal Pelaksanaan Diklat /Penilaian Widyaiswara</div><p class="col-offset-sm-5">: {{$infonilai->tgl}}</p>
                    <div class="btn btn-group">
                        <a href="{{url('/cetaknilai/'.$infonilai->id)}}" class="btn btn-success" target="_blank"><i class="glyphicon glyphicon-print"></i> Cetak Nilai</a>
                        <a href="{{url('/cetakledger/'.$infonilai->id)}}" class="btn btn-warning" target="_blank"><i class="glyphicon glyphicon-print"></i> Cetak Ledger Nilai</a>
                    </div>
                </div>
            </div>
            
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-list-alt"></span> Detail Penilaian Terhadap Widyaiswara
                    <div><a href="#" id="edit" data-toggle="modal" data-target="#addpenilaianwidyaiswaramodal" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Tambah</a></div>
                </div>

                <div class="panel-body">
                    <!--Mentor Table-->
                    <table class="table table-responsive dttable">
                        <thead>
                            <th>#</th>
                            <th>Quesioner</th>
                            <th>Nilai</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($infonilai->detilnilai as $dn=>$detil)
                                <tr>
                                    <td>{{$dn+1}}</td>
                                    <td>{{$detil->item_nilai->uraian}}</td>
                                    <td>{{$detil->angka}}</td>
                                    <td><a href="#" data-toggle="modal" data-target="#editdetilnilaimodal" data-detil_id="{{$detil->id}}" data-item_nilai_id="{{$detil->item_nilai->id}}" data-uraian="{{$detil->item_nilai->uraian}}" data-nilai="{{$detil->angka}}" data-nilai_id="{{$detil->nilai_id}}"><span class="glyphicon glyphicon-pencil" ></span></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('nilai.adddetilnilaimodal')
@include('nilai.editdetilnilaimodal')
@endsection
