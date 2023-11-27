{{-- js --}}
<script src="{{ asset('dist/assets/static/js/components/dark.js') }}"></script>
{{-- horizontal layout --}}
<script src="{{ asset('dist/assets/static/js/pages/horizontal-layout.js') }}"></script>

<script src="{{ asset('dist/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('dist/assets/compiled/js/app.js') }}"></script>


{{-- datatable --}}
<script src="{{ asset('dist/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('dist/assets/static/js/pages/simple-datatables.js') }}"></script>

{{-- tooltip --}}
<script>
    <script>
    // If you want to use tooltips in your project, we suggest initializing them globally
    // instead of a "per-page" level.
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    }, false);
</script>
</script>

{{-- modal --}}

<script src="{{ asset('dist/assets/extensions/jquery/jquery.min.js') }}"></script>

<!-- Need: Apexcharts -->
<script src="{{ asset('dist/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('dist/assets/static/js/pages/dashboard.js') }}"></script>
