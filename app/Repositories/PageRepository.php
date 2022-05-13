<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\Behaviors\HandleNesting;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Page;

class PageRepository extends ModuleRepository
{
    use HandleBlocks, HandleSlugs, HandleMedias, HandleRevisions, HandleNesting;

    public function __construct(Page $model)
    {
        $this->model = $model;
    }


    // implement the filter method
    public function filter($query, array $scopes = [])
    {

        // and use the following helpers

        // add a where like clause
        $this->addLikeFilterScope($query, $scopes, 'field_in_scope');

        // add orWhereHas clauses
        $this->searchIn($query, $scopes, 'field_in_scope', ['field1', 'field2', 'field3']);

        // add a whereHas clause
        $this->addRelationFilterScope($query, $scopes, 'field_in_scope', 'relationName');

        // or just go manually with the $query object
        if (isset($scopes['field_in_scope'])) {
            $query->orWhereHas('relationName', function ($query) use ($scopes) {
                $query->where('field', 'like', '%' . $scopes['field_in_scope'] . '%');
            });
        }

        // don't forget to call the parent filter function
        return parent::filter($query, $scopes);
    }
}
