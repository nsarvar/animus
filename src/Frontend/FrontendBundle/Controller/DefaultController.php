<?php

namespace Frontend\FrontendBundle\Controller;

use Frontend\FrontendBundle\Entity\Apartment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        return $this->render('FrontendBundle:Default:index.html.twig');
    }

    /**
     * @Route("/apartments", name="apartments")
     */
    public function listAction(){
        $repository = $this->getDoctrine()->getRepository(Apartment::class)->findAll();

        return $this->render('FrontendBundle:Default:apartments.html.twig', ['repos'=>$repository]);
    }

    /**
     * @Route("/apartments/create", name="apartmentCreate")
     */
    public function createAction(Request $request){
        $apartment = new Apartment();

        $form = $this->createFormBuilder($apartment)
            ->add('email', EmailType::class)
            ->add('street', TextType::class)
            ->add('postcode', TextType::class)
            ->add('town', TextType::class)
            ->add('country', TextType::class)
            ->add('moveindate', DateType::class)
            ->add('photo', FileType::class, array('label' => 'Photo'))
            ->add('save', SubmitType::class, array('label' => 'Create Apartment', 'attr'=>['class'=>'btn btn-primary']))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $apartment = $form->getData();

            $file = $apartment->getPhoto();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('photos_dir'),
                $fileName
            );

            // Update the 'photo' property to store the new file name

            $apartment->setPhoto($fileName);

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
             $em = $this->getDoctrine()->getManager();
             $em->persist($apartment);
             $em->flush();


            return $this->redirectToRoute('task_success');
        }

        return $this->render('FrontendBundle:Default:create_apartment.html.twig', array('form'=>$form->createView()));
    }

    /**
     * @Route("/apartments/view/{id}", name="view")
     */
    public function view($id){
        $data = $this->getDoctrine()->getRepository(Apartment::class)->find($id);
        return $this->render('FrontendBundle:Default:view.html.twig',['data'=>$data]);
    }
}
