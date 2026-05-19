@extends('petugas.layouts_p.app_p')

@section('page', 'Pendapatan')

@section('content')

<div class="container">

    <h4 class="fw-bold mb-4">
        Pendapatan Petugas
    </h4>

    {{-- CARD TOTAL --}}
    <div class="row mb-4">

        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">

                    <small class="text-muted">
                        Pendapatan Hari Ini
                    </small>

                    <h3 class="fw-bold text-success">
                        Rp {{ number_format($hariIni,0,',','.') }}
                    </h3>

                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">

                    <small class="text-muted">
                        Pendapatan Minggu Ini
                    </small>

                    <h3 class="fw-bold text-success">
                        Rp {{ number_format($mingguIni,0,',','.') }}
                    </h3>

                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">

                    <small class="text-muted">
                        Pendapatan Bulan Ini
                    </small>

                    <h3 class="fw-bold text-success">
                        Rp {{ number_format($bulanIni,0,',','.') }}
                    </h3>

                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Tahun Ini</h6>
                    <h4 class="fw-bold text-success">
                        Rp {{ number_format($tahunIni, 0, ',', '.') }}
                    </h4>
                </div>
            </div>
        </div>

    </div>

    {{-- FILTER --}}
    <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body">

            <form method="GET">

                <div class="row">

                    <div class="col-md-4">
                        <label>Dari Tanggal</label>
                        <input type="date"
                               name="dari"
                               class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label>Sampai Tanggal</label>
                        <input type="date"
                               name="sampai"
                               class="form-control">
                    </div>

                    <div class="col-md-4 d-flex align-items-end">
                        <button class="btn btn-success w-100">
                            Filter
                        </button>
                    </div>

                </div>

            </form>

        </div>
    </div>

    {{-- TABEL --}}
    <div class="card shadow-sm border-0 rounded-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered align-middle text-center">

                    <thead class="table-success text-center">
                        <tr>
                            <th>Order</th>
                            <th>Tanggal</th>
                            <th>Dibayar Masyarakat</th>
                            <th>Point</th>
                            <th>Dibayar Sistem</th>
                            <th>Pendapatan</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($pendapatans as $p)

                        @php
                            $pembayaran = $p->order->pembayaran;

                            $point = $pembayaran->point_digunakan ?? 0;

                            $dibayarSistem = $point * 10;

                            $dibayarMasyarakat =
                                $p->total_pendapatan - $dibayarSistem;
                        @endphp

                        <tr>

                            <td>
                                #{{ $p->order_id }}
                            </td>

                            <td>
                                {{ $p->tanggal_pendapatan }}
                            </td>

                            <td>
                                Rp {{ number_format($dibayarMasyarakat,0,',','.') }}
                            </td>

                            <td>
                                {{ $point }} Point
                            </td>

                            <td>
                                Rp {{ number_format($dibayarSistem,0,',','.') }}
                            </td>

                            <td class="fw-bold text-success">
                                Rp {{ number_format($p->total_pendapatan,0,',','.') }}
                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="6" class="text-center">
                                Belum ada data pendapatan
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">
                {{ $pendapatans->links() }}
            </div>

        </div>

    </div>

</div>

@endsection