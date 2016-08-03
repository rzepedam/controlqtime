<?php

namespace Controlqtime\Core\Api\Http\Controllers;

use Webpatser\Uuid\Uuid;
use Dingo\Api\Routing\Helpers;
use Controlqtime\Helpers\Helper;
use Controlqtime\Http\Controllers\Controller;
use Controlqtime\Core\Api\Entities\AccessControl;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Controlqtime\Core\Api\Http\Requests\AccessControlRequest;
use Controlqtime\Core\Api\Transformers\AccessControlTransformer;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
			$data = $request->all();
			$data['uuid'] = Uuid::generate(4)->string;
			$data['rut'] = Helper::formatedRut($request->get('rut'));
			$accessControl = AccessControl::create($data);

			return $this->response->item($accessControl, new AccessControlTransformer());
		} catch ( ModelNotFoundException $e )
		{
			throw new NotFoundHttpException;
		}
	}

}
