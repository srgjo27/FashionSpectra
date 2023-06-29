<x-admin title="Produk">
    <!-- Content area -->
    <div class="content">

        <!-- Form validation -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ isset($product) ? 'Edit Produk' : 'Tambah Produk' }}</h5>
            </div>

            <form class="form-validate-jquery"
                action="{{ isset($product) ? route('auth.admin.product.update', $product->id) : route('auth.admin.product.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($product))
                    @method('PUT')
                @endif
                <div class="card-body">
                    <div class="mb-4">
                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3">Nama Produk <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" required
                                    placeholder="Nama Produk"
                                    value="{{ isset($product) ? $product->name : old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-lg-3">Kategori Produk <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select data-placeholder="Pilih kategori produk..."
                                    class="form-control form-control-select2 select @error('category_id') is-invalid @enderror"
                                    name="category_id" id="category_id" required>
                                    <option></option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ isset($product) && $product->category_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row" id="size_label" style="display: none;">
                            <label class="col-form-label col-lg-3">Ukuran Produk <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select data-placeholder="Pilih ukuran produk..."
                                    class="form-control form-control-select2 select @error('size_id') is-invalid @enderror"
                                    name="size_id" required>
                                    <option></option>
                                    @foreach ($categories as $item)
                                        @if ($item->sizes->isNotEmpty())
                                            <optgroup label="{{ $item->name }}">
                                                @foreach ($item->sizes as $size)
                                                    <option value="{{ $size->id }}"
                                                        {{ isset($product) && $product->size_id == $size->id ? 'selected' : '' }}>
                                                        {{ $size->size }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                                @error('size_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3">Deskripsi Produk <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <textarea rows="5" cols="5" name="description"
                                    class="form-control @error('description') is-invalid @enderror" required placeholder="Deskripsi produk...">{{ isset($product) ? $product->description : old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3">Jumlah <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="number" name="quantity"
                                    class="form-control @error('quantity') is-invalid @enderror" required
                                    placeholder="Masukkan jumlah produk"
                                    value="{{ isset($product) ? $product->stock->quantity : old('quantity') }}">
                                @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3">Harga <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="price"
                                    class="form-control @error('price') is-invalid @enderror" required
                                    placeholder="Masukkan harga produk"
                                    value="{{ isset($product) ? $product->price : old('price') }}">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3">Gambar <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="file" class="file-input-custom form-control" data-show-caption="true"
                                    name="image" data-show-upload="true" accept="image/*"
                                    {{ isset($product) ? '' : 'required' }}>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary"><i
                                class="ph-plus me-2"></i>{{ isset($product) ? 'Update' : 'Tambah' }}</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /form validation -->

    </div>
    <!-- /content area -->
</x-admin>

<script>
    $(document).ready(function() {
        $('.select').select2({
            minimumResultsForSearch: Infinity
        });

        $('#category_id').on('change', function() {
            if ($(this).val() == 1 || $(this).val() == 2 || $(this).val() == 3 || $(this).val() == 4 ||
                $(this).val() == 5 || $(this).val() == 8 || $(this).val() == 9 || $(this).val() == 10) {
                $('#size_label').show();
            } else {
                $('#size_label').hide();
            }
        });
    });
</script>
