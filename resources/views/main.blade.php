<!DOCTYPE html>
<html lang="en">
    @include('_partials.head')

    <body class="bg-gray-200">
        @include('_partials.sidebar')
        @include('_partials.navbar')
        <main class="ml-52 pt-10 mr-8">
            @yield('content')
        </main>
        @include('_partials.footer')
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    </body>
    <script>
        $(document).ready(function() {

            var table = $('#example').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>

</html>
