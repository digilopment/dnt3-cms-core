<?php

/**
 * CRUD Trait for common admin operations
 * PHP 8.4 compatible
 */

namespace DntAdmin\App\Traits;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

trait CrudTrait
{
    protected DB $db;
    protected Rest $rest;
    protected Dnt $dnt;
    protected Vendor $vendor;

    /**
     * Generic add action
     * 
     * @param string $table Table name
     * @param array $defaultData Default data to insert
     * @param callable|null $beforeInsert Callback before insert
     * @param callable|null $afterInsert Callback after insert
     * @return void
     */
    protected function genericAdd(
        string $table,
        array $defaultData = [],
        ?callable $beforeInsert = null,
        ?callable $afterInsert = null
    ): void {
        $insertedData = array_merge([
            'vendor_id' => $this->vendor->getId(),
            'datetime_creat' => $this->dnt->datetime(),
            'datetime_update' => $this->dnt->datetime(),
            'datetime_publish' => $this->dnt->datetime(),
            '`show`' => '0',
        ], $defaultData);

        if ($beforeInsert) {
            $insertedData = $beforeInsert($insertedData);
        }

        $this->db->dbTransaction();
        $this->db->insert($table, $insertedData);
        $this->db->dbCommit();
        
        $lastId = $this->dnt->getLastId($table);
        
        if ($afterInsert) {
            $afterInsert($lastId, $insertedData);
        }
    }

    /**
     * Generic update action
     * 
     * @param string $table Table name
     * @param int|string $id Entity ID
     * @param array $updateData Data to update
     * @param callable|null $beforeUpdate Callback before update
     * @param callable|null $afterUpdate Callback after update
     * @return bool
     */
    protected function genericUpdate(
        string $table,
        $id,
        array $updateData = [],
        ?callable $beforeUpdate = null,
        ?callable $afterUpdate = null
    ): bool {
        $where = [
            'id_entity' => $id,
            'vendor_id' => $this->vendor->getId(),
        ];

        if ($beforeUpdate) {
            $updateData = $beforeUpdate($updateData, $where);
        }

        $result = $this->db->update($table, $updateData, $where);
        
        if ($afterUpdate) {
            $afterUpdate($id, $updateData, $result);
        }

        return $result;
    }

    /**
     * Generic delete action
     * 
     * @param string $table Table name
     * @param int|string $id Entity ID
     * @param array $additionalWhere Additional where conditions
     * @param callable|null $beforeDelete Callback before delete
     * @param callable|null $afterDelete Callback after delete
     * @return bool
     */
    protected function genericDelete(
        string $table,
        $id,
        array $additionalWhere = [],
        ?callable $beforeDelete = null,
        ?callable $afterDelete = null
    ): bool {
        $where = array_merge([
            'id_entity' => $id,
            'vendor_id' => $this->vendor->getId(),
        ], $additionalWhere);

        if ($beforeDelete) {
            $canDelete = $beforeDelete($id, $where);
            if ($canDelete === false) {
                return false;
            }
        }

        $result = $this->db->delete($table, $where);
        
        if ($afterDelete) {
            $afterDelete($id, $result);
        }

        return $result;
    }

    /**
     * Generic show/hide toggle action
     * 
     * @param string $table Table name
     * @param int|string $id Entity ID
     * @param array $showStates Array of show states [hidden, visible, featured]
     * @return bool
     */
    protected function genericShowHide(
        string $table,
        $id,
        array $showStates = [0 => 1, 1 => 2, 2 => 3, 3 => 1]
    ): bool {
        $query = "SELECT `show` FROM `{$table}` WHERE id_entity = '" . $this->db->escape($id) . "' AND vendor_id = '" . $this->vendor->getId() . "'";
        $currentShow = 0;
        
        if ($this->db->num_rows($query) > 0) {
            $results = $this->db->get_results($query);
            if (!empty($results)) {
                $currentShow = (int)$results[0]['show'];
            }
        }

        $setShow = $showStates[$currentShow] ?? 1;

        return $this->db->update(
            $table,
            ['show' => $setShow],
            [
                'id_entity' => $id,
                'vendor_id' => $this->vendor->getId(),
            ]
        );
    }

    /**
     * Generic move up action
     * 
     * @param string $table Table name
     * @param int|string $id Entity ID
     * @param string $orderColumn Order column name (default: 'order')
     * @return bool
     */
    protected function genericMoveUp(string $table, $id, string $orderColumn = 'order'): bool
    {
        $query = "SELECT `{$orderColumn}` FROM `{$table}` WHERE id_entity = '" . $this->db->escape($id) . "' AND vendor_id = '" . $this->vendor->getId() . "'";
        $order = 0;
        
        if ($this->db->num_rows($query) > 0) {
            $results = $this->db->get_results($query);
            if (!empty($results)) {
                $order = (int)$results[0][$orderColumn];
            }
        }

        $order = $order - 1;

        return $this->db->update(
            $table,
            [$orderColumn => $order],
            [
                'id_entity' => $id,
                'vendor_id' => $this->vendor->getId(),
            ]
        );
    }

    /**
     * Generic move down action
     * 
     * @param string $table Table name
     * @param int|string $id Entity ID
     * @param string $orderColumn Order column name (default: 'order')
     * @return bool
     */
    protected function genericMoveDown(string $table, $id, string $orderColumn = 'order'): bool
    {
        $query = "SELECT `{$orderColumn}` FROM `{$table}` WHERE id_entity = '" . $this->db->escape($id) . "' AND vendor_id = '" . $this->vendor->getId() . "'";
        $order = 0;
        
        if ($this->db->num_rows($query) > 0) {
            $results = $this->db->get_results($query);
            if (!empty($results)) {
                $order = (int)$results[0][$orderColumn];
            }
        }

        $order = $order + 1;

        return $this->db->update(
            $table,
            [$orderColumn => $order],
            [
                'id_entity' => $id,
                'vendor_id' => $this->vendor->getId(),
            ]
        );
    }

    /**
     * Generic trash action (soft delete)
     * 
     * @param string $table Table name
     * @param int|string $id Entity ID
     * @return bool
     */
    protected function genericTrash(string $table, $id): bool
    {
        return $this->db->update(
            $table,
            ['show' => 0],
            [
                'id_entity' => $id,
                'vendor_id' => $this->vendor->getId(),
            ]
        );
    }

    /**
     * Get redirect URL with parameters
     * 
     * @param string $module Module name
     * @param array $params URL parameters
     * @return string
     */
    protected function getRedirectUrl(string $module, array $params = []): string
    {
        $baseUrl = WWW_PATH_ADMIN_2 . 'index.php?src=' . $module;
        $queryParams = [];
        
        foreach ($params as $key => $value) {
            $queryParams[] = $key . '=' . urlencode($value);
        }
        
        return $baseUrl . (!empty($queryParams) ? '&' . implode('&', $queryParams) : '');
    }
}

