<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">New Saving Type</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h3 class="text-lg font-medium mb-4">New Saving Type</h3>

        <form action="{{ route('saving-types.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="mt-1 block w-full border px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Description</label>
                <textarea name="description" class="mt-1 block w-full border px-3 py-2">{{ old('description') }}</textarea>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('saving-types.index') }}" class="mr-2 px-3 py-1 border rounded">Cancel</a>
                <button class="px-3 py-1 bg-pfl-green text-white rounded">Create</button>
            </div>
        </form>
    </div>
    </div>
</x-app-layout>
