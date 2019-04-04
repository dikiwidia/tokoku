@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-clipboard-list fa-fw"></span> List Barang</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                @if(session()->has('status'))
                <div id="alert" class="alert alert-success" role="alert">
                    {{session()->get('status')}}
                </div>
                @elseif(session()->has('errors'))
                <div id="alert" class="alert alert-danger" role="alert">
                    {{session()->get('errors')}}
                </div>
                @endif
            </div>
            <div class="col-md-12 mb-4">
                <a href="{{route('pdCreate')}}" class="btn btn-primary">Buat Baru</a>
                <a href="#importConfirm" type="button" class="btn btn-warning import">Impor Data</a>
                <a href="{{route('pdExport')}}" target="_blank" type="button" class="btn btn-success">Ekspor Data</a>
                <a href="#deleteAllConfirm" type="button" class="btn btn-danger deleteAll"><span class="fa fa-trash"></span> Hapus</a>
            </div>
            <div class="table-responsive mb-4">
                <table id="dataTables" class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Barang</th>
                        <th>Deskripsi Barang</th>
                        <th>Harga Satuan</th>
                        <th>Stok Minimum</th>
                        <th>Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($data['parse']) == 0)
                    <tr>
                        <td colspan="6"> No Data </td>
                    </tr>
                    @else
                    @foreach ($data['parse'] as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->code}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->warn_stock}}</td>
                        <td><div class="btn-group" role="group" aria-label="Grup"><a href="{{route('pdEdit',[$item->id])}}" type="button" class="btn btn-info btn-sm">Ubah</a><a href="#deleteConfirm" type="button" class="btn btn-danger btn-sm delete" data-text="{{$item->name}}" data-value="{{$item->id}}">Hapus</a></div></td>
                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!-- Modal -->
<div class="modal fade" id="deleteConfirm" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <form method="POST" action="{{route('pdDelete')}}">
        {{method_field('delete')}}
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Anda yakin akan menghapus <strong class="modalDataText"></strong> ?</p>
                <input type="hidden" name="id" value="" class="modalDataValue">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </div>
        {{csrf_field()}}
        </form>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="importConfirm" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <form method="POST" action="{{route('pdImport')}}" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Impor Data (Ekstensi: xls)</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <input type="file" name="file" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Unggah</button>
            </div>
        </div>
        {{csrf_field()}}
        </form>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="deleteAllConfirm" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <form method="POST" action="{{route('pdDeleteAll')}}">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Semua Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus seluruh data ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Ya</button>
            </div>
        </div>
        {{csrf_field()}}
        </form>
    </div>
</div>
@endsection