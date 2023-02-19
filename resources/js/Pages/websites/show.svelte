<script lang="ts">
    import { onMount, onDestroy } from "svelte";
    import { router } from "@inertiajs/svelte";
    import Chart from "chart.js/auto";

    export let website: App.Data.WebsiteData;
    export let chart;
    export let liveSessionCount: number;
    export let sessionCount: number;
    export let pageviewCount: number;
    export let pageviews: App.Data.PageViewData[];

    let intervalId;
    let chartEl;

    const timeFormat = new Intl.DateTimeFormat("en-US", {
        year: "numeric",
        month: "numeric",
        day: "numeric",
        hour: "numeric",
        minute: "numeric",
        second: "numeric",
        hour12: true,
        timeZone: "America/Los_Angeles",
    });

    function formattedDate(date: string) {
        return timeFormat.format(new Date(date));
    }

    const numberFormat = new Intl.NumberFormat("en-US");

    function formattedNumber(number: number) {
        return numberFormat.format(number);
    }

    onMount(() => {
        new Chart(chartEl, {
            type: "line",
            data: {
                labels: chart.map((item) => item.date),
                datasets: [
                    {
                        label: "Views",
                        data: chart.map((item) => ({ x: item.date, y: item.views })),
                    },
                ],
            },
        });

        intervalId = setInterval(
            () => {
                router.reload();
            },
            300_000, // 5 minutes
        );
    });

    onDestroy(() => {
        clearInterval(intervalId);
    });
</script>

<div class="container mx-auto space-y-12">
    <h1>{website.domain}</h1>

    <div class="flex items-center space-x-12">
        <div>
            <p><span class="block text-3xl">{formattedNumber(liveSessionCount)}</span> Live Sessions</p>
        </div>

        <div>
            <p><span class="block text-3xl">{formattedNumber(sessionCount)}</span> Sessions</p>
        </div>

        <div>
            <p><span class="block text-3xl">{formattedNumber(pageviewCount)}</span> Page Views</p>
        </div>
    </div>

    <canvas bind:this={chartEl} />

    <table class="w-full table-auto border-collapse border border-neutral-400">
        <thead>
            <tr>
                <th class="border border-neutral-400 p-4 text-left">Path</th>
                <th class="border border-neutral-400 p-4 text-left">Country Code</th>
                <th class="border border-neutral-400 p-4 text-left">Screen Size</th>
                <th class="border border-neutral-400 p-4 text-left">Date</th>
            </tr>
        </thead>
        <tbody>
            {#each pageviews as page}
                <tr>
                    <td class="border border-neutral-400 p-4">{page.path}</td>
                    <td class="border border-neutral-400 p-4">{page.country_code}</td>
                    <td class="border border-neutral-400 p-4">{page.screen_size}</td>
                    <td class="border border-neutral-400 p-4">{formattedDate(page.created_at)}</td>
                </tr>
            {/each}
        </tbody>
    </table>
</div>
