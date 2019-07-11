let pages = [
    "/styleguide",
    "/styleguide/homepage",
    "/styleguide/childpage",
    "/styleguide/news",
    "/styleguide/news/item-1",
    "/styleguide/news?page=2",
    "/styleguide/news/topics",
    "/styleguide/news/topic/topic-example",
    "/styleguide/profiles",
    "/styleguide/profile/aa0000",
    "/styleguide/directory",
    "/styleguide/fullwidth",
    "/styleguide/grid",
    "/styleguide/header/title/single",
    "/styleguide/header/title/double",
    "/styleguide/header/shorttitle/single",
    "/styleguide/header/shorttitle/double"
];

context("Actions", () => {
    Cypress._.each(pages, page => {
        it(`Test ${page} for validation`, () => {
            cy.visit(page);
            cy.injectAxe();
            cy.checkA11y();
        });
    });
});
