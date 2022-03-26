<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvertRequest;
use App\Http\Resources\AdvertResource;
use App\Models\Advert;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            ->paginate('10');

        return response()->json(['data' => AdvertResource::collection($advert)], 200);
    }

    public function allAdverts()
    {
        $advert = $this->advert->paginate('10');

        return response()->json(['data' => AdvertResource::collection($advert)], 200);
    }


    public function store(AdvertRequest $request)
    {
        try {
            $data = $request->all();

            if($request->has('file')){
                $imagename = $data['name'] .'_'. time() .'_'. $request->file->getClientOriginalName();
                $path = $request->file('file')->storeAs('images', $imagename , 'public');;
                $data['file'] = Storage::url($path);
            }else{
                $data['file'] = '';
            }

            $this->advert->create($data);
            return response()->json(["Successfully created "],201);
        } catch (\Exception $e) {
            return response()->json(["Some error has occurred"],422);
        }
    }
}
