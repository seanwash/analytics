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
    };
    export type WebsiteData = {
        id: string;
        domain: string;
        created_at: string;
        updated_at: string;
    };
    export type WebsiteShowData = {
        website: App.Data.WebsiteData;
        liveSessionCount: number;
        sessionCount: number;
        pageviewCount: number;
        pageviews: any;
    };
}
