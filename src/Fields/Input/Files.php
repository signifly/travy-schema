<?php

namespace Signifly\Travy\Schema\Fields\Input;

use Signifly\Travy\Schema\Fields\Field;

class Files extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-files';

    /**
     * Indicates if the element should be shown on the index view.
     *
     * @var bool
     */
    public $showOnIndex = false;

    /**
     * Set the fileTypes prop.
     *
     * @param  string $key
     * @return self
     */
    public function fileTypes(string $key, bool $mapped = false): self
    {
        return $this->setProp('fileTypes', $key, $mapped);
    }

    /**
     * Set the limit prop.
     *
     * @param  int $limit
     * @return self
     */
    public function limit(int $limit, bool $mapped = false): self
    {
        return $this->setProp('limit', $limit, $mapped);
    }

    /**
     * Set the multiple prop.
     *
     * @param  bool $multiple
     * @return self
     */
    public function multiple(bool $multiple = true, bool $mapped = false): self
    {
        return $this->setProp('multiple', $multiple, $mapped);
    }

    /**
     * Set the url prop.
     *
     * @param  string $key
     * @return self
     */
    public function url(string $key, bool $mapped = false): self
    {
        return $this->setProp('url', $key, $mapped);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        $this->setProp('value', $this->attribute);
    }
}
