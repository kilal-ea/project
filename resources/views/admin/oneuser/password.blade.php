@extends('admin.oneuser')

@section('oneuser')
    <div class="p-6">
        <form action="{{ route('changepass') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="id" value="{{ $idup }}">
            
            <label for="new_pass" class="block font-semibold">Change Password:</label>
            <input type="password" id="new_pass" name="new_pass" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500">
            
            <label for="confirm_pass" class="block font-semibold">Confirm New Password:</label>
            <input type="password" id="confirm_pass" name="confirm_pass" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500">
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Password</button>
        </form>
    </div>
@endsection
