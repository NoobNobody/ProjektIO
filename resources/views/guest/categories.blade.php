<x-guest-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <form class="w-full max-w-sm" action="{{ route('guestcategoriessearch') }}">
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
                                        class="flex flex-col justify-center items-center justify-center py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Opis
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td
                                                class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ $category->name }}
                                            </td>
                                            <td scope="row"
                                                class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                <img src="{{ Storage::url($category->image) }}"
                                                    class="w-16 h-16 rounded">
                                            </td>
                                            <td
                                                class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ $category->description }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
