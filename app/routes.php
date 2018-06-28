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

// Sports selection
$app
    ->get(
        '/sports',
        function(Request $request, Response $response)
        {
            // Fetch sports
            $query = $this->db->query('SELECT * FROM sportTable');
            $sports = $query->fetchAll();

            // Data view
            $dataView = [
                'sports' => $sports,
            ];

            // Render
            return $this->view->render($response, 'pages/sports.twig', $dataView);
        }
    )
    ->setName('sports')
;

// Selected sport
$app
    ->get(
        '/sports/{sport:[a-zA-Z0-9_-]+}',
        function(Request $request, Response $response, $arguments){

            /** @var PDOStatement $prepare */
            // Fetch places
            $prepare = $this->db->prepare('SELECT * FROM places WHERE sport_id = :sport_id');
            $prepare->bindValue('sport_id', $arguments['sport']);
            $prepare->execute();
            $places = $prepare->fetchAll();

            // Data view
            $dataView = [
                'places'=>$places,
            ];
            // Render
            return $this->view->render($response, 'pages/selectedSport.twig', $dataView);
        }
    )
    ->setName('selectedSport')
;

// Places Selection
$app
    ->get(
        '/sports/{sport}/places',
        function(Request $request, Response $response, $arguments)
        {
            /** @var PDOStatement $prepare */
            // Fetch places
            $prepare = $this->db->prepare('SELECT * FROM places WHERE sport_id = :sport_id');
            $prepare->bindValue('sport_id', $arguments['sport']);
            $prepare->execute();
            $places = $prepare->fetch();

            $prepare = $this->db->prepare('SELECT * FROM cases WHERE id_place = id_place');
            $prepare->bindValue('id_place', $places->id_place);
            $prepare->execute();
            $place = $prepare->fetch();

            $prepare = $this->db->prepare('SELECT * FROM cases WHERE sport_id = :sport_id and id_place = :id_place');
            $prepare->bindValue('sport_id', $place->sport_id);
            $prepare->bindValue('id_place',$place->id_place);
            $prepare->execute();
            $cases = $prepare->fetchAll();

            echo '<pre>';
            var_dump($cases);
            echo '</pre>';

            // Data view
            $dataView = [
                'places'=>$places,
                'place'=>$place,
                'cases'=>$cases,
            ];
            // Render
            return $this->view->render($response, 'pages/places.twig', $dataView);
        }
    )
    ->setName('place')
;

// Case Selection
$app
    ->get(
        '/sports/{sport:[a-zA-Z]}/id_place}',
        function(Request $request, Response $response, $arguments)
        {

            // Fetch sports
            /** @var PDOStatement $prepare */
            // Fetch places
            $prepare = $this->db->prepare('SELECT * FROM cases WHERE sport_id = :sport_id');
            $prepare->bindValue('sport_id', $arguments['sport']);
            $prepare->execute();
            $places = $prepare->fetch();

            $prepare = $this->db->prepare('SELECT * FROM cases WHERE id_place = :id_place ');
            $prepare->bindValue('id_place', $arguments['id_place']);
            $prepare->execute();
            $place = $prepare->fetch();

            $prepare = $this->db->prepare('SELECT * FROM cases WHERE sport_id = :sport_id and id_place = :id_place');
            $prepare->bindValue('sport_id', $arguments['sport']);
            $prepare->bindValue('id_place',$place->id_place);
            $prepare->execute();
            $cases = $prepare->fetchAll();


            // Data view
            $dataView = [
                'places'=>$places,
                'place'=>$place,
                'case'=>$case,

            ];
            // Render
            return $this->view->render($response, 'pages/cases.twig', $dataView);
        }
    )
    ->setName('cases')
;