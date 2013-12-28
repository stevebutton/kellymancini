jQuery(function() {
    
    jQuery(".gallerymodern").each(function(){

    
    var pos = jQuery('.gallimages', this).width();
    var pos2 = jQuery('.gallimages', this).parent().width();
    var posF = (pos2 - pos)/2;
    var clicky; var navl; var navi;  var classi;
    jQuery('.gallimages', this).css({"left" :""+posF+"px"});
    
    jQuery('.gallimages img', this).eq(0).show();
    jQuery('.galImgDesc', this).hide();
    var imagenr = jQuery('.gallimages img', this).size();
    var i;
    for (i=1; i < imagenr+1; i++) {
        jQuery('.gal-nav', this).append('<span rel='+i+'>'+i+'</span>');
    }
    jQuery('.gal-nav', this).append('<p class="navright"></p>');
    
    jQuery('.gallimages img', this).eq(0).addClass('activeImgGal');
    jQuery('.gal-nav span', this).eq(0).addClass('activeNavGal');
    var title = jQuery('.gallimages img', this).eq(0).attr('title');
    
    if (title !== '') {
        jQuery('.galImgDesc p', this).html(title);
        jQuery('.galImgDesc', this).show();
    }
        $('.imGalCount', this).html(''+i-1+' items');
        $('.imGalCountTH', this).html($('.gallimagesTH img', this).size()/2 + ' items');
    });
    
    jQuery('.gal-nav span').click(function() {
        classi = $(this).parent().parent();
        clicky = $(this).attr('rel');
        if (jQuery('.activeImgGal', classi).index() !== (clicky-1)) {
            jQuery('.activeNavGal', classi).removeClass('activeNavGal');
            jQuery(this).addClass('activeNavGal');
            jQuery('.activeImgGal', classi).removeClass('activeImgGal');
            jQuery('.gallimages img', classi).fadeOut();
            jQuery('.gallimages img', classi).eq(clicky - 1).addClass('activeImgGal').fadeIn();
            
            title = jQuery('.activeImgGal', classi);
            jQuery('.galImgDesc', classi).fadeOut(200, function(){jQuery('.galImgDesc p', classi).html(title.attr('title'))});
            if (title.attr('title') !== '' && title.attr('title') !=undefined) {
                jQuery('.galImgDesc', classi).fadeIn();
            }      
            
        }
    });
    
    jQuery('p.navleft').click(function() {
          classi = $(this).parent().parent();
          
          navl = jQuery('.activeNavGal', classi).index() -1;
          jQuery('.activeNavGal', classi).removeClass('activeNavGal');
          jQuery('.activeImgGal', classi).removeClass('activeImgGal').fadeOut();
          jQuery('.gallimages img', classi).eq(navl-1).addClass('activeImgGal').fadeIn();
          jQuery('.gal-nav span', classi).eq(navl-1).addClass('activeNavGal');
          
            title = jQuery('.activeImgGal', classi);
            jQuery('.galImgDesc', classi).fadeOut(200, function(){jQuery('.galImgDesc p', classi).html(title.attr('title'))});
            if (title.attr('title') !== '' && title.attr('title') !=undefined) {
                jQuery('.galImgDesc', classi).fadeIn();
            }      
    });
    jQuery('p.navright').click(function() {
        classi = $(this).parent().parent();
        
          navl = jQuery('.activeNavGal', classi).index() -1 ;
          clicky = jQuery('.gallimages img', classi).size();
          if (navl == (clicky - 1)) {navl = -1;};
          jQuery('.activeNavGal', classi).removeClass('activeNavGal');
          jQuery('.activeImgGal', classi).removeClass('activeImgGal').fadeOut();
          jQuery('.gallimages img', classi).eq(navl + 1).addClass('activeImgGal').fadeIn();
          jQuery('.gal-nav span', classi).eq(navl + 1).addClass('activeNavGal');
          
            title = jQuery('.activeImgGal', classi);
            jQuery('.galImgDesc', classi).fadeOut(200, function(){jQuery('.galImgDesc p', classi).html(title.attr('title'))});
            if (title.attr('title') !== '' && title.attr('title') !=undefined) {
                jQuery('.galImgDesc', classi).fadeIn();
            }      
    });
    
    jQuery('p.minuss').click(function() {
        classi = $(this).parent().parent();
        $('.gallimages', classi).slideUp();
        $('.gallimagesTH', classi).slideUp();
        $('.gal-nav', classi).slideUp();
        $('p.minuss', classi).hide();
        $('p.pluss', classi).show();
    });    
    
    jQuery('p.pluss').click(function() {
        classi = $(this).parent().parent();
        $('.gallimages').slideUp();
        $('.gallimagesTH').slideUp();
        $('.gal-nav').slideUp();
        $('p.minuss').hide();
        $('p.pluss').show();
        $('.gallimages', classi).slideDown();
        $('.gallimagesTH', classi).slideDown();
        $('.gal-nav', classi).slideDown();
        $('p.minuss', classi).show();
        $('p.pluss', classi).hide();
    });    
    
 });