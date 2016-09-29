@extends('layouts.reportmaster')
@section('content')
@for($i=0;$i<$jumlahhalaman;$i++)
	<div class="container">
		<div class="row">
			<div class="col-sm-2">
				<img  id="img-header" src="{{url('/images/image001.png')}}" alt="logo" width="80px" height="130px"  />
			</div>
			<div class="col-sm-8">
				<h3 style="margin-bottom:0px; text-align:center;">PEMERINTAH PROVINSI SULAWESI TENGAH</h3>
				<h3 style="margin-top:0px;text-align:center;">BADAN PENDIDIKAN DAN PELATIHAN DAERAH</h3>
				<p style="text-align:center;font-size:12px;">Jalan S. Parman No. 67 Palu, Kode Pos 94111, Telepon (0451) 421292, Faximile (0451) 428116<br>
					Website : www.bandiklat.sulteng.go.id
				</p>
			</div>
			<div class="col-sm-2">
				<img  id="img-header" src="{{url('/images/LogoLAN.jpg')}}" alt="logo" width="130px" height="130px"  />
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<hr size="2px">
		</div>
	</div>
	<div class="container">
		<div class="row">
			<center><h4><strong>Ledger Penilaian Peserta Diklat Terhadap Widyaiswara</strong></h4></center>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">Nama Widyaiswara</div><div class="col-sm-3">: {{$nilai->nilai->widyaiswara->nama}}</div><div class="col-sm-3">Tahun</div><div class="col-sm-3">: {{$nilai->nilai->angkatan->tahun}}</div>
			<div class="col-sm-3">Nama Diklat</div><div class="col-sm-3">: {{$nilai->nilai->angkatan->nama_diklat}}</div><div class="col-sm-3">Mata Diklat Yang Diampu</div><div class="col-sm-3">: {{$nilai->nilai->matadiklat->nama}}</div>
			<div class="col-sm-3">Angkatan</div><div class="col-sm-3">: {{$nilai->nilai->angkatan->angkatan}}</div><div class="col-sm-3">WAKTU/SESI/JP</div><div class="col-sm-3">: {{$nilai->nilai->jp}}</div>
			<div class="col-sm-3">Lembaga Penyelenggara</div><div class="col-sm-9">: {{$nilai->nilai->angkatan->lembaga->nama}}</div>
		</div>
	</div>
	<div>
		<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<th class="col-sm-1"><center>No.</center></th>
					<th class="col-sm-2"><center>Penilaian Terhadap Widyaiswara oleh Peserta Diklat</center></th>
					@for($j=1;$j<=10;$j++)
						<th><center>{{$j+$i*10}}</center></th>						
					@endfor
				</tr>
			</thead>
			<tbody>
				@for($j=0;$j<=9;$j++)
				<tr>
					<td><strong>{{$j+1}}</strong></td>
					<td><strong>{{$detilnilais[$j]->item_nilai->uraian}}</strong></td>
					@for($k=0;$k<=9;$k++)
						@if(($k*10)+$j+($i*100)>=$jumlahdata)
							<td></td>
						@else
							<td><center>{{ $detilnilais[($k*10)+$j+($i*100)]->angka }}</center></td>
						@endif
					@endfor
				</tr>
				@endfor
			</tbody>
		</table>
	</div>
@endfor
<div class="page-break"></div>
@endsection
