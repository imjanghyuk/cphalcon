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

namespace Phalcon\Test\Integration\Mvc\Router\Group;

use IntegrationTester;
use Phalcon\Mvc\Router\Group;
use Phalcon\Test\Fixtures\Traits\RouterTrait;

class AddGetCest
{
    use RouterTrait;

    /**
     * Tests Phalcon\Mvc\Router\Group :: addGet()
     *
     * @author Sid Roberts <https://github.com/SidRoberts>
     * @since  2019-04-17
     */
    public function mvcRouterGroupAddGet(IntegrationTester $I)
    {
        $I->wantToTest('Mvc\Router - addGet()');

        $router = $this->getRouter(false);

        $group = new Group();

        $group->addGet(
            '/docs/index',
            [
                'controller' => 'documentation4',
                'action'     => 'index',
            ]
        );

        $router->mount($group);


        $_SERVER['REQUEST_METHOD'] = 'GET';

        $router->handle('/docs/index');


        $I->assertEquals(
            'documentation4',
            $router->getControllerName()
        );

        $I->assertEquals(
            'index',
            $router->getActionName()
        );

        $I->assertEquals(
            [],
            $router->getParams()
        );
    }
}
