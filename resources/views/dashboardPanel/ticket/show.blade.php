@extends('dashboardPanel.layouts')

@section('content')
@if ($ticket->image)
<div class="image w-96  mb-4 bg-gray-500 mx-auto">
  <img src="{{asset('images/'.$ticket->image)}}" class="w-full" alt="">
</div>
@endif
<div class="flex flex-col shadow w-full mx-auto  sm:gap-0 bg-white items-start justify-between  p-4">

  <div class="flex justify-between items-start w-full">

    <h2 class="font-semibold mb-6 text-xl text-gray-800 leading-tight">
      {{ $ticket->title }}
    </h2>
    <h5 class="font-semibold mb-6 text-xl bg-gray-800 text-white px-2 leading-tight">
      {{ $user->name }}
    </h5>
  </div>

  <div class="flex gap-8 sm:gap-0 w-full items-start justify-between">
    <div class="detail flex flex-col">
      <h6 class="font-bold">detail</h6>
      <p class="max-w-md text-gray-400">{{$ticket->description}}</p>
    </div>
    <div class="status-agent flex gap-4 flex-col">
      <div class="status">
        <h6 class="font-bold">status</h6>
        <p>{{$ticket->status}}</p>
      </div>
      <div class="agent">
        <h6 class="font-bold">agent</h6>
        <p>{{$ticket->agent != null? $ticket->agent : 'N/A'}}</p>
      </div>
    </div>
  </div>
</div>

<div class="flex items-end justify-between gap-4 ">
  @if (Auth::user()->role == 2 || $ticket->user_id == Auth::user()->id)
  @if ($ticket->status == 'open')
  <form action="/ticket/{{$ticket->id}}" method="post">
    @csrf
    @method('put')
    <button class="p-2 bg-blue-400 hover:bg-blue-600 transition capitalize  text-white">mark as done</button>
  </form>
  @endif
  @endif
  @if (Auth::user()->role == 2)
  <a href="/ticket/{{$ticket->id}}/edit" class="text-blue-500 border border-blue-500 font-semibold  p-2 capitalize">edit Ticket</a>

  @endif
</div>
</div>

@endsection
