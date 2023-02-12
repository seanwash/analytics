<?php

namespace App\Http\Controllers;

use App\Data\PageViewData;
use App\Data\WebsiteData;
use App\Data\WebsiteShowData;
use App\Models\Website;
use Inertia\Inertia;

class WebsiteController extends Controller
{
    public function index()
    {
        return Inertia::render('websites/index', [
            'websites' => WebsiteData::collection(Website::all()),
        ]);
    }

    public function show(Website $website)
    {
        $liveSessionCount = $website->pageviews()
            ->where('created_at', '>=', now()->subMinutes(5))
            ->distinct()
            ->count('session_id');

        $sessionCount = $website->pageviews()
            ->where('created_at', '>=', now()->subDays(30))
            ->distinct()
            ->count('session_id');

        $pageViewCount = $website->pageviews()
            ->where('created_at', '>=', now()->subDays(30))
            ->count();

        return Inertia::render('websites/show', WebsiteShowData::from([
            'website' => $website,
            'liveSessionCount' => $liveSessionCount,
            'sessionCount' => $sessionCount,
            'pageviewCount' => $pageViewCount,
            'pageviews' => PageViewData::collection(
                $website->pageviews()->latest()->limit(50)->get()
            ),
        ]));
    }
}
