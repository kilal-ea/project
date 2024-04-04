@extends('admin.user')

@section('user')
    <div class="mt-4">

        <button type="submit" onclick="window.location='{{ URL::previous() }}'" class="bg-green-500 mb-5 p-2 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-2xl">
            Retour
        </button>
        
        <p class="text-lg font-bold">Nom: {{$user->name}}</p>
        <p class="text-gray-600">Code: {{$user->id}}</p>
        <p class="text-gray-600">Email: {{$user->email}}</p>
        <p class="text-gray-600">Rôle: {{$user->roles}}</p>
        <p class="text-gray-600">Secteur: {{$user->sectors}}</p>
    </div>
    <div class="mt-4">
        <button  onclick="window.location='{{route('pass', $user->id)}}'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Changer le mot de passe
        </button>
        @if($user->roles !== 'admin' && $user->roles !== 'assistance')
            <button onclick="window.location='{{route('stock', $user->id)}}'" class="mt-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Stock
            </button>
        @endif
    </div>
    <div class='w-full'>
        @yield('oneuser')
    </div>
@endsection
