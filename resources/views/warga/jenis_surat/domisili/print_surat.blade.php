<div class="container-fluid">
    <div class="row">
        <div class="card card-modif">
            <div class="card-header" style="padding: 0; margin-bottom: 20px">
                <button class="btn btn-primary" style="font-family: Arial, Helvetica, sans-serif"
                    onclick="printSurat()">
                    <i class="fa fa-print"></i>
                    <span>CETAK</span>
                </button>
            </div>
            <div class="card-body card-body-modif">

                <div id="surat">

                    <!-- header -->
                    <div class="surat-header">
                        <div class="surat-header-logo">
                            <img src="{{ asset('assets/images/sugih-mukti.png') }}">
                        </div>
                        <div class="surat-header-body">
                            <div class="surat-header-body-line1">PEMERINTAH
                            </div>
                            <div class="surat-header-body-line2">KECAMATAN {{$data->user->desa->nama_desa}}
                            </div>
                            <div class="surat-header-body-line3">DESA </div>
                            <div class="surat-header-body-line4"></div>
                        </div>
                        {{-- <div class="surat-header-qrcode">
                            {!! QrCode::size(75)->generate('12345678'); !!}
                        </div> --}}
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
                            Dibawah ini merupakan data Penduduk dari Desa
                            Kecamatan
                          :
                        </div>
                        <div class="surat-body-line2">
                            <table>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Nomor KK</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tempat/tgl&nbsp;lahir</td>
                                    <td>:</td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <td>Status&nbsp;Perkawinan</td>
                                <td>:</td>
                                <td></td>
                                </tr>
                                <tr>
                                    <td>Pendidikan</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td valign="top">Alamat</td>
                                    <td valign="top">:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>RT</td>
                                    <td>:</td>
                                    <td>/td>
                                </tr>
                                <tr>
                                    <td>RW</td>
                                    <td>:</td>
                                    <td>/td>
                                </tr>
                                <tr>
                                    <td>Desa</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- end body -->

                    <!-- foot -->
                </div>

            </div>
        </div>
    </div>
</div>

<style id="style">
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
        font-size: 20px;
        font-weight: bold;
        height: 20px;
        margin-bottom: 2px;
    }

    .surat-header-body-line2 {
        font-size: 20px;
        font-weight: bold;
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

    /* end foot */
</style>

<script>
    function printSurat() {
        let style = $('#style').html();
        const d = new printd.Printd;
        d.print(document.getElementById('surat'), [style])
    }
</script>
