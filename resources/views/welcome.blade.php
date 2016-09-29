@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
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
        </div>
    </div>
</div>

@endsection
