import route from "ziggy-js";
import { Head, Link } from "@inertiajs/react";

export default function () {
    return (
        <>
            <Head title="Analytics." />

            <Link href={route("websites.index")}>Analytics.</Link>
        </>
    );
}
