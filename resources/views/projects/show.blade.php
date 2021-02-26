<x-layouts.app>

    <x-navigation/>

    <x-layouts.page.main>

        <header class="py-6">
            <a href="/projects" class="text-blue-500">Projects</a>
        </header>

        <h1 class="text-2xl font-semibold">{{ $project->title }}</h1>
        <div class="mt-4">{{ $project->description }}</div>

        <div class="mt-6">
            <a href="/projects" class="text-blue-500">
                Go Back>
            </a>
        </div>
    </x-layouts.page.main>

</x-layouts.app>
