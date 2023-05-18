<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Task;

class TodoCRUDController extends AbstractController
{
    #[Route('/', name: 'app_todo_crud')]
    public function index(EntityManagerInterface $em)
    {
        $tasks = $em->getRepository(Task::class)->findAll();
        return $this->render('todo/index.html.twig', ['tasks' => $tasks]);
    }

    #[Route(path: '/create', name: 'create_todo', methods: ['POST'])]
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {
        $todo = trim($request->get('todo'));
        if (empty($todo)) return $this->redirectToRoute('app_todo_crud');

        $entityManager = $doctrine->getManager();
        $task = new Task;
        $task->setTodo($todo);
        $entityManager->persist($task);
        $entityManager->flush();
        return $this->redirectToRoute('app_todo_crud');
    }

    #[Route(path: '/show/{id}', name: 'show_todo')]
    public function show(EntityManagerInterface $em, $id)
    {
        $task = $em->getRepository(Task::class)->find($id);
        return $this->render('todo/show.html.twig', ['task' => $task]);
    }

    #[Route(path: '/update/{id}', name: 'update_todo', methods: ['POST'])]
    public function update(Request $request, $id, ManagerRegistry $doctrine): Response
    {
        $todo = trim($request->get('todo'));
        if (empty($todo)) {
            return $this->redirectToRoute('show_todo', ['id' => $id]);
        }

        $entityManager = $doctrine->getManager();
        $task = $entityManager->getRepository(Task::class)->find($id);
        $task->setTodo($todo);
        $entityManager->flush();
        return $this->redirectToRoute('app_todo_crud');
    }
    #[Route(path:'/delete/{id}', name: 'delete_todo')]
    public function delete(int $id, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $id = $em->getRepository(Task::class)->find($id);
        $em->remove($id);
        $em->flush();

        return $this->redirectToRoute("app_todo_crud");

    }
}
