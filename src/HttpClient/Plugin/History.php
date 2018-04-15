<?php

declare(strict_types=1);

namespace CedricZiel\HetznerCloudAPI\HttpClient\Plugin;

use Http\Client\Common\Plugin\Journal;
use Http\Client\Exception;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * A plugin to remember the last response.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class History implements Journal
{
    /**
     * @var ResponseInterface
     */
    private $lastResponse;

    /**
     * @return ResponseInterface|null
     */
    public function getLastResponse()
    {
        return $this->lastResponse;
    }

    /**
     * {@inheritdoc}
     */
    public function addSuccess(RequestInterface $request, ResponseInterface $response): void
    {
        $this->lastResponse = $response;
    }

    /**
     * {@inheritdoc}
     */
    public function addFailure(RequestInterface $request, Exception $exception): void
    {
    }
}