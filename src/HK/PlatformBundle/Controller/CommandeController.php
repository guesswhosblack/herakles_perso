<?php

// src/HK/PlatformBundle/Controller/CommandeController.php

namespace HK\PlatformBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CommandeController extends Controller
{
  public function viewAction($id)
  {
    $commande = array(
      'title'   => 'Commande Boissons',
      'id'      => $id,
      'author'  => 'Roger',
      'content' => 'Ici il y aura ma super commande de proteines',
      'date'    => new \Datetime()
    );

    return $this->render('HKPlatformBundle:Commande:view.html.twig', array(
      'commande' => $commande
    ));
  }
    public function indexAction($page)
    {
        // ...

    // Notre liste d'annonce en dur
    $listCommandes = array(
      array(
        'title'   => 'Commande boissons',
        'id'      => 1,
        'author'  => 'Alexander',
        'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
        'date'    => new \Datetime()),
      array(
        'title'   => 'Commande Corde à sauter,',
        'id'      => 2,
        'author'  => 'Hugo',
        'content' => 'Nous mettrons un tableau des articles ici',
        'date'    => new \Datetime()),
      array(
        'title'   => 'Commande proteines',
        'id'      => 3,
        'author'  => 'Mathieu',
        'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
        'date'    => new \Datetime())
    );

    // Et modifiez le 2nd argument pour injecter notre liste
    return $this->render('HKPlatformBundle:Commande:index.html.twig', array(
      'listCommandes' => $listCommandes
    ));
    }

    // Ici, on récupérera la liste des annonces, puis on la passera au template


  public function addAction(Request $request)
  {
      // La gestion d'un formulaire est particulière, mais l'idée est la suivante :

    // Si la requête est en POST, c'est que le visiteur a soumis le formulaire
    if ($request->isMethod('POST')) {
      // Ici, on s'occupera de la création et de la gestion du formulaire

      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

      // Puis on redirige vers la page de visualisation de cettte annonce
      return $this->redirect($this->generateUrl('hk_platform_view', array('id' => 5)));
    }

    // Si on n'est pas en POST, alors on affiche le formulaire
    return $this->render('OCPlatformBundle:Advert:add.html.twig');
  }

  public function editAction($id, Request $request)
  {
    // Ici, on récupérera l'annonce correspondante à $id

    // Même mécanisme que pour l'ajout
    if ($request->isMethod('POST')) {
      $request->getSession()->getFlashBag()->add('notice', 'Commande  bien modifiée.');
      return $this->redirect($this->generateUrl('hk_platform_view', array('id' => 5)));
    }

    $commande = array(
      'title'   => 'Jus testosterene',
      'id'      => $id,
      'author'  => 'Alexandre',
      'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
      'date'    => new \Datetime()
    );

    return $this->render('HKPlatformBundle:Commande:edit.html.twig', array(
      'commande' => $commande
    ));
  }

  public function deleteAction($id)
  {
    // Ici, on récupérera l'annonce correspondant à $id

    // Ici, on gérera la suppression de l'annonce en question

    return $this->render('HKPlatformBundle:Commande:delete.html.twig');
  }
  public function menuAction()
  {
    // On fixe en dur une liste ici, bien entendu par la suite
    // on la récupérera depuis la BDD !
      $listCommandes = array(
       array('id' => 2, 'title' => 'Commande 7 du client'),
       array('id' => 5, 'title' => 'Commande 12 du client'),
       array('id' => 9, 'title' => 'Commande 14 du client')
   );

    return $this->render('HKPlatformBundle:Commande:menu.html.twig', array(
      // Tout l'intérêt est ici : le contrôleur passe
      // les variables nécessaires au template !
      'listCommandes' => $listCommandes
    ));
  }
}
