//jQuery checking and including
if ( (typeof jQuery === 'undefined') && !window.jQuery ) {
	document.write(unescape("%3Cscript type='text/javascript' src='//code.jquery.com/jquery-1.11.3.min.js'%3E%3C/script%3E"));
    } else {
        if((typeof jQuery === 'undefined') && window.jQuery) {
            jQuery = window.jQuery;
        } else if((typeof jQuery !== 'undefined') && !window.jQuery) {
            window.jQuery = jQuery;
        }
    }

// jQuery.noConflict();