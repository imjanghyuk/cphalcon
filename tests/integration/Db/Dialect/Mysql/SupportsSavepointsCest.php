<?php
declare(strict_types=1);

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalconphp.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

namespace Phalcon\Test\Integration\Db\Dialect\Mysql;

use IntegrationTester;
use Phalcon\Db\Dialect\Mysql;

class SupportsSavepointsCest
{
    /**
     * Tests Phalcon\Db\Dialect\Mysql :: supportsSavepoints()
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2017-02-26
     */
    public function dbDialectMysqlSupportsSavepoints(IntegrationTester $I)
    {
        $I->wantToTest('Db\Dialect\Mysql - supportsSavepoints()');

        $dialect = new Mysql();

        $I->assertTrue(
            $dialect->supportsSavepoints()
        );
    }
}
