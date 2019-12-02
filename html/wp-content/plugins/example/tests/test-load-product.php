<?php
/**
 * Class LoadProduct
 */
use Acme\App\Product;
/**
 * Our class to test the product loading functionality
 */
class LoadProduct extends WP_UnitTestCase
{
  /**
   * Load a normal product
   */
  public function test_load_product_correctly()
  {
    $post = self::factory()->post->create_and_get([
      'post_type' => \Acme\WordPress\Cpt\ProductCpt::NAME,
    ]);
    $product = new Product($post->ID);
    $this->assertTrue(true, 'Product loaded correctly');
  }
  /**
   * Load a product with the ID of another post type
   */
  public function test_load_product_with_wrong_type_id()
  {
    $this->expectExceptionCode(400);
    $post = self::factory()->post->create_and_get();
    $product = new Product($post->ID);
  }
  public function test_load_product_with_non_existing_id()
  {
    $this->expectExceptionCode(404);
    $post = self::factory()->post->create_and_get();
    $product = new Product(9455);
  }
}