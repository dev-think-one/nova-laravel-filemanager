<?php

namespace ThinkOne\NovaLaravelFilemanager;

use Laravel\Nova\Fields\Field;

class NLFMImage extends Field {
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nlfm-image';

    public function filemanagerPath( string $path ) {
        $this->withMeta( [
            'filemanager_path' => $path,
        ] );

        return $this;
    }

    public function meta() {
        if ( ! isset( $this->meta['filemanager_path'] ) ) {
            $this->meta['filemanager_path'] = config( 'lfm.filemanager_path', 'filemanager' );
        }

        return $this->meta;
    }


}
