<script lang="ts">
    export let website: App.Data.WebsiteData;
    export let liveSessionCount: number;
    export let sessionCount: number;
    export let pageviewCount: number;
    export let pageviews: App.Data.PageViewData[];
</script>

<h1>{website.domain}</h1>

<div class='flex items-center space-x-4'>
    <div>
        <p>Live Sessions</p>
        <p>{liveSessionCount}</p>
    </div>

    <div>
        <p>Sessions</p>
        <p>{sessionCount}</p>
    </div>

    <div>
        <p>Page Views</p>
        <p>{pageviewCount}</p>
    </div>
</div>

<table class="table-auto border-collapse border border-slate-400">
    <tbody>
        <tr>
            <th class="border border-slate-300">Path</th>
        </tr>
        {#each pageviews as page}
            <tr>
                <td class="border border-slate-300">{page.path}</td>
            </tr>
        {/each}
    </tbody>
</table>
