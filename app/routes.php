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
        '/projects',
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
            return $this->view->render($response, 'pages/projects.twig', $dataView);
        }
    )
    ->setName('projects')
;
// Project
$app
    ->get(
        '/projects/project/{id:[0-9_-]+}',
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
            return $this->view->render($response, 'pages/project.twig', $dataView);
        }
    )
    ->setName('project')
;

// Clients
$app
    ->get(
        '/clients',
        function(Request $request, Response $response, $arguments)
        {
            // Fetch clients
            $query = $this->db->query('SELECT * FROM clients');
            $clients = $query->fetchAll();

            // Data view
            $dataView = [
                'clients' => $clients,
                'project'=>  $project
            ];

            // Render
            return $this->view->render($response, 'pages/clients.twig', $dataView);
        }
    )
    ->setName('clients')
;

// Client
$app
    ->get(
        '/clients/{id_client:[0-9_-]+}',
        function(Request $request, Response $response, $arguments)
        {
            // Fetch projects
            $prepare = $this->db->prepare('SELECT * FROM projects WHERE id_client = :id_client');
            $prepare->bindValue('id_client', $arguments['id_client']);
            $prepare->execute();
            $project = $prepare->fetch();

            // Fetch client
            $prepare = $this->db->prepare('SELECT * FROM clients WHERE id = :id');
            $prepare->bindValue('id', $project->id_client);
            $prepare->execute();
            $client = $prepare->fetch();

            // Data view
            $dataView = [
                'project' => $project,
                'client' => $client
            ];

            // Render
            return $this->view->render($response, 'pages/client.twig', $dataView);
        }
    )
    ->setName('client')
;