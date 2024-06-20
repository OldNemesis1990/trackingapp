<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

#Call Models
use App\Models\Profile;
use App\Models\User;
use App\Models\GeoLocationLatest;
use App\Models\GeoLocationLog;

#Call Events
use App\Events\GeolocationUpdated;

class GetGeolocationLatestController extends Controller
{
    public function view() {
        $currentUser = auth()->user();
        $usersInSameProfile = $currentUser->profile->profileUsers;

        // Eager load the geolocationLatest relationship
        $usersWithGeolocation = User::with('geolocationLatest')->whereIn('id', $usersInSameProfile->pluck('id'))->get();
        broadcast(new GeolocationUpdated($usersWithGeolocation));
        // Your logic here...

        return Inertia::render('GeoLocation/MapView', [
            // 'currentUser' => $currentUser,
            // 'usersInSameProfile' => $usersInSameProfile,
            'usersWithGeolocation' => $usersWithGeolocation,
        ]);
    }
}
