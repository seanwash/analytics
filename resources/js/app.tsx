import { createInertiaApp } from "@inertiajs/react";
import { createRoot } from "react-dom/client";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";

// import './bootstrap';

const appName = window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,

    resolve: (name) => {
        return resolvePageComponent(`./pages/${name}.tsx`, import.meta.glob("./pages/**/*.tsx"));
    },

    setup({ el, App, props }) {
        createRoot(el).render(<App {...props} />);
    },
});
