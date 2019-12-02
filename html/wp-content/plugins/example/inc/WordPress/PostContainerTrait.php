<?php
namespace Acme\WordPress;

use Exception;

/**
 * Trait PostContainerTrait
 *
 * This trait will contain all the methods that directly access the post property of a class
 */
trait PostContainerTrait {
  /** @var \WP_Post The WordPress post data */
  private $post;

  /**
     * Load the Post from WordPress
     *
     * @param int $id The WordPress post ID
     *
     * @throws \Exception If the post is not found in DB
     */
    private function loadPost(int $id): void
    {
      // Try to load the post from the DB
      $post = get_post($id);

      if ($post === null) {
          throw new Exception(
              sprintf(
                'Could not load entity with ID %d.',
                $id
              ),
              404
          );
      }

      // Make sure the post is of the correct post type
      $expected_cpt = strtolower(str_replace('\\App\\', '-', get_class()));

      if ($post->post_type !== $expected_cpt) {
          throw new Exception(
              sprintf('Trying to load a %s with a wrong ID', ucfirst($expected_cpt)),
              400
          );
      }

      $this->post = &$post;
    }

    /**
     * Get the Post ID
     *
     * @return int The Post ID
     */
    public function getId(): int
    {
        return $this->post->ID;
    }

    /**
     * Get the post title
     *
     * @return string The Post title
     */
    public function getName(): string
    {
      return $this->post->post_title;
    }

    /**
     * Get the post content
     *
     * @return string The Post description
     */
    public function getDescription(): string
    {
      return $this->post->post_content;
    }

    /**
     * Get an option value
     *
     * @var string $name The option name
     * @var bool $singleValue The option is a single value or has multiple values in the DB
     * @return string the option value
     */
    public function getOption(string $name, bool $singleValue = true): string
    {
      return (string) get_post_meta($this->post->ID, $name, $singleValue);
    }

    static public function get(string $cpt, array $metas = []): array
    {
      $args = [
        'posts_per_page' => -1,
        'post_type'      => $cpt,
        'post_status'    => 'publish',
        'fields'         => 'ids',
        'meta_query'     => [],
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
      ];

      if (!empty($metas)) {
        foreach($metas as $metaKey => $metaValue) {
          $args['meta_query'][] = [
            'key'   => $metaKey,
            'value' => $metaValue,
          ];
        }
      }

      $post_ids = get_posts($args);

      return $post_ids;
    }
}
