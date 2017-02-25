<?php

use Tests\TestHelper;
use Tests\CreatesApplication;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

class BrowserKitTestCase extends BaseTestCase
{
	use CreatesApplication, TestHelper;
}
