(function($) {
    $( function() {
        if($("#_customize-input-after_menu_multiple_option").val()=='menu_btn')
        {
            $("#customize-control-after_menu_btn_txt").show();
            $("#customize-control-after_menu_btn_link").show();
            $("#customize-control-after_menu_btn_new_tabl").show();
            $("#customize-control-after_menu_btn_border").show();
            $("#customize-control-after_menu_html").hide();  
        }
        else if($("#_customize-input-after_menu_multiple_option").val()=='html')
        {
            $("#customize-control-after_menu_btn_txt").hide();
            $("#customize-control-after_menu_btn_link").hide();
            $("#customize-control-after_menu_btn_new_tabl").hide();
            $("#customize-control-after_menu_btn_border").hide();
            $("#customize-control-after_menu_html").show(); 
        }
        wp.customize('after_menu_multiple_option', function(control) {
            control.bind(function( after_menu ) {
                if(after_menu=='menu_btn')
                {
                    $("#customize-control-after_menu_btn_txt").show();
                    $("#customize-control-after_menu_btn_link").show();
                    $("#customize-control-after_menu_btn_new_tabl").show();
                    $("#customize-control-after_menu_btn_border").show();
                    $("#customize-control-after_menu_html").hide();
                }
                else if(after_menu=='html')
                {
                    $("#customize-control-after_menu_btn_txt").hide();
                    $("#customize-control-after_menu_btn_link").hide();
                    $("#customize-control-after_menu_btn_new_tabl").hide();
                    $("#customize-control-after_menu_btn_border").hide();
                    $("#customize-control-after_menu_html").show(); 
                }
                else
                {
                    $("#customize-control-after_menu_btn_txt").hide();
                    $("#customize-control-after_menu_btn_link").hide();
                    $("#customize-control-after_menu_btn_new_tabl").hide();
                    $("#customize-control-after_menu_btn_border").hide();
                    $("#customize-control-after_menu_html").hide(); 
                }
            });
        });

        if (($('#_customize-input-footer_bar_section1').val() == "custom_text")) {

            $('#customize-control-footer_copyright').show();
        } 
        else {

            $('#customize-control-footer_copyright').hide();
        }
        if (($('#_customize-input-footer_bar_section2').val() == "custom_text")) {

            $('#customize-control-footer_bar_section2_copyright').show();
        } 
        else {
            $('#customize-control-footer_bar_section2_copyright').hide();
        }

        wp.customize('footer_bar_section1', function (value) {
            value.bind(function (newval) {
                if (newval == "custom_text") {
                    $('#customize-control-footer_copyright').show();
                } else {
                    $('#customize-control-footer_copyright').hide();
                }
            });
        });
        wp.customize('footer_bar_section2', function (value) {
            value.bind(function (newval) {
                if (newval == "custom_text") {
                    $('#customize-control-footer_bar_section2_copyright').show();
                } 
                else {
                    $('#customize-control-footer_bar_section2_copyright').hide();
                }
            });
        });
        
    });
})(jQuery)