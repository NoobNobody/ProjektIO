<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end">
                <a href="{{ route('admin.sale.create') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Nowe zamówienie</a>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <form class="w-full max-w-sm" action="{{ route('adminsalesearch') }}">
                                <div class="flex items-center border-b border-teal-500 py-2">
                                    <input
                                        class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                        name="search" placeholder="Szukaj po imieniu">
                                    <button
                                        class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded"
                                        type="submit">Szukaj</button>
                                </div>
                            </form>
                            <table class="min-w-full">
                                <tr>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Imie
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Nazwisko
                                    </th>
                                    <th scope="col"
                                        class="items-center justify-center py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Email
                                    </th>
                                    <th scope="col"
                                        class="items-center justify-center py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Numer telefonu
                                    </th>
                                    <th scope="col"
                                        class="flex flex-col justify-center items-center justify-center py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Czas wypożyczenia
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td
                                                class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ $sale->first_name }}
                                            </td>
                                            <td
                                                class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ $sale->second_name }}
                                            </td>
                                            <td
                                                class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ $sale->email }}
                                            </td>
                                            <td
                                                class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ $sale->telephone_number }}
                                            </td>
                                            <td
                                                class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ $sale->rental_time }}
                                            </td>
                                            <td
                                                class="float-right py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('admin.sale.edit', $sale->id) }}"
                                                        class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg  text-white">Edytuj</a>
                                                    <form
                                                        class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                                        method="POST"
                                                        action="{{ route('admin.sale.destroy', $sale->id) }}"
                                                        onsubmit="return confirm('Jesteś pewien?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">Usuń</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $sales->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>
</x-admin-layout>
