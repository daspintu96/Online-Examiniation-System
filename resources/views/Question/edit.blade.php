<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Question') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto">
            <div class="flex flex-col">
                <div class="overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden bg-white">
                            <div class="text-center">
                                @foreach ($errors->all() as $message)
                                <span class="text-red-600">{{$message}}</span>
                                @endforeach

                            </div>
                            <form action="{{route('question.update', $question->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="px-5 py-3">
                                    <label for="subject_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Subject</label>
                                    <select id="subject_id" name="subject_id" value="{{old('subject_id')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @forelse($subjects as $subject)
                                        <option value="{{$subject->id}}" {{ $subject->id == $question->subject_id ? 'selected':''}}>{{$subject->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                <div class="px-5 py-3">
                                    <label for="question" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Question</label>
                                    <input type="text" value="{{old('question',$question->question)}}" id="question" name="question" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Question" required>
                                </div>
                                <div class="px-5 py-3">
                                    <label for="answer1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer 1</label>
                                    <input type="text" value="{{old('answer1',$question->answer1)}}" id="answer1" name="answer1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Answer One" required>
                                </div>
                                <div class="px-5 py-3">
                                    <label for="answer2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer 2</label>
                                    <input type="text" value="{{old('answer2', $question->answer2)}}" id="answer2" name="answer2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Answer Two" required>
                                </div>
                                <div class="px-5 py-3">
                                    <label for="answer3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer 3</label>
                                    <input type="text" value="{{old('answer3', $question->answer3)}}" id="answer3" name="answer3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Answer Three" required>
                                </div>
                                <div class="px-5 py-3">
                                    <label for="answer4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer 4</label>
                                    <input type="text" value="{{old('answer4', $question->answer4)}}" id="answer4" name="answer4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Answer Four" required>
                                </div>
                                <div class="px-5 py-3">
                                    <label for="answer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correct Answer</label>
                                    <input type="text" id="answer" value="{{old('answer', $question->answer)}}" name="answer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Correct Answer" required>
                                </div>
                                <div class="text-right m-5">
                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>