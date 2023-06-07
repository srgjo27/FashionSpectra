<x-error title="Error 403">
    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Inner content -->
        <div class="content-inner">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Container -->
                <div class="flex-fill">

                    <!-- Error title -->
                    <div class="text-center mb-4">
                        <img src="{{ asset('admin/assets/images/error_bg.svg') }}" class="img-fluid mb-3" height="230"
                            alt="">
                        <h1 class="display-3 fw-semibold lh-1 mb-3">403</h1>
                        <h6 class="w-md-25 mx-md-auto">Oops, an error has occurred. <br> Access to this resource on the
                            server is denied.</h6>
                    </div>
                    <!-- /error title -->

                    <!-- Error content -->
                    <div class="text-center">
                        <a href="#" class="btn btn-primary">
                            <i class="ph-house me-2"></i>
                            Return to dashboard
                        </a>
                    </div>
                    <!-- /error wrapper -->

                </div>
                <!-- /container -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /inner content -->

    </div>
    <!-- /main content -->
</x-error>
