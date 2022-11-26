<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subject') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto">
            <div class="text-right">
                <a type="button" href="{{route('subject.create')}}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add Subject</a>
            </div>
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
                                            Price
                                        </th>
                                        <th scope="col" class="p-4">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @forelse($subjects as $subject)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="p-4 w-4">
                                           
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$subject->name}}</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">     
                                        <a href="{{route('subject.edit', $subject->id)}}" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a> </td>
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