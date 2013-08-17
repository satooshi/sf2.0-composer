<?php

$profile = array_key_exists('xhprof', $_GET) && extension_loaded('xhprof');

if ($profile) {
    xhprof_enable();
}

require_once __DIR__.'/../app/bootstrap.php.cache';
require_once __DIR__.'/../app/AppKernel.php';
//require_once __DIR__.'/../app/AppCache.php';

use Symfony\Component\HttpFoundation\Request;

$kernel = new AppKernel('prod', false);
$kernel->loadClassCache();
//$kernel = new AppCache($kernel);
$kernel->handle(Request::createFromGlobals())->send();

if ($profile) {
    $xhprofData = xhprof_disable();
    $xhprofRoot = '/var/php/xhprof';
    $xhprofSourceName = 'SF20';
    include_once $xhprofRoot . "/xhprof_lib/utils/xhprof_lib.php";
    include_once $xhprofRoot . "/xhprof_lib/utils/xhprof_runs.php";
    $xhprofRuns = new XHProfRuns_Default();
    $runId = $xhprofRuns->save_run($xhprofData, $xhprofSourceName);

    echo sprintf('<a href="http://xhprof.localhost/index.php?run=%s&source=%s" target="_blank">show xhprof result</a>', $runId, $xhprofSourceName);
}
