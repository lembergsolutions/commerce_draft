<?php

namespace Drupal\draft_breadcrumb\Breadcrumb;

use Drupal\Core\Breadcrumb\Breadcrumb;
use Drupal\Core\Breadcrumb\BreadcrumbBuilderInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Link;

/**
 * Class to define draft breadcrumb builder with product category.
 */
class DraftBreadcrumbBuilder implements BreadcrumbBuilderInterface {

  /**
   * {@inheritdoc}
   */
  private function addCategory(RouteMatchInterface $route_match, $breadcrumb) {
    $product = $route_match->getParameter('commerce_product');
    $category = $product->get('categories')->first()->entity;
    $id = $category->id();
    $name = $category->label();
    $product_name = $product->label();
    $breadcrumb->addLink(Link::createFromRoute($name, 'entity.taxonomy_term.canonical', ['taxonomy_term' => $id]));
    $breadcrumb->addlink(Link::createFromRoute($product_name, '<nolink>'));

    return $breadcrumb;
  }

  /**
   * {@inheritdoc}
   */
  public function applies(RouteMatchInterface $route_match) {
    if ($route_match->getRouteName() == 'entity.commerce_product.canonical') {
      return TRUE;
    }

    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function build(RouteMatchInterface $route_match) {
    $breadcrumb = new Breadcrumb();
    $breadcrumb->addLink(Link::createFromRoute('Home', '<front>'));
    $breadcrumb = $this->addCategory($route_match, $breadcrumb);
    $breadcrumb->addCacheContexts(['route']);

    // Return object of type breadcrumb.
    return $breadcrumb;
  }

}
