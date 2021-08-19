<?php

/*
 * This file is part of the AnywhereProduct
 *
 * Copyright (C) 2016 Nobuhiko Kimoto
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AnywhereProduct\Twig\Extension;

use Eccube\Common\Constant;
use Eccube\Util\Str;
use Silex\Application;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductExtension extends \Twig_Extension
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Name of this extension
     *
     * @return string
     */
    public function getName()
    {
        return 'eccube_product';
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('product', array($this, 'getProduct')),
        );
    }

    public function getProduct($id) {
        $Product = $this->app['eccube.repository.product']->get($id);
        //if (count($Product->getProductClasses()) < 1) {
        //    throw new NotFoundHttpException();
        //}
        return $Product;
    }
}
