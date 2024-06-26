<?php

session_start();
session_unset();
session_destroy();
///////// URLS AMIGABLES
include 'api.php';
$respAPI = getAPI();
$ssl   = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on';
$proto = strtolower($_SERVER['SERVER_PROTOCOL']);
$proto = substr($proto, 0, strpos($proto, '/')) . ($ssl ? 's' : '');
$host = $_SERVER["HTTP_HOST"];
$url = $_SERVER["REQUEST_URI"];

$urlweb = $proto . '://' . $host . $url;
$url1 = "https://odm.com.mx/index.php";
$url2 = "http://odm.com.mx/index.php";
$url3 = "http://www.odm.com.mx/index.php";
$url4 = "https://www.odm.com.mx/index.php";

$url5 = "https://odm.com.mx/index";
$url6 = "http://odm.com.mx/index";
$url7 = "http://www.odm.com.mx/index";
$url8 = "https://www.odm.com.mx/index";
// echo $proto.'://'.$host . $url;
if ($url1 == $urlweb || $url2 == $urlweb || $url3 == $urlweb || $url4 == $urlweb || $url5 == $urlweb || $url6 == $urlweb || $url7 == $urlweb || $url8 == $urlweb) {
    # code...
    header("Location: https://odm.com.mx/");
}
//////////////////////////////////////////////////////////////////////
// if(substr_count($_SERVER["HTTP-ACCEPT-ENCODING"], "gzip")){
// 	ob_start("ob_gzhandler");
// }else{
// 	ob_start();
// 	echo "No tienes permiso GZIP";
// }
error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
date_default_timezone_set('America/Mexico_City');



$dia = date("d");
$mes = date("m");
$year = date("Y");

// echo $fecha1 = $dia."/".$mes."/".$year;

$fechform1 = $year . "-" . $mes . "-" . $dia;
// print_r($hoy);
require('conexion.php');


// CONSULTA ORIGEN  
$query = "SELECT id_p, origen, value FROM Origen ORDER BY id_p";
$resultado = $mysqli->query($query);

// CONSULTA PARA TARJETAS PROMO 

$query2 = "SELECT id_tarj, card_header, origen, destino, oricomp, destcomp, precio, viajeRedondo, ahorro, precioNormal, descripcion, link FROM TarjPromo ";
$resultado2 = $mysqli->query($query2);

?>
<!DOCTYPE html>
<html lang="es-MX">

<head>

    <!-- NIEVE -->
    <!--  
