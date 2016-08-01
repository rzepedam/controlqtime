<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\AccessControlRepoInterface;
use Illuminate\Http\Request;
use Controlqtime\Http\Requests;

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

	public function index()
	{
		return view('human-resources.access-controls.index');
	}

	// Load data table access-control to bootstrap-table
	public function getAccessControls()
	{
		$access_controls = $this->access_control->all();
		return $access_controls;
	}

	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
