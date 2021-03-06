<?php
/**
 * (c) 2011-2012 Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\CheckoutBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use Vespolina\CheckoutBundle\DependencyInjection\Compiler\CheckoutHandlerFactoryPass;
use Vespolina\CheckoutBundle\DependencyInjection\Compiler\FormPass;
/**
 * @author Richard Shank <develop@zestic.com>
 */
class VespolinaCheckoutBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new FormPass());
        $container->addCompilerPass(new CheckoutHandlerFactoryPass());
    }
}
