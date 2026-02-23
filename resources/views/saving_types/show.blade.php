<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $type->name }}</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h3 class="text-lg font-medium">{{ $type->name }}</h3>
        <p class="text-sm text-gray-600 mb-4">{{ $type->description }}</p>

        <div class="flex justify-end">
            <a href="{{ route('saving-types.edit', $type) }}" class="mr-2 px-3 py-1 border rounded">Edit</a>
            <a href="{{ route('saving-types.index') }}" class="px-3 py-1 border rounded">Back</a>
        </div>
    </div>
    </div>
</x-app-layout>
