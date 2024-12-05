<x-layout>
    <x-slot name="title">
        Edit User
    </x-slot>

    <x-panel>
        <x-form.form action="{{ route('users.update', $user) }}" method="POST">
            @method('PUT')
           
            <div>
                <x-heading>Edit User: {{ $user->name }}</x-heading>
            </div>
            <hr />
            <!-- Basic User Information -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Name -->
                <x-form.input name="name" label="Full Name" placeholder="Enter full name" 
                    value="{{ old('name', $user->name) }}" required />

                <!-- Email -->
                <x-form.input type="email" name="email" label="Email Address" 
                    placeholder="Enter email address" 
                    value="{{ old('email', $user->email) }}" required />
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Password -->
                <x-form.input type="password" name="password" label="New Password" 
                    placeholder="Enter new password if changing" />

                <!-- Password Confirmation -->
                <x-form.input type="password" name="password_confirmation" 
                    label="Confirm New Password" 
                    placeholder="Confirm new password if changing" />
            </div>

            <!-- Role -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <x-form.select name="role_id" label="Role" required>
                    <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Admin</option>
                    <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Vendor</option>
                    <option value="3" {{ $user->role_id == 3 ? 'selected' : '' }}>User</option>
                </x-form.select>

                <!-- Status -->
                <x-form.select name="status" label="Status" required>
                    <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </x-form.select>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-6">
                <x-button type="primary">Update User</x-button>
            </div>
        </x-form.form>
    </x-panel>
</x-layout>