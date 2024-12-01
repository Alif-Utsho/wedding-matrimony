<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProfileView;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProfileviewController extends Controller {
    function __construct() {
        $this->middleware('check.access:visitor-list')->only(['recentVisitor']);
    }

    public function recentView() {
        $userId     = Auth::guard('api')->id();
        $profileIds = ProfileView::where('viewer_id', $userId)->where('user_id', '<>', $userId)->latest()->pluck('user_id');

        $recent_views = User::with('profile')->whereIn('id', $profileIds)->limit(50)->get();

        return response()->json(compact('recent_views'));
    }

    public function recentVisitor() {
        $userId = Auth::guard('api')->id();

        $todays_profileIds = ProfileView::where('user_id', $userId)->where('viewer_id', '<>', $userId)->whereDate('created_at', Carbon::today())->latest()->pluck('viewer_id');
        $todays_visitors   = User::with('profile')->whereIn('id', $todays_profileIds)->get();

        $todays_profileIds = ProfileView::where('user_id', $userId)->where('viewer_id', '<>', $userId)->whereDate('created_at', '<>', Carbon::today())->latest()->pluck('viewer_id');
        $previous_visitors = User::with('profile')->whereIn('id', $todays_profileIds)->get();

        return response()->json(compact('todays_visitors', 'previous_visitors'));
    }
}
