@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-plus-square fa-fw"></span> Stock Opname | {{$data['periode']->name}}</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
                <form method="POST" action="{{route('soStore')}}" autocomplete="off">
                {{csrf_field()}}
                <div class="col-md-12 mb-2">
                    <label>Pilih Barang</label>
                    <select class="form-control" name="product_id" required>
                        @if ($data['product']->count() == 0)
                            <option value="">Belum Ada Satuan Barang</option>
                        @else
                            <option value="">-- Pilih --</option>
                            @foreach ($data['product'] as $opt)
                                <option value="{{$opt->id}}" {{old('product_id') == $opt->id ? 'selected':''}}>{{$opt->code}} | {{$opt->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-12 mb-2">
                    <label>Jumlah Stok Tersedia</label>
                    <input type="text" name="qty" class="form-control" value="{{old('qty')}}" maxlength="20" required>
                </div>
                <div class="col-md-12 mb-2">
                    <label>Lokasi Penyimpanan</label>
                    <select class="form-control" name="warehouse_id" required>
                        @if ($data['warehouse']->count() == 0)
                            <option value="">Belum Ada Gudang</option>
                        @else
                            <option value="">-- Pilih --</option>
                            @foreach ($data['warehouse'] as $opt)
                                <option value="{{$opt->id}}" {{old('warehouse_id') == $opt->id ? 'selected':''}}>{{$opt->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-12 mb-4">
                </div>
                <div class="col-md-12">
                    <a class="btn btn-secondary" href="{{route('soIndex')}}">Batal</a>
                    <button class="btn btn-success" type="submit">Simpan</button>
                </div>
                </form>
            </div>

            <div class="col-md-6 mb-3">
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</main>
@endsection