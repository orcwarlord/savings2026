<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit User</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')

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
                            <label class="block text-sm font-medium text-gray-700">First name</label>
                            <input name="fname" value="{{ old('fname', $user->fname) }}" class="mt-1 block w-full border rounded px-3 py-2" required />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Last name</label>
                            <input name="lname" value="{{ old('lname', $user->lname) }}" class="mt-1 block w-full border rounded px-3 py-2" required />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input name="email" type="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full border rounded px-3 py-2" required />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Password (leave blank to keep)</label>
                            <div class="mt-1 relative">
                                <input id="password" name="password" type="password" class="block w-full pr-10 border rounded px-3 py-2" />
                                <button type="button" id="togglePassword" class="absolute inset-y-0 right-2 flex items-center text-gray-500 toggle-btn" aria-label="Toggle password visibility">
                                    <svg id="togglePasswordIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div id="confirmWrapper" class="toggle-confirm">
                            <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                            <div class="mt-1 relative">
                                <input id="password_confirmation" name="password_confirmation" type="password" class="block w-full pr-10 border rounded px-3 py-2" />
                                <button type="button" id="togglePasswordConfirm" class="absolute inset-y-0 right-2 flex items-center text-gray-500 toggle-btn" aria-label="Toggle confirm password visibility">
                                    <svg id="togglePasswordConfirmIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Role</label>
                            <select name="role" class="mt-1 block w-full border rounded px-3 py-2">
                                <option value="saver" {{ old('role', $user->role ?? 'saver') === 'saver' ? 'selected' : '' }}>saver</option>
                                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>admin</option>
                            </select>
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('users.show', $user) }}" class="mr-2 px-4 py-2 border rounded">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-pfl-green text-white rounded">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .toggle-confirm { max-height: 0; opacity: 0; overflow: hidden; transition: max-height 0.18s ease, opacity 0.18s ease; }
    .toggle-confirm.expanded { max-height: 200px; opacity: 1; }
    .toggle-btn { background: transparent; border: none; padding: 0; }
</style>

<script>
    const EYE_SVG = '<path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/><circle cx="12" cy="12" r="3"/>';
    const EYE_OFF_SVG = '<path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/>';

    function toggleField(id, iconId) {
        const field = document.getElementById(id);
        const icon = document.getElementById(iconId);
        if (!field || !icon) return;
        if (field.type === 'password') {
            field.type = 'text';
            icon.innerHTML = EYE_OFF_SVG;
        } else {
            field.type = 'password';
            icon.innerHTML = EYE_SVG;
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const t = document.getElementById('togglePassword');
        if (t) t.addEventListener('click', () => toggleField('password', 'togglePasswordIcon'));
        const tc = document.getElementById('togglePasswordConfirm');
        if (tc) tc.addEventListener('click', () => toggleField('password_confirmation', 'togglePasswordConfirmIcon'));

        // Show confirm only when password has value (with transition)
        const passwordField = document.getElementById('password');
        const confirmWrapper = document.getElementById('confirmWrapper');
        const confirmField = document.getElementById('password_confirmation');

        function updateConfirmVisibility() {
            if (!passwordField || !confirmWrapper) return;
            if (passwordField.value && passwordField.value.length > 0) {
                confirmWrapper.classList.add('expanded');
                if (confirmField) confirmField.required = true;
            } else {
                confirmWrapper.classList.remove('expanded');
                if (confirmField) {
                    confirmField.required = false;
                    confirmField.value = '';
                }
            }
        }

        updateConfirmVisibility();
        if (passwordField) passwordField.addEventListener('input', updateConfirmVisibility);
    });
</script>
