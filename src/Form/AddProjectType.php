<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\Skill;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du projet',
                'label_attr' => [
                    'class' => 'fw-bold'
                ]
            ])
            ->add('chapo', TextareaType::class, [
                'label' => 'Description du projet',
                'label_attr' => [
                    'class' => 'fw-bold'
                ]
            ])
            ->add('website', UrlType::class, [
                'label' => 'Url du site web',
                'required' => false,
                'label_attr' => [
                    'class' => 'fw-bold'
                ]
            ])
            ->add('github', UrlType::class, [
                'label' => 'Url du repository',
                'required' => false,
                'label_attr' => [
                    'class' => 'fw-bold'
                ]
            ])
            ->add('featured', ImageType::class, [
                'label' => 'Image mise en avant',
                'label_attr' => [
                    'class' => 'fw-bold fs-4'
                ]
            ])
            ->add('skills', EntityType::class, [
                'label' => 'Compétences associées',
                'label_attr' => [
                    'class' => 'fw-bold'
                ],
                'class' => Skill::class,
                'choice_label' => 'name',
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
