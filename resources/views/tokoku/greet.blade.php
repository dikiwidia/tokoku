@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Dasbor</h1>
    </div>
    <div class="container">
        <h1 class="mt-5">Selamat Datang di <span style="font-family:'Tokoku'">Toko-KU</span></h1>
        <p>Hai, {{ Auth::user()->name }}</p>
        <hr />
        <div class="row">
            <div class="col-md-4">
                <h3>Barang Baru</h3>
                <p>Anda bisa menambahkan barang / produk baru disini</p>
                <p><a class="btn btn-success" href="{{route('pdCreate')}}" role="button"><span class="fa fa fa-plus"></span> Tambah</a></p>
            </div>
            <div class="col-md-4">
                <h3>Gudang</h3>
                <p>Anda bisa menambah lokasi penyimpanan baru disini </p>
                <p><a class="btn btn-info" href="{{route('whCreate')}}" role="button"><span class="fa fa-map-marker-alt"></span> Tambah</a></p>
            </div>
            <div class="col-md-4">
                <h3>Stok Opname</h3>
                <p>Tetapkan stok barang terlebih dahulu sebelum memulai proses jual / beli</p>
                <p><a class="btn btn-primary" href="{{route('soCreate')}}" role="button"><span class="fa fa-list-ol"></span> Stok Opname</a></p>
            </div>
        </div>
    </div>
</main>
@endsection