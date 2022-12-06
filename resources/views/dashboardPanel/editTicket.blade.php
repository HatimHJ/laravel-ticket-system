<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center gap-4">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      </h2>
      <a href="/dashboard" class="text-blue-400 underline ">back</a>
    </div>
  </x-slot>

  {{-- @foreach ($agents as $agent)
  {{dd($agent->name)}}
  @endforeach --}}

  <div class="py-12 flex gap-6 max-w-4xl mx-auto px-8 sm:px-0 flex-col items-start container ">

    @if (session()->has('msg'))
    <div class="flex max-w-5xl mx-auto items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" /></svg>
      <p>{{session()->get('msg')}}</p>
    </div>
    @endif

  </div>
  <div class="flex shadow  sm:gap-0 bg-white mx-auto  max-w-5xl justify-center   p-4">
    <form action="/ticket/{{$ticket->id}}" class="flex flex-col gap-4 w-full" method="post">
      @csrf
      @method('patch')
      <!-- Ticket title -->
      <div class="flex flex-col gap-2 mb-4 w-full">
        <label for="title " class="text-gray-600">Ticket title</label>
        <input class="w-full" id="title" type="text" name="title" value="{{$ticket->title}}" required class="border border-gray-200">
        @error('title')
        <p>{{$message}}</p>
        @enderror
      </div>
      <!-- Ticket Agent -->
      <div class="flex flex-col gap-2 mb-4">
        <label for="agent " class="text-gray-600">Ticket Agent</label>
        <select name="agent" id="agent">
          <option value="null">N/A</option>
          @foreach ($agents as $agent)
          <option value="{{$agent->empNumber}}">{{$agent->name}}</option>
          @endforeach
        </select>
        {{-- <input class="w-full" id="agent" type="text" name="agent" value="{{$ticket->agent ? $ticket->agent : 'N/A'}}" class="border border-gray-200"> --}}
        @error('agent')
        <p>{{$message}}</p>
        @enderror
      </div>
      <!-- Ticket Priority -->
      <div class="flex flex-col gap-2 mb-4">
        <p class="text-gray-600">Ticket Priority</p>

        <div class="flex gap-8">
          <div class="flex gap-2">
            <label for="low" class="text-gray-800 font-bold">low</label>
            <input id="low" type="radio" name="priority" value="low" {{$ticket->priority == 'low'?'checked':''}} class="border border-gray-300">
          </div>
          <div class="flex gap-2">

            <label for="high" class="text-gray-800 font-bold">high</label>
            <input id="high" type="radio" name="priority" value="high" {{$ticket->priority == 'low'?'':'checked'}} class="border border-gray-300">

          </div>
        </div>
        @error('priority')
        <p>{{$message}}</p>
        @enderror
      </div>
      <!-- Ticket Status -->
      <div class="flex flex-col gap-2 mb-4">
        <p class="text-gray-600">Ticket Status</p>
        <div class="flex gap-8">
          <div class="flex gap-2">
            <label for="open" class="text-gray-800 font-bold">open</label>
            <input id="open" type="radio" name="status" value="open" {{$ticket->status == 'open'?'checked':''}} class="border border-gray-300">
          </div>
          <div class="flex gap-2">
            <label for="close" class="text-gray-800 font-bold">close</label>
            <input id="close" type="radio" name="status" value="close" {{$ticket->status == 'open'?'':'checked'}} class="border border-gray-300">
          </div>
        </div>
        @error('status')
        <p>{{$message}}</p>
        @enderror
      </div>
      <!-- Ticket Description -->
      <div class="flex flex-col gap-2 mb-4">
        <label for="description " class="text-gray-600">Ticket Description</label>
        <textarea name="description" id="description" cols="30" rows="10">{{$ticket->description}}</textarea>
        @error('description')
        <p>{{$message}}</p>
        @enderror
      </div>
      <div class="flex flex-col gap-2 mb-4">
        <button class="text-sm bg-gray-900 text-white px-4 py-2 border border-transparent rounded-md font-semibold uppercase tracking-widest hover:bg-gray-700  focus:outline-none  transition">Update</button>
      </div>
    </form>
  </div>
</x-app-layout>
