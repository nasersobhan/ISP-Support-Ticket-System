var easyEditor = new EasyEditor('.editor', {
    buttons: ['bold', 'italic', 'link', 'h2', 'h3', 'h4', 'alignleft', 'aligncenter', 'alignright', 'quote', 'code', 'image', 'youtube', 'x'],
    buttonsHtml: {
        'bold': '<i class="fa fa-bold"></i>',
        'italic': '<i class="fa fa-italic"></i>',
        'link': '<i class="fa fa-link"></i>',
        'header-2': '<i class="fa fa-header"></i>2',
        'header-3': '<i class="fa fa-header"></i>3',
        'header-4': '<i class="fa fa-header"></i>4',
        'align-left': '<i class="fa fa-align-left"></i>',
        'align-center': '<i class="fa fa-align-center"></i>',
        'align-right': '<i class="fa fa-align-right"></i>',
        'quote': '<i class="fa fa-quote-left"></i>',
        'code': '<i class="fa fa-code"></i>',
        'insert-image': '<i class="fa fa-picture-o"></i>',
        'insert-youtube-video': '<i class="fa fa-youtube"></i>',
        'remove-formatting': '<i class="fa fa-ban"></i>'
    }
});