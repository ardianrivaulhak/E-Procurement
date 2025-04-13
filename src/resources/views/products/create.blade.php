@extends('layouts.app')

@section('title', 'Tambah Product')

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
        <h2 class="text-center"><b>VhiWEB</b><br>Tambah Produk</h2>
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

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="vendor_id">Vendor ID</label>
                <input type="number" name="vendor_id" id="vendor_id" class="form-control" value="{{ old('vendor_id') }}" placeholder="Masukkan ID Vendor" required>
            </div>

            <div class="form-group">
                <label for="name">Nama Produk</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Masukkan nama produk" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Masukkan deskripsi produk">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price') }}" placeholder="Masukkan harga" required>
            </div>

            <button type="submit" class="btn btn-success btn-block">Tambah Produk</button>
        </form>
    </div>
</div>
@endsection