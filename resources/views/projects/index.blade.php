<x-layouts.app>

    <x-navigation/>

    <x-layouts.page.main>

        <header class="flex justify-between items-center py-6">
            <div>
                My Projects
            </div>

            <a href="/projects/create" class="text-blue-500">Create Project</a>
        </header>

        <div class="flex flex-wrap -mx-3">
            @forelse ($projects as $project)
                <div class="w-full md:w-1/2 lg:w-1/3 px-3 pb-6">
                    <div class="bg-white rounded p-5 h-48">
                        <h3 class="border-l-4 border-blue-500 pt-2 pb-4 mb-4 pl-4  -ml-5 text-xl">
                            <a href="{{ $project->path() }}" class="text-blue-500 underline">
                                {{ $project->title }}
                            </a>
                        </h3>
                        <div>{{ Str::limit($project->description) }}</div>
                    </div>
                </div>
            @empty
                No Projects Yet.
            @endforelse
        </div>

    </x-layouts.page.main>
</x-layouts.app>
