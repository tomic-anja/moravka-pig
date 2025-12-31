<?php

namespace App\Form\Type;

use App\Entity\SocialMedia;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class SocialMediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code', TextType::class, [
                'label' => 'Kod',
                'required' => true,
            ])
            ->add('title', TextType::class, [
                'label' => 'Naslov',
                'required' => true,
            ])
            ->add('link', TextType::class, [
                'label' => 'Link',
                'required' => true,
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SocialMedia::class,
        ]);
    }
}