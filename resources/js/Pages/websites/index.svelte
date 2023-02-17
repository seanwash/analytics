<script lang="ts">
    import route from "ziggy";

    export let websites: App.Data.WebsiteData[];
</script>

<h1>Websites</h1>

<ul class="mt-4">
    {#each websites as website (website.id)}
        <li>
            <a href={route("websites.show", website)}>{website.domain}</a>
        </li>
    {/each}
</ul>
