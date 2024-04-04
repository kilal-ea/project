@extends('dashboard.adash')

@section('admin')
    <div class="">
    <nav class="flex justify-between items-center p-4">
        <div>
        </div>
            <button onclick="window.location='{{ route('showuser') }}'" class='  w-full py-5 font-semibold text-white bg-emerald-500 border-r-2' style="font-family: Arial, sans-serif;">Show User</button>
            <button onclick="window.location='{{ route('add') }}'" class='  w-full py-5 font-semibold text-white bg-emerald-500 border-r-2' style="font-family: Arial, sans-serif;">Add User</button><br>
    </nav>
    <div>
        @yield('user')
    </div>
    </div>
@endsection
