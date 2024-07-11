<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController{
    #[Route('/pokemon')] 
    public function getPokemon(){
        $pokemon = [
            'name' => 'pikachu',
            'type' => 'electric',
            'code' => '838',
            'description' => 'Es un pokemon amarillo que lanza rayos',
            'img' => 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/025.png'
        ];

        return $this->render('pokemons/pokemon.html.twig', ['pokemon' => $pokemon]);
    }

    #[Route('/pokemons')]
    public function pokemons () {
        $pokemons = 
        [
            [ 'name' => 'pikachu',
            'type' => 'electric',
            'code' => '838',
            'description' => 'Es un pokemon amarillo que lanza rayos',
            'img' => 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/025.png'],
            
            [ 'name' => 'Frosmoth',
            'type' => 'electric',
            'code' => '0873',
            'description' => 'Es un pokemon blanco',
            'img' => 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/873.png'],
            
            [ 'name' => 'Charmander ',
            'type' => 'electric',
            'code' => '0004',
            'description' => 'Es un pokemon amarillo que lanza fuego',
            'img' => 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/004.png']
        ];
        return $this->render('pokemons/pokemonsList.html.twig', ['pokemons' => $pokemons]);
    }
};