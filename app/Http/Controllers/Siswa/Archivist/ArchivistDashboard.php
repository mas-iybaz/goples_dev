<?php

namespace App\Http\Controllers\Siswa\Archivist;

use App\Models\Autograph;
use App\Models\UserGroup;
use App\Models\OutboxMail;
use App\Models\MailConcept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ArchivistDashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $group_id = UserGroup::select('group_id')->where('user_id', Auth::id())

            ->first();
        $data = [
            'concept_total' => MailConcept::where('group_id', $group_id->group_id)
                ->select(DB::raw('count(*) as total '))
                ->join('users', 'users.id', '=', 'mail_concepts.user_id')
                ->join('groups', 'groups.id', '=', 'mail_concepts.group_id')
                ->first(),
            'mail_correct' => OutboxMail::select('mail_corrections.status_koreksi', DB::raw('count(DISTINCT(mail_corrections.outbox_mail_id)) as total'))
                ->join('groups', 'groups.id', '=', 'outbox_mails.group_id')
                ->join('users', 'users.id', '=', 'outbox_mails.user_id')
                ->join('mail_corrections', 'mail_corrections.outbox_mail_id', '=', 'outbox_mails.id')
                ->where('group_id', $group_id->group_id)
                ->having('status_koreksi', 0)
                ->groupBy('status_koreksi')
                ->first(),
            'autograph' => OutboxMail::select(DB::raw('count(*) as total '))
                ->leftjoin('classifications', 'classifications.id', '=', 'classification_id')
                ->join('groups', 'groups.id', '=', 'outbox_mails.group_id')
                ->join('users', 'users.id', '=', 'outbox_mails.user_id')
                ->where('autograph_status', '0')
                ->where('outbox_mails.group_id', $group_id->group_id)->first()

        ];

        return view('siswa.archivist.dashboard')->with('data', $data)
            ->with('nama', auth()->user()->name);;
    }

    public function classification(Request $request)
    {
        if ($request->ajax()) {
            $group_id = UserGroup::select('group_id')->where('user_id', Auth::id())->first();
            $data = Classification::select('classifications.*')
                // ->groupBy('classifications.class')
                ->orderBy('id', 'asc')
                ->where('group_id', $group_id->group_id)
                ->get();

            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<div class="row mx-auto">' .
                        '<button data-toggle="modal"  onclick="getclick_2(' . $data->id . ')"data-target="#editKlasifikasi" id="edit_button" class=" btn btn-primary p-0">
                    <i class="mdi mdi-lead-pencil icon-sm"></i></button>' .

                        '<form action="' . route("delete_classification", $data->id) . '" method="post">' .
                        @csrf_field() . '
            <button type="submit"   class="  btn-danger btn-sm p-0">
            <i class="mdi mdi-delete icon-sm"></button></form>' .
                        '</div>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('siswa.archivist.classification')->with('nama', auth()->user()->name);
    }
}
