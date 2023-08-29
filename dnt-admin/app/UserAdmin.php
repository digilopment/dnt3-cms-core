<?php

namespace DntAdmin\App;

use DntLibrary\App\AbstractUser;

class UserAdmin extends AbstractUser
{
    public $data;

    protected $table = 'dnt_users';

    protected $type = 'admin';

    public function __construct()
    {
        parent::__construct(
            [
                    'table' => $this->table,
                    'type' => $this->type,
                ]
        );
    }
}
