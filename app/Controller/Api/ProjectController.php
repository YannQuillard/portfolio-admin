<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Helper\JsonResponse;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Model\Project;

final class ProjectController {
    private Container $container;
    private $project;

    public function __construct(Container $container, Project $project) {
        $this->container = $container;
        $this->project = $project;
    }

    public static function allProject(Request $request, Response $response) {
        $message = [
            'api' => 'test',
            'version' => '1.0',
            'timestamp' => time(),
        ];
        return JsonResponse::withJson($response, (string) json_encode($message));
    }
}