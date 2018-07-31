<?php

namespace VannessPlus\Http\Controllers;
use App\Candidates;
use Illuminate\Http\Request;
use DB;

class FormController extends Controller
{
    public function create_candidate(Request $request)
    {
        //dd($request);

        //$candidate = new DB::$table('candidate_details');
        $candidate = new Candidates;

        $candidate->first_name = $request->get('first_name');
        $candidate->last_name = $request->get('last_name');
        $candidate->expected_sal = $request->get('expected_sal');
        $candidate->current_sal = $request->get('current_sal');
        $candidate->email = $request->get('email');
        $candidate->start_date = $request->get('start_date');
        $candidate->phone = $request->get('phone');
        $candidate->position = $request->get('position');

        $candidate->save();
 
    }
}
