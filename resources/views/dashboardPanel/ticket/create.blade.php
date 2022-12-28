{{session(['dropdown-active' => 'create'])}}

@extends('dashboardPanel.layouts')

@section('content')
<div class="flex shadow sm:gap-0 bg-white mx-auto max-w-3xl justify-center p-4">
  <form action="/dashboard/ticket" class="flex flex-col gap-4 w-full" method="post" enctype="multipart/form-data">
    @csrf
    <!-- Ticket title -->
    <div class="flex flex-col gap-2 mb-4 w-full">
      <label for="title " class="text-gray-600">عنوان التذكرة</label>
      <input class="w-full" id="title" type="text" name="title" value="{{old('title')}}" required class="border border-gray-200">
      @error('title')
      <p>{{$message}}</p>
      @enderror
    </div>
    <!-- Ticket Description -->
    <div class="flex flex-col gap-2 mb-4">
      <label for="description " class="text-gray-600">وصف التذكرة</label>
      <textarea name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>
      @error('description')
      <p>{{$message}}</p>
      @enderror
    </div>
    <!-- Ticket Image -->
    <div class="flex flex-col gap-2 mb-4">
      <label for="description " class="text-gray-600">صورة التذكرة</label>
      <input type="file" name="image">
      @error('image')
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
