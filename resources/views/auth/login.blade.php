<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
      </a>
    </x-slot>

    @if (Route::has('register'))
    <div class="flex items-center mt-4 pb-4 border-b   justify-between">
      <h6>Don't Have Account</h6>
      <a href="{{ route('register') }}" class="text-sm bg-blue-500 text-white px-4 py-2 border border-transparent rounded-md font-semibold uppercase tracking-widest hover:bg-blue-700  focus:outline-none  transition ">Register</a>
    </div>
    @endif

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 " :status="session('status')" />



    <form method="POST" class="mt-8" action="{{ route('login') }}">

      @csrf

      {{-- <!-- Email Address -->
      <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div> --}}

      <!-- Employee Number -->
      <div>
        <x-input-label for="empNumber" :value="__('employee number')" />
        <x-text-input id="empNumber" class="block mt-1 w-full" type="text" name="empNumber" :value="old('empNumber')" required autofocus />
        <x-input-error :messages="$errors->get('empNumber')" class="mt-2" />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <!-- Remember Me -->
      <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
          <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
          <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
      </div>

      <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
          {{ __('Forgot your password?') }}
        </a>
        @endif

        <x-primary-button class="ml-3">
          {{ __('Log in') }}
        </x-primary-button>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout>
