window.debounce = function (func, wait, immediate) {
    var timeout;
    return function () {
        var context = this,
            args = arguments;
        var later = function () {
            timeout = null;
            if (!immediate) func.apply(context, args)
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args)
    }
};
window.blockStickyHeader = !1;
(function (a) {
    window.CUBER = {
        Nav: {
            $siteHeader: null,
            $siteNav: null,
            $siteOverlay: null,
            mount: function () {
                this.$siteHeader = a("#site-header");
                this.$siteNav = a("#site-nav--mobile");
                this.$siteOverlay = a("#site-overlay");
                a("#site-menu-handle").on("click focusin", function () {
                    this.$siteNav.hasClass("active") || (this.$siteNav.addClass("active"), this.$siteNav.removeClass("show-filters").removeClass("show-cart").removeClass("show-search"), this.$siteOverlay.addClass("active"), a(".main-body").addClass("sidebar-move"))
                }.bind(this));
                a("#site-cart-handle a").on("click", function (b) {
                    b.preventDefault();
                    getCartModal();
                    this.$siteNav.hasClass("active") || (this.$siteNav.addClass("active"), this.$siteNav.removeClass("show-filters").removeClass("show-search").addClass("show-cart"), this.$siteOverlay.addClass("active"), a(".main-body").addClass("sidebar-move"))
                }.bind(this));
                a("#site-search-handle a").on("click", function (b) {
                    b.preventDefault();
                    this.$siteNav.hasClass("active") || (this.$siteNav.addClass("active"), this.$siteNav.removeClass("show-filters").removeClass("show-cart").addClass("show-search"), this.$siteOverlay.addClass("active"), a(".main-body").addClass("sidebar-move"))
                }.bind(this));
                if (0 < a("#site-filter-handle").length) a("#site-filter-handle").on("click", function () {
                    this.$siteNav.hasClass("active") || (this.$siteNav.addClass("active"), this.$siteNav.removeClass("show-cart").removeClass("show-search").addClass("show-filters"), this.$siteOverlay.addClass("active"), a(".main-body").addClass("sidebar-move"))
                }.bind(this));
                a(".site-close-handle, #site-overlay").on("click", function () {
                    this.$siteNav.hasClass("active") && (this.$siteNav.removeClass("active"), this.$siteOverlay.removeClass("active"), a(".main-body").removeClass("sidebar-move"))
                }.bind(this))
            },
            unmount: function () {
                a("#site-menu-handle").off("click");
                a("#site-cart-handle a").off("click");
                a("#site-filter-handle").off("click");
                this.$siteNav.removeClass("active");
                this.$siteOverlay.removeClass("active");
                a(".main-body").removeClass("sidebar-move")
            }
        },
        Product: {
            $productGallery: null,
            $productGalleryButton: null,
            $productGalleryItem: null,
            $productGalleryIndex: null,
            $productCarousel: null,
            $productCarouselImgs: null,
            mount: function (b) {
                var c = {};
                b.data("po", c);
                c.$productGallery = b.find(".box__product-gallery");
                c.$productGalleryButton = b.find(".box__product-gallery .product-image__button");
                c.$productGalleryItem = b.find(".box__product-gallery .gallery-item");
                c.$productGalleryButton.append('<div class="gallery-index icon-pr-fix"><span class="current">' + (void 0 != window.CuberProductImageIndex ? window.CuberProductImageIndex + 1 : 1) + '</span> / <span class="total">' + c.$productGalleryItem.length + "</span></div>");
                c.$productGalleryIndex = c.$productGallery.find(".gallery-index .current");
                c.$productCarousel = c.$productGallery.children(".site-box-content");
                c.$productGallery.hasClass("scroll") && a(window).on("scroll.product-gallery", function () {
                    c.$productCarousel.hasClass("flickity-enabled") || c.$productGalleryItem.each(function (b, d) {
                        a(window).scrollTop() + a(window).height() > a(d).offset().top + a(window).height() / 2 && !a(d).hasClass("current") ? (a(d).addClass("current"), c.$productGalleryIndex.html(a(d).index() + 1), $('.product-gallery__thumb').removeClass('active'), $('.product-gallery__thumb img[data-image="' + a(d).find('img').attr('src') + '"]').parents('.product-gallery__thumb').addClass('active')) : a(window).scrollTop() + a(window).height() < a(d).offset().top + a(window).height() / 2 && a(d).hasClass("current") && (a(d).removeClass("current"), c.$productGalleryIndex.html(a(d).index()), $('.product-gallery__thumb').removeClass('active'), $('.product-gallery__thumb img[data-image="' + a(d).find('img').attr('src') + '"]').parents('.product-gallery__thumb').prev().addClass('active'))
                    }.bind(c))
                }.bind(c)).trigger("scroll.product-gallery");
                window.CUBER.Main._mountScrollMovers({
                    parent: c.$productGallery,
                    items: a(".gallery-index, .product-sharing, .product-zoom")
                });
                c.$productCarousel.flickity({
                    cellSelector: ".gallery-item",
                    adaptiveHeight: true,
                    wrapAround: true,
                    initialIndex: void 0 != window.CuberProductImageIndex ? window.CuberProductImageIndex : 0,
                    prevNextButtons: !1,
                    pageDots: !0,
                    watchCSS: c.$productGallery.hasClass("scroll") ? !0 : !1,
                    resize: !1
                })
            },
            unmount: function (b) {
                b = b.data("po");
                a(window).off("scroll.product-gallery");
                b.$productCarousel.off("scroll.flickity")
            }
        },
        Main: {
            _mountScrollMovers: function (b) {
                var c = b.parent,
                    d = !1;
                if (a('.out-with-you').length > 0) {
                    setTimeout(function () {
                        b.items.removeClass("out-with-you")
                    }, 1E3);
                    b.items.addClass("icon-pr-fix");
                    a(window).on("scroll.scroll-movers", function () {
                        !d && a(window).scrollTop() + a(window).height() > c.offset().top + c.height() ? (b.items.addClass("out-with-you"), d = !0) : d && a(window).scrollTop() + a(window).height() <= c.offset().top + c.height() && (d = !1, b.items.removeClass("out-with-you"))
                    }.bind(this))
                }
            },
        },
        SplitSlider: {
            _mountFlickity: function () {
                a(".responsive-flickity").flickity({
                    cellSelector: ".slideshow-item",
                    wrapAround: !0,
                    prevNextButtons: !1,
                    pageDots: !1,
                    watchCSS: !0,
                    resize: !0
                });
                var b = a(".box__slideshow-split"),
                    c = a(".responsive-flickity").data("flickity");
                b.find(".slideshow-item");
                0 >= b.find(".slider-meta").length && (b.find(".slider-meta").remove(), b.append('<div class="slider-meta hide lap--show"><div class="slider-index"><span class="current">1</span> / <span class="total">' + sliderT + '</span></div><div class="slider-nav"><span class="go-prev">' + a.themeAssets.arrowRight + '</span><span class="go-next">' + a.themeAssets.arrowRight + "</span></div>"), b.find(".go-prev").on("click", function () {
                    c.previous()
                }.bind(this)), b.find(".go-next").on("click", function () {
                    c.next()
                }.bind(this)), a(".responsive-flickity").on("select.flickity", function () {
                    b.find(".slider-index .current").html(c.selectedIndex + 1)
                }), setTimeout(function () {
                    b.find(".slider-meta").addClass("active")
                }, 1E3))
            },
            mount: function (b) {
                var c = a(".box__slideshow-split"),
                    d = c.find(".slideshow-item"),
                    e = c.find(".site-box-background-container").children("div"),
                    f = [];
                currentScroll = a(window).scrollTop();
                sliderI = Math.min(Math.ceil(currentScroll / a(window).height()), d.length - 1);
                sliderJ = sliderI - 1;
                sliderT = d.length;
                b && this._mountFlickity();
                a(".responsive-flickity").hasClass("flickity-enabled") ? (c.height(a(window).height() - a("#site-header").outerHeight()), c.addClass("remove-min-height")) : (c.css("height", "auto"), c.removeClass("remove-min-height"));
                e.each(function (c) {
                    0 < c ? c < sliderI ? a(this).css("clip", "rect(0 " + Math.ceil(a(window).width() / 2) + "px " + a(window).height() + "px 0)") : c == sliderI ? a(this).css("clip", "rect(0 " + Math.ceil(a(window).width() / 2) + "px " + Math.ceil(a(window).scrollTop() - a(window).height() * sliderJ) + "px 0)") : a(this).css("clip", "rect(0 " + Math.ceil(a(window).width() / 2) + "px 0 0)") : 0 == c & b && (a(this).css({
                        clip: "rect(0 " + Math.ceil(a(window).width() / 2) + "px 0 0)",
                        opacity: 0
                    }), a(this).addClass("clip-transition"), setTimeout(function () {
                        a(this).css({
                            clip: "rect(0 " + Math.ceil(a(window).width() / 2) + "px " + a(window).height() + "px 0)",
                            opacity: 1
                        })
                    }.bind(this), 10), setTimeout(function () {
                        a(this).removeClass("clip-transition")
                    }.bind(this), 650));
                    a(this).addClass("active");
                    0 >= a(this).find(".site-box-black-overlay").length && a(this).append('<span class="site-box-black-overlay"/>');
                    f.push(a(this).find(".site-box-black-overlay"))
                });
                a(window).on("scroll.split-slider", function (b) {
                    if (currentScroll < a(window).scrollTop()) 0 < d.eq(sliderI + 1).length && a(window).scrollTop() + a(window).height() >= d.eq(sliderI + 1).offset().top ? (0 != sliderI && (e.eq(sliderI).css("clip", "rect(0 " + Math.ceil(a(window).width() / 2) + "px " + a(window).height() + "px 0)"), f[sliderJ] && f[sliderJ].css("opacity", .5)), sliderJ = sliderI, sliderI++, down = !0) : a(window).scrollTop() + a(window).height() >= c.height() && !c.hasClass("back-to-normal") && (c.addClass("back-to-normal"), e.eq(sliderI).css("clip", "rect(0 " + Math.ceil(a(window).width() / 2) + "px " + a(window).height() + "px 0)"));
                    else if (0 < d.eq(sliderI).length && 0 < d.eq(sliderI - 1).length && a(window).scrollTop() + a(window).height() < d.eq(sliderI).offset().top) {
                        var g = e.eq(sliderI).hasClass("obs") ? 1 : 0;
                        e.eq(sliderI).css("clip", "rect(0 " + Math.ceil(a(window).width() / 2) + "px " + g + "px 0)");
                        f[sliderJ] && f[sliderJ].css("opacity", 0);
                        sliderI--;
                        sliderJ = sliderI - 1;
                        down = !1
                    } else a(window).scrollTop() + a(window).height() <= c.height() && c.hasClass("back-to-normal") && c.removeClass("back-to-normal");
                    c.hasClass("back-to-normal") || (b = Math.ceil(a(window).scrollTop() - a(window).height() * sliderJ), g = e.eq(sliderI).hasClass("obs") ? 1 : 0, e.eq(sliderI).css("clip", "rect(0 " + Math.ceil(a(window).width() / 2) + "px " + Math.max(g, b) + "px 0)"), f[sliderJ] && f[sliderJ].css("opacity", Math.ceil(50 * b / a(window).height()) / 100), g = Math.round(a(window).height() / 6), d.eq(sliderJ).find(".caption").css("transform", "translateY(" + (0 - Math.ceil(1 * b * g / a(window).height())) + "px)"), d.eq(sliderJ).find(".title").css("transform", "translateY(" + (0 - Math.ceil(.75 * b * g / a(window).height())) + "px)"), d.eq(sliderJ).find(".subtitle").css("transform", "translateY(" + (0 - Math.ceil(.5 * b * g / a(window).height())) + "px)"), d.eq(sliderJ).find(".button").css("transform", "translateY(" + (0 - Math.ceil(.25 * b * g / a(window).height())) + "px)"), d.eq(sliderI).find(".caption").css("transform", "translateY(" + (Math.ceil(1 * b * g / a(window).height()) - 1 * g) + "px)"), d.eq(sliderI).find(".title").css("transform", "translateY(" + (Math.ceil(.75 * b * g / a(window).height()) - .75 * g) + "px)"), d.eq(sliderI).find(".subtitle").css("transform", "translateY(" + (Math.ceil(.5 * b * g / a(window).height()) - .5 * g) + "px)"), d.eq(sliderI).find(".button").css("transform", "translateY(" + (Math.ceil(.25 * b * g / a(window).height()) - .25 * g) + "px)"));
                    currentScroll = a(window).scrollTop()
                }).trigger("scroll.split-slider");
                a(window).on("resize.split-slider", window.debounce(function () {
                    this.unmount();
                    this.mount(!1)
                }.bind(this), 250))
            },
            unmount: function () {
                a(window).off("scroll.split-slider")
            }
        }
    };
    a(document).on("ready", function () {
        window.CUBER.Nav.mount();
        0 < a(".productDetail-page").length && a(".productDetail-page").each(function () {
            window.CUBER.Product.mount(a(this))
        });
        0 < a(".box__slideshow-split").length && window.CUBER.SplitSlider.mount(!0);
        a(window).on("resize", function () {
            a(window).width()
        })
    })
})(jQuery);
(function () {
    var touchingCarousel = false,
        touchStartCoords;
    document.body.addEventListener('touchstart', function (e) {
        if (e.target.closest('.flickity-slider')) {
            touchingCarousel = true;
        } else {
            touchingCarousel = false;
            return;
        }
        touchStartCoords = {
            x: e.touches[0].pageX,
            y: e.touches[0].pageY
        }
    });
    document.body.addEventListener('touchmove', function (e) {
        if (!(touchingCarousel && e.cancelable)) {
            return;
        }
        var moveVector = {
            x: e.touches[0].pageX - touchStartCoords.x,
            y: e.touches[0].pageY - touchStartCoords.y
        };
        if (Math.abs(moveVector.x) > 7) e.preventDefault()
    }, {
        passive: false
    });
})();