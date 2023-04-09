declare namespace App.Data {
    export type PageViewData = {
        id: string;
        session_id: string;
        website_id: string;
        host: string;
        path: string;
        country_code: string;
        screen_size: string;
        user_agent: string;
        created_at: string;
        updated_at: string;
    };
    export type RollupData = {
        value: string;
        count: number;
    };
    export type WebsiteData = {
        id: string;
        domain: string;
        created_at: string;
        updated_at: string;
    };
    export type WebsiteShowData = {
        website: App.Data.WebsiteData;
        chart: any;
        liveSessionCount: number;
        sessionCount: number;
        pageviewCount: number;
        paths: Array<App.Data.RollupData>;
        countries: Array<App.Data.RollupData>;
        screenSizes: Array<App.Data.RollupData>;
    };
}
