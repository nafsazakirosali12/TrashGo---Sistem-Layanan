@extends('petugas.layouts_p.app_p')

@section('page', 'Riwayat Pengangkutan')

@section('content')

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div>
                            <h5 class="mb-0">Riwayat Pengangkutan</h5>
                            <p class="text-sm text-muted mb-0">Data riwayat pengangkutan sampah</p>
                        </div>
                    </div>
                </div>

                <div class="card-body px-3 pt-3 pb-3">
                    <div class="table-responsive">
                        <table id="riwayatTable" class="table table-hover align-items-center mb-0 text-center">
                            <thead style="background-color: #2e7d32; border-bottom: 2px solid #c8e6c9;">
                                <tr>
                                    <th class="text-uppercase text-xs font-weight-bolder text-center py-3" style="color: #edf7ed;">No</th>
                                    <th class="text-uppercase text-xs font-weight-bolder text-center py-3" style="color: #edf7ed;">Tanggal</th>
                                    <th class="text-uppercase text-xs font-weight-bolder text-center py-3" style="color: #edf7ed;">Waktu</th>
                                    <th class="text-uppercase text-xs font-weight-bolder text-center py-3" style="color: #edf7ed;">Lokasi</th>
                                    <th class="text-uppercase text-xs font-weight-bolder text-center py-3" style="color: #edf7ed;">Status</th>
                                    <th class="text-uppercase text-xs font-weight-bolder text-center py-3" style="color: #edf7ed;">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($riwayat_pickup as $item)
                                    <tr>
                                        <td>
                                            <span class="text-sm font-weight-bold">
                                                {{ $loop->iteration }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-sm font-weight-bold d-block">
                                                {{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('d F Y') }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-sm text-dark">
                                                {{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('H:i') }} WIB
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-sm text-dark">
                                                {{ $item->order->lokasi }}
                                            </span>
                                        </td>
                                        <td>
                                            <span style="background-color: #edf7ed; color: #3b733e; border: 1px solid #c8e6c9; padding: 0.5em 1em; border-radius: 50px; font-weight: 600; font-size: 0.75rem; letter-spacing: 0.3px;">
                                                Selesai
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn btn-sm mb-0 px-3 py-1" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}"
                                                style="color: #2e7d32; border: 1px solid #2e7d32; background-color: transparent; transition: all 0.2s;"
                                                onmouseover="this.style.backgroundColor='#2e7d32'; this.style.color='#edf7ed';"
                                                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#2e7d32';">
                                                <i class="fas fa-eye me-1" aria-hidden="true"></i> Detail
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- MODAL --}}
@foreach ($riwayat_pickup as $item)
<div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">

            <div class="modal-header">
                <h5 class="modal-title">Detail Pengangkutan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">         
                <div class="mb-3 border-bottom pb-2">
                    <span class="text-muted d-block small">Nama Masyarakat</span>
                    <span class="fw-bold text-dark">{{ $item->order->masyarakat->nama_masyarakat ?? 'Tidak diketahui' }}</span>
                </div>
                <div class="mb-3 border-bottom pb-2">
                    <span class="text-muted d-block small">Kategori Sampah</span>
                    <span class="fw-bold text-dark">{{ $item->order->kategori->nama_kategori ?? 'Tidak diketahui' }}</span>
                </div>
                <div class="mb-3 border-bottom pb-2">
                    <span class="text-muted d-block small">Lokasi Jemput</span>
                    <span class="fw-bold text-dark">{{ $item->order->lokasi }}</span>
                </div>
                <div class="row mb-3 border-bottom pb-2">
                    <div class="col-6">
                        <span class="text-muted d-block small">Tanggal Pengangkutan</span>
                        <span class="fw-bold text-dark">{{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('d F Y') }}</span>
                    </div>
                    <div class="col-6">
                        <span class="text-muted d-block small">Waktu Pengangkutan</span>
                        <span class="fw-bold text-dark">{{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('H:i') }} WIB</span>
                    </div>
                </div>
                <div class="row mb-3 border-bottom pb-2">
                    <div class="col-6">
                        <span class="text-muted d-block small">Tanggal Order</span>
                        <span class="fw-bold text-dark">{{ \Carbon\Carbon::parse($item->order->tanggal)->translatedFormat('d F Y') }}</span>
                    </div>
                    <div class="col-6">
                        <span class="text-muted d-block small">Waktu Order</span>
                        <span class="fw-bold text-dark">{{ $item->order->waktu }} WIB</span>
                    </div>
                </div>
                <div class="mb-3 border-bottom pb-2">
                    <span class="text-muted d-block small">Catatan Masyarakat</span>
                    <span class="fw-bold text-dark">{{ $item->order->catatan ?? 'Tidak ada catatan' }}</span>
                </div>
                <div class="mb-3 border-bottom pb-2">
                    <span class="text-muted d-block small">Total Harga</span>
                    <span class="fw-bold text-success">Rp {{ number_format($item->order->total_harga, 0, ',', '.') }}</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="fw-bold text-dark btn bg-success mb-0" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>                
        </div>
    </div>
</div>
@endforeach

@push('scripts')
<script>
$(document).ready(function () {
    $('#riwayatTable').DataTable({
        responsive: true,
        pageLength: 5,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Cari...",
            lengthMenu: "Tampilkan _MENU_ data",
            zeroRecords: "Data tidak ditemukan",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            paginate: {
                previous: "<",
                next: ">"
            }
        }
    });
});
</script>
@endpush

@endsection