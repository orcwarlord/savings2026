<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Savings</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-medium">Savings</h3>
            <a href="{{ route('savings.create') }}" class="px-3 py-1 bg-pfl-green text-white rounded">New saving</a>
        </div>

        @if(session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Institution</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Dates</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($savings as $saving)
                        <tr>
                            <td class="px-4 py-2">{{ $saving->user->fname ?? $saving->user->email }}</td>
                            <td class="px-4 py-2">£{{ number_format($saving->amount,2) }}</td>
                            <td class="px-4 py-2">{{ $saving->bank->name ?? '—' }}</td>
                            <td class="px-4 py-2">{{ $saving->savingType->name ?? '—' }}</td>
                            <td class="px-4 py-2">{{ $saving->start_date?->format('Y-m-d') }} — {{ $saving->ongoing ? 'Ongoing' : ($saving->end_date?->format('Y-m-d') ?? '—') }}</td>
                            <td class="px-4 py-2 text-right">
                                <a href="{{ route('savings.show', $saving) }}" class="text-pfl-midgr mr-2"><i class="fa-solid fa-eye"></i><span class="sr-only">View</span></a>
                                <a href="{{ route('savings.edit', $saving) }}" class="text-pfl-pink mr-2"><i class="fa-solid fa-pen"></i><span class="sr-only">Edit</span></a>
                                <form action="{{ route('savings.destroy', $saving) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this saving?')">
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
            {{ $savings->links() }}
        </div>
    </div>
    </div>
</x-app-layout>
