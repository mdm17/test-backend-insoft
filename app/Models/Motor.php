<?php

namespace App\Models;

use Illuminate\Events\Dispatcher;
use Parental\HasParent;

class Motor extends Kendaraan
{
    use HasParent;

    # Override Method HasParent
    public static function bootHasParent()
    {
        if (static::getEventDispatcher() === null) {
            static::setEventDispatcher(new Dispatcher());
        }

        static::creating(function ($model) {
            if ($model->parentHasHasChildrenTrait()) {
                $model->forceFill(
                    [$model->getInheritanceColumn() => $model->classToAlias(get_class($model))]
                );
            }
        });

        static::addGlobalScope(function ($query) {
            $instance = new static;
            $query->where($instance->getInheritanceColumn(), $instance->classToAlias(get_class($instance)));
        });
    }

    public function __construct($attributes = [])
    {
        $fillable = ['mesin', 'suspensi', 'transmisi'];
        $this->fillable = array_merge($fillable, $this->fillable);
        parent::__construct($attributes);
    }
}
