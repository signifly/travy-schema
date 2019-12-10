<?php

namespace Signifly\Travy\Schema\Fields;

use Signifly\Travy\Schema\Action;

class ButtonAction extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'button-action';

    /**
     * Set the action of the field.
     *
     * @param  Action $action
     * @return self
     */
    public function action(Action $action, bool $mapped = false): self
    {
        return $this->setProp('action', $action->jsonSerialize(), $mapped);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        $this->setProp('data', '$root');
    }
}
