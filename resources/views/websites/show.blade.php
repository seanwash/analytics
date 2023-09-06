<x-layouts.app>
    <div class="container mx-auto space-y-12">
        <div>
            <a href={{ route("websites.index") }}>&larr; back</a>
        </div>

        <h1>{{ $website->domain }}</h1>

        <div class="flex items-center space-x-12">
            <x-total-card label="Live Sessions" :count="$liveSessionCount" />
            <x-total-card label="Sessions" :count="$liveSessionCount" />
            <x-total-card label="Page Views" :count="$liveSessionCount" />
        </div>

        <x-rollup-card label="Path" :items="$paths" />
        <x-rollup-card label="Country" :items="$countries" />
        <x-rollup-card label="Screen Size" :items="$screenSizes"" />
    </div>
</x-layouts.app>
