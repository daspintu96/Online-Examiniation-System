<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Math Exam') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto">
            <div class="flex flex-col">
                <div class="overflow-x-auto shadow-md sm:rounded-lg">

                    <div class="inline-block min-w-full align-middle">

                        <div class="overflow-hidden bg-white">
                            <div class="text-right">
                                <b class="fixed">Time Left : - <span class="text-red-600 duration" id="duration"></span></b>
                                <!-- <b class="fixed">Time Left : - <span class="text-red-600">{{$exam_questions->duration}}</span></b> -->
                                
                            </div>

                            <div class="text-center">
                                @foreach ($errors->all() as $message)
                                <span class="text-red-600">{{$message}}</span>
                                @endforeach
                            </div>
                            @php $totalQuestion = 0; @endphp

                            <form action="{{route('student_exam.result')}}" method="post">

                                @csrf
                                @foreach($exam_questions->subject->questions as $question)
                                @php $totalQuestion++ @endphp
                                <fieldset class="p-12 pt-8" id="">
                                    <h1 class="text-2xl" style="margin-bottom: 15px;">{{$question->question}}</h1>
                                    <div class="flex items-center">
                                        <input type="radio" value="1" name="{{$question->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$question->answer1}}</label>
                                    </div>
                                    <div class="flex items-center pt-2">
                                        <input type="radio" value="2" name="{{$question->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$question->answer2}}</label>
                                    </div>
                                    <div class="flex items-center pt-2">
                                        <input type="radio" value="3" name="{{$question->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$question->answer3}}</label>
                                    </div>
                                    <div class="flex items-center pt-2">
                                        <input type="radio" value="4" name="{{$question->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$question->answer4}}</label>
                                    </div>

                                </fieldset>
                                @endforeach
                                <input type="text" value="{{$totalQuestion}}" name="totalQuestion" hidden>
                                <input type="text" value="{{$exam_questions->id}}" name="exam_id" hidden>
                                <input type="text" value="{{$exam_questions->subject->id}}" name="subject_id" hidden>

                                <div class="text-right m-5">
                                    <button type="submit" id="submitExam" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>

$(document).ready(function(){ 
//     var timer2 = "{{$exam_questions->duration}}:00";
// var interval = setInterval(function() {


//   var timer = timer2.split(':');
//   //by parsing integer, I avoid all extra string processing
//   var minutes = parseInt(timer[0], 10);
//   var seconds = parseInt(timer[1], 10);
//   --seconds;
//   minutes = (seconds < 0) ? --minutes : minutes;
//   if (minutes < 0) clearInterval(interval);
//   seconds = (seconds < 0) ? 59 : seconds;
//   seconds = (seconds < 10) ? '0' + seconds : seconds;
//   //minutes = (minutes < 10) ?  minutes : minutes;
//   $('.duration').html(minutes + ':' + seconds);
//   timer2 = minutes + ':' + seconds;
// }, 1000);

var duration = {{$exam_questions->duration}} * 60;
var time = duration;
var deadline = document.getElementById('duration');

setInterval(function() {
   var counter = time--, min=(counter/60)>>0,sec = (counter-min*60)+'';
   deadline.textContent = 'Exam Closes in '+min+':'+(sec.length>1 ? '' : '0')+sec 
//    time! = 0 || (time= duration)
if(counter==0){
    document.getElementById('submitExam').click();
}

function update_time(rtime){
    $.ajax({
                        url: 'http://127.0.0.1:8000/remaining-time/{{$exam_questions->id}}/{{$exam_questions->subject_id}}/'+rtime,
                        type: 'GET',
                        success: function(data) {
                           composer.log('Success');
                        }
                    });
}

var rtime = counter/60
if(rtime/2){
    update_time(rtime)
}


}, 1000);



});
       
    </script>
</x-app-layout>