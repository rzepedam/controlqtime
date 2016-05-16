<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Http\Request;
use Controlqtime\Http\Requests;
use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Contracts\LegalRepresentativeRepoInterface;
use Controlqtime\Core\Contracts\ProvinceRepoInterface;
use Controlqtime\Core\Contracts\RegionRepoInterface;
use Controlqtime\Core\Contracts\TrademarkRepoInterface;

class AjaxLoadController extends Controller
{
    protected $company;
    protected $legal_representative;
    protected $province;
    protected $region;
    protected $trademark;

    public function __construct(RegionRepoInterface $region, ProvinceRepoInterface $province, CompanyRepoInterface $company, LegalRepresentativeRepoInterface $legal_representative, TrademarkRepoInterface $trademark)
    {
        $this->company              = $company;
        $this->legal_representative = $legal_representative;
        $this->province             = $province;
        $this->region               = $region;
        $this->trademark            = $trademark;
    }

    public function loadProvinces(Request $request) {
		return $this->region->findProvinces($request->get('id'));
    }

    public function loadCommunes(Request $request) {
		return $this->province->findCommunes($request->get('id'));
    }

	public function verificaEmail(Request $request) {

		switch($request->get('element'))
		{
			case 'Company':
				$email = $this->company->whereFirst('email', $request->get('email'), ['email']);
			break;

			case 'Representative':
                $email = $this->legal_representative->whereFirst('email_legal', $request->get('email'), ['email_legal']);
			break;

			case 'Manpower':
                $email = Manpower::where('email', $request->get('email'))->first();
		}

		if ($email)
            return response()->json(['success' => false], 400);

		return response()->json(['success' => true], 200);
    }

    public function loadModelVehicles(Request $request)
	{
		return $this->trademark->findModelVehicles($request->get('id'));
	}

    public function loadRouteAndVehicleSelectedInRound(Request $request)
	{
		$round = Round::with(['route', 'vehicle'])->find($request->get('id'));
        return $round;
	}
}
