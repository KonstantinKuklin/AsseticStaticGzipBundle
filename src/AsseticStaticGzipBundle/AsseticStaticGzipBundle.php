<?php
/**
 * @author KonstantinKuklin <konstantin.kuklin@gmail.com>
 */

namespace KonstantinKuklin\AsseticStaticGzipBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AsseticStaticGzipBundle extends Bundle
{
    /**
     * Override Assetic bundle
     *
     * @return string
     */
    public function getParent()
    {
        return 'AsseticBundle';
    }
}
