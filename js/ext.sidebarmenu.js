$(document).ready(function(){

    var showText = mw.config.get('wgSideBarMenuConfigShowHTML');
    var hideText = mw.config.get('wgSideBarMenuConfigHideHTML');

    function initControls() {
        $('.sidebar-menu-item-collapsed').children('.sidebar-menu-item-text-container').children('.sidebar-menu-item-controls').append(showText);
        $('.sidebar-menu-item-expanded').children('.sidebar-menu-item-text-container').children('.sidebar-menu-item-controls').append(hideText);
    }

    initControls();
    $('.sidebar-menu-item-controls').click(function(){
        var currentText = $(this).text();

        if(currentText == showText){
            $(this).text(hideText);
        }else if(currentText == hideText){
            $(this).text(showText);
        }

        //A little "ugly" hack to prevent some gui glitches.
        $(this).parents('.sidebar-menu-item:first').
            toggleClass('sidebar-menu-item-collapsed sidebar-menu-item-expanded',250).children('.sidebar-menu').show(0,function(){
                var _this = $(this);
                setTimeout(function(){
                    _this.css('display','')
                },250);
            });
    });
});