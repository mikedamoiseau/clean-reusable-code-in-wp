<?php
namespace Acme\App;

use Acme\WordPress\PostContainerTrait;
use Acme\App\Product;

/**
 * Class responsible for variation management
 */
class Variation {
  use PostContainerTrait;
  
  const FIELD_NAME_COLOR = 'acme_variation_color';

  const FIELD_NAME_PRODUCT_ID = 'acme_variation_product_id';

  /**
   * Constructor of the class Product
   *
   * @param int $id The ID of the variation to load
   */
  public function __construct(int $id)
  {
    $this->loadPost($id);
  }

  /**
   * Get the variation color
   *
   * @return string The variation color
   */
  public function getColor(): string
  {
    return (string) $this->getOption(self::FIELD_NAME_COLOR);
  }

  /**
     * Get the Product the Variation belongs to
     *
     * @return Product The product the variation belongs to
     * @throws \Exception
     */
    public function getProduct(): Product
    {
        $productId = (int) $this->getOption(self::FIELD_NAME_PRODUCT_ID);

        return new Product($productId);
    }

    /**
     * Get variations from a product
     * 
     * @var Product $product the Product
     * @return array The list of variations of the product
     */
    static public function getFromProduct(Product $product): array
    {
      $post_ids = self::get(
        \Acme\WordPress\Cpt\VariationCpt::NAME,
        [Variation::FIELD_NAME_PRODUCT_ID => $product->getId()]
      );
      
      return array_map(
        function (int $postId) {
          return new Variation($postId);
        },
        $post_ids
      );
    }

}