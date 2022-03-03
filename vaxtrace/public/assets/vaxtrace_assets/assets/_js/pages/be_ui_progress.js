/*
 *  Document   : be_ui_progress.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Progress Page
 */

class BeUIProgress {
  /*
   * Randomize progress bars values
   *
   */
  static barsRandomize() {
    jQuery('.js-bar-randomize').on('click', e => {
      jQuery(e.currentTarget)
              .parents('.block')
              .find('.progress-bar')
              .each((index, element) => {
                let el = jQuery(element);
                let random = Math.floor((Math.random() * 91) + 10);

                // Update progress width
                el.css('width', random + '%');

                // Update progress label
                jQuery('.progress-bar-label', el).html(random + '%');
              });
    });
  }

  /*
   * Init functionality
   *
   */
  static init() {
    this.barsRandomize();
  }
}

// Initialize when page loads
jQuery(() => {
  BeUIProgress.init();
});
