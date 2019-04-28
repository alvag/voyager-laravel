<?php

namespace App\Widgets;

use Illuminate\Support\Str;
use TCG\Voyager\Widgets\BaseDimmer;

class Customer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = \App\Customer::count();
        $string = trans_choice(__('Cliente|Clientes'), $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-bag',
            'title'  => "{$count} {$string}",
            'text'   => __('Tiene :count :string en su base de datos. Haga clic en el botón de abajo para ver todos los clientes. ', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('Ver todos los clientes'),
                'link' => route('voyager.customers.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return app('VoyagerAuth')->user()->can('browse', new \App\Customer);
    }
}
