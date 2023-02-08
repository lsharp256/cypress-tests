describe("Sort by Descending and Ascending filter", () => {
  beforeEach(() => {
    cy.visit("http://localhost/");
  });

  it("Sorts the products by price low to high", () => {
    // select the "Price: Low to High" option from the sort-by dropdown
    cy.get("#sort-by").select("Price: Low to High");
    // verify that the URL includes the "sort-by=price-asc" query string
    cy.url().should('include', 'sort-by=price-asc').then(() => {
      // get all of the elements with the class "product-price-value"
      cy.get('.product-price-value').then(($elements) => {
        // convert the list of elements to a list of prices
        const prices = $elements.toArray().map(el => parseFloat(el.innerText.replace(/[^\d.]/g, '')));
        // verify that the prices are in ascending order
        expect(prices).to.deep.equal([...prices].sort((a, b) => a - b));
      });
    });
  });


  it("Sorts the products by price high to low", () => {
    // Select the "Price: High to Low" option from the sort-by dropdown
    cy.get("#sort-by").select("Price: High to Low");
    // Verify that the URL includes the "sort-by=price-desc" query parameter
    cy.url().should('include', 'sort-by=price-desc').then(() => {
      // Initialize an array to store the prices of each product
      let prices = [];
      // Iterate through each product price element
      cy.get('.product-price-value').each(($el) => {
        // Parse the text of each product price element into a float and add it to the
        // prices array
        prices.push(parseFloat($el.text().replace(/[^\d.]/g, '')));
      });
      // Iterate through the prices array and verify that each price is at most equal to the
      // previous price
      for (let i = 1; i < prices.length; i++) {
        expect(prices[i]).to.be.at.most(prices[i - 1]);
      }
    });
  });
});
