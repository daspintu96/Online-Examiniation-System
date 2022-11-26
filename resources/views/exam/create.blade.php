<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Exam Create') }}
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
                            <form action="{{route('exam.store')}}" method="post">
                                @csrf
                                <div class="px-5 py-3">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Exam Name</label>
                                    <input type="text" value="{{old('name')}}" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Exam name" required>
                                </div>
                                <div class="px-5 py-3">
                                    <label for="subject_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Subject</label>
                                    <select id="subject_id" name="subject_id" value="{{old('subject_id')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @forelse($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                
                                <div class="px-5 py-3">
                                    <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date</label>
                                    <input type="date" value="{{old('start_date')}}" id="start_date" name="start_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
                                </div>
                                <div class="px-5 py-3">
                                    <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date</label>
                                    <input type="date" value="{{old('end_date')}}" id="end_date" name="end_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
                                </div>
                                <div class="px-5 py-3">
                                    <label for="duration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duration</label>
                                    <input type="number" value="{{old('duration')}}" id="duration" name="duration" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
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