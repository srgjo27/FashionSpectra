<x-auth title="Registration">
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Inner content -->
        <div class="content-inner">
            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">
                <!-- Registration form -->
                <form action="{{ route('do_register') }}" class="flex-fill needs-validation" method="POST" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                                            <img src="{{ asset('admin/assets/images/logo_icon.svg') }}" class="h-48px"
                                                alt="">
                                        </div>
                                        <h5 class="mb-0">{{ config('app.name') }}</h5>
                                        <span class="d-block text-muted">Belanja Aman, Murah dan Terpercaya</span>
                                        <span class="px-2">Sudah punya akun?</span><a
                                            href="{{ route('login') }}">Masuk</a>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nama <span class="text-danger">*</span></label>
                                        <div class="form-control-feedback form-control-feedback-start">
                                            <input type="text"
                                                class="form-control @error('name') is-invalid  @enderror" name="name"
                                                placeholder="Nama Lengkap" required value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-feedback-icon">
                                                <i class="ph-user-circle text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Username <span class="text-danger">*</span></label>
                                        <div class="form-control-feedback form-control-feedback-start">
                                            <input type="text"
                                                class="form-control @error('username') is-invalid  @enderror"
                                                name="username" placeholder="Username" required
                                                value="{{ old('username') }}">
                                            @error('username')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-feedback-icon">
                                                <i class="ph-user-circle text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-control-feedback form-control-feedback-start">
                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid  @enderror"
                                                        name="password" placeholder="•••••••••••" required>
                                                    @error('password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    <div class="form-control-feedback-icon">
                                                        <i class="ph-lock text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Konfirmasi Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-control-feedback form-control-feedback-start">
                                                    <input type="password"
                                                        class="form-control @error('confirm_password') is-invalid  @enderror"
                                                        name="confirm_password" placeholder="•••••••••••" required>
                                                    @error('confirm_password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    <div class="form-control-feedback-icon">
                                                        <i class="ph-lock text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Email <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-control-feedback form-control-feedback-start">
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid  @enderror"
                                                        name="email" placeholder="example@mail.com" required
                                                        value="{{ old('email') }}">
                                                    @error('email')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    <div class="form-control-feedback-icon">
                                                        <i class="ph-at text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Konfirmasi Email <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-control-feedback form-control-feedback-start">
                                                    <input type="email"
                                                        class="form-control @error('confirm_email') is-invalid  @enderror"
                                                        name="confirm_email" placeholder="example@mail.com" required
                                                        value="{{ old('confirm_email') }}">
                                                    @error('confirm_email')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    <div class="form-control-feedback-icon">
                                                        <i class="ph-at text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="form-check">
                                            <input type="checkbox" name="accept" id="accept"
                                                class="form-check-input">
                                            <span class="form-check-label">Setuju <a href="#">&nbsp;ketentuan
                                                    layanan</a></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="card-body text-end border-top">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ph-plus me-2"></i>
                                        Daftar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /registration form -->
            </div>
            <!-- /content area -->
        </div>
        <!-- /inner content -->
    </div>
    <!-- /main content -->
</x-auth>

<script>
    // TODO
</script>
