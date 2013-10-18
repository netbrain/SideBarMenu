(function($,mw){

    //IE doesn't support const, use var instead :(
    var SBM_EXPANDED = 'expanded';
    var SBM_CONTROLS_SHOW = 'show';
    var SBM_CONTROLS_HIDE = 'hide';
    var SBM_JS_ANIMATE = 'animate';
    var SBM_EDIT_LINK = 'editlink';
    var SBM_CLASS = 'class';
    var SBM_STYLE = 'style';
    var SBM_MINIMIZED = 'minimized';


    $(document).ready(function () {
        if (typeof(sidebarmenu) !== 'undefined') {
            for (var id in sidebarmenu){
                var container = $('#'+id);
                var config = sidebarmenu[id];

                (function(container,config){

                    var showText = config[SBM_CONTROLS_SHOW];
                    var hideText = config[SBM_CONTROLS_HIDE];
                    var useAnimations = config[SBM_JS_ANIMATE];
                    var minimized = config[SBM_MINIMIZED];

                    if(minimized){
                        container.addClass('sidebar-menu-minimized');
                        container.find('.sidebar-menu-0 .sidebar-menu-item').first()
                            .removeClass('sidebar-menu-item-expanded')
                            .addClass('sidebar-menu-item-collapsed');
                    }

                    function initControls() {
                        container.find('.sidebar-menu-item-collapsed').children('.sidebar-menu-item-text-container').children('.sidebar-menu-item-controls').append(showText);
                        container.find('.sidebar-menu-item-expanded').children('.sidebar-menu-item-text-container').children('.sidebar-menu-item-controls').append(hideText);
                    }

                    /*Open submenu of current page if current page is present as a link in sidebarmenu*/
                    var selfLink = container.find('.sidebar-menu-item').find('.selflink')[0]
                    if(selfLink !== undefined ){
                        $(selfLink).parents('.sidebar-menu-item-collapsed').removeClass('sidebar-menu-item-collapsed').addClass('sidebar-menu-item-expanded');
                    }

                    //initialize controls
                    initControls();

                    //initialize click actions
                    container.find('.sidebar-menu-item-controls,.sidebar-menu-item-expand-action').click(function () {
                        if(minimized && $(this)[0] == $('.sidebar-menu-item-controls:first')[0]){
                            container.toggleClass('sidebar-menu-minimized');
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
                    container.find('.sidebar-menu-item-expand-action').each(function(){
                        $(this).html('<a href="#" onclick="return false;">'+$(this).html()+'</a>');
                    })
                })(container,config);
            }
            $('.sidebar-menu-container').show();
        }
    });
})($,mw)
