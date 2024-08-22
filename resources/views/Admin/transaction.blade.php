<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Transactions |SAVOIR PLUS CONSEIL</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light" style="background-color: #191E37;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('image/logo.png') }}" height="80" width="80" class="mr-2"
                    style="object-fit: contain;" alt="logo de SAVPLUS CONSEIL">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <!-- Placez vos éléments de menu gauche ici -->
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                            style="color: white;"> 
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/">{{ __('Accueil') }}</a>
                            <a class="dropdown-item" href="{{ route('articles.edit') }}"
                                style="color: #191E37;">{{ __('Articles') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                style="color: #191E37;">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center"><strong>TRANSACTIONS EFFECTUEES</strong></h1>
        <hr>
        <table id="transactionTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Nom de client</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Montant</th>
                    <th>Statut</th>
                    <th>Moyen de payement</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->name }}</td>
                        <td>{{ $transaction->email }}</td>
                        <td>{{ $transaction->phone }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->status }}</td>
                        <td>{{ $transaction->payment_method }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#transactionTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

            // Ajout de l'input pour la sélection des dates
            $('#transactionTable thead tr').clone(true).appendTo('#transactionTable thead');
            $('#transactionTable thead tr:eq(1) th').each(function(i) {
                if (i === 0) { // Colonne de la date
                    $(this).html('<input type="text" id="dateFilter" placeholder="Filtrer par date" />');
                } else {
                    $(this).html('');
                }
            });

            // Initialisation de Date Range Picker
            $('#dateFilter').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('#dateFilter').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format(
                    'YYYY-MM-DD'));
                table.draw();
            });

            $('#dateFilter').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                table.draw();
            });

            // Filtre de date pour DataTables
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = $('#dateFilter').data('daterangepicker').startDate;
                    var max = $('#dateFilter').data('daterangepicker').endDate;
                    var date = moment(data[0]); // Date dans la première colonne

                    if (
                        (min === null && max === null) ||
                        (min === null && date <= max) ||
                        (min <= date && max === null) ||
                        (min <= date && date <= max)
                    ) {
                        return true;
                    }
                    return false;
                }
            );
        });
    </script>
</body>

</html>
