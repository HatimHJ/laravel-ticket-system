{{session(['dropdown-active' => 'create'])}}

@extends('dashboardPanel.layouts')

@section('content')
<div class="flex shadow sm:gap-0 bg-white mx-auto max-w-3xl justify-center p-4">
  <form action="/dashboard/user" class="flex flex-col gap-4 w-full" method="POST">
    @csrf
    <!-- user name -->
    <div class="flex flex-col gap-2 mb-4 w-full">
      <label for="name " class="text-gray-600">الاســم</label>
      <input class="w-full" id="name" type="text" name="name" value="{{old('name')}}" required class="border border-gray-200">
      @error('name')
      <p>{{$message}}</p>
      @enderror
    </div>
    <!-- user phone -->
    <div class="flex flex-col gap-2 mb-4">
      <label for="phone " class="text-gray-600">الجوال</label>
      <input class="w-full" id="name" type="text" name="phone" value="{{old('phone')}}" required class="border border-gray-200">
      @error('phone')
      <p>{{$message}}</p>
      @enderror
    </div>
    <!-- user empNumber -->
    <div class="flex flex-col gap-2 mb-4">
      <label for="empNumber" class="text-gray-600">الرقم الوظيفي</label>
      <input class="w-full" id="name" type="text" name="empNumber" value="{{old('empNumber')}}" required class="border border-gray-200">
      @error('empNumber')
      <p>{{$message}}</p>
      @enderror
    </div>
    <!-- user role -->
    <div class="flex flex-col gap-2 mb-4 w-full">
      <label for="role " class="text-gray-600">دور المستخدم</label>
      <div class="flex gap-4">
        <input type="radio" id="admin" name="role" value="2">
        <label for="admin`">مدير</label>
        <input type="radio" id="agent" name="role" value="1">
        <label for="agent">دعم</label>
        <input type="radio" id="user" checked name="role" value="0">
        <label for="user">مستخدم</label>
      </div>
      @error('role')
      <p>{{$message}}</p>
      @enderror
    </div>

    <!-- user email -->
    <div class="flex flex-col gap-2 mb-4">
      <label for="email" class="text-gray-600">البريد الالكتروني</label>
      <input class="w-full" id="name" type="email" name="email" value="{{old('email')}}" required class="border border-gray-200">
      @error('email')
      <p>{{$message}}</p>
      @enderror
    </div>
    <!-- user password -->
    <div class="flex flex-col gap-2 mb-4">
      <label for="password" class="text-gray-600">كلمة المرور</label>
      <input class="w-full" id="name" type="password" name="password" value="{{old('password')}}" required class="border border-gray-200">
      @error('password')
      <p>{{$message}}</p>
      @enderror
    </div>
    <div class="flex flex-col gap-2 mb-4">
      <label for="password" class="text-gray-600">تأكيد كلمة المرور</label>
      <input class="w-full" id="name" type="password" name="password_confirmation" value="{{old('password')}}" required class="border border-gray-200">
      @error('password')
      <p>{{$message}}</p>
      @enderror
    </div>

    <div class="flex flex-col gap-2 mb-4">
      <button class=" max-w-sm text-sm bg-slate-400 text-white px-4 py-2 border border-transparent rounded-md font-semibold uppercase tracking-widest hover:bg-gray-700  focus:outline-none  transition">
        إضافة
      </button>
    </div>
  </form>
</div>

@endsection
