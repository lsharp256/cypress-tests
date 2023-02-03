describe("Price filter", () => {
    beforeEach(() => {
      cy.visit("http://localhost/");
    });
  
    it("should filter by price (300-500)", () => {
        // Select the minimum price filter to 300
        cy.get("#filter-price-min").select("300");
        // Verify that the URL includes the minimum price filter of 300
        cy.url().should('include', 'filter-price-min=300&filter-price-max=max')
        // Select the maximum price filter to 500
        cy.get("#filter-price-max").select("500")
        // Verify that the URL includes both the minimum and maximum price filters
        cy.url().should('include', 'filter-price-min=300&filter-price-max=500').then(() => {
            // Iterate through each product price element
            cy.get('.product-price-value').each(($el) => {
            // Wrap each element in a cy.wrap() so that we can use chaining and the should assertion
            cy.wrap($el).should(($el) => {
            // Verify that each product price is below 500
            expect(parseFloat($el.text().replace(/[^\d.]/g, ''))).to.be.below(500);
            // Verify that each product price is above 300
            expect(parseFloat($el.text().replace(/[^\d.]/g, ''))).to.be.above(300);
            });
        });
        
        });
    });
});
