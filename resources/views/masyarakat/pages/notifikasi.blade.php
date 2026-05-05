@extends('masyarakat.layouts_m.app_m')

@section('content')

<div class="w-100 px-4 px-md-5 mt-5 d-flex flex-column" style="min-height: 80vh;">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-grow">
        <h1 class="d-flex align-items-center gap-2 fw-bold">
            <i class="fa fa-bell text-warning fs-3"></i>
            Notifikasi
        </h1>

        <a href="/" class="btn btn-outline-secondary btn-sm">
            <i class="fa fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    {{-- STATUS PENGIRIMAN --}}
    <div class="bg-success-subtle text-success px-4 py-2 rounded-3 d-inline-flex align-items-center gap-2 mb-3">
        <i class="fa fa-truck"></i>
        <span class="fw-semibold">Status Pengiriman</span>
    </div>

    @forelse($orders as $order)
    <div class="d-flex align-items-start gap-3 p-3 mb-3 bg-white shadow-sm rounded-4">

        {{-- ICON --}}
        <div class="p-3 rounded-circle 
            @if($order->status == 'pending') bg-secondary-subtle
            @elseif($order->status == 'processing') bg-warning-subtle
            @elseif($order->status == 'completed') bg-success-subtle
            @endif">

            <i class="fa 
                @if($order->status == 'pending') fa-clock text-secondary
                @elseif($order->status == 'processing') fa-truck text-warning
                @elseif($order->status == 'completed') fa-check-circle text-success
                @endif">
            </i>
        </div>

        {{-- CONTENT --}}
        <div class="flex-grow-1">
            <div class="d-flex justify-content-between">
                <h6 class="mb-1 fw-bold">Pesanan #{{ $order->id }}</h6>
                <small class="text-muted">{{ $order->created_at->diffForHumans() }}</small>
            </div>

            <p class="mb-1 text-muted">
                Status: {{ ucfirst($order->status) }}
            </p>

            {{-- NARASI --}}
            <p class="mb-0 text-muted small">
                @if($order->status == 'pending')
                    Your order is waiting for confirmation.
                @elseif($order->status == 'processing')
                    Your order is currently being processed.
                @elseif($order->status == 'completed')
                    Your order has been completed successfully.
                @endif
            </p>
        </div>

    </div>
    @empty
    <div class="text-center py-5">
        <i class="fa fa-box-open fa-2x text-muted mb-2"></i>
        <p class="text-muted">Belum ada notifikasi pengiriman</p>
    </div>
    @endforelse


    {{-- STATUS PEMBAYARAN --}}
    <div class="bg-success-subtle text-success px-4 py-2 rounded-3 d-inline-flex align-items-center gap-2 mt-5 mb-3">
        <i class="fa fa-wallet"></i>
        <span class="fw-semibold">Status Pembayaran</span>
    </div>

    @forelse($pembayarans as $p)
    <div class="d-flex align-items-start gap-3 p-3 mb-3 bg-white shadow-sm rounded-4">

        {{-- ICON --}}
        <div class="p-3 rounded-circle 
            @if($p->status == 'pending') bg-warning-subtle
            @elseif($p->status == 'success') bg-success-subtle
            @elseif($p->status == 'failed') bg-danger-subtle
            @endif">

            <i class="fa 
                @if($p->status == 'pending') fa-hourglass-half text-warning
                @elseif($p->status == 'success') fa-check text-success
                @elseif($p->status == 'failed') fa-times text-danger
                @endif">
            </i>
        </div>

        {{-- CONTENT --}}
        <div class="flex-grow-1">
            <div class="d-flex justify-content-between">
                <h6 class="mb-1 fw-bold">Pembayaran #{{ $p->id }}</h6>
                <small class="text-muted">{{ $p->created_at->diffForHumans() }}</small>
            </div>

            <p class="mb-1 text-muted">
                Status: {{ ucfirst($p->status) }}
            </p>

            {{-- NARASI --}}
            <p class="mb-0 text-muted small">
                @if($p->status == 'pending')
                    Your payment is waiting to be completed.
                @elseif($p->status == 'success')
                    Your payment was successful.
                @elseif($p->status == 'failed')
                    Your payment failed. Please try again.
                @endif
            </p>
        </div>

    </div>
    @empty
    <div class="text-center py-5">
        <i class="fa fa-wallet fa-2x text-muted mb-2"></i>
        <p class="text-muted">Belum ada notifikasi pembayaran</p>
    </div>
    @endforelse

</div>

@endsection