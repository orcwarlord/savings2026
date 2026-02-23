<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Saving Types</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-medium">Saving Types</h3>
            <a href="{{ route('saving-types.create') }}" class="px-3 py-1 bg-pfl-green text-white rounded">New type</a>
        </div>

        @if(session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($types as $type)
                        <tr>
                            <td class="px-4 py-2">{{ $type->name }}</td>
                            <td class="px-4 py-2">{{ Str::limit($type->description, 120) }}</td>
                            <td class="px-4 py-2 text-right">
                                <a href="{{ route('saving-types.edit', $type) }}" class="text-pfl-pink mr-2"><i class="fa-solid fa-pen"></i><span class="sr-only">Edit</span></a>
                                <form action="{{ route('saving-types.destroy', $type) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this type?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600"><i class="fa-solid fa-trash"></i><span class="sr-only">Delete</span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $types->links() }}
        </div>
    </div>
    </div>
</x-app-layout>
