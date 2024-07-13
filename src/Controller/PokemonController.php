<?php 

namespace App\Controller;

use App\Entity\Pokemon;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController{
    #[Route('/pokemon/{id}', name: 'showPokemon')] 
    public function getPokemon(EntityManagerInterface $doctrine, $id){
        $repository = $doctrine -> getRepository(Pokemon::class);
        $pokemon = $repository -> find($id);
        

        return $this->render('pokemons/pokemon.html.twig', ['pokemon' => $pokemon]);
    }

    #[Route('/pokemons', name:'listPokemons')]
    public function pokemons (EntityManagerInterface $doctrine) {
       $repository = $doctrine -> getRepository(Pokemon::class);
        $pokemons = $repository -> findAll();


        return $this->render('pokemons/pokemonsList.html.twig', ['pokemons' => $pokemons]);
    }
    #[Route('/new/pokemons')]
    public function newPokemons (EntityManagerInterface $doctrine) {
    
        $pokemon = new Pokemon();
        $pokemon -> setNombre('pikachu');
        $pokemon -> setDescription('Es un pokemon amarillo que lanza rayos');
        $pokemon -> setImage('https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/025.png');
        $pokemon -> setCode(838);

        $pokemon2 = new Pokemon();
        $pokemon2 -> setNombre('Frosmoth');
        $pokemon2 -> setDescription('Es un pokemon amarillo que lanza rayos');
        $pokemon2 -> setImage('https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/873.png');
        $pokemon2 -> setCode(838);

        $pokemon3 = new Pokemon();
        $pokemon3 -> setNombre('Charmander');
        $pokemon3 -> setDescription('Es un pokemon amarillo que lanza rayos');
        $pokemon3 -> setImage('https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/004.png');
        $pokemon3 -> setCode(838);

        $doctrine -> persist($pokemon);
        $doctrine -> persist($pokemon2);
        $doctrine -> persist($pokemon3);
        $doctrine -> flush();

        return new Response('Pokemons insertados correctamente');
    }
};