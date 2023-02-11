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
            'cc' => ['required', 'string', 'max:3'],
            'ss' => ['required', 'string', 'max:255'],
            'ua' => ['required', 'string', 'max:255'],
        ]);

        $website
            ->pageViews()
            ->create([
                'session_id' => $request->session()->getId(),
                'host' => $validated['h'],
                'path' => $validated['p'],
                'country_code' => $validated['cc'],
                'screen_size' => $validated['ss'],
                'user_agent' => $validated['ua'],
            ]);

        return response()->noContent(201);
    }
}
