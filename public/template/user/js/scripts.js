// Biến khởi tạo
var timeOut_modalCart;
var viewout = true;
var check_show_modal = true;
// Add a product and show modal cart
var add_item_show_modalCart = function(id,link_checkout) {
	if( check_show_modal ) {
		check_show_modal = false;
		timeOut_modalCart = setTimeout(function(){ 
			check_show_modal = true;
		}, 1000);
		if ($('.addtocart-modal').hasClass('clicked_buy') ) {
			var quantity = $('#quantity').val();
		} else {
			var quantity = 1;
		}
		var params = {
			type: 'POST',
			url: '/cart/add.js',
			async: false,
			data: 'quantity=' + quantity + '&id=' + id,
			dataType: 'json',
			success: function(line_item) {
				if(link_checkout != undefined){
					window.location = "/checkout";
				}
				else{			
					getCartModal();					
					jQuery('#myCart').modal('show');				
					jQuery('.modal-backdrop').css({'height':jQuery(document).height(),'z-index':'99'});
				}
				$('.addtocart-modal').removeClass('clicked_buy');
			},
			error: function(XMLHttpRequest, textStatus) {
				alert('Sáº£n pháº©m báº¡n vá»«a mua Ä‘Ă£ vÆ°á»£t quĂ¡ tá»“n kho');
			}
		};
		jQuery.ajax(params);
	}
}
// Plus number quantiy product detail 
var plusQuantity = function() {
	if ( jQuery('input[name="quantity"]').val() != undefined ) {
		var currentVal = parseInt(jQuery('input[name="quantity"]').val());
		if (!isNaN(currentVal)) {
			jQuery('input[name="quantity"]').val(currentVal + 1);
		} else {
			jQuery('input[name="quantity"]').val(1);
		}
	}else {
		console.log('error: Not see elemnt ' + jQuery('input[name="quantity"]').val());
	}
}
// Minus number quantiy product detail 
var minusQuantity = function() {
	if ( jQuery('input[name="quantity"]').val() != undefined ) {
		var currentVal = parseInt(jQuery('input[name="quantity"]').val());
		if (!isNaN(currentVal) && currentVal > 1) {
			jQuery('input[name="quantity"]').val(currentVal - 1);
		}
	}else {
		console.log('error: Not see elemnt ' + jQuery('input[name="quantity"]').val());
	}
}
// Modal Cart
function getCartModal(){
	var cart = null;
	jQuery('#cartform').hide();
	jQuery('#myCart #exampleModalLabel').text("Giá» hĂ ng");
	jQuery.getJSON('/cart.js', function(cart, textStatus) {
		if(cart) {
			jQuery('#cartform').show();
			jQuery('.line-item:not(.original)').remove();
			jQuery.each(cart.items,function(i,item){
				var total_line = 0;
				var total_line = item.quantity * item.price;
				tr = jQuery('.original').clone().removeClass('original').appendTo('table#cart-table tbody');
				if(item.image != null)
					tr.find('.item-image').html("<img src=" + Haravan.resizeImage(item.image,'small') + ">");
				else
					tr.find('.item-image').html("<img src='//theme.hstatic.net/200000449489/1000802239/14/no_image.jpg?v=569'>");
				vt = item.variant_options;
				if(vt.indexOf('Default Title') != -1)
					vt = '';
				tr.find('.item-title').children('a').html(item.product_title + '<br><span>' + vt + '</span>').attr('href', item.url);
				tr.find('.item-quantity').html("<input id='quantity1' name='updates[]' min='1' type='number' value=" + item.quantity + " class='' />");
				if ( typeof(formatMoney) != 'undefined' ){
					tr.find('.item-price').html(Haravan.formatMoney(total_line, formatMoney));
				}else {
					tr.find('.item-price').html(Haravan.formatMoney(total_line, ''));
				}
				tr.find('.item-delete').html("<a href='javascript:void(0);' onclick='deleteCart(" + (i+1) + ")' ><i class='fa fa-times'></i></a>");
			});
			jQuery('.item-total').html(Haravan.formatMoney(cart.total_price, formatMoney));
			jQuery('.modal-title').children('b').html(cart.item_count);
			jQuery('.count-holder .count').html(cart.item_count );
			if(cart.item_count == 0){				
				jQuery('#exampleModalLabel').html('Giá» hĂ ng cá»§a báº¡n Ä‘ang trá»‘ng. Má»i báº¡n tiáº¿p tá»¥c mua hĂ ng.');
				jQuery('#cart-view').html('<tr class="item-cart_empty"><td><div class="svgico-mini-cart"> <svg width="81" height="70" viewBox="0 0 81 70"><g transform="translate(0 2)" stroke-width="4" stroke="#1e2d7d" fill="none" fill-rule="evenodd"><circle stroke-linecap="square" cx="34" cy="60" r="6"></circle><circle stroke-linecap="square" cx="67" cy="60" r="6"></circle><path d="M22.9360352 15h54.8070373l-4.3391876 30H30.3387146L19.6676025 0H.99560547"></path></g></svg></div> Hiá»‡n chÆ°a cĂ³ sáº£n pháº©m</td></tr>');
				jQuery('#cartform').hide();
			}
			else{			
				jQuery('#exampleModalLabel').html('Báº¡n cĂ³ ' + cart.item_count + ' sáº£n pháº©m trong giá» hĂ ng.');
				jQuery('#cartform').removeClass('hidden');
				jQuery('#cart-view').html('');
			}
			if (jQuery('#cart-pos-product').length > 0 ) {
				jQuery('#cart-pos-product span').html(cart.item_count + ' sáº£n pháº©m');
			}
			// Get product for cart view
			jQuery.each(cart.items,function(i,item){
				clone_item(item,i);
			});
			jQuery('#total-view-cart').html(Haravan.formatMoney(cart.total_price, formatMoney));
		}
		else{
			jQuery('#exampleModalLabel').html('Giá» hĂ ng cá»§a báº¡n Ä‘ang trá»‘ng. Má»i báº¡n tiáº¿p tá»¥c mua hĂ ng.');
			if ( jQuery('#cart-pos-product').length > 0 ) {
				jQuery('#cart-pos-product span').html(cart.item_count + ' sáº£n pháº©m');
			}
			jQuery('#cart-view').html('<tr class="item-cart_empty"><td><div class="svgico-mini-cart"> <svg width="81" height="70" viewBox="0 0 81 70"><g transform="translate(0 2)" stroke-width="4" stroke="#1e2d7d" fill="none" fill-rule="evenodd"><circle stroke-linecap="square" cx="34" cy="60" r="6"></circle><circle stroke-linecap="square" cx="67" cy="60" r="6"></circle><path d="M22.9360352 15h54.8070373l-4.3391876 30H30.3387146L19.6676025 0H.99560547"></path></g></svg></div> Hiá»‡n chÆ°a cĂ³ sáº£n pháº©m</td></tr>');
			jQuery('#cartform').hide();
		}
	});
	if(!$('.header-action_cart').hasClass('show-action')){
		$('body').removeClass("locked-scroll");
		$('.header-action').removeClass('show-action');
	}
	if($('#site-header').hasClass('hSticky')){
		$('#site-header').addClass("hSticky-nav");
		setTimeout(function(){
			$('#site-header').addClass("hSticky-up");
		}, 300);
		setTimeout(function(){
			$('.header-action_cart').addClass("show-action");
			$('body').addClass("locked-scroll");
		}, 500);
	}
	else{
		$('.header-action_cart').addClass("show-action");
		$('body').addClass("locked-scroll");
		jQuery('html, body').animate({
			scrollTop: 0			
		}, 600);
	}
}
//clone item cart
function clone_item(product,i){
	var item_product = jQuery('#clone-item-cart').find('.item_2');
	if ( product.image == null ) {
		item_product.find('img').attr('src','//theme.hstatic.net/200000449489/1000802239/14/no_image.jpg?v=569').attr('alt', product.url);
	} else {
		item_product.find('img').attr('src',Haravan.resizeImage(product.image,'small')).attr('alt', product.url);
	}
	item_product.find('a:not(.remove-cart)').attr('href', product.url).attr('title', product.url);
	item_product.find('.pro-title-view').html(product.title);
	item_product.find('.pro-quantity-view .qty-value').html(product.quantity);
	item_product.find('.pro-price-view').html(Haravan.formatMoney(product.price,formatMoney));
	item_product.find('.remove-cart').html('<a href="javascript:void(0);" onclick="deleteCart(' + (i+1) + ')" ><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve"> <g><path d="M500,442.7L79.3,22.6C63.4,6.7,37.7,6.7,21.9,22.5C6.1,38.3,6.1,64,22,79.9L442.6,500L22,920.1C6,936,6.1,961.6,21.9,977.5c15.8,15.8,41.6,15.8,57.4-0.1L500,557.3l420.7,420.1c16,15.9,41.6,15.9,57.4,0.1c15.8-15.8,15.8-41.5-0.1-57.4L557.4,500L978,79.9c16-15.9,15.9-41.5,0.1-57.4c-15.8-15.8-41.6-15.8-57.4,0.1L500,442.7L500,442.7z"/></g> </svg></a>');
	var title = '';
	if(product.variant_options.indexOf('Default Title') == -1){
		$.each(product.variant_options,function(i,v){
			title = title + v + ' / ';
		});
		title = title + '@@';
		title = title.replace(' / @@','')
		item_product.find('.variant').html(title);
	}else {
		item_product.find('.variant').html('');
	}
	item_product.clone().removeClass('hidden').prependTo('#cart-view');
}
// Delete variant in modalCart
function deleteCart(line){
	var params = {
		type: 'POST',
		url: '/cart/change.js',
		data: 'quantity=0&line=' + line,
		dataType: 'json',
		success: function(cart) {
			getCartModal();
		},
		error: function(XMLHttpRequest, textStatus) {
			Haravan.onError(XMLHttpRequest, textStatus);
		}
	};
	jQuery.ajax(params);
}
// Buynow
var buy_now = function(id) {
	var quantity = 1;
	var params = {
		type: 'POST',
		url: '/cart/add.js',
		data: 'quantity=' + quantity + '&id=' + id,
		dataType: 'json',
		success: function(line_item) {
			window.location = '/checkout';
		},
		error: function(XMLHttpRequest, textStatus) {
			Haravan.onError(XMLHttpRequest, textStatus);
		}
	};
	jQuery.ajax(params);
}
// Update product in modalCart
jQuery(document).on("click","#update-cart-modal",function(event){
	event.preventDefault();
	if (jQuery('#cartform').serialize().length <= 5) return;
	jQuery(this).html('Äang cáº­p nháº­t');
	var params = {
		type: 'POST',
		url: '/cart/update.js',
		data: jQuery('#cartform').serialize(),
		dataType: 'json',
		success: function(cart) {
			if ((typeof callback) === 'function') {
				callback(cart);
			} else {
				getCartModal();
			}
			jQuery('#update-cart-modal').html('Cáº­p nháº­t');
		},
		error: function(XMLHttpRequest, textStatus) {
			Haravan.onError(XMLHttpRequest, textStatus);
		}
	};
	jQuery.ajax(params);
});
/* fixHeightProduct */
function fixHeightProduct(data_parent, data_target, data_image) {
	var box_height = 0;
	var box_image = 0;
	var boxtarget = data_parent + ' ' + data_target;
	var boximg = data_parent + ' ' + data_target + ' ' + data_image;
	jQuery(boximg).css('height', 'auto');
	jQuery($(boxtarget)).css('height', 'auto');
	jQuery($(boxtarget)).removeClass('fixheight');
	jQuery($(boxtarget)).each(function() {
		if (jQuery(this).find(data_image + ' .lazyloaded').height() > box_image) {
			box_image = jQuery(this).find($(data_image)).height();
		}
	});
	if (box_image > 0) {
		jQuery(boximg).height(box_image);
	}
	jQuery($(boxtarget)).each(function() {
		if (jQuery(this).height() > box_height) {
			box_height = jQuery(this).height();
		}
	});
	jQuery($(boxtarget)).addClass('fixheight');
	if (box_height > 0) {
		jQuery($(boxtarget)).height(box_height);
	}
	try {
		fixheightcallback();
	} catch (ex) {}
}
// Image Product Loaded fix height
$(document).on('lazyloaded', function(e){	//lazybeforeunveil 
	fixHeightProduct('.wrapper-collection-1 .content-product-list', '.product-resize', '.image-resize');
	if(jQuery(window).width() > 991){		
		jQuery(window).resize(function() {
			fixHeightProduct('.wrapper-collection-1 .content-product-list', '.product-resize', '.image-resize');
		});
	}
	fixHeightProduct('.wrapper-collection-2 .content-product-list', '.product-resize', '.image-resize');
	if(jQuery(window).width() > 991){	
		jQuery(window).resize(function() {
			fixHeightProduct('.wrapper-collection-2 .content-product-list', '.product-resize', '.image-resize');
		});
	}
	fixHeightProduct('#collection-body .content-product-list', '.product-resize', '.image-resize');
	jQuery(window).resize(function() {
		fixHeightProduct('#collection-body .content-product-list', '.product-resize', '.image-resize');
	});
	fixHeightProduct('.list-productRelated .content-product-list', '.product-resize', '.image-resize');
	jQuery(window).resize(function() {
		fixHeightProduct('.list-productRelated .content-product-list', '.product-resize', '.image-resize');
	});
	fixHeightProduct('.search-list-results', '.product-resize', '.image-resize');
	jQuery(window).resize(function() {
		fixHeightProduct('.search-list-results', '.product-resize', '.image-resize');
	});
});
function smoothScroll(a, b){
	$('body,html').animate({
		scrollTop : a
	}, b);
}
function boxAccount(type){
	$('.site_account .site_account_panel_list .site_account_panel').removeClass('is-selected');
	var newheight = $('.site_account .site_account_panel_list .site_account_panel#' + type).addClass('is-selected').height();
	if($('.site_account_panel').hasClass('is-selected')){
		$('.site_account_panel_list').css("height", newheight);
	}
};
jQuery(document).ready(function(){
	// Get number item for cart header
	$.get('/cart.js').done(function(cart){
		$('.cart-menu .count').html(cart.item_count);
	});
	// if (window.template.indexOf('index') > -1) {
		
	// }
    $('#home-slider .owl-carousel').owlCarousel({
        items: 1,
        nav: false,
        dots: true,
        touchDrag: true,
        lazyLoad: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1024: {
                items: 1
            }
        },
        onChanged: function (event) {
            setTimeout(function () {
                $('#home-slider .owl-carousel').find('.owl-dot').each(function (index) {
                    $(this).attr('aria-label', index + 1);
                });
            }, 400);
        }
    });
    if ($('.list-slider-banner').length > 0) {
        var checkBanner = $('.list-slider-banner .home-banner-pd').length;
        $('.list-slider-banner').owlCarousel({
            items: 1,
            loop: true,
            dots: false,
            nav: false,
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 1,
                    stagePadding: 30,
                },
                480: {
                    items: 1,
                    stagePadding: 50,
                },
                768: {
                    items: 2,
                    stagePadding: 60,
                    nav: true
                },
                992: {
                    items: 3,
                    stagePadding: checkBanner > 3 ? 90 : 0,
                    loop: checkBanner > 3 ? true : false,
                    nav: checkBanner > 3 ? true : false,
                    mouseDrag: checkBanner > 3 ? true : false,
                    touchDrag: checkBanner > 3 ? true : false
                },
                1200: {
                    items: 3,
                    stagePadding: checkBanner > 3 ? 60 : 0,
                    loop: checkBanner > 3 ? true : false,
                    nav: checkBanner > 3 ? true : false,
                    mouseDrag: checkBanner > 3 ? true : false,
                    touchDrag: checkBanner > 3 ? true : false
                }
            }
        });
    }
	//Click event to scroll to top
	jQuery(document).on("click", ".back-to-top", function(){
		jQuery(this).removeClass('show');
		jQuery('html, body').animate({
			scrollTop: 0			
		}, 800);
	});
	/* scroll header */
	var $parentHeader = $('.mainHeader--height');
	var parentHeight = $parentHeader.find('.main-header').outerHeight();

	var $header = $('.main-header');
	var offset_sticky_header = $header.outerHeight() + 150;
	var offset_sticky_down = 0;

	$parentHeader.css('min-height', parentHeight);
	var resizeTimer = false,
			resizeWindow = $(window).prop("innerWidth");

	$(window).on("resize", function() {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function() {
			var newWidth = $(window).prop("innerWidth");
			if (resizeWindow != newWidth) {
				$header.removeClass('hSticky-up').removeClass('hSticky-nav').removeClass('hSticky');
				$parentHeader.css('min-height', '');				
				parentHeight = $parentHeader.find('.main-header').outerHeight();
				$parentHeader.css('min-height', parentHeight);
				resizeWindow = newWidth;
			}
		}, 200)
	});
	setTimeout(function() {
		$parentHeader.css('min-height', '');
		parentHeight = $parentHeader.find('.main-header').outerHeight();
		$parentHeader.css('min-height', parentHeight);
		jQuery(window).scroll(function() {	
			/* scroll header */
			if(jQuery(window).scrollTop() > offset_sticky_header && jQuery(window).scrollTop() > offset_sticky_down) {		
				if(jQuery(window).width() > 991){		
					$('body').removeClass('locked-scroll');
					$('.header-action').removeClass('show-action');
				}
				$header.addClass('hSticky');	
				if(jQuery(window).scrollTop() > offset_sticky_header + 150){
					$header.removeClass('hSticky-up').addClass('hSticky-nav');	
				}
			} 
			else {
				if(jQuery(window).scrollTop() > offset_sticky_header + 150 && (jQuery(window).scrollTop() - 150) + jQuery(window).height()  < $(document).height()) {
					$header.addClass('hSticky-up');	
				}
			}
			if (jQuery(window).scrollTop() <= offset_sticky_down && jQuery(window).scrollTop() <= offset_sticky_header) {
				$header.removeClass('hSticky-up').removeClass('hSticky-nav');
				if (jQuery(window).scrollTop() <= offset_sticky_header - 100) {
					$header.removeClass('hSticky');
				}
			}
			offset_sticky_down = jQuery(window).scrollTop();
		});	
	}, 300);

	jQuery(window).scroll(function() {	
		/* scroll top */
		if (jQuery('.back-to-top').length > 0 && jQuery(window).scrollTop() > 500 ) {
			jQuery('.back-to-top').addClass('show');
		} else {
			jQuery('.back-to-top').removeClass('show');
		}
	});	
	/* backto - product */
	if($('#backto-page').length > 0){
		$(document).on("click", "#backto-page", function(){		
			window.history.back();
		});
	}
	$('a[data-spy=scroll]').click(function(){
		event.preventDefault() ;
		$('body').animate({scrollTop: ($($(this).attr('href')).offset().top - 20) + 'px'}, 500);
	})
	/* CLICK icon header */
	$('body').on('click', '.js-link', function(e){
		e.preventDefault();
		boxAccount($(this).attr('aria-controls'));
	});
	$('.site_account input').blur(function(){
		var tmpval = $(this).val();
		if(tmpval == '') {
			$(this).removeClass('is-filled');
		} else {
			$(this).addClass('is-filled');
		}
	});
	$('.header-action-toggle').click(function(e){
		e.preventDefault();		
		if($(this).parents('.header-action').hasClass('show-action')){
			$('body').removeClass('locked-scroll');
			$(this).parents('.header-action').removeClass('show-action');
		}
		else{
			$('.header-action').removeClass('show-action');
			$('body').addClass('locked-scroll');
			$(this).parents('.header-action').addClass('show-action');		
		}		
	});
	$('body').on('click', '#site-overlay', function(e){
		$('body').removeClass('locked-scroll');
		$('.header-action').removeClass('show-action');
	});
	/* mainmenu mobile */
	$('.list-root li a').click(function(e){
		if ($(this).find('i').length){
			e.preventDefault();
			var menu_child_id = $(this).parent().data('menu-root');
			$('.list-root').addClass('mm-subopened');
			$('#' + menu_child_id).addClass('mm-opened');
		} 
	})
	$('.list-child li:first-child a').click(function(){
		$(this).parents('.list-child').removeClass('mm-opened');
		$('.list-root').removeClass('mm-subopened');
	})
	$('.list-child li.level-2 a').click(function(e){
		if ($(this).find('i').length){
			e.preventDefault();
			var menu_sub_id = $(this).parent().data('menu-root');
			$('li.level-2').addClass('mm-subopened');
			$('#' + menu_sub_id).addClass('mm-sub');
		} 
	})
	$('.sub-child li:first-child a').click(function(){
		$(this).parents('.sub-child').removeClass('mm-sub');
		$('.list-child').removeClass('mm-subopened');
	})
	$(document).on("click",".sub-child li.level-3 a",function(e){
		if ($(this).find('i').length){
			e.preventDefault();
			var menu_subnav_id = $(this).parent().data('menu-root');
			$('li.level-3').addClass('mm-open-3');
			$('#' +  menu_subnav_id).addClass('mm-sub-3');
		} 
	});
	$(document).on("click",".sub-child-3 li:first-child a",function(e){
		$(this).parents('.sub-child-3').removeClass('mm-sub-3');
		$('.sub-child').removeClass('mm-open-3');
	});
	// Dropdown Title
	jQuery('.title_block').click(function(){
		$(this).next().slideToggle('medium');
	});    
	$(document).on("click",".dropdown-filter", function(){
		if ( $(this).parent().attr('aria-expanded') == 'false' ) {
			$(this).parent().attr('aria-expanded','true');
		} else {
			$(this).parent().attr('aria-expanded','false');
		}
	});
	// Mainmenu sidebar
	$(document).on("click", "span.icon-subnav", function(){
		if ($(this).parent().hasClass('active')) {
			$(this).parent().removeClass('active');
			$(this).siblings('ul').slideUp();
		} else {
			if( $(this).parent().hasClass("level0") || $(this).parent().hasClass("level1")){
				$(this).parent().siblings().find("ul").slideUp();
				$(this).parent().siblings().removeClass("active");
			}
			$(this).parent().addClass('active');
			$(this).siblings('ul').slideDown();
		}
	});
	// Menu sidebar
	$(document).on('click','.tree-menu .tree-menu-lv1',function(){
		$this = $(this).find('.tree-menu-sub');
		$('.tree-menu .has-child .tree-menu-sub').not($this).slideUp('fast');
		$(this).find('.tree-menu-sub').slideToggle('fast');
		$(this).toggleClass('menu-collapsed');
		$(this).toggleClass('menu-uncollapsed');
		var $this1 = $(this);
		$('.tree-menu .has-child').not($this1).removeClass('menu-uncollapsed');
	});
	/* footer */
	if (jQuery(window).width() < 768) {
		jQuery('.main-footer .footer-col .footer-title').on('click', function(){
			jQuery(this).toggleClass('active').parent().find('.footer-content').stop().slideToggle('medium');
		});
		// icon Footer
		$('a.btn-fter').click(function(e){
			if ( $(this).attr('aria-expanded') == 'false' ) {
				e.preventDefault();
				$(this).attr('aria-expanded','true');
				$('.main-footer').addClass('bg-active');
			} else {
				$(this).attr('aria-expanded','false');
				$('.main-footer').removeClass('bg-active');
			}
		});
	}
});

