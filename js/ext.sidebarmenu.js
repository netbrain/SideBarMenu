$(document).ready(function () {

    //IE doesn't support const, use var instead :(
    var SBM_EXPANDED = 'parser.menuitem.expanded';
    var SBM_CONTROLS_SHOW = 'controls.show';
    var SBM_CONTROLS_HIDE = 'controls.hide';
    var SBM_JS_ANIMATE = 'js.animate';
    var SBM_EDIT_LINK = 'editlink';
    var SBM_CLASS = 'class';
    var SBM_STYLE = 'style';
    var SBM_MINIMIZED = 'minimized';

    if (typeof(sidebarmenu) !== 'undefined') {
        var showText = sidebarmenu[SBM_CONTROLS_SHOW];
        var hideText = sidebarmenu[SBM_CONTROLS_HIDE];
        var useAnimations = sidebarmenu[SBM_JS_ANIMATE];
        var minimized = sidebarmenu[SBM_MINIMIZED];

        if(minimized){
            $('.sidebar-menu-container').addClass('sidebar-menu-minimized');
        }

        function initControls() {
            $('.sidebar-menu-item-collapsed').children('.sidebar-menu-item-text-container').children('.sidebar-menu-item-controls').append(showText);
            $('.sidebar-menu-item-expanded').children('.sidebar-menu-item-text-container').children('.sidebar-menu-item-controls').append(hideText);
        }

        /*Open submenu of current page if current page is present as a link in sidebarmenu*/
        var selfLink = $('.sidebar-menu-item').find('.selflink')[0]
        if(selfLink !== undefined ){
            $(selfLink).parents('.sidebar-menu-item-collapsed').removeClass('sidebar-menu-item-collapsed').addClass('sidebar-menu-item-expanded');
        }

        //initialize controls
        initControls();

        //initialize click actions
        $('.sidebar-menu-item-controls,.sidebar-menu-item-expand-action').click(function () {
            if(minimized && $(this)[0] == $('.sidebar-menu-item-controls:first')[0]){
                $('.sidebar-menu-container').toggleClass('sidebar-menu-minimized');
            }

            var controls = $(this).is('.sidebar-menu-item-controls') ? $(this) : $(this).next();
            var currentText = controls.text();

            if (currentText == showText) {
                controls.text(hideText);
            } else if (currentText == hideText) {
                controls.text(showText);
            }

            if (useAnimations) {
                //A little "ugly" hack to prevent some gui glitches.
                $(this).parents('.sidebar-menu-item:first').toggleClass('sidebar-menu-item-collapsed sidebar-menu-item-expanded', 250).children('.sidebar-menu').show(0, function () {
                    var _this = $(this);
                    setTimeout(function () {
                        _this.css('display', '')
                    }, 250);
                });
            } else {
                $(this).parents('.sidebar-menu-item:first').toggleClass('sidebar-menu-item-collapsed sidebar-menu-item-expanded');
            }
        });

        //must do this in javascript as serverside solution would replace this <a href> link with escaped html characters
        $('.sidebar-menu-item-expand-action').each(function(){
            $(this).html('<a href="#" onclick="return false;">'+$(this).html()+'</a>');
        })
    }
});