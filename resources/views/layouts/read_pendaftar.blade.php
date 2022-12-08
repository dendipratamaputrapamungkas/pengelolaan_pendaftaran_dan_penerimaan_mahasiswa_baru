<div class="alert alert-primary">
    <strong>Data Diri</strong>
</div>
<div class="row">
    <div class="col-sm-7">
        <div class="form-group">
            <label>Nama Lengkap:</label>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="user_id">
            <input type="text" name="nama" class="form-control" value="{{$pendaftar->nama}}" disabled>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            <label class="small">Nomor Identitas (NIK / Passport / Driving License):</label>
            <input type="text" name="nik" value="{{$pendaftar->nik}}" class="form-control" disabled>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" value="{{$pendaftar->tempat_lahir}}" class="form-control" disabled>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{$pendaftar->tanggal_lahir}}" disabled>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            <label>Jenis Kelamin:</label>
            <select class="form-control" name="jk" disabled>
                @if ($pendaftar->jenis_kelamin == 1)
                <option selected value="1">Laki - Laki</option>        
                <option value="2">Perempuan</option>
                @else
                <option selected value="2">Perempuan</option>
                <option value="1">Laki-laki</option>
                @endif
            </select>
        </div>
            </div>
        </div>
        <div class="row">    
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Kewarganegaraan:</label>
                    <select class="form-control" name="kewarganegaraan" disabled>
                        @if ($pendaftar->kewarganegaraan != 'WNI')
                        <option selected value="WNA">Warga Negara Asing</option>
                        <option value="WNI">Warga Negara Indonesia</option>
                        @else
                        <option selected value="WNI">Warga Negara Indonesia</option>    
                        <option value="WNA">Warga Negara Asing</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Agama:</label>
                    <select class="form-control" name="agama" disabled>
                        <option selected value="{{$pendaftar->agama}}">{{$pendaftar->agama}}</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Nama Ibu Kandung:</label>
                    <input type="text" name="nama_ibu" class="form-control" value="{{$pendaftar->nama_ibu}}" disabled>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email_daftar" class="form-control" value="{{$pendaftar->email_daftar}}" disabled>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>No Telp / No Whatsapp</label>
                    <input type="text" name="no_telp" class="form-control" value="{{$pendaftar->no_telp}}" disabled>
                    <p class="small">Diawali kode negara. <br/> Contoh +62896xxx </p>
                </div>
            </div>
        </div>
        <div class="alert alert-primary">
            <strong>Data Alamat Asal</strong>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Alamat:</label>
                    <textarea class="form-control" name="alamat" rows="2" id="alamat" disabled>{{$pendaftar->alamat}}</textarea>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Kode Pos:</label>
                    <input type="text" name="kode_pos" class="form-control" value="{{$pendaftar->kode_pos}}" disabled>
                </div>
            </div>
        </div>
        <div class="alert alert-primary">
            <strong>Data Pendidikan</strong>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Pendidikan Terakhir:</label>
                    <select class="form-control" name="pendidikan" disabled>
                        <option value="{{$pendaftar->pendidikan}}" selected>{{$pendaftar->pendidikan}}</option>
                        <option value="SMA">SMA</option>
                        <option value="SMK">SMK</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nama Sekolah:</label>
                    <input type="text" name="sekolah" class="form-control" value="{{$pendaftar->asal_sekolah}}" disabled>
                </div>
            </div>
        </div>
        <div class="alert alert-primary">
            <strong>Data Nilai Rapor</strong>
        </div>
        <div class="row">
            <div class="col-sm 12">
                <div class="form group">
                    <div class="table-responsive-sm">
                        <table class="table table-sm table-hover">
                            <tr>
                                <td rowspan="2"></td>
                                <td colspan="2">Kelas X</td>
                                <td colspan="2">Kelas XI</td>
                                <td colspan="2">Kelas XII</td>
                            </tr>
                            <tr>
                                <td>Smt 1</td>
                                <td>Smt 2</td>
                                <td>Smt 1</td>
                                <td>Smt 2</td>
                                <td>Smt 1</td>
                            </tr>
                            <tr>
                                <td class="align-middle">Bahasa Indonesia</td>
                                @php
                                    $indonesia = $pendaftar->nilai_indonesia;
                                    $nilaiIndonesia = explode("," , $indonesia)
                                @endphp
                                @foreach ($nilaiIndonesia as $itemIndonesia)
                                <td><input type="number" disabled name="indonesia[]" class="form-control" style="width: 60px;height: 50px" value="{{$itemIndonesia}}"></td> 
                                @endforeach
                            </tr>
                            <tr>
                                <td class="align-middle">Bahasa Inggris</td>
                                @php
                                    $inggris = $pendaftar->nilai_inggris;
                                    $nilaiInggris = explode("," , $inggris)
                                @endphp
                                @foreach ($nilaiInggris as $itemInggris)
                                <td><input type="number" disabled name="inggris[]" class="form-control" style="width: 60px;height: 50px" value="{{$itemInggris}}"></td> 
                                @endforeach
                            </tr>
                            <tr>
                                <td class="align-middle">Matematika</td>
                                @php
                                    $mtk = $pendaftar->nilai_mtk;
                                    $nilaiMtk = explode("," , $mtk)
                                @endphp
                                @foreach ($nilaiMtk as $itemMtk)
                                <td><input type="number" disabled name="mtk[]" class="form-control" style="width: 60px;height: 50px" value="{{$itemMtk}}"></td> 
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="alert alert-primary">
            <strong>Pilihan Program Studi</strong>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group"> 
                    <label>Pilihan Program Studi</label>
                    <select class="form-control" name="prodi" disabled>
                        <option selected>{{$pilihanJurusan->nama_jurusan}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="alert alert-primary">
            <strong>Berkas Pendudukung</strong>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    @if ($pendaftar->foto != null)
                    @php
                        $foto = $pendaftar->foto;
                        echo '<img src="/storage/foto_diri/' . $foto . '" width="100%" height="200px" >'
                        @endphp
                    <br/>
                    <label>Keterangan</label>
                    @else
                    <p class="big">Belum mengupload foto diri</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    @if ($pendaftar->berkas != null)
                    @php
                        $berkas = $pendaftar->berkas;
                        echo '<iframe src="/storage/berkas_pendukung/'. $berkas .'" width="100%" height="500px"></iframe>'
                        @endphp
                    <br/>
                    <label>Keterangan</label>
                    @else
                    <p class="big">Belum mengupload berkas pendukung</p>
                    @endif
                </div>
            </div>
        </div>