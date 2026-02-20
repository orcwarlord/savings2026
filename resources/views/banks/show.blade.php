<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $bank->name }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold">{{ $bank->name }}</h3>
                <p class="text-sm text-gray-500 mb-4">Details for this institution.</p>

                <div class="space-y-4">
                    <div>
                        <div class="text-sm text-gray-600">URL</div>
                        <div>@if($bank->url)<a href="{{ $bank->url }}" target="_blank" class="text-pfl-pink">{{ $bank->url }}</a>@else &mdash; @endif</div>
                    </div>

                    <div>
                        <div class="text-sm text-gray-600">Address</div>
                        <div class="whitespace-pre-wrap">{{ $bank->address ?: '—' }}</div>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('banks.index') }}" class="mr-2 px-4 py-2 border rounded">Back</a>
                        <a href="{{ route('banks.edit', $bank) }}" class="px-4 py-2 bg-pfl-green text-white rounded">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
