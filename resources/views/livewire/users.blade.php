<div>
    <div>
        <div class="w-full flex items-center justify-center my-3">
            <div class="w-1/2">
                <form class="flex" wire:submit.prevent="searchUser" method="GET">
                    @csrf
                    <div class="label-style">
                        <input type="search" class="input-style" placeholder="Who are you looking for?"
                            wire:model="search" />
                    </div>
                </form>
            </div>
        </div>
        <div x-data="modal">
            <div class="flex flex-col mx-auto py-3 sm:px-6 lg:px-8">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gry-50">
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
                                            Email
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
                                                {{ $user->is_admin ? 'Admin' : 'User' }}
                                            </td>
                                            <td class="resourceContainer">
                                                {{ $user->campus }}
                                            </td>
                                            <td class="resourceContainer">
                                                {{ $user->email }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}"
                                                    class="text-indigo-900 hover:text-indigo-600">Edit</a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a {{-- href="{{ route('users.edit', ['id' => $user->id]) }}" --}} wire:click="toggle({{ $user->id }})"
                                                    class="text-red-600 hover:text-red-700 cursor-pointer">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @if ($users->isEmpty())
                <div></div>
            @else
                <div class="mt-3 mx-10 font-poppins">
                    {{ $users->links() }}
                </div>
            @endif

        </div>
    </div>
    @if ($isShow)
        <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Delete User
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Are you sure you want to delete the user? All of your data will be
                                        permanently removed. This action cannot be undone.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" wire:click.prevent="destroy()"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Delete
                        </button>
                        <button type="button" wire:click.prevent="abort()"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
