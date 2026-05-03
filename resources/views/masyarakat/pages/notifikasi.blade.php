@extends('masyarakat.layouts_m.app_m')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>🔔 Notifikasi</h4>
        <a href="/" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    {{-- STATUS PENGIRIMAN --}}
    <h5 class="mb-3">Status Pengiriman</h5>

    @forelse($orders as $order)
        <div class="card mb-3 shadow-sm border-start border-4 
            @if($order->status == 'dikirim') border-warning
            @elseif($order->status == 'selesai') border-success
            @else border-secondary
            @endif">

            <div class="card-body d-flex justify-content-between align-items-center">
                
                <div>
                    <p class="mb-1 fw-semibold">
                        Pesanan #{{ $order->id }}
                    </p>
                    <small class="text-muted">
                        Status: {{ $order->status }}
                    </small>
                </div>

                <span class="badge 
                    @if($order->status == 'dikirim') bg-warning text-dark
                    @elseif($order->status == 'selesai') bg-success
                    @else bg-secondary
                    @endif">
                    {{ ucfirst($order->status) }}
                </span>

            </div>
        </div>
    @empty
        <div class="alert alert-info">Tidak ada data pengiriman</div>
    @endforelse


    {{-- STATUS PEMBAYARAN --}}
    <h5 class="mt-4 mb-3">Status Pembayaran</h5>

    @forelse($pembayarans as $p)
        <div class="card mb-3 shadow-sm border-start border-4 
            @if($p->status == 'lunas') border-success
            @elseif($p->status == 'pending') border-warning
            @else border-danger
            @endif">

            <div class="card-body d-flex justify-content-between align-items-center">
                
                <div>
                    <p class="mb-1 fw-semibold">
                        Pembayaran {{ $p->id }}
                    </p>
                    <small class="text-muted">
                        Status: {{ $p->status }}
                    </small>
                </div>

                <span class="badge 
                    @if($p->status == 'lunas') bg-success
                    @elseif($p->status == 'pending') bg-warning text-dark
                    @else bg-danger
                    @endif">
                    {{ ucfirst($p->status) }}
                </span>

            </div>
        </div>
    @empty
        <div class="alert alert-info">Tidak ada data pembayaran</div>
    @endforelse

</div>

@endsection