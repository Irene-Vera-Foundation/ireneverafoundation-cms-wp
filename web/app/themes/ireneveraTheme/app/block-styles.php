<?php

function mytheme_register_block_styles()
{
    register_block_style(
        ['core/button'],
        [
            'name' => 'primary-button',
            'label' => 'Primary Button',
        ],
    );

    register_block_style(
        ['core/button'],
        [
            'name' => 'secondary-button',
            'label' => 'Secondary Button',
        ],
    );
}

add_action('init', 'mytheme_register_block_styles');