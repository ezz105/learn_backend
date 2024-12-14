<x-layout>
    <x-slot name="title">
        Add New User
    </x-slot>

    <x-panel>
        <x-form.form action="{{ route('users.store') }}" method="POST">
            @csrf <!-- Include CSRF token -->

            <div>
                <x-heading>Add New User</x-heading>
            </div>
            <hr />

            <!-- Basic User Information -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <x-form.input name="name" label="Full Name" placeholder="Enter full name" required />
                <x-form.input type="email" name="email" label="Email Address" placeholder="Enter email address" required />
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <x-form.input type="password" name="password" label="Password" placeholder="Enter password" required />
                <x-form.input type="password" name="password_confirmation" label="Confirm Password" placeholder="Confirm password" required />
            </div>

            <!-- Role Selection -->
            <div class="mt-6">
                <x-form.select name="role_id" label="User Role" required class="p-2">
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                    @endforeach
                </x-form.select>
            </div>

            <!-- Contact Information -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                <x-form.input name="phone" label="Phone Number" placeholder="Enter phone number" />
                <x-form.input name="address" label="Address" placeholder="Enter address" />
            </div>

            <!-- Status Selection -->
            <div class="mt-6">
                <x-form.select name="status" label="Status" class="p-2">
                    <option value="active" selected>Active</option>
                    <option value="inactive">Inactive</option>
                </x-form.select>
            </div>

            <!-- Submit Button -->
            <!-- <div class="flex justify-end mt-6">
                <button type="submit" class="btn btn-primary">Create User</button>
            </div> -->
        </x-form.form>
    </x-panel>
</x-layout>
