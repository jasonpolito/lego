<?php

namespace App\Models\Presenters;

use App\Models\Presenters\Presenter;

class PagePresenter extends Presenter
{
    /**
     * Store the original model instance.
     *
     * @var Model
     */
    protected $model;
    public function __construct($model)
    {
        $this->model = $model;
    }
    /**
     * Return the requested presenter attribute.
     *
     * Calls the function if that exists,
     * or returns the property on the original model.
     *
     * @param string $property The requested property
     */
    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return $this->{$property}();
        }
        return $this->model->{$property};
    }

    public function fullSlugAsString()
    {
        return $this->permalinkBase;
    }

    public function pageType()
    {
        return \Str::title($this->page_type);
    }

    /**
     * Get the tag list as concatenated string.
     *
     * @return string
     */
    public function tagsAsString()
    {
        $tags = $this->tags->map(function ($tag) {
            return $tag->name;
        })->implode(', ');
        if (!empty($tags)) {
            return "Tags: " . $tags;
        } else {
            return '---';
        }
    }

    /**
     * Get the last updated in human terms.
     *
     * @return string
     */
    public function lastUpdated()
    {
        $user = $this->model->revisions()->latest()->first()->user->name;
        return "Updated: " . \Carbon\Carbon::parse($this->updated_at)->diffForHumans() . ' by ' . $user;
    }
}
