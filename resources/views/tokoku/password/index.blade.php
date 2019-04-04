@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-key fa-fw"></span> Ubah Sandi</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
                <form method="POST" action="{{route('passwordChanged')}}" autocomplete="off">
                {{csrf_field()}}
                <div class="col-md-12 mb-3">
                    <label for="cc-name">Email</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled>
                </div>
                <div class="col-md-12 mb-2">
                    <label for="password">Kata Sandi Lama</label>
                    <input type="password" name="old-password" class="form-control" id="password" placeholder="Masukkan Sandi Lama" required>
                    @if (session('status'))
                        <small class="text-muted">{{session('status')}}</small>
                    @endif
                </div>
                <div class="col-md-12 mb-2">
                    <label for="new-password">Kata Sandi Baru</label>
                    <input type="password" name="password" class="form-control" id="new-password" placeholder="Masukkan Sandi Baru" required>
                    <small class="text-muted">Kata Sandi Baru minimal 8 karakter</small>
                </div>
                <div class="col-md-12 mb-4">
                    <label for="retype-password">Ketik Ulang Sandi</label>
                    <input type="password" name="password_confirmation" class="form-control" id="retype-password" placeholder="Ketik Ulang Sandi Baru" required>
                    <small class="text-muted">Ketik Ulang Sandi baru Anda</small>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-success" type="submit">Ubah Kata Sandi</button>
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