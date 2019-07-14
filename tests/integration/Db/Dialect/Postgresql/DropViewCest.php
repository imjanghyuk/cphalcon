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

namespace Phalcon\Test\Integration\Db\Dialect\Postgresql;

use Codeception\Example;
use IntegrationTester;
use Phalcon\Db\Dialect\Postgresql;

class DropViewCest
{
    /**
     * Tests Phalcon\Db\Dialect\Postgresql :: dropView()
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2017-02-26
     *
     * @dataProvider getDropViewFixtures
     */
    public function dbDialectPostgresqlDropView(IntegrationTester $I, Example $example)
    {
        $I->wantToTest('Db\Dialect\Postgresql - dropView()');

        $schema   = $example[0];
        $ifExists = $example[1];
        $expected = $example[2];

        $dialect = new Postgresql();

        $actual = $dialect->dropView(
            'test_view',
            $schema,
            $ifExists
        );

        $I->assertInternalType(
            'string',
            $actual
        );

        $I->assertEquals($expected, $actual);
    }

    protected function getDropViewFixtures(): array
    {
        return [
            [null, false, 'DROP VIEW "test_view"'],
            [null, true, 'DROP VIEW IF EXISTS "test_view"'],
            ['schema', false, 'DROP VIEW "schema"."test_view"'],
            ['schema', true, 'DROP VIEW IF EXISTS "schema"."test_view"'],
        ];
    }
}
