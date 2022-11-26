<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    
    public function index()
    {
        $questions = Question::with('subject')->get();       
        return view('question.index', compact('questions'));
    }

    public function create()
    {
        $subjects = Subject::get();
        return view('question.create', compact('subjects'));
    }

   
    public function store(Request $request)
    {
      $request->validate([
          'subject_id' => 'required',
          'question' => 'required|min:6|unique:questions',
          'answer1' => 'required',
          'answer2' => 'required',
          'answer3' => 'required',
          'answer4' => 'required',
          'answer' => 'required',
      ]);

      Question::create([
        'subject_id' => $request->subject_id,
        'question' => $request->question,
        'answer1' => $request->answer1,
        'answer2' => $request->answer2,
        'answer3' => $request->answer3,
        'answer4' => $request->answer4,
        'answer' => $request->answer,
      ]);

      return redirect()->route('question.index');
    }


    public function show(Question $question)
    {
        return view('question.show', compact('question'));
    }

  
    public function edit(Question $question)
    {
        $subjects = Subject::get();
        return view('question.edit', compact('question','subjects'));
    }

    public function update(Question $question, Request $request)
    {
       $question->update([
        'subject_id' => $request->subject_id,
        'question' => $request->question,
        'answer1' => $request->answer1,
        'answer2' => $request->answer2,
        'answer3' => $request->answer3,
        'answer4' => $request->answer4,
        'answer' => $request->answer,
       ]);
       return redirect()->route('question.index');
    }

    
    public function destroy($id)
    {
        //
    }
}
