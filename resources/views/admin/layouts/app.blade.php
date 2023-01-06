@include('admin.layouts.header')

<!-- Start right Content here -->
<div class="main-content">
    <div class="row">
        <div class="col-12">
            @include('admin.components.alerts')
        </div>
    </div>
    @yield('content')

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Kulik Leonid.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Разработано с <i class="mdi mdi-heart text-danger"></i> обучающимся Я/ПИ-б-о-201 Куликом Леонидом
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->

@include('admin.layouts.footer')
