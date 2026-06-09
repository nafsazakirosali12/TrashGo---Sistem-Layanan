@extends('masyarakat.layouts_m.app_m')

@section('content')

<div class="w-100 px-4 px-md-5 mt-5 d-flex flex-column" style="min-height: 80vh;">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-grow">
        <h1 class="d-flex align-items-center gap-2 fw-bold">
            <i class="fa fa-bell text-warning fs-3"></i>
            Notifikasi
        </h1>

        <a href="/" onclick="location.reload()" class="btn btn-outline-secondary btn-sm">
            <i class="fa fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    @forelse($notifications as $n)

    @if($n->type == 'order')

        <!-- <div class="d-flex align-items-start gap-3 p-3 mb-3 bg-white shadow-sm rounded-4"> -->
            <div class="d-flex align-items-start gap-3 p-3 mb-3 bg-white shadow-sm rounded-4 {{ session('highlight_order_id') == $n->id ? 'highlight-notif' : '' }}">

            <div class="p-3 rounded-circle 
                @if($n->status == 'pending') bg-secondary-subtle
                @elseif($n->status == 'processing') bg-warning-subtle
                @elseif($n->status == 'completed') bg-success-subtle
                @endif">

                <i class="fa 
                    @if($n->status == 'pending') fa-clock text-secondary
                    @elseif($n->status == 'processing') fa-truck text-warning
                    @elseif($n->status == 'completed') fa-check-circle text-success
                    @endif">
                </i>
            </div>

            <div class="flex-grow-1">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-1 fw-bold">Pesanan #{{ $n->id }}</h6>
                    <small class="text-muted">
                        {{ $n->created_at->locale('id')->diffForHumans() }}
                    </small>
                </div>

                <p class="mb-1">
                    Status:
                    @if($n->status == 'pending')
                        <span class="badge bg-secondary text-white fs-6 ms-1">Menunggu</span>
                    @elseif($n->status == 'processing')
                        <span class="badge bg-warning text-dark fs-6 ms-1">Diproses</span>
                    @elseif($n->status == 'completed')
                        <span class="badge bg-success text-white fs-6 ms-1">Selesai</span>
                    @endif
                </p>

                <p class="mb-0 text-muted small">
                    @if($n->status == 'pending')
                        Pesananmu masih menunggu konfirmasi.
                    @elseif($n->status == 'processing')
                        Pesananmu sedang dalam proses pengolahan.
                    @elseif($n->status == 'completed')
                        Pesananmu telah selesai.
                    @endif
                </p>
            </div>

        </div>

    @elseif($n->type == 'payment')

        <!-- <div class="d-flex align-items-start gap-3 p-3 mb-3 bg-white shadow-sm rounded-4"> -->
            <div class="d-flex align-items-start gap-3 p-3 mb-3 bg-white shadow-sm rounded-4 {{ session('highlight_payment_id') == $n->id ? 'highlight-notif' : '' }}">

            <div class="p-3 rounded-circle 
                @if($n->status == 'pending') bg-warning-subtle
                @elseif($n->status == 'success') bg-success-subtle
                @elseif($n->status == 'failed') bg-danger-subtle
                @endif">

                <i class="fa 
                    @if($n->status == 'pending') fa-hourglass-half text-warning
                    @elseif($n->status == 'success') fa-check text-success
                    @elseif($n->status == 'failed') fa-times text-danger
                    @endif">
                </i>
            </div>

            <div class="flex-grow-1">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-1 fw-bold">Pembayaran #{{ $n->id }}</h6>
                    <small class="text-muted">
                        {{ $n->created_at->locale('id')->diffForHumans() }}
                    </small>
                </div>

                <p class="mb-1">
                    Status:
                    @if($n->status == 'pending')
                        <span class="badge bg-warning text-dark fs-6 ms-1">Menunggu</span>
                    @elseif($n->status == 'success')
                        <span class="badge bg-success text-white fs-6 ms-1">Berhasil</span>
                    @elseif($n->status == 'failed')
                        <span class="badge bg-danger text-white fs-6 ms-1">Gagal</span>
                    @endif
                </p>

                <p class="mb-0 text-muted small">
                    @if($n->status == 'pending')
                        Pembayaranmu masih menunggu untuk diselesaikan.
                    @elseif($n->status == 'success')
                        Pembayaranmu berhasil.
                    @elseif($n->status == 'failed')
                        Pembayaranmu gagal. Silakan coba lagi.
                    @endif
                </p>
            </div>

        </div>

    @endif

@empty
    <div class="text-center py-5">
        <i class="fa fa-bell fa-2x text-muted mb-2"></i>
        <p class="text-muted">Belum ada notifikasi</p>
    </div>
@endforelse

    <div class="d-flex justify-content-center mt-3 mb-5">
    {{ $notifications->links() }}
</div>

</div>

<style>
    /* untuk highlight notif */
    .highlight-notif{
        border: 2px solid #B7C43A;
        background-color: #f8ffe5;
        animation: glowNotif 1s infinite alternate;
    }

    @keyframes glowNotif{
        from{
            box-shadow: 0 0 5px #B7C43A;
        }

        to{
            box-shadow: 0 0 20px #B7C43A;
        }
    }

    .pagination .page-link {
        color: #9acd32;
        border-color: ##9acd32;
    }

    .pagination .page-link:hover {
        background-color: #93a267;
        color: white;
        border-color: #93a267;
    }

    .pagination .active .page-link {
        background-color: #93a267;
        border-color: #93a267;
        color: white;
    }

    .pagination .disabled .page-link {
        color: #c0c0c0;
    }
</style>

<script>
    setTimeout(() => {

        const notif = document.querySelectorAll('.highlight-notif');

        notif.forEach(item => {
            item.classList.remove('highlight-notif');
        });

    }, 5000);
</script>

@endsection