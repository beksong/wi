@extends('layouts.reportmaster')
@section('content')
@for($i=0;$i<$jumlahhalaman;$i++)
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-offset-3">
			<table border="0">
				<tr>
					<td>
						<img  id="img-header" src="{{url('/images/image001.png')}}" alt="logo" width="80px" height="130px"  />
					</td>
					<td style="padding-left:30px">
						<center>
							<h3 style="margin-bottom:0px; text-align:center;">PEMERINTAH PROVINSI SULAWESI TENGAH</h3>
						<h3 style="margin-top:0px;text-align:center;">BADAN PENDIDIKAN DAN PELATIHAN DAERAH</h3>
						<p style="text-align:center;font-size:12px;">Jalan S. Parman No. 67 Palu, Kode Pos 94111, Telepon (0451) 421292, Faximile (0451) 428116<br>
							Website : www.bandiklat.sulteng.go.id
						</p>
						</center>
					</td>
				</tr>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<hr>
			<center>Ledger Penilaian Peserta Terhadap Widyaiswara</center>
			<table style="border:0px;margin-top:10px;">
				<tr>
					<td class="col-xs-3"></td>
					<td class="col-xs-3"></td>
					<td class="col-xs-3"></td>
					<td class="col-xs-3"></td>
				</tr>

				<tr>
					<td class="col-xs-3">Nama Widyaiswara</td>
					<td class="col-xs-3">: {{$nilai->nilai->widyaiswara->nama}}</td>
					<td class="col-xs-3">Tahun</td>
					<td class="col-xs-3">: {{$nilai->nilai->angkatan->tahun}}</td>
				</tr>
				
				<tr>
					<td class="col-xs-3">Nama Diklat</td>
					<td class="col-xs-3">: {{$nilai->nilai->angkatan->nama_diklat}}</td>
					<td class="col-xs-3">Mata Diklat Yang Diampu</td>
					<td class="col-xs-3">: {{$nilai->nilai->matadiklat->nama}}</td>
				</tr>
				
				<tr>
					<td class="col-xs-3">Angkatan</td>
					<td class="col-xs-3">: {{$nilai->nilai->angkatan->angkatan}}</td>
					<td class="col-xs-3">WAKTU/SESI/JP</td>
					<td class="col-xs-3">: {{$nilai->nilai->jp}}</td>
				</tr>
				
				<tr>
					<td class="col-xs-3">Lembaga Penyelenggara</td>
					<td colspan="3" class="col-xs-9">: {{$nilai->nilai->angkatan->lembaga->nama}}</td>
				</tr>
			</table>

			<table class="table table-bordered table-responsive">
				<thead>
					<tr style="height:5px;">
						<th style="width:10px;"><center>No.</center></th>
						<th style="width:300px;"><center>Penilaian Terhadap Widyaiswara oleh Peserta Diklat</center></th>
						@for($j=1;$j<=10;$j++)
							<th style="width:10px;"><center>{{$j+$i*10}}</center></th>						
						@endfor
					</tr>
				</thead>
				<tbody>
					@for($j=0;$j<=9;$j++)
					<tr style="height:5px;">
						<td style="width:10px;"><strong>{{$j+1}}</strong></td>
						<td style="width:300px;"><strong>{{$detilnilais[$j]->item_nilai->uraian}}</strong></td>
						@for($k=0;$k<=9;$k++)
							@if(($k*10)+$j+($i*100)>=$jumlahdata)
								<td></td>
							@else
								<td style="width:10px;"><center>{{ $detilnilais[($k*10)+$j+($i*100)]->angka }}</center></td>
							@endif
						@endfor
					</tr>
					@endfor
				</tbody>
			</table>
		</div>
	</div>
</div>

@endfor
<div class="page-break"></div>
@endsection