(function ($) {
    "use strict";

    $.fn.hideAndPeek = function (overrides) {
        var defaults = { length: 12, indicator: "…" },
            options = $.extend(defaults, overrides);

        return this.each(function () {
            var $element = $(this),
                originalText = $element.text(),
                truncatedText,
                setOriginalText = function () { $element.text(originalText); },
                setTruncatedText = function () { $element.text(truncatedText); };

            if (originalText.length > options.length) {
                truncatedText = originalText.slice(0, options.length) + options.indicator;
                setTruncatedText();
                $element.mouseenter(setOriginalText);
                $element.mouseleave(setTruncatedText);
            }
        });
    };
}(jQuery));