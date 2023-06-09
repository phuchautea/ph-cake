! function (a, b) {
    if (a) {
        var c = function () {
            b(a.lazySizes), a.removeEventListener("lazyunveilread", c, !0)
        };
        b = b.bind(null, a, a.document), "object" == typeof module && module.exports ? b(require("lazysizes")) : a.lazySizes ? c() : a.addEventListener("lazyunveilread", c, !0)
    }
}("undefined" != typeof window ? window : 0, function (a, b, c) {
    "use strict";
    var d = [].slice,
        e = /blur-up["']*\s*:\s*["']*(always|auto)/,
        f = /image\/(jpeg|png|gif|svg\+xml)/,
        g = function (b) {
            var d = b.getAttribute("data-media") || b.getAttribute("media"),
                e = b.getAttribute("type");
            return (!e || f.test(e)) && (!d || a.matchMedia(c.cfg.customMedia[d] || d).matches)
        },
        h = function (a, b) {
            var c;
            return (a ? d.call(a.querySelectorAll("source, img")) : [b]).forEach(function (a) {
                if (!c) {
                    var b = a.getAttribute("data-lowsrc");
                    b && g(a) && (c = b)
                }
            }), c
        },
        i = function (a, d, e, f) {
            var g, h = !1,
                i = !1,
                j = "always" == f ? 0 : Date.now(),
                k = 0,
                l = (a || d).parentNode,
                m = function () {
                    if (e) {
                        var j = function (a) {
                            h = !0, g || (g = a.target), c.rAF(function () {
                                c.rC(d, "ls-blur-up-is-loading"), g && c.aC(g, "ls-blur-up-loaded")
                            }), g && (g.removeEventListener("load", j), g.removeEventListener("error", j))
                        };
                        g = b.createElement("img"), g.addEventListener("load", j), g.addEventListener("error", j), g.className = "ls-blur-up-img", g.src = e, g.alt = "", g.setAttribute("aria-hidden", "true"), l.insertBefore(g, (a || d).nextSibling), "always" != f && (g.style.visibility = "hidden", c.rAF(function () {
                            g && setTimeout(function () {
                                g && c.rAF(function () {
                                    !i && g && (g.style.visibility = "")
                                })
                            }, c.cfg.blurupCacheDelay || 33)
                        }))
                    }
                },
                n = function () {
                    g && c.rAF(function () {
                        c.rC(d, "ls-blur-up-is-loading");
                        try {
                            g.parentNode.removeChild(g)
                        } catch (a) { }
                        g = null
                    })
                },
                o = function (a) {
                    k++, i = a || i, a ? n() : k > 1 && setTimeout(n, 5e3)
                },
                p = function () {
                    d.removeEventListener("load", p), d.removeEventListener("error", p), g && c.rAF(function () {
                        g && c.aC(g, "ls-original-loaded")
                    }), "always" != f && (!h || Date.now() - j < 66) ? o(!0) : o()
                };
            m(), d.addEventListener("load", p), d.addEventListener("error", p), c.aC(d, "ls-blur-up-is-loading");
            var q = function (a) {
                l == a.target && (c.aC(g || d, "ls-inview"), o(), l.removeEventListener("lazybeforeunveil", q))
            };
            l.getAttribute("data-expand") || l.setAttribute("data-expand", -1), l.addEventListener("lazybeforeunveil", q), c.aC(l, c.cfg.lazyClass)
        };
    a.addEventListener("lazybeforeunveil", function (a) {
        var b = a.detail;
        if (b.instance == c && b.blurUp) {
            var d = a.target,
                e = d.parentNode;
            "PICTURE" != e.nodeName && (e = null), i(e, d, h(e, d) || "data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==", b.blurUp)
        }
    }), a.addEventListener("lazyunveilread", function (a) {
        var b = a.detail;
        if (b.instance == c) {
            var d = a.target,
                f = (getComputedStyle(d, null) || {
                    fontFamily: ""
                }).fontFamily.match(e);
            (f || d.getAttribute("data-lowsrc")) && (b.blurUp = f && f[1] || c.cfg.blurupMode || "always")
        }
    })
});