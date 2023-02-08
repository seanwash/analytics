<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class TrackPageviewController extends Controller
{
    public function __invoke(Request $request, Website $website)
    {
        abort_unless($request->wantsJson(), 405);

        $request->validate([
            'host' => ['required', 'string', 'max:255'],
            'path' => ['required', 'string', 'max:255'],
            'country_code' => ['required', 'string', 'max:3'],
            'screen_size' => ['required', 'string', 'max:255'],
            'user_agent' => ['required', 'string', 'max:255'],
        ]);

        $website
            ->pageViews()
            ->create([
                'host' => $request->input('host'),
                'path' => $request->input('path'),
                'country_code' => $request->input('country_code'),
                'screen_size' => $request->input('screen_size'),
                'user_agent' => $request->input('user_agent'),
            ]);

        return response()->noContent(201);
    }
}
