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

  </div>
</x-app-layout>
