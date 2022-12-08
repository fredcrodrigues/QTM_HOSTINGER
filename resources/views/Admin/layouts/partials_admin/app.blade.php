<!doctype html>
<html class="no-js" lang="pt">
@section('htmlheader')
@include('Admin.layouts.partials_admin.htmlheader')
  @yield('links_adicionais')
@show

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('Admin.layouts.partials_admin.menu_navbar')
        @include('Admin.layouts.partials_admin.menu_sidebar')

        @yield('conteudo')


    </div>
    @include('Admin.layouts.partials_admin.footer')

    @section('scripts')
       @include('Admin.layouts.partials_admin.scripts')
    @show

    @yield('scripts_adicionais')
</body>

</html>
