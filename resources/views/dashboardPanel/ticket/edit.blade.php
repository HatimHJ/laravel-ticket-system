@extends('dashboardPanel.layouts')

@section('content')
<div class="flex shadow  sm:gap-0 bg-white mx-auto  max-w-5xl justify-center   p-4">
  <form action="/dashboard/ticket/{{$ticket->id}}" method="post" enctype="multipart/form-data" class="flex flex-col gap-4 w-full">

    @csrf
    @method('patch')
    <!-- Ticket title -->
    <div class="flex flex-col gap-2 mb-4 w-full">
      <label for="title " class="text-gray-600">عنوان التذكرة</label>
      <input class="w-full" id="title" type="text" name="title" value="{{$ticket->title}}" required class="border border-gray-200">
      @error('title')
      <p class="text-red-400">{{$message}}</p>
      @enderror
    </div>
    <!-- Ticket Agent -->
    <div class="flex flex-col gap-2 mb-4">
      <label for="agent " class="text-gray-600">الدعم الفني</label>
      <select name="agent" id="agent">
        <option value="">N/A</option>
        @foreach ($agents as $agent)
        <option value="{{$agent->empNumber}}">{{$agent->name}}</option>
        @endforeach
      </select>
      {{-- <input class="w-full" id="agent" type="text" name="agent" value="{{$ticket->agent ? $ticket->agent : 'N/A'}}" class="border border-gray-200"> --}}

      @error('agent')
      <p class="text-red-400">{{$message}}</p>
      @enderror
    </div>
    <!-- Ticket Priority -->
    <div class="flex flex-col gap-2 mb-4">
      <p class="text-gray-600">أولوية التذكرة</p>
      <div class="flex gap-8">
        <div class="flex gap-2">
          <label for="low" class="text-gray-800 font-bold">منخفض</label>
          <input id="low" type="radio" name="priority" value="low" {{$ticket->priority == 'low'?'checked':''}} class="border border-gray-300">
        </div>
        <div class="flex gap-2">
          <label for="high" class="text-gray-800 font-bold">عالي</label>
          <input id="high" type="radio" name="priority" value="high" {{$ticket->priority == 'low'?'':'checked'}} class="border border-gray-300">
        </div>
      </div>
      @error('priority')
      <p class="text-red-400">{{$message}}</p>
      @enderror
    </div>
    <!-- Ticket Status -->
    <div class="flex flex-col gap-2 mb-4">
      <p class="text-gray-600">حالة التذكرة</p>
      <div class="flex gap-8">
        <div class="flex gap-2">
          <label for="open" class="text-gray-800 font-bold">مفتوح</label>
          <input id="open" type="radio" name="status" value="open" {{$ticket->status == 'open'?'checked':''}} class="border border-gray-300">
        </div>
        <div class="flex gap-2">
          <label for="close" class="text-gray-800 font-bold">مغلق</label>
          <input id="close" type="radio" name="status" value="close" {{$ticket->status == 'open'?'':'checked'}} class="border border-gray-300">
        </div>
      </div>
      @error('status')
      <p class="text-red-400">{{$message}}</p>
      @enderror
    </div>
    <!-- Ticket Description -->
    <div class="flex flex-col gap-2 mb-4">
      <label for="description " class="text-gray-600">وصف التذكرة</label>
      <textarea name="description" id="description" cols="30" rows="10">{{$ticket->description}}</textarea>
      @error('description')
      <p class="text-red-400">{{$message}}</p>
      @enderror
    </div>
    <!-- Ticket Image -->
    <div class="flex flex-col gap-2 mb-4 w-64">
      <label for="image" class="text-gray-600">صورة التذكرة</label>
      <input type="file" id="image" name="image">
      <img src="{{asset('images/'. $ticket->image)}}" alt="">
      @error('image')
      <p class="text-red-400">{{$message}}</p>
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
