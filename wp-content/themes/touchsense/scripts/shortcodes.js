// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.tstypo', {
        createControl: function(n, cm) {
            switch (n) {
                case 'tstypo':
                    var mlb = cm.createListBox('tstypo', {
                        title : 'TS Typography',
                        onselect : function(v) {
                            if (v == 'hl1') {
                            tinyMCE.activeEditor.selection.setContent('[highlight_1]' + tinyMCE.activeEditor.selection.getContent() + '[/highlight_1]');
                            return false;
                            }
                            else if (v == 'hl2') {
                            tinyMCE.activeEditor.selection.setContent('[highlight_2]' + tinyMCE.activeEditor.selection.getContent() + '[/highlight_2]');
                            return false;
                            }
                            else if (v == 'bql') {
                            tinyMCE.activeEditor.selection.setContent('[bquote_left]' + tinyMCE.activeEditor.selection.getContent() + '[/bquote_left]');
                            return false;
                            }
                            else if (v == 'bq') {
                            tinyMCE.activeEditor.selection.setContent('[bquote]' + tinyMCE.activeEditor.selection.getContent() + '[/bquote]');
                            return false;
                            }
                            else if (v == 'bqr') {
                            tinyMCE.activeEditor.selection.setContent('[bquote_right]' + tinyMCE.activeEditor.selection.getContent() + '[/bquote_right]');
                            return false;
                            }
                            else if (v == 'dropc1') {
                            tinyMCE.activeEditor.selection.setContent('[dropcap1]' + tinyMCE.activeEditor.selection.getContent() + '[/dropcap1]');
                            return false;
                            }
                            else if (v == 'dropc2') {
                            tinyMCE.activeEditor.selection.setContent('[dropcap2]' + tinyMCE.activeEditor.selection.getContent() + '[/dropcap2]');
                            return false;
                            }
                            else if (v == 'dropc3') {
                            tinyMCE.activeEditor.selection.setContent('[dropcap3]' + tinyMCE.activeEditor.selection.getContent() + '[/dropcap3]');
                            return false;
                            }
                        }
                    });

                    // Add some values to the list box
                    mlb.add('Highlights 1', 'hl1');
                    mlb.add('Highlights 2', 'hl2');
                    mlb.add('Blockquote Left', 'bql');
                    mlb.add('Blockquote', 'bq');
                    mlb.add('Blockquote Right', 'bqr');
                    mlb.add('Dropcap 1', 'dropc1');
                    mlb.add('Dropcap 2', 'dropc2');
                    mlb.add('Dropcap 3', 'dropc3');

                // Return the new listbox instance
                return mlb;
            }
            return null;
        }
    });
    
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.tscol', {
        createControl: function(n, cm) {
            switch (n) {
                case 'tscol':
                    var mlb = cm.createListBox('tscol', {
                        title : 'TS Columns',
                        onselect : function(v) {
                            if (v == 'oneh') {
                            tinyMCE.activeEditor.selection.setContent('[one_half]' + tinyMCE.activeEditor.selection.getContent() + '[/one_half]');
                            return false;
                            }
                            else if (v == 'onehl') {
                            tinyMCE.activeEditor.selection.setContent('[one_half_last]' + tinyMCE.activeEditor.selection.getContent() + '[/one_half_last]');
                            return false;
                            }
                            else if (v == 'onet') {
                            tinyMCE.activeEditor.selection.setContent('[one_third]' + tinyMCE.activeEditor.selection.getContent() + '[/one_third]');
                            return false;
                            }
                            else if (v == 'onetl') {
                            tinyMCE.activeEditor.selection.setContent('[one_third_last]' + tinyMCE.activeEditor.selection.getContent() + '[/one_third_last]');
                            return false;
                            }
                            else if (v == 'oneq') {
                            tinyMCE.activeEditor.selection.setContent('[one_fourth]' + tinyMCE.activeEditor.selection.getContent() + '[/one_fourth]');
                            return false;
                            }
                            else if (v == 'oneql') {
                            tinyMCE.activeEditor.selection.setContent('[one_fourth_last]' + tinyMCE.activeEditor.selection.getContent() + '[/one_fourth_last]');
                            return false;
                            }
                            else if (v == 'twot') {
                            tinyMCE.activeEditor.selection.setContent('[two_thirds]' + tinyMCE.activeEditor.selection.getContent() + '[/two_thirds]');
                            return false;
                            }
                            else if (v == 'twotl') {
                            tinyMCE.activeEditor.selection.setContent('[two_thirds_last]' + tinyMCE.activeEditor.selection.getContent() + '[/two_thirds_last]');
                            return false;
                            }
                            else if (v == 'triq') {
                            tinyMCE.activeEditor.selection.setContent('[three_fourths]' + tinyMCE.activeEditor.selection.getContent() + '[/three_fourths]');
                            return false;
                            }
                            else if (v == 'triql') {
                            tinyMCE.activeEditor.selection.setContent('[three_fourths_last]' + tinyMCE.activeEditor.selection.getContent() + '[/three_fourths_last]');
                            return false;
                            }

                            else if (v == 'icocol') {
                            tinyMCE.activeEditor.selection.setContent('[icon_column icon_url48x48 = " " title = " " ]' + tinyMCE.activeEditor.selection.getContent() + '[/icon_column]');
                            return false;
                            }
                            else if (v == 'icocoll') {
                            tinyMCE.activeEditor.selection.setContent('[icon_column_last icon_url48x48 = " " title = " " ]' + tinyMCE.activeEditor.selection.getContent() + '[/icon_column_last]');
                            return false;
                            }
                        }
                    });

                    // Add some values to the list box
                    mlb.add('1/2 Column', 'oneh');
                    mlb.add('1/2 Column Last', 'onehl');
                    mlb.add('1/3 Column', 'onet');
                    mlb.add('1/3 Column Last', 'onetl');
                    mlb.add('1/4 Column', 'oneq');
                    mlb.add('1/4 Column Last', 'oneql');
                    mlb.add('2/3 Column', 'twot');
                    mlb.add('2/3 Column Last', 'twotl');
                    mlb.add('3/4 Column', 'triq');
                    mlb.add('3/4 Column Last', 'triql');
                    mlb.add('Icon Column', 'icocol');
                    mlb.add('Icon Column Last', 'icocoll');

                // Return the new listbox instance
                return mlb;
            }
            return null;
        }
    });
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.slidebox', {
        createControl: function(n, cm) {
            switch (n) {
                case 'slidebox':
                    var mlb = cm.createListBox('slidebox', {
                        title : 'TS Other',
                        onselect : function(v) {
                            if (v == 'slider') {
                            tinyMCE.activeEditor.selection.setContent('[slider width=" " height=" " pause=" "]' + tinyMCE.activeEditor.selection.getContent() + '[/slider]');
                            return false;
                            }
                            else if (v == 'ibox1') {
                            tinyMCE.activeEditor.selection.setContent('[info_box1 button_text=" " button_link=" "]' + tinyMCE.activeEditor.selection.getContent() + '[/info_box1]');
                            return false;
                            }
                            else if (v == 'ibox2') {
                            tinyMCE.activeEditor.selection.setContent('[info_box2 button_text=" " button_link=" "]' + tinyMCE.activeEditor.selection.getContent() + '[/info_box2]');
                            return false;
                            }
                            else if (v == 'ibox3') {
                            tinyMCE.activeEditor.selection.setContent('[info_box3 title=" " ]' + tinyMCE.activeEditor.selection.getContent() + '[/info_box3]');
                            return false;
                            }
                            else if (v == 'testimon') {
                            tinyMCE.activeEditor.selection.setContent('[testimonial by=" " from=" "]' + tinyMCE.activeEditor.selection.getContent() + '[/testimonial]');
                            return false;
                            }
                            else if (v == 'toggle') {
                            tinyMCE.activeEditor.selection.setContent('[toggle title=" "]' + tinyMCE.activeEditor.selection.getContent() + '[/toggle]');
                            return false;
                            }
                            else if (v == 'bigbutt') {
                            tinyMCE.activeEditor.selection.setContent('[big_button link="#"]' + tinyMCE.activeEditor.selection.getContent() + '[/big_button]');
                            return false;
                            }
                            else if (v == 'smallbutt') {
                            tinyMCE.activeEditor.selection.setContent('[small_button link="#"]' + tinyMCE.activeEditor.selection.getContent() + '[/small_button]');
                            return false;
                            }
                            else if (v == 'sepline') {
                            tinyMCE.activeEditor.selection.setContent(tinyMCE.activeEditor.selection.getContent() + '[separator_lines]' );
                            return false;
                            }
                            else if (v == 'tsDotSep') {
                            tinyMCE.activeEditor.selection.setContent(tinyMCE.activeEditor.selection.getContent() + '[separator_dots]' );
                            return false;
                            }
                        }
                    });

                    // Add some values to the list box
                    mlb.add('Slider', 'slider');
                    mlb.add('Infobox 1', 'ibox1');
                    mlb.add('Infobox 2', 'ibox2');
                    mlb.add('Infobox 3', 'ibox3');
                    mlb.add('Testimonials', 'testimon');
                    mlb.add('Toggle', 'toggle');
                    mlb.add('Big Button', 'bigbutt');
                    mlb.add('Small Button', 'smallbutt');
                    mlb.add('Separator Dots', 'tsDotSep');
                    mlb.add('Separator Lines', 'sepline');

                // Return the new listbox instance
                return mlb;
            }
            return null;
        }
    });
    tinymce.PluginManager.add('tstypo', tinymce.plugins.tstypo);
    tinymce.PluginManager.add('slidebox', tinymce.plugins.slidebox);
    tinymce.PluginManager.add('tscol', tinymce.plugins.tscol);
})();
