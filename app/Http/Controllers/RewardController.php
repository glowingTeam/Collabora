<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use App\Models\EventRegistModel;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function index($id)
    {
        $reward = Reward::where('event_id', $id)->get();
        return view('page/rewardList', ['rewardList' => $reward]);
    }
    public function reward($id)
    {
        $volunteer = EventRegistModel::where('event_id', $id)->get();
        foreach($volunteer as $v){
            $v->reward = 'true';
            $v->save();
        }
        return redirect ('/volunteer/showAccepted/'.$id);
    }
    public function show()
    {
        
    }
}
