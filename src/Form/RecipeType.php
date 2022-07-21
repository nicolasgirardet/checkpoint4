<?php

namespace App\Form;

use App\Entity\Recipe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Cuisine;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du plat'
            ])
            ->add('nbPeople', NumberType::class, 
            [
                'label' => 'Pour combien de personnes ?',
                'required' => false,
            ])
            ->add('prepTime', NumberType::class, [
                'label' => 'Temps de préparation (en minutes)',
                'required' => false,
            ])
            ->add('cookingTime', NumberType::class, [
                'label' => 'Temps de cuisson (en minutes)',
                'required' => false,
            ])
            ->add('ingredient', TextAreaType::class, [
                'label' => 'Liste des ingrédients',
            ])
            ->add('step', TextAreaType::class, [
                'label' => 'Étapes de fabrication'
            ])
            ->add('picture', TextType::class, [
                'label' => 'Ajouter une image',
                'required' => false,

            ])
            ->add('cuisine', EntityType::class, [
                'class' => Cuisine::class,
                'choice_label' => 'name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
