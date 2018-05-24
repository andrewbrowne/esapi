<?php

namespace App\Http\Controllers;

use App\Model\Site;
use App\Http\Requests\SiteRequest;
use App\Http\Resources\SiteResource;
use App\Http\Resources\SiteCollection;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteController extends Controller
{
    /**
     * Display a list of sites.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::all();

        if($sites)
            return response([
                'data' => new SiteCollection($sites)
            ], Response::HTTP_OK);
        else
            return response([
                'msg' => 'Sites not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Create a site.
     *
     * @param  \Illuminate\Http\SiteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteRequest $request)
    {
        $site = new Site;
        $site->site = $request->site;
        $site->save();

        return response([
            'data' => new SiteResource($site)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display a site.
     *
     * @param  int  $site_id
     * @return \Illuminate\Http\Response
     */
    public function show($site_id)
    {
        $site = Site::findOrFail($site_id);

        if($site)
            return response([
                'data' => new SiteResource($site)
            ], Response::HTTP_OK);
        else
            return response([
                'msg' => 'Site not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Update a site.
     *
     * @param  \Illuminate\Http\SiteRequest $request
     * @param  int  $site_id
     * @return \Illuminate\Http\Response
     */
    public function update(SiteRequest $request, $site_id)
    {
        $site = Site::findOrFail($site_id);
        $data = $request->all();
        $site->fill($data)->save();

        if($site)
            return response([
                'msg' => 'Site successfully updated'
            ], Response::HTTP_CREATED);
        else
            return response([
                'msg' => 'Site not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove a site.
     *
     * @param  \int  $site_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($site_id)
    {
        $site = Site::findOrFail($site_id);
        $site->delete();

        if($site)
            return response([
                'msg' => 'Site successfully deleted'
            ], Response::HTTP_CREATED);
        else
            return response([
                'msg' => 'Site not found'
            ], Response::HTTP_NOT_FOUND);
    }
}
