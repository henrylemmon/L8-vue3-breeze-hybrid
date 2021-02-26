<x-layouts.app>

    <x-navigation/>

    <x-layouts.page.main>
        <div class="bg-white w-full md:w-2/3 lg:w-3/5 xl:w-2/3 mx-auto p-6 rounded-lg border border-gray-200 shadow mt-6">
            <h3 class="text-4xl semibold mt-4 mb-8">Create Project</h3>
            <form method="POST" action="/projects">
                @csrf
                <div class="mt-4">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="w-full mt-1 py-1 px-3 rounded border border-gray-200">
                    @error('title')
                        <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mt-4">
                  <label for="description">Description</label>
                  <textarea id="description" name="description" class="w-full mt-1 py-1 px-3 rounded border border-gray-200"></textarea>
                    @error('description')
                        <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="flex justify-between items-center mt-8">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white py-1 px-4 focus:outline-none">
                        Create
                    </button>
                    <a href="/projects" class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white py-1 px-4 focus:outline-none">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </x-layouts.page.main>

</x-layouts.app>
