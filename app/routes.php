<?php

// Namespaces
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Home
$app
    ->get(
        '/',
        function(Request $request, Response $response)
        {
            $dataView = [];
            return $this->view->render($response, 'pages/home.twig', $dataView);
        }
    )
    ->setName('home')
;
// Projects
$app
    ->get(
        '/sports/',
        function(Request $request, Response $response)
        {
            // Fetch promotions
            $query = $this->db->query('SELECT * FROM projects');
            $projects = $query->fetchAll();

            // Data view
            $dataView = [
                'projects' => $projects,
            ];

            // Render
            return $this->view->render($response, 'pages/sports.twig', $dataView);
        }
    )
    ->setName('sports')
;

// Projects
$app
    ->get(
        '/sports/slug[A-Ba-b]/',
        function(Request $request, Response $response)
        {
            // Fetch promotions
            $query = $this->db->query('SELECT * FROM projects');
            $projects = $query->fetchAll();

            // Data view
            $dataView = [
                'projects' => $projects,
            ];

            // Render
            return $this->view->render($response, 'pages/entrySport.twig', $dataView);
        }
    )
    ->setName('entrySport')
;
// Project
$app
    ->get(
        '/sports/slug[A-Ba-b]/place/slug[0-9]/',
        function(Request $request, Response $response, $arguments)
        {
            // Fetch projects
            $prepare = $this->db->prepare('SELECT * FROM projects WHERE id = :id');
            $prepare->bindValue('id', $arguments['id']);
            $prepare->execute();
            $project = $prepare->fetch();

            // Data view
            $dataView = [
                'project' => $project,
            ];

            // Render
            return $this->view->render($response, 'pages/selectedSport.twig', $dataView);
        }
    )
    ->setName('place')
;

// Clients
$app
    ->get(
        '/sports/slug[A-Ba-b]/place/slug[0-9]/case/slug[0-9]',
        function(Request $request, Response $response, $arguments)
        {
            // Fetch clients
            $query = $this->db->query('SELECT * FROM ');
            $clients = $query->fetchAll();

            // Data view
            $dataView = [

            ];

            // Render
            return $this->view->render($response, 'pages/case.twig', $dataView);
        }
    )
    ->setName('case')
;