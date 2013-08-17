<?php

require __DIR__ . '/../vendor/symfony/symfony/src/Symfony/Component/ClassLoader/ApcUniversalClassLoader.php';

use Symfony\Component\ClassLoader\ApcUniversalClassLoader;
use Symfony\Component\ClassLoader\UniversalClassLoader;
use Doctrine\Common\Annotations\AnnotationRegistry;

//$loader = new UniversalClassLoader();
$loader = new ApcUniversalClassLoader('sf20');
$loader->registerNamespaces(array(
    'Symfony\\Bundle\\AsseticBundle'       => __DIR__.'/../vendor/symfony/assetic-bundle',
    'Symfony'                              => __DIR__.'/../vendor/symfony/symfony/src',
    'Sensio\\Bundle\\DistributionBundle'   => __DIR__.'/../vendor/sensio/distribution-bundle',
    'Sensio\\Bundle\\FrameworkExtraBundle' => __DIR__.'/../vendor/sensio/framework-extra-bundle',
    'Sensio\\Bundle\\GeneratorBundle'      => __DIR__.'/../vendor/sensio/generator-bundle',
    'JMS\\SecurityExtraBundle'             => __DIR__.'/../vendor/jms/security-extra-bundle',
    'Doctrine\\Common'                     => __DIR__.'/../vendor/doctrine/common/lib',
    'Doctrine\\DBAL'                       => __DIR__.'/../vendor/doctrine/dbal/lib',
    'Doctrine'                             => __DIR__.'/../vendor/doctrine/orm/lib',
    'Monolog'                              => __DIR__.'/../vendor/monolog/monolog/src',
    'Assetic'                              => __DIR__.'/../vendor/kriswallsmith/assetic/src',
    'Metadata'                             => __DIR__.'/../vendor/jms/metadata/src',
));
$loader->registerPrefixes(array(
    'Twig_Extensions_' => __DIR__.'/../vendor/twig/extensions/lib',
    'Twig_'            => __DIR__.'/../vendor/twig/twig/lib',
));

// intl
if (!function_exists('intl_get_error_code')) {
    require_once __DIR__.'/../vendor/symfony/src/Symfony/Component/Locale/Resources/stubs/functions.php';

    $loader->registerPrefixFallbacks(array(__DIR__.'/../vendor/symfony/src/Symfony/Component/Locale/Resources/stubs'));
}

$loader->registerNamespaceFallbacks(array(
    __DIR__.'/../src',
));
$loader->register();

require __DIR__ . '/../vendor/doctrine/common/lib/Doctrine/Common/Annotations/AnnotationRegistry.php';
AnnotationRegistry::registerLoader(function($class) use ($loader) {
    $loader->loadClass($class);
    return class_exists($class, false);
});
AnnotationRegistry::registerFile(__DIR__.'/../vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');

require __DIR__.'/../vendor/swiftmailer/swiftmailer/lib/swift_required.php';
//Swift::registerAutoload(__DIR__ . '/../vendor/swiftmailer/swiftmailer/lib/swift_init.php');
