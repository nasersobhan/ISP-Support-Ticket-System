/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.stylesSet.add( 'default', [
	/* Block styles */

	// These styles are already available in the "Format" drop-down list ("format" plugin),
	// so they are not needed here by default. You may enable them to avoid
	// placing the "Format" combo in the toolbar, maintaining the same features.
	/*
	{ name: 'Paragraph',		element: 'p' },
	{ name: 'Heading 1',		element: 'h1' },
	{ name: 'Heading 2',		element: 'h2' },
	{ name: 'Heading 3',		element: 'h3' },
	{ name: 'Heading 4',		element: 'h4' },
	{ name: 'Heading 5',		element: 'h5' },
	{ name: 'Heading 6',		element: 'h6' },
	{ name: 'Preformatted Text',element: 'pre' },
	{ name: 'Address',			element: 'address' },
	*/

	{ name: 'Italic Title',		element: 'h2', styles: { 'font-style': 'italic' } },
	{ name: 'Subtitle',			element: 'h3', styles: { 'color': '#aaa', 'font-style': 'italic' } },
	{
		name: 'Special Container',
		element: 'div',
		styles: {
			padding: '5px 10px',
			background: '#eee',
			border: '1px solid #ccc'
		}
	},

	/* Inline styles */

	// These are core styles available as toolbar buttons. You may opt enabling
	// some of them in the Styles drop-down list, removing them from the toolbar.
	// (This requires the "stylescombo" plugin.)
	/*
	{ name: 'Strong',			element: 'strong', overrides: 'b' },
	{ name: 'Emphasis',			element: 'em'	, overrides: 'i' },
	{ name: 'Underline',		element: 'u' },
	{ name: 'Strikethrough',	element: 'strike' },
	{ name: 'Subscript',		element: 'sub' },
	{ name: 'Superscript',		element: 'sup' },
	*/

	{ name: 'Marker',			element: 'span', attributes: { 'class': 'marker' } },

	{ name: 'Big',				element: 'big' },
	{ name: 'Small',			element: 'small' },
	{ name: 'Typewriter',		element: 'tt' },

	{ name: 'Computer Code',	element: 'code' },
	{ name: 'Keyboard Phrase',	element: 'kbd' },
	{ name: 'Sample Text',		element: 'samp' },
	{ name: 'Variable',			element: 'var' },

	{ name: 'Deleted Text',		element: 'del' },
	{ name: 'Inserted Text',	element: 'ins' },

	{ name: 'Cited Work',		element: 'cite' },
	{ name: 'Inline Quotation',	element: 'q' },

	{ name: 'Language: RTL',	element: 'span', attributes: { 'dir': 'rtl' } },
	{ name: 'Language: LTR',	element: 'span', attributes: { 'dir': 'ltr' } },

	/* Object styles */

	{
		name: 'Styled Image (left)',
		element: 'img',
		attributes: { 'class': 'left' }
	},

	{
		name: 'Styled Image (right)',
		element: 'img',
		attributes: { 'class': 'right' }
	},

	{
		name: 'Compact Table',
		element: 'table',
		attributes: {
			cellpadding: '5',
			cellspacing: '0',
			border: '1',
			bordercolor: '#ccc'
		},
		styles: {
			'border-collapse': 'collapse'
		}
	},

	{ name: 'Borderless Table',		element: 'table',	styles: { 'border-style': 'hidden', 'background-color': '#E6E6FA' } },
	{ name: 'Square Bulleted List',	element: 'ul',		styles: { 'list-style-type': 'square' } },

	/* Widget styles */

	{ name: 'Clean Image', type: 'widget', widget: 'image', attributes: { 'class': 'image-clean' } },
	{ name: 'Grayscale Image', type: 'widget', widget: 'image', attributes: { 'class': 'image-grayscale' } },

	{ name: 'Featured Snippet', type: 'widget', widget: 'codeSnippet', attributes: { 'class': 'code-featured' } },

	{ name: 'Featured Formula', type: 'widget', widget: 'mathjax', attributes: { 'class': 'math-featured' } },

	{ name: '240p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-240p' }, group: 'size' },
	{ name: '360p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-360p' }, group: 'size' },
	{ name: '480p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-480p' }, group: 'size' },
	{ name: '720p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-720p' }, group: 'size' },
	{ name: '1080p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-1080p' }, group: 'size' },

	// Adding space after the style name is an intended workaround. For now, there
	// is no option to create two styles with the same name for different widget types. See #16664.
	{ name: '240p ', type: 'widget', widget: 'embed', attributes: { 'class': 'embed-240p' }, group: 'size' },
	{ name: '360p ', type: 'widget', widget: 'embed', attributes: { 'class': 'embed-360p' }, group: 'size' },
	{ name: '480p ', type: 'widget', widget: 'embed', attributes: { 'class': 'embed-480p' }, group: 'size' },
	{ name: '720p ', type: 'widget', widget: 'embed', attributes: { 'class': 'embed-720p' }, group: 'size' },
	{ name: '1080p ', type: 'widget', widget: 'embed', attributes: { 'class': 'embed-1080p' }, group: 'size' }

] );


