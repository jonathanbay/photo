<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Karser\Recaptcha3Bundle\Form\Recaptcha3Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomPrenom', TextType::class, [
                'label' => false,
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
                'constraints' => new Regex([
                    'pattern' => '/[^a-zA-Z]$/',
                    'match' => false,
                        'message' => 'Seules les lettres sont autorisées',
                    ]),
                'attr' => [
                    'placeholder' => 'Votre nom et prénom',
                    'class' => 'inputContact'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 60
                ]), 
                'attr' => [
                    'placeholder' => 'Votre email',
                    'class' => 'inputContact'
                ]
            ])
            ->add('telephone', TextType::class, [
                'label' => false,
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 20
                ]),
                'attr' => [
                    'placeholder' => 'Votre téléphone',
                    'class' => 'inputContact'
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Une question? une demande de renseignements? c\'est par ici...',
                    'class' => 'inputContact'
                ]
            ])
            ->add('cvg', CheckboxType::class, [
                'mapped' =>false,
                'required' => true,
                // 'label'    => "J'ai lu et j'accepte les conditions d'utilisations ",
                
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => [
                    'class' => 'btnForm'
                ]
            ])
            ->add('captcha', Recaptcha3Type::class, [
                'constraints' => new Recaptcha3(),
                'action_name' => 'contact',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
