@extends('admin.sales.sales')

@section('sales')
    
    <div class="p-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Sales ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Code
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Total Price
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Created By
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Client Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        bon                 
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($sales as $sale)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $sale->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $sale->code }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $sale->priceTotal }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $sale->uname }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $sale->cname }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <form method="POST" action="{{ route('bonsale', $sale->code) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">bon</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
