<?php

namespace Topo;

use Composer\Script\Event;
use Composer\Installer\PackageEvent;
use Kirby\Toolkit\Dir;

class Topo
{
    public static function postPackageInstall(PackageEvent $event)
    {
        die("SSSS");
        $installedPackage = $event->getOperation()->getPackage();
        dump($installedPackage);die;
        // do stuff
    }

    public static function postAutoloadDump(Event $event)
    {

        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        require $vendorDir . '/autoload.php';

        $siteSkeletonDir = Dir::dirs(sprintf('%s/site', __DIR__), null, true);
        $siteDir = realpath(sprintf('%s/../site', $event->getComposer()->getConfig()->get('vendor-dir')));

        foreach ($siteSkeletonDir as $skeletonDir) {
            $dirName = basename($skeletonDir);

            $dir = sprintf('%s/%s', $siteDir, $dirName);
            if (is_dir($dir)) {
                Dir::remove($dir);
            }
            Dir::copy($skeletonDir, $dir);
        }
    }
}
