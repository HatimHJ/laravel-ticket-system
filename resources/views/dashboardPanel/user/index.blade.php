 @extends('dashboardPanel.layouts')
 {{session(['active-link' => 'user'])}}
 {{session(['dropdown-active' => ''])}}


 @section('content')
 @if (count($users) > 0)
 <div class="user">
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

 @endsection
