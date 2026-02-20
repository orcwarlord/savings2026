<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Banks</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">All Institutions</h3>
                    <a href="{{ route('banks.create') }}" class="px-3 py-2 bg-pfl-green text-white rounded">Create Institution</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">URL</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Address</th>
                                <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($banks as $bank)
                                <tr>
                                    <td class="px-4 py-2">{{ $bank->name }}</td>
                                    <td class="px-4 py-2">@if($bank->url)<a href="{{ $bank->url }}" target="_blank" class="site-link inline-flex items-center gap-2"><i class="fa-solid fa-link" aria-hidden="true"></i><span>{{ $bank->url }}</span></a>@else &mdash; @endif</td>
                                    <td class="px-4 py-2">{{ $bank->address ?: '—' }}</td>
                                    <td class="px-4 py-2 text-right">
                                        <a href="{{ route('banks.show', $bank) }}" class="text-pfl-pink mr-2" aria-label="View institution">
                                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                                            <span class="sr-only">View</span>
                                        </a>
                                        <a href="{{ route('banks.edit', $bank) }}" class="text-pfl-green mr-2" aria-label="Edit institution">
                                            <i class="fa-solid fa-pen" aria-hidden="true"></i>
                                            <span class="sr-only">Edit</span>
                                        </a>
                                        <form action="{{ route('banks.destroy', $bank) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600" onclick="return confirm('Delete institution?')" aria-label="Delete institution">
                                                <i class="fa-solid fa-trash" aria-hidden="true"></i>
                                                <span class="sr-only">Delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $banks->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
