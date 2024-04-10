@extends('dashboard.adash')

@section('admin')
    <div class="">
    <nav class="flex justify-between items-center p-4">
        <div>
        </div>
            <button onclick="window.location='{{ route('allsales') }}'" class='  w-full py-5 font-semibold text-white bg-red-600 border-r-2' style="font-family: Arial, sans-serif;">Show all sales</button>
            <button onclick="window.location='{{ route('addclients') }}'" class='  w-full py-5 font-semibold text-white bg-red-600 border-r-2' style="font-family: Arial, sans-serif;">Add clients</button>
            <button onclick="window.location='{{ route('deletedclients') }}'" class='  w-full py-5 font-semibold text-white bg-red-600 border-r-2' style="font-family: Arial, sans-serif;"> clients deleted</button>
    <br>
    </nav>
    <div>
        @yield('sales')
    </div>
    </div>
@endsection
