<?php
/**
 * Use Custom color setting in the theme package
 *
 * @package Dark Fusion Theme
*/
function dark_fusion_custom_color_css() {

    $link_color = get_theme_mod('link_color','#3395a0');
    list($r, $g, $b) = sscanf($link_color, "#%02x%02x%02x");
    $r = $r - 255;
    $g = $g - 111;
    $b = $b - 96;

    if ($link_color != '#ff0000') { ?>

        <style type="text/css">
/*--------------------------------------------------------------
1.0 Common
--------------------------------------------------------------*/
a:hover , a:focus {color: <?php echo esc_attr($link_color) ?>;}
.entry-meta a:hover span,.entry-meta a:focus span {color: <?php echo esc_attr($link_color) ?>;}
dl dd a, dl dd a:hover, dl dd a:focus, ul li a:focus { color:<?php echo esc_attr($link_color) ?>; }

/*--------------------------------------------------------------
2.0 Forms
--------------------------------------------------------------*/
button,
input[type="button"],
input[type="submit"] {
  color: #ffffff;
  border:1px solid <?php echo esc_attr($link_color) ?>;
}
button:hover,
button:focus,
input[type="button"]:hover,
input[type="button"]:focus,
input[type="submit"]:hover,
input[type="submit"]:focus {
  background: <?php echo esc_attr($link_color) ?>;
  outline: <?php echo esc_attr($link_color) ?>;
}
/* Placeholder text color */
.form-control:focus {
  border: thin dotted <?php echo esc_attr($link_color) ?>;
}

/*============================3.0 BUTTONS============================*/
.btn-default { background: <?php echo esc_attr($link_color) ?>;border: 1px solid <?php echo esc_attr($link_color) ?>;}
.btn-light:hover, .btn-light:focus { background: <?php echo esc_attr($link_color) ?>; border: 1px solid<?php echo esc_attr($link_color) ?>; }

.btn-default-dark { background: <?php echo esc_attr($link_color) ?>; }
.btn-default-light { background: <?php echo esc_attr($link_color) ?>;border: 1px solid <?php echo esc_attr($link_color) ?>; }
.btn-default-light:hover, .btn-default-light:focus { color: <?php echo esc_attr($link_color) ?>;border: 1px solid <?php echo esc_attr($link_color) ?>; }

.btn-border { border: 2px solid <?php echo esc_attr($link_color) ?>; }
.btn-border:hover, .btn-border:focus { border: 2px solid <?php echo esc_attr($link_color) ?>;}

.btn-light:not(:disabled):not(.disabled):active {
  background-color: <?php echo esc_attr($link_color) ?>;
  border-color: <?php echo esc_attr($link_color) ?>;
}

/*===================================================================================*/
/*  MENUBAR SECTION
/*===================================================================================*/

.spice-custom .spice-nav > li > a:focus,
.spice-custom .spice-nav > li > a:hover,
.spice-custom .spice-nav .open > a,
.spice-custom .spice-nav .open > a:focus,
.spice-custom .spice-nav .open > a:hover {
  color: <?php echo esc_attr($link_color) ?>;
  background-color: transparent;
}
body .spice-custom .spice-nav > .active > a,
body .spice-custom .spice-nav > .active > a:hover,
body .spice-custom .spice-nav > .active > a:focus {
  color: <?php echo esc_attr($link_color) ?>;
}
.spice-custom .dropdown-menu {
    border-top: 2px solid <?php echo esc_attr($link_color) ?>;
    border-bottom: 2px solid <?php echo esc_attr($link_color) ?>;
}
.spice-custom .spice-nav .open .dropdown-menu > .active > a,
.spice-custom .spice-nav .open .dropdown-menu > .active > a:hover,
.spice-custom .spice-nav .open .dropdown-menu > .active > a:focus {
    background-color: transparent;
    color: <?php echo esc_attr($link_color) ?>;
}

/* spice Classic */
.spice-classic .spice-nav > li > a:hover,
.spice-classic .spice-nav > li > a:focus {
    background-color: transparent;
    color: <?php echo esc_attr($link_color) ?>;
}
.spice-classic .spice-nav > .open > a,
.spice-classic .spice-nav > .open > a:hover,
.spice-classic .spice-nav > .open > a:focus {
  background-color: transparent;
  color: <?php echo esc_attr($link_color) ?>;
}
.spice-classic .spice-nav > .active > a,
.spice-classic .spice-nav > .active > a:hover,
.spice-classic .spice-nav > .active > a:focus {
  background-color: transparent;
  color: <?php echo esc_attr($link_color) ?>;
    border-top: 2px solid <?php echo esc_attr($link_color) ?>;
}

/*Dropdown Menus & Submenus Css----------------------------------------------------------*/

.spice-custom .dropdown-menu {
  border-top: 2px solid <?php echo esc_attr($link_color) ?>;
  border-bottom: 2px solid <?php echo esc_attr($link_color) ?>;
}

/*===================================================================================*/
/*  CART ICON
/*===================================================================================*/

.cart-header:hover > a, .woocommerce-loop-product__title:hover { color: <?php echo esc_attr($link_color) ?>; }
.cart-header > a .cart-total { background: <?php echo esc_attr($link_color) ?>; }

/*===================================================================================*/
/*  HEADER CONTACT WIDGET
/*===================================================================================*/

.contact-icon i { color: <?php echo esc_attr($link_color) ?>; }
.custom-social-icons li > a:hover,
.custom-social-icons li > a:focus {background-color: <?php echo esc_attr($link_color) ?>;color:#ffffff;}
.layout-2 .custom-social-icons li > a:hover, .layout-2 .custom-social-icons li > a:focus {background-color: #ffffff;color:<?php echo esc_attr($link_color) ?>;}
form.search-form input.search-submit, input[type="submit"], .woocommerce-product-search input[type="submit"], button[type="submit"] {
    background-color: <?php echo esc_attr($link_color) ?>;
  }

.site-info {
    background: #171717;
}
 .site-footer .site-info .footer-nav li a:hover, .site-footer .site-info .footer-nav li a:focus{color: <?php echo esc_attr($link_color) ?>;}
  .entry-meta i {color: <?php echo esc_attr($link_color) ?>;} 

  .page-breadcrumb > li a:hover {
    color: <?php echo esc_attr($link_color) ?>;
}
.pagination a.active {
  position: relative;
  color: <?php echo esc_attr($link_color) ?>;
}
.pagination a:hover,.pagination a:focus, 
.pagination a.next:focus,.pagination a.next:hover, 
.pagination a.prev:focus,.pagination a.prev:hover,.woocommerce nav.woocommerce-pagination ul li a:hover,.woocommerce nav.woocommerce-pagination ul li a:focus{color: #fff; background-color: <?php echo esc_attr($link_color) ?>;}
.site-info p.copyright-section a:hover,
.site-info p.copyright-section a:focus {color: <?php echo esc_attr($link_color) ?>;}
.error-page .title {color:#ffffff;}
.error-page .title span {color:<?php echo esc_attr($link_color) ?>;}
.scroll-up a {background-color: <?php echo esc_attr($link_color) ?>;}


.spice.spice-custom .header-button a{
  background-color: <?php echo esc_attr($link_color) ?>;
  border: 2px solid <?php echo esc_attr($link_color) ?>;
}

.page-title-section .spice-container ul,
.page-title-section .spice-container li
{
  color: <?php echo esc_attr($link_color) ?>;
}
/* Preloader */
.dark-fusion-preloader-cube .dark-fusion-cube:before{background: <?php echo esc_attr($link_color) ?>;}

.sidebar .wp-block-search .wp-block-search__button{
  background-color: <?php echo esc_attr($link_color) ?>;
}

.woocommerce div.product form.cart .button, .woocommerce a.button, .woocommerce a.button:hover,
.woocommerce a.button, .woocommerce .woocommerce-Button, .woocommerce .cart input.button, 
.woocommerce input.button.alt, .woocommerce button.button, .woocommerce #respond input#submit,
.woocommerce .cart input.button:hover, .woocommerce .cart input.button:focus,
.woocommerce input.button.alt:hover, .woocommerce input.button.alt:focus,
.woocommerce input.button:hover, .woocommerce input.button:focus,
.woocommerce button.button:hover, .woocommerce button.button:focus,
.woocommerce #respond input#submit:hover,
.woocommerce #respond input#submit:focus,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button {
    background: <?php echo esc_attr($link_color) ?>;
}
.pagination a.active, .woocommerce .woocommerce-pagination .page-numbers.current {
    background-color: <?php echo esc_attr($link_color) ?>;
    border-color: <?php echo esc_attr($link_color) ?>;
}
.pagination a.next,.pagination a.prev, .woocommerce-pagination a.next,.woocommerce-pagination a.prev{
  background:transparent;
  border: 1px solid <?php echo esc_attr($link_color) ?>;
  color: #FFFFFF;
}
.page-numbers.current {
    background-color: <?php echo esc_attr($link_color) ?>;
    color: #fff;
}
blockquote,.entry-meta .date a {
  background: <?php echo esc_attr($link_color) ?>;
}
.blog .post .spice-seprator{
    border-bottom: 1px solid <?php echo esc_attr($link_color) ?>;
    margin: 5px 0 43px
}
.sidebar .widget_meta ul li a:hover{
  color: #ffffff;
  background: <?php echo esc_attr($link_color) ?>;
} 
.sidebar ul li a:hover, .sidebar ul li a span:hover, .entry-content .more-link{
  color: <?php echo esc_attr($link_color) ?>;
}
.wp-block-search__button .search-icon{
  color: #ffffff;
}
.site-footer .subscribe-form .input-group .form-control {
  border: 1px solid <?php echo esc_attr($link_color) ?>;
}
.site-footer {
   border-top: 2px solid <?php echo esc_attr($link_color) ?>;
}
.footer-meta.entry-meta .tag-links a:hover{
  color: #ffffff;
  background: <?php echo esc_attr($link_color) ?>;
  border: 1px solid <?php echo esc_attr($link_color) ?>;
}
.custom-logo-link-url .site-title a:hover, .custom-logo-link-url .site-title a:focus, .entry-content p a:hover, .entry-content p a:focus {
    color: <?php echo esc_attr($link_color) ?>;
}
.sidebar .widget .wp-block-tag-cloud a:hover, .sidebar .widget .wp-block-tag-cloud a:focus, .footer-sidebar .widget .wp-block-tag-cloud a:hover, .footer-sidebar .widget .wp-block-tag-cloud a:focus {
    background-color: <?php echo esc_attr($link_color) ?>;
}
.blog .post .post-content h3.entry-title a:hover {
    color: <?php echo esc_attr($link_color) ?>;
}
.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{
   background-color: <?php echo esc_attr($link_color) ?>;
}
.woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover{
   background-color: <?php echo esc_attr($link_color) ?>;
}
.woocommerce ul.products li.product .onsale, .products span.onsale, .woocommerce span.onsale{
  background-color: <?php echo esc_attr($link_color) ?>;
}
.woocommerce-message::before{
  color:<?php echo esc_attr($link_color) ?>;
}
.woocommerce-message {
    border-top-color:<?php echo esc_attr($link_color) ?>;
}
.spice-custom .search_exists.open .dropdown-menu{
    border-top: 2px solid <?php echo esc_attr($link_color) ?>;
    border-bottom: 2px solid <?php echo esc_attr($link_color) ?>;
}
    </style>

<?php }

}