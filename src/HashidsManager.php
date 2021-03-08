<?php

/**
 * @Author: kidkang
 * @Date:   2021-03-09 07:41:17
 * @Last Modified by:   kidkang
 * @Last Modified time: 2021-03-09 07:42:07
 */
declare (strict_types = 1);

namespace Yjtec\Hashids;

use GrahamCampbell\Manager\AbstractManager;
use Hashids\Hashids;
use Illuminate\Contracts\Config\Repository;

/**
 * @method string encode(mixed ...$numbers)
 * @method array decode(string $hash)
 * @method string encodeHex(string $str)
 * @method string decodeHex(string $hash)
 */
class HashidsManager extends AbstractManager
{
    /**
     * @var \Yjtec\Hashids\HashidsFactory
     */
    protected $factory;

    public function __construct(Repository $config, HashidsFactory $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    protected function createConnection(array $config): Hashids
    {
        return $this->factory->make($config);
    }

    protected function getConfigName(): string
    {
        return 'hashids';
    }

    public function getFactory(): HashidsFactory
    {
        return $this->factory;
    }
}
