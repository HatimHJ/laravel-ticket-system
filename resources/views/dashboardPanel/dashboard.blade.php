<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          @if (Auth::user()->role == 2)
          {{ __("You're logged in!") }} <span class="font-bold"> adminsss</span>
          @elseif(Auth::user()->role == 1)
          {{ __("You're logged in!") }} <span class="font-bold"> agent</span>
          @else
          {{ __("You're logged in!") }} <span class="font-bold"> user</span>
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="py-12">
    @if (session()->has('ticketCreated'))
    <div class="flex w-full mx-auto items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" /></svg>
      <p>{{session()->get('ticketCreated')}}</p>
    </div>
    @endif


    @if (count($tickets) > 0)
    <div class="flex max-w-5xl mx-auto  items-center justify-center  p-4">
      <table class=" ">
        <thead class="bg-gray-700 text-white">
          <tr>
            <th>Title</th>
            <th>Priority</th>
            <th>Status</th>
          </tr>
        </thead>
        @foreach ($tickets as $ticket)
        <tr>
          <td>
            <a href={{ route( 'singleTicket', ['id' => $ticket->id] ) }}>

              {{$ticket->title}}
            </a>
          </td>
          <td>{{$ticket->priority}}</td>
          <td>{{$ticket->status}}</td>
        </tr>
        @endforeach
      </table>
    </div>
    @else
    <div class="flex max-w-5xl mx-auto  items-center justify-center  p-4">
      <h2>no tickets...</h2>
    </div>
    @endif
  </div>
</x-app-layout>
