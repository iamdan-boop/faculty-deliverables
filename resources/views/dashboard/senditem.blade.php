@extends('layouts.dashboard')

@section('dashboard-content')
    <div>
        <div>
            <form action="{{ route('admin.sendpackage.save') }}" method="POST">
                @csrf
                <div
                    class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto xl:w-1/2 mt-5
    justify-center text-center py-5 px-6">
                    <div class="font-poppins text-4xl">
                        Send Item <br />
                    </div>
                    <div class="text-sm text-gray-500">Send item around faculties and get notified about it.</div>
                    <div>
                        <div>

                            <div class="mt-1">
                                <select name="user_id" id="user_id"
                                    class="form-select w-full rounded-lg bg-gray-200 mt-2 border font-poppins focus:outline-none border-none focus:ring-0 py-3 px-5">
                                    <option value="">Please select User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex space-x-3">

                            <div class="label-style">
                                <label class="text-sm text-gray-500">Sender</label>
                                <input type="text" name="sender" class="input-style" placeholder="+63"
                                    value="{{ old('sender') }}" required />
                            </div>

                            <div class="label-style">
                                <label class="text-sm text-gray-500">Courier</label>
                                <input type="text" name="courier" class="input-style" placeholder="+63" required />
                            </div>
                        </div>

                        <div class="label-style">
                            <label class="text-sm text-gray-500">Destination</label>
                            <input type="text" name="destination" class="input-style" placeholder="Destination"
                                required />
                        </div>
                        <div class="flex space-x-3">

                            <div class="label-style">
                                <label class="text-sm text-gray-500">Delivery Date</label>
                                <input type="text" id="datepicker" name="deliveryDate" class="input-style"
                                    placeholder="MM/DD/YYYY" required />
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
                                                    <tr class="text-gray-900" id="product0">
                                                        <td class="resourceContainer">
                                                            <div>
                                                                <input type="text" name="itemNames[]"
                                                                    class="w-full px-4 py-3 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none font-poppins"
                                                                    placeholder="Item Name" />
                                                            </div>
                                                        </td>
                                                        <td class="resourceContainer">
                                                            <div>
                                                                <input type="number" name="quantities[]"
                                                                    class="w-full px-4 py-3 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none font-poppins"
                                                                    placeholder="Quantity" value="1" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="product1"></tr>
                                                </tbody>
                                            </table>
                                            <div class="flex items-end justify-end">

                                                <button id="add_row"
                                                    class="font-poppins w-2/12 block mx-3 my-5 bg-gray-900 hover:bg-gray-800 focus:bg-gray-800 text-white rounded-lg px-4 py-3">
                                                    Add Item
                                                </button>
                                                <button id="delete_row"
                                                    class="font-poppins w-2/12 block mr-3 my-5 bg-red-600 hover:bg-red-500 focus:bg-red-500 text-white rounded-lg px-4 py-3">
                                                    Delete Row
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="mt-5">
                        <input class="filepond" multiple data-allow-reorder="true" data-max-file-size="3MB"
                            data-max-files="3" name="proof[]" id="proof_of_sender" />
                    </div>
                    <button type="submit"
                        class="font-poppins w-full block bg-gray-900 hover:bg-gray-800 focus:bg-gray-800 text-white rounded-lg px-4 py-3 mt-6">
                        Send Item
                    </button>
                </div>
                </main>
        </div>
        </form>
    </div>
    </div>
@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>


    <script>
        new Pikaday({
            field: document.getElementById('datepicker'),
            format: 'MM/DD/YYYY',
        });

        FilePond.registerPlugin(FilePondPluginImagePreview);
        const inputElement = document.querySelector('input[id="proof_of_sender"]');
        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
        FilePond.setOptions({
            server: {
                url: 'sendpackage/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        })

        $(document).ready(function() {
            let row_number = 0;
            $("#add_row").click(function(e) {
                e.preventDefault();
                let new_row_number = row_number - 1;
                $('#product' + row_number).html($('#product' + new_row_number).html()).find(
                    'td:first-child');
                $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
                row_number++;

            });

            $("#delete_row").click(function(e) {
                e.preventDefault();
                if (row_number > 1) {
                    $("#product" + (row_number - 1)).html('');
                    row_number--;
                }
            });
        });
    </script>
@endsection
@endsection
