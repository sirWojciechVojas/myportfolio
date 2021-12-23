<?php

namespace App\Form;

use App\Entity\Skill;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class SkillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la compétence',
                'label_attr' => [
                    'class' => 'fw-bold'
                ]
            ])
            ->add('color', ColorType::class, [
                'label' => 'Couleur de la compétence',
                'label_attr' => [
                    'class' => 'fw-bold'
                ]
            ])
            ->add('level', IntegerType::class, [
                'label' => 'Pourcentage de la compétence',
                'label_attr' => [
                    'class' => 'fw-bold'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Skill::class,
        ]);
    }
}
