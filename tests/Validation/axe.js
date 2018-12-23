var selenium = require("selenium-webdriver"),
    AxeBuilder = require("axe-webdriverjs");

jasmine.DEFAULT_TIMEOUT_INTERVAL = 60000;

let url = "http://base.localhost/styleguide/news/item-1";
let exceptions = [
    "#q" // https://www.w3.org/WAI/tutorials/forms/labels/#hiding-label-text
];

describe("Accessibility", function() {
    var driver;

    beforeEach(function(done) {
        driver = new selenium.Builder().forBrowser("chrome").build();

        driver.get(url).then(function() {
            done();
        });
    });

    // Close website after each test is run (so it is opened fresh each time)
    afterEach(function(done) {
        driver.quit().then(function() {
            done();
        });
    });

    it("should analyze the page with aXe", function(done) {
        let errors = [];

        AxeBuilder(driver).analyze(function(err, results) {
            if (err) {
                done();
            }

            if (results.violations.length > 0) {
                errors = removeExceptions(results.violations);
                displayErrors(errors);
            }

            expect(errors.length).toBe(0);
            done();
        });
    });
});

const removeExceptions = items => {
    return items.filter(
        item =>
            item.nodes.filter(node => !exceptions.includes(node.target[0]))
                .length !== 0
    );
};

const displayErrors = errors => {
    console.error(
        errors.length + " Accessibility Violation(s):\n" + url,
        "\n------"
    );

    errors.forEach(error => {
        console.error(error.description, "\n");

        error.nodes.forEach(item => {
            console.error(item.failureSummary, "\n", item.html, "\n");
        });
        console.error("-----\n");
    });
};
