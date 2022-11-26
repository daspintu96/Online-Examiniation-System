<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Avaiable Exam') }}
        </h2>
    </x-slot>
    <div class="text-center">
        @if($msg = Session()->get('msg'))
        <h3 class="font-semibold text-xl text-green-600 leading-tight pt-4">{{$msg}}</h3>
        @endif
    </div>
    <div class="py-12">
        <div class="max-w-4xl mx-auto">
            <div class="flex flex-col">
                <div class="overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                <thead class="bg-blue-100 dark:bg-blue-700">
                                    <tr>
                                        <th scope="col" class="p-4">
                                            SL
                                        </th>

                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Subject
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Start Date
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            End Date
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    @forelse($exams as $exam)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="p-4 w-4">

                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$exam->name}}</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$exam->start_date}}</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$exam->end_date}}</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                            @php
                                            date_default_timezone_set("Asia/Dhaka");
                                            $all = App\Models\StudentExam::where('user_id',Auth::user()->id)->where('exam_id',$exam->id)->count();
                                            $result = App\Models\Result::where('user_id',Auth::user()->id)->where('exam_id',$exam->id)->first()
                                            @endphp

                                            @if($all>0)
                                            <span>Registerd</span>&nbsp;
                                            @else
                                            @if($exam->end_date < date('Y-m-d')) @else <a class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-3 py-2 text-center mr-2 mb-2" href="{{URL('student_exam/'.$exam->id.'/'.$exam->subject_id)}}">Register</a>
                                                @endif

                                                @endif
                                                @if($exam->start_date < date('Y-m-d')) @if($exam->end_date > date('Y-m-d'))
                                                    @if($result)
                                                    <span> / Result : </span><b style="color:green"> {{round($result->result, 2)}}</b>
                                                    @else
                                                    <a class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-3 py-2 text-center mr-2 mb-2" href="{{route('student_exam.examPage', $exam->subject_id)}}" onclick="return confirm('This exam must complete on the time! Are you sure to take exam?')">Start Exam</a>
                                                    @endif

                                                    @else
                                                    Deadline end  <span> / Result : </span><b style="color:green"> {{!empty($result->result) ? round($result->result, 2) : 'Fail'}}</b>
                                                    @endif
                                                    @else
                                                    / Comming
                                                    @endif



                                        </td>

                                    </tr>
                                    @empty
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="p-4 w-4">

                                        </td>
                                        <td class="p-4 w-4">
                                            No Subject
                                        </td>
                                    </tr>
                                    @endforelse


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>