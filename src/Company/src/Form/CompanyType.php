<?php

namespace App\Company\src\Form;

use App\Company\src\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           ->add("name", TextType::class, [
                'label' => 'Société',
               "attr" => [
                   "placeholder" => "Société",
                   "class" => "form-control",
               ],
            ])
            ->add("address1", TextType::class, [
                'label' => 'Adresse',
                "attr" => [
                    "placeholder" => "Adresse",
                    "class" => "form-control",
                ],
            ])
            ->add("address2", TextType::class, [
                'label' => 'Adresse complémentaire',
                'required' => false,
                "attr" => [
                    "placeholder" => "Adresse complémentaire",
                    "class" => "form-control",
                ],
            ])
            ->add("zipCode", TextType::class, [
                'label' => 'Code postal',
                "attr" => [
                    "placeholder" => "Code postal",
                    "class" => "form-control",
                ],
            ])
            ->add("town", TextType::class, [
                'label' => 'Ville',
                "attr" => [
                    "placeholder" => "Ville",
                    "class" => "form-control",
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Company::class]);
    }

}