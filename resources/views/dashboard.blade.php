<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @php
            $users = \App\Models\User::orderBy('id')->get();
            $banks = \App\Models\Bank::orderBy('id')->get();
        @endphp

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 lg:max-w-full lg:mx-0 space-y-6">
            <!-- Overview header -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold">Overview</h3>
                <p class="text-sm text-gray-600">Summary of users, institutions, savings and analytics.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Users -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 col-span-1 lg:col-span-1">
                    <h4 class="font-semibold">Users</h4>
                    <p class="text-sm text-gray-500 mb-4">Registered users and roles.</p>
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('users.index') }}" class="px-3 py-1 text-sm border rounded">View all users</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($users as $user)
                                    <tr>
                                        <td class="px-4 py-2">{{ $user->fname }} {{ $user->lname }}</td>
                                        <td class="px-4 py-2">{{ $user->email }}</td>
                                        <td class="px-4 py-2">{{ $user->role ?? 'saver' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Institutions -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 col-span-1 lg:col-span-1">
                    <h4 class="font-semibold">Institutions</h4>
                    <p class="text-sm text-gray-500 mb-4">Seeded banks / building societies.</p>
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('banks.index') }}" class="px-3 py-1 text-sm border rounded">View all institutions</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">URL</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Address</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($banks as $bank)
                                    <tr>
                                        <td class="px-4 py-2">{{ $bank->name }}</td>
                                        <td class="px-4 py-2"><a href="{{ $bank->url }}" target="_blank" class="text-blue-600">{{ $bank->url }}</a></td>
                                        <td class="px-4 py-2">{{ $bank->address ?: '—' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Savings summary -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 col-span-1 lg:col-span-1">
                    <h4 class="font-semibold">Savings</h4>
                    <p class="text-sm text-gray-500 mb-4">High-level savings metrics (placeholders).</p>

                    <div class="flex justify-end mb-4">
                        <a href="{{ route('savings.index') }}" class="px-3 py-1 text-sm border rounded">View all savings</a>
                    </div>

                    <div class="space-y-4">
                        <div class="p-4 bg-gray-50 rounded">
                            <div class="text-sm text-gray-600">Total savings (placeholder):</div>
                            <div class="text-2xl font-bold">£0.00</div>
                        </div>

                        <div class="p-4 bg-gray-50 rounded">
                            <div class="text-sm text-gray-600">Monthly savings trend</div>
                            <div class="h-40 bg-white border border-dashed border-gray-200 flex items-center justify-center text-gray-400">[Graph placeholder]</div>
                        </div>
                    </div>
                </div>

                <!-- Analytics -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 col-span-1 lg:col-span-1">
                    <h4 class="font-semibold">Analytics</h4>
                    <p class="text-sm text-gray-500 mb-4">Detailed analytics and breakdowns (placeholders).</p>

                    <div class="space-y-4">
                        <div class="p-4 bg-gray-50 rounded">
                            <div class="text-sm text-gray-600">Institution breakdown</div>
                            <div class="h-24 bg-white border border-dashed border-gray-200 flex items-center justify-center text-gray-400">[Chart placeholder]</div>
                        </div>

                        <div class="p-4 bg-gray-50 rounded">
                            <div class="text-sm text-gray-600">Other analytics</div>
                            <div class="h-40 bg-white border border-dashed border-gray-200 flex items-center justify-center text-gray-400">[Analytics placeholder]</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
