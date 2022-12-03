<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center gap-4">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $ticket->title }}
      </h2>
      <a href="/dashboard" class="text-blue-400 underline ">back</a>
    </div>
  </x-slot>



  <div class="py-12 flex gap-6 max-w-4xl mx-auto px-8 sm:px-0 flex-col items-start container ">


    <div class="flex shadow gap-8 sm:gap-0 bg-white w-full items-start justify-between  p-4">


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
    <form action="/" method="post">
      @csrf
      @method('put')
      <button class="p-2 bg-blue-400 hover:bg-blue-600 transition  text-white">mark as done</button>

    </form>
  </div>
</x-app-layout>
