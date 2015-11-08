<?php

namespace KonstantinKuklin\AsseticStaticGzipBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class AsseticStaticGzipBundle
 *
 * @author KonstantinKuklin <konstantin.kuklin@gmail.com>
 */
class AsseticStaticGzipBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'AsseticBundle';
    }
}
