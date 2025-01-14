@order
Feature: Spliting orders when cart was filled with products from different Vendors
  As a customer
  I want to be able to buy products from multiple vendors

  Background:
    Given the store operates on a single channel in "United States"
    And store has 5 products from different vendors
    And there is a customer "customer test" with an email "email@example.com"
    And I am a logged in customer with name "customer test"

  @ui
  Scenario: Picking products from different Vendors
    Given store has 5 products from different Vendors
    And I have 3 products in cart
    And I finalize order
    And I am on "en_US/account/orders/"
    Then I should see 3 orders

  @ui
  Scenario: Picking products from same Vendor
    Given store has 5 products from same Vendor
    And I have 2 products in cart
    And I finalize order
    And I am on "en_US/account/orders/"
    Then I should see 1 orders

  @ui
  Scenario: Do not Assign number to primary order
    Given store has 4 products from different Vendors
    And I have 3 products in cart
    And I finalize order
    Then primary order should not have number


  @ui
  Scenario: Browsing orders, admin cannot see primary orders
    Given store has 4 products from different Vendors
    And I have 3 products in cart
    And I finalize order
    Given I am logged in as an administrator
    And I am on "/admin"
    And I follow "Orders"
    Then I should see 3 secondary orders

  @ui
  Scenario: Browsing orders history, customer cannot see primary orders
    Given store has 4 products from different Vendors
    And I have 3 products in cart
    And I finalize order
    And I am on "/"
    And I follow "My account"
    And I follow "Order history"
    Then I should see 3 secondary orders in order history
