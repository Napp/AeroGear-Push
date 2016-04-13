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
 * Class GetMetricsMessagesRequest
 *
 * GET info about submitted push messages for the given Push Application
 *
 * @package Napp\AeroGearPush\Request
 */
class GetMetricsMessagesRequest extends AbstractApplicationRequest
{
    /**
     * GetMetricsMessagesRequest constructor.
     */
    public function __construct($pushAppId)
    {
        if (true == $pushAppId) {
            $this->setPushAppId($pushAppId);
        }

        $this->setEndpoint('metrics/messages/application');
        $this->setMethod('GET');
    }

    /**
     * @param $pageNumber
     *
     * @return $this
     */
    public function setPageNumber($pageNumber)
    {
        $this->setQueryParam('page', $pageNumber);

        return $this;
    }

    /**
     * @param $itemsPerPage
     *
     * @return $this
     */
    public function setPerPage($itemsPerPage)
    {
        $this->setQueryParam('per_page', $itemsPerPage);

        return $this;
    }

    /**
     * @param $sort
     *
     * @return $this
     */
    public function setSort($sort)
    {
        $this->setQueryParam('sort', $sort);

        return $this;
    }

    /**
     * @param $search
     *
     * @return $this
     */
    public function setSearch($search)
    {
        $this->setQueryParam('search', $search);

        return $this;
    }
}
