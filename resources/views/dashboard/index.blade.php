@extends('layouts.master')
@section('content')
@can('pendaftar')   
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Selamat datang calon mahasiswa baru</h2>
                    </div>
                </div>
            </div>
            <br/>
            <hr/>
            @if ($pendaftar == false)
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal"
                        data-target="#formRegistrasiModal">
                            <i class="zmdi zmdi-plus"></i>Isi Form Registrasi</button>
                            <button class="btn btn-primary" id="contoh">Klik disini</button>
                    </div>
                </div>
            </div>
            @else
            <div class="table-responsive-sm">
                <table class="table table-hover bg-white">
                    <thead>
                        <th>No Registrasi</th>
                        <th>Nama</th>  
                        <th>Aksi</th>  
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$pendaftar->no_reg}}</td>
                            <td>{{$pendaftar->nama}}</td>
                            <td>
                                <button type="button" id="btn-edit-registrasi" class="btn btn-info sm" data-toggle="modal"
                                data-target="#formEditRegistrasiModal" data-id="{{$pendaftar->no_reg}}">Edit</button>      
                            </td>    
                        </tr>    
                    </tbody>    
                </table>   
            </div> 
            @endif  
            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
{{-- Memanggil modal create --}}
@include('dashboard.modalCreate')
{{-- Memanggil modal update --}}
@include('dashboard.modalUpdate')
            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div> --}}
            <script>
                document.getElementById("contoh").addEventListener('click', function() {
                    swal({

                        title: "Anjay!",

                        text: "Pop-up berhasil ditampilkan",

                        icon: "success",

                        button: true

                    });

                    });
            </script>
@endcan
@endsection