@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-calendar-alt fa-fw"></span> Periode</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                <a href="{{route('periodeCreate')}}" class="btn btn-primary">Buat Baru</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Periode</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($data['parse']) == 0)
                    <tr>
                        <td colspan="4"> No Data </td>
                    </tr>
                    @else
                    @foreach ($data['parse'] as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->name}}</td>
                        <td><span class="badge badge-{{($item->active == 'Y' ? 'success':'danger')}}">{{($item->active == 'Y' ? 'AKTIF':'NONAKTIF')}}</span></td>
                        <td><div class="btn-group" role="group" aria-label="Grup"><a href="{{route('periodeEdit',[$item->id])}}" type="button" class="btn btn-info btn-sm">Ubah</a><a href="#deleteConfirm" type="button" class="btn btn-danger btn-sm delete" data-text="{{$item->name}}" data-value="{{$item->id}}">Hapus</a></div></td>
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
        <form method="POST" action="{{route('periodeDelete')}}">
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </div>
        {{csrf_field()}}
        </form>
    </div>
</div>
@endsection