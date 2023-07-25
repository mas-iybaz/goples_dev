<?php

namespace App\Http\Controllers\Siswa\Secretary;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Http\Resources\ScheduleResource;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class SecretarySchedule extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_group = auth()->user()->UserGroup->group_id;
        $schedules = Schedule::where('group_id', $user_group)->orderBy('time_start', 'desc')->get();

        $nama = auth()->user()->name;

        if ($request->ajax()) {
            return Datatables::of($schedules)->addIndexColumn()
                ->addColumn('action', function ($schedules) {
                    $btn = '<div class="row mx-auto">' .
                        '<form action="' . route("secretary.schedule.destroy", $schedules->id) . '" method="post">'
                        . @csrf_field() . '
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn-danger btn-sm p-0"><i class="mdi mdi-delete icon-sm"></i></button>
                    </form>
                    </div>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('siswa.secretary.schedule', compact(['schedules', 'nama']));
    }

    public function ajax()
    {
        $user_group = auth()->user()->UserGroup->group_id;
        $schedules = Schedule::where('group_id', $user_group)->get();

        return ScheduleResource::collection($schedules);
    }

    public function exportPdf(Request $request)
    {
        $month = $request->input('month');
        $user_group = auth()->user()->UserGroup->group_id;

        $schedules = Schedule::where('group_id', $user_group)->where('time_start', 'like', '%' . $month . '%')->get();

        $pdf = PDF::loadView('siswa.secretary.export_schedule', ['schedules' => $schedules]);
        return $pdf->stream('Jadwal' . '.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreScheduleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScheduleRequest $request)
    {
        Schedule::create([
            "group_id" => auth()->user()->UserGroup->group_id,
            "title" => $request->input('title'),
            "time_start" => $request->input('time_start'),
            "time_finish" => $request->input('time_finish'),
            "note" => $request->input('note')
        ]);

        return redirect(route('secretary.schedule.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->back();
    }
}
