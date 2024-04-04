@extends('master')

@section('content')
    <div class="">
        
    <form action="{{ route('pro') }}" method="POST">
        @csrf
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="{{ old('name') }}"><br>
    
    <label for="new_password">Change Password:</label><br>
    <input type="password" id="new_password" name="new_password"><br>
    
    <label for="confirm_password">Confirm New Password:</label><br>
    <input type="password" id="confirm_password" name="confirm_password"><br>

    <label for="validation_pass">Current Password:</label><br>
    <input type="password" id="validation_pass" name="validation_pass"><br>
    
    <input type="submit" value="Update Profile">
</form>
    </div>
@endsection
