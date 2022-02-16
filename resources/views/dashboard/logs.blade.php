@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="flex flex-col mx-auto py-3 sm:px-6 lg:px-8">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr class="text-gray-700">
                                <th scope="col" class="userContainer">
                                    Sender's Name
                                </th>
                                @if (auth()->user()->is_admin)
                                    <th scope="col" class="userContainer">
                                        Reciever's Name
                                    </th>
                                @endif
                                <th scope="col" class="userContainer">
                                    Status
                                </th>
                                <th scope="col" class="userContainer">
                                    Courier
                                </th>
                                <th scope="col" class="userContainer">
                                    Position
                                </th>
                                <th scope="col" class="userContainer">
                                    Delivery Date
                                </th>
                                <th scope="col" class="userContainer">
                                    <span class="sr-only">Edit</span>
                                </th>
                                <th scope="col" class="userContainer">
                                    <span class="sr-only">Delete</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 font-poppins">
                            <tr class="text-gray-900">
                                @foreach ($packages as $package)
                                    <td class="px-5 py-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium ">
                                                {{ $package->packageSender->name }}
                                            </div>
                                        </div>
                                    </td>
                                    @if (auth()->user()->is_admin)
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm ">{{ $package->receiver[0]->name }}</div>
                                        </td>
                                    @endif
                                    <td class="resourceContainer">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $package->status == 0 ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                            {{ $package->status == 0 ? 'Pending' : 'Received' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm ">{{ $package->courier }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm ">{{ $package->position }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm ">{{ $package->delivery_date }}</div>
                                    </td>
                                    <td>
                                        @if (auth()->user()->is_admin)
                                            <a href="{{ route('admin.pending.packages', ['id' => $package->id]) }}"
                                                class="font-poppins text-blue-800">View</a>
                                        @else
                                            <a href="{{ route('user.pending.packages', ['id' => $package->id]) }}"
                                                class="font-poppins text-blue-800">View</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if (auth()->user()->is_admin)
                                            <form
                                                action="{{ route('admin.pending.delete.package', ['id' => $package->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="font-poppins text-red-600 mr-2" type="submit">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                @if ($packages->isEmpty())
                    <div></div>
                @else
                    <div class="mt-3 mx-10 font-poppins">
                        {{ $packages->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
