import route from "ziggy-js";
import { Head, Link } from "@inertiajs/react";

interface PageProps {
    websites: App.Data.WebsiteData[];
}

export default function ({ websites }: PageProps) {
    return (
        <>
            <Head title="Websites" />

            <div className="space-y-4">
                <h1>Websites</h1>

                <ul>
                    {websites.map((website) => (
                        <li key={website.id}>
                            <Link href={route("websites.show", website)}>{website.domain}</Link>
                        </li>
                    ))}
                </ul>
            </div>
        </>
    );
}
