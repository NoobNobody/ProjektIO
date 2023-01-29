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
                <a>Dodawanie nowej kategorii
                </a>
            </div>
            <div class="py-2 flex justify-center items-center">
                <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="sm:col-span-6">
                        <label for="name"
                            class="text-2xl text-center block text-sm font-medium Itext-gray-700">Nazwa</label>
                        <div class="mt-1">
                            <input type="text" id="name" name="name"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                        @error('name')
                            <div class="text-sm text-red-400">{{ 'Nazwa kategorii jest wymagana!' }}</div>
                        @enderror
                    </div>
            </div>
            <div class="flex flex-col justify-center items-center">
                <div class="py-2 sm:col-span-6">
                    <label for="image"
                        class="text-2xl text-center block text-sm font-medium Itext-gray-700">Wygląd</label>
                    <div class="mt-1">
                        <input type="file" id="image" name="image"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('image')
                        <div class="text-sm text-red-400 flex flex-col justify-center items-center">
                            {{ 'Zdjęcie kategorii jest wymagane!' }}</div>
                    @enderror
                </div>
            </div>
            <div class="py-2 justify-center items-center">
                <div class="justify-center items-center py-4 sm:col-span-6">
                    <label for="description"
                        class="text-2xl text-center block text-sm font-medium Itext-gray-700">Opis</label>
                    <textarea id="description" rows="2" name="description"
                        class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md "></textarea>
                </div>
                @error('description')
                    <div class="text-sm text-red-400 flex flex-col justify-center items-center">
                        {{ 'Opis kategorii jest wymagany!' }}</div>
                @enderror
            </div>
            <div class="mt-6t py-6">
                <button type="submit"
                    class="float-right px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Zapisz</button>
                <a href="{{ route('admin.categories.index') }}"
                    class="float-left px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Cofnij</a>
            </div>
            </form>
        </div>
    </div>
</x-admin-layout>
