<?php
/**
 * This file is part of the Napp\AeroGearPush package.
 *
 * (c) NAPP <http://napp.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Napp\Client;

use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class curlClient
 *
 * @package Napp\Client
 * @author  Hasse Ramlev Hansen <hasse@ramlev.dk>]
 */
class curlClient
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * curlClient constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Parse request data and execute Guzzle request.
     *
     * @param       $method
     * @param       $url
     * @param       $endpoint
     * @param       $auth
     * @param       $data
     * @param array $options
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function call($method, $url, $endpoint, $auth, $data, $options = array())
    {
        $queryParams = null;

        // Parse query parameters.
        if (!empty($options['queryParam']) && is_array($options['queryParam'])) {
            $endpoint = rtrim($endpoint, '/');
            $endpoint .= '/?'.$queryParams = http_build_query(
                $options['queryParam']
              );
        }

        // Parse the headers array.
        if (!empty($data['headers'])) {
            $headers = $data['headers']['headers'];
            unset($data['headers']);

            // If Authorization bearer is avail, disable auth.
            if (isset($headers['Authorization'])) {
                $auth = [];
            }
        }

        // Set datatype, wheather it's a file upload or json
        if (isset($data['certificate'])) {
            $dataType                = 'form_params';
            $headers['Content-Type'] = 'multipart/form-data; boundary='.md5(
                time()
              );
        } else {
            $dataType                = 'json';
            $headers['Content-Type'] = 'application/json';
        }

            try {
            $response = $this->client->request(
              $method,
              $url.$endpoint,
              [
                'debug'   => false,
                'verify'  => isset($options['verifySSL']) ? $options['verifySSL'] : true,
                $dataType => $data,
                'auth'    => $auth,
                'headers' => $headers,
              ]
            );

            return $response;
        } catch (\Exception $e) {
            return new JsonResponse(
              $e->getResponse()->getReasonPhrase(), $e->getCode()
            );
        }
    }
}