<script type="text/javascript" src="nieve/snowstorm-min.js"></script>
<script>
//snowStorm.snowColor = '#99ccff';   // blue-ish snow!?
snowStorm.flakesMaxActive = 96;    // show more snow on screen at once
snowStorm.useTwinkleEffect = true; // let the snow flicker in and out of view
</script>
-->

    <script type="text/javascript" async>
        setTimeout(function() {
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-56739058-1', 'auto', {
                'allowLinker': true
            });
            ga('require', 'linker');
            ga('linker:autoLink', ['https://venta.odm.com.mx:30700/odm']);
            ga('send', 'pageview');

        }, 500);
    </script>

    <!-- Google Tag Manager -->
    <script>
        setTimeout(function() {
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-TD3ZZ93');
        }, 500);
    </script>

    <meta name="msvalidate.01" content="A68DFB54153C4987F7430A4ECF61D38E" />
    <meta charset="UTF-8">
    <meta name="description" content="Omnibus de México  compra tus boletos de autobús en línea y obten 10% de descuento en viaje sencillo ó 15% en viaje redondo *Aplican restricciones. *" />
    <meta name="keywords" content="Compra tus boletos de autobús, venta de boletos de autobús, boletos de autobús a guadalajara, boletos de autobús a monterrey, boletos de autobús a torreon, boletos de autobús a Aguascalientes, boletos de autobús a ciudad de mexico, boletos de autobús a Durango, boletos de autobús a Guanajuato, boletos de autobús a jalisco, boletos de autobús a Querétaro, boletos de autobús a Tamaulipas, boletos de autobús a Veracruz, boletos de autobús a Zacatecas">
    <meta name="generator" content="2015.1.2.344" />

    <meta property="og:title" content="Omnibus de México | Boletos de Autobús con Descuento" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://odm.com.mx/imagen/portadaODM.jpg" />
    <meta property="og:image:width" content="526" />
    <meta property="og:image:height" content="275" />
    <meta property="og:url" content="https://odm.com.mx/" />
    <meta property="fb:app_id" content="924618924312226" />
    <meta property="og:description" content="Omnibus de México  compra tus boletos de autobús en línea y obten 10% de descuento en viaje sencillo ó 15% en viaje redondo *Aplican restricciones. *" />



    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <script type="text/javascript">
        /*! jQuery v3.4.1 | (c) JS Foundation and other contributors | jquery.org/license */ ! function(e, t) {
            "use strict";
            "object" == typeof module && "object" == typeof module.exports ? module.exports = e.document ? t(e, !0) :
                function(e) {
                    if (!e.document) throw new Error("jQuery requires a window with a document");
                    return t(e)
                } : t(e)
        }("undefined" != typeof window ? window : this, function(C, e) {
            "use strict";
            var t = [],
                E = C.document,
                r = Object.getPrototypeOf,
                s = t.slice,
                g = t.concat,
                u = t.push,
                i = t.indexOf,
                n = {},
                o = n.toString,
                v = n.hasOwnProperty,
                a = v.toString,
                l = a.call(Object),
                y = {},
                m = function(e) {
                    return "function" == typeof e && "number" != typeof e.nodeType
                },
                x = function(e) {
                    return null != e && e === e.window
                },
                c = {
                    type: !0,
                    src: !0,
                    nonce: !0,
                    noModule: !0
                };

            function b(e, t, n) {
                var r, i, o = (n = n || E).createElement("script");
                if (o.text = e, t)
                    for (r in c)(i = t[r] || t.getAttribute && t.getAttribute(r)) && o.setAttribute(r, i);
                n.head.appendChild(o).parentNode.removeChild(o)
            }

            function w(e) {
                return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? n[o.call(e)] || "object" :
                    typeof e
            }
            var f = "3.4.1",
                k = function(e, t) {
                    return new k.fn.init(e, t)
                },
                p = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;

            function d(e) {
                var t = !!e && "length" in e && e.length,
                    n = w(e);
                return !m(e) && !x(e) && ("array" === n || 0 === t || "number" == typeof t && 0 < t && t - 1 in e)
            }
            k.fn = k.prototype = {
                jquery: f,
                constructor: k,
                length: 0,
                toArray: function() {
                    return s.call(this)
                },
                get: function(e) {
                    return null == e ? s.call(this) : e < 0 ? this[e + this.length] : this[e]
                },
                pushStack: function(e) {
                    var t = k.merge(this.constructor(), e);
                    return t.prevObject = this, t
                },
                each: function(e) {
                    return k.each(this, e)
                },
                map: function(n) {
                    return this.pushStack(k.map(this, function(e, t) {
                        return n.call(e, t, e)
                    }))
                },
                slice: function() {
                    return this.pushStack(s.apply(this, arguments))
                },
                first: function() {
                    return this.eq(0)
                },
                last: function() {
                    return this.eq(-1)
                },
                eq: function(e) {
                    var t = this.length,
                        n = +e + (e < 0 ? t : 0);
                    return this.pushStack(0 <= n && n < t ? [this[n]] : [])
                },
                end: function() {
                    return this.prevObject || this.constructor()
                },
                push: u,
                sort: t.sort,
                splice: t.splice
            }, k.extend = k.fn.extend = function() {
                var e, t, n, r, i, o, a = arguments[0] || {},
                    s = 1,
                    u = arguments.length,
                    l = !1;
                for ("boolean" == typeof a && (l = a, a = arguments[s] || {}, s++), "object" == typeof a || m(a) ||
                    (a = {}), s === u && (a = this, s--); s < u; s++)
                    if (null != (e = arguments[s]))
                        for (t in e) r = e[t], "__proto__" !== t && a !== r && (l && r && (k.isPlainObject(r) || (
                                i = Array.isArray(r))) ? (n = a[t], o = i && !Array.isArray(n) ? [] : i || k
                                .isPlainObject(n) ? n : {}, i = !1, a[t] = k.extend(l, o, r)) : void 0 !== r &&
                            (a[t] = r));
                return a
            }, k.extend({
                expando: "jQuery" + (f + Math.random()).replace(/\D/g, ""),
                isReady: !0,
                error: function(e) {
                    throw new Error(e)
                },
                noop: function() {},
                isPlainObject: function(e) {
                    var t, n;
                    return !(!e || "[object Object]" !== o.call(e)) && (!(t = r(e)) || "function" == typeof(
                        n = v.call(t, "constructor") && t.constructor) && a.call(n) === l)
                },
                isEmptyObject: function(e) {
                    var t;
                    for (t in e) return !1;
                    return !0
                },
                globalEval: function(e, t) {
                    b(e, {
                        nonce: t && t.nonce
                    })
                },
                each: function(e, t) {
                    var n, r = 0;
                    if (d(e)) {
                        for (n = e.length; r < n; r++)
                            if (!1 === t.call(e[r], r, e[r])) break
                    } else
                        for (r in e)
                            if (!1 === t.call(e[r], r, e[r])) break;
                    return e
                },
                trim: function(e) {
                    return null == e ? "" : (e + "").replace(p, "")
                },
                makeArray: function(e, t) {
                    var n = t || [];
                    return null != e && (d(Object(e)) ? k.merge(n, "string" == typeof e ? [e] : e) : u.call(
                        n, e)), n
                },
                inArray: function(e, t, n) {
                    return null == t ? -1 : i.call(t, e, n)
                },
                merge: function(e, t) {
                    for (var n = +t.length, r = 0, i = e.length; r < n; r++) e[i++] = t[r];
                    return e.length = i, e
                },
                grep: function(e, t, n) {
                    for (var r = [], i = 0, o = e.length, a = !n; i < o; i++) !t(e[i], i) !== a && r.push(e[
                        i]);
                    return r
                },
                map: function(e, t, n) {
                    var r, i, o = 0,
                        a = [];
                    if (d(e))
                        for (r = e.length; o < r; o++) null != (i = t(e[o], o, n)) && a.push(i);
                    else
                        for (o in e) null != (i = t(e[o], o, n)) && a.push(i);
                    return g.apply([], a)
                },
                guid: 1,
                support: y
            }), "function" == typeof Symbol && (k.fn[Symbol.iterator] = t[Symbol.iterator]), k.each(
                "Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "),
                function(e, t) {
                    n["[object " + t + "]"] = t.toLowerCase()
                });
            var h = function(n) {
                var e, d, b, o, i, h, f, g, w, u, l, T, C, a, E, v, s, c, y, k = "sizzle" + 1 * new Date,
                    m = n.document,
                    S = 0,
                    r = 0,
                    p = ue(),
                    x = ue(),
                    N = ue(),
                    A = ue(),
                    D = function(e, t) {
                        return e === t && (l = !0), 0
                    },
                    j = {}.hasOwnProperty,
                    t = [],
                    q = t.pop,
                    L = t.push,
                    H = t.push,
                    O = t.slice,
                    P = function(e, t) {
                        for (var n = 0, r = e.length; n < r; n++)
                            if (e[n] === t) return n;
                        return -1
                    },
                    R =
                    "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
                    M = "[\\x20\\t\\r\\n\\f]",
                    I = "(?:\\\\.|[\\w-]|[^\0-\\xa0])+",
                    W = "\\[" + M + "*(" + I + ")(?:" + M + "*([*^$|!~]?=)" + M +
                    "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + I + "))|)" + M + "*\\]",
                    $ = ":(" + I +
                    ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + W +
                    ")*)|.*)\\)|)",
                    F = new RegExp(M + "+", "g"),
                    B = new RegExp("^" + M + "+|((?:^|[^\\\\])(?:\\\\.)*)" + M + "+$", "g"),
                    _ = new RegExp("^" + M + "*," + M + "*"),
                    z = new RegExp("^" + M + "*([>+~]|" + M + ")" + M + "*"),
                    U = new RegExp(M + "|>"),
                    X = new RegExp($),
                    V = new RegExp("^" + I + "$"),
                    G = {
                        ID: new RegExp("^#(" + I + ")"),
                        CLASS: new RegExp("^\\.(" + I + ")"),
                        TAG: new RegExp("^(" + I + "|[*])"),
                        ATTR: new RegExp("^" + W),
                        PSEUDO: new RegExp("^" + $),
                        CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + M +
                            "*(even|odd|(([+-]|)(\\d*)n|)" + M + "*(?:([+-]|)" + M + "*(\\d+)|))" + M +
                            "*\\)|)", "i"),
                        bool: new RegExp("^(?:" + R + ")$", "i"),
                        needsContext: new RegExp("^" + M + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + M +
                            "*((?:-\\d)?\\d*)" + M + "*\\)|)(?=[^-]|$)", "i")
                    },
                    Y = /HTML$/i,
                    Q = /^(?:input|select|textarea|button)$/i,
                    J = /^h\d$/i,
                    K = /^[^{]+\{\s*\[native \w/,
                    Z = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
                    ee = /[+~]/,
                    te = new RegExp("\\\\([\\da-f]{1,6}" + M + "?|(" + M + ")|.)", "ig"),
                    ne = function(e, t, n) {
                        var r = "0x" + t - 65536;
                        return r != r || n ? t : r < 0 ? String.fromCharCode(r + 65536) : String.fromCharCode(r >>
                            10 | 55296, 1023 & r | 56320)
                    },
                    re = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,
                    ie = function(e, t) {
                        return t ? "\0" === e ? "\ufffd" : e.slice(0, -1) + "\\" + e.charCodeAt(e.length - 1)
                            .toString(16) + " " : "\\" + e
                    },
                    oe = function() {
                        T()
                    },
                    ae = be(function(e) {
                        return !0 === e.disabled && "fieldset" === e.nodeName.toLowerCase()
                    }, {
                        dir: "parentNode",
                        next: "legend"
                    });
                try {
                    H.apply(t = O.call(m.childNodes), m.childNodes), t[m.childNodes.length].nodeType
                } catch (e) {
                    H = {
                        apply: t.length ? function(e, t) {
                            L.apply(e, O.call(t))
                        } : function(e, t) {
                            var n = e.length,
                                r = 0;
                            while (e[n++] = t[r++]);
                            e.length = n - 1
                        }
                    }
                }

                function se(t, e, n, r) {
                    var i, o, a, s, u, l, c, f = e && e.ownerDocument,
                        p = e ? e.nodeType : 9;
                    if (n = n || [], "string" != typeof t || !t || 1 !== p && 9 !== p && 11 !== p) return n;
                    if (!r && ((e ? e.ownerDocument || e : m) !== C && T(e), e = e || C, E)) {
                        if (11 !== p && (u = Z.exec(t)))
                            if (i = u[1]) {
                                if (9 === p) {
                                    if (!(a = e.getElementById(i))) return n;
                                    if (a.id === i) return n.push(a), n
                                } else if (f && (a = f.getElementById(i)) && y(e, a) && a.id === i) return n.push(
                                    a), n
                            } else {
                                if (u[2]) return H.apply(n, e.getElementsByTagName(t)), n;
                                if ((i = u[3]) && d.getElementsByClassName && e.getElementsByClassName) return H
                                    .apply(n, e.getElementsByClassName(i)), n
                            } if (d.qsa && !A[t + " "] && (!v || !v.test(t)) && (1 !== p || "object" !== e.nodeName
                                .toLowerCase())) {
                            if (c = t, f = e, 1 === p && U.test(t)) {
                                (s = e.getAttribute("id")) ? s = s.replace(re, ie): e.setAttribute("id", s = k), o =
                                    (l = h(t)).length;
                                while (o--) l[o] = "#" + s + " " + xe(l[o]);
                                c = l.join(","), f = ee.test(t) && ye(e.parentNode) || e
                            }
                            try {
                                return H.apply(n, f.querySelectorAll(c)), n
                            } catch (e) {
                                A(t, !0)
                            } finally {
                                s === k && e.removeAttribute("id")
                            }
                        }
                    }
                    return g(t.replace(B, "$1"), e, n, r)
                }

                function ue() {
                    var r = [];
                    return function e(t, n) {
                        return r.push(t + " ") > b.cacheLength && delete e[r.shift()], e[t + " "] = n
                    }
                }

                function le(e) {
                    return e[k] = !0, e
                }

                function ce(e) {
                    var t = C.createElement("fieldset");
                    try {
                        return !!e(t)
                    } catch (e) {
                        return !1
                    } finally {
                        t.parentNode && t.parentNode.removeChild(t), t = null
                    }
                }

                function fe(e, t) {
                    var n = e.split("|"),
                        r = n.length;
                    while (r--) b.attrHandle[n[r]] = t
                }

                function pe(e, t) {
                    var n = t && e,
                        r = n && 1 === e.nodeType && 1 === t.nodeType && e.sourceIndex - t.sourceIndex;
                    if (r) return r;
                    if (n)
                        while (n = n.nextSibling)
                            if (n === t) return -1;
                    return e ? 1 : -1
                }

                function de(t) {
                    return function(e) {
                        return "input" === e.nodeName.toLowerCase() && e.type === t
                    }
                }

                function he(n) {
                    return function(e) {
                        var t = e.nodeName.toLowerCase();
                        return ("input" === t || "button" === t) && e.type === n
                    }
                }

                function ge(t) {
                    return function(e) {
                        return "form" in e ? e.parentNode && !1 === e.disabled ? "label" in e ? "label" in e
                            .parentNode ? e.parentNode.disabled === t : e.disabled === t : e.isDisabled === t ||
                            e.isDisabled !== !t && ae(e) === t : e.disabled === t : "label" in e && e
                            .disabled === t
                    }
                }

                function ve(a) {
                    return le(function(o) {
                        return o = +o, le(function(e, t) {
                            var n, r = a([], e.length, o),
                                i = r.length;
                            while (i--) e[n = r[i]] && (e[n] = !(t[n] = e[n]))
                        })
                    })
                }

                function ye(e) {
                    return e && "undefined" != typeof e.getElementsByTagName && e
                }
                for (e in d = se.support = {}, i = se.isXML = function(e) {
                        var t = e.namespaceURI,
                            n = (e.ownerDocument || e).documentElement;
                        return !Y.test(t || n && n.nodeName || "HTML")
                    }, T = se.setDocument = function(e) {
                        var t, n, r = e ? e.ownerDocument || e : m;
                        return r !== C && 9 === r.nodeType && r.documentElement && (a = (C = r).documentElement,
                            E = !i(C), m !== C && (n = C.defaultView) && n.top !== n && (n.addEventListener ? n
                                .addEventListener("unload", oe, !1) : n.attachEvent && n.attachEvent("onunload",
                                    oe)), d.attributes = ce(function(e) {
                                return e.className = "i", !e.getAttribute("className")
                            }), d.getElementsByTagName = ce(function(e) {
                                return e.appendChild(C.createComment("")), !e.getElementsByTagName("*")
                                    .length
                            }), d.getElementsByClassName = K.test(C.getElementsByClassName), d.getById = ce(
                                function(e) {
                                    return a.appendChild(e).id = k, !C.getElementsByName || !C
                                        .getElementsByName(k).length
                                }), d.getById ? (b.filter.ID = function(e) {
                                var t = e.replace(te, ne);
                                return function(e) {
                                    return e.getAttribute("id") === t
                                }
                            }, b.find.ID = function(e, t) {
                                if ("undefined" != typeof t.getElementById && E) {
                                    var n = t.getElementById(e);
                                    return n ? [n] : []
                                }
                            }) : (b.filter.ID = function(e) {
                                var n = e.replace(te, ne);
                                return function(e) {
                                    var t = "undefined" != typeof e.getAttributeNode && e
                                        .getAttributeNode("id");
                                    return t && t.value === n
                                }
                            }, b.find.ID = function(e, t) {
                                if ("undefined" != typeof t.getElementById && E) {
                                    var n, r, i, o = t.getElementById(e);
                                    if (o) {
                                        if ((n = o.getAttributeNode("id")) && n.value === e) return [o];
                                        i = t.getElementsByName(e), r = 0;
                                        while (o = i[r++])
                                            if ((n = o.getAttributeNode("id")) && n.value === e) return [o]
                                    }
                                    return []
                                }
                            }), b.find.TAG = d.getElementsByTagName ? function(e, t) {
                                return "undefined" != typeof t.getElementsByTagName ? t.getElementsByTagName(
                                    e) : d.qsa ? t.querySelectorAll(e) : void 0
                            } : function(e, t) {
                                var n, r = [],
                                    i = 0,
                                    o = t.getElementsByTagName(e);
                                if ("*" === e) {
                                    while (n = o[i++]) 1 === n.nodeType && r.push(n);
                                    return r
                                }
                                return o
                            }, b.find.CLASS = d.getElementsByClassName && function(e, t) {
                                if ("undefined" != typeof t.getElementsByClassName && E) return t
                                    .getElementsByClassName(e)
                            }, s = [], v = [], (d.qsa = K.test(C.querySelectorAll)) && (ce(function(e) {
                                a.appendChild(e).innerHTML = "<a id='" + k + "'></a><select id='" + k +
                                    "-\r\\' msallowcapture=''><option selected=''></option></select>", e
                                    .querySelectorAll("[msallowcapture^='']").length && v.push(
                                        "[*^$]=" + M + "*(?:''|\"\")"), e.querySelectorAll("[selected]")
                                    .length || v.push("\\[" + M + "*(?:value|" + R + ")"), e
                                    .querySelectorAll("[id~=" + k + "-]").length || v.push("~="), e
                                    .querySelectorAll(":checked").length || v.push(":checked"), e
                                    .querySelectorAll("a#" + k + "+*").length || v.push(".#.+[+~]")
                            }), ce(function(e) {
                                e.innerHTML =
                                    "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
                                var t = C.createElement("input");
                                t.setAttribute("type", "hidden"), e.appendChild(t).setAttribute("name",
                                        "D"), e.querySelectorAll("[name=d]").length && v.push("name" +
                                        M + "*[*^$|!~]?="), 2 !== e.querySelectorAll(":enabled")
                                    .length && v.push(":enabled", ":disabled"), a.appendChild(e)
                                    .disabled = !0, 2 !== e.querySelectorAll(":disabled").length && v
                                    .push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), v.push(
                                        ",.*:")
                            })), (d.matchesSelector = K.test(c = a.matches || a.webkitMatchesSelector || a
                                .mozMatchesSelector || a.oMatchesSelector || a.msMatchesSelector)) && ce(
                                function(e) {
                                    d.disconnectedMatch = c.call(e, "*"), c.call(e, "[s!='']:x"), s.push("!=",
                                        $)
                                }), v = v.length && new RegExp(v.join("|")), s = s.length && new RegExp(s.join(
                                "|")), t = K.test(a.compareDocumentPosition), y = t || K.test(a.contains) ?
                            function(e, t) {
                                var n = 9 === e.nodeType ? e.documentElement : e,
                                    r = t && t.parentNode;
                                return e === r || !(!r || 1 !== r.nodeType || !(n.contains ? n.contains(r) : e
                                    .compareDocumentPosition && 16 & e.compareDocumentPosition(r)))
                            } : function(e, t) {
                                if (t)
                                    while (t = t.parentNode)
                                        if (t === e) return !0;
                                return !1
                            }, D = t ? function(e, t) {
                                if (e === t) return l = !0, 0;
                                var n = !e.compareDocumentPosition - !t.compareDocumentPosition;
                                return n || (1 & (n = (e.ownerDocument || e) === (t.ownerDocument || t) ? e
                                        .compareDocumentPosition(t) : 1) || !d.sortDetached && t
                                    .compareDocumentPosition(e) === n ? e === C || e.ownerDocument === m &&
                                    y(m, e) ? -1 : t === C || t.ownerDocument === m && y(m, t) ? 1 : u ? P(
                                        u, e) - P(u, t) : 0 : 4 & n ? -1 : 1)
                            } : function(e, t) {
                                if (e === t) return l = !0, 0;
                                var n, r = 0,
                                    i = e.parentNode,
                                    o = t.parentNode,
                                    a = [e],
                                    s = [t];
                                if (!i || !o) return e === C ? -1 : t === C ? 1 : i ? -1 : o ? 1 : u ? P(u, e) -
                                    P(u, t) : 0;
                                if (i === o) return pe(e, t);
                                n = e;
                                while (n = n.parentNode) a.unshift(n);
                                n = t;
                                while (n = n.parentNode) s.unshift(n);
                                while (a[r] === s[r]) r++;
                                return r ? pe(a[r], s[r]) : a[r] === m ? -1 : s[r] === m ? 1 : 0
                            }), C
                    }, se.matches = function(e, t) {
                        return se(e, null, null, t)
                    }, se.matchesSelector = function(e, t) {
                        if ((e.ownerDocument || e) !== C && T(e), d.matchesSelector && E && !A[t + " "] && (!s || !s
                                .test(t)) && (!v || !v.test(t))) try {
                            var n = c.call(e, t);
                            if (n || d.disconnectedMatch || e.document && 11 !== e.document.nodeType) return n
                        } catch (e) {
                            A(t, !0)
                        }
                        return 0 < se(t, C, null, [e]).length
                    }, se.contains = function(e, t) {
                        return (e.ownerDocument || e) !== C && T(e), y(e, t)
                    }, se.attr = function(e, t) {
                        (e.ownerDocument || e) !== C && T(e);
                        var n = b.attrHandle[t.toLowerCase()],
                            r = n && j.call(b.attrHandle, t.toLowerCase()) ? n(e, t, !E) : void 0;
                        return void 0 !== r ? r : d.attributes || !E ? e.getAttribute(t) : (r = e.getAttributeNode(
                            t)) && r.specified ? r.value : null
                    }, se.escape = function(e) {
                        return (e + "").replace(re, ie)
                    }, se.error = function(e) {
                        throw new Error("Syntax error, unrecognized expression: " + e)
                    }, se.uniqueSort = function(e) {
                        var t, n = [],
                            r = 0,
                            i = 0;
                        if (l = !d.detectDuplicates, u = !d.sortStable && e.slice(0), e.sort(D), l) {
                            while (t = e[i++]) t === e[i] && (r = n.push(i));
                            while (r--) e.splice(n[r], 1)
                        }
                        return u = null, e
                    }, o = se.getText = function(e) {
                        var t, n = "",
                            r = 0,
                            i = e.nodeType;
                        if (i) {
                            if (1 === i || 9 === i || 11 === i) {
                                if ("string" == typeof e.textContent) return e.textContent;
                                for (e = e.firstChild; e; e = e.nextSibling) n += o(e)
                            } else if (3 === i || 4 === i) return e.nodeValue
                        } else
                            while (t = e[r++]) n += o(t);
                        return n
                    }, (b = se.selectors = {
                        cacheLength: 50,
                        createPseudo: le,
                        match: G,
                        attrHandle: {},
                        find: {},
                        relative: {
                            ">": {
                                dir: "parentNode",
                                first: !0
                            },
                            " ": {
                                dir: "parentNode"
                            },
                            "+": {
                                dir: "previousSibling",
                                first: !0
                            },
                            "~": {
                                dir: "previousSibling"
                            }
                        },
                        preFilter: {
                            ATTR: function(e) {
                                return e[1] = e[1].replace(te, ne), e[3] = (e[3] || e[4] || e[5] || "")
                                    .replace(te, ne), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0,
                                        4)
                            },
                            CHILD: function(e) {
                                return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || se
                                    .error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" ===
                                        e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[
                                        3])) : e[3] && se.error(e[0]), e
                            },
                            PSEUDO: function(e) {
                                var t, n = !e[6] && e[2];
                                return G.CHILD.test(e[0]) ? null : (e[3] ? e[2] = e[4] || e[5] || "" : n &&
                                    X.test(n) && (t = h(n, !0)) && (t = n.indexOf(")", n.length - t) - n
                                        .length) && (e[0] = e[0].slice(0, t), e[2] = n.slice(0, t)), e
                                    .slice(0, 3))
                            }
                        },
                        filter: {
                            TAG: function(e) {
                                var t = e.replace(te, ne).toLowerCase();
                                return "*" === e ? function() {
                                    return !0
                                } : function(e) {
                                    return e.nodeName && e.nodeName.toLowerCase() === t
                                }
                            },
                            CLASS: function(e) {
                                var t = p[e + " "];
                                return t || (t = new RegExp("(^|" + M + ")" + e + "(" + M + "|$)")) && p(e,
                                    function(e) {
                                        return t.test("string" == typeof e.className && e.className ||
                                            "undefined" != typeof e.getAttribute && e.getAttribute(
                                                "class") || "")
                                    })
                            },
                            ATTR: function(n, r, i) {
                                return function(e) {
                                    var t = se.attr(e, n);
                                    return null == t ? "!=" === r : !r || (t += "", "=" === r ? t ===
                                        i : "!=" === r ? t !== i : "^=" === r ? i && 0 === t
                                        .indexOf(i) : "*=" === r ? i && -1 < t.indexOf(i) : "$=" ===
                                        r ? i && t.slice(-i.length) === i : "~=" === r ? -1 < (" " +
                                            t.replace(F, " ") + " ").indexOf(i) : "|=" === r && (
                                            t === i || t.slice(0, i.length + 1) === i + "-"))
                                }
                            },
                            CHILD: function(h, e, t, g, v) {
                                var y = "nth" !== h.slice(0, 3),
                                    m = "last" !== h.slice(-4),
                                    x = "of-type" === e;
                                return 1 === g && 0 === v ? function(e) {
                                    return !!e.parentNode
                                } : function(e, t, n) {
                                    var r, i, o, a, s, u, l = y !== m ? "nextSibling" :
                                        "previousSibling",
                                        c = e.parentNode,
                                        f = x && e.nodeName.toLowerCase(),
                                        p = !n && !x,
                                        d = !1;
                                    if (c) {
                                        if (y) {
                                            while (l) {
                                                a = e;
                                                while (a = a[l])
                                                    if (x ? a.nodeName.toLowerCase() === f : 1 === a
                                                        .nodeType) return !1;
                                                u = l = "only" === h && !u && "nextSibling"
                                            }
                                            return !0
                                        }
                                        if (u = [m ? c.firstChild : c.lastChild], m && p) {
                                            d = (s = (r = (i = (o = (a = c)[k] || (a[k] = {}))[a
                                                .uniqueID] || (o[a.uniqueID] = {}))[h] || [])[0] === S && r[1]) && r[2], a = s && c.childNodes[s];
                                            while (a = ++s && a && a[l] || (d = s = 0) || u.pop())
                                                if (1 === a.nodeType && ++d && a === e) {
                                                    i[h] = [S, s, d];
                                                    break
                                                }
                                        } else if (p && (d = s = (r = (i = (o = (a = e)[k] || (a[
                                                k] = {}))[a.uniqueID] || (o[a
                                                .uniqueID] = {}))[h] || [])[0] === S && r[1]), !1 === d)
                                            while (a = ++s && a && a[l] || (d = s = 0) || u.pop())
                                                if ((x ? a.nodeName.toLowerCase() === f : 1 === a
                                                        .nodeType) && ++d && (p && ((i = (o = a[k] || (
                                                        a[k] = {}))[a.uniqueID] || (o[a
                                                        .uniqueID] = {}))[h] = [S, d]), a === e)) break;
                                        return (d -= v) === g || d % g == 0 && 0 <= d / g
                                    }
                                }
                            },
                            PSEUDO: function(e, o) {
                                var t, a = b.pseudos[e] || b.setFilters[e.toLowerCase()] || se.error(
                                    "unsupported pseudo: " + e);
                                return a[k] ? a(o) : 1 < a.length ? (t = [e, e, "", o], b.setFilters
                                    .hasOwnProperty(e.toLowerCase()) ? le(function(e, t) {
                                        var n, r = a(e, o),
                                            i = r.length;
                                        while (i--) e[n = P(e, r[i])] = !(t[n] = r[i])
                                    }) : function(e) {
                                        return a(e, 0, t)
                                    }) : a
                            }
                        },
                        pseudos: {
                            not: le(function(e) {
                                var r = [],
                                    i = [],
                                    s = f(e.replace(B, "$1"));
                                return s[k] ? le(function(e, t, n, r) {
                                    var i, o = s(e, null, r, []),
                                        a = e.length;
                                    while (a--)(i = o[a]) && (e[a] = !(t[a] = i))
                                }) : function(e, t, n) {
                                    return r[0] = e, s(r, null, n, i), r[0] = null, !i.pop()
                                }
                            }),
                            has: le(function(t) {
                                return function(e) {
                                    return 0 < se(t, e).length
                                }
                            }),
                            contains: le(function(t) {
                                return t = t.replace(te, ne),
                                    function(e) {
                                        return -1 < (e.textContent || o(e)).indexOf(t)
                                    }
                            }),
                            lang: le(function(n) {
                                return V.test(n || "") || se.error("unsupported lang: " + n), n = n
                                    .replace(te, ne).toLowerCase(),
                                    function(e) {
                                        var t;
                                        do {
                                            if (t = E ? e.lang : e.getAttribute("xml:lang") || e
                                                .getAttribute("lang")) return (t = t.toLowerCase()) ===
                                                n || 0 === t.indexOf(n + "-")
                                        } while ((e = e.parentNode) && 1 === e.nodeType);
                                        return !1
                                    }
                            }),
                            target: function(e) {
                                var t = n.location && n.location.hash;
                                return t && t.slice(1) === e.id
                            },
                            root: function(e) {
                                return e === a
                            },
                            focus: function(e) {
                                return e === C.activeElement && (!C.hasFocus || C.hasFocus()) && !!(e
                                    .type || e.href || ~e.tabIndex)
                            },
                            enabled: ge(!1),
                            disabled: ge(!0),
                            checked: function(e) {
                                var t = e.nodeName.toLowerCase();
                                return "input" === t && !!e.checked || "option" === t && !!e.selected
                            },
                            selected: function(e) {
                                return e.parentNode && e.parentNode.selectedIndex, !0 === e.selected
                            },
                            empty: function(e) {
                                for (e = e.firstChild; e; e = e.nextSibling)
                                    if (e.nodeType < 6) return !1;
                                return !0
                            },
                            parent: function(e) {
                                return !b.pseudos.empty(e)
                            },
                            header: function(e) {
                                return J.test(e.nodeName)
                            },
                            input: function(e) {
                                return Q.test(e.nodeName)
                            },
                            button: function(e) {
                                var t = e.nodeName.toLowerCase();
                                return "input" === t && "button" === e.type || "button" === t
                            },
                            text: function(e) {
                                var t;
                                return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null ==
                                    (t = e.getAttribute("type")) || "text" === t.toLowerCase())
                            },
                            first: ve(function() {
                                return [0]
                            }),
                            last: ve(function(e, t) {
                                return [t - 1]
                            }),
                            eq: ve(function(e, t, n) {
                                return [n < 0 ? n + t : n]
                            }),
                            even: ve(function(e, t) {
                                for (var n = 0; n < t; n += 2) e.push(n);
                                return e
                            }),
                            odd: ve(function(e, t) {
                                for (var n = 1; n < t; n += 2) e.push(n);
                                return e
                            }),
                            lt: ve(function(e, t, n) {
                                for (var r = n < 0 ? n + t : t < n ? t : n; 0 <= --r;) e.push(r);
                                return e
                            }),
                            gt: ve(function(e, t, n) {
                                for (var r = n < 0 ? n + t : n; ++r < t;) e.push(r);
                                return e
                            })
                        }
                    }).pseudos.nth = b.pseudos.eq, {
                        radio: !0,
                        checkbox: !0,
                        file: !0,
                        password: !0,
                        image: !0
                    }) b.pseudos[e] = de(e);
                for (e in {
                        submit: !0,
                        reset: !0
                    }) b.pseudos[e] = he(e);

                function me() {}

                function xe(e) {
                    for (var t = 0, n = e.length, r = ""; t < n; t++) r += e[t].value;
                    return r
                }

                function be(s, e, t) {
                    var u = e.dir,
                        l = e.next,
                        c = l || u,
                        f = t && "parentNode" === c,
                        p = r++;
                    return e.first ? function(e, t, n) {
                        while (e = e[u])
                            if (1 === e.nodeType || f) return s(e, t, n);
                        return !1
                    } : function(e, t, n) {
                        var r, i, o, a = [S, p];
                        if (n) {
                            while (e = e[u])
                                if ((1 === e.nodeType || f) && s(e, t, n)) return !0
                        } else
                            while (e = e[u])
                                if (1 === e.nodeType || f)
                                    if (i = (o = e[k] || (e[k] = {}))[e.uniqueID] || (o[e.uniqueID] = {}), l &&
                                        l === e.nodeName.toLowerCase()) e = e[u] || e;
                                    else {
                                        if ((r = i[c]) && r[0] === S && r[1] === p) return a[2] = r[2];
                                        if ((i[c] = a)[2] = s(e, t, n)) return !0
                                    } return !1
                    }
                }

                function we(i) {
                    return 1 < i.length ? function(e, t, n) {
                        var r = i.length;
                        while (r--)
                            if (!i[r](e, t, n)) return !1;
                        return !0
                    } : i[0]
                }

                function Te(e, t, n, r, i) {
                    for (var o, a = [], s = 0, u = e.length, l = null != t; s < u; s++)(o = e[s]) && (n && !n(o, r,
                        i) || (a.push(o), l && t.push(s)));
                    return a
                }

                function Ce(d, h, g, v, y, e) {
                    return v && !v[k] && (v = Ce(v)), y && !y[k] && (y = Ce(y, e)), le(function(e, t, n, r) {
                        var i, o, a, s = [],
                            u = [],
                            l = t.length,
                            c = e || function(e, t, n) {
                                for (var r = 0, i = t.length; r < i; r++) se(e, t[r], n);
                                return n
                            }(h || "*", n.nodeType ? [n] : n, []),
                            f = !d || !e && h ? c : Te(c, s, d, n, r),
                            p = g ? y || (e ? d : l || v) ? [] : t : f;
                        if (g && g(f, p, n, r), v) {
                            i = Te(p, u), v(i, [], n, r), o = i.length;
                            while (o--)(a = i[o]) && (p[u[o]] = !(f[u[o]] = a))
                        }
                        if (e) {
                            if (y || d) {
                                if (y) {
                                    i = [], o = p.length;
                                    while (o--)(a = p[o]) && i.push(f[o] = a);
                                    y(null, p = [], i, r)
                                }
                                o = p.length;
                                while (o--)(a = p[o]) && -1 < (i = y ? P(e, a) : s[o]) && (e[i] = !(t[i] =
                                    a))
                            }
                        } else p = Te(p === t ? p.splice(l, p.length) : p), y ? y(null, t, p, r) : H.apply(
                            t, p)
                    })
                }

                function Ee(e) {
                    for (var i, t, n, r = e.length, o = b.relative[e[0].type], a = o || b.relative[" "], s = o ? 1 :
                            0, u = be(function(e) {
                                return e === i
                            }, a, !0), l = be(function(e) {
                                return -1 < P(i, e)
                            }, a, !0), c = [function(e, t, n) {
                                var r = !o && (n || t !== w) || ((i = t).nodeType ? u(e, t, n) : l(e, t, n));
                                return i = null, r
                            }]; s < r; s++)
                        if (t = b.relative[e[s].type]) c = [be(we(c), t)];
                        else {
                            if ((t = b.filter[e[s].type].apply(null, e[s].matches))[k]) {
                                for (n = ++s; n < r; n++)
                                    if (b.relative[e[n].type]) break;
                                return Ce(1 < s && we(c), 1 < s && xe(e.slice(0, s - 1).concat({
                                    value: " " === e[s - 2].type ? "*" : ""
                                })).replace(B, "$1"), t, s < n && Ee(e.slice(s, n)), n < r && Ee(e = e
                                    .slice(n)), n < r && xe(e))
                            }
                            c.push(t)
                        } return we(c)
                }
                return me.prototype = b.filters = b.pseudos, b.setFilters = new me, h = se.tokenize = function(e,
                        t) {
                        var n, r, i, o, a, s, u, l = x[e + " "];
                        if (l) return t ? 0 : l.slice(0);
                        a = e, s = [], u = b.preFilter;
                        while (a) {
                            for (o in n && !(r = _.exec(a)) || (r && (a = a.slice(r[0].length) || a), s.push(
                                    i = [])), n = !1, (r = z.exec(a)) && (n = r.shift(), i.push({
                                    value: n,
                                    type: r[0].replace(B, " ")
                                }), a = a.slice(n.length)), b.filter) !(r = G[o].exec(a)) || u[o] && !(r = u[o](
                                r)) || (n = r.shift(), i.push({
                                value: n,
                                type: o,
                                matches: r
                            }), a = a.slice(n.length));
                            if (!n) break
                        }
                        return t ? a.length : a ? se.error(e) : x(e, s).slice(0)
                    }, f = se.compile = function(e, t) {
                        var n, v, y, m, x, r, i = [],
                            o = [],
                            a = N[e + " "];
                        if (!a) {
                            t || (t = h(e)), n = t.length;
                            while (n--)(a = Ee(t[n]))[k] ? i.push(a) : o.push(a);
                            (a = N(e, (v = o, m = 0 < (y = i).length, x = 0 < v.length, r = function(e, t, n, r,
                                i) {
                                var o, a, s, u = 0,
                                    l = "0",
                                    c = e && [],
                                    f = [],
                                    p = w,
                                    d = e || x && b.find.TAG("*", i),
                                    h = S += null == p ? 1 : Math.random() || .1,
                                    g = d.length;
                                for (i && (w = t === C || t || i); l !== g && null != (o = d[l]); l++) {
                                    if (x && o) {
                                        a = 0, t || o.ownerDocument === C || (T(o), n = !E);
                                        while (s = v[a++])
                                            if (s(o, t || C, n)) {
                                                r.push(o);
                                                break
                                            } i && (S = h)
                                    }
                                    m && ((o = !s && o) && u--, e && c.push(o))
                                }
                                if (u += l, m && l !== u) {
                                    a = 0;
                                    while (s = y[a++]) s(c, f, t, n);
                                    if (e) {
                                        if (0 < u)
                                            while (l--) c[l] || f[l] || (f[l] = q.call(r));
                                        f = Te(f)
                                    }
                                    H.apply(r, f), i && !e && 0 < f.length && 1 < u + y.length && se
                                        .uniqueSort(r)
                                }
                                return i && (S = h, w = p), c
                            }, m ? le(r) : r))).selector = e
                        }
                        return a
                    }, g = se.select = function(e, t, n, r) {
                        var i, o, a, s, u, l = "function" == typeof e && e,
                            c = !r && h(e = l.selector || e);
                        if (n = n || [], 1 === c.length) {
                            if (2 < (o = c[0] = c[0].slice(0)).length && "ID" === (a = o[0]).type && 9 === t
                                .nodeType && E && b.relative[o[1].type]) {
                                if (!(t = (b.find.ID(a.matches[0].replace(te, ne), t) || [])[0])) return n;
                                l && (t = t.parentNode), e = e.slice(o.shift().value.length)
                            }
                            i = G.needsContext.test(e) ? 0 : o.length;
                            while (i--) {
                                if (a = o[i], b.relative[s = a.type]) break;
                                if ((u = b.find[s]) && (r = u(a.matches[0].replace(te, ne), ee.test(o[0].type) &&
                                        ye(t.parentNode) || t))) {
                                    if (o.splice(i, 1), !(e = r.length && xe(o))) return H.apply(n, r), n;
                                    break
                                }
                            }
                        }
                        return (l || f(e, c))(r, t, !E, n, !t || ee.test(e) && ye(t.parentNode) || t), n
                    }, d.sortStable = k.split("").sort(D).join("") === k, d.detectDuplicates = !!l, T(), d
                    .sortDetached = ce(function(e) {
                        return 1 & e.compareDocumentPosition(C.createElement("fieldset"))
                    }), ce(function(e) {
                        return e.innerHTML = "<a href='#'></a>", "#" === e.firstChild.getAttribute("href")
                    }) || fe("type|href|height|width", function(e, t, n) {
                        if (!n) return e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2)
                    }), d.attributes && ce(function(e) {
                        return e.innerHTML = "<input/>", e.firstChild.setAttribute("value", ""), "" === e
                            .firstChild.getAttribute("value")
                    }) || fe("value", function(e, t, n) {
                        if (!n && "input" === e.nodeName.toLowerCase()) return e.defaultValue
                    }), ce(function(e) {
                        return null == e.getAttribute("disabled")
                    }) || fe(R, function(e, t, n) {
                        var r;
                        if (!n) return !0 === e[t] ? t.toLowerCase() : (r = e.getAttributeNode(t)) && r
                            .specified ? r.value : null
                    }), se
            }(C);
            k.find = h, k.expr = h.selectors, k.expr[":"] = k.expr.pseudos, k.uniqueSort = k.unique = h.uniqueSort, k
                .text = h.getText, k.isXMLDoc = h.isXML, k.contains = h.contains, k.escapeSelector = h.escape;
            var T = function(e, t, n) {
                    var r = [],
                        i = void 0 !== n;
                    while ((e = e[t]) && 9 !== e.nodeType)
                        if (1 === e.nodeType) {
                            if (i && k(e).is(n)) break;
                            r.push(e)
                        } return r
                },
                S = function(e, t) {
                    for (var n = []; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
                    return n
                },
                N = k.expr.match.needsContext;

            function A(e, t) {
                return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
            }
            var D = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;

            function j(e, n, r) {
                return m(n) ? k.grep(e, function(e, t) {
                    return !!n.call(e, t, e) !== r
                }) : n.nodeType ? k.grep(e, function(e) {
                    return e === n !== r
                }) : "string" != typeof n ? k.grep(e, function(e) {
                    return -1 < i.call(n, e) !== r
                }) : k.filter(n, e, r)
            }
            k.filter = function(e, t, n) {
                var r = t[0];
                return n && (e = ":not(" + e + ")"), 1 === t.length && 1 === r.nodeType ? k.find.matchesSelector(r,
                    e) ? [r] : [] : k.find.matches(e, k.grep(t, function(e) {
                    return 1 === e.nodeType
                }))
            }, k.fn.extend({
                find: function(e) {
                    var t, n, r = this.length,
                        i = this;
                    if ("string" != typeof e) return this.pushStack(k(e).filter(function() {
                        for (t = 0; t < r; t++)
                            if (k.contains(i[t], this)) return !0
                    }));
                    for (n = this.pushStack([]), t = 0; t < r; t++) k.find(e, i[t], n);
                    return 1 < r ? k.uniqueSort(n) : n
                },
                filter: function(e) {
                    return this.pushStack(j(this, e || [], !1))
                },
                not: function(e) {
                    return this.pushStack(j(this, e || [], !0))
                },
                is: function(e) {
                    return !!j(this, "string" == typeof e && N.test(e) ? k(e) : e || [], !1).length
                }
            });
            var q, L = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
            (k.fn.init = function(e, t, n) {
                var r, i;
                if (!e) return this;
                if (n = n || q, "string" == typeof e) {
                    if (!(r = "<" === e[0] && ">" === e[e.length - 1] && 3 <= e.length ? [null, e, null] : L.exec(
                            e)) || !r[1] && t) return !t || t.jquery ? (t || n).find(e) : this.constructor(t).find(
                        e);
                    if (r[1]) {
                        if (t = t instanceof k ? t[0] : t, k.merge(this, k.parseHTML(r[1], t && t.nodeType ? t
                                .ownerDocument || t : E, !0)), D.test(r[1]) && k.isPlainObject(t))
                            for (r in t) m(this[r]) ? this[r](t[r]) : this.attr(r, t[r]);
                        return this
                    }
                    return (i = E.getElementById(r[2])) && (this[0] = i, this.length = 1), this
                }
                return e.nodeType ? (this[0] = e, this.length = 1, this) : m(e) ? void 0 !== n.ready ? n.ready(e) :
                    e(k) : k.makeArray(e, this)
            }).prototype = k.fn, q = k(E);
            var H = /^(?:parents|prev(?:Until|All))/,
                O = {
                    children: !0,
                    contents: !0,
                    next: !0,
                    prev: !0
                };

            function P(e, t) {
                while ((e = e[t]) && 1 !== e.nodeType);
                return e
            }
            k.fn.extend({
                has: function(e) {
                    var t = k(e, this),
                        n = t.length;
                    return this.filter(function() {
                        for (var e = 0; e < n; e++)
                            if (k.contains(this, t[e])) return !0
                    })
                },
                closest: function(e, t) {
                    var n, r = 0,
                        i = this.length,
                        o = [],
                        a = "string" != typeof e && k(e);
                    if (!N.test(e))
                        for (; r < i; r++)
                            for (n = this[r]; n && n !== t; n = n.parentNode)
                                if (n.nodeType < 11 && (a ? -1 < a.index(n) : 1 === n.nodeType && k.find
                                        .matchesSelector(n, e))) {
                                    o.push(n);
                                    break
                                } return this.pushStack(1 < o.length ? k.uniqueSort(o) : o)
                },
                index: function(e) {
                    return e ? "string" == typeof e ? i.call(k(e), this[0]) : i.call(this, e.jquery ? e[0] :
                        e) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
                },
                add: function(e, t) {
                    return this.pushStack(k.uniqueSort(k.merge(this.get(), k(e, t))))
                },
                addBack: function(e) {
                    return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
                }
            }), k.each({
                parent: function(e) {
                    var t = e.parentNode;
                    return t && 11 !== t.nodeType ? t : null
                },
                parents: function(e) {
                    return T(e, "parentNode")
                },
                parentsUntil: function(e, t, n) {
                    return T(e, "parentNode", n)
                },
                next: function(e) {
                    return P(e, "nextSibling")
                },
                prev: function(e) {
                    return P(e, "previousSibling")
                },
                nextAll: function(e) {
                    return T(e, "nextSibling")
                },
                prevAll: function(e) {
                    return T(e, "previousSibling")
                },
                nextUntil: function(e, t, n) {
                    return T(e, "nextSibling", n)
                },
                prevUntil: function(e, t, n) {
                    return T(e, "previousSibling", n)
                },
                siblings: function(e) {
                    return S((e.parentNode || {}).firstChild, e)
                },
                children: function(e) {
                    return S(e.firstChild)
                },
                contents: function(e) {
                    return "undefined" != typeof e.contentDocument ? e.contentDocument : (A(e,
                        "template") && (e = e.content || e), k.merge([], e.childNodes))
                }
            }, function(r, i) {
                k.fn[r] = function(e, t) {
                    var n = k.map(this, i, e);
                    return "Until" !== r.slice(-5) && (t = e), t && "string" == typeof t && (n = k.filter(t,
                            n)), 1 < this.length && (O[r] || k.uniqueSort(n), H.test(r) && n.reverse()),
                        this.pushStack(n)
                }
            });
            var R = /[^\x20\t\r\n\f]+/g;

            function M(e) {
                return e
            }

            function I(e) {
                throw e
            }

            function W(e, t, n, r) {
                var i;
                try {
                    e && m(i = e.promise) ? i.call(e).done(t).fail(n) : e && m(i = e.then) ? i.call(e, t, n) : t.apply(
                        void 0, [e].slice(r))
                } catch (e) {
                    n.apply(void 0, [e])
                }
            }
            k.Callbacks = function(r) {
                var e, n;
                r = "string" == typeof r ? (e = r, n = {}, k.each(e.match(R) || [], function(e, t) {
                    n[t] = !0
                }), n) : k.extend({}, r);
                var i, t, o, a, s = [],
                    u = [],
                    l = -1,
                    c = function() {
                        for (a = a || r.once, o = i = !0; u.length; l = -1) {
                            t = u.shift();
                            while (++l < s.length) !1 === s[l].apply(t[0], t[1]) && r.stopOnFalse && (l = s.length,
                                t = !1)
                        }
                        r.memory || (t = !1), i = !1, a && (s = t ? [] : "")
                    },
                    f = {
                        add: function() {
                            return s && (t && !i && (l = s.length - 1, u.push(t)), function n(e) {
                                k.each(e, function(e, t) {
                                    m(t) ? r.unique && f.has(t) || s.push(t) : t && t.length &&
                                        "string" !== w(t) && n(t)
                                })
                            }(arguments), t && !i && c()), this
                        },
                        remove: function() {
                            return k.each(arguments, function(e, t) {
                                var n;
                                while (-1 < (n = k.inArray(t, s, n))) s.splice(n, 1), n <= l && l--
                            }), this
                        },
                        has: function(e) {
                            return e ? -1 < k.inArray(e, s) : 0 < s.length
                        },
                        empty: function() {
                            return s && (s = []), this
                        },
                        disable: function() {
                            return a = u = [], s = t = "", this
                        },
                        disabled: function() {
                            return !s
                        },
                        lock: function() {
                            return a = u = [], t || i || (s = t = ""), this
                        },
                        locked: function() {
                            return !!a
                        },
                        fireWith: function(e, t) {
                            return a || (t = [e, (t = t || []).slice ? t.slice() : t], u.push(t), i || c()),
                                this
                        },
                        fire: function() {
                            return f.fireWith(this, arguments), this
                        },
                        fired: function() {
                            return !!o
                        }
                    };
                return f
            }, k.extend({
                Deferred: function(e) {
                    var o = [
                            ["notify", "progress", k.Callbacks("memory"), k.Callbacks("memory"), 2],
                            ["resolve", "done", k.Callbacks("once memory"), k.Callbacks("once memory"), 0,
                                "resolved"
                            ],
                            ["reject", "fail", k.Callbacks("once memory"), k.Callbacks("once memory"), 1,
                                "rejected"
                            ]
                        ],
                        i = "pending",
                        a = {
                            state: function() {
                                return i
                            },
                            always: function() {
                                return s.done(arguments).fail(arguments), this
                            },
                            "catch": function(e) {
                                return a.then(null, e)
                            },
                            pipe: function() {
                                var i = arguments;
                                return k.Deferred(function(r) {
                                    k.each(o, function(e, t) {
                                        var n = m(i[t[4]]) && i[t[4]];
                                        s[t[1]](function() {
                                            var e = n && n.apply(this,
                                                arguments);
                                            e && m(e.promise) ? e.promise()
                                                .progress(r.notify).done(r
                                                    .resolve).fail(r.reject) :
                                                r[t[0] + "With"](this, n ? [e] :
                                                    arguments)
                                        })
                                    }), i = null
                                }).promise()
                            },
                            then: function(t, n, r) {
                                var u = 0;

                                function l(i, o, a, s) {
                                    return function() {
                                        var n = this,
                                            r = arguments,
                                            e = function() {
                                                var e, t;
                                                if (!(i < u)) {
                                                    if ((e = a.apply(n, r)) === o.promise())
                                                        throw new TypeError(
                                                            "Thenable self-resolution");
                                                    t = e && ("object" == typeof e || "function" ==
                                                        typeof e) && e.then, m(t) ? s ? t.call(
                                                        e, l(u, o, M, s), l(u, o, I, s)) : (u++,
                                                        t.call(e, l(u, o, M, s), l(u, o, I, s),
                                                            l(u, o, M, o.notifyWith))) : (a !==
                                                        M && (n = void 0, r = [e]), (s || o
                                                            .resolveWith)(n, r))
                                                }
                                            },
                                            t = s ? e : function() {
                                                try {
                                                    e()
                                                } catch (e) {
                                                    k.Deferred.exceptionHook && k.Deferred
                                                        .exceptionHook(e, t.stackTrace), u <= i +
                                                        1 && (a !== I && (n = void 0, r = [e]), o
                                                            .rejectWith(n, r))
                                                }
                                            };
                                        i ? t() : (k.Deferred.getStackHook && (t.stackTrace = k
                                            .Deferred.getStackHook()), C.setTimeout(t))
                                    }
                                }
                                return k.Deferred(function(e) {
                                    o[0][3].add(l(0, e, m(r) ? r : M, e.notifyWith)), o[1][3]
                                        .add(l(0, e, m(t) ? t : M)), o[2][3].add(l(0, e, m(n) ?
                                            n : I))
                                }).promise()
                            },
                            promise: function(e) {
                                return null != e ? k.extend(e, a) : a
                            }
                        },
                        s = {};
                    return k.each(o, function(e, t) {
                        var n = t[2],
                            r = t[5];
                        a[t[1]] = n.add, r && n.add(function() {
                                i = r
                            }, o[3 - e][2].disable, o[3 - e][3].disable, o[0][2].lock, o[0][3]
                            .lock), n.add(t[3].fire), s[t[0]] = function() {
                            return s[t[0] + "With"](this === s ? void 0 : this, arguments), this
                        }, s[t[0] + "With"] = n.fireWith
                    }), a.promise(s), e && e.call(s, s), s
                },
                when: function(e) {
                    var n = arguments.length,
                        t = n,
                        r = Array(t),
                        i = s.call(arguments),
                        o = k.Deferred(),
                        a = function(t) {
                            return function(e) {
                                r[t] = this, i[t] = 1 < arguments.length ? s.call(arguments) : e, --n ||
                                    o.resolveWith(r, i)
                            }
                        };
                    if (n <= 1 && (W(e, o.done(a(t)).resolve, o.reject, !n), "pending" === o.state() || m(i[
                            t] && i[t].then))) return o.then();
                    while (t--) W(i[t], a(t), o.reject);
                    return o.promise()
                }
            });
            var $ = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
            k.Deferred.exceptionHook = function(e, t) {
                C.console && C.console.warn && e && $.test(e.name) && C.console.warn("jQuery.Deferred exception: " +
                    e.message, e.stack, t)
            }, k.readyException = function(e) {
                C.setTimeout(function() {
                    throw e
                })
            };
            var F = k.Deferred();

            function B() {
                E.removeEventListener("DOMContentLoaded", B), C.removeEventListener("load", B), k.ready()
            }
            k.fn.ready = function(e) {
                    return F.then(e)["catch"](function(e) {
                        k.readyException(e)
                    }), this
                }, k.extend({
                    isReady: !1,
                    readyWait: 1,
                    ready: function(e) {
                        (!0 === e ? --k.readyWait : k.isReady) || (k.isReady = !0) !== e && 0 < --k.readyWait ||
                            F.resolveWith(E, [k])
                    }
                }), k.ready.then = F.then, "complete" === E.readyState || "loading" !== E.readyState && !E
                .documentElement.doScroll ? C.setTimeout(k.ready) : (E.addEventListener("DOMContentLoaded", B), C
                    .addEventListener("load", B));
            var _ = function(e, t, n, r, i, o, a) {
                    var s = 0,
                        u = e.length,
                        l = null == n;
                    if ("object" === w(n))
                        for (s in i = !0, n) _(e, t, s, n[s], !0, o, a);
                    else if (void 0 !== r && (i = !0, m(r) || (a = !0), l && (a ? (t.call(e, r), t = null) : (l = t, t =
                            function(e, t, n) {
                                return l.call(k(e), n)
                            })), t))
                        for (; s < u; s++) t(e[s], n, a ? r : r.call(e[s], s, t(e[s], n)));
                    return i ? e : l ? t.call(e) : u ? t(e[0], n) : o
                },
                z = /^-ms-/,
                U = /-([a-z])/g;

            function X(e, t) {
                return t.toUpperCase()
            }

            function V(e) {
                return e.replace(z, "ms-").replace(U, X)
            }
            var G = function(e) {
                return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType
            };

            function Y() {
                this.expando = k.expando + Y.uid++
            }
            Y.uid = 1, Y.prototype = {
                cache: function(e) {
                    var t = e[this.expando];
                    return t || (t = {}, G(e) && (e.nodeType ? e[this.expando] = t : Object.defineProperty(e,
                        this.expando, {
                            value: t,
                            configurable: !0
                        }))), t
                },
                set: function(e, t, n) {
                    var r, i = this.cache(e);
                    if ("string" == typeof t) i[V(t)] = n;
                    else
                        for (r in t) i[V(r)] = t[r];
                    return i
                },
                get: function(e, t) {
                    return void 0 === t ? this.cache(e) : e[this.expando] && e[this.expando][V(t)]
                },
                access: function(e, t, n) {
                    return void 0 === t || t && "string" == typeof t && void 0 === n ? this.get(e, t) : (this
                        .set(e, t, n), void 0 !== n ? n : t)
                },
                remove: function(e, t) {
                    var n, r = e[this.expando];
                    if (void 0 !== r) {
                        if (void 0 !== t) {
                            n = (t = Array.isArray(t) ? t.map(V) : (t = V(t)) in r ? [t] : t.match(R) || [])
                                .length;
                            while (n--) delete r[t[n]]
                        }(void 0 === t || k.isEmptyObject(r)) && (e.nodeType ? e[this.expando] = void 0 :
                            delete e[this.expando])
                    }
                },
                hasData: function(e) {
                    var t = e[this.expando];
                    return void 0 !== t && !k.isEmptyObject(t)
                }
            };
            var Q = new Y,
                J = new Y,
                K = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
                Z = /[A-Z]/g;

            function ee(e, t, n) {
                var r, i;
                if (void 0 === n && 1 === e.nodeType)
                    if (r = "data-" + t.replace(Z, "-$&").toLowerCase(), "string" == typeof(n = e.getAttribute(r))) {
                        try {
                            n = "true" === (i = n) || "false" !== i && ("null" === i ? null : i === +i + "" ? +i : K
                                .test(i) ? JSON.parse(i) : i)
                        } catch (e) {}
                        J.set(e, t, n)
                    } else n = void 0;
                return n
            }
            k.extend({
                hasData: function(e) {
                    return J.hasData(e) || Q.hasData(e)
                },
                data: function(e, t, n) {
                    return J.access(e, t, n)
                },
                removeData: function(e, t) {
                    J.remove(e, t)
                },
                _data: function(e, t, n) {
                    return Q.access(e, t, n)
                },
                _removeData: function(e, t) {
                    Q.remove(e, t)
                }
            }), k.fn.extend({
                data: function(n, e) {
                    var t, r, i, o = this[0],
                        a = o && o.attributes;
                    if (void 0 === n) {
                        if (this.length && (i = J.get(o), 1 === o.nodeType && !Q.get(o, "hasDataAttrs"))) {
                            t = a.length;
                            while (t--) a[t] && 0 === (r = a[t].name).indexOf("data-") && (r = V(r.slice(
                                5)), ee(o, r, i[r]));
                            Q.set(o, "hasDataAttrs", !0)
                        }
                        return i
                    }
                    return "object" == typeof n ? this.each(function() {
                        J.set(this, n)
                    }) : _(this, function(e) {
                        var t;
                        if (o && void 0 === e) return void 0 !== (t = J.get(o, n)) ? t : void 0 !==
                            (t = ee(o, n)) ? t : void 0;
                        this.each(function() {
                            J.set(this, n, e)
                        })
                    }, null, e, 1 < arguments.length, null, !0)
                },
                removeData: function(e) {
                    return this.each(function() {
                        J.remove(this, e)
                    })
                }
            }), k.extend({
                queue: function(e, t, n) {
                    var r;
                    if (e) return t = (t || "fx") + "queue", r = Q.get(e, t), n && (!r || Array.isArray(n) ?
                        r = Q.access(e, t, k.makeArray(n)) : r.push(n)), r || []
                },
                dequeue: function(e, t) {
                    t = t || "fx";
                    var n = k.queue(e, t),
                        r = n.length,
                        i = n.shift(),
                        o = k._queueHooks(e, t);
                    "inprogress" === i && (i = n.shift(), r--), i && ("fx" === t && n.unshift("inprogress"),
                        delete o.stop, i.call(e, function() {
                            k.dequeue(e, t)
                        }, o)), !r && o && o.empty.fire()
                },
                _queueHooks: function(e, t) {
                    var n = t + "queueHooks";
                    return Q.get(e, n) || Q.access(e, n, {
                        empty: k.Callbacks("once memory").add(function() {
                            Q.remove(e, [t + "queue", n])
                        })
                    })
                }
            }), k.fn.extend({
                queue: function(t, n) {
                    var e = 2;
                    return "string" != typeof t && (n = t, t = "fx", e--), arguments.length < e ? k.queue(
                        this[0], t) : void 0 === n ? this : this.each(function() {
                        var e = k.queue(this, t, n);
                        k._queueHooks(this, t), "fx" === t && "inprogress" !== e[0] && k.dequeue(
                            this, t)
                    })
                },
                dequeue: function(e) {
                    return this.each(function() {
                        k.dequeue(this, e)
                    })
                },
                clearQueue: function(e) {
                    return this.queue(e || "fx", [])
                },
                promise: function(e, t) {
                    var n, r = 1,
                        i = k.Deferred(),
                        o = this,
                        a = this.length,
                        s = function() {
                            --r || i.resolveWith(o, [o])
                        };
                    "string" != typeof e && (t = e, e = void 0), e = e || "fx";
                    while (a--)(n = Q.get(o[a], e + "queueHooks")) && n.empty && (r++, n.empty.add(s));
                    return s(), i.promise(t)
                }
            });
            var te = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
                ne = new RegExp("^(?:([+-])=|)(" + te + ")([a-z%]*)$", "i"),
                re = ["Top", "Right", "Bottom", "Left"],
                ie = E.documentElement,
                oe = function(e) {
                    return k.contains(e.ownerDocument, e)
                },
                ae = {
                    composed: !0
                };
            ie.getRootNode && (oe = function(e) {
                return k.contains(e.ownerDocument, e) || e.getRootNode(ae) === e.ownerDocument
            });
            var se = function(e, t) {
                    return "none" === (e = t || e).style.display || "" === e.style.display && oe(e) && "none" === k.css(
                        e, "display")
                },
                ue = function(e, t, n, r) {
                    var i, o, a = {};
                    for (o in t) a[o] = e.style[o], e.style[o] = t[o];
                    for (o in i = n.apply(e, r || []), t) e.style[o] = a[o];
                    return i
                };

            function le(e, t, n, r) {
                var i, o, a = 20,
                    s = r ? function() {
                        return r.cur()
                    } : function() {
                        return k.css(e, t, "")
                    },
                    u = s(),
                    l = n && n[3] || (k.cssNumber[t] ? "" : "px"),
                    c = e.nodeType && (k.cssNumber[t] || "px" !== l && +u) && ne.exec(k.css(e, t));
                if (c && c[3] !== l) {
                    u /= 2, l = l || c[3], c = +u || 1;
                    while (a--) k.style(e, t, c + l), (1 - o) * (1 - (o = s() / u || .5)) <= 0 && (a = 0), c /= o;
                    c *= 2, k.style(e, t, c + l), n = n || []
                }
                return n && (c = +c || +u || 0, i = n[1] ? c + (n[1] + 1) * n[2] : +n[2], r && (r.unit = l, r.start = c,
                    r.end = i)), i
            }
            var ce = {};

            function fe(e, t) {
                for (var n, r, i, o, a, s, u, l = [], c = 0, f = e.length; c < f; c++)(r = e[c]).style && (n = r.style
                    .display, t ? ("none" === n && (l[c] = Q.get(r, "display") || null, l[c] || (r.style.display =
                        "")), "" === r.style.display && se(r) && (l[c] = (u = a = o = void 0, a = (i = r)
                        .ownerDocument, s = i.nodeName, (u = ce[s]) || (o = a.body.appendChild(a
                                .createElement(s)), u = k.css(o, "display"), o.parentNode.removeChild(o),
                            "none" === u && (u = "block"), ce[s] = u)))) : "none" !== n && (l[c] = "none", Q.set(r,
                        "display", n)));
                for (c = 0; c < f; c++) null != l[c] && (e[c].style.display = l[c]);
                return e
            }
            k.fn.extend({
                show: function() {
                    return fe(this, !0)
                },
                hide: function() {
                    return fe(this)
                },
                toggle: function(e) {
                    return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each(function() {
                        se(this) ? k(this).show() : k(this).hide()
                    })
                }
            });
            var pe = /^(?:checkbox|radio)$/i,
                de = /<([a-z][^\/\0>\x20\t\r\n\f]*)/i,
                he = /^$|^module$|\/(?:java|ecma)script/i,
                ge = {
                    option: [1, "<select multiple='multiple'>", "</select>"],
                    thead: [1, "<table>", "</table>"],
                    col: [2, "<table><colgroup>", "</colgroup></table>"],
                    tr: [2, "<table><tbody>", "</tbody></table>"],
                    td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
                    _default: [0, "", ""]
                };

            function ve(e, t) {
                var n;
                return n = "undefined" != typeof e.getElementsByTagName ? e.getElementsByTagName(t || "*") :
                    "undefined" != typeof e.querySelectorAll ? e.querySelectorAll(t || "*") : [], void 0 === t || t &&
                    A(e, t) ? k.merge([e], n) : n
            }

            function ye(e, t) {
                for (var n = 0, r = e.length; n < r; n++) Q.set(e[n], "globalEval", !t || Q.get(t[n], "globalEval"))
            }
            ge.optgroup = ge.option, ge.tbody = ge.tfoot = ge.colgroup = ge.caption = ge.thead, ge.th = ge.td;
            var me, xe, be = /<|&#?\w+;/;

            function we(e, t, n, r, i) {
                for (var o, a, s, u, l, c, f = t.createDocumentFragment(), p = [], d = 0, h = e.length; d < h; d++)
                    if ((o = e[d]) || 0 === o)
                        if ("object" === w(o)) k.merge(p, o.nodeType ? [o] : o);
                        else if (be.test(o)) {
                    a = a || f.appendChild(t.createElement("div")), s = (de.exec(o) || ["", ""])[1].toLowerCase(), u =
                        ge[s] || ge._default, a.innerHTML = u[1] + k.htmlPrefilter(o) + u[2], c = u[0];
                    while (c--) a = a.lastChild;
                    k.merge(p, a.childNodes), (a = f.firstChild).textContent = ""
                } else p.push(t.createTextNode(o));
                f.textContent = "", d = 0;
                while (o = p[d++])
                    if (r && -1 < k.inArray(o, r)) i && i.push(o);
                    else if (l = oe(o), a = ve(f.appendChild(o), "script"), l && ye(a), n) {
                    c = 0;
                    while (o = a[c++]) he.test(o.type || "") && n.push(o)
                }
                return f
            }
            me = E.createDocumentFragment().appendChild(E.createElement("div")), (xe = E.createElement("input"))
                .setAttribute("type", "radio"), xe.setAttribute("checked", "checked"), xe.setAttribute("name", "t"), me
                .appendChild(xe), y.checkClone = me.cloneNode(!0).cloneNode(!0).lastChild.checked, me.innerHTML =
                "<textarea>x</textarea>", y.noCloneChecked = !!me.cloneNode(!0).lastChild.defaultValue;
            var Te = /^key/,
                Ce = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
                Ee = /^([^.]*)(?:\.(.+)|)/;

            function ke() {
                return !0
            }

            function Se() {
                return !1
            }

            function Ne(e, t) {
                return e === function() {
                    try {
                        return E.activeElement
                    } catch (e) {}
                }() == ("focus" === t)
            }

            function Ae(e, t, n, r, i, o) {
                var a, s;
                if ("object" == typeof t) {
                    for (s in "string" != typeof n && (r = r || n, n = void 0), t) Ae(e, s, n, r, t[s], o);
                    return e
                }
                if (null == r && null == i ? (i = n, r = n = void 0) : null == i && ("string" == typeof n ? (i = r, r =
                        void 0) : (i = r, r = n, n = void 0)), !1 === i) i = Se;
                else if (!i) return e;
                return 1 === o && (a = i, (i = function(e) {
                    return k().off(e), a.apply(this, arguments)
                }).guid = a.guid || (a.guid = k.guid++)), e.each(function() {
                    k.event.add(this, t, i, r, n)
                })
            }

            function De(e, i, o) {
                o ? (Q.set(e, i, !1), k.event.add(e, i, {
                    namespace: !1,
                    handler: function(e) {
                        var t, n, r = Q.get(this, i);
                        if (1 & e.isTrigger && this[i]) {
                            if (r.length)(k.event.special[i] || {}).delegateType && e.stopPropagation();
                            else if (r = s.call(arguments), Q.set(this, i, r), t = o(this, i), this[i]
                                (), r !== (n = Q.get(this, i)) || t ? Q.set(this, i, !1) : n = {}, r !==
                                n)
                                return e.stopImmediatePropagation(), e.preventDefault(), n.value
                        } else r.length && (Q.set(this, i, {
                            value: k.event.trigger(k.extend(r[0], k.Event.prototype), r
                                .slice(1), this)
                        }), e.stopImmediatePropagation())
                    }
                })) : void 0 === Q.get(e, i) && k.event.add(e, i, ke)
            }
            k.event = {
                global: {},
                add: function(t, e, n, r, i) {
                    var o, a, s, u, l, c, f, p, d, h, g, v = Q.get(t);
                    if (v) {
                        n.handler && (n = (o = n).handler, i = o.selector), i && k.find.matchesSelector(ie, i),
                            n.guid || (n.guid = k.guid++), (u = v.events) || (u = v.events = {}), (a = v
                                .handle) || (a = v.handle = function(e) {
                                return "undefined" != typeof k && k.event.triggered !== e.type ? k.event
                                    .dispatch.apply(t, arguments) : void 0
                            }), l = (e = (e || "").match(R) || [""]).length;
                        while (l--) d = g = (s = Ee.exec(e[l]) || [])[1], h = (s[2] || "").split(".").sort(),
                            d && (f = k.event.special[d] || {}, d = (i ? f.delegateType : f.bindType) || d, f =
                                k.event.special[d] || {}, c = k.extend({
                                    type: d,
                                    origType: g,
                                    data: r,
                                    handler: n,
                                    guid: n.guid,
                                    selector: i,
                                    needsContext: i && k.expr.match.needsContext.test(i),
                                    namespace: h.join(".")
                                }, o), (p = u[d]) || ((p = u[d] = []).delegateCount = 0, f.setup && !1 !== f
                                    .setup.call(t, r, h, a) || t.addEventListener && t.addEventListener(d, a)),
                                f.add && (f.add.call(t, c), c.handler.guid || (c.handler.guid = n.guid)), i ? p
                                .splice(p.delegateCount++, 0, c) : p.push(c), k.event.global[d] = !0)
                    }
                },
                remove: function(e, t, n, r, i) {
                    var o, a, s, u, l, c, f, p, d, h, g, v = Q.hasData(e) && Q.get(e);
                    if (v && (u = v.events)) {
                        l = (t = (t || "").match(R) || [""]).length;
                        while (l--)
                            if (d = g = (s = Ee.exec(t[l]) || [])[1], h = (s[2] || "").split(".").sort(), d) {
                                f = k.event.special[d] || {}, p = u[d = (r ? f.delegateType : f.bindType) ||
                                    d] || [], s = s[2] && new RegExp("(^|\\.)" + h.join("\\.(?:.*\\.|)") +
                                    "(\\.|$)"), a = o = p.length;
                                while (o--) c = p[o], !i && g !== c.origType || n && n.guid !== c.guid || s && !
                                    s.test(c.namespace) || r && r !== c.selector && ("**" !== r || !c
                                        .selector) || (p.splice(o, 1), c.selector && p.delegateCount--, f
                                        .remove &&
                                        f.remove.call(e, c));
                                a && !p.length && (f.teardown && !1 !== f.teardown.call(e, h, v.handle) || k
                                    .removeEvent(e, d, v.handle), delete u[d])
                            } else
                                for (d in u) k.event.remove(e, d + t[l], n, r, !0);
                        k.isEmptyObject(u) && Q.remove(e, "handle events")
                    }
                },
                dispatch: function(e) {
                    var t, n, r, i, o, a, s = k.event.fix(e),
                        u = new Array(arguments.length),
                        l = (Q.get(this, "events") || {})[s.type] || [],
                        c = k.event.special[s.type] || {};
                    for (u[0] = s, t = 1; t < arguments.length; t++) u[t] = arguments[t];
                    if (s.delegateTarget = this, !c.preDispatch || !1 !== c.preDispatch.call(this, s)) {
                        a = k.event.handlers.call(this, s, l), t = 0;
                        while ((i = a[t++]) && !s.isPropagationStopped()) {
                            s.currentTarget = i.elem, n = 0;
                            while ((o = i.handlers[n++]) && !s.isImmediatePropagationStopped()) s.rnamespace &&
                                !1 !== o.namespace && !s.rnamespace.test(o.namespace) || (s.handleObj = o, s
                                    .data = o.data, void 0 !== (r = ((k.event.special[o.origType] || {})
                                        .handle || o.handler).apply(i.elem, u)) && !1 === (s.result = r) && (s
                                        .preventDefault(), s.stopPropagation()))
                        }
                        return c.postDispatch && c.postDispatch.call(this, s), s.result
                    }
                },
                handlers: function(e, t) {
                    var n, r, i, o, a, s = [],
                        u = t.delegateCount,
                        l = e.target;
                    if (u && l.nodeType && !("click" === e.type && 1 <= e.button))
                        for (; l !== this; l = l.parentNode || this)
                            if (1 === l.nodeType && ("click" !== e.type || !0 !== l.disabled)) {
                                for (o = [], a = {}, n = 0; n < u; n++) void 0 === a[i = (r = t[n]).selector +
                                    " "] && (a[i] = r.needsContext ? -1 < k(i, this).index(l) : k.find(i,
                                    this, null, [l]).length), a[i] && o.push(r);
                                o.length && s.push({
                                    elem: l,
                                    handlers: o
                                })
                            } return l = this, u < t.length && s.push({
                        elem: l,
                        handlers: t.slice(u)
                    }), s
                },
                addProp: function(t, e) {
                    Object.defineProperty(k.Event.prototype, t, {
                        enumerable: !0,
                        configurable: !0,
                        get: m(e) ? function() {
                            if (this.originalEvent) return e(this.originalEvent)
                        } : function() {
                            if (this.originalEvent) return this.originalEvent[t]
                        },
                        set: function(e) {
                            Object.defineProperty(this, t, {
                                enumerable: !0,
                                configurable: !0,
                                writable: !0,
                                value: e
                            })
                        }
                    })
                },
                fix: function(e) {
                    return e[k.expando] ? e : new k.Event(e)
                },
                special: {
                    load: {
                        noBubble: !0
                    },
                    click: {
                        setup: function(e) {
                            var t = this || e;
                            return pe.test(t.type) && t.click && A(t, "input") && De(t, "click", ke), !1
                        },
                        trigger: function(e) {
                            var t = this || e;
                            return pe.test(t.type) && t.click && A(t, "input") && De(t, "click"), !0
                        },
                        _default: function(e) {
                            var t = e.target;
                            return pe.test(t.type) && t.click && A(t, "input") && Q.get(t, "click") || A(t, "a")
                        }
                    },
                    beforeunload: {
                        postDispatch: function(e) {
                            void 0 !== e.result && e.originalEvent && (e.originalEvent.returnValue = e.result)
                        }
                    }
                }
            }, k.removeEvent = function(e, t, n) {
                e.removeEventListener && e.removeEventListener(t, n)
            }, k.Event = function(e, t) {
                if (!(this instanceof k.Event)) return new k.Event(e, t);
                e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e
                        .defaultPrevented || void 0 === e.defaultPrevented && !1 === e.returnValue ? ke : Se, this
                        .target = e.target && 3 === e.target.nodeType ? e.target.parentNode : e.target, this
                        .currentTarget = e.currentTarget, this.relatedTarget = e.relatedTarget) : this.type = e,
                    t && k.extend(this, t), this.timeStamp = e && e.timeStamp || Date.now(), this[k.expando] = !0
            }, k.Event.prototype = {
                constructor: k.Event,
                isDefaultPrevented: Se,
                isPropagationStopped: Se,
                isImmediatePropagationStopped: Se,
                isSimulated: !1,
                preventDefault: function() {
                    var e = this.originalEvent;
                    this.isDefaultPrevented = ke, e && !this.isSimulated && e.preventDefault()
                },
                stopPropagation: function() {
                    var e = this.originalEvent;
                    this.isPropagationStopped = ke, e && !this.isSimulated && e.stopPropagation()
                },
                stopImmediatePropagation: function() {
                    var e = this.originalEvent;
                    this.isImmediatePropagationStopped = ke, e && !this.isSimulated && e
                        .stopImmediatePropagation(), this.stopPropagation()
                }
            }, k.each({
                altKey: !0,
                bubbles: !0,
                cancelable: !0,
                changedTouches: !0,
                ctrlKey: !0,
                detail: !0,
                eventPhase: !0,
                metaKey: !0,
                pageX: !0,
                pageY: !0,
                shiftKey: !0,
                view: !0,
                "char": !0,
                code: !0,
                charCode: !0,
                key: !0,
                keyCode: !0,
                button: !0,
                buttons: !0,
                clientX: !0,
                clientY: !0,
                offsetX: !0,
                offsetY: !0,
                pointerId: !0,
                pointerType: !0,
                screenX: !0,
                screenY: !0,
                targetTouches: !0,
                toElement: !0,
                touches: !0,
                which: function(e) {
                    var t = e.button;
                    return null == e.which && Te.test(e.type) ? null != e.charCode ? e.charCode : e
                        .keyCode : !e.which && void 0 !== t && Ce.test(e.type) ? 1 & t ? 1 : 2 & t ? 3 : 4 &
                        t ? 2 : 0 : e.which
                }
            }, k.event.addProp), k.each({
                focus: "focusin",
                blur: "focusout"
            }, function(e, t) {
                k.event.special[e] = {
                    setup: function() {
                        return De(this, e, Ne), !1
                    },
                    trigger: function() {
                        return De(this, e), !0
                    },
                    delegateType: t
                }
            }), k.each({
                mouseenter: "mouseover",
                mouseleave: "mouseout",
                pointerenter: "pointerover",
                pointerleave: "pointerout"
            }, function(e, i) {
                k.event.special[e] = {
                    delegateType: i,
                    bindType: i,
                    handle: function(e) {
                        var t, n = e.relatedTarget,
                            r = e.handleObj;
                        return n && (n === this || k.contains(this, n)) || (e.type = r.origType, t = r
                            .handler.apply(this, arguments), e.type = i), t
                    }
                }
            }), k.fn.extend({
                on: function(e, t, n, r) {
                    return Ae(this, e, t, n, r)
                },
                one: function(e, t, n, r) {
                    return Ae(this, e, t, n, r, 1)
                },
                off: function(e, t, n) {
                    var r, i;
                    if (e && e.preventDefault && e.handleObj) return r = e.handleObj, k(e.delegateTarget)
                        .off(r.namespace ? r.origType + "." + r.namespace : r.origType, r.selector, r
                            .handler), this;
                    if ("object" == typeof e) {
                        for (i in e) this.off(i, t, e[i]);
                        return this
                    }
                    return !1 !== t && "function" != typeof t || (n = t, t = void 0), !1 === n && (n = Se),
                        this.each(function() {
                            k.event.remove(this, e, n, t)
                        })
                }
            });
            var je = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,
                qe = /<script|<style|<link/i,
                Le = /checked\s*(?:[^=]|=\s*.checked.)/i,
                He = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;

            function Oe(e, t) {
                return A(e, "table") && A(11 !== t.nodeType ? t : t.firstChild, "tr") && k(e).children("tbody")[0] || e
            }

            function Pe(e) {
                return e.type = (null !== e.getAttribute("type")) + "/" + e.type, e
            }

            function Re(e) {
                return "true/" === (e.type || "").slice(0, 5) ? e.type = e.type.slice(5) : e.removeAttribute("type"), e
            }

            function Me(e, t) {
                var n, r, i, o, a, s, u, l;
                if (1 === t.nodeType) {
                    if (Q.hasData(e) && (o = Q.access(e), a = Q.set(t, o), l = o.events))
                        for (i in delete a.handle, a.events = {}, l)
                            for (n = 0, r = l[i].length; n < r; n++) k.event.add(t, i, l[i][n]);
                    J.hasData(e) && (s = J.access(e), u = k.extend({}, s), J.set(t, u))
                }
            }

            function Ie(n, r, i, o) {
                r = g.apply([], r);
                var e, t, a, s, u, l, c = 0,
                    f = n.length,
                    p = f - 1,
                    d = r[0],
                    h = m(d);
                if (h || 1 < f && "string" == typeof d && !y.checkClone && Le.test(d)) return n.each(function(e) {
                    var t = n.eq(e);
                    h && (r[0] = d.call(this, e, t.html())), Ie(t, r, i, o)
                });
                if (f && (t = (e = we(r, n[0].ownerDocument, !1, n, o)).firstChild, 1 === e.childNodes.length && (e =
                        t), t || o)) {
                    for (s = (a = k.map(ve(e, "script"), Pe)).length; c < f; c++) u = e, c !== p && (u = k.clone(u, !0,
                        !0), s && k.merge(a, ve(u, "script"))), i.call(n[c], u, c);
                    if (s)
                        for (l = a[a.length - 1].ownerDocument, k.map(a, Re), c = 0; c < s; c++) u = a[c], he.test(u
                            .type || "") && !Q.access(u, "globalEval") && k.contains(l, u) && (u.src && "module" !==
                            (u.type || "").toLowerCase() ? k._evalUrl && !u.noModule && k._evalUrl(u.src, {
                                nonce: u.nonce || u.getAttribute("nonce")
                            }) : b(u.textContent.replace(He, ""), u, l))
                }
                return n
            }

            function We(e, t, n) {
                for (var r, i = t ? k.filter(t, e) : e, o = 0; null != (r = i[o]); o++) n || 1 !== r.nodeType || k
                    .cleanData(ve(r)), r.parentNode && (n && oe(r) && ye(ve(r, "script")), r.parentNode.removeChild(r));
                return e
            }
            k.extend({
                htmlPrefilter: function(e) {
                    return e.replace(je, "<$1></$2>")
                },
                clone: function(e, t, n) {
                    var r, i, o, a, s, u, l, c = e.cloneNode(!0),
                        f = oe(e);
                    if (!(y.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || k.isXMLDoc(e)))
                        for (a = ve(c), r = 0, i = (o = ve(e)).length; r < i; r++) s = o[r], u = a[r],
                            void 0, "input" === (l = u.nodeName.toLowerCase()) && pe.test(s.type) ? u
                            .checked = s.checked : "input" !== l && "textarea" !== l || (u.defaultValue = s
                                .defaultValue);
                    if (t)
                        if (n)
                            for (o = o || ve(e), a = a || ve(c), r = 0, i = o.length; r < i; r++) Me(o[r],
                                a[r]);
                        else Me(e, c);
                    return 0 < (a = ve(c, "script")).length && ye(a, !f && ve(e, "script")), c
                },
                cleanData: function(e) {
                    for (var t, n, r, i = k.event.special, o = 0; void 0 !== (n = e[o]); o++)
                        if (G(n)) {
                            if (t = n[Q.expando]) {
                                if (t.events)
                                    for (r in t.events) i[r] ? k.event.remove(n, r) : k.removeEvent(n, r, t
                                        .handle);
                                n[Q.expando] = void 0
                            }
                            n[J.expando] && (n[J.expando] = void 0)
                        }
                }
            }), k.fn.extend({
                detach: function(e) {
                    return We(this, e, !0)
                },
                remove: function(e) {
                    return We(this, e)
                },
                text: function(e) {
                    return _(this, function(e) {
                        return void 0 === e ? k.text(this) : this.empty().each(function() {
                            1 !== this.nodeType && 11 !== this.nodeType && 9 !== this
                                .nodeType || (this.textContent = e)
                        })
                    }, null, e, arguments.length)
                },
                append: function() {
                    return Ie(this, arguments, function(e) {
                        1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || Oe(
                            this, e).appendChild(e)
                    })
                },
                prepend: function() {
                    return Ie(this, arguments, function(e) {
                        if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                            var t = Oe(this, e);
                            t.insertBefore(e, t.firstChild)
                        }
                    })
                },
                before: function() {
                    return Ie(this, arguments, function(e) {
                        this.parentNode && this.parentNode.insertBefore(e, this)
                    })
                },
                after: function() {
                    return Ie(this, arguments, function(e) {
                        this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
                    })
                },
                empty: function() {
                    for (var e, t = 0; null != (e = this[t]); t++) 1 === e.nodeType && (k.cleanData(ve(e, !
                        1)), e.textContent = "");
                    return this
                },
                clone: function(e, t) {
                    return e = null != e && e, t = null == t ? e : t, this.map(function() {
                        return k.clone(this, e, t)
                    })
                },
                html: function(e) {
                    return _(this, function(e) {
                        var t = this[0] || {},
                            n = 0,
                            r = this.length;
                        if (void 0 === e && 1 === t.nodeType) return t.innerHTML;
                        if ("string" == typeof e && !qe.test(e) && !ge[(de.exec(e) || ["", ""])[1]
                                .toLowerCase()]) {
                            e = k.htmlPrefilter(e);
                            try {
                                for (; n < r; n++) 1 === (t = this[n] || {}).nodeType && (k
                                    .cleanData(ve(t, !1)), t.innerHTML = e);
                                t = 0
                            } catch (e) {}
                        }
                        t && this.empty().append(e)
                    }, null, e, arguments.length)
                },
                replaceWith: function() {
                    var n = [];
                    return Ie(this, arguments, function(e) {
                        var t = this.parentNode;
                        k.inArray(this, n) < 0 && (k.cleanData(ve(this)), t && t.replaceChild(e,
                            this))
                    }, n)
                }
            }), k.each({
                appendTo: "append",
                prependTo: "prepend",
                insertBefore: "before",
                insertAfter: "after",
                replaceAll: "replaceWith"
            }, function(e, a) {
                k.fn[e] = function(e) {
                    for (var t, n = [], r = k(e), i = r.length - 1, o = 0; o <= i; o++) t = o === i ? this :
                        this.clone(!0), k(r[o])[a](t), u.apply(n, t.get());
                    return this.pushStack(n)
                }
            });
            var $e = new RegExp("^(" + te + ")(?!px)[a-z%]+$", "i"),
                Fe = function(e) {
                    var t = e.ownerDocument.defaultView;
                    return t && t.opener || (t = C), t.getComputedStyle(e)
                },
                Be = new RegExp(re.join("|"), "i");

            function _e(e, t, n) {
                var r, i, o, a, s = e.style;
                return (n = n || Fe(e)) && ("" !== (a = n.getPropertyValue(t) || n[t]) || oe(e) || (a = k.style(e, t)),
                    !y.pixelBoxStyles() && $e.test(a) && Be.test(t) && (r = s.width, i = s.minWidth, o = s.maxWidth,
                        s.minWidth = s.maxWidth = s.width = a, a = n.width, s.width = r, s.minWidth = i, s
                        .maxWidth = o)), void 0 !== a ? a + "" : a
            }

            function ze(e, t) {
                return {
                    get: function() {
                        if (!e()) return (this.get = t).apply(this, arguments);
                        delete this.get
                    }
                }
            }! function() {
                function e() {
                    if (u) {
                        s.style.cssText =
                            "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0", u.style
                            .cssText =
                            "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%",
                            ie.appendChild(s).appendChild(u);
                        var e = C.getComputedStyle(u);
                        n = "1%" !== e.top, a = 12 === t(e.marginLeft), u.style.right = "60%", o = 36 === t(e.right),
                            r = 36 === t(e.width), u.style.position = "absolute", i = 12 === t(u.offsetWidth / 3), ie
                            .removeChild(s), u = null
                    }
                }

                function t(e) {
                    return Math.round(parseFloat(e))
                }
                var n, r, i, o, a, s = E.createElement("div"),
                    u = E.createElement("div");
                u.style && (u.style.backgroundClip = "content-box", u.cloneNode(!0).style.backgroundClip = "", y
                    .clearCloneStyle = "content-box" === u.style.backgroundClip, k.extend(y, {
                        boxSizingReliable: function() {
                            return e(), r
                        },
                        pixelBoxStyles: function() {
                            return e(), o
                        },
                        pixelPosition: function() {
                            return e(), n
                        },
                        reliableMarginLeft: function() {
                            return e(), a
                        },
                        scrollboxSize: function() {
                            return e(), i
                        }
                    }))
            }();
            var Ue = ["Webkit", "Moz", "ms"],
                Xe = E.createElement("div").style,
                Ve = {};

            function Ge(e) {
                var t = k.cssProps[e] || Ve[e];
                return t || (e in Xe ? e : Ve[e] = function(e) {
                    var t = e[0].toUpperCase() + e.slice(1),
                        n = Ue.length;
                    while (n--)
                        if ((e = Ue[n] + t) in Xe) return e
                }(e) || e)
            }
            var Ye = /^(none|table(?!-c[ea]).+)/,
                Qe = /^--/,
                Je = {
                    position: "absolute",
                    visibility: "hidden",
                    display: "block"
                },
                Ke = {
                    letterSpacing: "0",
                    fontWeight: "400"
                };

            function Ze(e, t, n) {
                var r = ne.exec(t);
                return r ? Math.max(0, r[2] - (n || 0)) + (r[3] || "px") : t
            }

            function et(e, t, n, r, i, o) {
                var a = "width" === t ? 1 : 0,
                    s = 0,
                    u = 0;
                if (n === (r ? "border" : "content")) return 0;
                for (; a < 4; a += 2) "margin" === n && (u += k.css(e, n + re[a], !0, i)), r ? ("content" === n && (u -=
                    k.css(e, "padding" + re[a], !0, i)), "margin" !== n && (u -= k.css(e, "border" + re[a] +
                    "Width", !0, i))) : (u += k.css(e, "padding" + re[a], !0, i), "padding" !== n ? u += k.css(e,
                    "border" + re[a] + "Width", !0, i) : s += k.css(e, "border" + re[a] + "Width", !0, i));
                return !r && 0 <= o && (u += Math.max(0, Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - o -
                    u - s - .5)) || 0), u
            }

            function tt(e, t, n) {
                var r = Fe(e),
                    i = (!y.boxSizingReliable() || n) && "border-box" === k.css(e, "boxSizing", !1, r),
                    o = i,
                    a = _e(e, t, r),
                    s = "offset" + t[0].toUpperCase() + t.slice(1);
                if ($e.test(a)) {
                    if (!n) return a;
                    a = "auto"
                }
                return (!y.boxSizingReliable() && i || "auto" === a || !parseFloat(a) && "inline" === k.css(e,
                    "display", !1, r)) && e.getClientRects().length && (i = "border-box" === k.css(e, "boxSizing", !
                    1, r), (o = s in e) && (a = e[s])), (a = parseFloat(a) || 0) + et(e, t, n || (i ? "border" :
                    "content"), o, r, a) + "px"
            }

            function nt(e, t, n, r, i) {
                return new nt.prototype.init(e, t, n, r, i)
            }
            k.extend({
                cssHooks: {
                    opacity: {
                        get: function(e, t) {
                            if (t) {
                                var n = _e(e, "opacity");
                                return "" === n ? "1" : n
                            }
                        }
                    }
                },
                cssNumber: {
                    animationIterationCount: !0,
                    columnCount: !0,
                    fillOpacity: !0,
                    flexGrow: !0,
                    flexShrink: !0,
                    fontWeight: !0,
                    gridArea: !0,
                    gridColumn: !0,
                    gridColumnEnd: !0,
                    gridColumnStart: !0,
                    gridRow: !0,
                    gridRowEnd: !0,
                    gridRowStart: !0,
                    lineHeight: !0,
                    opacity: !0,
                    order: !0,
                    orphans: !0,
                    widows: !0,
                    zIndex: !0,
                    zoom: !0
                },
                cssProps: {},
                style: function(e, t, n, r) {
                    if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                        var i, o, a, s = V(t),
                            u = Qe.test(t),
                            l = e.style;
                        if (u || (t = Ge(s)), a = k.cssHooks[t] || k.cssHooks[s], void 0 === n) return a &&
                            "get" in a && void 0 !== (i = a.get(e, !1, r)) ? i : l[t];
                        "string" === (o = typeof n) && (i = ne.exec(n)) && i[1] && (n = le(e, t, i), o =
                            "number"), null != n && n == n && ("number" !== o || u || (n += i && i[3] ||
                                (k.cssNumber[s] ? "" : "px")), y.clearCloneStyle || "" !== n || 0 !== t
                            .indexOf("background") || (l[t] = "inherit"), a && "set" in a && void 0 ===
                            (n = a.set(e, n, r)) || (u ? l.setProperty(t, n) : l[t] = n))
                    }
                },
                css: function(e, t, n, r) {
                    var i, o, a, s = V(t);
                    return Qe.test(t) || (t = Ge(s)), (a = k.cssHooks[t] || k.cssHooks[s]) && "get" in a &&
                        (i = a.get(e, !0, n)), void 0 === i && (i = _e(e, t, r)), "normal" === i && t in
                        Ke && (i = Ke[t]), "" === n || n ? (o = parseFloat(i), !0 === n || isFinite(o) ?
                            o || 0 : i) : i
                }
            }), k.each(["height", "width"], function(e, u) {
                k.cssHooks[u] = {
                    get: function(e, t, n) {
                        if (t) return !Ye.test(k.css(e, "display")) || e.getClientRects().length && e
                            .getBoundingClientRect().width ? tt(e, u, n) : ue(e, Je, function() {
                                return tt(e, u, n)
                            })
                    },
                    set: function(e, t, n) {
                        var r, i = Fe(e),
                            o = !y.scrollboxSize() && "absolute" === i.position,
                            a = (o || n) && "border-box" === k.css(e, "boxSizing", !1, i),
                            s = n ? et(e, u, n, a, i) : 0;
                        return a && o && (s -= Math.ceil(e["offset" + u[0].toUpperCase() + u.slice(1)] -
                            parseFloat(i[u]) - et(e, u, "border", !1, i) - .5)), s && (r = ne.exec(
                            t)) && "px" !== (r[3] || "px") && (e.style[u] = t, t = k.css(e, u)), Ze(
                            0, t, s)
                    }
                }
            }), k.cssHooks.marginLeft = ze(y.reliableMarginLeft, function(e, t) {
                if (t) return (parseFloat(_e(e, "marginLeft")) || e.getBoundingClientRect().left - ue(e, {
                    marginLeft: 0
                }, function() {
                    return e.getBoundingClientRect().left
                })) + "px"
            }), k.each({
                margin: "",
                padding: "",
                border: "Width"
            }, function(i, o) {
                k.cssHooks[i + o] = {
                    expand: function(e) {
                        for (var t = 0, n = {}, r = "string" == typeof e ? e.split(" ") : [e]; t <
                            4; t++) n[i + re[t] + o] = r[t] || r[t - 2] || r[0];
                        return n
                    }
                }, "margin" !== i && (k.cssHooks[i + o].set = Ze)
            }), k.fn.extend({
                css: function(e, t) {
                    return _(this, function(e, t, n) {
                        var r, i, o = {},
                            a = 0;
                        if (Array.isArray(t)) {
                            for (r = Fe(e), i = t.length; a < i; a++) o[t[a]] = k.css(e, t[a], !1,
                                r);
                            return o
                        }
                        return void 0 !== n ? k.style(e, t, n) : k.css(e, t)
                    }, e, t, 1 < arguments.length)
                }
            }), ((k.Tween = nt).prototype = {
                constructor: nt,
                init: function(e, t, n, r, i, o) {
                    this.elem = e, this.prop = n, this.easing = i || k.easing._default, this.options = t,
                        this.start = this.now = this.cur(), this.end = r, this.unit = o || (k.cssNumber[n] ?
                            "" : "px")
                },
                cur: function() {
                    var e = nt.propHooks[this.prop];
                    return e && e.get ? e.get(this) : nt.propHooks._default.get(this)
                },
                run: function(e) {
                    var t, n = nt.propHooks[this.prop];
                    return this.options.duration ? this.pos = t = k.easing[this.easing](e, this.options
                            .duration * e, 0, 1, this.options.duration) : this.pos = t = e, this.now = (this
                            .end - this.start) * t + this.start, this.options.step && this.options.step
                        .call(this.elem, this.now, this), n && n.set ? n.set(this) : nt.propHooks._default
                        .set(this), this
                }
            }).init.prototype = nt.prototype, (nt.propHooks = {
                _default: {
                    get: function(e) {
                        var t;
                        return 1 !== e.elem.nodeType || null != e.elem[e.prop] && null == e.elem.style[e
                                .prop] ? e.elem[e.prop] : (t = k.css(e.elem, e.prop, "")) && "auto" !== t ?
                            t : 0
                    },
                    set: function(e) {
                        k.fx.step[e.prop] ? k.fx.step[e.prop](e) : 1 !== e.elem.nodeType || !k.cssHooks[e
                                .prop] && null == e.elem.style[Ge(e.prop)] ? e.elem[e.prop] = e.now : k
                            .style(e.elem, e.prop, e.now + e.unit)
                    }
                }
            }).scrollTop = nt.propHooks.scrollLeft = {
                set: function(e) {
                    e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
                }
            }, k.easing = {
                linear: function(e) {
                    return e
                },
                swing: function(e) {
                    return .5 - Math.cos(e * Math.PI) / 2
                },
                _default: "swing"
            }, k.fx = nt.prototype.init, k.fx.step = {};
            var rt, it, ot, at, st = /^(?:toggle|show|hide)$/,
                ut = /queueHooks$/;

            function lt() {
                it && (!1 === E.hidden && C.requestAnimationFrame ? C.requestAnimationFrame(lt) : C.setTimeout(lt, k.fx
                    .interval), k.fx.tick())
            }

            function ct() {
                return C.setTimeout(function() {
                    rt = void 0
                }), rt = Date.now()
            }

            function ft(e, t) {
                var n, r = 0,
                    i = {
                        height: e
                    };
                for (t = t ? 1 : 0; r < 4; r += 2 - t) i["margin" + (n = re[r])] = i["padding" + n] = e;
                return t && (i.opacity = i.width = e), i
            }

            function pt(e, t, n) {
                for (var r, i = (dt.tweeners[t] || []).concat(dt.tweeners["*"]), o = 0, a = i.length; o < a; o++)
                    if (r = i[o].call(n, t, e)) return r
            }

            function dt(o, e, t) {
                var n, a, r = 0,
                    i = dt.prefilters.length,
                    s = k.Deferred().always(function() {
                        delete u.elem
                    }),
                    u = function() {
                        if (a) return !1;
                        for (var e = rt || ct(), t = Math.max(0, l.startTime + l.duration - e), n = 1 - (t / l
                                .duration || 0), r = 0, i = l.tweens.length; r < i; r++) l.tweens[r].run(n);
                        return s.notifyWith(o, [l, n, t]), n < 1 && i ? t : (i || s.notifyWith(o, [l, 1, 0]), s
                            .resolveWith(o, [l]), !1)
                    },
                    l = s.promise({
                        elem: o,
                        props: k.extend({}, e),
                        opts: k.extend(!0, {
                            specialEasing: {},
                            easing: k.easing._default
                        }, t),
                        originalProperties: e,
                        originalOptions: t,
                        startTime: rt || ct(),
                        duration: t.duration,
                        tweens: [],
                        createTween: function(e, t) {
                            var n = k.Tween(o, l.opts, e, t, l.opts.specialEasing[e] || l.opts.easing);
                            return l.tweens.push(n), n
                        },
                        stop: function(e) {
                            var t = 0,
                                n = e ? l.tweens.length : 0;
                            if (a) return this;
                            for (a = !0; t < n; t++) l.tweens[t].run(1);
                            return e ? (s.notifyWith(o, [l, 1, 0]), s.resolveWith(o, [l, e])) : s.rejectWith(o,
                                [l, e]), this
                        }
                    }),
                    c = l.props;
                for (! function(e, t) {
                        var n, r, i, o, a;
                        for (n in e)
                            if (i = t[r = V(n)], o = e[n], Array.isArray(o) && (i = o[1], o = e[n] = o[0]), n !== r && (
                                    e[r] = o, delete e[n]), (a = k.cssHooks[r]) && "expand" in a)
                                for (n in o = a.expand(o), delete e[r], o) n in e || (e[n] = o[n], t[n] = i);
                            else t[r] = i
                    }(c, l.opts.specialEasing); r < i; r++)
                    if (n = dt.prefilters[r].call(l, o, c, l.opts)) return m(n.stop) && (k._queueHooks(l.elem, l.opts
                        .queue).stop = n.stop.bind(n)), n;
                return k.map(c, pt, l), m(l.opts.start) && l.opts.start.call(o, l), l.progress(l.opts.progress).done(l
                    .opts.done, l.opts.complete).fail(l.opts.fail).always(l.opts.always), k.fx.timer(k.extend(u, {
                    elem: o,
                    anim: l,
                    queue: l.opts.queue
                })), l
            }
            k.Animation = k.extend(dt, {
                    tweeners: {
                        "*": [function(e, t) {
                            var n = this.createTween(e, t);
                            return le(n.elem, e, ne.exec(t), n), n
                        }]
                    },
                    tweener: function(e, t) {
                        m(e) ? (t = e, e = ["*"]) : e = e.match(R);
                        for (var n, r = 0, i = e.length; r < i; r++) n = e[r], dt.tweeners[n] = dt.tweeners[
                            n] || [], dt.tweeners[n].unshift(t)
                    },
                    prefilters: [function(e, t, n) {
                        var r, i, o, a, s, u, l, c, f = "width" in t || "height" in t,
                            p = this,
                            d = {},
                            h = e.style,
                            g = e.nodeType && se(e),
                            v = Q.get(e, "fxshow");
                        for (r in n.queue || (null == (a = k._queueHooks(e, "fx")).unqueued && (a.unqueued =
                                0, s = a.empty.fire, a.empty.fire = function() {
                                    a.unqueued || s()
                                }), a.unqueued++, p.always(function() {
                                p.always(function() {
                                    a.unqueued--, k.queue(e, "fx").length || a.empty.fire()
                                })
                            })), t)
                            if (i = t[r], st.test(i)) {
                                if (delete t[r], o = o || "toggle" === i, i === (g ? "hide" : "show")) {
                                    if ("show" !== i || !v || void 0 === v[r]) continue;
                                    g = !0
                                }
                                d[r] = v && v[r] || k.style(e, r)
                            } if ((u = !k.isEmptyObject(t)) || !k.isEmptyObject(d))
                            for (r in f && 1 === e.nodeType && (n.overflow = [h.overflow, h.overflowX, h
                                        .overflowY
                                    ], null == (l = v && v.display) && (l = Q.get(e, "display")), "none" ===
                                    (c = k.css(e, "display")) && (l ? c = l : (fe([e], !0), l = e.style
                                        .display || l, c = k.css(e, "display"), fe([e]))), ("inline" ===
                                        c || "inline-block" === c && null != l) && "none" === k.css(e,
                                        "float") && (u || (p.done(function() {
                                            h.display = l
                                        }), null == l && (c = h.display, l = "none" === c ? "" : c)), h
                                        .display = "inline-block")), n.overflow && (h.overflow = "hidden", p
                                    .always(function() {
                                        h.overflow = n.overflow[0], h.overflowX = n.overflow[1], h
                                            .overflowY = n.overflow[2]
                                    })), u = !1, d) u || (v ? "hidden" in v && (g = v.hidden) : v = Q
                                .access(e, "fxshow", {
                                    display: l
                                }), o && (v.hidden = !g), g && fe([e], !0), p.done(function() {
                                    for (r in g || fe([e]), Q.remove(e, "fxshow"), d) k.style(e, r,
                                        d[r])
                                })), u = pt(g ? v[r] : 0, r, p), r in v || (v[r] = u.start, g && (u
                                .end = u.start, u.start = 0))
                    }],
                    prefilter: function(e, t) {
                        t ? dt.prefilters.unshift(e) : dt.prefilters.push(e)
                    }
                }), k.speed = function(e, t, n) {
                    var r = e && "object" == typeof e ? k.extend({}, e) : {
                        complete: n || !n && t || m(e) && e,
                        duration: e,
                        easing: n && t || t && !m(t) && t
                    };
                    return k.fx.off ? r.duration = 0 : "number" != typeof r.duration && (r.duration in k.fx.speeds ? r
                            .duration = k.fx.speeds[r.duration] : r.duration = k.fx.speeds._default), null != r.queue &&
                        !0 !== r.queue || (r.queue = "fx"), r.old = r.complete, r.complete = function() {
                            m(r.old) && r.old.call(this), r.queue && k.dequeue(this, r.queue)
                        }, r
                }, k.fn.extend({
                    fadeTo: function(e, t, n, r) {
                        return this.filter(se).css("opacity", 0).show().end().animate({
                            opacity: t
                        }, e, n, r)
                    },
                    animate: function(t, e, n, r) {
                        var i = k.isEmptyObject(t),
                            o = k.speed(e, n, r),
                            a = function() {
                                var e = dt(this, k.extend({}, t), o);
                                (i || Q.get(this, "finish")) && e.stop(!0)
                            };
                        return a.finish = a, i || !1 === o.queue ? this.each(a) : this.queue(o.queue, a)
                    },
                    stop: function(i, e, o) {
                        var a = function(e) {
                            var t = e.stop;
                            delete e.stop, t(o)
                        };
                        return "string" != typeof i && (o = e, e = i, i = void 0), e && !1 !== i && this.queue(
                            i || "fx", []), this.each(function() {
                            var e = !0,
                                t = null != i && i + "queueHooks",
                                n = k.timers,
                                r = Q.get(this);
                            if (t) r[t] && r[t].stop && a(r[t]);
                            else
                                for (t in r) r[t] && r[t].stop && ut.test(t) && a(r[t]);
                            for (t = n.length; t--;) n[t].elem !== this || null != i && n[t].queue !==
                                i || (n[t].anim.stop(o), e = !1, n.splice(t, 1));
                            !e && o || k.dequeue(this, i)
                        })
                    },
                    finish: function(a) {
                        return !1 !== a && (a = a || "fx"), this.each(function() {
                            var e, t = Q.get(this),
                                n = t[a + "queue"],
                                r = t[a + "queueHooks"],
                                i = k.timers,
                                o = n ? n.length : 0;
                            for (t.finish = !0, k.queue(this, a, []), r && r.stop && r.stop.call(this, !
                                    0), e = i.length; e--;) i[e].elem === this && i[e].queue === a && (
                                i[e].anim.stop(!0), i.splice(e, 1));
                            for (e = 0; e < o; e++) n[e] && n[e].finish && n[e].finish.call(this);
                            delete t.finish
                        })
                    }
                }), k.each(["toggle", "show", "hide"], function(e, r) {
                    var i = k.fn[r];
                    k.fn[r] = function(e, t, n) {
                        return null == e || "boolean" == typeof e ? i.apply(this, arguments) : this.animate(ft(
                            r, !0), e, t, n)
                    }
                }), k.each({
                    slideDown: ft("show"),
                    slideUp: ft("hide"),
                    slideToggle: ft("toggle"),
                    fadeIn: {
                        opacity: "show"
                    },
                    fadeOut: {
                        opacity: "hide"
                    },
                    fadeToggle: {
                        opacity: "toggle"
                    }
                }, function(e, r) {
                    k.fn[e] = function(e, t, n) {
                        return this.animate(r, e, t, n)
                    }
                }), k.timers = [], k.fx.tick = function() {
                    var e, t = 0,
                        n = k.timers;
                    for (rt = Date.now(); t < n.length; t++)(e = n[t])() || n[t] !== e || n.splice(t--, 1);
                    n.length || k.fx.stop(), rt = void 0
                }, k.fx.timer = function(e) {
                    k.timers.push(e), k.fx.start()
                }, k.fx.interval = 13, k.fx.start = function() {
                    it || (it = !0, lt())
                }, k.fx.stop = function() {
                    it = null
                }, k.fx.speeds = {
                    slow: 600,
                    fast: 200,
                    _default: 400
                }, k.fn.delay = function(r, e) {
                    return r = k.fx && k.fx.speeds[r] || r, e = e || "fx", this.queue(e, function(e, t) {
                        var n = C.setTimeout(e, r);
                        t.stop = function() {
                            C.clearTimeout(n)
                        }
                    })
                }, ot = E.createElement("input"), at = E.createElement("select").appendChild(E.createElement("option")),
                ot.type = "checkbox", y.checkOn = "" !== ot.value, y.optSelected = at.selected, (ot = E.createElement(
                    "input")).value = "t", ot.type = "radio", y.radioValue = "t" === ot.value;
            var ht, gt = k.expr.attrHandle;
            k.fn.extend({
                attr: function(e, t) {
                    return _(this, k.attr, e, t, 1 < arguments.length)
                },
                removeAttr: function(e) {
                    return this.each(function() {
                        k.removeAttr(this, e)
                    })
                }
            }), k.extend({
                attr: function(e, t, n) {
                    var r, i, o = e.nodeType;
                    if (3 !== o && 8 !== o && 2 !== o) return "undefined" == typeof e.getAttribute ? k.prop(
                        e, t, n) : (1 === o && k.isXMLDoc(e) || (i = k.attrHooks[t.toLowerCase()] ||
                            (k.expr.match.bool.test(t) ? ht : void 0)), void 0 !== n ? null === n ?
                        void k.removeAttr(e, t) : i && "set" in i && void 0 !== (r = i.set(e, n,
                            t)) ? r : (e.setAttribute(t, n + ""), n) : i && "get" in i && null !== (
                            r =
                            i.get(e, t)) ? r : null == (r = k.find.attr(e, t)) ? void 0 : r)
                },
                attrHooks: {
                    type: {
                        set: function(e, t) {
                            if (!y.radioValue && "radio" === t && A(e, "input")) {
                                var n = e.value;
                                return e.setAttribute("type", t), n && (e.value = n), t
                            }
                        }
                    }
                },
                removeAttr: function(e, t) {
                    var n, r = 0,
                        i = t && t.match(R);
                    if (i && 1 === e.nodeType)
                        while (n = i[r++]) e.removeAttribute(n)
                }
            }), ht = {
                set: function(e, t, n) {
                    return !1 === t ? k.removeAttr(e, n) : e.setAttribute(n, n), n
                }
            }, k.each(k.expr.match.bool.source.match(/\w+/g), function(e, t) {
                var a = gt[t] || k.find.attr;
                gt[t] = function(e, t, n) {
                    var r, i, o = t.toLowerCase();
                    return n || (i = gt[o], gt[o] = r, r = null != a(e, t, n) ? o : null, gt[o] = i), r
                }
            });
            var vt = /^(?:input|select|textarea|button)$/i,
                yt = /^(?:a|area)$/i;

            function mt(e) {
                return (e.match(R) || []).join(" ")
            }

            function xt(e) {
                return e.getAttribute && e.getAttribute("class") || ""
            }

            function bt(e) {
                return Array.isArray(e) ? e : "string" == typeof e && e.match(R) || []
            }
            k.fn.extend({
                prop: function(e, t) {
                    return _(this, k.prop, e, t, 1 < arguments.length)
                },
                removeProp: function(e) {
                    return this.each(function() {
                        delete this[k.propFix[e] || e]
                    })
                }
            }), k.extend({
                prop: function(e, t, n) {
                    var r, i, o = e.nodeType;
                    if (3 !== o && 8 !== o && 2 !== o) return 1 === o && k.isXMLDoc(e) || (t = k.propFix[
                        t] || t, i = k.propHooks[t]), void 0 !== n ? i && "set" in i && void 0 !== (
                        r = i.set(e, n, t)) ? r : e[t] = n : i && "get" in i && null !== (r = i.get(
                        e, t)) ? r : e[t]
                },
                propHooks: {
                    tabIndex: {
                        get: function(e) {
                            var t = k.find.attr(e, "tabindex");
                            return t ? parseInt(t, 10) : vt.test(e.nodeName) || yt.test(e.nodeName) && e
                                .href ? 0 : -1
                        }
                    }
                },
                propFix: {
                    "for": "htmlFor",
                    "class": "className"
                }
            }), y.optSelected || (k.propHooks.selected = {
                get: function(e) {
                    var t = e.parentNode;
                    return t && t.parentNode && t.parentNode.selectedIndex, null
                },
                set: function(e) {
                    var t = e.parentNode;
                    t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex)
                }
            }), k.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan",
                "useMap", "frameBorder", "contentEditable"
            ], function() {
                k.propFix[this.toLowerCase()] = this
            }), k.fn.extend({
                addClass: function(t) {
                    var e, n, r, i, o, a, s, u = 0;
                    if (m(t)) return this.each(function(e) {
                        k(this).addClass(t.call(this, e, xt(this)))
                    });
                    if ((e = bt(t)).length)
                        while (n = this[u++])
                            if (i = xt(n), r = 1 === n.nodeType && " " + mt(i) + " ") {
                                a = 0;
                                while (o = e[a++]) r.indexOf(" " + o + " ") < 0 && (r += o + " ");
                                i !== (s = mt(r)) && n.setAttribute("class", s)
                            } return this
                },
                removeClass: function(t) {
                    var e, n, r, i, o, a, s, u = 0;
                    if (m(t)) return this.each(function(e) {
                        k(this).removeClass(t.call(this, e, xt(this)))
                    });
                    if (!arguments.length) return this.attr("class", "");
                    if ((e = bt(t)).length)
                        while (n = this[u++])
                            if (i = xt(n), r = 1 === n.nodeType && " " + mt(i) + " ") {
                                a = 0;
                                while (o = e[a++])
                                    while (-1 < r.indexOf(" " + o + " ")) r = r.replace(" " + o + " ", " ");
                                i !== (s = mt(r)) && n.setAttribute("class", s)
                            } return this
                },
                toggleClass: function(i, t) {
                    var o = typeof i,
                        a = "string" === o || Array.isArray(i);
                    return "boolean" == typeof t && a ? t ? this.addClass(i) : this.removeClass(i) : m(i) ?
                        this.each(function(e) {
                            k(this).toggleClass(i.call(this, e, xt(this), t), t)
                        }) : this.each(function() {
                            var e, t, n, r;
                            if (a) {
                                t = 0, n = k(this), r = bt(i);
                                while (e = r[t++]) n.hasClass(e) ? n.removeClass(e) : n.addClass(e)
                            } else void 0 !== i && "boolean" !== o || ((e = xt(this)) && Q.set(this,
                                "__className__", e), this.setAttribute && this.setAttribute(
                                "class", e || !1 === i ? "" : Q.get(this, "__className__") || ""
                            ))
                        })
                },
                hasClass: function(e) {
                    var t, n, r = 0;
                    t = " " + e + " ";
                    while (n = this[r++])
                        if (1 === n.nodeType && -1 < (" " + mt(xt(n)) + " ").indexOf(t)) return !0;
                    return !1
                }
            });
            var wt = /\r/g;
            k.fn.extend({
                val: function(n) {
                    var r, e, i, t = this[0];
                    return arguments.length ? (i = m(n), this.each(function(e) {
                            var t;
                            1 === this.nodeType && (null == (t = i ? n.call(this, e, k(this)
                                    .val()) : n) ? t = "" : "number" == typeof t ? t += "" :
                                Array
                                .isArray(t) && (t = k.map(t, function(e) {
                                    return null == e ? "" : e + ""
                                })), (r = k.valHooks[this.type] || k.valHooks[this.nodeName
                                    .toLowerCase()]) && "set" in r && void 0 !== r.set(this, t,
                                    "value") || (this.value = t))
                        })) : t ? (r = k.valHooks[t.type] || k.valHooks[t.nodeName.toLowerCase()]) &&
                        "get" in r && void 0 !== (e = r.get(t, "value")) ? e : "string" == typeof(e = t
                            .value) ? e.replace(wt, "") : null == e ? "" : e : void 0
                }
            }), k.extend({
                valHooks: {
                    option: {
                        get: function(e) {
                            var t = k.find.attr(e, "value");
                            return null != t ? t : mt(k.text(e))
                        }
                    },
                    select: {
                        get: function(e) {
                            var t, n, r, i = e.options,
                                o = e.selectedIndex,
                                a = "select-one" === e.type,
                                s = a ? null : [],
                                u = a ? o + 1 : i.length;
                            for (r = o < 0 ? u : a ? o : 0; r < u; r++)
                                if (((n = i[r]).selected || r === o) && !n.disabled && (!n.parentNode
                                        .disabled || !A(n.parentNode, "optgroup"))) {
                                    if (t = k(n).val(), a) return t;
                                    s.push(t)
                                } return s
                        },
                        set: function(e, t) {
                            var n, r, i = e.options,
                                o = k.makeArray(t),
                                a = i.length;
                            while (a--)((r = i[a]).selected = -1 < k.inArray(k.valHooks.option.get(r),
                                o)) && (n = !0);
                            return n || (e.selectedIndex = -1), o
                        }
                    }
                }
            }), k.each(["radio", "checkbox"], function() {
                k.valHooks[this] = {
                    set: function(e, t) {
                        if (Array.isArray(t)) return e.checked = -1 < k.inArray(k(e).val(), t)
                    }
                }, y.checkOn || (k.valHooks[this].get = function(e) {
                    return null === e.getAttribute("value") ? "on" : e.value
                })
            }), y.focusin = "onfocusin" in C;
            var Tt = /^(?:focusinfocus|focusoutblur)$/,
                Ct = function(e) {
                    e.stopPropagation()
                };
            k.extend(k.event, {
                trigger: function(e, t, n, r) {
                    var i, o, a, s, u, l, c, f, p = [n || E],
                        d = v.call(e, "type") ? e.type : e,
                        h = v.call(e, "namespace") ? e.namespace.split(".") : [];
                    if (o = f = a = n = n || E, 3 !== n.nodeType && 8 !== n.nodeType && !Tt.test(d + k.event
                            .triggered) && (-1 < d.indexOf(".") && (d = (h = d.split(".")).shift(), h
                                .sort()), u = d.indexOf(":") < 0 && "on" + d, (e = e[k.expando] ? e : new k
                                .Event(d, "object" == typeof e && e)).isTrigger = r ? 2 : 3, e.namespace = h
                            .join("."), e.rnamespace = e.namespace ? new RegExp("(^|\\.)" + h.join(
                                "\\.(?:.*\\.|)") + "(\\.|$)") : null, e.result = void 0, e.target || (e
                                .target = n), t = null == t ? [e] : k.makeArray(t, [e]), c = k.event
                            .special[d] || {}, r || !c.trigger || !1 !== c.trigger.apply(n, t))) {
                        if (!r && !c.noBubble && !x(n)) {
                            for (s = c.delegateType || d, Tt.test(s + d) || (o = o.parentNode); o; o = o
                                .parentNode) p.push(o), a = o;
                            a === (n.ownerDocument || E) && p.push(a.defaultView || a.parentWindow || C)
                        }
                        i = 0;
                        while ((o = p[i++]) && !e.isPropagationStopped()) f = o, e.type = 1 < i ? s : c
                            .bindType || d, (l = (Q.get(o, "events") || {})[e.type] && Q.get(o,
                                "handle")) && l.apply(o, t), (l = u && o[u]) && l.apply && G(o) && (e
                                .result = l
                                .apply(o, t), !1 === e.result && e.preventDefault());
                        return e.type = d, r || e.isDefaultPrevented() || c._default && !1 !== c._default
                            .apply(p.pop(), t) || !G(n) || u && m(n[d]) && !x(n) && ((a = n[u]) && (n[u] =
                                    null), k.event.triggered = d, e.isPropagationStopped() && f
                                .addEventListener(d, Ct), n[d](), e.isPropagationStopped() && f
                                .removeEventListener(d, Ct), k.event.triggered = void 0, a && (n[u] = a)), e
                            .result
                    }
                },
                simulate: function(e, t, n) {
                    var r = k.extend(new k.Event, n, {
                        type: e,
                        isSimulated: !0
                    });
                    k.event.trigger(r, null, t)
                }
            }), k.fn.extend({
                trigger: function(e, t) {
                    return this.each(function() {
                        k.event.trigger(e, t, this)
                    })
                },
                triggerHandler: function(e, t) {
                    var n = this[0];
                    if (n) return k.event.trigger(e, t, n, !0)
                }
            }), y.focusin || k.each({
                focus: "focusin",
                blur: "focusout"
            }, function(n, r) {
                var i = function(e) {
                    k.event.simulate(r, e.target, k.event.fix(e))
                };
                k.event.special[r] = {
                    setup: function() {
                        var e = this.ownerDocument || this,
                            t = Q.access(e, r);
                        t || e.addEventListener(n, i, !0), Q.access(e, r, (t || 0) + 1)
                    },
                    teardown: function() {
                        var e = this.ownerDocument || this,
                            t = Q.access(e, r) - 1;
                        t ? Q.access(e, r, t) : (e.removeEventListener(n, i, !0), Q.remove(e, r))
                    }
                }
            });
            var Et = C.location,
                kt = Date.now(),
                St = /\?/;
            k.parseXML = function(e) {
                var t;
                if (!e || "string" != typeof e) return null;
                try {
                    t = (new C.DOMParser).parseFromString(e, "text/xml")
                } catch (e) {
                    t = void 0
                }
                return t && !t.getElementsByTagName("parsererror").length || k.error("Invalid XML: " + e), t
            };
            var Nt = /\[\]$/,
                At = /\r?\n/g,
                Dt = /^(?:submit|button|image|reset|file)$/i,
                jt = /^(?:input|select|textarea|keygen)/i;

            function qt(n, e, r, i) {
                var t;
                if (Array.isArray(e)) k.each(e, function(e, t) {
                    r || Nt.test(n) ? i(n, t) : qt(n + "[" + ("object" == typeof t && null != t ? e : "") + "]",
                        t, r, i)
                });
                else if (r || "object" !== w(e)) i(n, e);
                else
                    for (t in e) qt(n + "[" + t + "]", e[t], r, i)
            }
            k.param = function(e, t) {
                var n, r = [],
                    i = function(e, t) {
                        var n = m(t) ? t() : t;
                        r[r.length] = encodeURIComponent(e) + "=" + encodeURIComponent(null == n ? "" : n)
                    };
                if (null == e) return "";
                if (Array.isArray(e) || e.jquery && !k.isPlainObject(e)) k.each(e, function() {
                    i(this.name, this.value)
                });
                else
                    for (n in e) qt(n, e[n], t, i);
                return r.join("&")
            }, k.fn.extend({
                serialize: function() {
                    return k.param(this.serializeArray())
                },
                serializeArray: function() {
                    return this.map(function() {
                        var e = k.prop(this, "elements");
                        return e ? k.makeArray(e) : this
                    }).filter(function() {
                        var e = this.type;
                        return this.name && !k(this).is(":disabled") && jt.test(this.nodeName) && !
                            Dt.test(e) && (this.checked || !pe.test(e))
                    }).map(function(e, t) {
                        var n = k(this).val();
                        return null == n ? null : Array.isArray(n) ? k.map(n, function(e) {
                            return {
                                name: t.name,
                                value: e.replace(At, "\r\n")
                            }
                        }) : {
                            name: t.name,
                            value: n.replace(At, "\r\n")
                        }
                    }).get()
                }
            });
            var Lt = /%20/g,
                Ht = /#.*$/,
                Ot = /([?&])_=[^&]*/,
                Pt = /^(.*?):[ \t]*([^\r\n]*)$/gm,
                Rt = /^(?:GET|HEAD)$/,
                Mt = /^\/\//,
                It = {},
                Wt = {},
                $t = "*/".concat("*"),
                Ft = E.createElement("a");

            function Bt(o) {
                return function(e, t) {
                    "string" != typeof e && (t = e, e = "*");
                    var n, r = 0,
                        i = e.toLowerCase().match(R) || [];
                    if (m(t))
                        while (n = i[r++]) "+" === n[0] ? (n = n.slice(1) || "*", (o[n] = o[n] || []).unshift(t)) :
                            (o[n] = o[n] || []).push(t)
                }
            }

            function _t(t, i, o, a) {
                var s = {},
                    u = t === Wt;

                function l(e) {
                    var r;
                    return s[e] = !0, k.each(t[e] || [], function(e, t) {
                        var n = t(i, o, a);
                        return "string" != typeof n || u || s[n] ? u ? !(r = n) : void 0 : (i.dataTypes.unshift(
                            n), l(n), !1)
                    }), r
                }
                return l(i.dataTypes[0]) || !s["*"] && l("*")
            }

            function zt(e, t) {
                var n, r, i = k.ajaxSettings.flatOptions || {};
                for (n in t) void 0 !== t[n] && ((i[n] ? e : r || (r = {}))[n] = t[n]);
                return r && k.extend(!0, e, r), e
            }
            Ft.href = Et.href, k.extend({
                active: 0,
                lastModified: {},
                etag: {},
                ajaxSettings: {
                    url: Et.href,
                    type: "GET",
                    isLocal: /^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(Et.protocol),
                    global: !0,
                    processData: !0,
                    async: !0,
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    accepts: {
                        "*": $t,
                        text: "text/plain",
                        html: "text/html",
                        xml: "application/xml, text/xml",
                        json: "application/json, text/javascript"
                    },
                    contents: {
                        xml: /\bxml\b/,
                        html: /\bhtml/,
                        json: /\bjson\b/
                    },
                    responseFields: {
                        xml: "responseXML",
                        text: "responseText",
                        json: "responseJSON"
                    },
                    converters: {
                        "* text": String,
                        "text html": !0,
                        "text json": JSON.parse,
                        "text xml": k.parseXML
                    },
                    flatOptions: {
                        url: !0,
                        context: !0
                    }
                },
                ajaxSetup: function(e, t) {
                    return t ? zt(zt(e, k.ajaxSettings), t) : zt(k.ajaxSettings, e)
                },
                ajaxPrefilter: Bt(It),
                ajaxTransport: Bt(Wt),
                ajax: function(e, t) {
                    "object" == typeof e && (t = e, e = void 0), t = t || {};
                    var c, f, p, n, d, r, h, g, i, o, v = k.ajaxSetup({}, t),
                        y = v.context || v,
                        m = v.context && (y.nodeType || y.jquery) ? k(y) : k.event,
                        x = k.Deferred(),
                        b = k.Callbacks("once memory"),
                        w = v.statusCode || {},
                        a = {},
                        s = {},
                        u = "canceled",
                        T = {
                            readyState: 0,
                            getResponseHeader: function(e) {
                                var t;
                                if (h) {
                                    if (!n) {
                                        n = {};
                                        while (t = Pt.exec(p)) n[t[1].toLowerCase() + " "] = (n[t[1]
                                            .toLowerCase() + " "] || []).concat(t[2])
                                    }
                                    t = n[e.toLowerCase() + " "]
                                }
                                return null == t ? null : t.join(", ")
                            },
                            getAllResponseHeaders: function() {
                                return h ? p : null
                            },
                            setRequestHeader: function(e, t) {
                                return null == h && (e = s[e.toLowerCase()] = s[e.toLowerCase()] || e,
                                    a[e] = t), this
                            },
                            overrideMimeType: function(e) {
                                return null == h && (v.mimeType = e), this
                            },
                            statusCode: function(e) {
                                var t;
                                if (e)
                                    if (h) T.always(e[T.status]);
                                    else
                                        for (t in e) w[t] = [w[t], e[t]];
                                return this
                            },
                            abort: function(e) {
                                var t = e || u;
                                return c && c.abort(t), l(0, t), this
                            }
                        };
                    if (x.promise(T), v.url = ((e || v.url || Et.href) + "").replace(Mt, Et.protocol +
                            "//"), v.type = t.method || t.type || v.method || v.type, v.dataTypes = (v
                            .dataType || "*").toLowerCase().match(R) || [""], null == v.crossDomain) {
                        r = E.createElement("a");
                        try {
                            r.href = v.url, r.href = r.href, v.crossDomain = Ft.protocol + "//" + Ft.host !=
                                r.protocol + "//" + r.host
                        } catch (e) {
                            v.crossDomain = !0
                        }
                    }
                    if (v.data && v.processData && "string" != typeof v.data && (v.data = k.param(v.data, v
                            .traditional)), _t(It, v, t, T), h) return T;
                    for (i in (g = k.event && v.global) && 0 == k.active++ && k.event.trigger("ajaxStart"),
                        v.type = v.type.toUpperCase(), v.hasContent = !Rt.test(v.type), f = v.url.replace(
                            Ht, ""), v.hasContent ? v.data && v.processData && 0 === (v.contentType || "")
                        .indexOf("application/x-www-form-urlencoded") && (v.data = v.data.replace(Lt,
                            "+")) : (o = v.url.slice(f.length), v.data && (v.processData || "string" ==
                                typeof v
                                .data) && (f += (St.test(f) ? "&" : "?") + v.data, delete v.data), !1 === v
                            .cache && (f = f.replace(Ot, "$1"), o = (St.test(f) ? "&" : "?") + "_=" + kt++ +
                                o), v.url = f + o), v.ifModified && (k.lastModified[f] && T
                            .setRequestHeader("If-Modified-Since", k.lastModified[f]), k.etag[f] && T
                            .setRequestHeader("If-None-Match", k.etag[f])), (v.data && v.hasContent && !
                            1 !== v.contentType || t.contentType) && T.setRequestHeader("Content-Type", v
                            .contentType), T.setRequestHeader("Accept", v.dataTypes[0] && v.accepts[v
                            .dataTypes[0]] ? v.accepts[v.dataTypes[0]] + ("*" !== v.dataTypes[0] ?
                            ", " + $t + "; q=0.01" : "") : v.accepts["*"]), v.headers) T.setRequestHeader(i,
                        v.headers[i]);
                    if (v.beforeSend && (!1 === v.beforeSend.call(y, T, v) || h)) return T.abort();
                    if (u = "abort", b.add(v.complete), T.done(v.success), T.fail(v.error), c = _t(Wt, v, t,
                            T)) {
                        if (T.readyState = 1, g && m.trigger("ajaxSend", [T, v]), h) return T;
                        v.async && 0 < v.timeout && (d = C.setTimeout(function() {
                            T.abort("timeout")
                        }, v.timeout));
                        try {
                            h = !1, c.send(a, l)
                        } catch (e) {
                            if (h) throw e;
                            l(-1, e)
                        }
                    } else l(-1, "No Transport");

                    function l(e, t, n, r) {
                        var i, o, a, s, u, l = t;
                        h || (h = !0, d && C.clearTimeout(d), c = void 0, p = r || "", T.readyState = 0 <
                            e ? 4 : 0, i = 200 <= e && e < 300 || 304 === e, n && (s = function(e, t,
                                n) {
                                var r, i, o, a, s = e.contents,
                                    u = e.dataTypes;
                                while ("*" === u[0]) u.shift(), void 0 === r && (r = e.mimeType || t
                                    .getResponseHeader("Content-Type"));
                                if (r)
                                    for (i in s)
                                        if (s[i] && s[i].test(r)) {
                                            u.unshift(i);
                                            break
                                        } if (u[0] in n) o = u[0];
                                else {
                                    for (i in n) {
                                        if (!u[0] || e.converters[i + " " + u[0]]) {
                                            o = i;
                                            break
                                        }
                                        a || (a = i)
                                    }
                                    o = o || a
                                }
                                if (o) return o !== u[0] && u.unshift(o), n[o]
                            }(v, T, n)), s = function(e, t, n, r) {
                                var i, o, a, s, u, l = {},
                                    c = e.dataTypes.slice();
                                if (c[1])
                                    for (a in e.converters) l[a.toLowerCase()] = e.converters[a];
                                o = c.shift();
                                while (o)
                                    if (e.responseFields[o] && (n[e.responseFields[o]] = t), !u && r &&
                                        e.dataFilter && (t = e.dataFilter(t, e.dataType)), u = o, o = c
                                        .shift())
                                        if ("*" === o) o = u;
                                        else if ("*" !== u && u !== o) {
                                    if (!(a = l[u + " " + o] || l["* " + o]))
                                        for (i in l)
                                            if ((s = i.split(" "))[1] === o && (a = l[u + " " + s[0]] ||
                                                    l["* " + s[0]])) {
                                                !0 === a ? a = l[i] : !0 !== l[i] && (o = s[0], c
                                                    .unshift(s[1]));
                                                break
                                            } if (!0 !== a)
                                        if (a && e["throws"]) t = a(t);
                                        else try {
                                            t = a(t)
                                        } catch (e) {
                                            return {
                                                state: "parsererror",
                                                error: a ? e : "No conversion from " + u + " to " +
                                                    o
                                            }
                                        }
                                }
                                return {
                                    state: "success",
                                    data: t
                                }
                            }(v, s, T, i), i ? (v.ifModified && ((u = T.getResponseHeader(
                                    "Last-Modified")) && (k.lastModified[f] = u), (u = T
                                    .getResponseHeader("etag")) && (k.etag[f] = u)), 204 === e ||
                                "HEAD" === v.type ? l = "nocontent" : 304 === e ? l = "notmodified" : (
                                    l = s.state, o = s.data, i = !(a = s.error))) : (a = l, !e && l || (
                                l = "error", e < 0 && (e = 0))), T.status = e, T.statusText = (t || l) +
                            "", i ? x.resolveWith(y, [o, l, T]) : x.rejectWith(y, [T, l, a]), T
                            .statusCode(w), w = void 0, g && m.trigger(i ? "ajaxSuccess" : "ajaxError",
                                [T, v, i ? o : a]), b.fireWith(y, [T, l]), g && (m.trigger(
                                "ajaxComplete", [T, v]), --k.active || k.event.trigger("ajaxStop")))
                    }
                    return T
                },
                getJSON: function(e, t, n) {
                    return k.get(e, t, n, "json")
                },
                getScript: function(e, t) {
                    return k.get(e, void 0, t, "script")
                }
            }), k.each(["get", "post"], function(e, i) {
                k[i] = function(e, t, n, r) {
                    return m(t) && (r = r || n, n = t, t = void 0), k.ajax(k.extend({
                        url: e,
                        type: i,
                        dataType: r,
                        data: t,
                        success: n
                    }, k.isPlainObject(e) && e))
                }
            }), k._evalUrl = function(e, t) {
                return k.ajax({
                    url: e,
                    type: "GET",
                    dataType: "script",
                    cache: !0,
                    async: !1,
                    global: !1,
                    converters: {
                        "text script": function() {}
                    },
                    dataFilter: function(e) {
                        k.globalEval(e, t)
                    }
                })
            }, k.fn.extend({
                wrapAll: function(e) {
                    var t;
                    return this[0] && (m(e) && (e = e.call(this[0])), t = k(e, this[0].ownerDocument).eq(0)
                        .clone(!0), this[0].parentNode && t.insertBefore(this[0]), t.map(function() {
                            var e = this;
                            while (e.firstElementChild) e = e.firstElementChild;
                            return e
                        }).append(this)), this
                },
                wrapInner: function(n) {
                    return m(n) ? this.each(function(e) {
                        k(this).wrapInner(n.call(this, e))
                    }) : this.each(function() {
                        var e = k(this),
                            t = e.contents();
                        t.length ? t.wrapAll(n) : e.append(n)
                    })
                },
                wrap: function(t) {
                    var n = m(t);
                    return this.each(function(e) {
                        k(this).wrapAll(n ? t.call(this, e) : t)
                    })
                },
                unwrap: function(e) {
                    return this.parent(e).not("body").each(function() {
                        k(this).replaceWith(this.childNodes)
                    }), this
                }
            }), k.expr.pseudos.hidden = function(e) {
                return !k.expr.pseudos.visible(e)
            }, k.expr.pseudos.visible = function(e) {
                return !!(e.offsetWidth || e.offsetHeight || e.getClientRects().length)
            }, k.ajaxSettings.xhr = function() {
                try {
                    return new C.XMLHttpRequest
                } catch (e) {}
            };
            var Ut = {
                    0: 200,
                    1223: 204
                },
                Xt = k.ajaxSettings.xhr();
            y.cors = !!Xt && "withCredentials" in Xt, y.ajax = Xt = !!Xt, k.ajaxTransport(function(i) {
                var o, a;
                if (y.cors || Xt && !i.crossDomain) return {
                    send: function(e, t) {
                        var n, r = i.xhr();
                        if (r.open(i.type, i.url, i.async, i.username, i.password), i.xhrFields)
                            for (n in i.xhrFields) r[n] = i.xhrFields[n];
                        for (n in i.mimeType && r.overrideMimeType && r.overrideMimeType(i.mimeType), i
                            .crossDomain || e["X-Requested-With"] || (e["X-Requested-With"] =
                                "XMLHttpRequest"), e) r.setRequestHeader(n, e[n]);
                        o = function(e) {
                                return function() {
                                    o && (o = a = r.onload = r.onerror = r.onabort = r.ontimeout = r
                                        .onreadystatechange = null, "abort" === e ? r.abort() :
                                        "error" === e ? "number" != typeof r.status ? t(0,
                                            "error") : t(r.status, r.statusText) : t(Ut[r
                                                .status] || r.status, r.statusText, "text" !== (
                                                r.responseType || "text") || "string" !=
                                            typeof r.responseText ? {
                                                binary: r.response
                                            } : {
                                                text: r.responseText
                                            }, r.getAllResponseHeaders()))
                                }
                            }, r.onload = o(), a = r.onerror = r.ontimeout = o("error"), void 0 !== r
                            .onabort ? r.onabort = a : r.onreadystatechange = function() {
                                4 === r.readyState && C.setTimeout(function() {
                                    o && a()
                                })
                            }, o = o("abort");
                        try {
                            r.send(i.hasContent && i.data || null)
                        } catch (e) {
                            if (o) throw e
                        }
                    },
                    abort: function() {
                        o && o()
                    }
                }
            }), k.ajaxPrefilter(function(e) {
                e.crossDomain && (e.contents.script = !1)
            }), k.ajaxSetup({
                accepts: {
                    script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
                },
                contents: {
                    script: /\b(?:java|ecma)script\b/
                },
                converters: {
                    "text script": function(e) {
                        return k.globalEval(e), e
                    }
                }
            }), k.ajaxPrefilter("script", function(e) {
                void 0 === e.cache && (e.cache = !1), e.crossDomain && (e.type = "GET")
            }), k.ajaxTransport("script", function(n) {
                var r, i;
                if (n.crossDomain || n.scriptAttrs) return {
                    send: function(e, t) {
                        r = k("<script>").attr(n.scriptAttrs || {}).prop({
                            charset: n.scriptCharset,
                            src: n.url
                        }).on("load error", i = function(e) {
                            r.remove(), i = null, e && t("error" === e.type ? 404 : 200, e.type)
                        }), E.head.appendChild(r[0])
                    },
                    abort: function() {
                        i && i()
                    }
                }
            });
            var Vt, Gt = [],
                Yt = /(=)\?(?=&|$)|\?\?/;
            k.ajaxSetup({
                    jsonp: "callback",
                    jsonpCallback: function() {
                        var e = Gt.pop() || k.expando + "_" + kt++;
                        return this[e] = !0, e
                    }
                }), k.ajaxPrefilter("json jsonp", function(e, t, n) {
                    var r, i, o, a = !1 !== e.jsonp && (Yt.test(e.url) ? "url" : "string" == typeof e.data && 0 ===
                        (e.contentType || "").indexOf("application/x-www-form-urlencoded") && Yt.test(e.data) &&
                        "data");
                    if (a || "jsonp" === e.dataTypes[0]) return r = e.jsonpCallback = m(e.jsonpCallback) ? e
                        .jsonpCallback() : e.jsonpCallback, a ? e[a] = e[a].replace(Yt, "$1" + r) : !1 !== e
                        .jsonp && (e.url += (St.test(e.url) ? "&" : "?") + e.jsonp + "=" + r), e.converters[
                            "script json"] = function() {
                            return o || k.error(r + " was not called"), o[0]
                        }, e.dataTypes[0] = "json", i = C[r], C[r] = function() {
                            o = arguments
                        }, n.always(function() {
                            void 0 === i ? k(C).removeProp(r) : C[r] = i, e[r] && (e.jsonpCallback = t
                                .jsonpCallback, Gt.push(r)), o && m(i) && i(o[0]), o = i = void 0
                        }), "script"
                }), y.createHTMLDocument = ((Vt = E.implementation.createHTMLDocument("").body).innerHTML =
                    "<form></form><form></form>", 2 === Vt.childNodes.length), k.parseHTML = function(e, t, n) {
                    return "string" != typeof e ? [] : ("boolean" == typeof t && (n = t, t = !1), t || (y
                        .createHTMLDocument ? ((r = (t = E.implementation.createHTMLDocument("")).createElement(
                            "base")).href = E.location.href, t.head.appendChild(r)) : t = E), o = !n && [], (i =
                        D.exec(e)) ? [t.createElement(i[1])] : (i = we([e], t, o), o && o.length && k(o)
                        .remove(), k.merge([], i.childNodes)));
                    var r, i, o
                }, k.fn.load = function(e, t, n) {
                    var r, i, o, a = this,
                        s = e.indexOf(" ");
                    return -1 < s && (r = mt(e.slice(s)), e = e.slice(0, s)), m(t) ? (n = t, t = void 0) : t &&
                        "object" == typeof t && (i = "POST"), 0 < a.length && k.ajax({
                            url: e,
                            type: i || "GET",
                            dataType: "html",
                            data: t
                        }).done(function(e) {
                            o = arguments, a.html(r ? k("<div>").append(k.parseHTML(e)).find(r) : e)
                        }).always(n && function(e, t) {
                            a.each(function() {
                                n.apply(this, o || [e.responseText, t, e])
                            })
                        }), this
                }, k.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(e,
                    t) {
                    k.fn[t] = function(e) {
                        return this.on(t, e)
                    }
                }), k.expr.pseudos.animated = function(t) {
                    return k.grep(k.timers, function(e) {
                        return t === e.elem
                    }).length
                }, k.offset = {
                    setOffset: function(e, t, n) {
                        var r, i, o, a, s, u, l = k.css(e, "position"),
                            c = k(e),
                            f = {};
                        "static" === l && (e.style.position = "relative"), s = c.offset(), o = k.css(e, "top"), u =
                            k.css(e, "left"), ("absolute" === l || "fixed" === l) && -1 < (o + u).indexOf("auto") ?
                            (a = (r = c.position()).top, i = r.left) : (a = parseFloat(o) || 0, i = parseFloat(u) ||
                                0), m(t) && (t = t.call(e, n, k.extend({}, s))), null != t.top && (f.top = t.top - s
                                .top + a), null != t.left && (f.left = t.left - s.left + i), "using" in t ? t.using
                            .call(e, f) : c.css(f)
                    }
                }, k.fn.extend({
                    offset: function(t) {
                        if (arguments.length) return void 0 === t ? this : this.each(function(e) {
                            k.offset.setOffset(this, t, e)
                        });
                        var e, n, r = this[0];
                        return r ? r.getClientRects().length ? (e = r.getBoundingClientRect(), n = r
                            .ownerDocument.defaultView, {
                                top: e.top + n.pageYOffset,
                                left: e.left + n.pageXOffset
                            }) : {
                            top: 0,
                            left: 0
                        } : void 0
                    },
                    position: function() {
                        if (this[0]) {
                            var e, t, n, r = this[0],
                                i = {
                                    top: 0,
                                    left: 0
                                };
                            if ("fixed" === k.css(r, "position")) t = r.getBoundingClientRect();
                            else {
                                t = this.offset(), n = r.ownerDocument, e = r.offsetParent || n.documentElement;
                                while (e && (e === n.body || e === n.documentElement) && "static" === k.css(e,
                                        "position")) e = e.parentNode;
                                e && e !== r && 1 === e.nodeType && ((i = k(e).offset()).top += k.css(e,
                                    "borderTopWidth", !0), i.left += k.css(e, "borderLeftWidth", !0))
                            }
                            return {
                                top: t.top - i.top - k.css(r, "marginTop", !0),
                                left: t.left - i.left - k.css(r, "marginLeft", !0)
                            }
                        }
                    },
                    offsetParent: function() {
                        return this.map(function() {
                            var e = this.offsetParent;
                            while (e && "static" === k.css(e, "position")) e = e.offsetParent;
                            return e || ie
                        })
                    }
                }), k.each({
                    scrollLeft: "pageXOffset",
                    scrollTop: "pageYOffset"
                }, function(t, i) {
                    var o = "pageYOffset" === i;
                    k.fn[t] = function(e) {
                        return _(this, function(e, t, n) {
                            var r;
                            if (x(e) ? r = e : 9 === e.nodeType && (r = e.defaultView), void 0 === n)
                                return r ? r[i] : e[t];
                            r ? r.scrollTo(o ? r.pageXOffset : n, o ? n : r.pageYOffset) : e[t] = n
                        }, t, e, arguments.length)
                    }
                }), k.each(["top", "left"], function(e, n) {
                    k.cssHooks[n] = ze(y.pixelPosition, function(e, t) {
                        if (t) return t = _e(e, n), $e.test(t) ? k(e).position()[n] + "px" : t
                    })
                }), k.each({
                    Height: "height",
                    Width: "width"
                }, function(a, s) {
                    k.each({
                        padding: "inner" + a,
                        content: s,
                        "": "outer" + a
                    }, function(r, o) {
                        k.fn[o] = function(e, t) {
                            var n = arguments.length && (r || "boolean" != typeof e),
                                i = r || (!0 === e || !0 === t ? "margin" : "border");
                            return _(this, function(e, t, n) {
                                var r;
                                return x(e) ? 0 === o.indexOf("outer") ? e["inner" + a] : e
                                    .document.documentElement["client" + a] : 9 === e.nodeType ?
                                    (r = e.documentElement, Math.max(e.body["scroll" + a], r[
                                        "scroll" + a], e.body["offset" + a], r[
                                        "offset" + a], r["client" + a])) : void 0 === n ? k.css(
                                        e, t, i) : k.style(e, t, n, i)
                            }, s, n ? e : void 0, n)
                        }
                    })
                }), k.each(
                    "blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu"
                    .split(" "),
                    function(e, n) {
                        k.fn[n] = function(e, t) {
                            return 0 < arguments.length ? this.on(n, null, e, t) : this.trigger(n)
                        }
                    }), k.fn.extend({
                    hover: function(e, t) {
                        return this.mouseenter(e).mouseleave(t || e)
                    }
                }), k.fn.extend({
                    bind: function(e, t, n) {
                        return this.on(e, null, t, n)
                    },
                    unbind: function(e, t) {
                        return this.off(e, null, t)
                    },
                    delegate: function(e, t, n, r) {
                        return this.on(t, e, n, r)
                    },
                    undelegate: function(e, t, n) {
                        return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
                    }
                }), k.proxy = function(e, t) {
                    var n, r, i;
                    if ("string" == typeof t && (n = e[t], t = e, e = n), m(e)) return r = s.call(arguments, 2), (i =
                        function() {
                            return e.apply(t || this, r.concat(s.call(arguments)))
                        }).guid = e.guid = e.guid || k.guid++, i
                }, k.holdReady = function(e) {
                    e ? k.readyWait++ : k.ready(!0)
                }, k.isArray = Array.isArray, k.parseJSON = JSON.parse, k.nodeName = A, k.isFunction = m, k.isWindow =
                x, k.camelCase = V, k.type = w, k.now = Date.now, k.isNumeric = function(e) {
                    var t = k.type(e);
                    return ("number" === t || "string" === t) && !isNaN(e - parseFloat(e))
                }, "function" == typeof define && define.amd && define("jquery", [], function() {
                    return k
                });
            var Qt = C.jQuery,
                Jt = C.$;
            return k.noConflict = function(e) {
                return C.$ === k && (C.$ = Jt), e && C.jQuery === k && (C.jQuery = Qt), k
            }, e || (C.jQuery = C.$ = k), k
        });
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <meta name="google-site-verification" content="kyZLmfamB8m_WJP959dFuzELltvuF5ovgZvRkbkl70w" />

    <link rel="canonical" href="https://odm.com.mx/" />

    <noscript id="deferred-styles">
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" />
    </noscript>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" > -->


    <meta name="viewport" content="width=device-width, initial-scale=1.0, ">
    <!-- temporadas -->
    <!-- <link rel="stylesheet" type="text/css" href="css3/estilospatriomin.css"/> -->
    <!-- <link rel="stylesheet" type="text/css" href="css3/estilospatriomin.css"/> -->

    <link rel="stylesheet" type="text/css" href="css3/estilosmin.css" />

    <!-- <link rel="stylesheet" type="text/css" href="css3/estiloscancermin.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="css3/estilocancersmin.css" /> -->

    <!-- <link rel="stylesheet" type="text/css" href="css3/cabpie.css"/> -->


    <!-- NO SE TOCA CALENDARIO -->
    <!-- <link rel="stylesheet" id="compiled.css-css" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled-4.8.10.min.css?ver=4.8.10" type="text/css" media="all"> -->
    <!-- ///////// -->

    <!-- <link rel="stylesheet" href="css3/bootstrap.min.css"> -->

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <!-- ///////////////////// -->


    <link rel="stylesheet" type="text/css" href="css3/bootstrap.min.css" />



    <link rel="stylesheet" type="text/css" href="css3/select2.css" />



    <link rel="stylesheet" type="text/css" href="css3/calendariomin.css" />


    <!-- /////////////// -->
    <!-- <link rel="stylesheet" href="css3/select2.css"> -->
    <!-- <link rel="stylesheet" href="css3/calendario.css"> -->
    <script src="js3/select2.js"></script>
    <script async src="js3/calcomplem2.js"></script>
    <!-- <script async src="js3/siscel.js"></script> -->



    <link rel="shortcut icon" href="images/pagmaestra-favicon.ico">

    <title>Omnibus de México | Boletos de Autobús con Descuento</title>





    <!-- /////////////////////////////////////// -->

    <script type="text/javascript">
        document.onselectstart = function() {
            return false;
        }
        // document.onmousedown = function() {return false;}
    </script>



    <!-- /////////// RENDERIZAR SEGUN EL DISPOSITIVO /////// -->
    <script async src="js3/varrenderizado.js"></script>

    <!-- /////////////////////////////////////////////////////////////////////// -->
    <!-- <script async src="js3/tarjetapromo.js"></script> -->


    <style>
        .tablaControl td {
            vertical-align: top;
        }

        @media (max-width: 768px) {
            .tablaControl {
                margin-top: 44px;
            }
        }

        .basico,
        .basico2 {
            /*display: none;*/
        }

        #idboton2 {
            font-weight: 900;
            height: 100px;
            border-color: #fff;
            border-style: solid;
            border-width: 2px;
        }

        #reservar2 {
            font-weight: 900;
            /* height: 100px; */
            border-color: white;
            border-style: solid;
            border-width: 2px;
            font-size: small;
        }

        .modal-dialog {
            max-width: 700px !important;
            margin: 1.75rem auto;
        }

        @media (max-width: 540px) {
            #textMant {
                font-size: 20px;
            }
        }

        #coorEstu {
            display: none !important;
        }

        #coorProf {
            display: none !important;
        }

        .ui-datepicker table {
            width: 100%;
            font-size: .8em;
            border-collapse: collapse;
            margin: 0 0 .4em;
        }

        .ui-datepicker-div {
            max-width: 100%;
        }

        .login {
            position: relative;
            top: -20px;
            left: 20px;
            background-color: white;
            width: 500px;

        }

        .login,
        ul,
        li,
        a {

            color: #0b5996;
            text-decoration: none;

        }

        .login,
        ul,
        li,
        a:hover {

            color: #737577;
            text-decoration: none;

        }

        #travel a {

            color: #fff;
            text-decoration: none;

        }

        #travel a:hover {

            color: red;
            text-decoration: none;

        }

        .bg-light {
            background-color: #fff !important;
        }

        #prueba2,
        .bg-light {
            border-bottom: solid 7px #003368;
            position: fixed;
            width: 100%;
            z-index: 50;
            top: 0px;
            background-color: #ffffff !important;
        }

        div .meshim_widget_components_chatButton_Button .button_bar {
            min-width: 180px;
            *width: 180px;
            max-width: 300px;
            height: 30px;
            color: #ffffff;
            background: red;
            box-shadow: chatButtonShadow;
        }

        div .meshim_widget_components_chatButton_ButtonBar .favicon {
            position: absolute;
            height: 100%;
            left: 0;
            vertical-align: text-top;
            text-align: center;
            padding-top: 8px;
            width: 36px;
            background: #2e3b64;
            color: #ffffff;
        }

        #adultos,
        #menor,
        #inapam,
        #estudiantes,
        #profesores {
            text-align-last: center;
            display: inline-block;
            width: 40px;
            height: 40px;
            padding: 0px 0px 0px 0px;
            line-height: 1.5;
            color: #495057;
            vertical-align: middle;
            background: #fff;
            background-size: 8px 10px;
            border: 1px solid #ced4da;
            border-radius: 50px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        #fecharegreso2 {
            font-size: 20px;
        }

        #adultos,
        #estudiantes,
        #profesores,
        #inapam,
        #menor,
        #fechasalida1,
        #fecharegreso,
        #cbx_municipio {
            border-color: #fff;
        }

        #adultos,
        #estudiantes,
        #profesores,
        #inapam,
        #menor,
        #fechasalida1,
        #fecharegreso,
        #cbx_municipio:focus {

            box-shadow: inset 0 0 0 0rem rgba(255, 255, 255, 0.25);
        }

        .select2-selection__rendered {

            color: black;
            font-weight: bold;
        }

        .select2-dropdown {

            margin-top: 5px;
        }

        .ui-datepicker .ui-datepicker-header {
            max-width: 103%;
            position: relative;
            padding: .2em 0;
            left: -4px;
            width: 318px;
            border-radius: 0px;
            top: -4px;
            background-color: #073d7d;
            color: white;
            z-index: 60;
        }

        .ui-state-highlight,
        .ui-widget-content .ui-state-highlight,
        .ui-widget-header .ui-state-highlight {
            border: 1px solid #1484c9;
            background: #7f7c7c;
            color: #fff;
            padding: 8px 0px 8px 0px;
            border-radius: 100px;
        }

        #cursor {

            cursor: hand;
        }

        #cuadroloader {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            z-index: 50;

        }

        #reservar {
            font-weight: 900;
            /*height: 100px;*/
            border-color: white;
            border-style: solid;
            border-width: 2px;
            font-size: small;

        }

        #msjAdulto,
        #msjMenor,
        #msjInapam,
        #msjEstud,
        #msjProfe {
            display: none;
            text-align: left;
            margin: 11px;
            font-size: large;

        }

        .fade {
            /* transition: opacity .15s linear; */
            transition-property: all;
            transition-duration: 0.3s;
            transition-timing-function: cubic-bezier(0.1, -0.09, 0.29, 0.26);
        }

        .modalFormulario .facebook,
        .modalFormulario .google,
        .modalFormulario .correo {
            cursor: pointer;
        }

        .facebook:hover {

            color: red;
        }

        .modalFormulario .correo p {
            background: #c1c1c1;
        }

        .modalFormulario .facebook p {
            background: #46639f;
        }

        .modalFormulario .google p {
            background: #d6513e;
        }

        .modalFormulario .facebook p,
        .modalFormulario .google p,
        .modalFormulario .correo p {

            color: white;
            text-align: center;
            line-height: 40px;
            padding: 8px;
            font-size: 18px;
            margin-top: 10px;
            margin-bottom: 20px;
            border-radius: 15px;
        }

        .modalFormulario p i {
            margin-left: -25px;
            margin-right: 25px;
            font-size: 25px;
        }

        .backColor {
            color: white;
            /*background: #5bb7c5;*/
            background: #88c1ea;
        }

        .backColor:hover {
            text-decoration: none;
            /*background: #27727d;*/
            background: #1d93d0;
        }

        .colorHeader {
            border-radius: 20px 20px 0px 0px;
            background: #003765;
            color: white;
        }

        .colorHeader .close {
            outline: none;
            color: white;
        }

        .modalRadius {
            border-radius: 25px 25px 20px 20px;
        }

        .modalFooter a {
            margin-left: 10px;
        }

        .modalFooter {
            font-size: 13px;
        }

        @media (max-width: 2000px) {
            #coorEstu label {
                position: relative;
                left: -16px;
            }

            #coorProf label {
                position: relative;
                left: -16px;
            }

            @media (max-width: 575px) {
                #coorEstu label {
                    position: absolute;
                    left: -8px;
                }

                #coorProf label {
                    position: absolute;
                    left: -8px;
                }

            }


        }

        footer {
            background-color: #003368;
        }
    </style>



    <!-- Facebook Pixel Code -->
    <script>

    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=320605981652997&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->

    <!-- Hotjar Tracking Code for https://odm.com.mx/ -->
    <!-- <script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1911795,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script> -->


