<div class="p-4 text-sm">
    <div class="text-center mb-3">
        <p class="text-xs text-gray-500">Republic of the Philippines</p>
        <p class="text-xs text-gray-500">City of Davao</p>
        <p class="text-xs text-gray-500">Barangay Incio</p>
        <h3 class="font-semibold text-gray-700 mt-1">Residents Information List</h3>
    </div>

    @if($residents->count() > 0)
        <table class="w-full text-xs">
            <thead class="border-b border-gray-300">
                <tr>
                    <th class="pb-1 text-left font-medium text-gray-600">ID</th>
                    <th class="pb-1 text-left font-medium text-gray-600">Name</th>
                    <th class="pb-1 text-left font-medium text-gray-600">Purok</th>
                    <th class="pb-1 text-left font-medium text-gray-600">Contact</th>
                    <th class="pb-1 text-left font-medium text-gray-600">Family Members</th>
                </tr>
            </thead>
            <tbody>
                @foreach($residents as $resident)
                    <tr class="border-b border-gray-200">
                        <td class="py-1">{{ $resident->id }}</td>
                        <td class="py-1">{{ $resident->last_name }}, {{ $resident->first_name }} {{ $resident->middle_name ? substr($resident->middle_name, 0, 1).'.' : '' }}</td>
                        <td class="py-1">{{ $resident->purok ?? 'N/A' }}</td>
                        <td class="py-1">{{ $resident->phone_number ?? 'N/A' }}</td>
                        <td class="py-1">{{ $resident->family_members_string }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if($residents->hasPages())
            <div class="mt-2 text-xs text-gray-500">
                Showing {{ $residents->firstItem() }} to {{ $residents->lastItem() }} of {{ $residents->total() }} residents.
            </div>
        @else
            <div class="mt-2 text-xs text-gray-500">
                Total Residents: {{ $residents->count() }}
            </div>
        @endif
    @else
        <p class="text-gray-500 text-center py-4">No residents data available.</p>
    @endif
</div>