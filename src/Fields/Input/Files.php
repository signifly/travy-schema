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
     * The default value for the field.
     *
     * @var mixed
     */
    public $defaultValue = [];

    /**
     * Set the fileTypes prop.
     *
     * @param  string $key
     * @return self
     */
    public function fileTypes(string $key): self
    {
        return $this->setProp('fileTypes', $key);
    }

    /**
     * Set the limit prop.
     *
     * @param  int $limit
     * @return self
     */
    public function limit(int $limit): self
    {
        return $this->setProp('limit', $limit);
    }

    /**
     * Set the multiple prop.
     *
     * @param  bool $multiple
     * @return self
     */
    public function multiple(bool $multiple = true): self
    {
        return $this->setProp('multiple', $multiple);
    }

    /**
     * Set the url prop.
     *
     * @param  string $key
     * @return self
     */
    public function url(string $key): self
    {
        return $this->setProp('url', $key);
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
