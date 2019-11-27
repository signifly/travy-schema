<?php

namespace Signifly\Travy\Schema;

use Signifly\Travy\Schema\Concerns\HasActions;

class Dropdown extends Action
{
    use HasActions;

    /**
     * The action type.
     *
     * @return array
     */
    public function actionType(): array
    {
        return [
            'id' => 'dropdown',
            'props' => [
                'actions' => $this->preparedActions(),
            ],
        ];
    }
}
