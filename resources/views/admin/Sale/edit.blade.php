<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="m-2 p-2"></div>
            <div class="py-8 text-center text-5xl">
                <a>Edycja zamówienia
                </a>
            </div>
            <div class="py-2 flex justify-center items-center">
                <form method="POST" action="{{ route('admin.sale.update', $sale->id) }}" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')
                    <div class="sm:col-span-6">
                        <label for="first_name"
                            class="text-2xl text-center block text-sm font-medium Itext-gray-700">Imię</label>
                        <div class="mt-1">
                            <input type="text" id="first_name" name="first_name" value="{{ $sale->first_name }}"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 " />
                        </div>
                        @error('first_name')
                            <div class="text-sm text-red-400 flex flex-col justify-center items-center">
                                {{ 'Imię jest wymagane!' }}</div>
                        @enderror
                    </div>
            </div>
            <div class="py-2 flex justify-center items-center">
                <div class="sm:col-span-6">
                    <label for="second_name"
                        class="text-2xl text-center block text-sm font-medium Itext-gray-700">Nazwisko</label>
                    <div class="mt-1">
                        <input type="text" id="second_name" name="second_name" value="{{ $sale->second_name }}"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 " />
                    </div>
                    @error('second_name')
                        <div class="text-sm text-red-400 flex flex-col justify-center items-center">
                            {{ 'Nazwisko jest wymagane!' }}</div>
                    @enderror
                </div>
            </div>
            <div class="py-2 flex justify-center items-center">
                <div class="sm:col-span-6">
                    <label for="email"
                        class="text-2xl text-center block text-sm font-medium Itext-gray-700">Email</label>
                    <div class="mt-1">
                        <input type="email" id="email" name="email" value="{{ $sale->email }}"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 " />
                    </div>
                    @error('email')
                        <div class="text-sm text-red-400 flex flex-col justify-center items-center">
                            {{ 'Email jest wymagany!' }}</div>
                    @enderror
                </div>
            </div>
            <div class="py-2 flex justify-center items-center">
                <div class="sm:col-span-6">
                    <label for="telephone_number"
                        class="text-2xl text-center block text-sm font-medium Itext-gray-700">Numer telefonu</label>
                    <div class="mt-1">
                        <input type="text" id="telephone_number" name="telephone_number"
                            value="{{ $sale->telephone_number }}"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 " />
                    </div>
                    @error('telephone_number')
                        <div class="text-sm text-red-400">
                            {{ 'Numer telefonu jest wymagany oraz nie może być dluższy niż 9 liczb!' }}</div>
                    @enderror
                </div>
            </div>
            <div class="py-2 flex justify-center items-center">
                <div class="sm:col-span-6">
                    <label for="rental_time" class="text-2xl text-center block text-sm font-medium Itext-gray-700">Czas
                        wypożyczenia</label>
                    <div class="mt-1">
                        <input type="datetime-local" id="rental_time" name="rental_time"
                            value="{{ $sale->rental_time }}"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 " />
                    </div>
                    @error('rental_time')
                        <div class="text-sm text-red-400">{{ 'Czas wypożyczenia jest wymagany!' }}</div>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <table class="min-w-full">
                                <tr>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Nazwa
                                    </th>
                                    <th scope="col"
                                        class="items-center justify-center py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Cena
                                    </th>
                                    <th scope="col"
                                        class="items-center justify-center py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Ilość
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach ($sale->ordered_products as $order)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td
                                                class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ $order->product->name }}
                                            </td>
                                            <td
                                                class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ $order->product->price }}
                                            </td>
                                            <td
                                                class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ intval($order->amount) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            </form>
            <div class="mt-6t py-6">
                <a href="{{ route('dashboard2') }}"
                    class="float-right px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Zapisz</a>
                <a href="{{ route('admin.sale.create') }}"
                    class="float-left px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Cofnij</a>
            </div>
        </div>
    </div>
    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="m-2 p-2"></div>
            <div class="py-8 text-center text-4xl">
                <a>Dodawanie produktów do zamówienia
                </a>
            </div>
            <div class="py-2 flex justify-center items-center">
                {{-- <form method="POST" action="{{ route('admin.saleproduct.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="sale_id" name="sale_id" value="{{ $sale->id }}">
                    <div class="w-full  px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-center"
                            for="grid-state">
                            Nazwa produktu
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="product_id" name="product_id">
                                @foreach ($products as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="py-2 mt-2 flex justify-center items-center">
                        <div class="sm:col-span-6">
                            <label for="amount"
                                class="text-2xl text-center block text-sm font-medium Itext-gray-700">Ilość</label>
                            <div class="mt-1">
                                <input type="text" id="amount" name="amount"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('amount')
                                <div class="text-sm text-red-400">{{ 'Ilość danego produktu jest wymagana!' }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="py-2 mt-2 flex justify-center items-center">
                        <button
                            class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded"
                            type="submit">
                            Dodaj produkt
                        </button>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-md sm:rounded-lg">
                    <form class="w-full max-w-sm" action="{{ route('admin.sale.edit', $sale->id) }}">
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
                                class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                Ilość
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
                                        <img src="{{ Storage::url($product->image) }}" class="w-16 h-16 rounded">
                                    </td>
                                    <td
                                        class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{ $product->price }}
                                    </td>
                                    <form method="POST" action="{{ route('admin.saleproduct.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <td>
                                            <div class="py-2 mt-2 flex justify-center items-center">
                                                <div class="sm:col-span-6">
                                                    <label for="amount"
                                                        class="text-2xl text-center block text-sm font-medium Itext-gray-700"></label>
                                                    <div class="mt-1">
                                                        <input type="text" id="amount" name="amount"
                                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                                        <input type="hidden" id="sale_id" name="sale_id"
                                                            value="{{ $sale->id }}">
                                                        <input type="hidden" id="product_id" name="product_id"
                                                            value="{{ $product->id }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            <div class="flex space-x-2">
                                                <button
                                                    class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg  text-white"
                                                    type="submit">Dodaj</button>
                                            </div>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class=" mt-3 font-mono ... text-lg ... float-right">
        <span>
            Łączna kwota zamówienia to: {{ $price }}
        </span>
    </div>
</x-admin-layout>
