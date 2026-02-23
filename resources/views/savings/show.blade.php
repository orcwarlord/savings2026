<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Saving details</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h3 class="text-lg font-medium mb-2">Saving details</h3>

        <div class="space-y-2">
            <div><strong>User:</strong> {{ $saving->user->fname ?? $saving->user->email }}</div>
            <div><strong>Amount:</strong> £{{ number_format($saving->amount,2) }}</div>
            <div><strong>Institution:</strong> {{ $saving->bank->name ?? '—' }}</div>
            <div><strong>Type:</strong> {{ $saving->savingType->name ?? '—' }}</div>
            <div><strong>Start:</strong> {{ $saving->start_date?->format('Y-m-d') ?? '—' }}</div>
            <div><strong>End:</strong> {{ $saving->ongoing ? 'Ongoing' : ($saving->end_date?->format('Y-m-d') ?? '—') }}</div>
            <div><strong>Interest:</strong> {{ $saving->interest_rate ?? '—' }}%</div>
        </div>

        <div class="flex justify-end mt-4">
            <a href="{{ route('savings.edit', $saving) }}" class="mr-2 px-3 py-1 border rounded">Edit</a>
            <a href="{{ route('savings.index') }}" class="px-3 py-1 border rounded">Back</a>
        </div>
    </div>
    </div>
</x-app-layout>
