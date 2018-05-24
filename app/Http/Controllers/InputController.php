<?php

namespace App\Http\Controllers;

use App\Model\Input;
use App\Http\Requests\InputRequest;
use App\Http\Resources\InputResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InputController extends Controller
{
    /**
     * Display a list of inputs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inputs = Input::all();

        if($inputs)
            return response([
                'data' => new InputCollection($measurements)
            ], Response::HTTP_OK);
        else
            return response([
                'msg' => 'Inputs not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Create an input.
     *
     * @param  \Illuminate\Http\InputRequest $request
     * @return \Illuminate\Http\MeasurementResource
     */
    public function store(InputRequest $request)
    {
        $input = new Input;
        $input->input = $request->input;
        $input->measurement_id = $request->measurement_id;
        $input->save();

        return response([
            'data' => new InputResource($input)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display an input.
     *
     * @param  int  $input_id
     * @return \Illuminate\Http\Response
     */
    public function show($input_id)
    {
        $input = Input::findOrFail($input_id);

        if($input)
            return response([
                'data' => new InputResource($input)
            ], Response::HTTP_OK);
        else
            return response([
                'msg' => 'Input not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Update an input.
     *
     * @param  \Illuminate\Http\InputRequest $request
     * @param  int  $input_id
     * @return \Illuminate\Http\Response
     */
    public function update(InputRequest $request, $input_id)
    {
        $input = Input::findOrFail($input_id);
        $data = $request->all();
        $input->fill($data)->save();

        if($input)
            return response([
                'msg' => 'Input successfully updated'
            ], Response::HTTP_CREATED);
        else
            return response([
                'msg' => 'Input not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove an input.
     *
     * @param  \int  $input_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($input_id)
    {
        $input = Input::findOrFail($input_id);
        $input->delete();

        if($input)
            return response([
                'msg' => 'Input successfully deleted'
            ], Response::HTTP_CREATED);
        else
            return response([
                'msg' => 'Input not found'
            ], Response::HTTP_NOT_FOUND);
    }
}
