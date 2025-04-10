jQuery(document).ready(function () {
	theCoreCustomPostsMatchHeight();

	// parse on ready and hide load more button
	jQuery('.fw-js-load-more-custom-posts .fw-btn').each(function () {
		var this_button = jQuery(this),
			page        = jQuery(this).parents('.fw-shortcode-custom-posts').attr('data-page'),
			max_pages   = jQuery(this).parents('.fw-shortcode-custom-posts').data('max-pages');

		// here need ">", because default page is 2 and if you have 4 posts / 2 per page then page=2 and max_pages=2
		if (page > max_pages) {
			this_button.parents('.fw-js-load-more-custom-posts').hide();
		}
	});

	jQuery('.fw-js-load-more-custom-posts').on('click', '.fw-btn', function (e) {
		e.preventDefault();
		var this_button    = jQuery(this),
			page           = jQuery(this).parents('.fw-shortcode-custom-posts').attr('data-page'),
			post_type      = jQuery(this).parents('.fw-shortcode-custom-posts').data('post-type'),
			posts_per_page = jQuery(this).parents('.fw-shortcode-custom-posts').data('posts-per-page'),
			max_pages      = jQuery(this).parents('.fw-shortcode-custom-posts').data('max-pages'),
			columns        = jQuery(this).parents('.fw-shortcode-custom-posts').data('columns'),
      lang           = FwPhpVars.lang;
			extra          = jQuery(this).parents('.fw-shortcode-custom-posts').data('extra');

		var data = "action=the_core_ajax_get_shortcode_custom_posts&max_pages=" + max_pages + '&lang=' + lang + '&post_type=' + post_type + '&columns=' + columns + '&posts_per_page=' + posts_per_page + '&page=' + page + '&extra=' + extra;
		jQuery.ajax({
			type: "POST",
			url: FwPhpVars.ajax_url,
			data: data,
			success: function (rsp) {
				//console.log(rsp);
				if ( typeof rsp == 'object' ) {
					var obj = rsp;
				}
				else {
					var obj = jQuery.parseJSON(rsp);
				}

				if ( obj.html != '' ) {
					this_button.parents('.fw-js-load-more-custom-posts').before(obj.html);
				}

				if ( this_button.parents('.fw-shortcode-custom-posts').hasClass("postlist-grid") && this_button.parents('.fw-shortcode-custom-posts').hasClass("fw-portfolio-masonry-on") ) {
					// we need a minor timeout here for loading images and styles and then call matchHeight
					setTimeout(
						function(){
							var $container = this_button.parents('.postlist-grid');
							$container.isotope('reloadItems');
							$container.isotope({
							itemSelector: '.postlist-col'
						});
					}, 100);
				}
				else {
					// we need a minor timeout here for loading images and styles and then call matchHeight
					setTimeout(function(){
						theCoreCustomPostsMatchHeight();
					}, 100);
				}

				if( page >= max_pages ) {
					this_button.parents('.fw-js-load-more-custom-posts').hide();
				}

				this_button.parents('.fw-shortcode-custom-posts').attr('data-page', parseInt(page) + 1);
			}
		});

		return false;
	});
});


function theCoreCustomPostsMatchHeight() {
	if (jQuery('.fw-shortcode-custom-posts.fw-portfolio-masonry-off').length > 0) {
	  $.fn.matchHeight._maintainScroll = true;
	  jQuery('.fw-shortcode-custom-posts.fw-portfolio-masonry-off').each(function () {
		jQuery(this).find('article').matchHeight({
		  byRow: true,
		  property: 'height',
		  target: null,
		  remove: false
		});
	  });
	}
  }
  