<?php
namespace Pyncer\Snyppet\Install\Middleware;

use Psr\Http\Message\ResponseInterface as PsrResponseInterface;
use Psr\Http\Message\ServerRequestInterface as PsrServerRequestInterface;
use Pyncer\App\Identifier as ID;
use Pyncer\Data\Mapper\MapperAdaptor;
use Pyncer\Database\ConnectionInterface;
use Pyncer\Exception\UnexpectedValueException;
use Pyncer\Http\Server\MiddlewareInterface;
use Pyncer\Http\Server\RequestHandlerInterface;
use Pyncer\Snyppet\Install\Table\Install\InstallMapper;

class InitializeMiddleware implements MiddlewareInterface
{
    public function __invoke(
        PsrServerRequestInterface $request,
        PsrResponseInterface $response,
        RequestHandlerInterface $handler
    ): PsrResponseInterface
    {
        // Database
        if (!$handler->has(ID::DATABASE)) {
            throw new UnexpectedValueException(
                'Database connection expected.'
            );
        }

        $connection = $handler->get(ID::DATABASE);
        if (!$connection instanceof ConnectionInterface) {
            throw new UnexpectedValueException('Invalid database connection.');
        }

        // Install mapper adaptor
        if (!$handler->has(ID::mapperAdaptor('install'))) {
            $loggerMapperAdaptor = new MapperAdaptor(
                new InstallMapper($connection)
            );
            $handler->set(ID::mapperAdaptor('install'), $loggerMapperAdaptor);
        }

        return $handler->next($request, $response);
    }
}
