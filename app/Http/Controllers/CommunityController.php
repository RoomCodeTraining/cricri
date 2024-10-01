<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Http\Resources\CommunityApiResource;
class CommunityController extends Controller
{
    public function index()
    {
        $perPage = 10;

        $cities = Community::with(['city', 'municipality'])->paginate($perPage);

        return response()->json([
            "status" => "success",
            "message" => "OK",
            "data" => [
                "current_page" => $cities->currentPage(),
                "data" => CommunityApiResource::collection($cities),
                "first_page_url" => $cities->url(1),
                "from" => $cities->firstItem(),
                "last_page" => $cities->lastPage(),
                "last_page_url" => $cities->url($cities->lastPage()),
                "next_page_url" => $cities->nextPageUrl(),
                "prev_page_url" => $cities->previousPageUrl(),
                "to" => $cities->lastItem(),
                "total" => $cities->total(),
                "per_page" => $perPage,
            ]
        ], 200);
    }
}
