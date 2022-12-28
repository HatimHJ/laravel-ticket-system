@extends('dashboardPanel.layouts')

@section('content')
<div class="flex flex-col shadow w-full mx-auto  sm:gap-0 bg-white items-start justify-between  p-4">
  <div class="flex justify-between items-start w-full">
    <h2 class="font-semibold mb-6 text-xl text-gray-800 leading-tight">
      {{ $user->name }}
    </h2>
  </div>

  <div class="flex gap-8 sm:gap-0 w-full items-start justify-between">
    <div class="detail flex flex-col">
      <h6 class="font-bold">التفاصيل</h6>
      <p class="max-w-md text-gray-400">{{$user->phone}}</p>
    </div>
    <div class="status-agent flex gap-4 flex-col">
      <div class="status">
        <h6 class="font-bold">الرقم الوظيفي</h6>
        <p>{{$user->empNumber}}</p>
      </div>
      <div class="agent">
        <h6 class="font-bold">البريد الالكتروني</h6>
        <p>{{$user->email}}</p>
      </div>
    </div>
  </div>
</div>

<div class="flex items-end justify-between gap-4 ">
  @if (Auth::user()->role == 2)
  <a href="/dashboard/user/{{$user->id}}/edit" class="text-blue-500 border border-blue-500 font-semibold  p-2 capitalize">تحديث</a>
  @endif
</div>
</div>

@endsection
