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
      cy.get("#sort-by").select("Price: High to Low");
      cy.url().should('include', 'sort-by=price-desc').then(() => {
        let prices = [];
        cy.get('.product-price-value').each(($el) => {
          prices.push(parseFloat($el.text().replace(/[^\d.]/g, '')));
        });
        for (let i = 1; i < prices.length; i++) {
          expect(prices[i]).to.be.at.most(prices[i - 1]);
        }
      });
    });
  });
