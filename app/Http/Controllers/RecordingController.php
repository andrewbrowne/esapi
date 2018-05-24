<?php

namespace App\Http\Controllers;

use App\Model\Recording;
use App\Model\Sensor;
use App\Http\Requests\RecordingRequest;
use App\Http\Resources\RecordingResource;
use App\Http\Resources\RecordingCollection;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RecordingController extends Controller
{
    /**
     * Display a list of recordings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recordings = Recording::all();

        if($recordings)
            return response([
                'data' => new RecordingCollection($recordings)
            ], Response::HTTP_OK);
        else
            return response([
                'msg' => 'Recordings not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Create a recording.
     *
     * @param  \Illuminate\Http\RecordingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecordingRequest $request)
    {
        $recording = new Recording;
        $recording->sensor_id = $request->sensor_id;
        $recording->value = $request->value;
        $recording->save();

        return response([
            'data' => new RecordingResource($recording)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display a recording.
     *
     * @param  int  $recording_id
     * @return \Illuminate\Http\Response
     */
    public function show($recording_id)
    {
        $recording = Recording::findOrFail($recording_id);

        if($recording)
            return response([
                'data' => new RecordingResource($recording)
            ], Response::HTTP_OK);
        else
            return response([
                'msg' => 'Recording not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the recording.
     *
     * @param  \Illuminate\Http\RecordingRequest $request
     * @param  int  $recording_id
     * @return \Illuminate\Http\Response
     */
    public function update(RecordingRequest $request, $recording_id)
    {
        $recording = Recording::findOrFail($recording_id);
        $data = $request->all();
        $recording->fill($data)->save();

        if($recording)
            return response([
                'msg' => 'Recording successfully updated'
            ], Response::HTTP_CREATED);
        else
            return response([
                'msg' => 'Recording not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove a recording.
     *
     * @param  \int  $recording_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($recording_id)
    {
        $recording = Recording::findOrFail($recording_id);
        $recording->delete();

        if($recording)
            return response([
                'msg' => 'Recording successfully deleted'
            ], Response::HTTP_CREATED);
        else
            return response([
                'msg' => 'Recording not found'
            ], Response::HTTP_NOT_FOUND);
    }
}
