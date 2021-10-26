<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Model\Contact;

final class ContactController {
    private $contact;

    public function __construct(Contact $contact) {
        $this->contact = $contact;
    }

    public function allContact(Request $request, Response $response) {
        $res = $this->contact->getAllContact();
        
        return JsonResponse::withJson($response, (string) json_encode($res));
    }
}