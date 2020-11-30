<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace App\Controller;

use App\Model\ReferenceManager;

/**
 * Class ReferenceController
 *
 */
class ReferenceController extends AbstractController
{


    /**
     * Display reference listing
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function browse($category)
    {
        $referenceManager = new ReferenceManager();
        $references = $referenceManager->selectByCategory($category);
        $message = $_GET["message"] ?? null;

        if (!isset($_SESSION['game'])) {
            $_SESSION['game'] = [];
        }
        if (!isset($_SESSION['score'])) {
            $_SESSION['score'] = 0;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $referenceId = $_REQUEST['reference_id'];
            $reference = $referenceManager->selectOneById($referenceId);

            if ($_REQUEST['movie_name'] === $reference['movie_name']) {
                array_push($_SESSION['game'], $referenceId);
                $_SESSION['score'] = $_SESSION['score'] + 1;
                header("location:" . $_SERVER['REQUEST_URI'] . "&message=ok");
            } else {
                header("location:" . $_SERVER['REQUEST_URI'] . "&message=ko");
            }
        }
        $filteredReferences = array_filter(
            $references,
            function ($reference) {
                $referenceFound = in_array($reference['id'], $_SESSION['game']);
                return !$referenceFound;
            }
        );
        return $this->twig->render('Reference/index.html.twig', [
            'references' => $filteredReferences,
            'category' => $category,
            'message' => $message,
            'score' => $_SESSION['score']
        ]);
    }

    /**
     * Display reference creation page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */

    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imageDir = realpath("./") . "/assets/images/";
            $imageUpload = basename($_FILES['imageUpload']['name']);
            $uploadFile = $imageDir . $imageUpload;
            move_uploaded_file($_FILES['imageUpload']['tmp_name'], $uploadFile);

            $reference = [
                'movie_name' => $_POST['movie_name'],
                'category_id' => $_POST['category_id'],
                'imageUpload' => $imageUpload
            ];
            $referenceManager = new ReferenceManager();
            $referenceManager->insert($reference);
        }
        return $this->twig->render('Reference/add.html.twig');
    }
}
