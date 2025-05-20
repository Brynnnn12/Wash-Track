<x-guest-layout>

    <div class="sm:mx-auto sm:w-full sm:max-w-md mb-4">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Wash Track
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
            Lupakan Password anda dan dapatkan link untuk mereset password anda
        </p>
    </div>



    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
