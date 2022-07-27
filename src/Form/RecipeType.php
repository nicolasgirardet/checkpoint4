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
                'label' => 'Name of your dish'
            ])
            ->add('nbPeople', NumberType::class, 
            [
                'label' => 'Servings',
                'required' => false,
            ])
            ->add('prepTime', NumberType::class, [
                'label' => 'Preparation time (in minutes)',
                'required' => false,
            ])
            ->add('cookingTime', NumberType::class, [
                'label' => 'Cooking time (in minutes)',
                'required' => false,
            ])
            ->add('ingredient', TextAreaType::class, [
                'label' => 'List of ingredients',
            ])
            ->add('step', TextAreaType::class, [
                'label' => 'Directions'
            ])
            ->add('pictureOne', TextType::class, [
                'label' => 'Add a picture',
                'required' => false,

            ])
            ->add('pictureTwo', TextType::class, [
                'label' => 'Add a picture',
                'required' => false,

            ])
            ->add('pictureThree', TextType::class, [
                'label' => 'Add a picture',
                'required' => false,

            ])
            ->add('pictureFour', TextType::class, [
                'label' => 'Add a picture',
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
