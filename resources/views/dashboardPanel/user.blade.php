<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>


  <div class="py-12">

    <div class="flex max-w-5xl mx-auto  items-center justify-center  p-4">

      <table class=" ">

        <thead class="bg-gray-700 text-white">

          <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Phone</th>
            <th>Email</th>
          </tr>
        </thead>
        @foreach ($users as $user)
        @if ($user->id == Auth::user()->id)

        @else
        <tr>

          <td>
            <a href={{ route( 'user', ['id' => $user->id] ) }}>
              {{$user->name}}
            </a>
          </td>
          <td>{{$user->role}}</td>
          <td>{{$user->phone}}</td>
          <td>{{$user->email}}</td>
        </tr>
        @endif
        @endforeach
      </table>
    </div>

  </div>
</x-app-layout>
