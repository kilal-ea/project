@extends('admin.oneuser')

@section('oneuser')
    <div class="p-6">
    <div class="overflow-x-auto">
    <table class="w-full table-auto border-collapse border border-gray-400">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Product Name</th>
                <th class="px-4 py-2">Category</th>
                <th class="px-4 py-2">Quantity (Carton)</th>
                <th class="px-4 py-2">Quantity (Piece)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stocks as $stock)
            <tr>
                <td class="border px-4 py-2">{{ $stock->name }}</td>
                <td class="border px-4 py-2">{{ $stock->category_name }}</td>
                <td class="border px-4 py-2">{{ $stock->quantity_Carton }}</td>
                <td class="border px-4 py-2">{{ $stock->quantity_piece }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    </div>
@endsection
