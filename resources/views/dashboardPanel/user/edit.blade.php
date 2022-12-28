@extends('dashboardPanel.layouts')

@section('content')
<div class="flex shadow  sm:gap-0 bg-white mx-auto  max-w-5xl justify-center   p-4">
  <form action="/dashboard/user/{{$user->id}}" method="POST" class="flex flex-col gap-4 w-full">
    @csrf
    @method('PUT')
    <!-- user name -->
    <div class="flex flex-col gap-2 mb-4 w-full">
      <label for="name " class="text-gray-600">الاســم</label>
      <input class="w-full" id="name" type="text" name="name" value="{{$user->name}}" required class="border border-gray-200">
      @error('name')
      <p>{{$message}}</p>
      @enderror
    </div>
    <!-- user empNumber -->
    <div class="flex flex-col gap-2 mb-4 w-full">
      <label for="empNumber " class="text-gray-600">الرقم الوظيفي</label>
      <input class="w-full" id="name" type="text" name="empNumber" value="{{$user->empNumber}}" required class="border border-gray-200">
      @error('empNumber')
      <p>{{$message}}</p>
      @enderror
    </div>
    <!-- user email -->
    <div class="flex flex-col gap-2 mb-4 w-full">
      <label for="email " class="text-gray-600">الرقم الوظيفي</label>
      <input class="w-full" id="name" type="email" name="email" value="{{$user->email}}" required class="border border-gray-200">
      @error('email')
      <p>{{$message}}</p>
      @enderror
    </div>
    <!-- user phone -->
    <div class="flex flex-col gap-2 mb-4 w-full">
      <label for="phone " class="text-gray-600">الجوال</label>
      <input class="w-full" id="name" type="text" name="phone" value="{{$user->phone}}" required class="border border-gray-200">
      @error('phone')
      <p>{{$message}}</p>
      @enderror
    </div>
    <!-- user role -->
    <div class="flex flex-col gap-2 mb-4 w-full">
      <label for="role " class="text-gray-600">دور المستخدم</label>
      <div class="flex gap-4">
        <input type="radio" id="admin" {{$user->role == 2 ? 'checked' :''}} name="role" value="2">
        <label for="admin`">مدير</label>
        <input type="radio" id="agent" {{$user->role == 1 ? 'checked' :''}} name="role" value="1">
        <label for="agent">دعم</label>
        <input type="radio" id="user" {{$user->role == 0 ? 'checked' :''}} name="role" value="0">
        <label for="user">مستخدم</label>
      </div>
      @error('role')
      <p>{{$message}}</p>
      @enderror
    </div>
    <div class="flex flex-col gap-2 mb-4">
      <button class=" max-w-sm text-sm bg-slate-400 text-white px-4 py-2 border border-transparent rounded-md font-semibold uppercase tracking-widest hover:bg-gray-700  focus:outline-none  transition">
        تعديل
      </button>
    </div>
  </form>
</div>

@endsection
