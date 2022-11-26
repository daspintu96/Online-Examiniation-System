<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use App\Models\Result;
use App\Models\StudentExam;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentExamController extends Controller
{
    public function index()
    {
        // $regcheck = StudentExam::where('user_id',Auth::user()->id)->where('subject')
        $exams = Exam::get();
        return view('student_exam.index', compact('exams'));
    }

    public function registration($examid, $subjectid)
    {
        StudentExam::create([
            'exam_id' => $examid,
            'subject_id' => $subjectid,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('studentExam.index')->with('msg', 'Registration Successful');
    }

    public function exam_page($subject_id)
    {
        $exam_questions = Exam::with('subject')->where('subject_id', $subject_id)->first();
        $regCheck = StudentExam::where('exam_id', $exam_questions->id)
            ->where('subject_id', $exam_questions->subject->id)
            ->where('user_id', Auth::user()->id)->first();

        if ($regCheck) {
            if ($regCheck->rduration != null) {
                $exam_questions['duration'] = $regCheck->rduration;
                return view('student_exam.exam_page', compact('exam_questions'));
            } else {
                return view('student_exam.exam_page', compact('exam_questions'));
            }
        }
        return redirect()->route('studentExam.index')->with('msg', 'Please Registration First');
    }

    public function result(Request $request)
    {

        $points = 0;
        $percentage = 0;
        $totalQuestion = $request->totalQuestion;
        $answer = $request->all();
        foreach ($answer as $questionId => $userAnswer) {
            if (is_numeric($questionId)) {
                $questionInfo =  Question::where('id', $questionId)->get();
                $correctAnswer = $questionInfo[0]->answer;
                if ($correctAnswer == $userAnswer) {
                    $points++;
                }
            }
        }

        $percentage = ($points / $totalQuestion) * 100;
        // return $percentage;

        Result::create([
            'user_id' => Auth::user()->id,
            'exam_id' => $request->exam_id,
            'subject_id' => $request->subject_id,
            'result' => $percentage
        ]);

        StudentExam::where('exam_id', $request->exam_id)
            ->where('subject_id', $request->subject_id)
            ->where('user_id', Auth::user()->id)->update([
                'rduration' => null
            ]);

        return $this->index()->with('msg', 'Exam done, Result ' . $percentage);
    }

    public function remaining($exam_id, $subject_id, $time)
    {
        // return $exam_id.'/'.$subject_id.'/'.$time;
        StudentExam::where('exam_id', $exam_id)->where('subject_id', $subject_id)->where('user_id', Auth::user()->id)->update([
            'rduration' => $time
        ]);
        return response()->json([], 200);
    }

    
}
