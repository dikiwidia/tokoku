@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-plus-square fa-fw"></span> Buat Periode Baru</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
                <form method="POST" action="{{route('periodeStore')}}" autocomplete="off">
                {{csrf_field()}}
                <div class="col-md-12 mb-4">
                    <label for="cc-name">Nama Periode</label>
                    <input type="text" name="name" class="form-control" maxlength="50" required>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-success" type="submit">Simpan</button>
                </div>
                </form>
            </div>

            <div class="col-md-6 mb-3">
            </div>
        </div>
    </div>
</main>
@endsection