@extends('layouts.app')

@section('title', 'Pending Vendors')

@section('content')
<style>
    body {
        background-color: #f9f9f9;
        padding: 30px;
    }

    .vendor-card {
        background: #fff;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
        transition: 0.3s;
    }

    .vendor-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    .vendor-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333;
    }

    .vendor-detail {
        margin-bottom: 6px;
        color: #555;
    }

    .badge-status {
        background-color: #f0ad4e;
        color: #fff;
        padding: 5px 10px;
        font-size: 12px;
        border-radius: 20px;
    }

    .btn-approve {
        margin-top: 10px;
    }
</style>

<div class="container">
    <h2 class="text-center" style="margin-bottom: 40px;">🕒 Pending Vendors</h2>

    <div class="row">
        @forelse($vendors as $vendor)
        <div class="col-md-6">
            <div class="vendor-card">
                <div class="vendor-title">{{ $vendor->name }}</div>
                <div class="vendor-detail"><strong>Company:</strong> {{ $vendor->company }}</div>
                <div class="vendor-detail">
                    <strong>Status:</strong>
                    <span class="badge-status">{{ ucfirst($vendor->status) }}</span>
                </div>
                <form action="/admin/vendors/{{ $vendor->id }}/approve" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm btn-approve">✅ Approve</button>
                </form>
            </div>
        </div>
        @empty
        <div class="col-md-12 text-center">
            <div class="alert alert-info">Tidak ada vendor yang menunggu persetujuan.</div>
        </div>
        @endforelse
    </div>
</div>
@endsection