<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\AccessControlRepoInterface;

class AccessControlController extends Controller
{
    /**
     * @var AccessControlRepoInterface
     */
    protected $access_control;

    /**
     * AccessControlController constructor.
     * @param AccessControlRepoInterface $access_control
     */
    public function __construct(AccessControlRepoInterface $access_control)
    {
        $this->access_control = $access_control;
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getAccessControls()
    {
        $access_controls = $this->access_control->all();

        return $access_controls;
    }
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function index()
    {
        return view('human-resources.access-controls.index');
    }

}
