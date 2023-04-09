import route from "ziggy-js";
import { Head, Link } from "@inertiajs/react";

export default function () {
    return (
        <>
            <Head title="Stonks." />

            <Link href={route("websites.index")}>Stonks.</Link>
        </>
    );
}
