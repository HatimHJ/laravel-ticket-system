@extends('dashboardPanel.layouts')
{{session(['active-link' => 'dashboard'])}}

{{--
@section('content')
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 text-gray-900">
        @if (Auth::user()->role == 2)
        مرحبا مجددا <span class="font-bold"> adminsss</span>
        @elseif(Auth::user()->role == 1)
        مرحبا مجددا <span class="font-bold"> agent</span>
        @else
        مرحبا مجددا <span class="font-bold"> user</span>
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
--}}


@section('content')
{{-- latest ticket --}}
@if (count($tickets) > 0)
<div class="ticket">
  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white 
            border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex items-center justify-between  p-6 pb-0 mb-0 bg-blue-100  ">
          <h6 class="font-bold">أحدث التذاكر</h6>

          <a href="/dashboard/ticket" class="font-bold  border border-slate-500 px-2
          hover:bg-slate-500 hover:text-white">الكل</a>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-right uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    العنوان
                  </th>
                  <th class="px-6 py-3 pl-2 font-bold text-right uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    الحالة
                  </th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    الدعم الفني
                  </th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    التاريخ
                  </th>
                  <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    التحكم
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tickets as $ticket)
                <tr>
                  <td class="p-2 align-middle text-right bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <a href={{ route( 'singleTicket', ['id' => $ticket->id] ) }}>
                      {{$ticket->title}}
                    </a>
                  </td>
                  <td class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="bg-status-{{$ticket->status == 'open' ? 'open' : 'close'}}">
                      {{$ticket->status}}
                    </span>
                  </td>
                  <td class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">{{$ticket->agent}}</td>
                  <td class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">{{$ticket->created_at}}</td>
                  <td class="flex  gap-2 justify-center p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <a href={{ route( 'singleTicket', ['id' => $ticket->id] ) }} class="text-blue-400 hover:text-blue-600 px-2 py-1">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    <a href="/dashboard/ticket/{{$ticket->id}}/edit" class="text-yellow-400 hover:text-yellow-600 px-2 py-1" target="_blank">
                      <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    <form action="/dashboard/ticket/{{$ticket->id}}/delete" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="text-red-400 hover:text-red-600 px-2 py-1 ">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@else
<div class="flex max-w-5xl mx-auto items-center justify-center p-4">
  <h2>no tickets...</h2>
</div>
@endif
{{-- latest user admin only --}}
@if (Auth::user()->role == 2)

@if (count($users) > 0)
<div class="user mt-8">
  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white 
            border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">

        <div class="flex items-center justify-between  p-6 pb-0 mb-0 bg-blue-100  ">
          <h6 class="font-bold">أحدث المستخدمين</h6>

          <a href="/dashboard/user" class="font-bold  border border-slate-500 px-2
      hover:bg-slate-500 hover:text-white">الكل</a>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-right uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    الاسم
                  </th>
                  <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    الرقم الوظيفي
                  </th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    الجوال
                  </th>
                  <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    التحكم
                  </th>

                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    {{$user->name}}
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap text-center shadow-transparent">
                    <span class="bg-status-{{$user->status == 'open' ? 'open' : 'close'}}">
                      {{$user->empNumber}}

                    </span>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap text-center shadow-transparent">
                    {{$user->phone}}
                  </td>
                  <td class="flex  gap-2 justify-center p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <a href={{ route( 'showUser', ['id' => $user->id] ) }} class="text-blue-400 hover:text-blue-600 px-2 py-1">

                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    <a href="/dashboard/user/{{$user->id}}/edit" class="text-yellow-400 hover:text-yellow-600 px-2 py-1" target="_blank">
                      <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    <form action="/dashboard/user/{{$user->id}}/delete" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="text-red-400 hover:text-red-600 px-2 py-1 ">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                      </button>
                    </form>
                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@else
<div class="flex max-w-5xl mx-auto  items-center justify-center  p-4">
  <h2>no users...</h2>
</div>
@endif
@endif

@endsection
