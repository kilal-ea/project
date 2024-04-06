@extends('dashboard.adash')

@section('admin')
<div class="p-6">
@foreach($bon1 as $bon)
    <h1>Code Bon : {{ $bon->code }}</h1>
    <h1>Nom Vendeur : {{ $bon->user_name }}</h1>
    <h1>Nom Client : {{ $bon->clients_name }}</h1>
@endforeach
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nom Produit
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Catégorie
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Quantité Carton
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Quantité Pièce
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    TVA
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    TTC
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Prix
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($bon2 as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->products_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->categorys_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->quantity_Carton }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->quantity_piece }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($item->price - ($item->price / (1 + (20 / 100))), 2, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($item->price - ($item->price - ($item->price / (1 + (20 / 100)))), 2, ',', '.')}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->price  }}</td>
                </tr>
            @endforeach
            <tr>
                <td class="px-6 py-3 text-left text-2xl font-medium text-gray-500 uppercase tracking-wider" colspan="6">Total Prix :</td>
                <td class="px-6 py-3 text-left text-2xl font-medium text-gray-500 uppercase tracking-wider"> {{ $totalprix }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
