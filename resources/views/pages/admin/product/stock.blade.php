<x-admin title="Produk">
    <!-- Content area -->
    <div class="content">
        <!-- Basic initialization -->
        <div class="card">
            <div class="card-header d-flex align-items-center py-0">
                <h5 class="py-3 mb-0">Stok Produk</h5>
                <div class="ms-auto my-auto">
                    <!-- TODO -->
                </div>
            </div>

            <table class="table datatable-button-init-basic">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stock as $item)
                        <tr></tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                    @endforeach
            </table>
        </div>
        <!-- /basic initialization -->
    </div>
    <!-- /content area -->
</x-admin>
