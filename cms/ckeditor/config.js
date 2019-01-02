/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.toolbarStartupExpanded = true;
	config.height = 120;
	config.width = 700;
	config.resize_enabled = false;
	config.scayt_autoStartup = true;

	
config.toolbar = 'Full';
config.toolbar_Full =
[
    ['Source','-','Save','NewPage','Preview','-','Templates'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
    ['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField'],
    '/',
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['BidiLtr', 'BidiRtl'],
    ['Link','Unlink','Anchor'],
    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],
    '/',
    ['Styles','Format','Font','FontSize'],
    ['TextColor','BGColor'],
    ['Maximize','ShowBlocks','-','About']
];


config.toolbar = 'MyBasic';
config.toolbar_MyBasic =
[
     ['Source','-','Save','NewPage','Preview','-','Templates'],
	['Maximize','-','PasteText','PasteFromWord','-','SpellChecker','Scayt','-','Styles'],
    '/',
    ['Bold','Italic','Underline','-','NumberedList','BulletedList','-','Link','Unlink','Anchor'],
	['Image']
] ;

	
	
	
};
