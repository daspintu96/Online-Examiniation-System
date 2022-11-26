<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Exam Question') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="text-right">
                <a type="button" href="{{route('exam.index')}}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Back</a>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @forelse($exam->subject->questions as $question)
            <div style="margin: 25px;">
            <h1 class="text-2xl" style="margin-bottom: 15px;">{{$question->question}}</h1>
                <ul>
                    <li><b>1.</b><span style="margin-left: 15px;">{{$question->answer1}}</span></li>
                    <li><b>2.</b><span style="margin-left: 15px;">{{$question->answer2}}</span></li>
                    <li><b>3.</b><span style="margin-left: 15px;">{{$question->answer3}}</span></li>
                    <li><b>4.</b><span style="margin-left: 15px;">{{$question->answer4}}</span></li>                    
                </ul>
                <div style="margin: 15px 0; text-align:center">
                <h4>Correct Answer: <span class="text-green-600">{{$question->answer}}</span></h4>
                </div>
            </div>

            @empty
            No Question Avaiable

            @endforelse
               
            </div>
        </div>
    </div>
    </x-app-layout>