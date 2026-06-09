@extends('layouts.app')

@section('page', 'Monitor Pesanan')

@section('content')


<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">

            <!-- HEEADER -->
             <div class="card-header pb-0 d-flex justify-content-between">
                <h6>Data Pesanan</h6>
             </div>

             <!-- TABLE -->
              <div class="card-body px-4 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="myTable" class="table align-items-center mb-0">

                    <!-- THEAD -->
                     <thead>
                        <tr  style="text-align: center;">
                            <th style="width: 40px;" class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
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
                        @forelse($dataOrders as $order)
                        <tr>
                           <td class="text-center"></td>
                            <td class="text-center">{{ $order->id }}</td>
                            <td>{{ $order->masyarakat->nama_masyarakat ?? '-' }}</td>
                            <td class="text-center">{{ $order->kategori->nama_kategori ?? '-'}}</td>
                            <td class="text-center">
                            {{
                            $order->status == 'pending' ? 'Menunggu' :
                            ($order->status == 'processing' ? 'Diproses' :
                            ($order->status == 'completed' ? 'Selesai' : $order->status))
                            }}
                            </td>
                            <td class="text-center">{{ $order->total_harga }}</td>
                            <td class="text-center" style="white-space: normal; word-wrap: break-word; max-width: 200px;">
                            {{ \Carbon\Carbon::parse($order->tanggal)->locale('id')->translatedFormat('d F Y') }}
                            </td>
                            <td class="text-center" style="white-space: normal; word-wrap: break-word; max-width: 200px;">
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

<link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.css" />

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/columncontrol/1.1.0/js/dataTables.columnControl.min.js"></script>
<script>
$(document).ready(function () {
    let table = $('#myTable').DataTable({
        order: [[6, 'desc']],

        language: {
            lengthMenu: "Tampilkan _MENU_ data",
            zeroRecords: "Data tidak ditemukan",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "Data kosong",
            infoFiltered: "(difilter dari _MAX_ total data)",
            search: "Cari:",
            paginate: {
                first: "Awal",
                last: "Akhir",
                next: "Selanjutnya",
                previous: "Sebelumnya"
            }
        }
    });
    table.on('order.dt search.dt', function () {
        table.column(0, { search: 'applied', order: 'applied' })
            .nodes()
            .each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
    }).draw();
});
</script>

<style>

/* SEARCH CONTAINER */
div.dt-container .dt-search input {
    border: 1px solid #d2d6da !important;
    border-radius: 10px !important;
    padding: 6px 12px !important;
    transition: 0.3s !important;
    margin-left: 8px !important;
}

/* SAAT FOCUS */
div.dt-container .dt-search input:focus {
    border-color: #5e72e4 !important;
    box-shadow: 0 0 8px #9acd32!important;
    outline: none !important;
}


/* PAGINATION */
div.dt-container .dt-paging .dt-paging-button {
    border-radius: 8px !important;
    margin: 0 3px !important;
    transition: 0.2s !important;
}

/* ACTIVE PAGINATION */
div.dt-container .dt-paging .dt-paging-button.current {
    background: #9acd32 !important;
    color: white !important;
    border: none !important;
}

/* HOVER */
div.dt-container .dt-paging .dt-paging-button:hover {
    background: #e9ecff !important;
    color: #9acd32 !important;
    border: none !important;
}

/* DROPDOWN */
div.dt-container .dt-length select {
    border: 1px solid #d2d6da !important;
    border-radius: 10px !important;
    padding: 5px 10px !important;
    background-color: white !important;
    color: #344767 !important;
}

/* OPTION */
div.dt-container .dt-length select option {
    background-color: white !important;
    color: #344767 !important;
}

#myTable thead th {
    text-align: center !important;
}

</style>

@endsection  