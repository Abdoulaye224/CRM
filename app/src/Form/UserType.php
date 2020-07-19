<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [ 'attr' => ['placeholder' => 'Entrez votre email']])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Mot de passe', 'attr' => ['placeholder' => 'Entrez votre mot de passe']],
                'second_options' => ['label' => "Répéter le mot de passe", 'attr' => ['placeholder' => 'Entrez à nouveau votre mot de passe']],
            ])
            ->add('firstName', TextType::class, ['label' => "Prénom",   'attr' => ['placeholder' => 'Entrez votre prénom']])
            ->add('lastName', TextType::class, ['label' => "Nom", 'attr' => ['placeholder' => 'Entrez votre nom']])
            ->add('tag', TextType::class, ['label'=> "Tag", 'attr' => ['placeholder' => 'Entrez votre nom']])
            ->add('phoneNumber', TextType::class, ['label'=> "Numéro de téléphone", 'attr' => ['placeholder' => 'Entrez votre numéro de téléphone']])
            ->add('save', SubmitType::class, ['attr' => ['class' => "btn btn-lg btn-primary"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
