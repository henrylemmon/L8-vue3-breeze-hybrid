<x-layouts.app>

    <x-layouts.page.main>
        <a
            href="{{ route('logout') }}"
            onclick="event.preventDefault();
    document.getElementById('logout-form').submit();"
        >
            {{ __('Logout') }}
        </a>

        <form
            id="logout-form"
            action="{{ route('logout') }}"
            method="POST"
            style="display: none;"
        >
            @csrf
        </form>
    </x-layouts.page.main>

</x-layouts.app>
