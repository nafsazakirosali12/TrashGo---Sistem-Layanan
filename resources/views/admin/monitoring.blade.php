@extends('layouts.app')

@section('page', 'Monitoring Order')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">

            <!-- HEEADER -->
             <div class="card-header pb-0 d-flex justify-content-between">
                <h6>Data Order</h6>
             </div>

             <!-- TABLE -->
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" style="table-layout: fixed; width:100%;">

                    <!-- THEAD -->
                     <thead>
                        <tr  style="text-align: center;">
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">ID</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masyarakat</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Kategori</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Status</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Total Harga</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tanggal</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Catatan</th>
                        </tr>
                     </thead>

                     <!-- TBODY -->
                      <tbody>
                        @forelse($orders as $order)
                        <tr style="text-align: center;">
                           <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->masyarakat->nama_masyarakat ?? '-' }}</td>
                            <td>{{ $order->kategori->nama_kategori ?? '-'}}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->total_harga }}</td>
                            <td style="white-space: normal; word-wrap: break-word; max-width: 200px;">{{ $order->tanggal_order }}</td>
                            <td style="white-space: normal; word-wrap: break-word; max-width: 200px;">
                            {{ $order->catatan ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Data belum ada</td>
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


    

    