<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">User Details</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">{{ $user->fname }} {{ $user->lname }}</h3>

                <div class="grid grid-cols-1 gap-4">
                    <div><strong>Email:</strong> {{ $user->email }}</div>
                    <div><strong>Role:</strong> {{ $user->role ?? 'saver' }}</div>
                    <div>
                        <strong>Linked Institutions:</strong>
                        <ul class="list-disc ml-6">
                            @foreach($user->banks as $bank)
                                <li>{{ $bank->name }} (username: {{ $bank->pivot->institution_username ?? '—' }})</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('users.edit', $user) }}" class="px-4 py-2 bg-yellow-500 text-white rounded mr-2">Edit</a>
                    <a href="{{ route('users.index') }}" class="px-4 py-2 border rounded">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
