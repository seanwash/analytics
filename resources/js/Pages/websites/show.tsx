import { Head } from "@inertiajs/react";
import RollupCard from "../../components/website/RollupCard";
import TotalCard from "../../components/website/TotalCard";
import ActivityChart from "../../components/website/ActivityChart";

interface PageProps {
    website: App.Data.WebsiteData;
    chart: any;
    liveSessionCount: number;
    sessionCount: number;
    pageviewCount: number;
    pageviews: App.Data.PageViewData[];
    paths: App.Data.RollupData[];
    countries: App.Data.RollupData[];
    screenSizes: App.Data.RollupData[];
}

export default function ({
    website,
    chart,
    liveSessionCount,
    sessionCount,
    pageviewCount,
    paths,
    countries,
    screenSizes,
}: PageProps) {
    return (
        <>
            <Head title={website.domain} />

            <div className="container mx-auto space-y-12">
                <h1>{website.domain}</h1>

                <div className="flex items-center space-x-12">
                    <TotalCard label="Live Sessions" count={liveSessionCount} />
                    <TotalCard label="Sessions" count={sessionCount} />
                    <TotalCard label="Pageviews" count={pageviewCount} />
                </div>

                <ActivityChart chart={chart} />

                <RollupCard label="Path" items={paths} />
                <RollupCard label="Country" items={countries} />
                <RollupCard label="Screen Size" items={screenSizes} />
            </div>
        </>
    );
}
