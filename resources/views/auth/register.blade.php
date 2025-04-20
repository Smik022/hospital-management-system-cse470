<x-guest-layout>
    <div class="max-w-md mx-auto bg-gradient-to-r from-green-500 to-blue-500 p-8 rounded-lg shadow-xl mt-10">
        <h2 class="text-center text-3xl font-bold text-white mb-6">Create Your Account</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full p-3 text-gray-800 rounded-md border-2 border-gray-300 focus:border-blue-600 focus:outline-none" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full p-3 text-gray-800 rounded-md border-2 border-gray-300 focus:border-blue-600 focus:outline-none" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full p-3 text-gray-800 rounded-md border-2 border-gray-300 focus:border-blue-600 focus:outline-none" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full p-3 text-gray-800 rounded-md border-2 border-gray-300 focus:border-blue-600 focus:outline-none" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="text-sm text-white hover:text-gray-300" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-3 bg-blue-600 hover:bg-blue-700 text-white">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
