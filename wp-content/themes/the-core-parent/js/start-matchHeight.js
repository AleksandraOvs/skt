jQuery(document).ready(function ($) {
    "use strict";

    var $ = jQuery;
    theCorePostsMatchHeight();
});

function theCorePostsMatchHeight() {
    if ( jQuery('.fw-portfolio-masonry-off').length > 0 ) {
      $.fn.matchHeight._maintainScroll = true;
      jQuery('.fw-portfolio-masonry-off').each(function () {
        jQuery(this).find('article').matchHeight({
          byRow: true,
          property: 'height',
          target: null,
          remove: false
        });
      });
    }
}