/* Search ultimate destop -mobile*/
$('.ultimate-search').submit(function(e) {
	e.preventDefault();
	var q = $(this).find('input[name=q]').val();
	if(q.indexOf('script') > -1 || q.indexOf('>') > -1){
		alert('Tá»« khĂ³a cá»§a báº¡n cĂ³ chá»©a mĂ£ Ä‘á»™c háº¡i ! Vui lĂ²ng nháº­p láº¡i key word khĂ¡c');
		$(this).find('input[name=q]').val('');
	}else{
		var q_follow = 'product';
		var query = encodeURIComponent(q);
		if( !q ) {
			window.location = '/search?type='+ q_follow +'&q=';
			return;
		}	
		else {
			window.location = '/search?type=' + q_follow +'&q=' + query;
			return;
		}
	}
});
// var $input = $('.ultimate-search input[type="text"]');
// $input.bind('keyup change paste propertychange', function() {
// 	var key = $(this).val(),
// 			$parent = $(this).parents('.wpo-wrapper-search'),
// 			$results = $(this).parents('.wpo-wrapper-search').find('.smart-search-wrapper');
// 	if(key.indexOf('script') > -1 || key.indexOf('>') > -1){
// 		alert('Tá»« khĂ³a cá»§a báº¡n cĂ³ chá»©a mĂ£ Ä‘á»™c háº¡i ! Vui lĂ²ng nháº­p láº¡i key word khĂ¡c');
// 		$(this).val('');
// 		$('.ultimate-search input[type="text"]').val('');
// 	}
// 	else{
// 		if(key.length > 0 ){
// 			$('.ultimate-search input[type="text"]').val($(this).val());
// 			$(this).attr('data-history', key);
// 			var q_follow = 'product',
// 					str = '';
// 			str = '/search?type=product&q='+ key + '&view=ultimate-product';
// 			$.ajax({
// 				url: str,
// 				type: 'GET',
// 				async: true,
// 				success: function(data){
// 					$results.find('.resultsContent').html(data);
// 				}
// 			})
// 			if(!$('.header-action_search').hasClass('show-action')){
// 				$('body').removeClass("locked-scroll");
// 				$('.header-action').removeClass('show-action');
// 			}
// 			$(".search-bar-mobile .ultimate-search").addClass("expanded");
// 			$results.fadeIn();
// 		}
// 		else{
// 			$('.ultimate-search input[type="text"]').val($(this).val());
// 			$(".search-bar-mobile .ultimate-search").removeClass("expanded");
// 			$results.fadeOut();
// 		}
// 	}
// })
$('body').click(function(evt) {
	var target = evt.target;
	if (target.id !== 'ajaxSearchResults' && target.id !== 'inputSearchAuto') {
		$(".ajaxSearchResults").hide();
	}
	if (target.id !== 'ajaxSearchResults-3' && target.id !== 'inputSearchAuto-3') {
		$("#ajaxSearchResults-3").hide();
	}
	if (target.id !== 'ajaxSearchResults-mb' && target.id !== 'inputSearchAuto-mb') {
		$(".ajaxSearchResults").hide();
	}
});
$('body').on('click', '.ultimate-search input[type="text"]', function() {
	if ($(this).is(":focus")) {
		if ($(this).val() != '') {
			$(".ajaxSearchResults").show();
		}
	} else {

	}
})
$('body').on('click', '.ultimate-search .close-search', function(e){
	e.preventDefault();
	$(".ajaxSearchResults").hide();
	$(".ultimate-search").removeClass("expanded");
	$(".ultimate-search").find('input[name=q]').val('');
})
/*=======================================*/
jQuery(document).ready(function(){
	if ($('.addThis_listSharing').length > 0){
		$(window).scroll(function(){
			if(jQuery(window).scrollTop() > 100 ) {
				jQuery('.addThis_listSharing').addClass('is-show');
			} else {
				jQuery('.addThis_listSharing').removeClass('is-show');
			}
		});
		$('.content_popupform form.contact-form').submit(function(e){
			var self = $(this);
			if($(this)[0].checkValidity() == true){
				e.preventDefault();		
				grecaptcha.ready(function() {
					grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {action: 'submit'}).then(function(token) {
						self.find('input[name="g-recaptcha-response"]').val(token);
						$.ajax({
							type: 'POST',
							url:'/contact',
							data: $('.content_popupform form.contact-form').serialize(),
							beforeSend:function(){  
								// addClass loading
							},  
							success:function(data){		
								if($(data).find('#success-popupform').length > 0){
									$('.content_popupform form.contact-form .error-formcontact').addClass('hidden').slideUp();
									$('.modal-contactform.fade.in').modal('hide');
									setTimeout(function(){ 		
										$('.modal-succesform').modal('show');					
										setTimeout(function(){							
											$('.modal-succesform.fade.in').modal('hide');		
										}, 5000);
									},300);
								}
								else{
									$('.content_popupform form.contact-form .error-formcontact').removeClass('hidden').slideDown('50');
								}
							},
							complete: function() {
								// removeClass loading
							}
						})
					});
				});
			}
		});
		$(".modal-succesform").on('hidden.bs.modal', function() {			
			location.reload();
		});
	}
	if ($('.layoutProduct_scroll').length > 0 && jQuery(window).width() < 768) {
		var curScrollTop = 0;
		$(window).scroll(function(){	
			var scrollTop = $(window).scrollTop();
			if(scrollTop > curScrollTop  && scrollTop > 200 ) {
				$('.layoutProduct_scroll').removeClass('scroll-down').addClass('scroll-up');
			}
			else {
				if (scrollTop > 200 && scrollTop + $(window).height() + 150 < $(document).height()) {
					$('.layoutProduct_scroll').removeClass('scroll-up').addClass('scroll-down');	
				}
			}
			if(scrollTop < curScrollTop  && scrollTop < 200 ) {
				$('.layoutProduct_scroll').removeClass('scroll-up').removeClass('scroll-down');
			}
			curScrollTop = scrollTop;
		});
	}
	/* submit form footer*/
	if ($('.form_newsletter').length > 0){
		$('.form_newsletter form.contact-form').submit(function(e) { 
			var self = $(this);
			if($(this)[0].checkValidity() == true){
				e.preventDefault();
				grecaptcha.ready(function() {
					grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {action: 'submit'}).then(function(token) {
						self.find('input[name="g-recaptcha-response"]').val(token);
						self.unbind('submit').submit();
					}); 
				});
			}
		});
	}
	/* submit form login header*/
	// $('#header-login-panel form#customer_login').submit(function(e) { 
	// 	var self = $(this);
	// 	if($(this)[0].checkValidity() == true){
	// 		e.preventDefault();
	// 		grecaptcha.ready(function() {
	// 			grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {action: 'submit'}).then(function(token) {
	// 				self.find('input[name="g-recaptcha-response"]').val(token);
	// 				self.unbind('submit').submit();
	// 			}); 
	// 		});
	// 	}
	// });
	// $('#header-recover-panel form').submit(function(e) { 
	// 	var self = $(this);
	// 	if($(this)[0].checkValidity() == true){
	// 		e.preventDefault();
	// 		grecaptcha.ready(function() {
	// 			grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {action: 'submit'}).then(function(token) {
	// 				self.find('input[name="g-recaptcha-response"]').val(token);
	// 				self.unbind('submit').submit();
	// 			}); 
	// 		});
	// 	}
	// });
});
/*=======================================*/
var HRT = {
	init: function() {
		var that = this;
		that.initViews();
	},
	initViews: function() {
		var view = window.template,
				that = this;
		switch (view) {
			case 'index':
			case 'index.slider':
			case 'index.noslider':

				break;
			case 'collection':
				break;
			case 'product':
				break;
			case 'search':
				break;
			case 'blog':
				break;
			case 'article':
				that.Article.init();
				break;
			case 'page':
				break;
			case 'page.ldp-kids-01':
				that.LdpKids01.init();
				break;

			case 'cart':
				break;
			default:
		}
	},
	
};

