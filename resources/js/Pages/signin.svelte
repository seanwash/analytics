<script lang="ts">
    import route from "ziggy";
    import { useForm } from "@inertiajs/svelte";

    const form = useForm({
        email: "",
        password: "",
    });

    function handleSignIn() {
        $form.post(route("authenticated-session.store"));
    }
</script>

{#if $form.errors.email}
    <p class="mb-4 text-red-500">{$form.errors.email}</p>
{/if}

<form on:submit|preventDefault={handleSignIn} class="space-y-4">
    <div>
        <label class="block" for="email">Email Address</label>
        <input id="email" type="email" required bind:value={$form.email} />
    </div>
    <div>
        <label class="block" for="password">Password</label>
        <input id="password" type="password" required bind:value={$form.password} />
    </div>
    <button type="submit" disabled={$form.processing}>Sign In</button>
</form>
