<?php

namespace Controlqtime\Core\Api\Http\Controllers;

use Controlqtime\Core\Api\Entities\AccessControl;
use Controlqtime\Core\Api\Http\Requests\AccessControlRequest;
use Controlqtime\Core\Api\Transformers\AccessControlTransformer;
use Controlqtime\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Webpatser\Uuid\Uuid;

class AccessControlController extends Controller
{
    use Helpers;

    public function index()
    {
        return $this->response->paginator(AccessControl::paginate(10), new AccessControlTransformer());
    }

    public function store(AccessControlRequest $request)
    {
    	try
		{
			$data          = $request->all();
			$data['uuid']  = Uuid::generate(4)->string;
			$accessControl = AccessControl::create($data);

			return $this->response->item($accessControl, new AccessControlTransformer());
		}catch (ModelNotFoundException $e) {
			throw new NotFoundHttpException;
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
