<?php

namespace Acme\WordPress\Cpt;

/**
 * Class VariationCpt
 *
 * @package Acme\Cpt
 *
 * Class responsible for the registration of the custom post type Variation
 */
class VariationCpt
{
    /** @var string CPT name */
    const NAME = 'acme-variation';

    /**
     * VariationCpt constructor.
     */
    public function __construct()
    {
        add_action('init', [$this, 'initCpt']);
    }

    /**
     * Callback method responsible for the creation of the CPT.
     * The method is called during the action `init`.
     */
    public function initCpt()
    {
        $labels = [
            'name'                  => _x('Variations', 'Post Type General Name', 'acme'),
            'singular_name'         => _x('Variation', 'Post Type Singular Name', 'acme'),
            'menu_name'             => __('Variations', 'acme'),
            'name_admin_bar'        => __('Variation', 'acme'),
            'archives'              => __('Item Archives', 'acme'),
            'attributes'            => __('Item Attributes', 'acme'),
            'parent_item_colon'     => __('Parent Item:', 'acme'),
            'all_items'             => __('All Items', 'acme'),
            'add_new_item'          => __('Add New Item', 'acme'),
            'add_new'               => __('Add New', 'acme'),
            'new_item'              => __('New Item', 'acme'),
            'edit_item'             => __('Edit Item', 'acme'),
            'update_item'           => __('Update Item', 'acme'),
            'view_item'             => __('View Item', 'acme'),
            'view_items'            => __('View Items', 'acme'),
            'search_items'          => __('Search Item', 'acme'),
            'not_found'             => __('Not found', 'acme'),
            'not_found_in_trash'    => __('Not found in Trash', 'acme'),
            'featured_image'        => __('Featured Image', 'acme'),
            'set_featured_image'    => __('Set featured image', 'acme'),
            'remove_featured_image' => __('Remove featured image', 'acme'),
            'use_featured_image'    => __('Use as featured image', 'acme'),
            'insert_into_item'      => __('Insert into item', 'acme'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'acme'),
            'items_list'            => __('Items list', 'acme'),
            'items_list_navigation' => __('Items list navigation', 'acme'),
            'filter_items_list'     => __('Filter items list', 'acme'),
        ];

        $args = [
            'label'               => __('Variation', 'acme'),
            'labels'              => $labels,
            'supports'            => ['title'],
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
        ];
        register_post_type(self::NAME, $args);
    }
}
