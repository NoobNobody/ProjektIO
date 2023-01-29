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
                <a>Dodawanie nowego zamówienia
                </a>
            </div>
            <div class="py-2 flex justify-center items-center">
                <form method="POST" action="{{ route('admin.sale.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="sm:col-span-6">
                        <label for="first_name"
                            class="text-2xl text-center block text-sm font-medium Itext-gray-700">Imię</label>
                        <div class="mt-1">
                            <input type="text" id="first_name" name="first_name"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
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
                        <input type="text" id="second_name" name="second_name"
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
                        <input type="email" id="email" name="email"
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
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @" />
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
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6t py-6">
                <button type="submit"
                    class="float-right px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Krok
                    2</button>
                @if (auth()->user()->is_admin)
                    <a href="{{ route('admin.sale.index') }}"
                        class="float-left px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Cofnij</a>
                @else
                    <a href="{{ route('dashboard') }}"
                        class="float-left px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Cofnij</a>
            </div>
            @endif
            </form>
        </div>
    </div>
</x-admin-layout>
