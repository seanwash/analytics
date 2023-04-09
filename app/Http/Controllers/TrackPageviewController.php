<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Services\CountryCodeResolver;
use Illuminate\Http\Request;

class TrackPageviewController extends Controller
{
    public function __invoke(Request $request, Website $website, CountryCodeResolver $countryCodeResolver)
    {
        abort_unless($request->wantsJson(), 405);
        abort_unless(
            $request->input('h') === $website->domain,
            403
        );

        $validated = $request->validate([
            'h' => ['required', 'string', 'max:255'],
            'p' => ['required', 'string', 'max:255'],
            'ss' => ['required', 'string', 'max:255'],
            'tz' => ['required', 'string', 'max:255'],
        ]);

        $website
            ->pageViews()
            ->create([
                'session_id' => sha1($request->ip().$request->userAgent().$website->id),
                'user_agent' => $request->userAgent(),
                'host' => $validated['h'],
                'path' => $validated['p'],
                'country_code' => $countryCodeResolver->resolveFromTimeZone($validated['tz']),
                'screen_size' => $validated['ss'],
            ]);

        return response()->noContent(201);
    }
}
