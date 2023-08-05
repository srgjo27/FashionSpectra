<x-admin title="Produk">
    <!-- Content area -->
    <div class="content">
        <!-- Basic initialization -->
        <div class="card">
            <div class="card-header d-flex align-items-center py-0">
                <h5 class="py-3 mb-0">Daftar Produk</h5>
                <div class="ms-auto my-auto">
                    <a href="{{ route('auth.admin.product.create') }}" class="btn btn-primary btn-sm rounded-pill"><i
                            class="ph-plus me-2"></i>Tambah
                        Produk</a>
                </div>
            </div>

            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#clothing-tab1" class="nav-link active" data-bs-toggle="tab">Pakaian
                        Pria</a></li>
                <li class="nav-item"><a href="#clothing-tab2" class="nav-link" data-bs-toggle="tab">Celana Pria</a></li>
                <li class="nav-item"><a href="#clothing-tab3" class="nav-link" data-bs-toggle="tab">Pakaian Wanita</a>
                </li>
                <li class="nav-item"><a href="#clothing-tab4" class="nav-link" data-bs-toggle="tab">Celana/Rok
                        Wanita</a></li>
                <li class="nav-item"><a href="#clothing-tab5" class="nav-link" data-bs-toggle="tab">Pakaian
                        Anak-anak</a></li>
                <li class="nav-item"><a href="#clothing-tab6" class="nav-link" data-bs-toggle="tab">Pakaian Bayi</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="clothing-tab1">
                    <table class="table datatable-button-init-basic">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th style="width: 25%">Nama Produk</th>
                                <th>Ukuran</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; ?>
                            @foreach ($products as $item)
                                @if ($item->category_id == 2)
                                    {{-- Only display data with category ID --}}
                                    <tr>
                                        <td>{{ $counter }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->size->size }}</td>
                                        <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td><img src="{{ asset('storage/public/product/' . $item->image) }}"
                                                alt="{{ $item->image }}" data-bs-popup="lightbox" class="img-preview">
                                        </td>
                                        <td>
                                            @if ($item->stock->quantity <= 15)
                                                <span class="text-warning">{{ $item->stock->quantity }}</span>
                                            @else
                                                <span>{{ $item->stock->quantity }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->stock->quantity <= 15)
                                                <span class="badge bg-danger">Tidak Tersedia</span>
                                            @else
                                                <span class="badge bg-success">Tersedia</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('auth.admin.product.edit', $item->id) }}"
                                                class="text-primary m-6"><i class="ph-pencil"></i></a>
                                            <form id="form_delete"
                                                action="{{ route('auth.admin.product.delete', $item->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-link text-danger btn-delete"><i
                                                        class="ph-trash danger" id="btn_delete"></i></button>
                                            </form>
                                            <a href="{{ route('auth.admin.product.show', $item->id) }}"
                                                class="text-success m-6"><i class="ph-eye"></i></a>
                                        </td>
                                    </tr>
                                    <?php $counter++; ?>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="clothing-tab2">
                    <table class="table datatable-button-init-basic">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th style="width: 25%">Nama Produk</th>
                                <th>Ukuran</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; ?>
                            @foreach ($products as $item)
                                @if ($item->category_id == 4)
                                    {{-- Only display data with category ID --}}
                                    <tr>
                                        <td>{{ $counter }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->size->size }}</td>
                                        <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td><img src="{{ asset('storage/public/product/' . $item->image) }}"
                                                alt="{{ $item->image }}" data-bs-popup="lightbox" class="img-preview">
                                        </td>
                                        <td>
                                            @if ($item->stock->quantity <= 15)
                                                <span class="badge bg-danger">Tidak Tersedia</span>
                                            @else
                                                <span class="badge bg-success">Tersedia</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('auth.admin.product.edit', $item->id) }}"
                                                class="text-primary m-6"><i class="ph-pencil"></i></a>
                                            <form action="{{ route('auth.admin.product.delete', $item->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger"><i
                                                        class="ph-trash danger"></i></button>
                                            </form>
                                            <a href="{{ route('auth.admin.product.show', $item->id) }}"
                                                class="text-success m-6"><i class="ph-eye"></i></a>
                                        </td>
                                    </tr>
                                    <?php $counter++; ?>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="clothing-tab3">
                    <table class="table datatable-button-init-basic">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th style="width: 25%">Nama Produk</th>
                                <th>Ukuran</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; ?>
                            @foreach ($products as $item)
                                @if ($item->category_id == 1)
                                    {{-- Only display data with category ID --}}
                                    <tr>
                                        <td>{{ $counter }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->size->size }}</td>
                                        <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td><img src="{{ asset('storage/public/product/' . $item->image) }}"
                                                alt="{{ $item->image }}" data-bs-popup="lightbox" class="img-preview">
                                        </td>
                                        <td>
                                            @if ($item->stock->quantity <= 15)
                                                <span class="badge bg-danger">Tidak Tersedia</span>
                                            @else
                                                <span class="badge bg-success">Tersedia</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('auth.admin.product.edit', $item->id) }}"
                                                class="text-primary m-6"><i class="ph-pencil"></i></a>
                                            <form action="{{ route('auth.admin.product.delete', $item->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger"><i
                                                        class="ph-trash danger"></i></button>
                                            </form>
                                            <a href="{{ route('auth.admin.product.show', $item->id) }}"
                                                class="text-success m-6"><i class="ph-eye"></i></a>
                                        </td>
                                    </tr>
                                    <?php $counter++; ?>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="clothing-tab4">
                    <table class="table datatable-button-init-basic">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th style="width: 25%">Nama Produk</th>
                                <th>Ukuran</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; ?>
                            @foreach ($products as $item)
                                @if ($item->category_id == 3)
                                    {{-- Only display data with category ID --}}
                                    <tr>
                                        <td>{{ $counter }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->size->size }}</td>
                                        <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td><img src="{{ asset('storage/public/product/' . $item->image) }}"
                                                alt="{{ $item->image }}" data-bs-popup="lightbox"
                                                class="img-preview">
                                        </td>
                                        <td>
                                            @if ($item->stock->quantity <= 15)
                                                <span class="badge bg-danger">Tidak Tersedia</span>
                                            @else
                                                <span class="badge bg-success">Tersedia</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('auth.admin.product.edit', $item->id) }}"
                                                class="text-primary m-6"><i class="ph-pencil"></i></a>
                                            <form action="{{ route('auth.admin.product.delete', $item->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger"><i
                                                        class="ph-trash danger"></i></button>
                                            </form>
                                            <a href="{{ route('auth.admin.product.show', $item->id) }}"
                                                class="text-success m-6"><i class="ph-eye"></i></a>
                                        </td>
                                    </tr>
                                    <?php $counter++; ?>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="clothing-tab5">
                    <table class="table datatable-button-init-basic">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th style="width: 25%">Nama Produk</th>
                                <th>Ukuran</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; ?>
                            @foreach ($products as $item)
                                @if ($item->category_id == 5)
                                    {{-- Only display data with category ID --}}
                                    <tr>
                                        <td>{{ $counter }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->size->size }}</td>
                                        <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td><img src="{{ asset('storage/public/product/' . $item->image) }}"
                                                alt="{{ $item->image }}" data-bs-popup="lightbox"
                                                class="img-preview">
                                        </td>
                                        <td>
                                            @if ($item->stock->quantity <= 15)
                                                <span class="badge bg-danger">Tidak Tersedia</span>
                                            @else
                                                <span class="badge bg-success">Tersedia</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('auth.admin.product.edit', $item->id) }}"
                                                class="text-primary m-6"><i class="ph-pencil"></i></a>
                                            <form action="{{ route('auth.admin.product.delete', $item->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger"><i
                                                        class="ph-trash danger"></i></button>
                                            </form>
                                            <a href="{{ route('auth.admin.product.show', $item->id) }}"
                                                class="text-success m-6"><i class="ph-eye"></i></a>
                                        </td>
                                    </tr>
                                    <?php $counter++; ?>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="clothing-tab6">
                    <table class="table datatable-button-init-basic">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th style="width: 25%">Nama Produk</th>
                                <th>Ukuran</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; ?>
                            @foreach ($products as $item)
                                @if ($item->category_id == 6)
                                    {{-- Only display data with category ID --}}
                                    <tr>
                                        <td>{{ $counter }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->size->size }}</td>
                                        <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td><img src="{{ asset('storage/public/product/' . $item->image) }}"
                                                alt="{{ $item->image }}" data-bs-popup="lightbox"
                                                class="img-preview">
                                        </td>
                                        <td>
                                            @if ($item->stock->quantity <= 15)
                                                <span class="badge bg-danger">Tidak Tersedia</span>
                                            @else
                                                <span class="badge bg-success">Tersedia</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('auth.admin.product.edit', $item->id) }}"
                                                class="text-primary m-6"><i class="ph-pencil"></i></a>
                                            <form action="{{ route('auth.admin.product.delete', $item->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger"><i
                                                        class="ph-trash danger"></i></button>
                                            </form>
                                            <a href="{{ route('auth.admin.product.show', $item->id) }}"
                                                class="text-success m-6"><i class="ph-eye"></i></a>
                                        </td>
                                    </tr>
                                    <?php $counter++; ?>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /basic initialization -->
    </div>
    <!-- /content area -->
</x-admin>

<script>
    $(document).ready(function() {
        $(".btn-delete").click(function() {
            var form = $('#form_delete');
            var url = form.attr('action');
            var method = form.attr('method');
            var btn_submit = $(this);

            swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak, batalkan!',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                }
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: url,
                        method: method,
                        data: form.serialize(),
                        beforeSend: function() {
                            btn_submit.attr('disabled', true);
                            btn_submit.html('<i class="ph-spin ph-refresh"></i>');
                        },
                        success: function(response) {
                            btn_submit.attr('disabled', false);
                            btn_submit.html('<i class="ph-trash danger"></i>');
                            swal.fire({
                                icon: 'success',
                                title: response.status,
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            btn_submit.attr('disabled', false);
                            btn_submit.html('<i class="ph-trash danger"></i>');
                            swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Data gagal dihapus 🥵',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swal.fire({
                        icon: 'info',
                        title: 'Dibatalkan',
                        text: 'Data Anda aman 🫡',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
    });
</script>
