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
    public function action(Action $action): self
    {
        return $this->withProps(['_action' => $action->jsonSerialize()]);
    }
}
