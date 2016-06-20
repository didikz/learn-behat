Feature: Product basket
  In order to buy products
  As a customer
  I need to be able to put interisting products into a basket

  Rules:
  - VAT is 20%
  - Delivery for basket under IDR100000 is IDR30000
  - Delivery for basket over IDR100000 is IDR20000

  Scenario: Buying a single product under IDR100000
    Given there is a "Ote Ote Malang", which costs IDR50000
    When I add the "Ote Ote Malang" to the basket
    Then I Should have 1 product in the basket
    And the overall basket price should be IDR90000

  Scenario: Buying a single product over IDR100000
    Given there is a "Ote Ote Malang", which costs IDR150000
    When I add the "Ote Ote Malang" to the basket
    Then I should have 1 product in the basket
    And the overall basket price should be IDR200000

  Scenario: Buying two products over IDR100000
    Given there is a "Ote Ote Malang", which costs IDR100000
    And there is a "Rondo Royal", which costs IDR50000
    When I add the "Ote Ote Malang" to the basket
    And I add the "Rondo Royal" to the basket
    Then I should have 2 products in the basket
    And the overall basket price should be IDR200000