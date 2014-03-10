$(document).ready(function () {
    //category picker
    $('#category-button').click(function() {
        $('body').find('.category-list-view').remove();
        var url = $(this).attr('data-url');
        loadCategoryListView(url);
    });
    
    // Logo
    $('#logo').hover(function () {
        $(this).stop().animate({
            top: 62
        }, 200);
    }, function () {
        $(this).stop().animate({
            top: 67
        }, 200);
    });
    // Vertical Navigation
    $('.v-nav li a').not('.selected').hover(function () {
        $(this).stop().animate({
            paddingRight: 20
        }, 200);
    }, function () {
        $(this).stop().animate({
            paddingRight: 10
        }, 200);
    });
    /* Toggle sidebar */
    // init sidebar
    var sidebar_hidden = parseInt($.cookie('sidebar_state'));
    if (sidebar_hidden) {
        $('body').addClass('compact');
    } else {
        $('body').removeClass('compact');
    }
    $('#sidebar-toggle').click( function () {
        var is_hidden = 0;
        var $body = $('body');
        if ($body.is('.compact')) {
            $body.removeClass('compact');
        } else {
            $body.addClass('compact');
            is_hidden = 1;
        }
        // save state to cookie
        $.cookie('sidebar_state', is_hidden, {
            path: '/',
            expires: 7 // the cookie will last 7 days
        });
        return false;
    });
    /* Grid */
    $('table.grid tr').hover(function () {
        $(this).addClass('over');
    }, function () {
        $(this).removeClass('over');
    });
    // Check All
    $('input.checkall').click(function () {
        $("table.grid td input[type='checkbox']").attr('checked', $(this).is(':checked'));
    });
    $('#grid_actions').submit(function () {
        var $this = $(this);
        var action = $('#grid_action').val();
        
        var $form = $('#mail_window form');
        switch (action) {
            case 'delete':
                $this.attr('action', $this.attr('data-delete'));
                return true;
                break;
            case 'send':
                $this.attr('action', '');
                var $holder = $form.find('#selected_users');
                $holder.html('');
                $form.attr('action', $this.attr('data-email-selectes'));
                $('table.grid input[type="checkbox"]:checked').not('.checkall').each(function () {
                    var $input = $('<input type="hidden" name="user_ids[]" value="' + $(this).val() + '" />');
                    $input.appendTo($holder);
                });
                $('#modal-mask').fadeTo(0, .7);
                $('#mail_window').show();
                break;
            case 'send_all':
                $this.attr('action', '');
                $form.attr('action', $this.attr('data-email-all'));
                $('#modal-mask').fadeTo(0, .7);
                $('#mail_window').show();
                break;
        }
        return false;
    });
    $('.mail').click(function () {
        var $this = $(this);
        $('#modal-mask').fadeTo(0, .7);
        var $window = $('#mail_window');
        $window.show();
        $window.find('#mail_form_user_id').val($this.attr('data-id'));
        $window.find('form').attr('action', $this.attr('data-url'));
        return false;
    });
    $('#modal-mask').click(function () {
        $('.box-close').click();
    });
    $('.box-close').click(function () {
        $('#modal-mask').fadeOut(0);
        $('#mail_window').hide();
        return false;
    });
    /* Forms */
    $('input[type="text"], input[type="password"], textarea').focus(function () {
        var $this = $(this);
        $(this).addClass('focus');
        if ($this.val() == $this.attr('data-val')) {
            $this.val('');
        }
    }).blur(function () {
        var $this = $(this);
        $(this).removeClass('focus');
        if ($this.val() == '') {
            $this.val($this.attr('data-val'));
        }
    });
    // Messages
    $('a.msg-close').hover(function () {
        $(this).stop().fadeTo(200, .7);
    }, function () {
        $(this).stop().fadeTo(200, 1);
    }).click(function () {
        var $parent = $(this).parent();
        if ($parent.is('.dont-remove')) {
            $(this).parent().hide();
        } else {
            $(this).parent().remove();
        }
        return false
    });
    // Fancy Check
    $('a.fancy_check').click(function () {
        var $this = $(this);
        if (!$this.attr('data-ajax')) {
            $this.attr('data-ajax', 1).addClass('loading');
            $.ajax({
                url: $this.attr('data-url'),
                cache: false,
                success: function (response) {
                    if (response.success) {
                        if (response.result) {
                            $this.find('span').stop().animate({
                                left: 39
                            }, 300, function () {
                                $this.addClass('checked');
                            });
                        } else {
                            $this.find('span').stop().animate({
                                left: 1
                            }, 300, function () {
                                $this.removeClass('checked');
                            });
                        }
                    }
                    $this.removeAttr('data-ajax').removeClass('loading');
                },
                error: function () {
                    $this.removeAttr('data-ajax').removeClass('loading');
                }
            });
        }
        return false;
    });
    /* Tabs */
    $('.box-header ul li a.active').each(function () {
        $($(this).attr('href')).show();
    });
    $('.box-header ul li a').not('.permalink').click(function () {
        var $this = $(this);
        var $parent = $this.parents('.box');
        $parent.find('.box-section').hide();
        $parent.find('.box-header ul li a').removeClass('active');
        $parent.find($this.attr('href')).show();
        $this.addClass('active');
        return false;
    });
    $('.box-header ul li:first a').click();
    // Init TinyMCE
    $('textarea.editor').tinymce({
        // Location of TinyMCE script
        script_url : '/js/tiny_mce/tiny_mce.js',

        // General options
        theme : "advanced",
        skin: "default",

        body_class: "mceBlackBody",
        plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,
        relative_urls : false,

        width: "95%",
        height: "300",

        // File browser
        file_browser_callback: "tinyBrowser",

        // Example content CSS (should be your site CSS)
        content_css : "/css/admin/editor.css",
        
        convert_urls : false
    });
    
    $('textarea.mail_editor').tinymce({
        // Location of TinyMCE script
        script_url : '/js/tiny_mce/tiny_mce.js',

        // General options
        theme : "advanced",
        skin: "cirkuit",
        
        plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

        // Theme options
        theme_advanced_buttons1 : "cut,copy,paste,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull",
        theme_advanced_buttons2 : "fontselect,fontsizeselect,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols",
        theme_advanced_buttons4 : "bullist,numlist,|,link,unlink,image,cleanup,removeformat,help,code,|,preview,fullscreen",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : false,
        relative_urls : false,
        

        width: "100%",
        height: "300",

        // File browser
        file_browser_callback: "tinyBrowser",

        // Example content CSS (should be your site CSS)
        // content_css : "/css/admin/editor.css",
        
        convert_urls : false,
        
        handle_event_callback: function(e){
            if (e.keyCode == 27) {
                $('.modal-window').hide();
            }
        }
    });
});
$(window).load(function () {
    // Login form effects
    var positions = [15,30,15,0,-15,-30,-15,15,30,15,0,-15,-30,-15,0];
    function shake(index, speed) {
        $('#container').css('position', 'relative').animate({
            left: positions[index]
        }, speed, function () {
            if (index < positions.length) {
                shake(index + 1, speed/1.5);
            } else {
                $('#container').css('position', 'static');
            }
        });
    }
    if ($('#login-form').length > 0 && $('#login-form').is('.with-errors')) {
        shake(0, 20);
    }
});
function loadCategoryListView(url)
{   
    var container = $('#container');
    var loader = '<div class="ajax-loader"></div>';
    
    $.ajax({
        url: url,
        beforeSend: function (){
            container.append(loader);
        },
        success: function (data) {
            container.find('.ajax-loader').remove();
            container.append(data);
        }
    });
    return false;
}

$(document).on("click", ".category-list li", function() {
    var id = $(this).find('div').attr('item-id');
    var name = $(this).find('div').html();
    $('#category_parrent_id').attr('value', id);
    $('#fake-button').html(name);
    $('.category-list-view').remove();
});

$(document).on("click", ".button-close", function() {
    $('.category-list-view').remove();
});
