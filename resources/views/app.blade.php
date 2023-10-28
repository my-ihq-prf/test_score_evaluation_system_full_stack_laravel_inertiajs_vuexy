<!DOCTYPE html>
<html class="light-layout" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <link rel="shortcut icon" type="image/x-icon" href="tpl_0/app-assets/images/ico/favicon.ico">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
          rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="tpl_0/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css"
          href="tpl_0/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
          href="tpl_0/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css">
    <link rel="stylesheet" type="text/css"
          href="tpl_0/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="tpl_0/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="tpl_0/app-assets/vendors/css/forms/select/select2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="tpl_0/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="tpl_0/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="tpl_0/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="tpl_0/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="tpl_0/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="tpl_0/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="tpl_0/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="tpl_0/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="tpl_0/app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="tpl_0/app-assets/css/pages/app-invoice-list.css">
    <link rel="stylesheet" type="text/css" href="tpl_0/app-assets/css/pages/app-invoice.css">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="tpl_0/assets/css/style.css">
    <!-- END: Custom CSS-->

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>
<body
    class="font-sans antialiased pace-done vertical-layout vertical-menu-modern navbar-floating footer-static menu-expanded"

    data-framework="laravel"
    data-asset-path="tpl_0/app-assets/"

>
@inertia

<!-- BEGIN: Vendor JS-->
<script src="tpl_0/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="tpl_0/app-assets/vendors/js/extensions/moment.min.js"></script>
<script src="tpl_0/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>

<script src="tpl_0/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="tpl_0/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
<script src="tpl_0/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
<script src="tpl_0/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="tpl_0/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>

<script src="tpl_0/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
<script src="tpl_0/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="tpl_0/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>

<!-- END: Page Vendor JS-->

</body>
</html>
