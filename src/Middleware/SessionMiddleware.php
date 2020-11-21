<?php

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Symfony\Component\HttpFoundation\Session\Session;

class SessionMiddleware {
    private $session;

    public function __construct(Session $session) {
        $this->session = $session;
    }

    public function __invoke(Request $request, RequestHandler $handler) {
        $this->session->start();
        return $handler->hanlde($request);
    }

}
