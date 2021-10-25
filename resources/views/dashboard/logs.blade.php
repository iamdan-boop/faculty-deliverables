@extends('dashboard.dashboard')

@section('dashboard-content')
<div class="flex flex-col mx-auto py-3 sm:px-6 lg:px-8">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr class="text-gray-700">
                            <th scope="col" class="userContainer">
                                Reciever's Name
                            </th>
                            <th scope="col" class="userContainer">
                                Status
                            </th>
                            <th scope="col" class="userContainer">
                               Delivery Date
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>  <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Delete</span>
                            </th>
                        </tr>
                    </thead>
                    {{-- <tbody class="bg-white divide-y divide-gray-200 font-poppins">
                        <tr class="text-gray-900">
                            @foreach ($logs as $logs)
                                <td class="px-5 py-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium ">
                                            {{ $logs->name }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm ">{{ $logs->position }}</div>
                                </td>
                                <td class="resourceContainer">
                                    {{ $logs->contactNumber }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="text-red-" class="">Delete</a>
                                </td> --}}
                            {{-- @endforeach --}}
                        </tr>
                    </tbody>
                </table>
                </div>
        </div>
    </div>
</div>
@endsection