const chrome = require("selenium-webdriver/chrome");
const { Builder, By, Key, until } = require("selenium-webdriver");

const screen = {
    width: 640,
    height: 480
};

let options = new chrome.Options().headless().windowSize(screen);
// options.setBinary("node_modules/.bin/chromedriver");

jasmine.DEFAULT_TIMEOUT_INTERVAL = 60000;

let url = "https://base.wayne.local/styleguide/news/item-1";

describe("HTML Validation", () => {
    let driver;

    beforeEach(done => {
        driver = new Builder()
            .forBrowser("chrome")
            .setChromeOptions(options)
            .build();
        //driver = new selenium.Builder().forBrowser("chrome").build();

        driver.get(url).then(() => {
            done();
        });
    });

    afterEach(function(done) {
        driver.quit().then(() => {
            done();
        });
    });

    it("contains spec with an expectation", () => {
        expect(true).toBe(true);
    });
});
