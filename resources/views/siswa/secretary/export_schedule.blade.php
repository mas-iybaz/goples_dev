<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div>
        <div class="mb-4">
            <h3 class="text-center font-weight-bold">Jadwal Kegiatan Perusahaan</h3>
            <h4 class="text-center font-weight-bold">PT. Abal-abal</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="text-center font-weight-bold">
                    <tr>
                        <td>Kegiatan</td>
                        <td>Waktu Mulai</td>
                        <td>Waktu Selesai</td>
                        <td>Keterangan</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($schedules as $schedule)
                        <tr>
                            <td>{{ $schedule["title"] }}</td>
                            <td>{{ $schedule["time_start"] }}</td>
                            <td>{{ $schedule["time_finish"] }}</td>
                            <td>{{ $schedule["note"] }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>