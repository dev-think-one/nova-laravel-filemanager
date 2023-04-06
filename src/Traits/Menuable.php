<?php

namespace ThinkOne\NovaLaravelFilemanager\Traits;

trait Menuable
{
    protected string $title  = '';
    protected string $icon   = 'document-search';
    protected bool $hideMenu = false;
    protected string $lfmUrl = '/filemanager';

    protected bool $displayImages = true;
    protected bool $displayFiles  = true;

    public function title(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function icon(string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function hideMenu(bool $hide = true): static
    {
        $this->hideMenu = $hide;

        return $this;
    }

    public function lfmUrl(string $lfmUrl): static
    {
        $this->lfmUrl = $lfmUrl;

        return $this;
    }

    public function onlyFiles(): static
    {
        $this->displayImages = false;
        $this->displayFiles  = true;

        return $this;
    }

    public function onlyImages(): static
    {
        $this->displayImages = true;
        $this->displayFiles  = false;

        return $this;
    }
}
