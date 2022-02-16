@extends('layouts.dashboard')

@section('dashboard-content')
    <div>
        <div>
            <form @if (auth()->user()->is_admin)
                action="{{ route('admin.pending.receive.package', ['id' => $package->id]) }}"
            @else
                action="{{ route('user.pending.receive.package', ['id' => $package->id]) }}"
                @endif
                method="POST">
                @method('PUT')
                @csrf
                <div
                    class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto xl:w-1/2 mt-5
    justify-center text-center py-5 px-6">
                    <div class="font-poppins text-4xl">
                        Pending Package <br />
                    </div>
                    <div>
                        <div>
                            <div class="mt-1">
                                <div class="label-style">
                                    <label class="text-sm text-gray-500">Sender</label>
                                    <input type="text" class="input-style" placeholder="Dan Pineda"
                                        value="{{ $package->packageSender->name }}" readonly />
                                </div>
                                <div class="label-style">
                                    <label class="text-sm text-gray-500">Receiver</label>
                                    <input type="text" class="input-style" placeholder="Dan Pineda"
                                        value="{{ $package->receiver[0]->name }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="flex space-x-3">

                            <div class="label-style">
                                <label class="text-sm text-gray-500">Sender</label>
                                <input type="text" class="input-style" placeholder="+63" value="{{ $package->sender }}"
                                    readonly />
                            </div>

                            <div class="label-style">
                                <label class="text-sm text-gray-500">Courier</label>
                                <input type="text" class="input-style" placeholder="+63" readonly
                                    value="{{ $package->courier }}" />
                            </div>
                        </div>

                        <div class="label-style">
                            <label class="text-sm text-gray-500">Destination</label>
                            <input type="text" class="input-style" placeholder="Destination"
                                value="{{ $package->destination }}" readonly />
                        </div>
                        <div class="flex space-x-3">

                            <div class="label-style">
                                <label class="text-sm text-gray-500">Delivery Date</label>
                                <input type="text" class="input-style" placeholder="MM/DD/YYYY"
                                    value="{{ $package->delivery_date }}" readonly />
                            </div>

                            <div class="label-style">
                                <label class="text-sm text-gray-500">Position</label>
                                <input class="input-style" placeholder="Faculty Admin" value="{{ $package->position }}"
                                    readonly />
                            </div>
                        </div>
                        <main>
                            <div class="flex flex-col mx-auto py-3 sm:px-6 mt-2">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-3 align-middle inline-block min-w-full px-2">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                            <table id="products_table" class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr class="text-gray-700">
                                                        <th scope="col" class="itemLabel">
                                                            Item
                                                        </th>
                                                        <th scope="col" class="itemLabel">
                                                            Quantity
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200 font-poppins">
                                                    @foreach ($package->items as $item)
                                                        <tr class="text-gray-900" id="product0">
                                                            <td class="resourceContainer">
                                                                <div>
                                                                    <input type="text"
                                                                        class="w-full px-4 py-3 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none font-poppins"
                                                                        placeholder="Item Name"
                                                                        value="{{ $item->itemName }}" readonly />
                                                                </div>
                                                            </td>
                                                            <td class="resourceContainer">
                                                                <div>
                                                                    <input type="number"
                                                                        class="w-full px-4 py-3 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none font-poppins"
                                                                        placeholder="Quantity"
                                                                        value="{{ $item->quantity }}" readonly />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <label class="pt-2 flex flex-col items-start mt-3 w-full font-poppins mb-2">Proof of Sender:</label>
                    <div class="mt-4 border-dashed border-4 border-gray-800 p-3">
                        <div id="lightgallery" class="grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-4">
                            @foreach ($package->proofOfSender as $proofOfSender)
                                <a href="{{ $proofOfSender->file_url }}">
                                    <img alt=".." src="{{ $proofOfSender->file_url }}" />
                                </a>
                            @endforeach
                        </div>
                    </div>

                    @if ($package->proofOfReceiver->isEmpty())
                        <div></div>
                    @else
                        <div>

                            <label class="pt-2 flex flex-col items-start mt-5 w-full font-poppins mb-2">Proof of
                                Receiver:</label>
                            <div class="mt-4 border-dashed border-4 border-gray-800 p-3">
                                <div id="lightgallery" class="grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-4">
                                    @foreach ($package->proofOfReceiver as $proofOfReceiver)
                                        <a href="{{ $proofOfReceiver->file_url }}">
                                            <img alt=".." src="{{ $proofOfReceiver->file_url }}" />
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($package->status == 0)
                        <div class="mt-5">
                            <input class="filepond" multiple data-allow-reorder="true" data-max-file-size="3MB"
                                data-max-files="3" name="proof[]" id="proof_of_receiver" />
                        </div>
                        <button type="submit"
                            class="font-poppins w-full block bg-gray-900 hover:bg-gray-800 focus:bg-gray-800 text-white rounded-lg px-4 py-3 mt-6">
                            Receive Package
                        </button>
                    @elseif ($package->status == 1 && auth()->user()->is_admin)
                        <form action="{{ route('admin.pending.delete.package', ['id' => $package->id]) }}">
                            @method('DELETE')
                            @csrf
                            <button
                                class="font-poppins w-full block bg-red-600 hover:bg-red-700 focus:bg-red-700 text-white rounded-lg px-4 py-3 mt-6">Delete
                                Package</button>
                        </form>
                    @endif
                </div>
                </main>
        </div>
        </form>
    </div>
@section('scripts')


    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        const inputElement = document.querySelector('input[id="proof_of_receiver"]');


        // Create a FilePond instance
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const pond = FilePond.create(inputElement);
        FilePond.setOptions({
            server: {
                url: 'upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        })
    </script>
@endsection
@endsection
