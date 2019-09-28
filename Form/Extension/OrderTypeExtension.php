<?php

namespace Plugin\ShoppingMessage\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Eccube\Form\Type\Shopping\OrderType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

/**
 * ご注文手続きのお問い合わせを必須にする
 *
 * @author Akira Kurozumi <info@a-zumi.net>
 */
class OrderTypeExtension extends AbstractTypeExtension {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if($options['skip_add_form']) {
            return;
        }
        
        $options = $builder->get('message')->getOptions();
        $options['required'] = true;
        $options['constraints'][] = new Assert\NotBlank;

        $builder->add('message', TextareaType::class, $options);
    }

    public function getExtendedType()
    {
        return OrderType::class;
    }

}
