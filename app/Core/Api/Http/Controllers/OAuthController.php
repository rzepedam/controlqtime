<?php

namespace Controlqtime\Core\Api\Http\Controllers;

use Authorizer;
use Controlqtime\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use Controlqtime\Http\Requests;

class OAuthController extends Controller
{
	use Helpers;

    public function authorizeClient() {
		return $this->response->array(Authorizer::issueAccessToken());
    }
}
