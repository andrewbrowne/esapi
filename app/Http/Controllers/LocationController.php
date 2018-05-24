<?php

namespace App\Http\Controllers;

use App\Model\Location;
use App\Model\Site;
use App\Http\Requests\LocationRequest;
use App\Http\Resources\LocationResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocationController extends Controller
{
    /**
     * Display a list of locations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($locations)
            return response([
                'data' => new LocationCollection($locations)
            ], Response::HTTP_OK);
        else
            return response([
                'msg' => 'Locations not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Create a location.
     *
     * @param  \Illuminate\Http\LocationRequest $request
     * @return \Illuminate\Http\LocationResource
     */
    public function store(LocationRequest $request)
    {
        $location = new Location;
        $location->input = $request->input;
        $location->site_id = $request->site_id;
        $location->save();

        return response([
            'data' => new LocationResource($location)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display a location.
     *
     * @param  int  $location_id
     * @return \Illuminate\Http\Response
     */
    public function show($location_id)
    {
        $location = Location::findOrFail($location_id);

        if($location)
            return response([
                'data' => new LocationResource($location)
            ], Response::HTTP_OK);
        else
            return response([
                'msg' => 'Location not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Update a location
     *
     * @param  \Illuminate\Http\Location $request
     * @param  int  $location_id
     * @return \Illuminate\Http\Response
     */
    public function update(Location $request, $location_id)
    {
        $location = Location::findOrFail($location_id);
        $data = $request->all();
        $location->fill($data)->save();

        if($location)
            return response([
                'msg' => 'Location successfully updated'
            ], Response::HTTP_CREATED);
        else
            return response([
                'msg' => 'Location not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove a location.
     *
     * @param  \int  $location_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($location_id)
    {
        $location = Location::findOrFail($location_id);
        $location->delete();

        if($location)
            return response([
                'msg' => 'Location successfully deleted'
            ], Response::HTTP_CREATED);
        else
            return response([
                'msg' => 'Location not found'
            ], Response::HTTP_NOT_FOUND);
    }
}
