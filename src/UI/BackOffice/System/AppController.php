<?php
    namespace App\UI\BackOffice\System;

    use App\Application\Form\BackOffice\System\App\NewForm;
    use App\Domain\_mysql\System\Entity\App;
    use App\Domain\_mysql\System\Repository\AppRepository;
    use Knp\Component\Pager\PaginatorInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/system/apps", name="system.app.")
     */
    class AppController extends AbstractController {

        /**
         * @Route(".html", name="index", methods={"GET"})
         */
        public function index(Request $request, AppRepository $appRepository, PaginatorInterface $paginator){
            $apps = $paginator->paginate($appRepository->findAll(), $request->query->getInt('page', 1), $request->query->getInt('limit', 10));

            return $this->render("BackOffice/System/App/index.html.twig", [
                'apps'  => $apps
            ]);
        }

        /**
         * @Route("/{id}.html", name="show", methods={"GET"}, requirements={"id"="/[a-z0-9\-]+/"})
         */
        public function show(Request $request, App $app){
            return $this->render("BackOffice/System/App/show.html.twig", [
                'app'   => $app
            ]);
        }

        /**
         * @Route("/new.html", name="add", methods={"GET", "POST"})
         */
        public function add(Request $request){
            $app = new App();
            $form['add'] = $this->createForm(NewForm::class, $app)->handleRequest($request);

            if($form['add']->isSubmitted() && $form['add']->isValid()){
                $app->setApiKey(implode('-', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6)));

                $em = $this->getDoctrine()->getManager();
                $em->persist($app);
                $em->flush();

                return $this->redirectToRoute('backoffice.system.app.index');
            }

            return $this->render("BackOffice/System/App/add.html.twig", [
                'form'  => [
                    'add'   => $form['add']->createView()
                ]
            ]);
        }

        /**
         * @Route("/{id}/edit.html", name="edit", methods={"GET", "POST"}, requirements={"id"="/[a-z0-9\-]+/"})
         */
        public function edit(Request $request, App $app){
            return $this->render("BackOffice/System/App/edit.html.twig", [
                'app'   => $app
            ]);
        }

        /**
         * @Route("/{id}/delete.html", name="delete", methods={"GET"}, requirements={"id"="/[a-z0-9\-]+/"})
         */
        public function delete(Request $request, App $app){
            return $this->render("BackOffice/System/App/delete.html.twig", [
                'app'   => $app
            ]);
        }

    }