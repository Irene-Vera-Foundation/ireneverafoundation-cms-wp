<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    public function with()
    {
        return [
            'siteName' => $this->siteName(),
            'donateLabel' => $this->getDonateLabel(),
            'donateLink' => $this->getDonateLink(),
            'logo' => $this->getLogo()
        ];
    }

    /**
     * Retrieve the site name.
     */
    public function siteName(): string
    {
        return get_bloginfo('name', 'display');
    }

    public function getLogo()
    {
        $logo = get_theme_mod('custom_logo');

        if ($logo) {
            $logoSrc = wp_get_attachment_image_src($logo, 'full');

            if (is_array($logoSrc) && isset($logoSrc[0])) {
                return $logoSrc[0];
            }
        }

        return null;
    }


    public function getDonateLabel()
    {
        return get_field('donate_label', 'options');
    }

    public function getDonateLink()
    {
        return get_field('donate_link', 'options');
    }
}
