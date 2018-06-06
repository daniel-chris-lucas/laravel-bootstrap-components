<?php

namespace Okipa\LaravelBootstrapComponents\Form;

use App\Components\Component;
use Illuminate\Database\Eloquent\Model;

class Input extends Component
{
    /**
     * The component config key.
     *
     * @property string $view
     */
    protected $configKey = 'input';
    /**
     * The input associated model.
     *
     * @property \Illuminate\Database\Eloquent\Model $model
     */
    protected $model;
    /**
     * The input type.
     *
     * @property string $type
     */
    protected $type;
    /**
     * The input name.
     *
     * @property string $name
     */
    protected $name;
    /**
     * The input icon.
     *
     * @property string $icon
     */
    protected $icon;
    /**
     * The input legend.
     *
     * @property string $legend
     */
    protected $legend;
    /**.
     * The input show label status
     *
     * @property bool $showLabel
     */
    protected $showLabel = true;
    /**
     * The input label.
     *
     * @property string $label
     */
    protected $label;
    /**
     * The input value.
     *
     * @property string $value
     */
    protected $value;
    /**
     * The input placeholder.
     *
     * @property string $placeholder
     */
    protected $placeholder;

    /**
     * Set the input associated model.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return \App\Components\Form\Input
     */
    public function model(Model $model): Input
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Set the input type.
     *
     * @param string $type
     *
     * @return \App\Components\Form\Input
     */
    public function type(string $type): Input
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set the input name.
     *
     * @param string $name
     *
     * @return \App\Components\Form\Input
     */
    public function name(string $name): Input
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the input icon.
     *
     * @param string $icon
     *
     * @return \App\Components\Form\Input
     */
    public function icon(string $icon): Input
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Set the input legend.
     *
     * @param string $legend
     *
     * @return \App\Components\Form\Input
     */
    public function legend(string $legend): Input
    {
        $this->legend = $legend;

        return $this;
    }

    /**
     * Set the input placeholder.
     *
     * @param string $placeholder
     *
     * @return \App\Components\Form\Input
     */
    public function placeholder(string $placeholder): Input
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    /**
     * Set the input Value.
     *
     * @param mixed $value
     *
     * @return \App\Components\Form\Input
     */
    public function value($value): Input
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Set the input label.
     *
     * @param string $label
     *
     * @return \App\Components\Form\Input
     */
    public function label(string $label): Input
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Hide the input label.
     *
     * @return \App\Components\Form\Input
     */
    public function hideLabel(): Input
    {
        $this->showLabel = false;

        return $this;
    }

    /**
     * Set the input values.
     *
     * @return array
     */
    protected function values(): array
    {
        return array_merge(parent::values(), [
            'model'       => $this->model,
            'type'        => $this->type,
            'name'        => $this->name,
            'icon'        => $this->icon ? $this->icon : $this->defaultIcon(),
            'legend'      => $this->legend,
            'showLabel'   => $this->showLabel,
            'label'       => $this->label ? $this->label : __('validation.attributes.' . $this->name),
            'value'       => $this->value ? $this->value : ($this->model ? $this->model->{$this->name} : null),
            'placeholder' => $this->placeholder ? $this->placeholder : __('validation.attributes.' . $this->name),
        ]);
    }

    /**
     * Set the input default icon
     *
     * @return string
     */
    protected function defaultIcon(): string
    {
        return config($this->configFile . '.' . $this->configKey . '.icon');
    }
}
