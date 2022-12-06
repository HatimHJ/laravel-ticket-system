<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center gap-4">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      </h2>
      <a href="/dashboard" class="text-blue-400 underline ">back</a>
    </div>
  </x-slot>



  <div class="py-12 flex  gap-6 max-w-5xl mx-auto px-8 sm:px-0 flex-col items-start container ">
    @if (session()->has('msg'))

    <div class="flex w-full mx-auto items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">

      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" /></svg>
      <p>{{session()->get('msg')}}</p>
    </div>
    @endif

    <div class="flex flex-col shadow w-full mx-auto  sm:gap-0 bg-white items-start justify-between  p-4">


      <h2 class="font-semibold mb-6 text-xl text-gray-800 leading-tight">
        {{ $ticket->title }}
      </h2>

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
      @if ($ticket->status == 'open')
      <form action="/ticket/{{$ticket->id}}" method="post">
        @csrf
        @method('put')
        <button class="p-2 bg-blue-400 hover:bg-blue-600 transition capitalize  text-white">mark as done</button>
      </form>
      @endif
      @if (Auth::user()->role == 2)
      <a href="/ticket/{{$ticket->id}}/edit" class="text-blue-500 border border-blue-500 font-semibold  p-2 capitalize">edit Ticket</a>

      @endif
    </div>
  </div>
</x-app-layout>
