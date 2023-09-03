<?php

namespace App\Controller;

use App\Entity\History;
use Doctrine\ORM\EntityManagerInterface;
use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class HistoryController  extends AbstractController {

    #[Route('/exchange/values', methods: ['POST'])]
    public function exchangeValues(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode(
            $request->getContent(),
            true
        );

        $first = $data['first'];
        $second = $data['second'];

        $history = new History();
        $history->setFirstInValue($first);
        $history->setSecondInValue($second);
        $history->setDateOfCreation(new DateTime('now'));
        $history->setDateOfUpdate(new DateTime('now'));

        $entityManager->persist($history);

        $first = $data['second'];
        $second = $data['first'];

        $history->setFirstOutValue($first);
        $history->setSecondOutValue($second);
        $history->setDateOfUpdate(new DateTime('now'));

        $entityManager->persist($history);
        $entityManager->flush();

        return $this->json(['first' => $first, 'second' => $second]);
    }

    #[Route('/history', methods: ['GET'])]
    public function getAllHistory(EntityManagerInterface $entityManager): JsonResponse
    {
        $historyList = $entityManager->getRepository(History::class)->findAll();

        return $this->json(['history' => $historyList]);
    }
}
