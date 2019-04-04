@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-cash-register fa-fw"></span> Jual / Beli Barang</h1>
    </div>
    <form action="{{route('trStore')}}" method="post" autocomplete="off">
    {{ csrf_field() }}
    <div class="container wrap mb-5">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Tanggal</label>
                <input id="datepicker" type="text" name="date" class="form-control" value="{{$data['now']}}" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Transaksi</label>
                <select name="type" class="form-control" style="width:276px" required>
                    <option value="">----- Pilih -----</option>
                    <option value="S">Jual</option>
                    <option value="B">Beli</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-3">
                <label class="h4"><u>BARANG</u></label>
            </div>
            <div class="col-md-2 mb-3">
                <label class="h4"><u>PRICE</u></label>
            </div>
            <div class="col-md-2 mb-3">
                <label class="h4"><u>QTY</u></label>
            </div>
        </div>
        <div class="clone">
        <div class="row input_fields_wrap">
            <div class="col-md-8 mb-3">
                <select class="form-control" name="product_id[]" required>
                    @if ($data['product']->count() == 0)
                        <option value="">Belum Ada Satuan Barang</option>
                    @else
                        <option value="">-- Pilih --</option>
                        @foreach ($data['product'] as $opt)
                            <option value="{{$opt->product_id}}">{{$opt->product->code}} | {{$opt->product->name}} | STOK :{{$opt->total_stock()}} | Rp {{number_format($opt->product->price,2)}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <input type="number" name="price[]" value="0" class="form-control" required>
            </div>
            <div class="col-md-2 mb-3">
                <input type="text" name="qty[]" class="form-control" required>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col md-12">
                <a href="#" class="btn btn-danger remove_field">Hapus</a>
                <button class="btn btn-primary add_field_button">Tambah Barang</button>
                <button type="submit" class="btn btn-success">Proses</button>
            </div>
        </div>
    </div>
    </form>
</main>
@endsection