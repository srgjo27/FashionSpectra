<x-admin title="Produk">
    <!-- Content area -->
    <div class="content">
        <!-- Form validation -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ isset($product) ? 'Edit Produk' : 'Tambah Produk' }}</h5>
            </div>
            <form id="form_input"
                action="{{ isset($product) ? route('auth.admin.product.update', $product->id) : route('auth.admin.product.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($product))
                    @method('PUT')
                @endif
                <div class="card-body">
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <div class="mb-4">
                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3">Nama Produk <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="name" class="form-control" placeholder="Nama Produk"
                                    value="{{ isset($product) ? $product->name : old('name') }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-lg-3">Kategori Produk <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select data-placeholder="--Pilih kategori produk--" class="form-control select"
                                    name="category_id" id="category_id">
                                    <option></option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ isset($product) && $product->category_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row" id="size_label" style="display: none;">
                            <label class="col-form-label col-lg-3">Ukuran Produk <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select data-placeholder="--Pilih ukuran produk--" class="form-control select"
                                    name="size_id" id="size_id">
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3">Deskripsi Produk <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <textarea rows="5" cols="5" name="description" class="form-control" placeholder="Deskripsi produk...">{{ isset($product) ? $product->description : old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3">Jumlah <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="number" name="quantity" class="form-control"
                                    placeholder="Masukkan jumlah produk"
                                    value="{{ isset($product) ? $product->stock->quantity : old('quantity') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3">Harga <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="price" class="form-control"
                                    placeholder="Masukkan harga produk"
                                    value="{{ isset($product) ? $product->price : old('price') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3">Gambar <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="file" class="file-input-custom form-control" data-show-caption="true"
                                    name="image" data-show-upload="true" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-submit" id="btn_submit">
                            <i class="ph-plus me-2"></i>{{ isset($product) ? 'Update' : 'Tambah' }}</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /form validation -->
    </div>
    <!-- /content area -->
</x-admin>

<script>
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

    $('#category_id').on('change', function() {
        var category_id = $(this).val();
        console.log(category_id);
        if (category_id) {
            $.ajax({
                url: 'create/' + category_id,
                type: "GET",
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if (data) {
                        $('#size_id').empty();
                        $('#size_id').append('<option value="">--Pilih ukuran produk--</option>');
                        $.each(data, function(key, value) {
                            $('select[name="size_id"]').append('<option value="' + value
                                .id +
                                '">' + value.size + '</option>');
                        });
                    } else {
                        $('#size_id').empty();
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        } else {
            $('#size_id').empty();
        }
    });

    $('.btn-submit').click(function() {
        var form = $('#form_input');
        var formData = new FormData(form[0]);
        var url = form.attr('action');
        var method = form.attr('method');
        var btn_submit = $(this);
        var btn_submit_html = btn_submit.html();

        $.ajax({
            url: url,
            method: method,
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                btn_submit.attr('disabled', true);
                btn_submit.html(
                    '<i class="ph-spinner ph-spin"></i>&nbsp;<span>Loading...</span>');
            },
            success: function(data) {
                btn_submit.attr('disabled', false);
                btn_submit.html(btn_submit_html);
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    html: data.message,
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "{{ route('auth.admin.product-clothes') }}";
                });
            },
            error: function(xhr, status, error) {
                btn_submit.attr('disabled', false);
                btn_submit.html(btn_submit_html);
                var err = eval("(" + xhr.responseText + ")");
                var msg = '';
                if (err.errors) {
                    $.each(err.errors, function(key, value) {
                        msg += value + '<br/>';
                    });
                } else {
                    msg = err.message;
                }
                Swal.fire({
                    icon: 'error',
                    toast: true,
                    html: msg,
                    showConfirmButton: false,
                    position: 'top-end'
                });
            }
        });
    });
</script>
