import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { svelte } from '@sveltejs/vite-plugin-svelte';
import sveltePreprocess from 'svelte-preprocess';

export default defineConfig({
    plugins: [
        // https://github.com/laravel/vite-plugin/pull/189
        // @ts-ignore
        laravel.default({
            input: ['resources/css/app.css', 'resources/js/app.ts'],
            refresh: true,
        }),
        svelte({
            prebundleSvelteLibraries: true,
            preprocess: [sveltePreprocess({ typescript: true })],
        }),
    ],
});
