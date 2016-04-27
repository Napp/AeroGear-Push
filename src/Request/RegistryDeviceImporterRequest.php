<?php
/**
 * This file is part of the AeroGearPush package.
 *
 * (c) Napp <http://napp.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Napp\AeroGearPush\Request;

/**
 * Class RegistryDeviceImporterRequest
 *
 * @package Napp\AeroGearPush\Request
 */
class RegistryDeviceImporterRequest extends AbstractApplicationRequest
{
    /**
     * @var
     */
    public $variantID;

    /**
     * @var
     */
    public $variantSecret;

    /**
     * SenderPushRequest constructor.
     */
    public function __construct()
    {
        $this->setEndpoint('registry/device/importer');
        $this->setMethod('POST');
    }

    /**
     * @param array $variantID
     *
     * @return $this
     */
    public function setVariantID(array $variantID)
    {
        $this->variantID = $variantID;

        return $this;
    }

    /**
     * @param array $variantSecret
     *
     * @return $this
     */
    public function setVariantSecret(array $variantSecret)
    {
        $this->variantSecret = $variantSecret;

        return $this;
    }

    /**
     * @param array $tokens
     *
     * @return $this
     */
    public function setTokens($tokens)
    {
        $this->setData('tokens', $tokens);
        return $this;
    }
}
