<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('You can publish essay now!') }}

                    <!-- Essay -->

                    <form method="POST" action="{{ route('essay.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                :value="old('title')" required />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="body" :value="__('Body')" />
                            <x-textarea id="body" class="block mt-1 w-full" type="text" name="body"
                                :value="old('body')" required />
                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                        </div>
                        <div>
                            <label for="date">Expire Date:</label>
                            <input type="date" name="expire_date">
                        </div>
                        <div>
                            <label for="status">Choose a fruit:</label>
                            <select id="status" name="status">
                                <option value="0">Hide</option>
                                <option value="1">Show</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-end mt-4">

                            <x-primary-button class="ml-3">
                                {{ __('Publish') }}
                            </x-primary-button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
