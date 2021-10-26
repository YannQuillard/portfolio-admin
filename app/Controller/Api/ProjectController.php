<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Model\Project;

final class ProjectController {
    private $project;

    public function __construct(Project $project) {
        $this->project = $project;
    }

    public function allProject(Request $request, Response $response) {
        $res = $this->project->getAllProject();
        
        return JsonResponse::withJson($response, (string) json_encode($res));
    }

    public function oneProject(Request $request, Response $response, array $args) {
        if(preg_match('/^[0-9]+$/', $args['id'])) {
            $id = (int) $args['id'];
            $res = $this->project->getOneProjectById($id);

            return JsonResponse::withJson($response, (string) json_encode($res));
        }
        else {
            return JsonResponse::withJson($response, (string) json_encode('Error value is not an int'));
        }
    }
}