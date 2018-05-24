<?php

namespace App\Http\Controllers;

use App\Model\Sensor;
use App\Model\Input;
use App\Model\Location;
use App\Http\Requests\SensorRequest;
use App\Http\Resources\SensorResource;
use App\Http\Resources\SensorCollection;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SensorController extends Controller
{
    /**
     * Display a list of sensors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sensors = Sensor::all();

        if($sensors)
            return response([
                'data' => new SensorCollection($sensors)
            ], Response::HTTP_OK);
        else
            return response([
                'msg' => 'Sensors not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Create a sensor.
     *
     * @param  \Illuminate\Http\SensorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SensorRequest $request)
    {
        $sensor = new Sensor;
        $sensor->sensor = $request->sensor;
        $sensor->min = $request->min;
        $sensor->max = $request->max;
        $sensor->site_id = $request->site_id;
        $sensor->input_id = $request->input_id;
        $sensor->location_id = $request->location_id;
        $sensor->save();

        return response([
            'data' => new SensorResource($sensor)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function show(Sensor $sensor)
    {
        $sensor = Sensor::findOrFail($sensor_id);

        if($sensor)
            return response([
                'data' => new SensorResource($sensor)
            ], Response::HTTP_OK);
        else
            return response([
                'msg' => 'Sensor not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the sensor.
     *
     * @param  \Illuminate\Http\SensorRequest $request
     * @param  int  $sensor_id
     * @return \Illuminate\Http\Response
     */
    public function update(SensorRequest $request, $sensor_id)
    {
        $sensor = Sensor::findOrFail($sensor_id);
        $data = $request->all();
        $sensor->fill($data)->save();

        if($sensor)
            return response([
                'msg' => 'Sensor successfully updated'
            ], Response::HTTP_CREATED);
        else
            return response([
                'msg' => 'Sensor not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove a sensor.
     *
     * @param  \int  $sensor_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sensor_id)
    {
        $sensor = Sensor::findOrFail($sensor_id);
        $sensor->delete();

        if($sensor)
            return response([
                'msg' => 'Sensor successfully deleted'
            ], Response::HTTP_CREATED);
        else
            return response([
                'msg' => 'Sensor not found'
            ], Response::HTTP_NOT_FOUND);
    }
}
