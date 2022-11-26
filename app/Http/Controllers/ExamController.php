<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $exams = Exam::get();
       return view('exam.index',compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::get();
        return view('exam.create',compact('subjects'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        Exam::create([
            'name'=>$request->name,
            'subject_id'=>$request->subject_id,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'duration'=>$request->duration
        ]);

        return redirect()->route('exam.index');
    }

    public function show(Exam $exam)
    {
        // return $exam->subject->question;
        return view('exam.show',compact('exam'));
    }

    
    public function edit(Exam $exam)
    {
        $subjects = Subject::get();
       return view('exam.edit', compact('exam','subjects'));
    }

    public function update(Exam $exam, Request $request)
    {
      $exam->update([
        'name'=>$request->name,
        'subject_id'=>$request->subject_id,
        'start_date'=>$request->start_date,
        'end_date'=>$request->end_date,
        'duration'=>$request->duration
      ]);
      return redirect()->route('exam.index');
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

    public function active(Exam $exam, $id)
    {
        $exam->where('id',$id)->update([
            'active'=> 1
            ]);
        return redirect()->route('exam.index');
    }
    public function inactive(Exam $exam, $id)
    {     
         $exam->where('id',$id)->update([
             'active'=> 0
             ]);
         return redirect()->route('exam.index');
    }
}
