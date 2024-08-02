@extends('layout')
@section('title', 'List')
@section('content')

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">All Users</h1>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Full Name</th>
                <th class="py-2 px-4 border-b">Username</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Role</th>
                <th class="py-2 px-4 border-b">Active</th>
                <th class="py-2 px-4 border-b">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="py-2 px-4 border-b">{{ $user->fullname }}</td>
                <td class="py-2 px-4 border-b">{{ $user->username }}</td>
                <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                <td class="py-2 px-4 border-b">{{ $user->role }}</td>
                <td class="py-2 px-4 border-b">{{ $user->active ? 'Yes' : 'No' }}</td>
                <td class="py-2 px-4 border-b">
                    <form action="{{ route('admin.toggleActive', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="bg-{{ $user->active ? 'red' : 'green' }}-500 text-white py-1 px-2 rounded">
                            {{ $user->active ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4 text-center">
        <a href="{{route('logout')}}" class="w-full bg-green-500 text-white p-2 rounded hover:bg-green-600">Log out</a>
    </div>
</div>

@endsection
