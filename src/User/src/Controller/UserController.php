<?php

namespace App\User\src\Controller;

use App\User\src\Entity\User;
use App\User\src\Form\UserType;
use App\User\src\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{

    public function __construct(private readonly UserService $userService)
    {
    }


    #[Route('/register', name: 'user_register', methods: ['GET', 'POST'])]
    public function register(Request $request): Response
    {
        // Create a new User form instance
         $form = $this->createForm(UserType::class, new User());

         // Render the form if the request is a GET request
         if ($request->isMethod('GET')) {
             return $this->render('User/templates/register.html.twig', [
                 'form' => $form->createView(),
             ]);
         }


        // Handle the form submission
        $result = $this->userService->register($form, $request);

        // If the result is a FormInterface, it means there were validation errors
        if ($result instanceof FormInterface) {
            return new Response($this->renderView('User/templates/register.html.twig', [
                'form' => $result->createView(),
            ]), 422);
        }

        // If the result is a Response, it means the registration was successful
        return $result;

    }

}