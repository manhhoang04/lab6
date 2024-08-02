@extends('layout')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h1 class="text-xl font-semibold mb-4">Change Password</h1>
  <!-- Hiển thị thông báo thành công -->
  @if (session('message'))
  <div class="bg-green-500 text-white p-4 rounded mb-4">
      {{ session('message') }}
  </div>
@endif

<!-- Hiển thị lỗi xác thực -->
@if ($errors->any())
  <div class="bg-red-500 text-white p-4 rounded mb-4">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

    <form action="{{ route('user.postChangePassword') }}" method="post">
        @csrf
        
        <div class="mb-4">
            <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
            <input type="password" name="current_password" id="current_password" class="w-full p-2 border border-gray-300 rounded mt-1 " required>
        </div>
        <div class="mb-4">
            <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
            <input type="password" name="new_password" id="new_password" class="w-full p-2 border border-gray-300 rounded mt-1 " required>
        </div>
        <div class="mb-4">
            <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="w-full p-2 border border-gray-300 rounded mt-1 " required>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Change Password</button>
        
    </form>
    <div class="mt-4 text-center">
        <a href="{{route('user.show')}}" class="w-full bg-green-500 text-white p-2 rounded hover:bg-green-600">Back</a>
    </div>
</div>
@endsection
