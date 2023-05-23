<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

use App\Entity\Picture;

class PictureController extends AbstractController
#
{
    /**
     * @IsGranted("ROLE_ADMIN")
     *
     */
    /**
     * Visualiser une photo
     * 
     * @param int $id Identifiant de l'article
     * 
     * @return Response 
     */
    
    public function index(int $id): Response
    {        
        return $this->render('picture/index.html.twig', [
            'pictures' => $pictures,
        ]);
    }
    public function update(Picture $doctrine, int $id): Response
{
    $pictures = $doctrine->findBy(['id'=>$id]);

    return $this->render('picture/index.html.twig', [
            'pictures' => $pictures
        ]);
}

    /**
     * Modifier/Ajouter une photo
     */
    public function edit(Request $request, int $id=null): Response
    {
        $em = $this->getDoctrine()->getManager();

        if($id) {
            $mode = 'update';
            $pictures = $em->getRepository(Picture::class)->findBy(['id' => $id]);
        }
        else {
            $mode = 'new';
            $pictures = new Picture();
        }

        $form = $this->createForm(PictureType::class, $pictures);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->savePicture($pictures, $mode);

            return $this->redirectToRoute('picture_edit', array('id' => $pictures->getId()));
        }

        $parameters=array(
            'form'=> $form, 
            'pictures'=> $pictures,
            'mode' => $mode 
        );

        return $this->render('picture/edit.html.twig', $parameters);
    } 
    /**
    * Supprimer un article 
    */
    public function remove(ManagerRegistry $doctrine, int $id): Response
    {
    // On récupère la photo qui correspond à l'id dans l'url
    $pictures = $doctrine->getRepository(Picture::class)->findBy(['id' => $id])[0];

    //La photo est supprimé
    $doctrine->remove($pictures);
    $doctrine->flush();

    return $this->redirectToRoute('homepage');
    }
    
    /**
    * Charger la photo avant enregistrement 
    * 
    * @param Picture $picture 
    * @param string $mode
    * 
    * @return Picture
    */
    private function loadPictureBeforeSave(Picture $pictures, string $mode){
        if($pictures->getIsPublished()){
            $pictures->setIsPublished(new \DateTime());
    
       }
       return $pictures;
   }

    /**
     * Enregistre la photo en base de données
     * 
     * @param Picture $picture 
     * @param string $mode
     * 
     * @return Picture
     */
    private function savePicture(Picture $pictures, string $mode){
        $pictures = $this->loadPictureBeforeSave($pictures, $mode);

        $em = $this->getDoctrine()->getManager();
        $em->persist($pictures);
        $em->flush();
    }

}
