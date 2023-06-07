<x-auth title="Login">
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Inner content -->
        <div class="content-inner">
            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">
                <!-- Login card -->
                <form class="login-form needs-validation" method="POST" action="{{ route('do_login') }}" novalidate>
                    @csrf
                    <div class="card mb-0">
                        <div class="card-body">
                            @if ($errors->has('login_error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('login_error') }}
                                </div>
                            @endif
                            <div class="text-center mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                                    <img src="{{ asset('admin/assets/images/logo_icon.svg') }}" class="h-48px"
                                        alt="">
                                </div>
                                <h5 class="mb-0">{{ config('app.name') }}</h5>
                                <span class="d-block text-muted">Belanja Aman, Murah dan Terpercaya</span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Username/Email <span class="text-danger">*</span></label>
                                <div class="form-control-feedback form-control-feedback-start">
                                    <input type="text"
                                        class="form-control @error('username_or_email') is-invalid  @enderror"
                                        name="username_or_email" required placeholder="username/email"
                                        value="{{ old('username_or_email') }}">
                                    @error('username_or_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-control-feedback-icon">
                                        <i class="ph-user-circle text-muted"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                <div class="form-control-feedback form-control-feedback-start">
                                    <div class="input-group">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid  @enderror" id="password"
                                            name="password" required placeholder="•••••••••••">
                                        <span class="input-group-text bg-transparent border-1" id="togglePassword">
                                            <i class="ph-eye"></i>
                                        </span>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-control-feedback-icon">
                                        <i class="ph-lock text-muted"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <a href="#" class="ms-auto">Dapatkan password?</a>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100"
                                    onclick="startValidation(event)">Masuk</button>
                            </div>

                            <div class="text-center text-muted content-divider mb-3">
                                <span class="px-2">Belum punya akun?</span>
                            </div>

                            <div class="mb-3">
                                <a href="{{ route('register.page') }}" class="btn btn-light w-100">Mendaftar</a>
                            </div>

                            <span class="form-text text-center text-muted">Dengan melanjutkan, Anda mengonfirmasi bahwa
                                Anda telah membaca <a href="#">Syarat &amp; Ketentuan</a> dan <a
                                    href="#">Kebijakan Cookie</a></span>
                        </div>
                    </div>
                </form>
                <!-- /login card -->
            </div>
            <!-- /content area -->
        </div>
        <!-- /inner content -->
    </div>
    <!-- /main content -->
</x-auth>

<script>
    function startValidation(event) {
        event.preventDefault();
        var button = document.querySelector('.login-form button');
        button.innerHTML = '<span ' +
            'class="spinner-border spinner-border-sm spin-animation" role="status" aria-hidden="true"></span>&nbsp; Loading...';
        button.classList.add('disabled');

        setTimeout(function() {
            document.querySelector('.login-form').submit();
        }, getRandomDelay());
    }

    function getRandomDelay() {
        // Generate a random delay between 5 and 10 seconds (in milliseconds)
        return Math.floor(Math.random() * 5000) + 5000;
    }

    document.getElementById("togglePassword").addEventListener("click", function() {
        var passwordInput = document.getElementById("password");
        var type = passwordInput.getAttribute("type");
        if (type === "password") {
            passwordInput.setAttribute("type", "text");
        } else {
            passwordInput.setAttribute("type", "password");
        }
    });
</script>
