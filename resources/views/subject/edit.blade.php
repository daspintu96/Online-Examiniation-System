<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Subject') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto">
            <div class="flex flex-col">
                <div class="overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden bg-white">
                            <form action="{{route('subject.update', $subject->id)}}" method="post">
                            @csrf
                            @method('PUT')
                                <div class="mb-6 p-12">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject Name</label>
                                    <input type="text" value="{{$subject->name}}"  :value="old('name')" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="Subject Name" required>
                                </div>
                                <div class="text-right m-5">
                                    <button type="submit" 
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    >Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>