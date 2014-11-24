Feature: GenerateIframe
  In Order To process payment
  As a paying customer
  I need to be able to access payment form
  Scenario: Create a generic form
    Given  I have made my order
    Then I should get "<iframe src="some_source"></iframe>"

