@extends('layouts.app')

@section('title', 'List Product')

@section('content')
<style>
    body {
        margin-top: 30px;
        background-color: #f8f9fa;
    }

    .table-wrapper {
        background: #fff;
        padding: 20px 25px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .search-form {
        margin-bottom: 20px;
    }

    .table th,
    .table td {
        vertical-align: middle !important;
    }
</style>

<div class="container">
    <div class="col-md-10 col-md-offset-1 table-wrapper">
        <h2 class="text-center"><b>VhiWEB</b><br>Product List</h2>
        <hr>

        {{-- Form Pencarian --}}
        <form method="GET" class="form-inline search-form text-center">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request('search') }}">
            </div>
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
        <li><a href="{{ url('/products/create') }}">Tambah Product</a></li><br>

        {{-- Tabel Produk --}}
        <table class="table table-bordered table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Vendor ID</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $index => $product)
                <tr>
                    <td>{{ $products->firstItem() + $index }}</td>
                    <td>{{ $product->name }}</td>
                    <td>Rp {{ number_format($product->price, 2, ',', '.') }}</td>
                    <td>{{ $product->vendor_id }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada produk ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="text-center">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection