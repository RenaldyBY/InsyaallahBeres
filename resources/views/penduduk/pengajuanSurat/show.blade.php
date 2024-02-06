<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .upper {
            text-transform: uppercase;
        }

        .custom-row {
            display: grid;
            grid-template-columns: 25% 2% 73%;
        }

        .martop {
            margin-top: 1rem;
        }

        .marbot {
            margin-bottom: 1rem;
        }

        /* init */

        .row {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .card-modif {
            width: 813px !important;
            height: 1250px;
            font-family: 'Times New Roman', Times, serif !important;
            color: black !important;
            padding: 20px;
        }

        .card-body-modif {
            border: 2px solid #aaa;
            padding: 30px;
            box-sizing: border-box;
        }

        /* end init */

        /* header */

        .surat-header {
            display: grid;
            grid-template-columns: 150px 1fr 150px;
            grid-template-rows: 100px;
            padding-bottom: 10px;
            border-bottom: 3px double #000;
        }

        .surat-header-logo {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .surat-header-logo img {
            width: 70px;
        }

        .surat-header-body {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .surat-header-body-line1 {
            font-size: 18px;
            /* font-weight: bold; */
            height: 20px;
            margin-bottom: 2px;
        }

        .surat-header-body-line2 {
            font-size: 18px;
            /* font-weight: bold; */
            height: 20px;
            margin-bottom: 2px;
        }

        .surat-header-body-line3 {
            font-size: 20px;
            font-weight: bold;
            height: 20px;
            margin-bottom: 5px;
        }

        .surat-header-body-line4 {
            font-size: 16px;
        }


        .surat-header-qrcode {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .surat-header-qrcode img {
            width: 100px;
        }

        /* end header */

        /* title */

        .surat-title-wrap {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .surat-title {
            width: max-content;
        }

        .surat-title-line1 {
            font-size: 17px;
            font-weight: bold;
            border-bottom: 2px solid #000;
            text-align: center;
        }

        .surat-title-line2 {
            font-size: 17px;
            font-weight: bold;
            text-align: center;
        }

        /* end title */

        /* body */

        .surat-body {
            width: 100%;
            line-height: 20px;
            text-align: justify;
        }

        .surat-body-line1 {
            text-indent: 50px;
            font-size: 16px;
        }

        .surat-body-line2 {
            margin-top: 20px;
            padding-left: 50px;
        }

        .surat-body-line2 table tr td {
            font-size: 16px !important;
            padding-right: 15px;
        }

        .surat-body-line3 {
            text-indent: 50px;
            font-size: 16px;
            margin-top: 10px;
        }

        .surat-body-line4 {
            text-indent: 50px;
        }

        /* endbody */

        /* foot */

        .surat-foot {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            margin-top: 50px;
        }

        .surat-foot-ttd {
            text-align: center;
        }

        .surat-foot-ttd-line1 {
            font-size: 16px;
        }

        .surat-foot-ttd-line2 {
            /* margin-right: 10px; */
            font-size: 16px;
        }

        .surat-foot-ttd-line3 {
            height: 70px;
        }

        .surat-foot-ttd-line4 {
            font-size: 16px;
            font-weight: bold;
            text-decoration: underline;
        }

        .surat-foot-ttd-line5 {
            font-size: 16px;
            font-weight: bold;
        }
        .surat-ttd{
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }

        .surat-foot-ttd {
            grid-column-start: 2;
            grid-column-end: 3;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="card card-modif">
                <div class="card-body card-body-modif">

                    <div id="surat">

                        <!-- header -->
                        <div class="surat-header">
                            <div class="surat-header-logo">
                                <img src="kabupaten-cianjur-logo-D9CED0481C-seeklogo.com.png">
                            </div>
                            <div class="surat-header-body">
                                <div class="surat-header-body-line1">PEMERINTAH KABUPATEN {{strToUpper($desa->nama_kabupaten)}}
                                </div>
                                <div class="surat-header-body-line2">KECAMATAN {{strToUpper($desa->nama_kecamatan)}}
                                </div>
                                <div class="surat-header-body-line3">KEPALA DESA {{strToUpper($desa->nama_desa)}}</div>
                                <div class="surat-header-body-line4">Alamat {{$desa->alamat}} e-mail: {{$desa->email}} kontak: {{$desa->kontak}}</div>
                            </div>
                            <div class="surat-header-qrcode">
                                {!! QrCode::size(75)->generate(route('surat.show', $pengajuanSurat->no_surat)); !!} 
                            </div>
                        </div>
                        <!-- header -->

                        <!-- title -->
                        <div class="surat-title-wrap">
                            <div class="surat-title">
                                <div class="surat-title-line1"></div>
                                <div class="surat-title-line2"></div>
                            </div>
                        </div>
                        <!-- end header -->

                        <!-- body -->
                        <div class="surat-body">
                            <div>
                                Dibawah ini merupakan data Penduduk dari Desa {{$desa->nama_desa}}<br>
                                Kecamatan {{$desa->nama_kecamatan}} Kabupaten {{$desa->nama_kabupaten}} :
                            </div>
                            <div class="surat-body-line2">
                                <table>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{$pengajuanSurat->penduduk->nama}}</td>
                                    </tr>
                                    <tr>
                                        <td>NIK</td>
                                        <td>:</td>
                                        <td>{{$pengajuanSurat->penduduk->nik}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor KK</td>
                                        <td>:</td>
                                        <td>{{$pengajuanSurat->penduduk->kk}}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        @if ($pengajuanSurat->penduduk->jk == 1)
                                        <td>Laki-laki</td>
                                        @else
                                        <td>Perempuan</td>    
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Tempat/tanggal&nbsp;lahir</td>
                                        <td>:</td>
                                        <td>{{$pengajuanSurat->penduduk->tempat_lahir . '/' . $pengajuanSurat->penduduk->tanggal_lahir}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
                                        <td>:</td>
                                        <td>{{$pengajuanSurat->penduduk->agama}}</td>
                                    </tr>
                                    {{-- <tr>
                                    <td>Status&nbsp;Perkawinan</td>
                                    <td>:</td>
                                    <td></td>
                                    </tr> --}}
                                    <tr>
                                        <td>Pendidikan</td>
                                        <td>:</td>
                                        <td>{{$pengajuanSurat->penduduk->pendidikan}}</td>
                                    </tr>
                                    <tr>
                                        <td>Pekerjaan</td>
                                        <td>:</td>
                                        <td>{{$pengajuanSurat->penduduk->pekerjaan}}</td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Alamat</td>
                                        <td valign="top">:</td>
                                        <td>{{$pengajuanSurat->penduduk->alamat}}</td>
                                    </tr>
                                    <tr>
                                        <td>RT</td>
                                        <td>:</td>
                                        <td>{{$pengajuanSurat->penduduk->rt}}</td>
                                    </tr>
                                    <tr>
                                        <td>RW</td>
                                        <td>:</td>
                                        <td>{{$pengajuanSurat->penduduk->rw}}</td>
                                    </tr>
                                    <tr>
                                        <td>Desa</td>
                                        <td>:</td>
                                        <td>{{$pengajuanSurat->penduduk->desa->nama_desa}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td>:</td>
                                        <td>{{$pengajuanSurat->penduduk->desa->nama_kecamatan}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- end body -->
                        <p>Yang bersangkutan adalah benar penduduk desa {{$pengajuanSurat->penduduk->desa->nama_desa}} kecamatan {{$pengajuanSurat->penduduk->desa->nama_kecamatan}} Kabupaten {{$pengajuanSurat->penduduk->desa->nama_kabupaten}}
                            yang bertempat tinggal /berdomisili di alamat tersebut di atas.</p>
                        <p>Surat keterangan ini di buat dalam rangka untuk keperluan :</p>
                        <h3 style="text-align: center;">{{$pengajuanSurat->surat->nama_surat}}</h3>
                        <div class="surat-body-line2">
                            <table>
                                @foreach ($pengajuanSurat->pengajuanSuratDetail as $item)
                                <tr>
                                    <td>{{$item->nama_kolom}}</td>
                                    <td>:</td>
                                    <td>{{$item->isi_kolom}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        @if ($pengajuanSurat->status == 1)
                        <p>Berlaku sampai dengan tanggal : {{$pengajuanSurat->tanggal_expired}}</p>     
                        @else
                        <p>Berlaku sampai dengan tanggal : Belum diverivikasi</p>
                        @endif
                        <p>Demikian surat keterangan ini dibuat dan di berikan kepada yang bersangkutan untuk digunakan
                            sebagai mestinya</p>
                        <!-- foot -->
                    </div>
                    <div class="surat-ttd">
                        <div class="surat-foot-ttd">
                            <div class="surat-foot-ttd-line1"></div>{{$desa->nama_desa. ', ' . date('d-M-Y')}}
                            <div class="surat-foot-ttd-line2">Kepala Desa {{$desa->nama_desa}}</div>
                            <div class="surat-foot-ttd-line3"></div>
                            <div class="surat-foot-ttd-line4">{{$desa->nama_kepala_desa}}</div>
                            <div class="surat-foot-ttd-line5">NIP. {{$desa->nip}}</div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
</body>

</html>