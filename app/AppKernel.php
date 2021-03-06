<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

//            new Clastic\CoreBundle\ClasticCoreBundle(),
//            new Clastic\NodeBundle\ClasticNodeBundle(),
//            new Clastic\AliasBundle\ClasticAliasBundle(),
//            new Clastic\BackofficeBundle\ClasticBackofficeBundle(),
//            new Clastic\UserBundle\ClasticUserBundle(),
//            new Clastic\MenuBundle\ClasticMenuBundle(),
//            new Clastic\TextBundle\ClasticTextBundle(),
//
//            new FOS\UserBundle\FOSUserBundle(),
//            new WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle(),
//            new WhiteOctober\BreadcrumbsBundle\WhiteOctoberBreadcrumbsBundle(),
//            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
//            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
//
            new AppBundle\AppBundle(),


            new Clastic\CoreBundle\ClasticCoreBundle(),

            new Clastic\BackofficeBundle\ClasticBackofficeBundle(),
            new WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle(),
            new WhiteOctober\BreadcrumbsBundle\WhiteOctoberBreadcrumbsBundle(),

            new Clastic\AliasBundle\ClasticAliasBundle(),

            new Clastic\TextBundle\ClasticTextBundle(),

            new FOS\UserBundle\FOSUserBundle(),
            new Clastic\UserBundle\ClasticUserBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new Clastic\NodeBundle\ClasticNodeBundle(),

            new Clastic\MenuBundle\ClasticMenuBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new Clastic\BlogBundle\ClasticBlogBundle(),
//            new Demo\Bundle\DemoBundle(),
            new Clastic\FrontBundle\ClasticFrontBundle(),
            new Clastic\MediaBundle\ClasticMediaBundle(),
            new Clastic\TaxonomyBundle\ClasticTaxonomyBundle(),
            new Clastic\BlockBundle\ClasticBlockBundle(),
            new Ivory\OrderedFormBundle\IvoryOrderedFormBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Clastic\GeneratorBundle\ClasticGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
