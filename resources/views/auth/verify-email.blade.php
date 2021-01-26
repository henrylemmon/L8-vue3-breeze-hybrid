<x-layouts.guest>

    <x-layouts.page.main>
        <div class="md:w-2/3 lg:w-3/5 xl:w-2/3 p-4 border border-gray-200 shadow-md rounded-lg mx-auto">
            <div class="mt-6 text-sm text-gray-600">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}

                @if (session('status') == 'verification-link-sent')
                    <div class="mt-4 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif
            </div>

            <div class="mt-6 flex justify-between items-center">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button type="submit" class="bg-blue-500 py-2 px-3 text-white rounded-lg hover:bg-blue-600">{{ __('Send Link Again') }}</button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="bg-blue-500 py-2 px-3 text-white rounded-lg hover:bg-blue-600">Log Out</button>
                </form>
            </div>
        </div>
    </x-layouts.page.main>

</x-layouts.guest>
