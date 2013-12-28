jQuery(document).ready(function(){
//ARNAUD
jQuery('span.arnaud-title').hide();
jQuery('span.arnaud-descr').hide();
jQuery('span.arnaud-title.all').show();
jQuery('span.arnaud-descr.all').show();
				var wid;
                var topp;
                var count;
                var pfheight;
                var topcorrect; var topcorrect2;
// get the initial (full) list
var jQueryfilterList = jQuery('ul.portfolio-list');
// add unique id's
// i don't like having to write these all in the code
// so i wrote a script to id these for me
for(var i=0; i<jQuery('ul.portfolio-list li').length; i++){
jQuery('ul.portfolio-list li:eq(' + i + ')').attr('id','flitem' + i);
}
// clone first collection to get a second collection
var jQuerydata = jQueryfilterList.clone();
// handle trigger clicks
jQuery('#filterButtons a').click(function(e) {
if(jQuery(this).attr('rel') == 'all') {
// get a group of all items
var jQueryfilteredData = jQuerydata.find('li');
//ARNAUD
jQuery('span .arnaud-title').hide();
jQuery('span .arnaud-descr').hide();
jQuery('span .arnaud-title.all').show();
jQuery('span .arnaud-descr.all').show();
} else {
// get a group of items of a particular class
var jQueryfilteredData = jQuerydata.find('li.' + jQuery(this).attr('rel'));
}  
//ARNAUD
jQuery('span.arnaud-title').hide();
jQuery('span.arnaud-title.' + jQuery(this).attr('rel')).show();
jQuery('span.arnaud-descr').hide();
jQuery('span.arnaud-descr.' + jQuery(this).attr('rel')).show();
// call quicksand
jQuery('ul.portfolio-list').quicksand(jQueryfilteredData, {
duration: 0,
adjustHeight : 	'dynamic',
easing: 'linear',
attribute: function(v) {
// this is the unique id attribute we created above
return jQuery(v).attr('id');
}
}, function() {
                //setTimeout(function(){ jQuery('.portfmasonry').masonry() },500);
                wid = 0;
                topp = 0;
                count = 1;
                pfheight = 0;
                topcorrect = 0;
                 topcorrect2 = 0;
                               jQuery('.portfolio_wrap_small').each(function() {
                                if (count == 1) { topcorrect = jQuery(this).height() ;}
                                if ( count < 3 && jQuery(this).height() > topcorrect) { topcorrect = jQuery(this).height();}
                                if (count > 3 && count < 7  ) {topp = topcorrect + 40 ; if (jQuery(this).height() > topcorrect2) { topcorrect2 = jQuery(this).height();}}
                                if (count > 6 && count < 10) {if (count == 7) {topp = topp + topcorrect2 + 40; topcorrect = 0;}  if (jQuery(this).height() > topcorrect) { topcorrect = jQuery(this).height();} }
                                if (count > 9 && count < 13 ) {if (count == 10) {topp = topp + topcorrect + 40;topcorrect2 = 0;} ;  if (jQuery(this).height() > topcorrect2) { topcorrect2 = jQuery(this).height();} }
                                if (count > 12 && count < 16) {if (count == 13) {topp = topp + topcorrect2 + 40;topcorrect = 0;} ;  if (jQuery(this).height() > topcorrect) { topcorrect = jQuery(this).height();} }
                                if (count > 15) {if (count == 16) {topp = topp + topcorrect + 40;topcorrect2 = 0;} ;  if (jQuery(this).height() > topcorrect2) { topcorrect2 = jQuery(this).height();} }                                
                                jQuery(this).animate({"left":""+wid+"px", "top" : ""+topp+"px"});
                                wid=wid+307;
                                if (count % 3 == 0) {wid = 0;}
                                //=pfheight+jQuery(this).height()
                                count++;
                                
                                })
                                pfheight = topp + jQuery('.portfolio_wrap_small:last').height();
                               jQuery('.portthumbwrap').css({'visibility' : 'hidden'});
                               jQuery('.portthumbwrap').animate({"height" : ""+(pfheight+150)+"px"}).css({'visibility' : 'visible'});

                
                
		jQuery(document).ready(function(){
		jQuery("a[rel^='prettyPhoto']").prettyPhoto({
        deeplinking: false,
        social_tools: false
        });
    jQuery('.mediumButton').hover(function() {
        jQuery('span', this).stop().animate({"padding-right" : "12px"}, 200);
    }, function() {
        jQuery('span', this).stop().animate({"padding-right" : "0px"}, 200);
    });
    jQuery('.pfolioThumbSmall').hover(function() {
        jQuery('.thumb_cover', this).stop().fadeTo(600, 0.7);
    }, function() {
        jQuery('.thumb_cover', this).stop().fadeTo(400, 0.0);
    });

    
                        });

                
});
e.preventDefault();
});
 wid = 0;
                wid = 0;
                topp = 0;
                count = 1;
                pfheight = 0;
                topcorrect = 0;
                 topcorrect2 = 0;
                               jQuery('.portfolio_wrap_small').each(function() {
                                if (count == 1) { topcorrect = jQuery(this).height() ;}
                                if ( count < 3 && jQuery(this).height() > topcorrect) { topcorrect = jQuery(this).height();}
                                if (count > 3 && count < 7  ) {topp = topcorrect + 40 ; if (jQuery(this).height() > topcorrect2) { topcorrect2 = jQuery(this).height();}}
                                if (count > 6 && count < 10) {if (count == 7) {topp = topp + topcorrect2 + 40; topcorrect = 0;}  if (jQuery(this).height() > topcorrect) { topcorrect = jQuery(this).height();} }
                                if (count > 9 && count < 13 ) {if (count == 10) {topp = topp + topcorrect + 40;topcorrect2 = 0;} ;  if (jQuery(this).height() > topcorrect2) { topcorrect2 = jQuery(this).height();} }
                                if (count > 12 && count < 16) {if (count == 13) {topp = topp + topcorrect2 + 40;topcorrect = 0;} ;  if (jQuery(this).height() > topcorrect) { topcorrect = jQuery(this).height();} }
                                if (count > 15) {if (count == 16) {topp = topp + topcorrect + 40;topcorrect2 = 0;} ;  if (jQuery(this).height() > topcorrect2) { topcorrect2 = jQuery(this).height();} }                                
                                jQuery(this).css({"left":""+wid+"px", "top" : ""+topp+"px"});
                                wid=wid+307;
                                if (count % 3 == 0) {wid = 0;}
                                //=pfheight+jQuery(this).height()
                                count++;
                                
                                })
                                pfheight = topp + jQuery('.portfolio_wrap_small:last').height();
                               jQuery('.portthumbwrap').css({"height" : ""+(pfheight+150)+"px"});
});