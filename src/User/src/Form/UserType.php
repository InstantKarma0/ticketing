<?php

namespace App\User\src\Form;


use App\Company\src\Form\CompanyType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\PasswordStrength;

class UserType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                "label" => "Prénom *",
                "attr" => [
                    "placeholder" => "Prénom *",
                    "class" => "form-control",
                ]
            ])
            ->add('lastname', TextType::class, [
                "label" => "Nom *",
                "attr" => [
                    "placeholder" => "Nom *",
                    "class" => "form-control",
                ]
            ])
            ->add('email', EmailType::class, [
                "label" => "Email *",
                "attr" => [
                    "placeholder" => "Email *",
                    "class" => "form-control",
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent correspondre.',
                'required' => true,
                'first_options' => [
                    "attr" => [
                        "placeholder" => "Mot de passe *",
                        "class" => "form-control",
                    ],
                    'label' => 'Mot de passe *',
                    'constraints' => [
                        new PasswordStrength(
                            minScore: PasswordStrength::STRENGTH_MEDIUM,
                            message: "Le mot de passe n'est pas assez fort. Veuillez utiliser un mot de passe plus long ou avec des caractères spéciaux en plus de chiffres et de lettres."
                        )
                    ]

                ],
                'second_options' => [
                    "attr" => [
                        "placeholder" => "Confirmer le mot de passe *",
                        "class" => "form-control",
                    ],
                    'label' => 'Confirmer le mot de passe *',
                ],
            ])

            ->add('refCompany', CompanyType::class, [])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        // Configure your form options here
        // Example: $resolver->setDefaults(['data_class' => User::class]);
    }

}