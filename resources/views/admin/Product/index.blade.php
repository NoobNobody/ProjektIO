<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end">
                <a href="{{ route('admin.product.create') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Nowy produkt</a>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <form class="w-full max-w-sm" action="{{ route('adminproductsearch') }}">
                                <div class="flex items-center border-b border-teal-500 py-2">
                                    <input
                                        class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                        name="search" placeholder="Szukaj po nazwie">
                                    <button
                                        class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded"
                                        type="submit">Szukaj</button>
                                </div>
                            </form>
                            <table class="min-w-full">
                                <tr>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Nazwa
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Wygląd
                                    </th>
                                    <th scope="col"
                                        class="items-center justify-center py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Cena
                                    </th>
                                    <th scope="col"
                                        class="items-center justify-center py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Ilość
                                    </th>
                                    <th scope="col"
                                        class="flex flex-col justify-center items-center justify-center py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Opis
                                    </th>
                                    <th scope="col"
                                        class="justify-center items-center justify-center py-3 px-6 text-xs font-medium tracking-wider text-middle text-gray-700 uppercase dark:text-gray-400">
                                        Kategoria sprzętowa
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach ($products as $product)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td
                                                class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ $product->name }}
                                            </td>
                                            <td scope="row"
                                                class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                <img src="{{ Storage::url($product->image) }}"
                                                    class="w-16 h-16 rounded">
                                            </td>
                                            <td
                                                class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ $product->price }}
                                            </td>
                                            <td
                                                class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ intval($product->amount) }}
                                            </td>
                                            <td
                                                class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ $product->description }}
                                            </td>
                                            <td value="{{ $product->id }}"
                                                class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ $product->category->name }}
                                            </td>
                                            <td
                                                class="float-right py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('admin.product.edit', $product->id) }}"
                                                        class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg  text-white">Edytuj</a>
                                                    <form
                                                        class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                                        method="POST"
                                                        action="{{ route('admin.product.destroy', $product->id) }}"
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
                        <div class="pagination-block">
                            {{ $products->links() }}
                        </div>
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