CKEDITOR.replace('texteditor',{
     extraPlugins: 'language,mediaembed,autoembed,widget',	language: Lang, height:400,
    language_list: [ 'fa:Farsi:rtl',  'en:english' ],
   toolbarGroups:[
		
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'editing' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
	
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		
		
		
			],contentsCss: [ CKEDITOR.basePath + 'contents.css', 'https://sdk.ckeditor.com/samples/assets/css/widgetstyles.css' ],

   removeButtons:  'Flash,Scayt,Specialchar',

});







var CKBUILDER_CONFIG = {
	skin: 'moono-lisa',
	preset: 'full',
	ignore: [
		'.bender',
		'bender.js',
		'bender-err.log',
		'bender-out.log',
		'dev',
		'.DS_Store',
		'.editorconfig',
		'.gitattributes',
		'.gitignore',
		'gruntfile.js',
		'.idea',
		'.jscsrc',
		'.jshintignore',
		'.jshintrc',
		'less',
		'.mailmap',
		'node_modules',
		'package.json',
		'README.md',
		'tests'
	],
	plugins : {
		'a11yhelp' : 1,
		'about' : 1,
		'basicstyles' : 1,
		'bidi' : 1,
		'blockquote' : 1,
		'clipboard' : 1,
		'colorbutton' : 1,
		'colordialog' : 1,
		'contextmenu' : 1,
		'copyformatting' : 1,
		'dialogadvtab' : 1,
		'div' : 1,
		'elementspath' : 1,
		'enterkey' : 1,
		'entities' : 1,
		'filebrowser' : 1,
		'find' : 1,
		'flash' : 1,
		'floatingspace' : 1,
		'font' : 1,
		'format' : 1,
		'forms' : 1,
		'horizontalrule' : 1,
		'htmlwriter' : 1,
		'iframe' : 1,
		'image' : 1,
		'indentblock' : 1,
		'indentlist' : 1,
		'justify' : 1,
		'language' : 1,
		'link' : 1,
		'list' : 1,
		'liststyle' : 1,
		'magicline' : 1,
		'maximize' : 1,
		'newpage' : 1,
		'pagebreak' : 1,
		'pastefromword' : 1,
		'pastetext' : 1,
		'preview' : 1,
		'print' : 1,
		'removeformat' : 1,
		'resize' : 1,
		'save' : 1,
		'scayt' : 1,
		'selectall' : 1,
		'showblocks' : 1,
		'showborders' : 1,
		'smiley' : 1,
		'sourcearea' : 1,
		'specialchar' : 1,
		'stylescombo' : 1,
		'tab' : 1,
		'table' : 1,
		'tabletools' : 1,
		'templates' : 1,
		'toolbar' : 1,
		'undo' : 1,
		'wsc' : 1,
		'wysiwygarea' : 1
	},
	languages : {
		'af' : 1,
//		'ar' : 1,
//		'az' : 1,
//		'bg' : 1,
//		'bn' : 1,
//		'bs' : 1,
//		'ca' : 1,
//		'cs' : 1,
//		'cy' : 1,
//		'da' : 1,
//		'de' : 1,
//		'de-ch' : 1,
//		'el' : 1,
		'en' : 1,
//		'en-au' : 1,
//		'en-ca' : 1,
//		'en-gb' : 1,
//		'eo' : 1,
//		'es' : 1,
//		'et' : 1,
//		'eu' : 1,
//		'fa' : 1,
//		'fi' : 1,
//		'fo' : 1,
//		'fr' : 1,
//		'fr-ca' : 1,
//		'gl' : 1,
//		'gu' : 1,
//		'he' : 1,
//		'hi' : 1,
//		'hr' : 1,
//		'hu' : 1,
//		'id' : 1,
//		'is' : 1,
//		'it' : 1,
//		'ja' : 1,
//		'ka' : 1,
//		'km' : 1,
//		'ko' : 1,
//		'ku' : 1,
//		'lt' : 1,
//		'lv' : 1,
//		'mk' : 1,
//		'mn' : 1,
//		'ms' : 1,
//		'nb' : 1,
//		'nl' : 1,
//		'no' : 1,
//		'oc' : 1,
//		'pl' : 1,
//		'pt' : 1,
//		'pt-br' : 1,
//		'ro' : 1,
//		'ru' : 1,
//		'si' : 1,
//		'sk' : 1,
//		'sl' : 1,
//		'sq' : 1,
//		'sr' : 1,
//		'sr-latn' : 1,
//		'sv' : 1,
//		'th' : 1,
//		'tr' : 1,
//		'tt' : 1,
//		'ug' : 1,
//		'uk' : 1,
//		'vi' : 1,
//		'zh' : 1,
//		'zh-cn' : 1
	}
};
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	 config.language = Lang;
	// config.uiColor = '#AADC6E';
        config.extraPlugins = 'autogrow';
        config.autoGrow_bottomSpace = 50;
        
        config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'Flash,Scayt';
};
