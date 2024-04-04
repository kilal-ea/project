@extends('admin.products')

@section('product')
    <div class="p-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        code
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        price
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    category
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($pro as $pro)
                <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                        {{ $pro->id }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $pro->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $pro->price }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $pro->catname }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
