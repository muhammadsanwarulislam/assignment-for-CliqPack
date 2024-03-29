<?php 

namespace Repository\Inventory;

use App\Models\Inventory;
use Repository\BaseRepository;

class InventoryRepository extends BaseRepository
{
    public function model()
    {
        return Inventory::class;
    }

    protected function applyDefaultCriteria($query)
    {
        parent::applyDefaultCriteria($query);
        $query->orderBy('created_at', 'desc');
    }

    protected function getSearchFields()
    {
        return ['name'];
    }
}