<?php
/**
 * (c) 2012 Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\CheckoutBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

/**
 * @author Richard Shank <develop@zestic.com>
 */
class AddressFormType extends AbstractType
{
    protected $dataClass;
    protected $name;

    public function __construct($dataClass, $name)
    {
        $this->dataClass = $dataClass;
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('street1', 'text', array(
                'required' => true,
                'attr' => array(
                    'size' => '40',
                ),
            ))
            ->add('street2', 'text', array(
                'required' => false,
                'attr' => array(
                    'size' => '40',
                ),
            ))
            ->add('city', 'text', array(
                'required' => true,
                'attr' => array(
                    'size' => '20',
                ),
            ))
            ->add('state', 'vespolina_state', array(
                'required' => false,
            ))
            ->add('country', 'country', array(
                'required' => true,
                'preferred_choices' => array('US'),
            ))
            ->add('postalCode', 'text', array(
                'required' => true,
                'label' => 'Zipcode',
                'attr' => array(
                    'size' => '12',
                ),
            ))
        ;
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Vespolina\CheckoutBundle\Document\Address',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getParent(array $options)
    {
        return 'field';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'vespolina_address';
    }
}
