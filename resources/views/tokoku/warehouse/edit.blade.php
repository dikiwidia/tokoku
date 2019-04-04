@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-edit fa-fw"></span> Ubah Gudang / Lokasi</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
                <form method="POST" action="{{route('whUpdate',[$data->id])}}" autocomplete="off">
                {{method_field('put')}}
                {{csrf_field()}}
                <div class="col-md-12 mb-4">
                    <label for="cc-name">Nama Gudang / Lokasi</label>
                    <input type="text" name="name" class="form-control" value="{{$data->name}}" maxlength="100" required>
                </div>
                <div class="col-md-12">
                    <a href="{{route('whIndex')}}" class="btn btn-secondary">Batal</a>
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