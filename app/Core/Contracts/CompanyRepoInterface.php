<?php
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 02-05-16
 * Time: 12:08 PM
 */

namespace Controlqtime\Core\Contracts;

use Controlqtime\Core\Contracts\Base\BaseRepoInterface;
use Controlqtime\Core\Contracts\Base\BaseRepoListsInterface;
use Controlqtime\Core\Contracts\Base\BaseRepoWhereInterface;

interface CompanyRepoInterface extends BaseRepoInterface, BaseRepoListsInterface, BaseRepoWhereInterface
{

}