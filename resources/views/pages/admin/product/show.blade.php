<x-admin title="Produk">
    <!-- Content area -->
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">{{ $product->name }}</h6>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset('storage/public/product/' . $product->image) }}" alt="{{ $product->name }}"
                            class="img-fluid" data-bs-popup="lightbox">
                    </div>
                    <div class="col-md-9">
                        <table class="table table-borderless">
                            <tr>
                                <th>Nama</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>{{ $product->category->name }}</td>
                            </tr>
                            <tr>
                                <th>Ukuran</th>
                                <td>{{ $product->size->size }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                {{-- <td>{{ $product->description }}</td> --}}
                                <td>{!! nl2br($product->description) !!}</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td>{{ $product->stock->quantity }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /content area -->
</x-admin>
