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
                            <p class="text-sm text-muted mb-0">
                                Data riwayat pengangkutan sampah
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body px-3 pt-3 pb-3">
                    <div class="table-responsive">
                        <table
                            id="riwayatTable"
                            class="table table-hover align-items-center mb-0 text-center">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-secondary text-xs font-weight-bolder">
                                        No
                                    </th>
                                    <th class="text-secondary text-xs font-weight-bolder">
                                        Tanggal
                                    </th>
                                    <th class="text-secondary text-xs font-weight-bolder">
                                        Waktu
                                    </th>
                                    <th class="text-secondary text-xs font-weight-bolder">
                                        Lokasi
                                    </th>
                                    <th class="text-secondary text-xs font-weight-bolder">
                                        Status
                                    </th>
                                    <th class="text-secondary text-xs font-weight-bolder">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($riwayat_pickup as $item)
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
                                                {{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('H:i') }}
                                                WIB
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-sm text-dark">
                                                {{ $item->order->lokasi }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-gradient-success">

                                                Selesai

                                            </span>

                                        </td>

                                        {{-- AKSI --}}
                                        <td>

                                            <button
                                                type="button"
                                                class="btn btn-sm bg-gradient-info mb-0"
                                                data-bs-toggle="modal"
                                                data-bs-target="#detailModal{{ $item->id }}">

                                                <i class="fas fa-eye me-1"></i>
                                                Detail

                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="6" class="py-4">

                                            <span class="text-muted">

                                                Belum ada riwayat pengangkutan.

                                            </span>

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


{{-- MODAL --}}
@foreach ($riwayat_pickup as $item)

<div
    class="modal fade"
    id="detailModal{{ $item->id }}"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 shadow">

            {{-- HEADER --}}
            <div class="modal-header">

                <h5 class="modal-title">

                    Detail Pengangkutan

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            {{-- BODY --}}
            <div class="modal-body">

                <div class="mb-3">

                    <small class="text-muted">
                        Nama Masyarakat
                    </small>

                    <h6>
                        {{ $item->order->masyarakat->nama_masyarakat ?? '-' }}
                    </h6>

                </div>

                <div class="mb-3">

                    <small class="text-muted">
                        Kategori Sampah
                    </small>

                    <h6>
                        {{ $item->order->kategori->nama_kategori ?? '-' }}
                    </h6>

                </div>

                <div class="mb-3">

                    <small class="text-muted">
                        Lokasi
                    </small>

                    <h6>
                        {{ $item->order->lokasi }}
                    </h6>

                </div>

                <div class="mb-3">

                    <small class="text-muted">
                        Catatan
                    </small>

                    <h6>
                        {{ $item->order->catatan ?? '-' }}
                    </h6>

                </div>

                <div class="mb-3">

                    <small class="text-muted">
                        Total Harga
                    </small>

                    <h5 class="text-success">

                        Rp {{ number_format($item->order->total_harga, 0, ',', '.') }}

                    </h5>

                </div>

            </div>

        </div>

    </div>

</div>

@endforeach

@endsection


@push('scripts')

<script>

$(document).ready(function () {

    $('#riwayatTable').DataTable({

        responsive: true,

        pageLength: 5,

        language: {

            search: "_INPUT_",

            searchPlaceholder: "Cari riwayat...",

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

<style>

.dataTables_filter input {

    border: 1px solid #d2d6da !important;

    border-radius: 10px !important;

    padding: 8px 12px !important;

    margin-left: 10px !important;
}

.dataTables_length select {

    border: 1px solid #d2d6da !important;

    border-radius: 10px !important;

    padding: 5px 10px !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {

    border-radius: 8px !important;

    margin: 0 3px;
}

table.dataTable thead th {

    border-bottom: none !important;
}

table.dataTable.no-footer {

    border-bottom: none !important;
}

</style>

@endpush
