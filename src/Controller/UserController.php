<?php 
namespace App\Controller;

use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController{
    #[Route('/insert/user', name:'InsertUser')]
    public function InsertUser (EntityManagerInterface $doctrine, Request $request){
        
        $form = $this -> createForm(UserType::class);
        $form -> handleRequest($request);
        
        if($form-> isSubmitted() && $form -> isValid()){
            $user = $form -> getData();
            $doctrine -> persist($user);
            $doctrine -> flush();

            $this->addFlash('exito', 'Usuario creado correctamente');

            //$form = $this -> createForm(PokemonType::class);

            return $this->redirectToRoute('listPokemons');

        }
        return $this->render('pokemons/newPokemon.html.twig', [ 'pokemonForm' => $form ]);
    }
}