<?php
declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class PetArticleRepository extends AbstractRepository
{
    protected function _statusKeyDatas()
    {
        return [
            0 => '未激活',
            1 => '使用中',
            99 => '锁定',
        ];
    }

    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'name', 'title', 'sort', 'orderlist', 'created_at', 'visit_num', 'favour_num', 'status'],
            'listSearch' => ['id', 'nickname', 'user_id', 'created_at', 'last_at', 'status'],
            'add' => ['nickname', 'user_id', 'status'],
            'update' => ['nickname', 'user_id', 'status'],
        ];
    }

    public function getFormFields()
    {
        return [
            'nickname' => ['type' => 'input', 'require' => ['add']],
            'user_id' => ['type' => 'selectSearch', 'require' => ['add'], 'searchResource' => 'user'],
            'status' => ['type' => 'radio', 'infos' => $this->getKeyValues('status')],
        ];
    }

    public function getSearchFields()
    {
        return [
            'user_id' => ['type' => 'input'],
            'last_at' => ['type' => 'datetimerange'],
        ];
    }

    public function getSearchDealFields()
    {
        return [
            'user_id' => ['type' => 'relate', 'elem' => 'user', 'operator' => 'like', 'field' => 'name'],
        ];
    }

    public function _getFieldOptions()
    {
        return [
            'signin_num' => ['width' => '60'],
            'nickname' => ['width' => '120'],
            'user_id' => ['width' => '100'],
            'last_ip' => ['width' => '120'],
        ];
    }
}
