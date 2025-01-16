<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender dan DataTable</title>

    <!-- Sertakan CSS untuk FullCalendar dan DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.css" rel="stylesheet" />

    <!-- Sertakan jQuery dan JS untuk DataTables dan FullCalendar -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.js"></script>
</head>
<body>

    <div style="display: flex; justify-content: space-between;">

        <!-- Kalender FullCalendar -->
        <div id="calendar" style="width: 48%;"></div>

        <!-- Tabel Jadwal -->
        <div style="width: 48%;">
            <h2>Data Jadwal</h2>
            <table id="jadwalTable" class="display">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pemweb</td>
                        <td>2025-01-15</td>
                        <td>2025-01-17</td>
                    </tr>
                    <tr>
                        <td>Seminar</td>
                        <td>2025-02-01</td>
                        <td>2025-02-03</td>
                    </tr>
                    <tr>
                        <td>Workshop</td>
                        <td>2025-03-05</td>
                        <td>2025-03-07</td>
                    </tr>
                    <tr>
                        <td>Conference</td>
                        <td>2025-04-10</td>
                        <td>2025-04-12</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <script>
        // Inisialisasi DataTables
        $(document).ready( function () {
            $('#jadwalTable').DataTable();  // Mengaktifkan DataTables untuk #jadwalTable
        });

        // Inisialisasi FullCalendar
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                events: [
                    {
                        title: 'Pemweb',
                        start: '2025-01-15',
                        end: '2025-01-17'
                    },
                    {
                        title: 'Seminar',
                        start: '2025-02-01',
                        end: '2025-02-03'
                    },
                    {
                        title: 'Workshop',
                        start: '2025-03-05',
                        end: '2025-03-07'
                    },
                    {
                        title: 'Conference',
                        start: '2025-04-10',
                        end: '2025-04-12'
                    }
                ]
            });
        });
    </script>

</body>
</html>
