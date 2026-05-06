@extends('masyarakat.layouts_m.app_m')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3">
                <a href="{{ url('/') }}" class="btn btn-outline-success" style="border-radius: 10px;">
                    <i class="fa fa-arrow-left"></i>
                </a>
            </div>

            <h2 class="text-center mb-4 text-success" style="font-weight: bold; font-size: 2rem;">MY TRASHGO! POINT</h2>
            <div class="card shadow-sm mb-4 text-center" style="border-radius: 15px; border-top: 5px solid #28a745;">
                <div class="card-body py-4">
                    <h5 class="text-muted mb-2">Total Poin Terkumpul</h5>
                    <h1 class="text-success" style="font-weight: bold; font-size: 2rem;">
                        <i class="fa fa-coins"></i> {{ $total_point }} poin
                    </h1>
                    <p class="text-muted mt-2">
                        <small><i class="fa fa-info-circle"></i> Total poin Anda setara dengan Rp {{ number_format($total_point * 10, 0, ',', '.') }}</small>
                    </p>
                    <p class="text-muted mb-0">
                        <small>Kumpulkan terus poinmu dari setiap order yang selesai dan tukarkan saat pembayaran!</small>
                    </p>
                </div>
            </div>

            <div class="card shadow-sm" style="border-radius: 15px;">
                <div class="card-header bg-white">
                    <h5 class="mb-0 pt-2 pb-2"><i class="fa fa-history"></i> Riwayat Poin</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-top-0 pl-4">Tanggal</th>
                                    <th class="border-top-0">Keterangan</th>
                                    <th class="border-top-0 text-center pr-4">Jumlah Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($riwayat_point as $rp)
                                    <tr>
                                        <td class="pl-4">{{ \Carbon\Carbon::parse($rp->tanggal_point)->format('d M Y, H:i') }}</td>
                                        <td>
                                            @if($rp->total_point > 0)
                                                <span class="badge badge-success px-2 py-1">Penyelesaian Order #{{ $rp->order_id }}</span>
                                            @else
                                                <span class="badge badge-danger px-2 py-1">Ditukar untuk Pembayaran #{{ $rp->order_id }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center pr-4">
                                            <strong class="{{ $rp->total_point > 0 ? 'text-success' : 'text-danger' }} fs-5">
                                                {{ $rp->total_point > 0 ? '+' : '' }}{{ $rp->total_point }}
                                            </strong>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-5">
                                            <i class="fa fa-folder-open mb-3" style="font-size: 30px; color: #ccc;"></i><br>
                                            Belum ada riwayat poin, mulai order pengangkutan sampah pertamamu!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection