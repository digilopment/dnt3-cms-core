<?php

class ContentController extends AdminController
{

    protected $loc = __FILE__;
    protected $db;
    protected $rest;
    protected $webhook;
    protected $image;
    protected $adminContent;
    protected $dnt;
    protected $vendor;
    protected $updateContent;

    public function __construct()
    {

        (new Autoloader())->addClass($this->loc, 'UpdateContent');

        $this->db = new DB();
        $this->rest = new Rest();
        $this->webhook = new Webhook();
        $this->image = new Image();
        $this->adminContent = new AdminContent();
        $this->dnt = new Dnt();
        $this->updateContent = new UpdateContent();
    }

    public function indexAction()
    {

        $data['vendor'] = $this->vendor;
        $data['rest'] = $this->rest;
        $data['webhook'] = $this->webhook;
        $data['db'] = $this->db;
        $data['image'] = $this->image;
        $data['adminContent'] = $this->adminContent;
        $data['dnt'] = $this->dnt;

        $this->loadTemplate($this->loc, 'default', $data);
    }

    public function addAction()
    {
        $insertedData = array(
            'vendor_id' => Vendor::getId(),
            'cat_id' => $this->rest->get('filter'),
            '`type`' => $this->rest->get('included'),
            'datetime_creat' => $this->dnt->datetime(),
            'datetime_update' => $this->dnt->datetime(),
            'datetime_publish' => $this->dnt->datetime(),
            '`show`' => '0'
        );

        $this->db->dbTransaction();
        $this->db->insert('dnt_posts', $insertedData);
        $this->db->dbcommit();
        $lastId = $this->dnt->getLastId('dnt_posts');
        $redirect = WWW_PATH_ADMIN_2 . 'index.php?src=content&filter=' . $this->rest->get('filter') . '&sub_cat_id=' . $this->rest->get('sub_cat_id') . '&post_id=' . $lastId . '&page=1&action=edit&included=' . $this->rest->get('included') . '';
        $this->dnt->redirect($redirect);
    }

    public function delAction()
    {
        $post_id = $this->rest->get('post_id');
        $wherePosts = array('id_entity' => $post_id, 'vendor_id' => Vendor::getId());
        $this->db->delete('dnt_posts', $wherePosts);

        $whereMeta = array('post_id' => $post_id, 'vendor_id' => Vendor::getId());
        $this->db->delete('dnt_posts_meta', $whereMeta);

        $this->dnt->redirect(WWW_PATH_ADMIN_2 . 'index.php?src=' . $this->rest->get('src') . '&included=' . $this->rest->get('included') . '&filter=' . $this->rest->get('filter') . '');
    }

    public function moveDownAction()
    {
        $post_id = $this->rest->get('post_id');
        $query = "SELECT `order` FROM dnt_posts WHERE id_entity = '" . $post_id . "' AND vendor_id = '" . Vendor::getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $order = $row['order'];
            }
        }

        $order = $order - 1;

        $table = 'dnt_posts';
        $this->db->update(
                $table, //table
                array(//set
                    'order' => $order,
                ),
                array(//where
                    'id_entity' => $post_id,
                    'vendor_id' => Vendor::getId(),
                )
        );
        $this->dnt->redirect(WWW_PATH_ADMIN_2 . 'index.php?src=' . $this->rest->get('src') . '&included=' . $this->rest->get('included') . '&filter=' . $this->rest->get('filter') . '');
    }

    public function moveUpAction()
    {
        $post_id = $this->rest->get('post_id');
        $query = "SELECT `order` FROM dnt_posts WHERE id_entity = '" . $post_id . "' AND vendor_id = '" . Vendor::getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $order = $row['order'];
            }
        }

        $order = $order + 1;

        $table = 'dnt_posts';
        $this->db->update(
                $table,
                array(
                    'order' => $order,
                ),
                array(
                    'id_entity' => $post_id,
                    'vendor_id' => Vendor::getId(),
                )
        );
        $this->dnt->redirect(WWW_PATH_ADMIN_2 . 'index.php?src=' . $this->rest->get('src') . '&included=' . $this->rest->get('included') . '&filter=' . $this->rest->get('filter') . '');
    }

    public function showHideAction()
    {
        $post_id = $this->rest->get('post_id');
        $query = "SELECT `show` FROM dnt_posts WHERE id_entity = '" . $post_id . "' AND vendor_id = '" . Vendor::getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $show = $row['show'];
            }
        }

        if ($show == 0) {
            $set_show = 1;
        } elseif ($show == 1) {
            $set_show = 2;
        } else {
            $set_show = 0;
        }
        $table = 'dnt_posts';
        $this->db->update(
                $table,
                array(
                    'show' => $set_show,
                ),
                array(
                    'id_entity' => $post_id,
                    'vendor_id' => Vendor::getId(),
                )
        );
        $this->dnt->redirect(WWW_PATH_ADMIN_2 . 'index.php?src=' . $this->rest->get('src') . '&included=' . $this->rest->get('included') . '&filter=' . $this->rest->get('filter') . '');
    }

    public function editCatAction()
    {
        $redirect = $this->rest->post('return');

        $name = $this->rest->post('name');
        $name_url = Dnt::name_url($name);
        $id_entity = $this->rest->post('id_entity');

        $this->db->update(
                'dnt_post_type',
                array(
                    'name' => $name,
                    'name_url' => $name_url,
                ),
                array(
                    'id_entity' => $id_entity,
                    '`vendor_id`' => Vendor::getId())
        );
        $this->dnt->redirect($redirect);
    }

    public function addCatAction()
    {
        $redirect = $this->rest->post('return');

        $name = $this->rest->post('name');
        $name_url = Dnt::name_url($name);
        $admin_cat = $this->rest->post('admin_cat');

        if ($name != '') {
            if ($admin_cat == 'post') {
                $cat_id = 3;
                $sub_cat_id = 0;
            } elseif ($admin_cat == 'article') {
                $cat_id = 2;
                $sub_cat_id = 0;
            }

            $insertedData = array(
                'cat_id' => $cat_id,
                'sub_cat_id' => $sub_cat_id,
                '`name_url`' => $name_url,
                '`admin_cat`' => $admin_cat,
                'name' => $name,
                '`show`' => '1',
                '`order`' => '0',
                'vendor_id' => Vendor::getId(),
            );

            $this->db->insert('dnt_post_type', $insertedData);
        }
        $this->dnt->redirect($redirect);
    }

    public function editAction()
    {
        $data['rest'] = $this->rest;
        $data['webhook'] = $this->webhook;
        $data['dnt'] = $this->dnt;
        $data['adminContent'] = $this->adminContent;
        $data['image'] = $this->image;

        $this->loadTemplate($this->loc, 'edit', $data);
    }

    public function updateAction()
    {
        if ($this->hasPost('sent')) {
            $response = $this->updateContent->init();
            $data = ['msg' => '<br/>Údaje sa úspešne uložili ', 'url' => $response['url']];
            $this->loadTemplate($this->loc, 'success', $data);
        }
    }

}
