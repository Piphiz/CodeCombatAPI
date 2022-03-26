<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertResource;
use App\Models\Advert;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdvertsController extends Controller
{
    protected $advert;

    public function __construct(Advert $advert)
    {
        $this->advert = $advert;
    }

    public function index()
    {
        $advert = $this->advert
            ->where([
                ['status', "<>", 0],
                ['start_date', '<',Carbon::now()],
                ['end_date', '>',Carbon::now()],
            ])
            ->orWhere([
                ['status', "<>", 0],
                ['start_date', '=',null],
                ['end_date', '=',null],
            ])
            ->get();

        return response()->json(['data' => AdvertResource::collection($advert)], 200);
    }
}
