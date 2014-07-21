<?php
/**
 * @author KonstantinKuklin <konstantin.kuklin@gmail.com>
 */

namespace Symfony\Bundle\AsseticBundle\Command;

use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class GzipProperties for wrapping variables to file_put_contents
 *
 * @package Symfony\Bundle\AsseticBundle\Command
 */
class GzipProperties
{
    public static $use = null;
    public static $level = null;
    /** @var OutputInterface */
    public static $output = null;
}

/**
 * Override standard function file_put_contents for
 * Symfony\Bundle\AsseticBundle\Command namespace
 *
 * @param string $filePath
 * @param string $content
 */
function file_put_contents($filePath, $content)
{
    // save assetic file
    @\file_put_contents($filePath, $content);

    // check gzipping
    if (GzipProperties::$use) {

        // check gzip extension
        if (!function_exists("gzencode")) {
            throw new \RuntimeException('Unable to find Zlib library');
        }

        $filePath .= '.gz';
        GzipProperties::$output->writeln(
            sprintf(
                '<comment>%s</comment> <info>[gzipped file+]</info> %s',
                date('H:i:s'),
                $filePath
            )
        );

        if (false === @\file_put_contents($filePath, gzencode($content, GzipProperties::$level))) {
            throw new \RuntimeException('Unable to write file ' . $filePath);
        }
    }
}

namespace KonstantinKuklin\AsseticStaticGzipBundle\Command;

use Symfony\Bundle\AsseticBundle\Command\DumpCommand as BaseCommand;
use Symfony\Bundle\AsseticBundle\Command\GzipProperties;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Override assetic bundle command for gzip purposes.
 *
 * @author Konstantin Kuklin <konstantin.kuklin@gmail.com>
 */
class DumpCommand extends BaseCommand
{
    /**
     * {@inheritdoc}
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        // save properties
        GzipProperties::$use = $this->getContainer()->getParameter('assetic_static_gzip.use');
        GzipProperties::$level = $this->getContainer()->getParameter('assetic_static_gzip.level');
        GzipProperties::$output = $output;

        parent::initialize($input, $output);
    }
}
