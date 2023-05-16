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
    #[Route('/todo', name: 'app_todo_crud')]
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
}
