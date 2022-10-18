<?php

namespace App\Controller;

use App\Entity\Album;
use App\Repository\AlbumRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AlbumController extends AbstractController
{
   /**
     * @Route("/albums", name="albums", methods={"GET"})
     */

    public function listealbums(AlbumRepository $repo): Response
    {
        $albums=$repo->findBy([],['nom'=>'asc']);
        return $this->render('Album/listeAlbums.html.twig', [
            'lesAlbums'=> $albums
        ]);
    }

     /**
     * @Route("/Album/{id}", name="ficheAlbum", methods={"GET"})
     */

    public function ficheAlbum(Album $Album): Response
    {
        return $this->render('Album/ficheAlbum.html.twig', [
            'leAlbum'=> $Album
        ]);
    }
}
