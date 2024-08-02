@extends('layout')
@section('title')
@section('content')
    
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Update Profile</h2>
    @if (session('message'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">{{session('message')}}</strong>
        
      </div>
    @endif
    <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <!-- Full Name -->
        <div class="mb-4">
            <label for="fullname" class="block text-gray-700">Full Name</label>
            <input type="text" id="fullname" name="fullname" class="w-full p-2 border border-gray-300 rounded mt-1" value="{{$user->fullname}}" required>
        </div>
        
        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded mt-1" value="{{$user->email}}" required>
        </div>

        <!-- Profile Picture -->
        <div class="mb-4">
            <label for="avatar" class="block text-gray-700">Profile Picture</label>
            <input type="file" id="avatar" name="avatar" class="w-full p-2 border border-gray-300 rounded mt-1">
            @if ($user->avatar)
                <img src="{{asset('/storage/'. $user->avatar) }}" alt="Current Avatar" class="mt-2 w-24 h-24 object-cover rounded-full">
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Update Profile</button>
      
    </form>
    <div class="mt-4 text-center">
        <a href="{{route('user.show')}}" class="w-full bg-green-500 text-white p-2 rounded hover:bg-green-600">Back</a>
    </div>
</div>

@endsection