</head>



<body id="cursor">

    <h1 style="display: none;">Omnibus de México | Boletos de Autobús</h1>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TD3ZZ93" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <!--/////////////// NAV ////////////////////// -->
    <nav id="prueba2" class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <div>
            <a href="https://odm.com.mx/">
                <img class="img-fluid rounded mx-auto d-block img1" style="width: 69%; width: 50%" src="imagen/logoODM.webp" onerror="this.src='imagen/logoODM.png'" alt="Logo Omnibus de México">
            </a>
        </div>

        <!-- <img class="img-fluid rounded mx-auto d-block"  src="https://odm.com.mx/images/marquesina.jpg" alt=""> -->
        <button onclick="menuMovil()" class="navbar-toggler" type="button" data-toggle="" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="" id="navbarSupportedContent" style="">
            <ul class="navbar-nav mr-auto" style="margin: auto;">
                <li class="nav-item">
                    <a class="nav-link" name="envios-odm" style="width: 142px;" href="envios-odm"><i class="fas fa-shipping-fast"></i> Envíos ODM
                        <!-- <span class="sr-only">(current)</span> -->
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="width: 120px;" href="cobertura"><i class="fas fa-bus"></i> Cobertura
                        <!-- <span class="sr-only">(current)</span> -->
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="width: 160px" href="puntosgoogle"><i class="fas fa-map"></i> Puntos de
                        venta</a>
                </li>

                <li class="nav-item">
                    <!-- <a class="nav-link" href="#"><i class="far fa-handshake"></i> Servicios</a> -->
                    <a class="nav-link" style="width: 109px;" href="servicios"><i class="far fa-handshake"></i>
                        Servicios</a>
                </li>

                <li class="nav-item">
                    <a id="factura" href="https://venta.odm.com.mx/FacturacionElectronica/IndexFacturaElec.html" class="nav-link"><i class="fas fa-file-alt"></i> Facturación</a>
                </li>

            </ul>
            <!-- <form style="display: block;" id="login" class="form-inline my-2 my-lg-0 "> -->

            <div style="display: none;" class="col-lg-3">
                <ul class="nav navbar-nav navbar-right" style="padding-bottom: 100px;">
                    <li style="margin-right: 10px;"><a id="loginReg" href="#modalRegistro" data-toggle="modal"><span class="fas fa-user"></span> Ingresar</a></li>

                    <!-- <li><a href="#"><span class="fas fa-sign-in-alt"></span> Registrar</a></li> -->
                </ul>
            </div>


            <!--  </form> -->
        </div>
    </nav>

    <!-- /////////////VENTANA MODAL LOGIN //////////////////// -->

    <!-- The Modal -->
    <div class="modal fade modalFormulario" id="modalRegistro" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content modalRadius">

                <!-- Modal Header -->
                <div class="modal-header colorHeader">
                    <h4 class="modal-title">Iniciar Sesión</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="md-form mb-3">
                        <!-- <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="defaultForm-email" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email" class="">Your email</label> -->

                        <!--===========================
        	REGISTRO DIRECTO 
    	============================-->
                        <form action="post" autocomplete="nope" onsubmit="return registroUsuario()">
                            <hr>
                            <div class="form-group">


                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping-a"><i class="fas fa-envelope prefix grey-text"></i></span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="Correo" aria-label="Correo" aria-describedby="addon-wrapping" id="regCorreo" name="regCorreo" autocomplete="nope" required>
                                </div>

                            </div>
                            <div class="form-group">


                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping-b">
                                            <i class="fa fa-key" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Contraseña" aria-label="Password" aria-describedby="addon-wrapping" id="regPass" name="regPass" autocomplete="nope" required>
                                </div>

                            </div>

                            <input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">

                        </form>

                    </div>

                    <!--===========================
        	REGISTRO DIRECTO BOTON
    	============================-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 correo" id="btnCorreo">
                        <p>
                            <!-- <i class="fa fa-facebook"></i> -->
                            <i class="fas fa-envelope prefix grey-text"></i>
                            Ingresar por Correo
                        </p>
                    </div>

                    <!--===========================
        	REGISTRO FACEBOOK 
    	============================-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 facebook" id="btnFacebookRegistro">
                        <p>
                            <!-- <i class="fa fa-facebook"></i> -->
                            <i class="fab fa-facebook"></i>
                            Ingresar con Facebook
                        </p>
                    </div>


                    <!--===========================
        	REGISTRO GOOGLE 
    	============================-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 google" id="btnGoogleRegistro">
                        <p>
                            <!-- <i class="fa fa-google"></i> -->
                            <i class="fab fa-google" aria-hidden="true"></i>
                            Ingresar con Google
                        </p>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer modalFooter">
                    ¿No tienes una cuenta registrada? | <strong><a href="#">Registrar</a></strong>
                </div>

            </div>
        </div>
    </div>


    <!-- ///////////// FIN VENTANA MODAL LOGIN //////////////////// -->


    <!-- <div style="z-index: 60; position: fixed;">
