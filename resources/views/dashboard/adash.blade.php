@extends('master')

@section('content')
    <div style='display: flex'>
        <div class='bg-red-700 w-1/5'>
            <button onclick="window.location='{{ route('produits') }}'" class='  w-full py-5 font-semibold text-white border-b-4' style="font-family: Arial, sans-serif;">Product</button><br>
            <button onclick="window.location='{{route('user')}}'" class='  w-full py-5 font-semibold text-white border-b-4' style="font-family: Arial, sans-serif;">Users</button><br>
            <button onclick="window.location='{{route('clientsv')}}'" class='  w-full py-5 font-semibold text-white border-b-4' style="font-family: Arial, sans-serif;">clients</button><br>
            <button onclick="window.location='{{route('sales')}}'" class='  w-full py-5 font-semibold text-white border-b-4' style="font-family: Arial, sans-serif;">vente</button><br>
            <button onclick="window.location='#'" class='  w-full py-5 font-semibold text-white border-b-4' style="font-family: Arial, sans-serif;">tranfer</button><br>
            <button onclick="window.location='#'" class='  w-full py-5 font-semibold text-white border-b-4' style="font-family: Arial, sans-serif;">stock</button><br>
            <button onclick="window.location='#'" class='  w-full py-5 font-semibold text-white border-b-4' style="font-family: Arial, sans-serif;">fornisore</button><br>
        </div>
        <div class='px-10 py-6 w-4/5'>
            @yield('admin')
        </div>
    </div>
@endsection
