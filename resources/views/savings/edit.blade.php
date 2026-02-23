<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Saving</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h3 class="text-lg font-medium mb-4">Edit Saving</h3>

        <form action="{{ route('savings.update', $saving) }}" method="POST">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium">User</label>
                    <select name="user_id" class="mt-1 block w-full border px-3 py-2" required>
                        @foreach(App\Models\User::orderBy('email')->get() as $u)
                            <option value="{{ $u->id }}" {{ $saving->user_id == $u->id ? 'selected' : '' }}>{{ $u->fname }} {{ $u->lname }} — {{ $u->email }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium">Amount</label>
                    <input type="number" step="0.01" name="amount" value="{{ old('amount', $saving->amount) }}" class="mt-1 block w-full border px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium">Institution</label>
                    <select name="bank_id" class="mt-1 block w-full border px-3 py-2">
                        <option value="">—</option>
                        @foreach($banks as $b)
                            <option value="{{ $b->id }}" {{ $saving->bank_id == $b->id ? 'selected' : '' }}>{{ $b->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium">Type</label>
                    <select name="saving_type_id" class="mt-1 block w-full border px-3 py-2">
                        <option value="">—</option>
                        @foreach($types as $t)
                            <option value="{{ $t->id }}" {{ $saving->saving_type_id == $t->id ? 'selected' : '' }}>{{ $t->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium">Start date</label>
                        <input type="date" name="start_date" value="{{ old('start_date', $saving->start_date?->format('Y-m-d')) }}" class="mt-1 block w-full border px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">End date</label>
                        <input type="date" name="end_date" value="{{ old('end_date', $saving->end_date?->format('Y-m-d')) }}" class="mt-1 block w-full border px-3 py-2">
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="ongoing" class="mr-2" {{ $saving->ongoing ? 'checked' : '' }}> Ongoing
                    </label>

                    <div class="w-full">
                        <label class="block text-sm font-medium">Interest rate (%)</label>
                        <input type="number" step="0.01" name="interest_rate" value="{{ old('interest_rate', $saving->interest_rate) }}" class="mt-1 block w-full border px-3 py-2">
                    </div>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('savings.index') }}" class="mr-2 px-3 py-1 border rounded">Cancel</a>
                    <button class="px-3 py-1 bg-pfl-green text-white rounded">Save</button>
                </div>
            </div>
        </form>
    </div>
    </div>
</x-app-layout>
