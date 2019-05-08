import 'accordion/src/accordion.js';

(function() {
    "use strict";

    document.querySelectorAll('.accordion').forEach(function(item) {
        new Accordion(item, {
            onToggle: function(target){
                // Only allow one accordion item open at time
                target.accordion.folds.forEach(fold => {
                    if(fold !== target) {
                        fold.open = false;
                    }
                });

                // Allow the content to be shown if its open or hide it when closed
                target.content.classList.toggle('hidden')
            },
            enabledClass: 'enabled'
        });

        // Hide all accordion content from the start so content inside it isn't part of the tabindex
        item.querySelectorAll('.content').forEach(function(item) {
            item.classList.add('hidden');
        });

        // Remove the role="tablist" since it is not needed
        item.removeAttribute('role');

        item.querySelectorAll('li a:first-child').forEach(function(item) {
            item.setAttribute('role', 'button');
        });
    });

    document.querySelectorAll('ul.accordion > li').forEach(function(item) {
        // Apply the required content fold afterwards to simplify the html
        item.querySelector('div').classList.add('fold');
    });
})();
