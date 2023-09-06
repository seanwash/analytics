<x-layouts.app>
    <div class="space-y-4">
        <h1 class="text-2xl">Websites</h1>

        <ul>
            @foreach($websites as $website)
                <li>
                    <a href={{ route("websites.show", $website->id) }}>
                        {{ $website->domain }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-layouts.app>
