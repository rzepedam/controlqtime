<?php

namespace Controlqtime\Core\Api\Http\Controllers;

use Controlqtime\Core\Api\Entities\AccessControl;
use Controlqtime\Core\Api\Http\Requests\AccessControlRequest;
use Controlqtime\Core\Api\Transformers\AccessControlTransformer;
use Controlqtime\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Dingo\Api\Routing\Helpers;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Webpatser\Uuid\Uuid;

class AccessControlController extends Controller
{
    use Helpers;

	/**
	 * @return \Dingo\Api\Http\Response
	 */
	public function index()
    {
        return $this->response->paginator(AccessControl::paginate(10), new AccessControlTransformer());
    }

	/**
	 * @param AccessControlRequest $request
	 * @return \Dingo\Api\Http\Response
	 */
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

}
