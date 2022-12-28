<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/">
        <x-application-logo class="w-25 h-25 fill-current text-gray-500" />
      </a>
    </x-slot>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <!-- Name -->
      <div>
        <x-input-label for="name" :value="__('الاسم')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>

      <!-- phone -->
      <div class="mt-4">

        <x-input-label for="phone" :value="__('الجوال')" />
        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus />
        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
      </div>

      <!-- empNumber -->
      <div class="mt-4">

        <x-input-label for="empNumber" :value="__('الرقم الوظيفي')" />
        <x-text-input id="empNumber" class="block mt-1 w-full" type="text" name="empNumber" :value="old('empNumber')" required autofocus />
        <x-input-error :messages="$errors->get('empNumber')" class="mt-2" />
      </div>

      <!-- Email Address -->
      <div class="mt-4">
        <x-input-label for="email" :value="__('الايميل')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-input-label for="password" :value="__('كلمة المرور')" />

        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <!-- Confirm Password -->
      <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('تأكيد كلمة المرور')" />


        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>

      <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
          {{ __('لديك حساب ؟') }}
        </a>

        <x-primary-button class="ml-4">
          {{ __('تسجيل') }}
        </x-primary-button>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout>
