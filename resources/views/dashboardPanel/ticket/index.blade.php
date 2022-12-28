 @extends('dashboardPanel.layouts')
 {{session(['active-link' => 'ticket'])}}

 {{session(['dropdown-active' => ''])}}


 @section('content')
 @if (count($tickets) > 0)
 <div class="ticket">
   <div class="flex flex-wrap -mx-3">
     <div class="flex-none w-full max-w-full px-3">
       <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white 
            border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">

         <div class="flex-auto px-0 pt-0 pb-2">
           <div class="p-0 overflow-x-auto">
             <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
               <thead class="align-bottom">
                 <tr>
                   <th class="px-6 py-3 font-bold text-right uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                     العنوان
                   </th>
                   <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
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
                   <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                     {{$ticket->title}}
                   </td>
                   <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap text-center shadow-transparent">
                     <span class="bg-status-{{$ticket->status == 'open' ? 'open' : 'close'}}">
                       {{$ticket->status}}
                     </span>
                   </td>
                   <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap text-center shadow-transparent">{{$ticket->agent}}</td>
                   <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap text-center shadow-transparent">{{$ticket->created_at}}</td>
                   {{-- control --}}
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
 <div class="flex max-w-5xl mx-auto  items-center justify-center  p-4">
   <h2>no tickets...</h2>
 </div>
 @endif

 @endsection
