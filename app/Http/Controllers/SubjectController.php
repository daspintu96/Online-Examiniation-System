<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::get();
        return view('subject.index', compact('subjects'));
    }


    public function create()
    {
        return view('subject.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);

        Subject::create([
            'name' => $request['name']
        ]);

        return redirect()->route('subject.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Subject $subject)
    {
        return view('subject.edit', compact('subject'));
    }


    public function update(Subject $subject, Request $request)
    {
        $subject->update([
            'name' => $request->name
        ]);
        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
