@extends('layouts.dashboard')

@section('dashboard-content')
<div>
    <div class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto xl:w-1/2 mt-5
justify-center text-center py-5 px-6">
        <div class="font-poppins text-4xl">
            Send Item <br />
        </div>
        <div class="text-sm text-gray-500">Send item around faculties and get notified about it.</div>
        <div>

            <div class="label-style">
                <label class="text-sm text-gray-500">Name</label>
                <input type="text" name="name" class="input-style" placeholder="John Doe" required />
            </div>
            <div class="flex space-x-3">

                <div class="label-style">
                    <label class="text-sm text-gray-500">Sender</label>
                    <input type="text" name="sender" class="input-style" placeholder="+63" required />
                </div>

                <div class="label-style">
                    <label class="text-sm text-gray-500">Courier</label>
                    <input type="text" name="courier" class="input-style" placeholder="+63" required />
                </div>
            </div>

            <div class="label-style">
                <label class="text-sm text-gray-500">Destination</label>
                <input type="text" name="destination" class="input-style" placeholder="Destination" required />
            </div>
            <div class="flex space-x-3">

                <div class="label-style">
                    <label class="text-sm text-gray-500">Delivery Date</label>
                    <input type="text" name="deliveryDate" class="input-style" placeholder="00/00/00" required />
                </div>

                <div class="label-style">
                    <label class="text-sm text-gray-500">Position</label>
                    <input type="position" name="position" class="input-style" placeholder="Faculty Admin"
                        required />
                </div>
            </div>
            <main>
                <div class="flex flex-col mx-auto py-3 sm:px-6 mt-2">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-3 align-middle inline-block min-w-full px-2">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr class="text-gray-700">
                                            <th scope="col" class="itemLabel">
                                                Item
                                            </th>
                                            <th scope="col" class="itemLabel">
                                                Quantity
                                            </th>
                                            <th scope="col" class="itemLabel">
                                                Type
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 font-poppins">
                                        <tr class="text-gray-900">
                                            <td class="resourceContainer">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium">
                                                        Dan Pineda
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="resourceContainer">
                                                <div class="text-sm">Faculty Admin</div>
                                            </td>
                                            <td class="resourceContainer">
                                                09955430420
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a
                                                    class="text-indigo-600 hover:text-indigo-900 cursor-pointer">Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                </div>
            </main>
            <button wire:click="increment">Add Item</button>
            <a href="{{ route('senditem.addItems') }}"
                class="w-full block bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">
                Log In
            </a>
        </div>
    </div>
</div>
@endsection