<img style="height: 40px;" src="imagen/numerocetac.svg" alt="">
</div> -->


    <!-- <img class="imagen2" src="imagen/bushd.jpg" alt="Car" style="width:100%">
 -->

    <!-- ////////////////// CUADRO DE VENTAS  /////////////////////////////////////-->


    <!-- ////////////////// CUADRO DE VENTAS  /////////////////////////////////////-->


    <!-- <section style="background: linear-gradient(45deg, black, transparent);" class="contenedor-main row"> -->
    <section class="contenedor-main row colordiv">

        <!-- <img class="imagen2" src="imagen/fondocuadro.png" alt="Car" style="width:100%; height: 100%;"> -->

        <aside id="cuadro1" class="col-md-12  align-self-center colordiv">

            <!--///////// INICIO PREGUNTA ////////////// -->
            <!-- <img class="imagen2" src="imagen/fondo3_Mesa de trabajo 1.png" alt="Car" style="width:100%; height: 96%;"> -->


            <div style="margin-top: 2rem!important;" class="container mt-5 viajar">
                <div class="row">





                    <div class="col-md-12 col-lg-12" style="text-align: center;">

                        <a class="imgTel" href="tel:5551414300">
                            <img style="width:259px;height: 55px;filter: drop-shadow(0 1mm 1mm rgb(0, 0, 0));margin-left: -8px;" src="imagen/telefono4-01.webp" alt="Atención Telefónica" onerror="this.src='imagen/telefono4-01.png'">
                            <!-- imagen/telefono4-01.png -->
                            <!-- imagen/newYear.png 368px -->


                        </a>
                    </div>
                    <!-- <div class="col-md-6 col-lg-12">
								<h1>¿A donde quieres viajar?</h1>
							</div> -->

                </div>
            </div>
            <!-- /////// FIN PREGUNTA /////////////////// -->

            <div style="filter: drop-shadow(0 2mm 3mm rgb(0, 0, 0));" class="container mt-3 mb-3 cuadro2">
                <div id="coorCuadro" class="row" style="padding-bottom: 7px;">
                    <img id="cuadroloader" src="imagen/loading25.gif" alt="Carga de imagen">
                    <div id="coorCuadro2" class="col-lg-10 ">
                        <form id="formulario" class="was-validated" method="post" action="https://venta.odm.com.mx/odm/PASO1/paso1.aspx" enctype="multipart/form-data" name="formulario">
                            <div class="form-row d-flex justify-content-between">

                                <div id="intro1" class="col-md-4 col-lg-4 mb-3 mt-3">
                                    <label for="validationServer01">ORIGEN</label>
                                    <!-- <input type="text" class="form-control is-valid" id="origentext" name="origentext" placeholder="¿De Dónde Sale?" value="Aguascalientes C. Autobus" required> -->
                                    <!-- <select class="selectpicker form-control is-valid" name="origentext" id="origentext" data-container="body" data-live-search="true" title="¿De Dónde Sale?" data-hide-disabled="true" required>

									
									</select> -->

                                    <!-- <select style="height: 34px;" class="form-control is-valid" name="origenCode" id="cbx_estado" data-placeholder="¿De Dónde Sale?" data-container="body" data-hide-disabled="true" data-live-search="true"> -->

                                    <!-- /////////////////////// -->
                                    <!-- <select style="height: 34px; width: 100%;" name="origenCode" id="cbx_estado">
											
											<option selected="selected" disabled>¿De Dónde Sales?</option>
											
										
									</select> -->

                                    <select style="width: 100%; height: 39px; border: 1px solid white; border-radius: 4px; background-color: #fff;" name="origenCode" id="cbx_estado">

                                        <option selected="selected" disabled="">¿De Dónde Sales?</option>


                                        <option value="ACR">Acambaro Gto</option>
                                        <option value="ACT">Actopan Hgo</option>
                                        <option value="AEA">Aeropuerto Mty. A N.l</option>
                                        <option value="NLU">Aeropuerto Felipe Angeles</option>
                                        <option value="CNJ">Agencia Conejo</option>
                                        <option value="APS">Agua Prieta Son</option>
                                        <option value="AGU2">Aguascalientes Agr. Norte</option>
                                        <option value="AGU">Aguascalientes C. Autobus</option>
                                        <option value="AHU">Ahuacatlán Nay</option>
                                        <option value="AHT">Ahuetita</option>
                                        <option value="ALL">Allende Chih</option>
                                        <option value="CAO">Alvaro Obregon Chih</option>
                                        <option value="SAR">Altamira Tamaulipas</option>
                                        <option value="ANG">Angostura Chih</option>
                                        <option value="ASC">Ascención Chih</option>
                                        <option value="ATA">Atlacomulco Mex</option>
                                        <option value="ANA">Santa Ana Sonora</option>
                                        <option value="BAC">Bachiniva Chih</option>
                                        <option value="BJU">Benito Juarez Chih</option>
                                        <option value="SCD">Cadereyta Jimenez N.l.</option>
                                        <option value="CAC">Culiacán, Sin.</option>
                                        <option value="CAB">Caborca Sonora</option>
                                        <option value="CCA">Camargo Chih</option>
                                        <option value="CGT">Camargo Tamps.</option>
                                        <option value="C101">Campo 101 Chih</option>
                                        <option value="CSM">Campo Seis Y Medio Chih</option>
                                        <option value="CNE">Cananea Son</option>
                                        <option value="CIJ">Cañada De Islas Jal</option>
                                        <option value="CAS">Casas Grandes Chih</option>
                                        <option value="CYA">Celaya Gto</option>
                                        <option value="CHA">Chapulhuacán Hgo</option>
                                        <option value="CUU">Chihuahua Central Autobus</option>
                                        <option value="PIM">Chihuahua Pistolasmeneses</option>
                                        <option value="ZOO">Chihuahua Zootecnia</option>
                                        <option value="CHIN">China N.l.</option>
                                        <option value="ATG">Ciudad Altamirano Gro</option>
                                        <option value="CTO">Ciudad Cuauhtemoc Chih</option>
                                        <option value="DEL">Ciudad Delicias Chih</option>
                                        <option value="CGZ">Ciudad Guzman Jal</option>
                                        <option value="HID">Ciudad Hidalgo Mich</option>
                                        <option value="JIM">Ciudad Jimenez Chih</option>
                                        <option value="CJS">Ciudad Juarez Chih</option>
                                        <option value="CDM">Ciudad Mante Tamps</option>
                                        <option value="MIE">Ciudad Mier Tamps.</option>

                                        <option value="CEN">Ciudad Obregon, Son.</option>

                                        <option value="CEM">Ciudad Valles Slp</option>
                                        <option value="CVM">Ciudad Victoria Tamps</option>

                                        <option value="CIN">Col. Independencia Chih</option>
                                        <option value="COL">Colima Col</option>
                                        <option value="QVO">Colonia Quevedo Chih</option>
                                        <option value="CLT">Colotlán Jal</option>
                                        <option value="COO">Concepción Del Oro Zac</option>
                                        <option value="CBC">Corral Blanco</option>
                                        <option value="BEJ">Crucero Belén Jal</option>
                                        <option value="CPA">Crucero Palomas Chih</option>
                                        <option value="CTP">Crucero Tepatitlán Jal</option>
                                        <option value="CUE">Cuencamé Dgo</option>
                                        <option value="CUI">Cuitaca Son</option>
                                        <option value="CUT">Cutzamala Gro</option>
                                        <option value="DHI">Dolores Hidalgo Gto</option>
                                        <option value="DGO">Durango Central Autobus</option>
                                        <option value="EBA">Ebano Slp</option>
                                        <option value="BAT">El Batán Jal</option>
                                        <option value="ROD">El Rodeo Dgo</option>

                                        <option value="EML">Empalme, Sonora</option>

                                        <option value="ENC">Encarnación De Díaz Jal</option>
                                        <option value="FIM">Fco. I. Madero Dgo</option>
                                        <option value="FRE">Fresnillo Zac</option>
                                        <option value="GAL">Galeana Chih</option>
                                        <option value="VGC">Gema Cuitzeo Mich</option>
                                        <option value="GBRA">General Bravo N.l.</option>
                                        <option value="GFA">Gomez Farias Chih</option>
                                        <option value="GOP">Gomez Palacio C. Autobus</option>
                                        <option value="HAM">Terminal Hamburgo Gomez Palacio</option>
                                        <option value="SLU">Granjas Sta. Lucia Dgo</option>
                                        <option value="GDL">Guadalajara Jal. Modulo 6</option>
                                        <option value="GD1">Guadalajara Modulo 1 1/2</option>

                                        <option value="GCH">Guamuchil Sinaloa</option>

                                        <option value="GYM">Guaymas, Sonora</option>

                                        <option value="GSV">Guasave Sinaloa</option>
                                        <option value="AEG">Aeropuerto Gdl Jal</option>
                                        <option value="GVI">Guadalupe Victoria Dgo</option>
                                        <option value="GTO">Guanajuato Gto</option>
                                        <option value="HA2">Hamburgo Plaza Palmas Gomez Palacio</option>
                                        <option value="HMO">Hermosillo C. Autobuses</option>
                                        <option value="HET">Hermosillo Terminal</option>
                                        <option value="AHG">Hidalgo Reynosa</option>
                                        <option value="AHG">Hidalgo Reynosa Tamps</option>
                                        <option value="HUA">Huauchinango Pue</option>
                                        <option value="HUE">Huejucar Jal</option>
                                        <option value="ZAR">Ignacio Zaragoza Chih</option>
                                        <option value="IPO">Irapuato Gto</option>

                                        <option value="IMU">Imuris, Son.</option>
                                        
                                        <option value="IXP">Ixtapa Zihuatanejo Gro</option>
                                        <option value="IXT">Ixtlan Del Rio Nay</option>
                                        <option value="JGY">Jagueyes Chih</option>
                                        <option value="JAP">Jalpa Zac</option>
                                        <option value="JAN">Janos Chih</option>
                                        <option value="JAR">Jaralillo Jal</option>
                                        <option value="JER">Jerez Zac</option>
                                        <option value="JSA">Jesus Aguirre</option>
                                        <option value="JU2">Juan Aldama 2 Zac</option>
                                        <option value="JUA">Juan Aldama Zac</option>
                                        <option value="JUC">Juchipila. Zac.</option>
                                        <option value="LBB">La Barca Jal</option>
                                        <option value="LCM">La Copa Matamoros Tamps</option>
                                        <option value="LJA">La Joya Coah</option>
                                        <option value="MIN">La Mina Chih</option>
                                        <option value="LPI">La Piedad Mich</option>
                                        <option value="LPN">La Pinta Chih</option>
                                        <option value="LQE">La Quemada Chih</option>
                                        <option value="LZA">La Zarca Dgo</option>
                                        <option value="LGS">Lagos De Moreno Jal</option>
                                        <option value="LAG">Lagunitas Chih</option>
                                        <option value="LNI">Las Nieve Dgo</option>
                                        <option value="LVA">Las Varas Chih</option>
                                        <option value="LAC">Lazaro Cardenas Chih</option>
                                        <option value="LZC">Lazaro Cardenas Mich</option>
                                        <option value="LEB">Lebaron Chih</option>
                                        <option value="BJX">Leon Gto</option>
                                        <option value="LOR">Loreto Zac</option>
                                        <option value="LRY">Los Reyes Mich</option>
                                        <option value="LMM">Los Mochis, Sin.</option>
                                        <option value="LNA">Linares Nl.</option>
                                        <option value="LMO">Luis Moya. Zac.</option>
                                        <option value="ZLO">Manzanillo Col</option>
                                        <option value="MVT">Maravatio Mich</option>
                                        <option value="PLF">Mat. Plaza Fiesta Tamps</option>
                                        <option value="MAC">Matamoros Coahuila Coah</option>
                                        <option value="MAM">Matamoros. Tamps.</option>
                                        <option value="MHN">Matehuala Noreste</option>
                                        <option value="MA57">Matehuala Terminal 57</option>
                                        <option value="MLP">Matlapa Slp</option>
                                        <option value="MZT">Mazatlan Sin.</option>
                                        <option value="MDM">Mercado Del Mar Zapopan Centro</option>
                                        <option value="MTP">Metro Plaza</option>
                                        <option value="MXL">Mexicali B.C.</option>
                                        <option value="SPC">Mexicali Plaza Cibeles</option>
                                        <option value="MEX">Mexico Central Norte</option>
                                        <option value="OBS">Mexico Observatorio</option>

                                        <option value="MEZ">Mezcales, Nay</option>

                                        <option value="MAL">Miguel Aleman. Tamps.</option>
                                        <option value="MTY">Monterrey Central Autobus</option>
                                        <option value="MTF">Monterrey Terminal Fierro</option>
                                        <option value="SUD">Monterrey Universidad</option>
                                        <option value="MLM">Morelia Mich</option>
                                        <option value="MRL">Moroleon Gto</option>
                                        <option value="LOV">Monclova Coah.</option>
                                        <option value="MNR">Montemorelos Nl.</option>
                                        <option value="MOY">Moyahua Zac</option>
                                        <option value="NOC">Nochistlán Zac</option>
                                        <option value="NOG">Nogales Son</option>
                                        <option value="NDI">Nombre De Dios Dgo</option>
                                        <option value="NLD">Nuevo Laredo Tamps.</option>
                                        <option value="NAV">Navojoa Sonora</option>
                                        <option value="NAJ">Navojoa Centro</option>
                                        <option value="OCO">Ocotlan Jal</option>
                                        <option value="OJI">Ojinaga Chih</option>
                                        <option value="OCN">Ojo Caliente Nte-sur Zac</option>
                                        <option value="PCA">Pachuca Hgo</option>
                                        <option value="PAR">Parral. Chih.</option>

                                        <option value="PJM">Penjamo Gto.</option>

                                        <option value="PVR">Puerto Vallarta Jal.</option>

                                        <option value="SAC">Plaza Agricultores</option>

                                        <option value="PAG">Suc. Paseos Agu.</option>
                                        <option value="PTC">Patzcuaro Mich</option>
                                        <option value="PEB">Peña Blanca Chih</option>
                                        <option value="PBC">Peñon Blanco Dgo</option>
                                        <option value="SPM">Periférico Matamoro tamps</option>
                                        <option value="PAZ">Poza Rica Ver</option>
                                        <option value="PUR">Puruandiro, Michoacan</option>
                                        <option value="VLL">Nuevo Vallarta, Nay.</option>
                                        <option value="PPA">Puerto Palomas Chih.</option>
                                        <option value="QET">Queretaro Qro</option>
                                        <option value="RCO">Rancho Colorado Chih</option>
                                        <option value="REX">Reynosa. Tams.</option>
                                        <option value="RFM">Ricardo Flores Magon. Chi</option>
                                        <option value="RIB">Rio Bravo Tamps.</option>
                                        <option value="RGR">Rio Grande Zac</option>
                                        <option value="SAI">Sain Alto Zac</option>
                                        <option value="SMX">Salamanca Gto</option>
                                        <option value="SLN">Salinas Slp</option>
                                        <option value="SWN">Saltillo Norte</option>
                                        <option value="SLW">Saltillo Central Autobus</option>
                                        <option value="SIO">Saltillo Suc. El Indio</option>
                                        <option value="SAV">Salvatierra Gto</option>
                                        <option value="SBV">San Buenaventura. Chih.</option>
                                        <option value="SFG">San Felipe Gto Gto</option>
                                        <option value="SJL">San Juan De Los Lagos jal</option>
                                        <option value="SJQ">San Juan Del Rio, Qro.</option>
                                        <option value="LZO">San Lorenzo Chih</option>
                                        <option value="UAC">San Luis Rio Colorado Son.</option>
                                        <option value="SPA">San Luis De La Paz Gto</option>
                                        <option value="SLP">San Luis Potosi. Slp.</option>
                                        <option value="SMA">San Miguel Allende Gto</option>
                                        <option value="APU">San Pedro Apulco Zac</option>
                                        <option value="STD">Santa Maria Del Oro Dgo</option>
                                        <option value="SAU">Saucillo Chih</option>
                                        <option value="SIL">Silao Gto</option>
                                        <option value="SOM">Sombrerete Zac</option>
                                        <option value="SON">Sonoyta Sonora</option>
                                        <option value="SOT">Soto Mainez Chih</option>
                                        <option value="CFN">Suc Contraflujo Norte</option>
                                        <option value="CZO">Suc. El Carrizo Hgo. Dgo</option>
                                        <option value="MXS">Suc. Mexticacan Jal</option>
                                        <option value="STZ">Suc. Tecnológico Zac</option>
                                        <option value="SMOR">Sucursal Morelos</option>
                                        <option value="PA2">Sucursal Parral Chih</option>
                                        <option value="SCA">Sucursal Santa Catarina</option>
                                        <option value="SLX">Super Lexo</option>
                                        <option value="TAB">Tabasco. Zac.</option>
                                        <option value="TMZ">Tamazunchale Slp</option>
                                        <option value="TAH">Tamiahua Ver</option>
                                        <option value="TAM">Tampico Central Autobus</option>
                                        <option value="TMN">Tampico Norte Tamps</option>
                                        <option value="TLE">Tampico Terminal Ejercito</option>
                                        <option value="TAN">Tamuin Slp</option>
                                        <option value="TEC">Tecoman Col</option>
                                        <option value="TEJ">Tejupilco Mex</option>
                                        <option value="TEO2">Teocaltiche 2 Jal</option>
                                        <option value="TEO">Teocaltiche Jal</option>
                                        <option value="TPT">Tepatitlan Jal</option>
                                        <option value="TNY">Tepic Central Autobus Nay</option>
                                        <option value="CLO">Tepic Terminal Colosio</option>
                                        <option value="TPZ">Tepotzotlán Mex</option>
                                        <option value="TEU">Teul De Glez Ortega Zac</option>
                                        <option value="TLA">Tlaltenango Zac</option>
                                        <option value="TIJ">Tijuana B.C.</option>
                                        <option value="TLC">Toluca Mex</option>
                                        <option value="TRC">Torreón Coah</option>
                                        <option value="TLI">Tren Ligero Jal</option>
                                        <option value="TCA">Tres Castillos. Chih.</option>
                                        <option value="THG">Tula Hgo</option>
                                        <option value="TUJ">Tuxpan Jalisco Jal</option>
                                        <option value="TXM">Tuxpan Michoacán Mich</option>
                                        <option value="TCT">Tuxpan Term. Centro Ver</option>
                                        <option value="TXP">Tuxpan Veracruz</option>
                                        <option value="URI">Uriangato</option>
                                        <option value="UPN">Uruapan Mich</option>
                                        <option value="VHT">Valle Hermoso Tamps</option>
                                        <option value="VENC">Venecia Tamps.</option>
                                        <option value="VGE">Vicente Guerrero Dgo</option>
                                        <option value="VAH">Villa Ahumada Chih</option>
                                        <option value="VOC">Villa Ocampo. Dgo</option>
                                        <option value="VIL">Villanueva Zac</option>
                                        <option value="VREA">Villarreales</option>
                                        <option value="VIG">Villas De Guadiana Dgo</option>
                                        <option value="YAH">Yahualica Jal</option>
                                        <option value="YUR">Yuriria Gto</option>
                                        <option value="ZCL">Zacatecas Central Autobus</option>
                                        <option value="GZA">Zacatecas Trmnl Guadalupe</option>
                                        <option value="ZAM">Zamora Mich</option>
                                        <option value="ZPP">Zapopan Jal</option>
                                        <option value="ZIH">Zihuatanejo Gro</option>
                                        <option value="ZTC">Zitacuaro Mich</option>
                                    </select>


                                    <!-- //////////////////////////// -->

                                    <!-- <select style="opacity: 0;" class="valores" id="origen">
						      			<option selected="selected" disabled>¿De Dónde Sales?</option> -->
                                    <!-- <option value="MEX">Ciudad de México</option> -->

                                    <!-- </select> -->


                                </div>


                                <div id="intro2" class="col-md-4 col-lg-4 mb-3 mt-md-3">
                                    <label for="validationServer02">DESTINO</label>
                                    <!-- <input type="text" class="form-control is-valid" id="destinotext" name="destinotext" placeholder="¿A Dónde Va?" value="Mexico Central Norte" required>
								      <input type="hidden" value="MEX" name="destinoCode" id="destinoCode"> -->
                                    <!-- <select class="selectpicker form-control is-valid" name="destinotext" id="destinotext" data-container="body" data-live-search="true" title="¿A Dónde Va?" data-hide-disabled="true" required>
									  </select> -->

                                    <select style="width: 100%; height: 39px; border: 1px solid white; border-radius: 4px; background-color: #fff;" name="destinoCode" class="valores" id="cbx_municipio">
                                        <option selected="selected" disabled>¿A Dónde Viajas?</option>
                                        <!-- <option value="MTY">Monterrey Nuevo Leon</option> -->
                                    </select>



                                </div>

                                <div class="col-md-4 col-lg-4 mb-3 mt-md-3 focusfecha1">
                                    <label for="validationServer02">SALIDA</label>
                                    <!-- <input type="date" class="form-control is-valid" min="<?php echo date("Y-m-d"); ?>" id="fechasalida1" value="<?php echo date("Y-m-d"); ?>"  required> -->


                                    <!-- <input type="text" class="form-control" name="fechSalida" id="fechasalida1" autocomplete="off" readonly="readonly" value="<?php echo date("d/m/Y"); ?>" required>   -->

                                    <input aria-label="fecha_salida" type="text" class="form-control" name="fechSalida" id="fechasalida1" autocomplete="off" readonly="readonly" value="<?php echo date("d/m/Y"); ?>" required>

                                    <!-- <input type="text" id="date_range" name="date_range" class="form-control pull-right"> -->

                                    <!-- <input id="datepicker" width="270" /> -->

                                    <!-- <input type="text" class="form-control fechSalida" name="fechSalida" id="fechasalida1" autocomplete="off" readonly="readonly" value="<?php echo date("d/m/Y"); ?>" required>   -->
                                    <!-- <br> -->
                                    <!-- <input type="date" id="bday" name="bday" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"> -->
                                    <!-- <input placeholder="Selected date" type="text" id="date-picker-example" class="form-control datepicker"> -->
                                    <!-- <br> -->

                                    <!-- <p>Date: <input type="text" id="datepicker"></p> -->

                                    <!-- <input type="hidden" id="fechasalida2" name="fechSalida" value=""> -->



                                    <input type="hidden" name="origenText" value="MEX">
                                    <input type="hidden" name="destinoText" value="TIJ">
                                    <input type="hidden" name="viajeredondo" value="1">
                                    <input type="hidden" name="promociones" value="1">

                                    <!-- VARIABLES IMPORTANTEs -->
                                    <!-- <input type="hidden" value="ACR" name="destinoCode" id="destinos" /> -->
                                    <input type="hidden" value="ODM" name="marca" id="marca" />
                                    <input type="hidden" value="escritorio" name="version" id="version" />
                                    <input type="hidden" value="_" name="reservacionText" id="reservacionText" />



                                </div>


                            </div>
                            <!-- /////////////////////////////////////////////////// TIPO BOLETO ////////////////////// -->
                            <div id="texto" class="form-row d-flex justify-content-between">
                                <!-- /////////. ADULTO. ////////// -->


                                <table class="tablaControl" style="max-width:510px;" width="100%" border="0">
                                    <tr>
                                        <td class="basico">
                                            <div id="coorAdul" class="col-lg-1 col-md-1 col-sm-2 col-xs-3 d-flex order-2 order-lg-1 order-md-1 order-xs-1">
                                                <div style="padding-right: 0; padding-left: 0;" class="mr-lg-2 ml-lg-2 col-md-12">

                                                    <label class="tamlabel" for="validationServer02">ADULTO</label>

                                                    <select name="adultos" id="adultos" class="custom-select selectam" required>
                                                        <option value="0">0</option>
                                                        <option value="1" selected>1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="basico">
                                            <div id="coorMenor" class="col-lg-1 col-md-1 col-sm-2 col-xs-3 d-flex order-3 order-lg-2 order-md-2 order-xs-2">
                                                <div style="padding-right: 0; padding-left: 0;" class="mr-lg-2 ml-lg-2 col-md-12">
                                                    <label class="tamlabel" for="validationServer02">MENOR</label>
                                                    <select name="menores" id="menor" class="custom-select selectam" required>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </td>
                                        <td class="basico">

                                            <div id="coorInapam" class="col-lg-1 col-md-1 col-sm-2 col-xs-2 d-flex order-4 order-lg-3 order-md-3 order-xs-3">

                                                <div style="padding-right: 0; padding-left: 0;" class="mr-lg-2 ml-lg-2 col-md-12">

                                                    <label class="tamlabel" for="validationServer02">INAPAM</label>
                                                    <select name="senectud" id="inapam" class="custom-select selectam" required>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                    </select>



                                                </div>

                                            </div>


                                        </td>
                                        <td class="basico2">

                                            <div id="coorEstu" class="col-lg-1 col-md-1 col-sm-2 col-xs-2 d-flex order-4 order-lg-3 order-md-3 order-xs-3">

                                                <div style="padding-right: 0; padding-left: 0;" class="mr-lg-2 ml-lg-2 col-md-12">

                                                    <label class="tamlabel" for="validationServer02">ESTUDIANTE</label>

                                                    <select name="estudiantes" id="estudiantes" class="custom-select selectam" required>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </td>
                                        <td class="basico2">
                                            <div id="coorProf" class="col-lg-1 col-md-1 col-sm-2 col-xs-2 d-flex order-4 order-lg-3 order-md-3 order-xs-3">

                                                <div style="padding-right: 0; padding-left: 0;" class="mr-lg-2 ml-lg-2 col-md-12">

                                                    <label class="tamlabel" for="validationServer02">PROFESOR</label>

                                                    <select name="profesores" id="profesores" class="custom-select selectam" required>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                    </select>



                                                </div>

                                            </div>


                                        </td>

                                    </tr>
                                </table>






                                <div id="ocultar">

                                </div>
                                <!-- //////// VIAJE REDONDO /////////// -->

                                <div style="position: absolute;right: 0px;" class="col-lg-4 col-md-4 mb-3 order-1 order-lg-6 order-md-6 order-xs-1">

                                    <div style="padding-right: 0; padding-left: 0;" class="col-lg-12">



                                        <input type="checkbox" id="ritema" />

                                        <label for="ritema" id="fecharegreso2">Viaje redondo</label>
                                        <!-- <input style="display: none;" type="date" class="form-control is-valid" min="<?php echo date("Y-m-d"); ?>"  id="fecharegreso" value=""> -->
                                        <!-- <input type="text" style="display: none;" class="form-control" name="fechRegreso" id="fecharegreso" autocomplete="off" readonly="readonly" value="_" required>   -->

                                        <input type="text" aria-label="fechaRegreso" style="display: none;" class="form-control" name="fechRegreso" id="fecharegreso" autocomplete="off" readonly="readonly" value="_" required>
                                        <!-- <input type="hidden"  id="fecharegreso3" name="fechRegreso" value="_" /> -->

                                    </div>

                                </div>


                            </div>

                            <div id="msjAdulto">
                                <h6 style="font-size: small;">ADULTO: 12 años en adelante</h6>
                            </div>
                            <div id="msjMenor">
                                <h6 style="font-size: small;">MENOR: de 6 a 11 años</h6>
                            </div>
                            <div id="msjInapam">
                                <h6 style="font-size: small;">SENECTUD: Presentar documentación oficial</h6>
                            </div>
                            <div id="msjEstud">
                                <h6 style="font-size: small;">ESTUDIANTES: Presentar credencial vigente</h6>
                            </div>
                            <div id="msjProfe">
                                <h6 style="font-size: small;">PROFESORES: Presentar credencial vigente</h6>
                            </div>

                            <!-- /////////////// -->
                            <!-- ////////////// BOLETOS OCULTOS //////////// -->



                            <!-- /////////////////////////////////////////////////////////////// -->



                    </div>
                    <div style="text-align: right;" id="coorBuscar" class="col-lg-2 align-self-center mb-4">
                        <button class="btn btn-danger btn-block mb-3 mt-3" id="idboton" type="submit">Buscar
                            Viaje</button>
                        <!-- <button class="btn btn-danger btn-block mb-3 mt-3" id="idboton2" type="submit">Buscar Viaje</button> -->

                        <!-- <button id="idboton2" type="button" class="btn btn-danger btn-block mb-3 mt-3" data-toggle="modal" data-target="#exampleModalCenter">
							Buscar Viaje
						</button> -->

                        <button class="btn btn-danger btn-block mb-1 mt-1" id="reservar">Reservar</button>
                        <!-- <button class="btn btn-danger btn-block mb-1 mt-1" id="reservar2">Reservar</button> -->

                        <!-- <button id="reservar2" type="button" class="btn btn-danger btn-block mb-1 mt-1" data-toggle="modal" data-target="#exampleModalCenter">
						Reservar
						</button> -->
                        <!-- <p align="right">SENECTUD: Presentar documentación oficial</p> -->
                        <!-- <h6 align="right">INAPAM: <small>Presentar documentación oficial</small></h6> -->
                        <!-- <div id="travel" style="margin: 0px 0px 15px 0px;">
									<a href="https://www.priceres.com.mx/omnibus-demexico/paquetes" target="_blanck">Autobús + Hotel
										<img src="imagen/pricetravel.jpg" width="115" alt="">
									</a>
								</div> -->
                        </form>
                    </div>
                </div>
            </div>
            <!-- ////////////// FIN FORMULARIO VENTAS //////////////////// -->

            <div class="container">

                <!-- <div class="row cuadroage justify-content-end">
						<div class="columna col-6" align="right">
							<a href="https://www.priceres.com.mx/omnibus-demexico/paquetes" target="_blanck">
								<img src="imagen/pricetravel.jpg" width="115" style="" alt="">
							</a>
						</div>
						<div class="columna col-6"><a style="color: #fff;" href="http://venta.odm.com.mx/netScripts/request.aspx?APPNAME=Navegante&PRGNAME=AccesoEx&ARGUMENTS=-AAG" target="_blanck"> | AGENCIAS </a></div>
					</div>
 -->
                <div class="w-100"></div>

                <div style="filter: drop-shadow(0 2mm 3mm rgb(0, 0, 0));" class="row justify-content-center">
                    <div class="columna cuadroage2 col-12" align="center">
                        <!-- <img id="cancerIzq" style="width: 100px; max-width: 100%;" class="card-img-top" src="imagen/cma-Izq.png" alt="Card image cap"> -->
                        <img style="width: 460px; max-width: 100%;" class="card-img-top" src="imagen/logoODMplus.svg" alt="Card image cap">
                        <!-- <img id="cancerDer" style="width: 100px; max-width: 100%;" class="card-img-top" src="temporadas/73aniversarioe.jpg" alt="Card image cap"> -->
                        <!-- <img id="cancerDer" style="width: 184px;max-width: 100%;" class="card-img-top" src="temporadas/14Feb5.png" alt="Card image cap"> -->
                        <!-- <img id="cancerDer" style="width: 100px; max-width: 100%;" class="card-img-top" src="imagen/cma-der.png" alt="Card image cap"> -->
                    </div>

                </div>

                <!-- <div align="center" class="row descuentos mt-5"> -->
                <div style="text-align: center; margin-top: 25px;">
                    <!-- <div style="" class="col-lg-12">
						<h4 style="color: red;font-weight: bold; font-size: 30px;">10%
							<small style="color: #ffffff; font-size: 19.2px;">de descuento viaje sencillo,</small>
							+ 10%<small style="color: #ffffff; font-size: 19.2px;"> en boleto de regreso al comprar viaje redondo.</small>
						</h4>
					</div>
					<div style="" class="col">
						<h4><small style="color: #ffffff;">Aplica en todas las rutas</small></h4>
					</div> -->
                    <!-- <img style="max-width: 100%;" src="https://tap.com.mx/sliders/home/documentacion/seguridad.jpg" alt="">-->


                    <div id="slider4" style="display: block;" class="mt-5 mb-5 bd-example colorslide1">
                        <div id="carouselExampleCaptions4" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <!--<li data-target="#carouselExampleCaptions4" data-slide-to="0" class="active"></li>
								<li data-target="#carouselExampleCaptions4" data-slide-to="1"></li>
								<li data-target="#carouselExampleCaptions4" data-slide-to="2"></li>
								<li data-target="#carouselExampleCaptions4" data-slide-to="3"></li> -->


                            </ol>
                            <div style="text-align: center;" class="carousel-inner">
                                <div class="carousel-item active">
                                    <a target="_blank" href="https://odm.com.mx/app.html">
                                        <img style="max-width: 600px; max-height: 800px;" src="images/Banner_App.webp" class="img-fluid mx-auto d-block w-100 img5" alt="App de Omnibus de México">
                                    </a>
                                    <div class="carousel-caption d-none d-md-block">

                                    </div>
                                </div>

                                <div class="carousel-item">



                                    <!-- <img style="max-width: 600px; max-height: 462px;" src="images/venta_vacacional_2023.webp" onerror="this.src='images/venta_vacacional_2023.jpg'" class="img-fluid mx-auto d-block w-100 img4" alt="descuentos en boletos de autobus"> -->

                                    <img style="max-width: 550px; max-height: 800px;" src="images/Banner_servicios_DD.webp" class="img-fluid mx-auto d-block w-100 img4" alt="">

                                    <div class="carousel-caption d-none d-md-block">

                                    </div>
                                </div>


                                <div class="carousel-item">
                                    <a target="_blank" href="#">

                                        <img style="max-width: 550px; max-height: 800px;" src="seguridad.jpg" class="img-fluid mx-auto d-block w-100 img3" alt="Boleto de autobus para viajar de monclova a monterrey">

                                    </a>
                                    <div class="carousel-caption d-none d-md-block">

                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div id="appODM">
                                        <img style="max-width: 600px; max-height: 800px;" src="images/Banner_ODM_pacifico.webp" class="img-fluid mx-auto d-block w-100 img2" alt="App de Omnibus de México">
                                    </div>
                                    <div class="carousel-caption d-none d-md-block">

                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div id="appODM">

                                        <img style="max-width: 600px; max-height: 800px;" src="images/Banner_Viaja_DD.webp" onerror="this.src='imagen/bannerb.jpg'" class="img-fluid mx-auto d-block w-100 img1" alt="App de Omnibus de México">


                                    </div>
                                    <div class="carousel-caption d-none d-md-block">

                                    </div>
                                </div>


                                <!-- 
									<div class="carousel-item">
									<a target="_blank" href="#">

										<img style="max-width: 600px; max-height: 800px;" src="temporadas/ventaVacODM.webp" onerror="this.src='temporadas/ventaVacODM.jpg'" class="img-fluid mx-auto d-block w-100 img4" alt="Boletos de autobus con descuento">

									</a>
									<div class="carousel-caption d-none d-md-block">

									</div>
								</div>
								-->



                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions4" role="button" data-slide="prev">

                                <span class="fas fa-angle-left estilofrlecha"></span>

                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions4" role="button" data-slide="next">
                                <span class="fas fa-angle-right estilofrlecha" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>


                </div>



            </div>
        </aside>
    </section>


    <div class="colordiv">

    </div>


    <!-- ////////////////////// INICIO TARJETAS PROMO ////////////// -->

    <!-- MANTENIMIENTO -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="height: 332px; border-radius: 40%;">
                <!-- <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div> -->
                <div class="modal-body" style="background: url('https://i.pinimg.com/736x/78/c9/f2/78c9f288a201afdd6024a7a0634ec0e8.jpg'); display: inline-table; width: 100%; border-radius: 42px;">
                    <h3 id="textMant" style="display: table-cell; vertical-align: middle; text-align: center;">
                        Estimados usuarios, les informamos que entramos en mantenimiento de nuestro sitio web,
                        lamentamos
                        los inconvenientes que esto les ocasione
                        les pedimos de la manera mas atenta comprar sus boletos directamente en nuestras taquillas.
                        <br>
                        Gracias por su comprensión.
                        <br>
                    </h3>
                </div>


                <!-- <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div> -->
            </div>
        </div>
    </div>

    <!-- FIN MANTENIMIENTO -->

    <div class="container">
        <div class="row lineapromo mb-5">
            <div align="center" class="col">
                <h2>Viajes más solicitados</h2>
            </div>
        </div>



        <div class="row">
            <div class="col">
                <div id="tarjprueba" class="card-deck">



                    <!-- TARJETA BD -->
                    <!-- 

                    <div class="card border-danger mb-3" style="min-width: 250px;">
                            <div class="card-header">

                                <h4 class="my-0 text-center">
                                            México Central Norte - Durango Central Autobús</h4>
                            </div>
                            <div class="card-body text-center">
                                
                                <h2>Precio por Internet</h2>



                                <h3>$1,692.00<span class="text-muted">mx</span>

                                </h3>


                                <h5 style="color: red;"><del>$1,880.00</del>
                                    <span class="text-muted">Precio normal</span>
                                </h5>
                                <ul class="list-unstyled">

                                    <li style="color: black; font-weight: bold; font-size: larger; margin: 0px 0px 5px 0px;" >Viaje redondo</li>
                                    <li style="font-size: larger;">$3,215.00</li>
                                    
                                    <li style="color: black; font-weight: bold;">ahorro</li>
                                    <li style="font-size: medium;">$545.00</li>
    
                                </ul>
                                <input id="orgsig1" type="hidden" value="MEX" >
                                <input id="orgcom1" type="hidden" value="Mexico Central Norte" >
                                <input id="destsig1" type="hidden" value="DGO" >
                                <input id="destcom1" type="hidden" value="Durango Central Autobus" >
                            </div>
                            <div class="card-footer bg-transparent" style="border-top: 0px;">
                                <button id="tar_1" class="btn btn-outline-danger btn-lg btn-block tar">Comprar</button>

                            </div>
                        </div>
                    -->

                    <div class="card border-danger mb-3" style="min-width: 250px;">
                        <div class="card-header">

                            <h4 class="my-0 text-center">Culiacán Sinaloa - Tijuana B.C.</h4>
                        </div>
                        <div class="card-body text-center">

                            <h2>Precio por Internet</h2>

                            <h3>$1,856.00<span class="text-muted">mx</span>

                            </h3>

                            <!-- <h5 style="color: red;"><del>$1,510.00</del>
								<span class="text-muted">Precio normal</span>
							</h5> -->
                            <ul class="list-unstyled">

                                <li style="color: black; font-weight: bold; font-size: larger; margin: 0px 0px 5px 0px;">
                                    Viaje redondo</li>
                                <li style="font-size: larger;">$3,526.00</li>

                                <li style="color: black; font-weight: bold;">ahorro</li>
                                <li style="font-size: medium;">$186.00</li>

                            </ul>
                            
                        </div>
                        <div class="card-footer bg-transparent" style="border-top: 0px;">
                            <button onclick="fichas(this)" textOrig="Culiacán Sinaloa" nomOrig="CAC" textDest="Tijuana B.C." nomDest="TIJ" id="tar_1" class="btn btn-outline-danger btn-lg btn-block tar">Comprar</button>
                        </div>
                    </div>

                    <div class="card border-danger mb-3" style="min-width: 250px;">
                        <div class="card-header">

                            <h4 class="my-0 text-center">
                                Ciudad Obregón Son. - Tijuana B.C.</h4>
                        </div>
                        <div class="card-body text-center">

                            <h2>Precio por Internet</h2>



                            <h3>$1,579.00<span class="text-muted">mx</span>

                            </h3>


                            <!-- <h5 style="color: red;"><del>$1,265.00</del>
								<span class="text-muted">Precio normal</span>
							</h5>-->

                            <ul class="list-unstyled">

                                <li style="color: black; font-weight: bold; font-size: larger; margin: 0px 0px 5px 0px;">
                                    Viaje redondo</li>
                                <li style="font-size: larger;">$3,000.00</li>

                                <li style="color: black; font-weight: bold;">ahorro</li>
                                <li style="font-size: medium;">$158.00</li>

                            </ul>
                            
                        </div>
                        <div class="card-footer bg-transparent" style="border-top: 0px;">
                            <button onclick="fichas(this)" textOrig="Ciudad Obregon" nomOrig="CEN" textDest="Tijuana B.C." nomDest="TIJ" id="tar_2" class="btn btn-outline-danger btn-lg btn-block tar">Comprar</button>

                        </div>
                    </div>
                    <div class="card border-danger mb-3" style="min-width: 250px;">
                        <div class="card-header">

                            <h4 class="my-0 text-center">
                                México Central Norte
                                - Altamira Tamaulipas</h4>
                        </div>
                        <div class="card-body text-center">

                            <h2>Precio por Internet</h2>



                            <h3>$890.00<span class="text-muted">mx</span>

                            </h3>


                            <h5 style="color: red;"><del>$990.00</del>
                                <span class="text-muted">Precio normal</span>
                            </h5>
                            <ul class="list-unstyled">

                                <li style="color: black; font-weight: bold; font-size: larger; margin: 0px 0px 5px 0px;">
                                    Viaje redondo</li>
                                <li style="font-size: larger;">$1,691.00</li>

                                <li style="color: black; font-weight: bold;">ahorro</li>
                                <li style="font-size: medium;">$287.00</li>

                            </ul>
                           
                        </div>
                        <div class="card-footer bg-transparent" style="border-top: 0px;">
                            <button onclick="fichas(this)" textOrig="Mexico Central Norte" nomOrig="MEX" textDest="Altamira Tamaulipas" nomDest="SAR" id="tar_3" class="btn btn-outline-danger btn-lg btn-block tar">Comprar</button>

                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>
    </div>
    <!-- ////////////////////// FIN TARJETAS PROMO ////////////// -->

    <!-- ///////////////////////////////////// IMAGENES 3 //////////////////////////////////// -->
    <!-- <section class="mb-5">

			<div class="">
			  <img  class="img-fluid" width="100%" src="imagen/imagen3.png" />
			</div>

		</section> -->
    <div id="loader3" style="text-align: center;">
        <img src="imagen/loader.gif" alt="Cargando imagen">
    </div>

    <div id="slider3" style="display: none;" class="mt-5 mb-5 bd-example">
        <div id="carouselExampleCaptions2" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions2" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions2" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions2" data-slide-to="2"></li>
                <li data-target="#carouselExampleCaptions2" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a target="_blank" href="https://tap.com.mx/"><img src="imagen/TAPbanner.webp" class="d-block w-100 img11" alt="..."></a>
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>First slide label</h5>
	          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
                    </div>
                </div>
                <div class="carousel-item">
                    <a target="_blank" href="https://noreste.com.mx/"><img src="imagen/noreste2020.webp" class="d-block w-100 img12" alt="..."></a>
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>Second slide label</h5>
	          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                    </div>
                </div>

                <div class="carousel-item">
                    <a target="_blank" href="https://www.omnibusmexicanos.com.mx/"><img src="imagen/OMEXbanner.webp" class="d-block w-100 img13" alt="..."></a>
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>Third slide label</h5>
	          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
                    </div>
                </div>

                <div class="carousel-item">
                    <a target="_blank" href="https://omexvip.com.mx"><img src="imagen/bannerOmexVip.webp" class="d-block w-100 img14" alt="..."></a>
                    <div class="carousel-caption d-none d-md-block">

                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- ///////////////////////// FIN IMAGENES 3 ///////////////////// -->

    <!-- ///////////////////////////////////// IMAGENES 1 //////////////////////////////////// -->
    <!-- <section class="mt-5 mb-5">

			<div align="center" class="container">
			  <img  class="img-fluid" width="90%" src="imagen/imagen1.png" />
			</div>

		</section> -->
    <!-- <div id="page-loader"><span class="preloader-interior"></span></div> -->

    <div id="loader1" style="text-align: center;">
        <img src="imagen/loader.gif" alt="Cargando imagen">
    </div>

    <div id="slider1" style="display: none;" class="mt-5 mb-5 bd-example colorslide1">
        <div id="carouselExampleCaptions3" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <!--<li data-target="#carouselExampleCaptions3" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleCaptions3" data-slide-to="1"></li>
				<li data-target="#carouselExampleCaptions3" data-slide-to="2"></li>
				<li data-target="#carouselExampleCaptions3" data-slide-to="3"></li>
				<li data-target="#carouselExampleCaptions3" data-slide-to="4"></li>
				<li data-target="#carouselExampleCaptions3" data-slide-to="5"></li>
				 <li data-target="#carouselExampleCaptions3" data-slide-to="6"></li> -->

            </ol>
            <div style="text-align: center;" class="carousel-inner">

                <!-- <div  class="carousel-item active">
	        <a target="_blank" href="#">
	        	<img style="max-width: 600px; max-height: 800px;" src="imagen/landing/odm_descuentos.webp" class="img-fluid mx-auto d-block w-100 img17" alt="..."></a>
	        <div class="carousel-caption d-none d-md-block">
	          
	        </div>
	      </div> -->

                <!-- <div class="carousel-item active">
					<a target="_blank" href="#">
						<img style="max-width: 600px; max-height: 800px;" src="imagen/landing/nventaODM2.webp" class="img-fluid mx-auto d-block w-100 img18" alt="..."></a>
					<div class="carousel-caption d-none d-md-block">
					
					</div>
				</div> -->

                <div class="carousel-item active">
                    <a target="_blank" href="#">
                        <!-- <img style="max-width: 600px; max-height: 800px;" src="imagen/landing/CJS_1.webp" class="img-fluid mx-auto d-block w-100 img3" alt="..."> -->
                        <!--<img style="max-width: 600px; max-height: 800px;" src="imagen/landing/monclova.webp" class="img-fluid mx-auto d-block w-100 img3" alt="..."> -->
                        <img style="max-width: 600px; max-height: 800px;" src="images/seguridad.jpg" onerror="this.src='images/seguridad.webp'" class="img-fluid mx-auto d-block w-100 img3" alt="...">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>Second slide label</h5>
	          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                    </div>
                </div>


                <div class="carousel-item">
                    <a target="_blank" href="#">
                        <!--<img style="max-width: 600px; max-height: 800px;" src="imagen/landing/AGU_1.webp" class="img-fluid mx-auto d-block w-100 img3" alt="...">-->
                        <img style="max-width: 600px; max-height: 800px;" src="imagen/landing/monclova.webp" onerror="this.src='imagen/landing/monclova.jpg'" class="img-fluid mx-auto d-block w-100 img4" alt="...">

                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>Second slide label</h5>
	          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                    </div>
                </div>

                <div class="carousel-item">
                    <a target="_blank" href="#">
                        <img style="max-width: 600px; max-height: 800px;" src="imagen/landing/MEX_1.webp" onerror="this.src='imagen/landing/MEX_1.jpg'" class="img-fluid mx-auto d-block w-100 img19" alt="...">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>Third slide label</h5>
	          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
                    </div>
                </div>

                <div class="carousel-item">
                    <a target="_blank" href="#">
                        <img style="max-width: 600px; max-height: 800px;" src="imagen/landing/TRC_1.webp" onerror="this.src='imagen/landing/TRC_1.jpg'" class="img-fluid mx-auto d-block w-100 img20" alt="...">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>Third slide label</h5>
	          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
                    </div>
                </div>

                <div class="carousel-item">
                    <a target="_blank" href="#">
                        <img style="max-width: 600px; max-height: 800px;" src="imagen/landing/TAM_1.webp" class="img-fluid mx-auto d-block w-100 img6" alt="...">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>Third slide label</h5>
	          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
                    </div>
                </div>




            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions3" role="button" data-slide="prev">
                <!-- <span class="carousel-control-prev-icon " aria-hidden="true"></span> -->
                <span class="fas fa-angle-left estilofrlecha"></span>
                <!-- <i class="fas fa-angle-left"></i> -->
                <!-- <i class="fas fa-angle-left"></i> -->
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions3" role="button" data-slide="next">
                <span class="fas fa-angle-right estilofrlecha" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- ///////////////////////// FIN IMAGENES 1 ///////////////////// -->





    <!-- /////////////////// INICIO BLOG /////////////////////////-->
    <div id="loader2" style="text-align: center;">
        <img src="imagen/loader.gif" alt="Cargando imagen">
    </div>

    <div id="slider2" style="display: none;" class="mt-5 mb-5 bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <!-- <a target="_blank" href="http://odmblog.com.mx/category/turismoexperiencias/"><img src="imagen/turismo.webp" class="d-block w-100 img7" alt="..."></a> -->
                    <a target="_blank" href="https://odmblog.com.mx/category/turismoexperiencias/"><img src="imagen/turismo.webp" onerror="this.src='imagen/turismo.jpg'" class="d-block w-100 img7" alt="..."></a>
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>First slide label</h5>
	          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
                    </div>
                </div>
                <div class="carousel-item">
                    <!-- <a target="_blank" href="http://odmblog.com.mx/category/platillos-de-mexico/"> -->
                    <a target="_blank" href="https://odmblog.com.mx/category/gastronomia/">
                        <img src="imagen/gastronomia.webp" onerror="this.src='imagen/gastronomia.jpg'" class="d-block w-100 img8" alt="...">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>Second slide label</h5>
	          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                    </div>
                </div>
                <div class="carousel-item">
                    <!-- <a target="_blank" href="http://odmblog.com.mx/category/eventos-culturales-de-mexico/"> -->
                    <a target="_blank" href="https://odmblog.com.mx/category/eventos-culturales/">
                        <img src="imagen/eventos.webp" onerror="this.src='imagen/eventos.jpg'" class="d-block w-100 img9" alt="...">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>Third slide label</h5>
	          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
                    </div>
                </div>
                <div class="carousel-item">
                    <!-- <a target="_blank" href="http://odmblog.com.mx/category/pueblos-magicos-de-mexico/"> -->
                    <a target="_blank" href="https://odmblog.com.mx/category/pueblos-magicos/">
                        <img src="imagen/pueblos.webp" onerror="this.src='imagen/pueblos.jpg'" class="d-block w-100 img10" alt="...">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>Third slide label</h5>
	          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- /////////////////// FIN BLOG /////////////////////////-->

    <!-- /////////////////////////////////////////////////////////// -->


    <!-- ///////////////////////////////////// IMAGENES 2 //////////////////////////////////// -->
    <!-- <section class="mb-5">

			<div align="center" class="container">
			  <img  class="img-fluid" width="70%" src="imagen/imagen2.png" />
			</div>

		</section> -->
    <!-- ///////////////////////// FIN IMAGENES 2 ///////////////////// -->


    <!-- ///////////////////////////////////// IMAGENES 4 //////////////////////////////////// -->
    <section class="mt-5 mb-5">

        <div class="container lineapromo mb-5">
            <div class="row">
                <div align="center" class="col">
                    <h2>Paga tus reservaciones en:</h2>
                </div>
            </div>
        </div>

        <div id="divReserva" class="container">
            <img class="img-fluid img15" width="100%" src="imagen/reservacolor2.webp" onerror="this.src='imagen/ReservacionColor6.jpg'" alt="Reservaciones" />
        </div>

    </section>
    <!-- ///////////////////////// FIN IMAGENES 4 ///////////////////// -->




    <!-- //////////////////////////////////////////////////// -->

    <footer>
        <div>
            <!-- <h4 align="center">Footer</h4> -->
            <!-- ////// INICIO PREGUNTAS ///////// -->
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="quienes-somos2">Quiénes somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="preguntas-frecuentes">Preguntas frecuentes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://venta.odm.com.mx/netScripts/request.aspx?APPNAME=Navegante&PRGNAME=AccesoEx&ARGUMENTS=-AAG" target="_blanck">Agencias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactanos">Contáctanos</a>
                </li>
            </ul>
            <!-- ////// FIN PREGUNTAS ///////// -->

        </div>
        <!-- //////// REDES SOCIALES ////////// -->

        <div class="container mt-3" id="top">
            <div align="center" class="row">
                <div class="col">
                    <ul>
                        <li>
                            <a aria-label="pagina-oficial-de-Facebook" href="https://www.facebook.com/OmnibusdeMexicoOficial/?fref=ts" target="_blank">
                                <i class="fab fa-facebook redSocial2" style="size: 5px" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li>
                            <a href="https://twitter.com/omnibus_oficial"><img width="35" height="35" style="margin-top: -15px;" src="twitterxlogo.png" alt="twitterx" /></a>
                        </li>

                        <li>
                            <a aria-label="pagina-oficial-de-Instragram" href="https://www.instagram.com/omnibus_oficial/" target="_blank">
                                <i class="fab fa-instagram redSocial2"></i>
                            </a>
                        </li>

                        <li>
                            <a aria-label="pagina-oficial-de-YouTube" href="https://www.youtube.com/channel/UCyQ_-uZqptGN2M45DNOl7CQ" target="_blank">
                                <i class="fab fa-youtube redSocial2"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- ////////////////// LOGO BLANCO ///////////////////////////// -->
        <div align="center" class="container">
            <img class="img16" width="25%" src="imagen/logoblanco.png" onerror="this.src='imagen/logo-blanco-ODM.png'" alt="Logo blanco Omnibus de México" />
        </div>
        <!-- ////////////////// FIN LOGO BLANCO ///////////////////////////// -->

        <!-- ///////////// CALL CENTER /////////////// -->
        <!-- <div class="startToky">
	<img src="imagen/startToky.png">
