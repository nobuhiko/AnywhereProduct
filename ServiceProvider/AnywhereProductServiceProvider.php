<?php

/*
 * This file is part of the AnywhereProduct
 *
 * Copyright (C) 2016 Nobuhiko Kimoto
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AnywhereProduct\ServiceProvider;

use Eccube\Application;
use Monolog\Handler\FingersCrossed\ErrorLevelActivationStrategy;
use Monolog\Handler\FingersCrossedHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Plugin\AnywhereProduct\Form\Type\AnywhereProductConfigType;
use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;
use Symfony\Component\Yaml\Yaml;


class AnywhereProductServiceProvider implements ServiceProviderInterface
{
    public function register(BaseApplication $app)
    {
        $this->app = $app;

        $app['twig'] = $app->share($app->extend('twig', function($twig, $app) {
            //$twig->addFunction('product', new \Twig_SimpleFunction('product', array($this, 'getProduct')));
            $twig->addExtension(new \Plugin\AnywhereProduct\Twig\Extension\ProductExtension($app));
            return $twig;
        }));
    }

    public function boot(BaseApplication $app)
    {
    }
}
