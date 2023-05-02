<?php

namespace Seoegypt\ValueFilter;

use Laravel\Nova\Filters\Filter;
use Laravel\Nova\Http\Requests\NovaRequest;

class ValueFilter extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'value-filter';

    public $type="number";

    public function jsonSerialize(): array
    {
        return array_merge([
            'class' => $this->key(),
            'name' => $this->name(),
            'type'=>$this->type,
            'component' => $this->component(),
            'options' => collect($this->options(app(NovaRequest::class)))->map(function ($value, $label) {
                if (is_array($value)) {
                    return array_merge(['label' => $label], $value);
                } elseif (is_string($label)) {
                    return ['label' => $label, 'value' => $value];
                }

                return ['label' => $value, 'value' => $value];
            })->values()->all(),
            'currentValue' => $this->default() ?? '',
        ], $this->meta());
    }

    /**
     * Apply the filter to the given query.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(NovaRequest $request, $query, $value)
    {
        return $query;
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function options(NovaRequest $request)
    {
        return [];
    }
}
