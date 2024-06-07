<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    // use HasFactory;  

    // CRUD Functions

    public function index()
    {
        
    }

    public function showByEvent($id){
        $ratings = Rating::where('event_id',$id)->get();
        return view('page.ratingList',['ratings'=>$ratings]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'star' => 'required',
            'feedback' => 'required',
            'account_id' => 'required',
            'event_id' => 'required',
        ]);

        $rating = Rating::create($validatedData);

        return redirect('/event/show/'.$validatedData['event_id'])->with('success', 'Rating created successfully!');
    }

    public function create()
    {
        // return view('ratings.create');
    }

    public function destroy(Rating $rating)
    {
        $idEvent = $rating->event_id;
        $rating->delete();

        return redirect('/rating/'.$idEvent.'/show')->with('success', 'Rating deleted successfully!');
    }
}
