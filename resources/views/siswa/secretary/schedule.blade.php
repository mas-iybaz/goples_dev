@extends('siswa.layouts.master')

@section('title', 'Sekretaris | Penjadwalan')

@section('navbar')
    @include('siswa.layouts.secretary-sidebar')
@stop

@section('content')
    <div class="container">
        <button data-toggle="modal" data-target="#addSchedule" class="btn btn-primary btn-md mb-2">
            Buat Penjadwalan
        </button>

        <button data-toggle="modal" data-target="#exportSchedule" class="btn btn-info btn-md mb-2">
            Cetak Jadwal
        </button>

        <div class="card">
            <div class="card-body">
                @error('file')
                    <div class="alert alert-warning alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $errors->first() }}</strong>
                    </div>
                @enderror
                <div class="row">
                    <div class="col-12 table">
                        <table class="table table-bordered schedule_datatable" style="width: 100%;">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addSchedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Penjadwalan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('secretary.schedule.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inp_title"
                                    placeholder="mis: Rapat Bulanan" name="title" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Waktu Mulai</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" class="form-control" id="inp_time_start" name="time_start" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Waktu Selesai</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" class="form-control" id="inp_time_finish" name="time_finish" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inp_note"
                                    placeholder="mis: Online Meet" name="note" required>
                            </div>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exportSchedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Penjadwalan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('secretary.schedule.pdf') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Bulan</label>
                            <div class="col-sm-10">
                                <input type="month" class="form-control" name="month" required>
                            </div>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-printer icon-sm"></i> Cetak</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scriptHeader')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: {
                    url: '/siswa/sekretaris/schedule/ajax',
                    method: 'GET',
                },
                eventTimeFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false
                },
            });
            calendar.render();
        })
    </script>
@endsection

@section('customjs')
<script>
    $(document).ready(function() {
            var table = $('.schedule_datatable').DataTable({
                "serverSide": true,
                "processing": true,
                "ajax": {
                    "url": "{{ route('secretary.schedule.index') }}",
                    "dataType": "json",
                },
                "columns": [{
                        "data": 'id',
                        "searchable": false,
                        "orderable": false,
                        "targets": 0,
                    },
                    {
                        "data": "title"
                    },
                    {
                        "data": "time_start"
                    },
                    {
                        "data": "time_finish"
                    },
                    {
                        "data": "note"
                    },
                    {
                        "data": 'action',
                        'orderable': false,
                        'searchable': false
                    },

                ],
                order: [
                    [2, 'desc']
                ],
            });
            table.on('draw.dt', function() {
                var info = table.page.info();
                table.column(0, {
                    search: 'applied',
                    order: 'applied',
                    page: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + info.start;
                });
            });

        });
    </script>    
@endsection