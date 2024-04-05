var fusionNavMegamenuPosition = function (e) {
    var n = jQuery(e), o = n.closest("nav"), u = o.hasClass("awb-menu_column") ? "column" : "row";
    o.hasClass("awb-menu_flyout") || (o.hasClass("collapse-enabled") ? n.find(".fusion-megamenu-wrapper").each(function (e, n) {
        jQuery(n).css("left", 0)
    }) : n.find(".fusion-megamenu-wrapper") && n.closest(".awb-menu").length && (n.find(".fusion-megamenu-wrapper").each(function (e, n) {
        var s, a, i, t, f, r, l, m, d = jQuery(n), w = d.closest("li.fusion-megamenu-menu"), c = d.find(".fusion-megamenu-holder"),
            h = d.closest(".fusion-row"), g = jQuery("body").hasClass("rtl");
        "row" === u ? d.hasClass("fusion-megamenu-fullwidth") ? (g && d.css("right", "auto"), window.avadaScrollBarWidth = window.avadaGetScrollBarWidth(), window.avadaScrollBarWidth && d.css("width", "calc(" + c.width() + " - " + window.avadaGetScrollBarWidth() + "px)"), d.offset({left: (jQuery(window).width() - d.outerWidth()) / 2})) : h.length && (f = h.width(), m = (l = void 0 !== (r = h.offset()) ? r.left : 0) + f, s = w.offset(), t = d.outerWidth(), a = s.left + w.outerWidth(), i = 0, !g && s.left + t > m ? (i = t === jQuery(window).width() ? -1 * s.left : t > f ? l - s.left + (f - t) / 2 : -1 * (s.left - (m - t)), d.css("left", i)) : g && a - t < l && (i = t === jQuery(window).width() ? a - t : t > f ? a - m + (f - t) / 2 : -1 * (t - (a - l)), d.css("right", i))) : (d.css("top", 0), d.css(o.hasClass("expand-left") ? "right" : "left", "100%"))
    }), setTimeout(function () {
        o.removeClass("mega-menu-loaded")
    }, 50)))
}, fusionMegaMenuNavRunAll = function () {
    var e = jQuery(".awb-menu_em-hover.awb-menu_desktop:not( .awb-menu_flyout ) .fusion-megamenu-menu");
    e.each(function () {
        fusionNavSubmenuDirection(this)
    }), e.on("mouseenter focusin", function () {
        fusionNavMegamenuPosition(this)
    }), jQuery(window).trigger("fusion-position-menus")
}, fusionMegaMenuLoad = function () {
    jQuery(this).removeClass("mega-menu-loading").addClass("mega-menu-loaded").off("mouseenter focusin", fusionMegaMenuLoad), fusionMegaMenuNavRunAll()
};
jQuery(".awb-menu").on("mouseenter focusin", fusionMegaMenuLoad), jQuery(window).on("fusion-element-render-fusion_menu", function () {
    jQuery(".awb-menu").on("mouseenter focusin", fusionMegaMenuLoad)
}), jQuery(window).on("fusion-resize-horizontal fusion-position-menus", function () {
    jQuery(".awb-menu .fusion-megamenu-wrapper").each(function (e, n) {
        fusionNavMegamenuPosition(jQuery(n).parent())
    })
});