@extends('layout')
@section('title')
@section('content')

<div class="container mx-auto p-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden w-full max-w-md mx-auto">

        <img class="w-full h-48 object-cover" src="{{ asset('/storage/'. $user->avatar) ?? 'https://via.placeholder.com/150' }}" alt="{{ $user->fullname }}">
        <div class="p-4">
            <h2 class="text-xl font-bold mb-2">{{ $user->fullname }}</h2>
            <p class="text-gray-700 mb-1"><i class="fa-regular fa-user"></i> Username: {{ $user->username }}</p>
            <p class="text-gray-700 mb-1"><i class="fa-regular fa-envelope"></i> Email: {{ $user->email }}</p>
            <p class="text-gray-700 mb-1"><i class="fa-regular fa-eye"></i> Role: {{ $user->role }}</p>
            <p class="text-gray-700"> 
                @if ($user->active)
                    <span class="text-green-500">Active</span>
                @else
                    <span class="text-red-500">Inactive</span>
                @endif
            </p>

          
           
                @if (Auth::user()->role == 'admin')
                <div class=" mt-2 text-center bg-blue-100 py-2">
                <a href="{{ route('admin.users') }}" class="hover:text-white">Go to User List</a>
            </div>
            @endif
          
            <div class=" mt-2 text-center bg-blue-100 py-2">
                <a href="{{route('user.edit')}}" class="hover:text-blue-700"><i class="fa-solid fa-pen-to-square"></i> Edit Profile</a>
            </div>
            <div class=" mt-2 text-center bg-blue-100 py-2">
                <a href="{{route('user.changePassword')}}" class="hover:text-blue-700"><i class="fa-solid fa-gears"></i> Change Password</a>
            </div>
            <div class=" mt-2 text-center bg-red-500 py-2">
                <a href="{{route('logout')}}" class="hover:text-white"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
            </div>
        </div>
    </div>
</div>
@endsection