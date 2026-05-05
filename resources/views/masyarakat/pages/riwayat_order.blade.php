@extends('masyarakat.layouts_m.app_m')

@section('content')

<style>
body {
    background: #f4f7f6;
}

.order-card {
    border: none;
    border-radius: 16px;
    padding: 16px;
    background: #fff;
    box-shadow: 0 4px 14px rgba(0,0,0,0.06);
    transition: 0.25s;
    position: relative;
    height: 100%;
}

.order-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: #28a745;
}

.order-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 22px rgba(0,0,0,0.12);
}

.badge-status {
    font-size: 11px;
    padding: 6px 12px;
    border-radius: 20px;
    font-weight: 500;
    white-space: nowrap;
}

.badge-pending {
    background: #fff3cd;
    color: #856404;
}

.badge-processing {
    background: #d1ecf1;
    color: #0c5460;
}

.badge-completed {
    background: #d4edda;
    color: #155724;
}

.badge-success {
    background: #d4edda;
    color: #155724;
}

.badge-failed {
    background: #f8d7da;
    color: #721c24;
}

.small-text {
    font-size: 13px;
    color: #555;
}

.label {
    font-weight: 600;
    color: #333;
}

.text-box {
    min-height: 40px;
}

hr {
    margin: 10px 0;
}

.info-grid,
.payment-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}

.info-grid div,
.payment-grid div {
    display: flex;
    flex-direction: column;
}
</style>

<!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Riwayat Order</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a class="nav-link" href="{{ route('masyarakat.pages.order') }}">Order</a></li>
                        <li class="breadcrumb-item active">Riwayat Order</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!-- End All Title Box -->

<div class="container mt-4 mb-5 pb-5">
    <br><br>
    @if($orders->isEmpty())
        <div class="alert alert-warning text-center">
            Belum ada riwayat order
        </div>
    @else

    <div class="row g-3">

        @foreach($orders as $order)

        @php
            $status = strtolower($order->status);
            $payStatus = strtolower(optional($order->pembayaran)->status ?? '');
        @endphp

        <div class="col-md-4">

            <div class="order-card h-100">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center">
                    <b class="small-text">
                        {{ $order->kategori->nama_kategori ?? '-' }}
                    </b>

                    <span class="badge-status
                        {{ $status == 'pending' ? 'badge-pending' : '' }}
                        {{ $status == 'processing' ? 'badge-processing' : '' }}
                        {{ $status == 'completed' ? 'badge-completed' : '' }}
                    ">
                        {{ $order->status }}
                    </span>
                </div>

                <small class="text-muted">
                    {{ $order->tanggal }} • {{ $order->waktu }}
                </small>

                <hr>

                <!-- INFO -->
                <div class="info-grid small-text">
                    <div>
                        <span class="label">Alamat:</span>
                        <span>{{ $order->lokasi }}</span>
                    </div>

                    <div>
                        <span class="label">Catatan:</span>
                        <span>{{ $order->catatan ?? '-' }}</span>
                    </div>

                </div>

                <hr>

                <!-- HEADER PEMBAYARAN -->
                <div class="d-flex justify-content-between align-items-center mb-1 small-text">
                    
                    <span class="label">Pembayaran</span>

                    <span class="badge-status
                        {{ $payStatus == 'pending' ? 'badge-pending' : '' }}
                        {{ $payStatus == 'success' ? 'badge-success' : '' }}
                        {{ $payStatus == 'failed' ? 'badge-failed' : '' }}
                    ">
                        {{ optional($order->pembayaran)->status ?? '-' }}
                    </span>

                </div>

                <!-- PEMBAYARAN -->
                <div class="payment-grid small-text">
                    <div>
                        <span class="label">Metode:</span>
                        <span>{{ strtoupper(optional($order->pembayaran)->metode_pembayaran ?? '-') }}</span>
                    </div>

                    <div>
                        <span class="label">Total:</span>
                        <span>
                            <b style="color:#28a745;">
                                Rp {{ number_format($order->total_harga,0,',','.') }}
                            </b>
                        </span>
                    </div>

                </div>

            </div>

        </div>

        @endforeach

    </div>

    <!-- PAGINATION -->
    <div class="d-flex justify-content-center mt-4">
        {{ $orders->links() }}
    </div>

    @endif

</div>

@endsection