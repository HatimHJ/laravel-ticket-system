<aside class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 mr-4 block w-full translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:right-0 xl:translate-x-0 xl:bg-transparent">
  <div class="h-19.5">
    <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
    <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="/">
      <img src="{{asset('backend/assets/img/logo-ct.png')}}" class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />

      <span class="mr-1 font-semibold transition-all duration-200 ease-nav-brand">شركة...</span>
    </a>
  </div>



  <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

  <!-- change h-sidenav-no-pro to h-sidenav when pro is up -->
  <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
    <ul class="flex flex-col pl-0 mb-0">
      <li class="mt-0.5 w-full ">


        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex
        items-center whitespace-nowrap px-4 transition-colors
        {{session()->get('active-link') == 'dashboard'? 'bg-slate-200':''}}" href="/dashboard">


          <div class="shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
            <span class="fa fa-home"></span>
          </div>
          <i class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">لوحة التحكم</i>
        </a>
      </li>

      <li class="mt-0.5 w-full">
        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center
        whitespace-nowrap px-4 transition-colors
        {{session()->get('active-link') == 'ticket'? 'bg-slate-200':''}}" href="/dashboard/ticket">
          <div class="shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
            <i class="fa fa-paper-plane"></i>
          </div>
          <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">التذاكر</span>
        </a>
        @if (Auth::user()->role == 2 || Auth::user()->role == 0)
        <ul class="dropdown mr-12 mt-4 {{session()->get('active-link') == 'ticket'? 'block':'hidden'}}">
          <li class="mb-2">
            <a class="pr-4 pl-12 py-2 rounded-md shadow-md hover:bg-slate-300 {{session()->get('dropdown-active') == 'create'? 'bg-slate-300':''}}" href="/dashboard/ticket/create">اضافة</a>
          </li>
        </ul>
        @endif
      </li>

      @if (Auth::user()->role == 2)
      <li class="mt-0.5 w-full">
        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center
        whitespace-nowrap px-4 transition-colors
        {{session()->get('active-link') == 'user'? 'bg-slate-200':''}}" href="/dashboard/user">
          <div class="shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
            <i class="fa fa-user"></i>
          </div>
          <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">المستخدمين</span>
        </a>
        <ul class="dropdown mr-12 mt-4 {{session()->get('active-link') == 'user'? 'block':'hidden'}}">
          <li class="mb-2">
            <a class="pr-4 pl-12 py-2 rounded-md shadow-md hover:bg-slate-300 {{session()->get('dropdown-active') == 'create'? 'bg-slate-300':''}}" href="/dashboard/user/create">اضافة</a>
          </li>
        </ul>

      </li>
      @endif
      {{--

      <li class="mt-0.5 w-full">
        <a class="py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-colors" href="../pages/rtl.html">
          <div class="bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
            <svg width="12px" height="12px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <title>settings</title>
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                  <g transform="translate(1716.000000, 291.000000)">
                    <g transform="translate(304.000000, 151.000000)">
                      <polygon class="opacity-60" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon>
                      <path class="opacity-60" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"></path>
                      <path class="" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"></path>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">RTL</span>
        </a>
      </li>
--}}


      {{--
      <li class="w-full mt-4">
        <h6 class="pr-6 mr-2 font-bold leading-tight uppercase text-xs opacity-60">
          صفحات الحساب
        </h6>
      </li>

      <li class="mt-0.5 w-full">
        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="../pages/profile.html">
          <div class="shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <title>customer-support</title>
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                  <g transform="translate(1716.000000, 291.000000)">
                    <g transform="translate(1.000000, 0.000000)">
                      <path class="fill-slate-800 opacity-60" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"></path>
                      <path class="fill-slate-800" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                      <path class="fill-slate-800" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">حساب تعريفي</span>
        </a>
      </li>
 --}}


    </ul>
  </div>

</aside>
