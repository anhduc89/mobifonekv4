<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Candidates;

class CandidatesController extends Controller
{
    private $candidates;
    public function __construct(Candidates $candidates)
    {
        $this->candidates = $candidates;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function index()
    {
        // $list_candidates = DB::select('SELECT `candidates_apply`.*, `recruitments`.`title`
        //                                 FROM `candidates_apply`
        //                                 JOIN `recruitments` ON `candidates_apply`.`vitri` = `recruitments`.`id`
        //                                 WHERE `candidates_apply`.`status` = 0')->paginate(5);
        $list_candidates =  DB::table('candidates_apply')
                            ->join('recruitments','candidates_apply.vitri','=','recruitments.id')
                            ->select('candidates_apply.*','recruitments.title')
                            ->where("candidates_apply.status",0)
                            ->paginate(5);

        $list_candidates_in =  DB::table('candidates_apply')
                                ->join('recruitments','candidates_apply.vitri','=','recruitments.id')
                                ->select('candidates_apply.*','recruitments.title')
                                ->where("candidates_apply.status",1)
                                ->paginate(5);


        $list_candidates_out = DB::table('candidates_apply')
                                ->join('recruitments','candidates_apply.vitri','=','recruitments.id')
                                ->select('candidates_apply.*','recruitments.title')
                                ->where("candidates_apply.status",2)
                                ->paginate(5);

        #echo "<pre>"; print_r($list_candidates);
        return view('admin.candidates.index', compact('list_candidates','list_candidates_in','list_candidates_out'));
    }

    public function updateCandidates(Request $request, $id)
    {
        $status = $request->status;
        $comment = $request->comment;

        try {
            DB::beginTransaction();
            $dataUpdate = array(
                'status' => $status, // $request->status,
                'comment' => $comment, // $request->comment,
            );

            $this->candidates->find($id)->update($dataUpdate);

            DB::commit();
            return redirect()->route('candidates.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            \Log::error("message " . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }
}
