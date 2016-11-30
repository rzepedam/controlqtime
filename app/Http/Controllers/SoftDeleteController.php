<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class SoftDeleteController extends Controller
{
	/**
	 * @var string
	 */
	protected $dirEntity = 'Controlqtime\Core\Entities\\';
	
	/**
	 * @var
	 */
	protected $model;
	
	/**
	 * @param $entity
	 *
	 * @return bool
	 */
	protected function checkClass($entity)
	{
		$model = $this->dirEntity . ucfirst($entity);
		
		if ( class_exists($model) )
		{
			$this->model = new $model;
			
			return true;
		}
		
		return false;
	}
	
	/**
	 * @param Request $request
	 *
	 * @return bool
	 */
	public function findDataForRestore(Request $request)
	{
		try
		{
			if ( $this->checkClass($request->get('entity')) )
			{
				$this->model->onlyTrashed()->where($request->get('field'), $request->get('name'))->firstOrFail();
				
				return response()->json(['status' => true]);
			}
			
			return response()->json(['status' => false]);
		} catch ( Exception $e )
		{
			return response()->json(['status' => false]);
		}
	}
	
	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function restore(Request $request)
	{
		try
		{
			if ( $this->checkClass($request->get('entity')) )
			{
				$model = $this->model->onlyTrashed()->where($request->get('field'), $request->get('name'))->firstOrFail();
				$model->restore();
				
				return response()->json([
					'status' => true,
				]);
			}
			
			return response()->json(['status' => false]);
		} catch ( Exception $e )
		{
			return response()->json(['status' => false]);
		}
	}
}
