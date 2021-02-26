<x-layouts.guest>

    <x-layouts.auth.main>
        <div class="md:w-2/3 lg:w-3/5 xl:w-2/3 p-4 border border-gray-200 shadow-md rounded-lg mx-auto">
            <div class="mt-6 text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}

                @if (session('status'))
                    <div class="mt-4 font-medium text-sm text-green-600 italic">
                        {{ session('status') }}
                    </div>
                @endif

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="mt-1 text-sm text-red-500 italic">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="mt-6">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mt-6">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="w-full mt-1 py-1 px-3 rounded border border-gray-200" value="{{ old('email') }}">
                    </div>

                    <div class="flex justify-between items-baseline mt-6">
                        <button type="submit" class="bg-blue-500 py-2 px-3 text-white rounded-lg hover:bg-blue-600">{{ __('Request Password Reset Link') }}</button>
                        <a href="/" class="bg-blue-500 py-2 px-3 text-white rounded-lg hover:bg-blue-600">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </x-layouts.auth.main>

</x-layouts.guest>
