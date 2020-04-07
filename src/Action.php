<?php

namespace Signifly\Travy\Schema;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;
use Signifly\Travy\Schema\Concerns\HasMeta;
use Signifly\Travy\Schema\Concerns\Instantiable;
use Signifly\Travy\Schema\Fields\Status;
use Signifly\Travy\Schema\Support\Comparator;

/** @method static static make(string $name, string $status = Status::PRIMARY, ?string $icon = null) */
abstract class Action implements Arrayable, JsonSerializable
{
    use HasMeta;
    use Instantiable;

    /**
     * The button name of the action.
     *
     * @var string
     */
    protected $name;

    /**
     * The button status / color of the action.
     *
     * @var string
     */
    protected $status;

    /**
     * The button icon of the action.
     *
     * @var string|null
     */
    protected $icon;

    /**
     * The button size of the action.
     *
     * @var string
     */
    protected $size;

    /**
     * The definition for the action type.
     *
     * @var array
     */
    protected $actionType;

    /**
     * Create a new Action.
     *
     * @param string      $name
     * @param string      $status
     * @param string|null $icon
     */
    public function __construct(
        string $name,
        string $status = Status::PRIMARY,
        ?string $icon = null
    ) {
        $this->name = $name;
        $this->status = $status;
        $this->icon = $icon;
    }

    /**
     * The action type.
     *
     * @return array
     */
    abstract public function actionType(): array;

    /**
     * Show action based on the provided comparators.
     *
     * @param  Comparator[] $comparators
     * @return self
     */
    public function show(array $comparators): self
    {
        return $this->withMeta(['show' => collect($comparators)->jsonSerialize()]);
    }

    /**
     * Hide action on given constraint.
     *
     * @param  string $key
     * @param  mixed $value
     * @param  string $operator
     * @return self
     */
    public function onSubmit(string $url): self
    {
        return $this->withMeta(['onSubmit' => compact('url')]);
    }

    /**
     * Set the size of the action.
     *
     * @param  string $size
     * @return self
     */
    public function size(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Prepare the action for JSON serialization.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Convert the action to an array.
     *
     * @return array
     */
    public function toArray()
    {
        $schema = new Schema([
            'name' => $this->name,
            'status' => $this->status,
            'icon' => $this->icon,
            'actionType' => array_merge($this->actionType(), $this->meta()),
        ]);

        if (isset($this->size)) {
            $schema->set('size', $this->size);
        }

        return $schema->toArray();
    }
}
