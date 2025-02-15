<!DOCTYPE html>
<html>

<head>
    @include('backend.dashboard.component.head')
</head>

<body>
    <div id="wrapper">
        @include('backend.dashboard.component.sidebar')
        <div id="page-wrapper" class="gray-bg">
        @include('backend.dashboard.component.nav')
        @include($template)
        @include('backend.dashboard.component.footer')
        </div>
    </div>

    @include('backend.dashboard.component.script')
    @if (Session::has('message'))
<script>
    toastr.options = {
        "progressBar": true,
        "closeButton": true,
        "positionClass": "toast-top-right",
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "12000",
        "extendedTimeOut": "2000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    toastr.success("{{ Session::get('message') }}", 'Success!', {
        timeOut: 12000,
        iconClass: 'toast-success',
    });
</script>
@endif

</body>
</html>
