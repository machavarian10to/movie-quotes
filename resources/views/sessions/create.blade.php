<x-layout>
    <div class="w-screen h-screen flex justify-center items-center">
        <form method="POST" action="{{ route('login.store') }}" class="p-10 bg-white rounded-xl drop-shadow-lg space-y-5" >
            @csrf
            <h1 class="text-center text-4xl">{{__('texts.login')}}</h1>

            <x-login-input name="email" title="{{ __('texts.login_email')}}" />

            <x-error type="email" />

            <x-login-input name="password" title="{{ __('texts.login_password')}}" />

            <x-error type="password" />

            <button class="w-full px-10 py-2 bg-blue-600 text-white rounded-md
                hover:bg-blue-500 hover:drop-shadow-md duration-300 ease-in text-xl" type="submit">
                {{__('texts.sign_in') }}
            </button>
        </form>
    </div>
</x-layout>
