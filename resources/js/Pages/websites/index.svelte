<script lang="ts">
    import route from 'ziggy'

    export let websites: App.Data.WebsiteData[];
</script>

<ul>
    {#each websites as website (website.id)}
        <li>
            <a href={route('websites.show', website)}>{website.domain}</a>
        </li>
    {/each}
</ul>
