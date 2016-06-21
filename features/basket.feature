Feature: Product basket
  In order to buy products
  As a customer
  I need to be able to put interisting products into a basket

  Rules:
  - VAT is 20%
  - Delivery for basket under 100000 is 30000
  - Delivery for basket over 100000 is 20000

  Scenario: Buying a single product under 100000
    Given there is a "Ote Ote Malang", which costs 50000
    When I add the "Ote Ote Malang" to the basket
    Then I Should have 1 product in the basket
    And the overall basket price should be 80000

  Scenario: Buying a single product over 100000
    Given there is a "Ote Ote Malang", which costs 150000
    When I add the "Ote Ote Malang" to the basket
    Then I should have 1 product in the basket
    And the overall basket price should be 200000

  Scenario: Buying two products over 100000
    Given there is a "Ote Ote Malang", which costs 100000
    And there is a "Rondo Royal", which costs 50000
    When I add the "Ote Ote Malang" to the basket
    And I add the "Rondo Royal" to the basket
    Then I should have 2 products in the basket
    And the overall basket price should be 200000