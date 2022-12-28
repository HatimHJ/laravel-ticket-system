<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>


  <div class="py-12">

    @if (session()->has('message'))

    <div class="flex max-w-5xl mx-auto items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" /></svg>
      <p>{{session()->get('message')}}</p>
    </div>


    @endif
    <div class="flex flex-col max-w-5xl mx-auto  items-start justify-center  p-4">
      <a href="department/create" class="bg-emerald-700 mb-4 text-white font-bold p-2">Add Category</a>
      <table class=" ">
        <thead class="bg-gray-700 text-white">
          <tr>
            <th>Name</th>
            <th>edit</th>
            <th>delete</th>
          </tr>
        </thead>
        @foreach ($department as $category)
        <tr>
          <td>
            {{$category->name}}
          </td>
          <td>
            <a href='department/{{$category->id}}/edit'>
              <button class="bg-yellow-500 text-white font-bold p-2">Edit</button>
            </a>
          </td>
          <td>
            <form action="department/{{$category->id}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="bg-red-400 text-white font-bold p-2">Delete</button>
            </form>
            </a>
          </td>
        </tr>
        @endforeach
      </table>
    </div>

  </div>
</x-app-layout>
