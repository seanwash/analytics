<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class TrackPageviewController extends Controller
{
    public function __invoke(Request $request, Website $website)
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
            'cc' => ['required', 'string', 'max:255'],
        ]);

        $website
            ->pageViews()
            ->create([
                'session_id' => sha1($request->ip() . $request->userAgent() . $website->id),
                'user_agent' => $request->userAgent(),
                'host' => $validated['h'],
                'path' => $validated['p'],
                'country_code' => $validated['cc'],
                'screen_size' => $validated['ss'],
            ]);

        return response()->noContent(201);
    }
}
