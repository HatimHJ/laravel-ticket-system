<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
  <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">

    <ul class="flex flex-row justify-end pl-0 pr-10 mb-0 ml-0 mr-auto list-none md-max:w-full">
      <li class="flex items-center">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a href="logout" onclick="event.preventDefault();
                                                this.closest('form').submit();">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="hidden sm:inline">تسجيل خروج</span>
          </a>
        </form>
      </li>

      {{-- sidenav-trigger [=] --}}
      <li class="flex items-center pr-4 xl:hidden">
        <a href="javascript:;" class="block p-0 transition-all ease-nav-brand text-sm text-slate-500" sidenav-trigger>
          <div class="w-4.5 overflow-hidden">
            <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
            <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
            <i class="ease-soft relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
          </div>
        </a>
      </li>
    </ul>
  </div>
  </div>
</nav>
