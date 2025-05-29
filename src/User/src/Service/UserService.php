<?php

namespace App\User\src\Service;

use App\NotificationType\src\Entity\NotificationType;
use App\User\src\Entity\User;
use App\User\src\Entity\UserProfile;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

readonly class UserService
{

    public function __construct(
        private ValidatorInterface     $validator,
        private EntityManagerInterface $em
    )
    {
    }

    public function register(FormInterface $form, Request $request): FormInterface|Response
    {
        // Handle the form submission
        $form->handleRequest($request);

        if (!$form->isSubmitted()) {
            $form->addError(new FormError("Le formulaire n'a pas été envoyé."));
            return $form;
        }

        /* @var $user User */
        $user = $form->getData();

        //Check errors from the entity constraints
        $errors = $this->validator->validate($user);


        // If the form is not valid or there are validation errors, add them to the form
        if (!$form->isValid() || $errors->count() > 0) {
            // Retrieve form property paths and link errors to them
            foreach ($errors as $error) {
                // TODO: Fix duplicated unique email error message
                $form->get($error->getPropertyPath())->addError(new FormError($error->getMessage()));
            }
            //return the form with errors
            return $form;
        }


        //Form is valid, proceed with the user creation
        $profile = $this->em->getRepository(UserProfile::class)->find(1);
        $notificationType = $this->em->getRepository(NotificationType::class)->find(1);

        if (!$profile instanceof UserProfile) {
            // Handle the case where the profile is not found
            $form->addError(new FormError('Une erreur est survenue lors de la création de l\'utilisateur.'));
            return $form;
        }

        if (!$notificationType instanceof NotificationType) {
            // Handle the case where the notification type is not found
            $form->addError(new FormError('Une erreur est survenue lors de la création de l\'utilisateur.'));
            return $form;
        }


        $user->setRefUserProfile($profile)->setRefNotificationType($notificationType);

        // Persist the company before the user, as the user has a reference to the company
        $this->em->persist($user->getRefCompany());
        $this->em->persist($user);

        $this->em->flush();

        // Redirect to the homepage
        $request->getSession()->getFlashBag()->add('success', 'Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter.');

        return new RedirectResponse("/");
    }
}