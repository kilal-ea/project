@extends('admin.user')

@section('user')
    <div>
       <form action="{{ route('sho') }}" method='post'>
        @csrf
            <select name='role' class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="" disabled selected>Select roles</option>
                <option value='admin'>Admin</option>
                <option value='assistance'>Assistance</option>
                <option value='vendeur'>Vendeur</option>
                <option value='magasiniere'>Magasinière</option>
            </select>
            <select name='cec'>
                <option value="" disabled selected>Select sectors</option>
                @foreach($ceq as $sector)
                    <option value="{{$sector->name}}">{{$sector->name}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <table class="min-w-full divide-y w-full divide-gray-200">
            <thead class="bg-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        nom
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        email
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        role
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        more
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            
                @foreach($users as $user)
                
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $user->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $user->roles }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <form method="POST" action="{{ route('moreuser', $user->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary"> more</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
