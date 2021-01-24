<x-layouts.guest>

    <x-layouts.page.main>
        <div class="w-1/3 p-4 border border-gray-200 shadow-md rounded-lg">
            <h3 class="text-4xl semibold mb-6">Login</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="w-full mt-1 py-1 px-3 rounded border border-gray-200">

                    @error('email')
                        <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="w-full mt-1 py-1 px-3 rounded border border-gray-200">

                    @error('password')
                        <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 py-2 px-3 text-white rounded-lg hover:bg-blue-600">Submit</button>
                </div>
            </form>
        </div>
    </x-layouts.page.main>

</x-layouts.guest>
