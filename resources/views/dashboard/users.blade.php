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
                                    Name
                                </th>
                                <th scope="col" class="userContainer">
                                    Position
                                </th>
                                <th scope="col" class="userContainer">
                                    Contact Number
                                </th>
                                <th scope="col" class="userContainer">
                                    User Type
                                </th>
                                <th scope="col" class="userContainer">
                                    Campus
                                </th>
                                <th scope="col" class="userContainer">
                                    Username
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 font-poppins">
                         @foreach ($users as $user)
                            <tr class="text-gray-900">
                                    <td class="px-5 py-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium ">
                                                {{ $user->name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm ">{{ $user->position }}</div>
                                    </td>
                                    <td class="resourceContainer">
                                        {{ $user->contactNumber }}
                                    </td>
                                    <td class="resourceContainer">
                                        {{ $user->position }}
                                    </td>
                                    <td class="resourceContainer">
                                        {{ $user->campus }}
                                    </td>
                                    <td class="resourceContainer">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                            </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if ($users->isEmpty())
            <div></div>
        @else
            {{ $users->links() }}
        @endif
    </div>
@endsection
