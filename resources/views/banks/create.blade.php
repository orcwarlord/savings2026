<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Institution</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('banks.store') }}" method="POST">
                    @csrf

                    @if($errors->any())
                        <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-700 rounded">
                            <ul class="list-disc ml-5">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Name</label>
                            <input name="name" value="{{ old('name') }}" class="mt-1 block w-full border rounded px-3 py-2" required />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">URL</label>
                            <input name="url" value="{{ old('url') }}" class="mt-1 block w-full border rounded px-3 py-2" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Address</label>
                            <textarea name="address" class="mt-1 block w-full border rounded px-3 py-2">{{ old('address') }}</textarea>
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('banks.index') }}" class="mr-2 px-4 py-2 border rounded">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-pfl-green text-white rounded">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
