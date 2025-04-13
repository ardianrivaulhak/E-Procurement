<!DOCTYPE html>
@extends('layouts.app')

@section('title', 'Tambah Vendor')

@section('content')
<style>
    body {
        margin-top: 30px;
        background-color: #f5f5f5;
    }

    .form-wrapper {
        background: #fff;
        padding: 25px 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .form-group label {
        font-weight: bold;
    }

    .btn-block {
        width: 100%;
    }
</style>

<div class="container">
    <div class="col-md-6 col-md-offset-3 form-wrapper">
        <h2 class="text-center"><b>VhiWEB</b><br>Tambah Vendor</h2>
        <hr>

        {{-- Success Message --}}
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="/vendors/register" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Vendor</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Masukkan nama vendor" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Masukkan email vendor" required>
            </div>

            <div class="form-group">
                <label for="company">Perusahaan</label>
                <input type="text" name="company" id="company" class="form-control" value="{{ old('company') }}" placeholder="Masukkan nama perusahaan vendor" required>
            </div>

            <button type="submit" class="btn btn-success btn-block">Daftarkan Vendor</button>
        </form>

    </div>
</div>
@endsection