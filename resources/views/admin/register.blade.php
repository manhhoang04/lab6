@extends('layout')
@section('title', 'Register')
@section('content')
    
<!-- Register Form -->
<div class="bg-white p-8 rounded shadow-md w-full max-w-sm">
    <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
    <form action="{{route('postRegister')}}" method="post">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Full Name</label>
            <input type="text" name="fullname" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Username</label>
            <input type="text" name="username" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700">Password</label>
            <input type="password" name="password" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>
        <button type="submit" class="w-full bg-green-500 text-white p-2 rounded">Register</button>
    </form>
    <div class="mt-4 text-center">
        Already have an account? <a href="{{route('login')}}" class="text-blue-500">Login</a>
    </div>
</div>
@endsection