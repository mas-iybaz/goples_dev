@extends('siswa.layouts.master')

@section('title', 'Pimpinan | Retensi Surat Keluar')

@section('navbar')
    @include('siswa.layouts.leader-sidebar')
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-12 table">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered inbox_retention" style="width: 100%;">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="bg-secondary">#</th>
                                    <th>No</th>
                                    <th>Nomor Surat</th>
                                    <th>Tanggal</th>

                                    <th>Perihal</th>

                                </tr>

                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection


@section('customjs')
    <script>
        function status_retention(d) {
            if (d == 1)
                return 'Ditinjau Kembali';
            else if (d == 2)
                return 'Permanen';
            else if (d == 2)
                return 'Musnah';
            else
                return 'Belum Diatur';
        }

        function format(d) {
            if (d.class == null)
                d.class = "Belum Diatur";
            if (d.sub_class == null)
                d.sub_class = "Belum Diatur";
            if (d.save_location == null)
                d.save_location = "Belum Diatur";
            if (d.active_year == null)
                d.active_year = "Belum Diatur";
            if (d.inactive_year == null)
                d.inactive_year = "Belum Diatur";

            return (
                'Klasifikasi : ' +
                d.class +
                '-' +
                d.sub_class +
                '<hr>' +
                'Lokasi Penyimpanan : ' +
                d.save_location +
                '<hr>' +
                'Tahun Aktif : ' +

                d.active_year +

                '<hr>' +
                'Tahun Inaktif : ' + d.inactive_year +

                '<hr>' +
                'Status : ' + status_retention(d.retention_status)
            );
        }

        $(document).ready(function() {
            var detailRows = [];
            var table = $('.inbox_retention').DataTable({
                "serverSide": true,
                "processing": true,
                "ajax": {
                    "url": "{{ route('outbox_retention') }}",
                    "dataType": "json",

                },

                "columns": [{

                        class: 'details-control btn-primary',
                        orderable: false,
                        data: null,
                        defaultContent: ''
                    },

                    {
                        "data": null,
                        "searchable": false,
                        "orderable": false,
                        "targets": 0,
                    },
                    {
                        "data": "outboxmail_number"
                    },
                    {
                        "data": "mail_date"
                    },
                    {
                        "data": "mail_about"
                    },

                ],
                order: [
                    [2, 'asc']
                ],

            });
            table.on('draw.dt', function() {
                var info = table.page.info();
                table.column(1, {
                    search: 'applied',
                    order: 'applied',
                    page: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + info.start;
                });
            });

            $('.inbox_retention tbody').on('click', 'tr td.details-control', function() {
                var tr = $(this).closest('tr');
                var row = table.row(tr);
                var idx = detailRows.indexOf(tr.attr('id'));

                if (row.child.isShown()) {
                    tr.removeClass('details');
                    row.child.hide();

                    // Remove from the 'open' array
                    detailRows.splice(idx, 1);
                } else {
                    tr.addClass('details');
                    row.child(format(row.data())).show();

                    // Add to the 'open' array
                    if (idx === -1) {
                        detailRows.push(tr.attr('id'));
                    }
                }
            });

            table.on('draw', function() {
                detailRows.forEach(function(id, i) {
                    $('#' + id + ' td.details-control').trigger('click');
                });
            });

        });
    </script>




@endsection