var nCount = 0;
$('.ldpage-kids01-collection').each(function(){
	nCount += $(this).find('.nav-tabs li').length;
});

HRT.Article = {
	init: function() {
		this.tbOfContentsArt();
	},	
	tbOfContentsArt: function(){
		function urlfriendly (slug) {
			//Äá»•i chá»¯ hoa thĂ nh chá»¯ thÆ°á»ng
			//Äá»•i kĂ½ tá»± cĂ³ dáº¥u thĂ nh khĂ´ng dáº¥u
			slug = slug.toLowerCase();
			slug = slug.trim().replace(/Ă¡|Ă |áº£|áº¡|Ă£|Äƒ|áº¯|áº±|áº³|áºµ|áº·|Ă¢|áº¥|áº§|áº©|áº«|áº­/gi, 'a');
			slug = slug.replace(/Ă©|Ă¨|áº»|áº½|áº¹|Ăª|áº¿|á»|á»ƒ|á»…|á»‡/gi, 'e');
			slug = slug.replace(/i|Ă­|Ă¬|á»‰|Ä©|á»‹/gi, 'i');
			slug = slug.replace(/Ă³|Ă²|á»|Ăµ|á»|Ă´|á»‘|á»“|á»•|á»—|á»™|Æ¡|á»›|á»|á»Ÿ|á»¡|á»£/gi, 'o');
			slug = slug.replace(/Ăº|Ă¹|á»§|Å©|á»¥|Æ°|á»©|á»«|á»­|á»¯|á»±/gi, 'u');
			slug = slug.replace(/Ă½|á»³|á»·|á»¹|á»µ/gi, 'y');
			slug = slug.replace(/Ä‘/gi, 'd');
			//XĂ³a cĂ¡c kĂ½ tá»± Ä‘áº·t biá»‡t
			slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '_');
			//Äá»•i khoáº£ng tráº¯ng thĂ nh kĂ½ tá»± gáº¡ch ngang
			slug = slug.replace(/ /gi, "_");
			//Äá»•i nhiá»u kĂ½ tá»± gáº¡ch ngang liĂªn tiáº¿p thĂ nh 1 kĂ½ tá»± gáº¡ch ngang
			//PhĂ²ng trÆ°á»ng há»£p ngÆ°á»i nháº­p vĂ o quĂ¡ nhiá»u kĂ½ tá»± tráº¯ng
			slug = slug.replace(/\-\-\-\-\-/gi, '_');
			slug = slug.replace(/\-\-\-\-/gi, '_');
			slug = slug.replace(/\-\-\-/gi, '_');
			slug = slug.replace(/\-\-/gi, '_');
			//XĂ³a cĂ¡c kĂ½ tá»± gáº¡ch ngang á»Ÿ Ä‘áº§u vĂ  cuá»‘i
			slug = '@' + slug + '@';
			slug = slug.replace(/\@\-|\-\@|\@/gi, '');
			//In slug ra textbox cĂ³ id â€œslugâ€
			return slug;
		};
		class TableOfContents {
			constructor({ from, to }) {
				this.fromElement = from;
				this.toElement = to;
				// Get all the ordered headings.
				this.headingElements = this.fromElement.querySelectorAll("h1, h2, h3,h4,h5,h6");
				this.tocElement = document.createElement("div")
			}
			/*  Get the most important heading level.
        For example if the article has only <h2>, <h3> and <h4> tags
        this method will return 2.
     */
			getMostImportantHeadingLevel() {
				let mostImportantHeadingLevel = 6; // <h6> heading level
				for (let i = 0; i < this.headingElements.length; i++) {
					let headingLevel = TableOfContents.getHeadingLevel(this.headingElements[i]);
					mostImportantHeadingLevel = (headingLevel < mostImportantHeadingLevel) ?
						headingLevel : mostImportantHeadingLevel;
				}
				return mostImportantHeadingLevel;
			}
			static generateId(headingElement) {
				return urlfriendly(headingElement.textContent)
			}
			static getHeadingLevel(headingElement) {
				switch (headingElement.tagName.toLowerCase()) {
					case "h1": return 1;
					case "h2": return 2;
					case "h3": return 3;
					case "h4": return 4;
					case "h5": return 5;
					case "h6": return 6;
					default: return 2;
				}
			}

			generateToc() {
				let currentLevel = this.getMostImportantHeadingLevel() - 1,
						currentElement = this.tocElement;
				for (let i = 0; i < this.headingElements.length; i++) {
					let headingElement = this.headingElements[i],
							headingLevel = TableOfContents.getHeadingLevel(headingElement),
							headingLevelDifference = headingLevel - currentLevel,
							linkElement = document.createElement("a");
					if (!headingElement.id) {
						headingElement.id = TableOfContents.generateId(headingElement);
					}
					linkElement.href = `#${headingElement.id}`;
					linkElement.textContent = headingElement.textContent;

					if (headingLevelDifference > 0) {
						// Go down the DOM by adding list elements.
						for (let j = 0; j < headingLevelDifference; j++) {
							let listElement = document.createElement("ul"),													
									listItemElement = document.createElement("li");
							listElement.appendChild(listItemElement);
							currentElement.appendChild(listElement);
							currentElement = listItemElement;
						}
						currentElement.appendChild(linkElement);
					} 
					else {
						// Go up the DOM.
						for (let j = 0; j < -headingLevelDifference; j++) {
							currentElement = currentElement.parentNode.parentNode;
						}
						let listItemElement = document.createElement("li");
						listItemElement.appendChild(linkElement);
						currentElement.parentNode.appendChild(listItemElement);
						currentElement = listItemElement;
					}
					currentLevel = headingLevel;
				}
				if(this.tocElement.firstChild != null){
					this.toElement.appendChild(this.tocElement.firstChild);
				}else{
					document.getElementById("table-content-container").remove();
				}
			}
		}
		(function($) {
			var stringtemplate = $('<div id="table-content-container" class="table-of-contents"><div class="table-title"><div class="htitle">Ná»™i dung bĂ i viáº¿t<span class="toc_toggle">[<a class="icon-list" href="javascript:void(0)">áº¨n</a>]</span></div></div></div>');
			stringtemplate.insertBefore(".article-body");

			new TableOfContents({
				from: document.querySelector(".article-body"),
				to: document.querySelector("#table-content-container")
			}).generateToc();
			$("#table-content-container .icon-list").click(function(){
				$(this).parents("#table-content-container").find("ul:first").slideToggle({ direction: "left" }, 100);
				var texxx = $(this).text();
				if(texxx == "áº¨n"){
					$(this).html("Hiá»‡n")
				}else{
					$(this).html("áº¨n")
				}
			})
			let buttontable = '<div class="table-content-fixed"><div class="table-of-header"><button class="btn-icolist"><i class="fa fa-list-ol" aria-hidden="true"></i></button> <span class="hTitle"> Ná»™i dung bĂ i viáº¿t</span></div><div id="clone-table" class="table-of-contents"></div></div>';
			$("#article").append(buttontable).ready(function(){
				var tablehtml = $("#table-content-container").html()
				$("#clone-table").html(tablehtml);
			});
		})(jQuery);
		$(document).ready(() =>{	
			let heighthead = $(".hSticky-nav").height() + 65;		
			$("#table-content-container ul li a,#clone-table ul li a").click(function(){
				var id = $(this).attr('href');
				$("html,body").animate({ scrollTop: $(id).offset().top - heighthead }, 600)	
			})

			$(".table-content-fixed .table-of-header").click(function(){
				$(".table-content-fixed").toggleClass('active');
			})
			if($('#table-content-container').length > 0){
				var ofsettop_ = $("#table-content-container").offset().top + 50;
				$(window).scroll(function(){
					if($(window).scrollTop() > ofsettop_){
						$(".table-content-fixed").addClass('show');
					}else{
						$(".table-content-fixed").removeClass('show');
					}
				});
			}
		})
	}
}

