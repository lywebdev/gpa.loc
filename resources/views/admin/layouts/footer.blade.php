        </div>
    </div>
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center px-3 py-4">

            <h5 class="m-0 me-2">Настройки</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <h6 class="text-center mb-0">Выберите режим</h6>

        <div class="p-4">
            <div class="mb-2">
                <img src="{{ asset('/assets/admin/images/layouts/layout-1.png') }}" class="img-thumbnail" alt="layout-1">
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                <label class="form-check-label" for="light-mode-switch">Светлая тема</label>
            </div>

            <div class="mb-2">
                <img src="{{ asset('/assets/admin/images/layouts/layout-2.png') }}" class="img-thumbnail" alt="layout-2">
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="{{ asset('/assets/admin/css/bootstrap-dark.min.css') }}" data-appStyle="{{ asset('/assets/admin/css/app-dark.min.css') }}">
                <label class="form-check-label" for="dark-mode-switch">Тёмная тема</label>
            </div>

            <div class="mb-2">
                <img src="{{ asset('/assets/admin/images/layouts/layout-3.png') }}" class="img-thumbnail" alt="layout-3">
            </div>
            <div class="form-check form-switch mb-5">
                <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="{{ asset('/assets/admin/css/app-rtl.min.css') }}">
                <label class="form-check-label" for="rtl-mode-switch">RTL</label>
            </div>


        </div>

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{ asset('/assets/admin/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/assets/admin/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('/assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('/assets/admin/libs/node-waves/waves.min.js') }}"></script>

<!-- apexcharts js -->
<script src="{{ asset('/assets/admin/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ asset('/assets/admin/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

<!-- jquery.vectormap map -->
<script src="{{ asset('/assets/admin/libs/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('/assets/admin/libs/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

<script src="{{ asset('assets/admin/libs/tinymce/tinymce.min.js') }}"></script>

<script src="{{ asset('/assets/admin/js/pages/dashboard.init.js') }}"></script>

<!-- init js -->
<script src="{{ asset('assets/admin/js/pages/form-editor.init.js') }}"></script>
<script src="{{ asset('/assets/admin/js/pages/form-advanced.init.js') }}"></script>
<script src="{{ asset('/assets/admin/js/app.js') }}"></script>

<script src="{{ asset('assets/admin/js/components/imager.js') }}"></script>

@yield('footer_scripts')

</body>
</html>
