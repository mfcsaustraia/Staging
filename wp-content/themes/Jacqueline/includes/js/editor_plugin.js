(function() {
  tinymce.create('tinymce.plugins.ace', {
    init : function(ed, url) {

      ed.addButton('hr', {
        title : 'Horizontal line',
        image : url+'/editor_imgs/hr.png',
        onclick : function() {
          ed.selection.setContent('[line]');
        }
      });

      ed.addButton('2columns', {
        title : '2 Columns',
        image : url+'/editor_imgs/2col.png',
        onclick : function() {
          ed.selection.setContent('[left]' + ed.selection.getContent() + '[/left]<br />[right][/right]');
        }
      });

      ed.addButton('3columns', {
        title : '3 Columns',
        image : url+'/editor_imgs/3col.png',
        onclick : function() {
          ed.selection.setContent('[col1]' + ed.selection.getContent() + '[/col1]<br />[col2][/col2]<br />[col3][/col3]');
        }
      });

      ed.addButton('3halfcolumns', {
        title : '3 Half Columns',
        image : url+'/editor_imgs/3half.png',
        onclick : function() {
          ed.selection.setContent('[col3_2]' + ed.selection.getContent() + '[/col3_2]<br />[col3_1][/col3_1]');
        }
      });

      ed.addButton('boxw', {
        title : 'Warning box',
        image : url+'/editor_imgs/boxw.png',
        onclick : function() {
          ed.selection.setContent('[warning]' + ed.selection.getContent() + '[/warning]');
        }
      });

      ed.addButton('boxd', {
        title : 'Disclaim box',
        image : url+'/editor_imgs/boxd.png',
        onclick : function() {
          ed.selection.setContent('[disclaim]' + ed.selection.getContent() + '[/disclaim]');
        }
      });

      ed.addButton('boxq', {
        title : 'Question box',
        image : url+'/editor_imgs/boxq.png',
        onclick : function() {
          ed.selection.setContent('[question]' + ed.selection.getContent() + '[/question]');
        }
      });

      ed.addButton('slider', {
        title : 'Slider',
        image : url+'/editor_imgs/slider.png',
        onclick : function() {
          ed.selection.setContent('[slide id="Slider_id"]<br />[images src="http://image.jpg" title="image title" caption="image caption" url="url"]<br />[/slide]');
        }
      });

      ed.addButton('pullquote', {
        title : 'Pull Quote',
        image : url+'/editor_imgs/pullquote.png',
        onclick : function() {
          ed.selection.setContent('[pullquote width="300" float="left"]' + ed.selection.getContent() + '[/pullquote]');
        }
      });

      ed.addButton('lightbox', {
        title : 'Lightbox',
        image : url+'/editor_imgs/lightbox.png',
        onclick : function() {
          ed.selection.setContent('[lightbox title="LightboxTitle" url="PageURL" width="900" height="500"]' + ed.selection.getContent() + '[/lightbox]');
        }
      });

      ed.addButton('tooltip', {
        title : 'Tooltip',
        image : url+'/editor_imgs/tooltip.png',
        onclick : function() {
          ed.selection.setContent('[tooltip text="TooltipText"]' + ed.selection.getContent() + '[/tooltip]');
        }
      });

      ed.addButton('button', {
        title : 'Button',
        image : url+'/editor_imgs/button.png',
        onclick : function() {
          ed.selection.setContent('[button url="URL"]' + ed.selection.getContent() + '[/button]');
        }
      });

      ed.addButton('accordion', {
        title : 'Accordion',
        image : url+'/editor_imgs/accordion.png',
        onclick : function() {
          ed.selection.setContent('[accordion title="Title"]' + ed.selection.getContent() + '[/accordion]');
        }
      });

      ed.addButton('email', {
        title : 'Contact Email',
        image : url+'/editor_imgs/email.png',
        onclick : function() {
          ed.selection.setContent('[contact email="Your_Email" subject="Email_Subject" message="Thankyou_Message"]');
        }
      });

    },
    createControl : function(n, cm) {
      return null;
    },
    getInfo : function() {
      return {
        longname : "Ace Shortcodes",
        author : 'BluChic Team',
        authorurl : 'http://www.bluchic.com',
        infourl : 'http://www.bluchic.com',
        version : "13.11"
      };
    }

  });

  tinymce.PluginManager.add('ace', tinymce.plugins.ace);

})();