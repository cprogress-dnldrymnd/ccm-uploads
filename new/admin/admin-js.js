jQuery(document).ready(function($) {
	codemirror();
});
function codemirror() {
	setTimeout(function() {

		if(jQuery('textarea[name="_header_scripts"]').length > 0) {
			wp.codeEditor.initialize(jQuery('textarea[name="_header_scripts"]'), cm_settings.ce_html);
		}

		if(jQuery('textarea[name="_footer_scripts"]').length > 0) {
			wp.codeEditor.initialize(jQuery('textarea[name="_footer_scripts"]'), cm_settings.ce_html);
		}

	}, 500);
}