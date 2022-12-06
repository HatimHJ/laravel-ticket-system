<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Profile') }}
    </h2>
  </x-slot>

  <div class="my-12 p-6 max-w-lg mx-auto bg-white shadow-sm">
    <form action="/user/{{$user->id}}" method="post">
      @csrf
      @method('put')
      <!-- Employee Name -->
      <div class="flex flex-col gap-2 mb-4">
        <label for="name " class="text-gray-600">Employee Name</label>
        <input id="name" type="text" name="name" value={{$user->name}} required class="border border-gray-200">
        @error('name')
        <p>{{$message}}</p>
        @enderror
      </div>
      <!-- Employee Number -->
      <div class="flex flex-col gap-2 mb-4">
        <label for="empNumber " class="text-gray-600">Employee Number</label>
        <input id="empNumber" type="text" name="empNumber" value={{$user->empNumber}} required class="border border-gray-200">
        @error('empNumber')
        <p>{{$message}}</p>
        @enderror
      </div>
      <!-- Employee Email -->
      <div class="flex flex-col gap-2 mb-4">
        <label for="email " class="text-gray-600">Employee Email</label>
        <input id="email" type="text" name="email" value={{$user->email}} required class="border border-gray-200">
        @error('email')
        <p>{{$message}}</p>
        @enderror
      </div>
      <!-- Employee Role -->
      <div class="flex flex-col gap-2 mb-4">
        <label for="role " class="text-gray-600">Employee Role</label>
        <input id="role" type="text" name="role" value={{$user->role}} required class="border border-gray-200">
        @error('role')
        <p>{{$message}}</p>
        @enderror
      </div>
      <!-- Employee Phone -->
      <div class="flex flex-col gap-2 mb-4">
        <label for="phone " class="text-gray-600">Employee Number</label>
        <input id="phone" type="text" name="phone" value={{$user->phone}} required class="border border-gray-200">
        @error('phone')
        <p>{{$message}}</p>
        @enderror
      </div>

      <div class="flex flex-col gap-2 mb-4">
        <button class="text-sm bg-gray-900 text-white px-4 py-2 border border-transparent rounded-md font-semibold uppercase tracking-widest hover:bg-gray-700  focus:outline-none  transition">Update</button>
      </div>

    </form>
  </div>
</x-app-layout>
