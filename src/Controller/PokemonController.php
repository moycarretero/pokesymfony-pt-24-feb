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
};