@if (session('success'))
    <script>
        toastr.options = {
            "debug": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "fadeIn": 300,
            "fadeOut": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000
        }
        // toastr.options.positionClass = '';
        toastr.success("{{ session('success') }}", 'success');
    </script>
@endif

@if (session('info'))
    <script>
        toastr.info("{{ session('info') }}", 'info');
    </script>
@endif

@if (session('error'))
    <script>
        toastr.error("{{ session('error') }}", 'error');
    </script>
@endif

@if (session('warning'))
    <script>
        toastr.warning("{{ session('warning') }}", 'warning');
    </script>
@endif
