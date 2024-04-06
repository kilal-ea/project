@extends('admin.products')

@section('product')
    <div class="p-6">
        <form action="{{ route('productFilter') }}" method='post'>
            @csrf

            <select name='cat'>
                <option value="" disabled selected>Select category</option>
                @foreach($categories as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
        <table class="min-w-full divide-y divide-gray-200">
            <!-- Table Headers -->
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Code
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Price
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Category
                </th>
            </tr>
            </thead>
            <!-- Table Body -->
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($pro as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $product->id }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $product->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $product->price }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $product->catname }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
