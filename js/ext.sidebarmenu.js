$(document).ready(function(){
    $('.sidebar-menu-item-controls').append(mw.config.get('wgSideBarMenuConfigShowHTML'));
    $('.sidebar-menu-item-controls').click(function(){
        $(this).parents('.sidebar-menu-item:first').toggleClass('sidebar-menu-item-collapsed',1500);
    });
});