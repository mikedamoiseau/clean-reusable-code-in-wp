<?php
namespace Acme\App;

use Acme\WordPress\PostContainerTrait;

/**
 * Class responsible for product management
 */
class Product
{
  use PostContainerTrait;

  const FIELD_NAME_PRICE = 'acme_product_price';

  /**
   * Constructor of the class Product
   *
   * @param int $id The ID of the product to load
   */
  public function __construct(int $id)
  {
    $this->loadPost($id);
  }

  /**
   * Get the product price
   *
   * @return int The product price
   */
  public function getPrice(): int
  {
    return (int) $this->getOption(self::FIELD_NAME_PRICE);
  }

  /**
   * Get the product variations
   *
   * @return Variation[] The list of variations
   */
  public function getVariations(): array
  {
    return Variation::getFromProduct($this);

  }

}