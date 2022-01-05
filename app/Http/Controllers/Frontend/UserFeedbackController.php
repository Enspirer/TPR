<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\AgentRequest;
use App\Models\Auth\User;
use App\Models\UserFeedback;
use DataTables;

class UserFeedbackController extends Controller
{
    
    public function user_experience(request $request)
    {
        // dd($request);

        $add = new UserFeedback;

        $add->stars = $request->note;
        $add->comment_question = $request->comment_question;
        $add->buyer_seller = $request->buyer_seller;
        $add->stage_property = $request->stage_property;
        $add->topic = $request->topic;
        $add->status = 'Pending';

        $add->save();

        return back()->with([
            'feedback_success' => 'feedback_success'
        ]);   
        
    }

    public function suggestion(request $request)
    {
        // dd($request);

        $add = new UserFeedback;

        $add->stars = $request->note;
        $add->suggestion = $request->suggestion;
        $add->buyer_seller = $request->buyer_seller;
        $add->stage_property = $request->stage_property;
        $add->topic = $request->topic;
        $add->status = 'Pending';

        $add->save();

        return back()->with([
            'feedback_success' => 'feedback_success'
        ]);   
        
    }

    public function technical_problem(request $request)
    {
        // dd($request);

        $add = new UserFeedback;

        $add->stars = $request->note;
        $add->issues = $request->issues;
        $add->provided_details = $request->provided_details;
        $add->buyer_seller = $request->buyer_seller;
        $add->stage_property = $request->stage_property;
        $add->topic = $request->topic;
        $add->status = 'Pending';

        $add->save();

        return back()->with([
            'feedback_success' => 'feedback_success'
        ]);   
        
    }

    
    public function general_problems(request $request)
    {
        // dd($request);

        $add = new UserFeedback;

        $add->stars = $request->note;
        $add->comment_question = $request->comment_question;
        $add->buyer_seller = $request->buyer_seller;
        $add->stage_property = $request->stage_property;
        $add->topic = $request->topic;
        $add->status = 'Pending';

        $add->save();

        return back()->with([
            'feedback_success' => 'feedback_success'
        ]);   
        
    }

}
