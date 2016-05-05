<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Http\Request;
use Controlqtime\Http\Requests;
use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Contracts\LegalRepresentativeRepoInterface;
use Controlqtime\Core\Contracts\ProvinceRepoInterface;
use Controlqtime\Core\Contracts\RegionRepoInterface;
use Controlqtime\Core\Contracts\SubsidiaryRepoInterface;
use Controlqtime\Core\Contracts\TrademarkRepoInterface;

class AjaxLoadController extends Controller
{
    protected $company;
    protected $legal_representative;
    protected $province;
    protected $region;
    protected $subsidiary;
    protected $trademark;

    public function __construct(RegionRepoInterface $region, ProvinceRepoInterface $province, CompanyRepoInterface $company, LegalRepresentativeRepoInterface $legal_representative, SubsidiaryRepoInterface $subsidiary, TrademarkRepoInterface $trademark)
    {
        $this->company = $company;
        $this->legal_representative = $legal_representative;
        $this->province = $province;
        $this->region = $region;
        $this->subsidiary = $subsidiary;
        $this->trademark = $trademark;
    }

    public function loadProvinces(Request $request) {
		return $this->region->find($request->get('id'));
    }

    public function loadCommunes(Request $request) {
		return $this->province->find($request->get('id'));
    }

	public function verificaEmail(Request $request) {
		
		switch($request->get('element'))
		{
			case 'Company':
				$exists = $this->company->whereFirst('email', $request->get('email'));
			break;

			case 'Representative':
                $exists = $this->legal_representative->whereFirst('email_legal', $request->get('email'));
			break;

			case 'Subsidiary':
                $exists = $this->subsidiary->whereFirst('email_suc', $request->get('email'));
			break;

			case 'Manpower':
                $exists = Manpower::where('email', $request->get('email'))->first();
		}

		if ($exists)
			return response()->json(['success' => false], 400);

		return response()->json(['success' => true], 200);
    }

    public function loadModelVehicles(Request $request)
	{
		$model_vehicles = Trademark::find($request->get('id'))->modelVehicles;
		return $model_vehicles->lists('name', 'id');
	}

    public function loadRouteAndVehicleSelectedInRound(Request $request)
	{
		$round = Round::with(['route', 'vehicle'])->find($request->get('id'));
        return $round;
	}
}
