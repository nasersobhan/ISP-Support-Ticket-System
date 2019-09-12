
 $("form")
           .find(".fsel:not(.location2):not(.page2):not(.select2)").kendoDropDownList().end()
        .find(".fsel[multiple]:not(.location2):not(.page2):not(.select2)").kendoMultiSelect().end()
              .find("input[type=text]").addClass("k-textbox").end()
                .find("input:not([type])").addClass("k-textbox").end()
                .find("input[type=date]").kendoDatePicker().end()

//  $(".editor").kendoEditor({
//                tools: [
//                    "formatting",
//                    "bold", "italic", "underline",
//                  
//                    "justifyLeft", "justifyCenter", "justifyRight", "justifyFull",
//                    "insertUnorderedList", "insertOrderedList", "indent", "outdent"
//                ]
//            });
//    


//   $(".editor").each(function(){
//        $this = $(this);
//   
//    var easyEditor = new EasyEditor($this, {
//    buttons: ['bold', 'italic', 'link', 'h2', 'h3', 'h4', 'alignleft', 'aligncenter', 'alignright', 'quote', 'code', 'image', 'youtube', 'x'],
//    buttonsHtml: {
//        'bold': '<i class="fa fa-bold"></i>',
//        'italic': '<i class="fa fa-italic"></i>',
//        'link': '<i class="fa fa-link"></i>',
//        'header-2': '<i class="fa fa-header"></i>2',
//        'header-3': '<i class="fa fa-header"></i>3',
//        'header-4': '<i class="fa fa-header"></i>4',
//        'align-left': '<i class="fa fa-align-left"></i>',
//        'align-center': '<i class="fa fa-align-center"></i>',
//        'align-right': '<i class="fa fa-align-right"></i>',
//        'quote': '<i class="fa fa-quote-left"></i>',
//        'code': '<i class="fa fa-code"></i>',
//        'insert-image': '<i class="fa fa-picture-o"></i>',
//        'insert-youtube-video': '<i class="fa fa-youtube"></i>',
//        'remove-formatting': '<i class="fa fa-ban"></i>'
//    }
//});
 // });
   $(".editor").each(function(){
       
       EasyEditor.prototype.image = function(){
        var _this = this;
        var settings = {
            buttonIdentifier: 'insert-image',
            buttonHtml: 'Insert image',
            clickHandler: function(){
                _this.openModal('#easyeditor-modal-1');
            }
        };

            _this.injectButton(settings);
        };
       
       $this = $(this);
       
       
        var easyEditor = new EasyEditor(($this), {
            buttons: ['bold', 'italic', 'link', 'h2', 'h3', 'h4', 'alignleft', 'aligncenter', 'alignright', 'quote', 'code', 'image', 'youtube', 'x', 'source'],
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
                'remove-formatting': '<i class="fa fa-ban"></i>',
                 'source': '<i class="fa fa-file-code-o"></i>'
            }
        })
        
        
        // form uploader starts using jquery.form.min.js
        $loader = $('.easyeditor-modal-content-body-loader');
        $('.easyeditor-modal-content-body').find('form').ajaxForm({
            beforeSend: function() {
                $loader.css('width', '0%');
            },
            uploadProgress: function(event, position, total, percentComplete) {
                $loader.css('width', percentComplete + '%');
            },
            success: function() {
                $loader.css('width', '100%');
            },
            complete: function(get) {
                if(get.responseText != 'null') {
                    easyEditor.insertHtml('<figure><img src="'+ get.responseText +'" alt=""></figure>');
                    easyEditor.closeModal('#easyeditor-modal-1');
                }
            }
        });
        // form uploader ends using jquery.form.min.js
    });
  