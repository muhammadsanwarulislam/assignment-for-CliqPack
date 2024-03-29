<?php 

namespace Repository\Item;

use App\Models\Item;
use Repository\BaseRepository;

class ItemRepository extends BaseRepository
{
    public function model()
    {
        return Item::class;
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