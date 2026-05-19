@extends('petugas.layouts_p.app_p') 
@section('page', 'Riwayat Pengangkutan')

@section('content')
<div class="container-fluid py-4">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card mb-4 mx-auto">
        <div class="card-header pb-0 d-flex justify-content-between">
          <h6>Riwayat Pengangkutan</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 text-center">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lokasi</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($riwayat_pickup as $item)
                  <tr>
                    <td><p class="text-xs font-weight-bold mb-0">{{ $loop->iteration + ($riwayat_pickup->currentPage() - 1) * $riwayat_pickup->perPage() }}</p></td>
                    <td><p class="text-xs font-weight-bold mb-0">{{ \Carbon\Carbon::parse($item->order->tanggal)->translatedFormat('d F Y') }}</p></td>
                    <td><p class="text-xs font-weight-bold mb-0">{{ $item->order->waktu }} WIB</p></td>
                    <td><p class="text-xs font-weight-bold mb-0">{{ $item->order->lokasi }}</p></td>
                    <td>
                        <span class="badge badge-sm 
                            {{ $item->status == 'complete' ? 'bg-gradient-success' : 'bg-gradient-danger' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn bg-gradient-info btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">
                        Lihat Detail
                        </button>
                    </td>
                  </tr>

                  <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="detailModalLabel{{ $item->id }}">Detail Pengangkutan #ORD-{{ $item->order->id }}</h5>
                          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start p-4">
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
                                    <span class="text-muted d-block small">Tanggal</span>
                                    <span class="fw-bold text-dark">{{ \Carbon\Carbon::parse($item->order->tanggal)->translatedFormat('d F Y') }}</span>
                                </div>
                                <div class="col-6">
                                    <span class="text-muted d-block small">Waktu</span>
                                    <span class="fw-bold text-dark">{{ $item->order->waktu }} WIB</span>
                                </div>
                            </div>
                            <div class="mb-3 border-bottom pb-2">
                                <span class="text-muted d-block small">Total Harga</span>
                                <span class="fw-bold text-success">Rp {{ number_format($item->order->total_harga, 0, ',', '.') }}</span>
                            </div>
                            <div class="mb-0">
                                <span class="text-muted d-block small">Status Pengangkutan</span>
                                <span class="badge {{ $item->status == 'complete' ? 'bg-gradient-success' : 'bg-gradient-danger' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @empty
                  <tr>
                    <td colspan="6" class="text-center py-4">Belum ada riwayat pengangkutan.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <div class="d-flex justify-content-center mt-4">
              {{ $riwayat_pickup->links('pagination::bootstrap-5') }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection