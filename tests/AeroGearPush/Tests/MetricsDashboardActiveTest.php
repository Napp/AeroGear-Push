<?php
/**
 * This file is part of the AeroGearPush package.
 *
 * (c) NAPP <http://napp.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AeroGearPush\Tests;

use Napp\AeroGearPush\Client\DummyClient;

/**
 * Class MetricsDashboardActiveTest
 *
 * @package AeroGearPush\Tests
 * @author  Hasse Ramlev Hansen <hasse@ramlev.dk>
 */
class MetricsDashboardActiveTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @throws \Napp\AeroGearPush\Exception\AeroGearAuthErrorException
     * @throws \Napp\AeroGearPush\Exception\AeroGearBadRequestException
     * @throws \Napp\AeroGearPush\Exception\AeroGearNotFoundException
     * @throws \Napp\AeroGearPush\Exception\AeroGearPushException
     */
    public function testMetricsDashboardActive()
    {
        $client = new DummyClient();

        $response = $client->call(
          'GET',
          'https://host.com/rest',
          'metrics/dashboard/active',
          [],
          [],
          []
        );

        $response = json_decode($response);

        $this->assertCount(0, $response);
    }
}
