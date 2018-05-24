<?php

namespace App\Http\Controllers;

use App\Model\Measurement;
use App\Http\Requests\MeasurementRequest;
use App\Http\Resources\MeasurementResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MeasurementController extends Controller
{
    /**
     * Display a listof measurements.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $measurements = Measurement::all();

        if($measurements)
            return response([
                'data' => new MeasurementCollection($measurements)
            ], Response::HTTP_OK);
        else
            return response([
                'msg' => 'Measurements not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Create a measurement.
     *
     * @param  \Illuminate\Http\MeasurementRequest $request
     * @return \Illuminate\Http\MeasurementResource
     */
    public function store(Request $request)
    {
        $measurement = new Unit;
        $measurement->measurement = $request->measurement;
        $measurement->unit = $request->unit;
        $measurement->abbreviation = $request->abbreviation;
        $measurement->save();

        return response([
            'data' => new MeasurementResource($measurement)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display a measurement.
     *
     * @param  int  $measurement_id
     * @return \Illuminate\Http\Response
     */
    public function show($measurement_id)
    {
        $measurement = Measurement::findOrFail($measurement_id);

        if($measurement)
            return response([
                'data' => new MeasurementResource($measurement)
            ], Response::HTTP_OK);
        else
            return response([
                'msg' => 'Measurement not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Update a measurement.
     *
     * @param  \Illuminate\Http\MeasurementRequest  $request
     * @param  int  $measurement_id
     * @return \Illuminate\Http\Response
     */
    public function update(MeasurementRequest $request, $measurement_id)
    {
        $measurement = Measurement::findOrFail($measurement_id);
        $data = $request->all();
        $measurement->fill($data)->save();

        if($measurement)
            return response([
                'msg' => 'Measurement successfully updated'
            ], Response::HTTP_CREATED);
        else
            return response([
                'msg' => 'Measurement not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove a measurement.
     *
     * @param  \int  $measurement_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($measurement_id)
    {
        $measurement = Measurement::findOrFail($measurement_id);
        $measurement->delete();

        if($measurement)
            return response([
                'msg' => 'Measurement successfully deleted'
            ], Response::HTTP_CREATED);
        else
            return response([
                'msg' => 'Measurement not found'
            ], Response::HTTP_NOT_FOUND);
    }
}