HRT.LdpKids01 = {
	currentPag: Array(nCount).fill(1),
	totalPag : [],
	init: function() {
		this.ajaxCollectionFlashSale();
		this.countdownFlashSale();
		this.copyCodeFlashSale();
		this.popoverCoupon();
	},	
	scrollCenterFlashSale: function(parent, elem, speed){
		var active = jQuery(parent).find(elem); 			
		var activeWidth = active.width() / 2; 
		var pos = jQuery(parent).find(elem).position().left + activeWidth; 
		var elpos = jQuery(parent).scrollLeft(); 
		var elW = jQuery(parent).width(); 		
		pos = pos + elpos - elW / 2; 
		jQuery(parent).animate({
			scrollLeft: pos
		}, speed == undefined ? 1000 : speed);
		return this;
	},
	ajaxCollectionFlashSale: function() {	
		var total_page = 0;//Tá»•ng trang
		var isloading = false;
		var html_loadmore = '<a class="btn-loadmore" href="javascript:void(0);">Xem thĂªm sáº£n pháº©m</a>';

		$('.ldpage-kids01-collection').each(function(){
			var currentHandle = $(this).find('li.active a').attr('data-handle');
			var sectionCurrent = $(this);

			$(this).find('.collection-navtabs-title li a[data-toggle="tab"]').on('shown.bs.tab', function(event){
				var handle = $(this).attr('data-handle');
				var indexTab = Number($(this).attr('href').replace('#collection-tabs-',''));
				//sectionCurrent.find(".collection-navtabs-title li a[data-handle!='" + handle + "']").parent().removeClass("active");
				//sectionCurrent.find(".collection-navtabs-title li a[data-handle='" + handle + "']").parent().addClass("active");
				if(jQuery(window).width() < 768){			
					var $parentScroll = sectionCurrent.find(".collection-navtabs-title");
					HRT.LdpKids01.scrollCenterFlashSale($parentScroll,".active", 500);
				}
				sectionCurrent.find(".tab-pane.active .icon-loading.tab-index").show();
				if(sectionCurrent.find('.tab-pane.active .collection-listprod .product-loop-ldpage').length == 0){
					if(handle == '' ){
						jQuery.ajax({
							url: '/collections/all?view=ldp-kids01-noproduct',
							success:function(data){
								sectionCurrent.find(".tab-pane.active .icon-loading.tab-index").hide();
								setTimeout(function(){								
									sectionCurrent.find(".tab-pane.active .collection-loadmore").html('');
									sectionCurrent.find(".tab-pane.active").attr('data-get', 'true').find('.collection-listprod').html(data);	
									setTimeout(function(){ jQuery(window).resize();	}, 400);
								}, 200);
							}
						});
						HRT.LdpKids01.totalPag[indexTab - 1] = null;
						HRT.LdpKids01.currentPag[indexTab - 1] = null;
					}
					else{
						currentHandle = handle;	
						if(HRT.LdpKids01.totalPag[indexTab - 1] == null){
							var cur_page = 1;
							HRT.LdpKids01.currentPag[indexTab - 1] = 1;
							sectionCurrent.find('.tabslist-product-content .tab-pane.active .collection-loadmore').html(html_loadmore);
							jQuery.ajax({
								// láº¥y tá»•ng sá»‘ trang cá»§a káº¿t quáº£ filter
								url:  currentHandle + '?view=ldp-kids01-pagesize',	
								async: false,
								success:function(data){
									HRT.LdpKids01.totalPag[indexTab - 1] = parseInt(data);
									total_page = HRT.LdpKids01.totalPag[indexTab - 1];
								}
							});

							jQuery.ajax({
								url: currentHandle + '?view=ldp-kids01-data&page=1',					
								success:function(data){
									sectionCurrent.find('.icon-loading.tab-index').hide();		
									setTimeout(function(){
										sectionCurrent.find('.tabslist-product-content .tab-pane.active').attr('data-get', 'true').find('.collection-listprod').html(data);				
										if( total_page > 1){
											if(cur_page == total_page){
												sectionCurrent.find('.tab-pane.active .collection-loadmore').html('');
											} else {
												sectionCurrent.find('.tab-pane.active .collection-loadmore').html(html_loadmore);
											}
										}
										else {
											sectionCurrent.find('.tab-pane.active .collection-loadmore').html('');
										}
										setTimeout(function(){ jQuery(window).resize();	}, 400);
									}, 200);
								}
							});	
						}
					}
				}
			});
		});

		$(document).on('click', '.collection-loadmore .btn-loadmore', function(event){ 
			event.preventDefault();
			var btn = $(this);
			var idTab = $(this).parents('.tab-pane').attr('id');
			var indexTab = Number($(this).parents('.tab-pane').attr('id').replace('collection-tabs-','')) - 1;
			var cur_page = HRT.LdpKids01.currentPag[indexTab];
			currentHandle = $('.collection-navtabs-title a[href="#'+idTab+'"]').attr('data-handle');
			if(HRT.LdpKids01.totalPag[indexTab] == null || HRT.LdpKids01.totalPag.length == 0 ){
				jQuery.ajax({
					// láº¥y tá»•ng sá»‘ trang cá»§a káº¿t quáº£ filter
					url:  currentHandle + '?view=ldp-kids01-pagesize',	
					async: false,
					success:function(data){
						HRT.LdpKids01.totalPag[indexTab] = parseInt(data);
						total_page = HRT.LdpKids01.totalPag[indexTab];
					}
				});
			}
			else{
				total_page = HRT.LdpKids01.totalPag[indexTab];
			}
			cur_page++;	
			HRT.LdpKids01.currentPag[indexTab] = cur_page;

			if(!isloading && cur_page <= total_page){
				$(this).parents('.collection-loadmore').html('<a class="btn-loadmore btn-loading" href="javascript:void(0);">Xem thĂªm sáº£n pháº©m...</a>');
				isloading = true;			
				jQuery.ajax({
					url: currentHandle + '?view=ldp-kids01-data&page=' + cur_page,
					success:function(data){
						setTimeout(function(){ 
							$('#'+idTab).find(".collection-listprod").append(data);
							isloading = false;		
							if( total_page > 0){
								if(cur_page == total_page){
									$('#'+idTab).find('.collection-loadmore').html('');
								} else {
									$('#'+idTab).find('.collection-loadmore').html(html_loadmore);
								}
							}
							else {
								$('#'+idTab).find('.collection-loadmore').html('');
							}
						}, 500);
					}
				})
			}
			else {
				isloading = false;
				$('#'+idTab).find('.collection-loadmore').html('');
			}
		})
	},
	countdownFlashSale: function() {
		if($('.flip-js-countdown').length > 0){
			var element = document.getElementById('soon-espa');
			var time_start = $('.flip-js-countdown .auto-due').attr('data-start');
			var time_end = $('.flip-js-countdown .auto-due').attr('data-end');
			var beforeRun = new Date(time_start);	beforeRun = beforeRun.getTime();
			var afterRun = new Date(time_end);	afterRun = afterRun.getTime();
			var now = new Date();	now = now.getTime();
			function tick(milliseconds, beforeRun) {
				if (milliseconds == 0) {
					$('#label-due').html('Æ¯u Ä‘Ă£i káº¿t thĂºc').removeClass('hidden');
				} else {
					$('#label-due').html('Sáº¯p diá»…n ra:').removeClass('hidden');
				}
			}
			function tick2(milliseconds, afterRun) {
				if (milliseconds == 0) {
					$('#label-due').html('Æ¯u Ä‘Ă£i káº¿t thĂºc').removeClass('hidden');
				} else {
					$('#label-due').html('Káº¿t thĂºc sau:').removeClass('hidden');
				}
			}
			function complete() {
				var today = new Date();
				var cdate = today.getTime();
				if (cdate < afterRun) {
					Soon.destroy(element);
					Soon.create(element, {
						due: time_end,
						now: null,
						layout: "group label-small",
						face: "flip color-light",
						format: "d,h,m,s",
						labelsYears: null,
						labelsDays: 'NgĂ y',
						labelsHours: 'Giá»',
						labelsMinutes: 'PhĂºt',
						labelsSeconds: 'GiĂ¢y',
						separateChars: false,
						scaleMax: "l",
						separator: "",
						singular: true,
						paddingDays: "00",
						eventTick: tick2,
						eventComplete: function() {
							//$('.tabslist-product-countdown').hide();
						}
					});
				}
			}
			/*if(now < afterRun){}*/
			Soon.create(element, {
				due: time_start,
				now: null,
				layout: "group label-small",
				face: "flip color-light",
				format: "d,h,m,s",
				labelsYears: null,
				labelsDays: 'NgĂ y',
				labelsHours: 'Giá»',
				labelsMinutes: 'PhĂºt',
				labelsSeconds: 'GiĂ¢y',
				separateChars: false,
				scaleMax: "l",
				separator: "",
				paddingDays: "00",
				singular: true,
				eventTick: tick,
				eventComplete: complete
			});
		}
	},
	popoverCoupon: function(){
		var popover = '.cpi-tooltip .cpi-tooltip__dot[data-toggle="popover"]';

		$(popover).popover({
			html: true,
			animation: true,
			placement: function ( popover, trigger ){
				var placement = jQuery(trigger).attr('data-placement');
				var dataClass = jQuery(trigger).attr('data-class');
				jQuery(trigger).addClass('is-active');
				jQuery(popover).addClass(dataClass);
				if (jQuery(trigger).offset().top - $(window).scrollTop() > 280) {
					return "top";
				}
				return placement;
			}, 
			content: function() {
				var elementId  = $(this).attr("data-popover-content");
				return $(elementId).html();
			},
			delay: {show: 100, hide: 50}
		});
		$(popover).popover().on("hide.bs.popover", function(){
			$(".modal-coupon--backdrop").removeClass("js-modal-show");
		});
		$(popover).popover().on("show.bs.popover", function(){
			$(".modal-coupon--backdrop").addClass("js-modal-show");
		});
		$('body').on('hidden.bs.popover', function(e) {
			$(e.target).data('bs.popover').inState = {
				click: false,
				hover: false,
				focus: false
			};
		});
		$(document).on('click', '.popover-content__coupon .btn-popover-close,.modal-coupon--backdrop', function(e){ 		
			$(popover).popover('hide');
		});

		function eventPopover(){
			if($(window).width() >= 768){	
				$(popover).on('mouseenter', function () {
					var self = this;
					jQuery(this).popover("show");
					jQuery(".popover.coupon-popover").on('mouseleave', function () {
						jQuery(self).popover('hide');
					});
				}).on('mouseleave', function () {
					var self = this;
					setTimeout(function () {
						if (!jQuery('.popover.coupon-popover:hover').length) {
							jQuery(self).popover('hide');
						}
					},300);
				});
			}
			else{
				$(popover).off('mouseenter mouseleave');	
			}				
		};
		eventPopover();	$(window).resize(function() {	eventPopover();	});

	},
	copyCodeFlashSale: function(){
		$(document).on('click', '.coupon-item .cpi-button', function(e){ 
			e.preventDefault();	
			$('.coupon-item .cpi-button').html('Sao chĂ©p mĂ£').removeClass('disabled');
			var copyText = $(this).attr('data-coupon');
			var el = document.createElement('textarea');	
			el.value = copyText ;
			el.setAttribute('readonly', '');
			el.style.position = 'absolute';
			el.style.left = '-9999px';
			document.body.appendChild(el);		
			el.select();
			document.execCommand('copy');
			document.body.removeChild(el);
			$(this).html('Đã sao chép').addClass('disabled');
		});
		$(document).on('click', '.popover-content__coupon .btn-popover-code', function(e){ 
			e.preventDefault();	
			var btnPopover= $(this).attr('data-coupon');
			$(".coupon-item .cpi-button[data-coupon="+btnPopover+"]").click();		
            $(this).html('Đã sao chép').addClass('disabled');
		});
	},
}

jQuery(document).ready(function() {
	HRT.init();
});
