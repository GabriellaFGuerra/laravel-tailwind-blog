@extends('template')

@section('content')
<div class="container p-6 mx-auto">
    <h1 class="mb-6 text-3xl font-bold text-center">My Profile</h1>
    <div class="p-6 bg-white rounded-lg shadow-md">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div>
                <h3 class="mb-2 text-lg font-bold">Personal Information</h3>
                <ul class="list-disc list-inside">
                    <li>Name: {{ $user->name }}</li>
                    <li>Email: {{ $user->email }}</li>
                </ul>
            </div>
            <div>
                <h3 class="mb-2 text-lg font-bold">Account Settings</h3>
                <ul class="list-disc list-inside">
                    <li><a href="#" class="text-blue-500 hover:text-blue-700">Change Password</a></li>
                    <li><a href="#" class="text-blue-500 hover:text-blue-700">Edit Profile</a></li>
                    <li><a href="#" class="text-blue-500 hover:text-blue-700">Delete Account</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
