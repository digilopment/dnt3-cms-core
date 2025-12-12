<?php

/**
 * Base API Controller
 * PHP 8.4 compatible
 */

namespace DntApi;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

abstract class BaseApiController
{
    protected Rest $rest;
    protected DB $db;
    protected Dnt $dnt;
    protected Vendor $vendor;

    public function __construct()
    {
        $this->rest = new Rest();
        $this->db = new DB();
        $this->dnt = new Dnt();
        $this->vendor = new Vendor();
    }

    /**
     * Send JSON response
     */
    protected function jsonResponse(array $data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
    }

    /**
     * Send error response
     */
    protected function errorResponse(string $message, int $statusCode = 400): void
    {
        $this->jsonResponse([
            'success' => false,
            'error' => $message,
        ], $statusCode);
    }

    /**
     * Send success response
     */
    protected function successResponse(array $data = [], string $message = 'Success'): void
    {
        $this->jsonResponse([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ]);
    }

    /**
     * Validate required parameters
     */
    protected function validateRequired(array $required, array $data): bool
    {
        foreach ($required as $key) {
            if (!isset($data[$key]) || empty($data[$key])) {
                $this->errorResponse("Missing required parameter: {$key}");
                return false;
            }
        }
        return true;
    }

    /**
     * Get request method
     */
    protected function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }

    /**
     * Check if request method matches
     */
    protected function isMethod(string $method): bool
    {
        return strtoupper($this->getMethod()) === strtoupper($method);
    }
}

