describe("Price filter", () => {
    beforeEach(() => {
      cy.visit("http://localhost/");
    });
  
    it("should filter by (4*) rating", () => {
        // Select the minimum price filter to 300
        cy.get("#filter-rating-4-and-up").click();
        // Verify that the URL includes the minimum price filter of 300
        cy.url().should('include', 'filter-price-min=min&filter-price-max=max&filter-rating=4-and-up').then(() => {
            // Iterate through each product price element
            cy.get('.product-rating').each(($el) => {
            // Wrap each element in a cy.wrap() so that we can use chaining and the should assertion
            cy.wrap($el).should(($el) => {
            // Verify that each product rating is above 4.0
            expect(parseFloat($el.text().replace(/[^\d.]/g, ''))).to.be.above(4.0);
                });
            });
        });
    });
});