</div> -->
        <!-- ////////// FIN CALL CENTER ////////////// -->

        <!-- ///////////// CALL CENTER /////////////// -->
        <!-- <div  class="chat">
	<img src="imagen/chat.png">
</div> -->
        <!-- ////////// FIN CALL CENTER ////////////// -->

        <!-- ///////// INICIO MAPA DEL SITIO /////////-->

        <div class="conteiner">
            <div class="row">
                <div class="col">
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Mapa del sitio</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ///////// INICIO POLITICAS /////////-->
        <div class="conteiner">
            <div class="row">
                <div class="col">
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" href="aviso-privacidad">Aviso de privacidad | Políticas de
                                viaje</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ////////  -->
    </footer>
    <!-- ///////// INICIO DERECHOS /////////-->
    <div class="conteiner divnegro">
        <div class="row">
            <div class="col">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"> &copy; Omnibus de México todos los derechos reservados
                            <?php echo $year; ?>.</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <!-- /////////////////////////////////////////////////////////////////////// -->

    <!-- <script src="js3/aniviajeredondo2.js"></script> -->
    <!-- <script src="js3/mensajeboleto.js"></script> -->
    <!-- <script src="js3/navocultomovil.js"></script> -->
    <!-- //////////////////////////////////////////////////////////////////////// -->
    <!-- <script src="js3/sum.js"></script> -->
    <!-- <script src="js3/bootstrap.min.js"></script> -->
    <!-- //////////////////////////////////////////////////////////////////////// -->
    <!-- <script src="js3/cargasliders.js"></script> -->
    <!-- <script src="js3/chatstartToky.js"></script> -->

    <!-- /////////////////////////// -->

    <!-- <script src="js3/cargacsspagespeed2.js"></script> -->
    <script src="js3/recargavueltapaso1.js"></script>
    <script src="js3/cargaimgSafari.js"></script>

    <!-- /////////CARGA DE JS PAGESPEED////////////// -->
    <script type="text/javascript">
        function downloadJSAtOnload() {

            /*var element = document.createElement("script");
            element.src = "js3/cargaimgSafari2.js";
            document.body.appendChild(element);*/

            var element = document.createElement("script");
            element.src = "js3/cargacsspagespeed2.js";
            document.body.appendChild(element);

            var element = document.createElement("script");
            element.src = "js3/cargasliders.js";
            document.body.appendChild(element);

            var element = document.createElement("script");
            element.src = "js3/bootstrap.min.js";
            document.body.appendChild(element);

            var element = document.createElement("script");
            element.src = "js3/sumMin.js";
            document.body.appendChild(element);

            var element = document.createElement("script");
            element.src = "js3/navocultomovil.js";
            document.body.appendChild(element);

            var element = document.createElement("script");
            element.src = "js3/mensajeboleto.js";
            document.body.appendChild(element);

            var element = document.createElement("script");
            element.src = "js3/aniviajeredondo2.js";
            document.body.appendChild(element);

            // var element = document.createElement("script");
            // element.src = "js3/compiled.0.min.js";
            // document.body.appendChild(element);


            $('html').on('change', 'select[name="origenCode"]', function(event) {
                let origenElegido = $(this).val();

                let hijoTxt = $('select[name="origenCode"] option:selected').text();
                $('input[name="origenText"]').attr('value', hijoTxt);

                console.log("texto_ruta", hijoTxt);
                console.log("colocar", origenElegido);
                destinosLocales(origenElegido);
                cargaCalendario();
            });

            /*$('#cbx_estado').change(function(event){
            	var nom = $(this).val();
            	var ciudad = $('#cbx_estado option:selected').text();
            	$('input[name="origenCode"]').attr('value', ciudad);
            	$("#cbx_municipio").next('span').find('#select2-cbx_municipio-container').text('¿A Dónde Viajas?');
            	setTimeout(function(){destinosLocales(nom);},300);
            	});*/

            function destinosLocales(dest) {

                $.getJSON('enlistado/destinos71/' + dest + '.json?3', function(jsonRaw, textStatus) {

                    $('#cbx_municipio').html('<option selected="selected" disabled>¿A Dónde Viajas?</option>');

                    //filtra duplicados
                    var json = jsonRaw.filter((data, index, j) => index === j.findIndex((t) => (t.id === data.id)))

                    $.each(json, function(i, val) {


                        var id = json[i].id;
                        var valor = json[i].value;
                        $('#cbx_municipio').append('<option value=' + id + '>' + valor + '</option>');


                    });

                });
            }

            var ancho = $(window).width();
            if (ancho <= 767) {

                $("#intro1").click(function(event) {
                    $("html, body").animate({
                        scrollTop: "120px"
                    });
                });

                // // /////////////////
                $('#cbx_estado').change(function(event) {
                    $("html, body").animate({
                        scrollTop: "120px"
                    });
                });

                // //DESTINO
                $('#cbx_municipio').change(function(event) {
                    setTimeout(function() {

                        $("html, body").animate({
                            scrollTop: "210px"
                        });
                        $("#fechasalida1").focus();

                    }, 500);

                });

            }


            var element = document.createElement("script");
            element.src = "js3/select2.js";
            document.body.appendChild(element);

            /*var element = document.createElement("script");
            element.src = "js3/fecha.js";
            document.body.appendChild(element);*/

            var element = document.createElement("script");
            element.src = "js3/pixelface.js";
            document.body.appendChild(element);

        }
        if (window.addEventListener)
            window.addEventListener("load", downloadJSAtOnload, false);
        else if (window.attachEvent)
            window.attachEvent("onload", downloadJSAtOnload);
        else window.onload = downloadJSAtOnload;
    </script>
    <!-- /////////FIN CARGA DE JS PAGESPEED////////// -->
    <script>
        setTimeout(function() {
            $("#cbx_estado").select2();
            $("#cbx_municipio").select2();

        }, 2000);

        function menuMovil() {

            console.log("muestra menu movil");

            let btn = $('#navbarSupportedContent');

            let estatus = btn.is(":visible"); //btn.hasClass('show');
            if (estatus) {
                $('#navbarSupportedContent').fadeOut();
            } else {
                $('#navbarSupportedContent').fadeIn();
            }

        }
    </script>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "url": "https://odm.com.mx/",
            "logo": "https://odm.com.mx/imagen/logoODM.png"
        }
    </script>

    <script type="text/javascript">
        $('.basico').fadeIn();
        let orig = false;
        let peticion = 'XXX';

        $('html').on('change', 'select[name="origenCode"]', function(event) {
            let eleccion = $(this).val();
            orig = (eleccion == peticion) ? true : false;
            descuentosControl(eleccion);

        });

        $('html').on('change', 'select[name="destinoCode"]', function(event) {
            let eleccion = $(this).val();
            descuentosControl(eleccion);

            let hijoTxt2 = $('select[name="destinoCode"] option:selected').text();
            console.log({hijoTxt2});
            $('input[name="destinoText"]').attr('value', hijoTxt2);


        });


        function descuentosControl(NOM) {
            let visibles = (NOM == peticion) ? '.basico,.basico2' : '.basico';
            $(visibles).fadeIn();
            if (!orig) {
                if (NOM !== peticion) {
                    //$('.basico2').fadeOut();
                }
            }
        }



        $('#tarjprueba button').click(function(event) {
            //f();
        });
    </script>
    <script type="text/javascript">
        let cargaScript = true;

        function cargaCalendario() {

            if (cargaScript) {

                $.getScript("js3/calcomplem2.js")
                    .done(function(script, textStatus) {
                        $("#fechasalida1").datepicker({
                            dateFormat: "dd/mm/yy",
                            minDate: 0,
                            monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
                                "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
                            ],
                            dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"]
                        }), $("#fecharegreso").datepicker({
                            dateFormat: "dd/mm/yy",
                            minDate: 0,
                            monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
                                "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
                            ],
                            dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"]
                        });
                        cargaScript = false;
                    })
                    .fail(function(jqxhr, settings, exception) {
                        console.log("ocurrio un error al cargar el script calcomplem2.js (calendario)");
                    });

            }

        }
    </script>

    <script type="text/javascript">
        
        function fichas( data ){

            let nomorig = $(data).attr('nomorig');
            let textorig = $(data).attr('textorig');
            let nomdest = $(data).attr('nomdest');
            let textdest = $(data).attr('textdest');
            
            $('#select2-cbx_estado-container').text(textorig);
            $('input[name="origenText"]').val(textorig);


            $('#select2-cbx_municipio-container').text(textdest);
            $('input[name="destinoText"]').val(textdest);

            cargaCalendario();
            window.scroll({ top: 0, left: 0, behavior: 'smooth'});

            $('#cbx_estado').html('<option value="'+nomorig+'">'+textorig+'</option>');
            $('#cbx_municipio').html('<option value="'+nomdest+'">'+textdest+'</option>');

        }


    </script>


    <!-- <script src="js3/registroFacebook.js"></script> -->

    <!-- <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '700893607311578',
      cookie     : true,
      xfbml      : true,
      version    : 'v7.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script> -->

    <!-- <script src='https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js'></script>
<script  src="https://odm.com.mx/js3/fireworks.js"></script> -->



</body>

</html>