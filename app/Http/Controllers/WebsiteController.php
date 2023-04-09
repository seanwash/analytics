<?php

namespace App\Http\Controllers;

use App\Data\RollupData;
use App\Data\WebsiteData;
use App\Data\WebsiteShowData;
use App\Models\Website;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
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

        $viewCounts = DB::table('page_views')
            ->where('website_id', $website->id)
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('count(*) as views')
            )->groupBy('date')
            ->get();

        $period = CarbonPeriod::create(now()->subDays(30), now());

        $chart = collect($period)->map(function (Carbon $item) use ($viewCounts) {
            $date = $viewCounts->firstWhere('date', $item->toDateString());

            return [
                'date' => $item->toDateString(),
                'views' => $date ? $date->views : 0,
            ];
        });

        $paths = DB::table('page_views')
            ->where('website_id', $website->id)
            ->select(DB::raw('path as value'), DB::raw('count(*) as count'))
            ->groupBy('value')
            ->orderBy('count', 'desc')
            ->limit(10)
            ->get();

        $countries = DB::table('page_views')
            ->where('website_id', $website->id)
            ->select(DB::raw('country_code as value'), DB::raw('count(*) as count'))
            ->groupBy('value')
            ->orderBy('count', 'desc')
            ->limit(10)
            ->get();

        $screenSizes = DB::table('page_views')
            ->where('website_id', $website->id)
            ->select(DB::raw('screen_size as value'), DB::raw('count(*) as count'))
            ->groupBy('value')
            ->orderBy('count', 'desc')
            ->limit(10)
            ->get();

        return Inertia::render('websites/show', WebsiteShowData::from([
            'website' => WebsiteData::from($website),
            'chart' => $chart,
            'liveSessionCount' => $liveSessionCount,
            'sessionCount' => $sessionCount,
            'pageviewCount' => $pageViewCount,
            'paths' => RollupData::collection($paths),
            'countries' => RollupData::collection($countries),
            'screenSizes' => RollupData::collection($screenSizes),
        ]));
    }
}
