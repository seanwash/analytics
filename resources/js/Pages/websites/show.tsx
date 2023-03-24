import { useEffect, useRef } from "react";
import Chart from "chart.js/auto";
import { Head } from "@inertiajs/react";

interface PageProps {
    website: App.Data.WebsiteData;
    chart: any;
    liveSessionCount: number;
    sessionCount: number;
    pageviewCount: number;
    pageviews: App.Data.PageViewData[];
}

const numberFormat = new Intl.NumberFormat("en-US");

function formattedNumber(number: number) {
    return numberFormat.format(number);
}

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

export default function ({ website, chart, liveSessionCount, sessionCount, pageviewCount, pageviews }: PageProps) {
    const canvasElement = useRef();

    useEffect(() => {
        new Chart(canvasElement.current, {
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
    }, []);

    return (
        <>
            <Head title={website.domain} />

            <div className="container mx-auto space-y-12">
                <h1>{website.domain}</h1>

                <div className="flex items-center space-x-12">
                    <div>
                        <p>
                            <span className="block text-3xl">{formattedNumber(liveSessionCount)}</span> Live Sessions
                        </p>
                    </div>

                    <div>
                        <p>
                            <span className="block text-3xl">{formattedNumber(sessionCount)}</span> Sessions
                        </p>
                    </div>

                    <div>
                        <p>
                            <span className="block text-3xl">{formattedNumber(pageviewCount)}</span> Page Views
                        </p>
                    </div>
                </div>

                <canvas ref={canvasElement} />

                <table className="w-full table-auto border-collapse border border-neutral-400">
                    <thead>
                        <tr>
                            <th className="border border-neutral-400 p-4 text-left">Path</th>
                            <th className="border border-neutral-400 p-4 text-left">Country Code</th>
                            <th className="border border-neutral-400 p-4 text-left">Screen Size</th>
                            <th className="border border-neutral-400 p-4 text-left">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        {pageviews.map((page) => (
                            <tr key={page.id}>
                                <td className="border border-neutral-400 p-4">{page.path}</td>
                                <td className="border border-neutral-400 p-4">{page.country_code}</td>
                                <td className="border border-neutral-400 p-4">{page.screen_size}</td>
                                <td className="border border-neutral-400 p-4">{formattedDate(page.created_at)}</td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </>
    );
}
