@extends('layout')
@section('title')
@section('content')
    
  <!-- Login Form -->
  <div class="bg-white p-8 rounded shadow-md w-full max-w-sm">
    <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
    @if (session('errorLogin'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">{{session('errorLogin')}}</strong>
        
      </div>
    @endif
    @if (session('message'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">{{session('message')}}</strong>
        
      </div>
    @endif
    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('postLogin')}}" method="post">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Username</label>
            <input type="text" name="username" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700">Password</label>
            <input type="password" name="password" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Login</button>
    </form>
    <div class="mt-4 text-center">
        Don't have an account? <a href="{{route('register')}}" class="text-blue-500">Register</a>
    </div>
</div>
@endsection