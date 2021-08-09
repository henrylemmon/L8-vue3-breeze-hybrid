<div class="bg-white w-full flex justify-between items-center sm:px-8 lg:px-12 px-2 py-4">
    <div>
        <h1 class="text-4xl semibold">Demo></h1>
    </div>

    <div class="flex text-right">
        <div class="mr-4">
           Hello {{ auth()->user()->name }}
        </div>
        <div>
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
        </div>
    </div>
</div>
