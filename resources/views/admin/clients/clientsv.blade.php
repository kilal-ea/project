@extends('admin.clients.client')

@section('cli')
    <div class="p-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        email
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        name v
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ville
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        delete
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($clients as $client)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $client->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $client->phone }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $client->username }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$client->city}}
                    </td>
                    <td>
                    <form method="POST" action="{{ route('delet', $client->id) }}">
                            @csrf
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">delete</button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection