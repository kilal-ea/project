@extends('dashboard.adash')

@section('admin')
    <div class="">
    <nav class="flex justify-between items-center p-4">
        <div>
        </div>
            <button onclick="window.location='{{ route('prov') }}'" class='  w-full py-5 font-semibold text-white bg-emerald-500 border-r-2' style="font-family: Arial, sans-serif;">Show products</button>
            <button onclick="window.location='{{ route('addpro') }}'" class='  w-full py-5 font-semibold text-white bg-emerald-500 border-r-2' style="font-family: Arial, sans-serif;">Add product</button>
    <br>
    </nav>
    <div>
        @yield('product')
    </div>
    </div>
@endsection
