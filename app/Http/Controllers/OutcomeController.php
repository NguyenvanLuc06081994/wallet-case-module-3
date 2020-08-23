<?php

namespace App\Http\Controllers;

use App\Category;
use App\Outcome;
use Illuminate\Http\Request;

class OutcomeController extends Controller
{
    public function getAll()
    {
        $outcomes = Outcome::all();
        return view('outcome.list',compact('outcomes'));
    }

    public function showFormAdd()
    {
        $categories = Category::all();
        return view('outcome.add',compact('categories'));
    }

    public function addOutcome(Request $request)
    {
        $outcome = new Outcome();
        $outcome->money = $request->money;
        $outcome->date = $request->date;
        $outcome->category_id = $request->category_id;
        $outcome->save();
        return redirect()->route('outcomes.list');
    }

    public function showFormEdit($id)
    {
       $outcome = Outcome::find($id);
        $categories = Category::all();
       return view('outcome.edit',compact('outcome','categories'));
    }

    public function update(Request  $request, $id)
    {
        $outcome = Outcome::find($id);
        $outcome->money = $request->money;
        $outcome->date = $request->date;
        $outcome->category_id = $request->category_id;
        $outcome->save();
        return redirect()->route('outcomes.list');
    }

}
