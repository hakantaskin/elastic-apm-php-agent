<?php

namespace HT\Serializers;

use HT\Stores\ErrorsStore;
use HT\Helper\Config;

/**
 *
 * Convert the Registered Errors to JSON Schema
 *
 * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
 *
 */
class Errors extends Entity implements JsonSerializable
{
    /**
     * @var \HT\Stores\ErrorsStore
     */
    private $store;

    /**
     * @param ErrorsStore $store
     */
    public function __construct(Config $config, ErrorsStore $store)
    {
        parent::__construct($config);
        $this->store = $store;
    }

    /**
     * Serialize Error Data to JSON "ready" Array
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->getSkeleton() + array(
                'errors' => $this->store
            );
    }
}
