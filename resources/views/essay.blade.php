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
                    {{ __('You can see own Essay!') }}

                    <!-- Essays -->

                    <div>
                        <label for="">Title:</label>
                        <h1>{{ $essay->title }}</h1>
                        <label for="">Body:</label>
                        <h1>{{ $essay->body }}</h1>
                        <label for="">Expire Date:</label>
                        <h1>{{ $essay->expire_date }}</h1>
                        <label for="">Essay Details:</label>
                        <label for="">View:</label>
                        <h1>{{ $essay->view }}</h1>
                        @if ($essay->essayDetails != null)
                            @foreach ($essay->essayDetails as $essay_detail)
                                <label for="">Show Date</label>
                                <h1>{{ $essay_detail->show_date }}</h1>
                                <label for="">Show Ip</label>
                                <h1>{{ $essay_detail->user_ip }}</h1>
                            @endforeach
                        @endif




                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
