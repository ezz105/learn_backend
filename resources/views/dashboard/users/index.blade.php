<x-layout>
    <x-slot name="title">
        Manage Users
    </x-slot>

    <x-panel>
        <div>
            <x-heading>Manage Products</x-heading>
            <x-sub-heading>You can manage your products here</x-sub-heading>
        </div>

        <div class="flex flex-col sm:flex-row gap-3">

            <!-- Add Export Button -->
            <x-button type="secondary" href="#" icon="upload">
                Export
            </x-button>

            <!-- Add Users Button -->
            <x-button type="primary" href="#" icon="add">
                Add User
            </x-button>
        </div>
    </x-panel>



    <x-panel class="mt-6">
    <table class="min-w-full divide-y shadow rounded-lg border  divide-gray-200 bg-white">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ID
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Role
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Joined At
                </th>
                <th scope="col"
                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($users as $user)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $user->id }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $user->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 text-xs font-semibold text-white bg-indigo-600 rounded-full">
                            {{ $user->role->name }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-sm text-gray-600 ">
                            {{ $user->created_at->diffForHumans() }}
                        </span>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end gap-2">
                        <x-button type="secondary" href="#" icon="edit" size="small">
                            Edit
                        </x-button>
                        <x-button type="danger" href="#" icon="delete" size="small">
                            Delete
                        </x-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </x-panel>

    <!-- Pagination -->
    <x-pagination :items="$users" />
</x-layout>
