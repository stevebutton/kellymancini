jQuery(function() {
    var parent;
    jQuery('.footerSidebarBot').eq(3).css({"margin-right" : "0px"});
    jQuery('.footerSidebarBot').eq(7).css({"margin-right" : "0px"});
    jQuery('.footerSidebarBot').eq(11).css({"margin-right" : "0px"});
    jQuery('#socnet_links img').fadeTo(0, 0.3);
    var width ;
    var heightSF = (jQuery('#singleTitle').height()) / 2 ;
    var footHeight = jQuery('#foot_widgets_top').height();
    jQuery('#foot_widgets_botB').css({"background-position" : "0px -"+ footHeight +"px"});
    jQuery('#searchW div').css({"top" : ""+ (heightSF -16) +"px"});
    
        jQuery('#socnet_links img').hover(function() {
        jQuery(this).stop().fadeTo(400, 1); 
    }, function() {
        jQuery(this).stop().fadeTo(200, 0.3); 
    });
    

    jQuery(".metadata").each(function (index, box) {
        width = jQuery(this).width() - jQuery('.thedate', this).width() - 40;
        jQuery('.catWrap', this).css({"width" : ""+width+"px"});
    });
    jQuery('.categories').hover(function() {
        jQuery(this).parent().css({"overflow" : "visible"});
        jQuery(this).css({"border" : "1px solid #dedede"});   
    }, function() {
        jQuery(this).parent().css({"overflow" : "hidden"});
        jQuery(this).css({"border-color" : "#ffffff"});  
    });
    jQuery('.mediumButton').hover(function() {
        jQuery('span', this).stop().animate({"padding-right" : "12px"}, 200);
    }, function() {
        jQuery('span', this).stop().animate({"padding-right" : "0px"}, 200);
    });
    jQuery('.mediumButtonLeft').hover(function() {
        jQuery('span', this).stop().animate({"padding-left" : "12px"}, 200);
    }, function() {
        jQuery('span', this).stop().animate({"padding-left" : "0px"}, 200);
    });
    jQuery('.thumbnail, .thumbnailFW, .gallery-icon, .pfolioThumbBig, .pfolioThumbSmall').hover(function() {
        jQuery('.thumb_cover', this).stop().fadeTo(600, 0.7);
    }, function() {
        jQuery('.thumb_cover', this).stop().fadeTo(400, 0.0);
    });
    
    jQuery('p.showlessTF').click(function() {
        jQuery('#foot_widgets_top').slideUp(600, 'easeInSine');
        jQuery(this).css({"display" : "none"});
        jQuery('p.showmoreTF').css({"display" : "inline"})
    });
    jQuery('p.showmoreTF').click(function() {
        jQuery('#foot_widgets_top').slideDown(900, 'easeOutSine');
        jQuery(this).css({"display" : "none"});
        jQuery('p.showlessTF').css({"display" : "inline"})
    });
    
    jQuery('p.showlessBF').click(function() {
        jQuery('#foot_widgets_bot').slideUp(600, 'easeInSine');
        jQuery(this).css({"display" : "none"});
        jQuery('p.showmoreBF').css({"display" : "inline"})
    });
    jQuery('p.showmoreBF').click(function() {
        jQuery('#foot_widgets_bot').slideDown(900, 'easeOutSine');
        jQuery(this).css({"display" : "none"});
        jQuery('p.showlessBF').css({"display" : "inline"})
    });
    
    jQuery('p.showlessWF').click(function() {
        jQuery('#foot_widgets').slideUp(800, 'easeInSine');
        jQuery(this).css({"display" : "none"});
        jQuery('p.showmoreWF').css({"display" : "inline"})
    });
    jQuery('p.showmoreWF').click(function() {
        jQuery('#foot_widgets').slideDown(900, 'easeOutSine');
        jQuery(this).css({"display" : "none"});
        jQuery('p.showlessWF').css({"display" : "inline"})
    });   
    
    jQuery('p.scsP').click(function() {
        parent = jQuery(this).parent().parent();
    
        jQuery('.slidingContentContent').slideUp();
        jQuery('p.scsP').show();
        jQuery('p.schidP').hide();
        
        jQuery('.slidingContentContent', parent).slideDown();
        jQuery(this).hide();
        jQuery('p.schidP', parent).show();
        
    });
        jQuery('p.schidP').click(function() {
        parent = jQuery(this).parent().parent();
        jQuery('.slidingContentContent', parent).slideUp();
        jQuery(this).hide();
        jQuery('p.scsP', parent).show();
    });
    


 });