<?php

/**
 * Base Admin Controller with Dependency Injection
 * PHP 8.4 compatible
 */

namespace DntAdmin\App;

// Load CrudTrait for use in child classes
require_once __DIR__ . '/Traits/CrudTrait.php';

use DntLibrary\App\Post;
use DntLibrary\App\PostVariants;
use DntLibrary\Base\AdminContent;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Image;
use DntLibrary\Base\PostMeta;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;
use DntLibrary\Base\Webhook;

abstract class BaseAdminController extends AdminController
{
    protected string $loc;
    protected string $namespace;
    
    // Common dependencies
    protected DB $db;
    protected Rest $rest;
    protected Webhook $webhook;
    protected Image $image;
    protected AdminContent $adminContent;
    protected Dnt $dnt;
    protected Vendor $vendor;
    protected Post $post;
    protected PostVariants $postVariants;
    protected PostMeta $postMeta;

    public function __construct()
    {
        parent::__construct();
        $this->initializeDependencies();
    }

    /**
     * Initialize common dependencies
     * Can be overridden in child classes for custom dependencies
     */
    protected function initializeDependencies(): void
    {
        $this->db = new DB();
        $this->rest = new Rest();
        $this->webhook = new Webhook();
        $this->image = new Image();
        $this->adminContent = new AdminContent();
        $this->dnt = new Dnt();
        $this->vendor = new Vendor();
        $this->post = new Post();
        $this->postVariants = new PostVariants();
        $this->postMeta = new PostMeta();
    }

    /**
     * Get common data array for templates
     */
    protected function getCommonData(): array
    {
        return [
            'vendor' => $this->vendor,
            'rest' => $this->rest,
            'webhook' => $this->webhook,
            'db' => $this->db,
            'image' => $this->image,
            'adminContent' => $this->adminContent,
            'dnt' => $this->dnt,
            'post' => $this->post,
            'postVariants' => $this->postVariants,
            'postMeta' => $this->postMeta,
        ];
    }
}

