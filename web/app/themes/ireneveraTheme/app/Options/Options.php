<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class Options extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Options';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Options | Options';

    /**
     * The option page field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('options');

        $fields
            ->addTab('site_settings', [
                'label' => 'Site Settings',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => [],
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'placement' => '',
            ])
            ->addText('donate_label', [
                'label' => 'Donate Label',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '30',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ])
            ->addUrl('donate_link', [
                'label' => 'Donate Link',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => [],
                'wrapper' => [
                    'width' => '70',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
                'placeholder' => '',
            ]);

        return $fields->build();
    }
}
