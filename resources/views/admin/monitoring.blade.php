@extends('layouts.app')

@section('page', 'Monitoring Order')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">

            <!-- HEEADER -->
             <div class="card-header pb-0">
                <h6>Data Order</h6>
             </div>

             <!-- TABLE -->
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">

                    <!-- THEAD -->
                     <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Masyarakat</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Total Harga</th>
                            <th>Tanggal</th>
                            <th>Catatan</th>
                        </tr>
                     </thead>

                     <!-- TBODY -->
                      <tbody>
                        @forelse($orders as $order)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->masyarakat_id }}</td>
                            <td>{{ $order->kategori_id }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->total_harga }}</td>
                            <td>{{ $order->tanggal_order }}</td>
                            <td>{{ $order->catatan ?? '-' }}</td>
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


    

    