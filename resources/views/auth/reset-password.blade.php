<x-layouts.guest>

    <x-layouts.page.main>
        <div class="md:w-2/3 lg:w-3/5 xl:w-2/3 p-4 border border-gray-200 shadow-md rounded-lg mx-auto">
            <h3 class="text-4xl semibold">Login</h3>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="mt-6">

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="w-full mt-1 py-1 px-3 rounded border border-gray-200" value="{{ old('email', $request->email) }}">

                    @error('email')
                        <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="w-full mt-1 py-1 px-3 rounded border border-gray-200">

                    @error('password')
                    <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                    <div class="mt-4">
                        <label for="password_confirmation">Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="w-full mt-1 py-1 px-3 rounded border border-gray-200">
                    </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-500 py-2 px-3 text-white rounded-lg hover:bg-blue-600">{{ __('Reset Password') }}</button>
                </div>
            </form>
        </div>
    </x-layouts.page.main>

</x-layouts.guest>
