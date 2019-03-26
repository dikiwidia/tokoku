@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-exclamation fa-fw"></span> Laporan Stok | {{$data['periode']->name}}</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <table id="dataTables" class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Barang</th>
                        <th>Deskripsi Barang</th>
                        <th>Harga Satuan</th>
                        <th>Stok Minimum</th>
                        <th>SO Periode ini</th>
                        <th>Total Stok</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($data['parse']) == 0)
                    <tr>
                        <td colspan="8"> No Data </td>
                    </tr>
                    @else
                    @foreach ($data['parse'] as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item[0]->product->code}}</td>
                        <td>{{$item[0]->product->name}}</td>
                        <td>{{$item[0]->product->price}}</td>
                        <td>{{$item[0]->product->warn_stock}}</td>
                        <td>{{$item[0]->qty}}</td>
                        <td>{{$item[0]->total_stock()}}</td>
                        <td>
                            @if($item[0]->total_stock() <= $item[0]->product->warn_stock)
                            <span class="badge badge-danger">Stok Rendah</span>
                            @else
                            <span class="badge badge-success">Aman</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection