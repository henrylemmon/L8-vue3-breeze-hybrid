<x-layouts.guest>

    <x-layouts.auth.main>
        <div class="md:w-2/3 lg:w-3/5 xl:w-2/3 p-4 border border-gray-200 shadow-md rounded-lg mx-auto">
            <h3 class="text-4xl semibold">Confirm Password</h3>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="mt-4">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="w-full mt-1 py-1 px-3 rounded border border-gray-200">

                    @error('password')
                    <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-500 py-2 px-3 text-white rounded-lg hover:bg-blue-600">{{ __('Submit') }}</button>
                </div>
            </form>
        </div>
    </x-layouts.auth.main>

</x-layouts.guest>
