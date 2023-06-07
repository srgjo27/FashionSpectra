<x-auth title="Registration">
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Inner content -->
        <div class="content-inner">
            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">
                <!-- Registration form -->
                <form action="{{ route('do_register') }}" class="flex-fill" method="POST">
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
                                        <label class="form-label">Nama</label>
                                        <div class="form-control-feedback form-control-feedback-start">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Nama Lengkap">
                                            <div class="form-control-feedback-icon">
                                                <i class="ph-user-circle text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <div class="form-control-feedback form-control-feedback-start">
                                            <input type="text" class="form-control" name="username"
                                                placeholder="Username">
                                            <div class="form-control-feedback-icon">
                                                <i class="ph-user-circle text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <div class="form-control-feedback form-control-feedback-start">
                                                    <input type="password" class="form-control" name="password"
                                                        placeholder="•••••••••••">
                                                    <div class="form-control-feedback-icon">
                                                        <i class="ph-lock text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Konfirmasi Password</label>
                                                <div class="form-control-feedback form-control-feedback-start">
                                                    <input type="password" class="form-control" name="confirm_password"
                                                        placeholder="•••••••••••">
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
                                                <label class="form-label">Email</label>
                                                <div class="form-control-feedback form-control-feedback-start">
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="example@mail.com">
                                                    <div class="form-control-feedback-icon">
                                                        <i class="ph-at text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Konfirmasi Email</label>
                                                <div class="form-control-feedback form-control-feedback-start">
                                                    <input type="email" class="form-control" name="confirm_email"
                                                        placeholder="example@mail.com">
                                                    <div class="form-control-feedback-icon">
                                                        <i class="ph-at text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="form-check">
                                            <input type="checkbox" name="remember" class="form-check-input">
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
