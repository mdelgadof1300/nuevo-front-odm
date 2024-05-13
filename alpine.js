(() => {
    var e = !1,
        t = !1,
        n = [];

    function r(r) {
        ! function (r) {
            n.includes(r) || n.push(r), !t && !e && (e = !0, queueMicrotask(i))
        }(r)
    }

    function i() {
        e = !1, t = !0;
        for (let e = 0; e < n.length; e++) n[e]();
        n.length = 0, t = !1
    }
    var o, a, l, s, u = !0;

    function c(e) {
        a = e
    }
    var f = [],
        d = [],
        p = [];

    function _(e, t) {
        !e._x_attributeCleanups || Object.entries(e._x_attributeCleanups).forEach(([n, r]) => {
            (void 0 === t || t.includes(n)) && (r.forEach(e => e()), delete e._x_attributeCleanups[n])
        })
    }
    var h = new MutationObserver(E),
        m = !1;

    function g() {
        h.observe(document, {
            subtree: !0,
            childList: !0,
            attributes: !0,
            attributeOldValue: !0
        }), m = !0
    }
    var y = [],
        v = !1;

    function x(e) {
        if (!m) return e();
        (y = y.concat(h.takeRecords())).length && !v && (v = !0, queueMicrotask(() => {
            E(y), y.length = 0, v = !1
        })), h.disconnect(), m = !1;
        let t = e();
        return g(), t
    }
    var b = !1,
        w = [];

    function E(e) {
        if (b) return void(w = w.concat(e));
        let t = [],
            n = [],
            r = new Map,
            i = new Map;
        for (let o = 0; o < e.length; o++)
            if (!e[o].target._x_ignoreMutationObserver && ("childList" === e[o].type && (e[o].addedNodes.forEach(e => 1 === e.nodeType && t.push(e)), e[o].removedNodes.forEach(e => 1 === e.nodeType && n.push(e))), "attributes" === e[o].type)) {
                let t = e[o].target,
                    n = e[o].attributeName,
                    a = e[o].oldValue,
                    l = () => {
                        r.has(t) || r.set(t, []), r.get(t).push({
                            name: n,
                            value: t.getAttribute(n)
                        })
                    },
                    s = () => {
                        i.has(t) || i.set(t, []), i.get(t).push(n)
                    };
                t.hasAttribute(n) && null === a ? l() : t.hasAttribute(n) ? (s(), l()) : s()
            } i.forEach((e, t) => {
            _(t, e)
        }), r.forEach((e, t) => {
            f.forEach(n => n(t, e))
        });
        for (let e of n) t.includes(e) || d.forEach(t => t(e));
        t.forEach(e => {
            e._x_ignoreSelf = !0, e._x_ignore = !0
        });
        for (let e of t) n.includes(e) || !e.isConnected || (delete e._x_ignoreSelf, delete e._x_ignore, p.forEach(t => t(e)), e._x_ignore = !0, e._x_ignoreSelf = !0);
        t.forEach(e => {
            delete e._x_ignoreSelf, delete e._x_ignore
        }), t = null, n = null, r = null, i = null
    }

    function A(e, t, n) {
        return e._x_dataStack = [t, ...O(n || e)], () => {
            e._x_dataStack = e._x_dataStack.filter(e => e !== t)
        }
    }

    function k(e, t) {
        let n = e._x_dataStack[0];
        Object.entries(t).forEach(([e, t]) => {
            n[e] = t
        })
    }

    function O(e) {
        return e._x_dataStack ? e._x_dataStack : "function" == typeof ShadowRoot && e instanceof ShadowRoot ? O(e.host) : e.parentNode ? O(e.parentNode) : []
    }

    function S(e) {
        let t = new Proxy({}, {
            ownKeys: () => Array.from(new Set(e.flatMap(e => Object.keys(e)))),
            has: (t, n) => e.some(e => e.hasOwnProperty(n)),
            get: (n, r) => (e.find(e => {
                if (e.hasOwnProperty(r)) {
                    let n = Object.getOwnPropertyDescriptor(e, r);
                    if (n.get && n.get._x_alreadyBound || n.set && n.set._x_alreadyBound) return !0;
                    if ((n.get || n.set) && n.enumerable) {
                        let i = n.get,
                            o = n.set,
                            a = n;
                        i = i && i.bind(t), o = o && o.bind(t), i && (i._x_alreadyBound = !0), o && (o._x_alreadyBound = !0), Object.defineProperty(e, r, {
                            ...a,
                            get: i,
                            set: o
                        })
                    }
                    return !0
                }
                return !1
            }) || {})[r],
            set: (t, n, r) => {
                let i = e.find(e => e.hasOwnProperty(n));
                return i ? i[n] = r : e[e.length - 1][n] = r, !0
            }
        });
        return t
    }

    function C(e) {
        let t = (n, r = "") => {
            Object.entries(Object.getOwnPropertyDescriptors(n)).forEach(([i, {
                value: o,
                enumerable: a
            }]) => {
                if (!1 === a || void 0 === o) return;
                let l = "" === r ? i : `${r}.${i}`;
                "object" == typeof o && null !== o && o._x_interceptor ? n[i] = o.initialize(e, l, i) : (e => "object" == typeof e && !Array.isArray(e) && null !== e)(o) && o !== n && !(o instanceof Element) && t(o, l)
            })
        };
        return t(e)
    }

    function j(e, t = (() => {})) {
        let n = {
            initialValue: void 0,
            _x_interceptor: !0,
            initialize(t, n, r) {
                return e(this.initialValue, () => (function (e, t) {
                    return n.split(".").reduce((e, t) => e[t], e)
                })(t), e => (function e(t, n, r) {
                    if ("string" == typeof n && (n = n.split(".")), 1 !== n.length) {
                        if (0 === n.length) throw error;
                        return t[n[0]] || (t[n[0]] = {}), e(t[n[0]], n.slice(1), r)
                    }
                    t[n[0]] = r
                })(t, n, e), n, r)
            }
        };
        return t(n), e => {
            if ("object" == typeof e && null !== e && e._x_interceptor) {
                let t = n.initialize.bind(n);
                n.initialize = ((r, i, o) => {
                    let a = e.initialize(r, i, o);
                    return n.initialValue = a, t(r, i, o)
                })
            } else n.initialValue = e;
            return n
        }
    }
    var $ = {};

    function M(e, t) {
        $[e] = t
    }

    function N(e, t) {
        return Object.entries($).forEach(([n, r]) => {
            Object.defineProperty(e, `$${n}`, {
                get: () => r(t, {
                    Alpine: Le,
                    interceptor: j
                }),
                enumerable: !1
            })
        }), e
    }

    function P(e, t, n) {
        Object.assign(e, {
            el: t,
            expression: n
        }), console.warn(`Alpine Expression Error: ${e.message}\n\n${n?'Expression: "'+n+'"\n\n':""}`, t), setTimeout(() => {
            throw e
        }, 0)
    }

    function L(e, t, n = {}) {
        let r;
        return R(e, t)(e => r = e, n), r
    }

    function R(...e) {
        return T(...e)
    }
    var T = z;

    function z(e, t) {
        let n = {};
        N(n, e);
        let r = [n, ...O(e)];
        if ("function" == typeof t) return function (e, t) {
            return (n = (() => {}), {
                scope: r = {},
                params: i = []
            } = {}) => {
                q(n, t.apply(S([r, ...e]), i))
            }
        }(r, t);
        let i = function (e, t, n) {
            let r = function (e, t) {
                if (I[e]) return I[e];
                let n = Object.getPrototypeOf(async function () {}).constructor,
                    r = /^[\n\s]*if.*\(.*\)/.test(e) || /^(let|const)\s/.test(e) ? `(() => { ${e} })()` : e,
                    i = (() => {
                        try {
                            return new n(["__self", "scope"], `with (scope) { __self.result = ${r} }; __self.finished = true; return __self.result;`)
                        } catch (n) {
                            return P(n, t, e), Promise.resolve()
                        }
                    })();
                return I[e] = i, i
            }(t, n);
            return (i = (() => {}), {
                scope: o = {},
                params: a = []
            } = {}) => {
                r.result = void 0, r.finished = !1;
                let l = S([o, ...e]);
                if ("function" == typeof r) {
                    let e = r(r, l).catch(e => P(e, n, t));
                    r.finished ? (q(i, r.result, l, a, n), r.result = void 0) : e.then(e => {
                        q(i, e, l, a, n)
                    }).catch(e => P(e, n, t)).finally(() => r.result = void 0)
                }
            }
        }(r, t, e);
        return function (e, t, n, ...r) {
            try {
                return n(...r)
            } catch (n) {
                P(n, e, t)
            }
        }.bind(null, e, t, i)
    }
    var I = {};

    function q(e, t, n, r, i) {
        if ("function" == typeof t) {
            let o = t.apply(n, r);
            o instanceof Promise ? o.then(t => q(e, t, n, r)).catch(e => P(e, i, t)) : e(o)
        } else e(t)
    }
    var D = "x-";

    function B(e = "") {
        return D + e
    }
    var W = {};

    function F(e, t) {
        W[e] = t
    }

    function V(e, t, n) {
        let r = {};
        return Array.from(t).map(J((e, t) => r[e] = t)).filter(Y).map(function (e, t) {
            return ({
                name: n,
                value: r
            }) => {
                let i = n.match(ee()),
                    o = n.match(/:([a-zA-Z0-9\-:]+)/),
                    a = n.match(/\.[^.\]]+(?=[^\]]*$)/g) || [],
                    l = t || e[n] || n;
                return {
                    type: i ? i[1] : null,
                    value: o ? o[1] : null,
                    modifiers: a.map(e => e.replace(".", "")),
                    expression: r,
                    original: l
                }
            }
        }(r, n)).sort(re).map(t => (function (e, t) {
            let n = W[t.type] || (() => {}),
                r = [],
                [i, o] = function (e) {
                    let t = () => {};
                    return [n => {
                        let r = a(n);
                        e._x_effects || (e._x_effects = new Set, e._x_runEffects = (() => {
                            e._x_effects.forEach(e => e())
                        })), e._x_effects.add(r), t = (() => {
                            void 0 !== r && (e._x_effects.delete(r), l(r))
                        })
                    }, () => {
                        t()
                    }]
                }(e);
            r.push(o);
            let s = {
                    Alpine: Le,
                    effect: i,
                    cleanup: e => r.push(e),
                    evaluateLater: R.bind(R, e),
                    evaluate: L.bind(L, e)
                },
                u = () => r.forEach(e => e());
            ! function (e, t, n) {
                e._x_attributeCleanups || (e._x_attributeCleanups = {}), e._x_attributeCleanups[t] || (e._x_attributeCleanups[t] = []), e._x_attributeCleanups[t].push(n)
            }(e, t.original, u);
            let c = () => {
                e._x_ignore || e._x_ignoreSelf || (n.inline && n.inline(e, t, s), n = n.bind(n, e, t, s), K ? U.get(Z).push(n) : n())
            };
            return c.runCleanups = u, c
        })(e, t))
    }
    var K = !1,
        U = new Map,
        Z = Symbol(),
        H = (e, t) => ({
            name: n,
            value: r
        }) => (n.startsWith(e) && (n = n.replace(e, t)), {
            name: n,
            value: r
        }),
        G = e => e;

    function J(e = (() => {})) {
        return ({
            name: t,
            value: n
        }) => {
            let {
                name: r,
                value: i
            } = Q.reduce((e, t) => t(e), {
                name: t,
                value: n
            });
            return r !== t && e(r, t), {
                name: r,
                value: i
            }
        }
    }
    var Q = [];

    function X(e) {
        Q.push(e)
    }

    function Y({
        name: e
    }) {
        return ee().test(e)
    }
    var ee = () => new RegExp(`^${D}([^:^.]+)\\b`),
        te = "DEFAULT",
        ne = ["ignore", "ref", "data", "id", "bind", "init", "for", "model", "transition", "show", "if", te, "teleport", "element"];

    function re(e, t) {
        let n = -1 === ne.indexOf(e.type) ? te : e.type,
            r = -1 === ne.indexOf(t.type) ? te : t.type;
        return ne.indexOf(n) - ne.indexOf(r)
    }

    function ie(e, t, n = {}) {
        e.dispatchEvent(new CustomEvent(t, {
            detail: n,
            bubbles: !0,
            composed: !0,
            cancelable: !0
        }))
    }
    var oe = [],
        ae = !1;

    function le(e) {
        oe.push(e), queueMicrotask(() => {
            ae || setTimeout(() => {
                se()
            })
        })
    }

    function se() {
        for (ae = !1; oe.length;) oe.shift()()
    }

    function ue(e, t) {
        if ("function" == typeof ShadowRoot && e instanceof ShadowRoot) return void Array.from(e.children).forEach(e => ue(e, t));
        let n = !1;
        if (t(e, () => n = !0), n) return;
        let r = e.firstElementChild;
        for (; r;) ue(r, t), r = r.nextElementSibling
    }

    function ce(e, ...t) {
        console.warn(`Alpine Warning: ${e}`, ...t)
    }
    var fe = [],
        de = [];

    function pe() {
        return fe.map(e => e())
    }

    function _e() {
        return fe.concat(de).map(e => e())
    }

    function he(e) {
        fe.push(e)
    }

    function me(e) {
        de.push(e)
    }

    function ge(e, t = !1) {
        return ye(e, e => {
            if ((t ? _e() : pe()).some(t => e.matches(t))) return !0
        })
    }

    function ye(e, t) {
        if (e) {
            if (t(e)) return e;
            if (e._x_teleportBack && (e = e._x_teleportBack), e.parentElement) return ye(e.parentElement, t)
        }
    }

    function ve(e, t = ue) {
        ! function (e) {
            K = !0;
            let t = Symbol();
            Z = t, U.set(t, []);
            let n = () => {
                for (; U.get(t).length;) U.get(t).shift()();
                U.delete(t)
            };
            e(), K = !1, n()
        }(() => {
            t(e, (e, t) => {
                V(e, e.attributes).forEach(e => e()), e._x_ignore && t()
            })
        })
    }

    function xe(e, t) {
        return Array.isArray(t) ? be(e, t.join(" ")) : "object" == typeof t && null !== t ? function (e, t) {
            let n = e => e.split(" ").filter(Boolean),
                r = Object.entries(t).flatMap(([e, t]) => !!t && n(e)).filter(Boolean),
                i = Object.entries(t).flatMap(([e, t]) => !t && n(e)).filter(Boolean),
                o = [],
                a = [];
            return i.forEach(t => {
                e.classList.contains(t) && (e.classList.remove(t), a.push(t))
            }), r.forEach(t => {
                e.classList.contains(t) || (e.classList.add(t), o.push(t))
            }), () => {
                a.forEach(t => e.classList.add(t)), o.forEach(t => e.classList.remove(t))
            }
        }(e, t) : "function" == typeof t ? xe(e, t()) : be(e, t)
    }

    function be(e, t) {
        return (t => (e.classList.add(...t), () => {
            e.classList.remove(...t)
        }))((t => t.split(" ").filter(t => !e.classList.contains(t)).filter(Boolean))(t = !0 === t ? t = "" : t || ""))
    }

    function we(e, t) {
        return "object" == typeof t && null !== t ? function (e, t) {
            let n = {};
            return Object.entries(t).forEach(([t, r]) => {
                n[t] = e.style[t], e.style.setProperty(function (e) {
                    return t.replace(/([a-z])([A-Z])/g, "$1-$2").toLowerCase()
                }(), r)
            }), setTimeout(() => {
                0 === e.style.length && e.removeAttribute("style")
            }), () => {
                we(e, n)
            }
        }(e, t) : function (e, t) {
            let n = e.getAttribute("style", t);
            return e.setAttribute("style", t), () => {
                e.setAttribute("style", n)
            }
        }(e, t)
    }

    function Ee(e, t = (() => {})) {
        let n = !1;
        return function () {
            n ? t.apply(this, arguments) : (n = !0, e.apply(this, arguments))
        }
    }

    function Ae(e, t, n = {}) {
        e._x_transition || (e._x_transition = {
            enter: {
                during: n,
                start: n,
                end: n
            },
            leave: {
                during: n,
                start: n,
                end: n
            },
            in (n = (() => {}), r = (() => {})) {
                ke(e, t, {
                    during: this.enter.during,
                    start: this.enter.start,
                    end: this.enter.end
                }, n, r)
            },
            out(n = (() => {}), r = (() => {})) {
                ke(e, t, {
                    during: this.leave.during,
                    start: this.leave.start,
                    end: this.leave.end
                }, n, r)
            }
        })
    }

    function ke(e, t, {
        during: n,
        start: r,
        end: i
    } = {}, o = (() => {}), a = (() => {})) {
        if (e._x_transitioning && e._x_transitioning.cancel(), 0 === Object.keys(n).length && 0 === Object.keys(r).length && 0 === Object.keys(i).length) return o(), void a();
        let l, s, u;
        ! function (e, t) {
            let n, r, i, o = Ee(() => {
                x(() => {
                    n = !0, r || t.before(), i || (t.end(), se()), t.after(), e.isConnected && t.cleanup(), delete e._x_transitioning
                })
            });
            e._x_transitioning = {
                beforeCancels: [],
                beforeCancel(e) {
                    this.beforeCancels.push(e)
                },
                cancel: Ee(function () {
                    for (; this.beforeCancels.length;) this.beforeCancels.shift()();
                    o()
                }),
                finish: o
            }, x(() => {
                t.start(), t.during()
            }), ae = !0, requestAnimationFrame(() => {
                if (n) return;
                let o = 1e3 * Number(getComputedStyle(e).transitionDuration.replace(/,.*/, "").replace("s", "")),
                    a = 1e3 * Number(getComputedStyle(e).transitionDelay.replace(/,.*/, "").replace("s", ""));
                0 === o && (o = 1e3 * Number(getComputedStyle(e).animationDuration.replace("s", ""))), x(() => {
                    t.before()
                }), r = !0, requestAnimationFrame(() => {
                    n || (x(() => {
                        t.end()
                    }), se(), setTimeout(e._x_transitioning.finish, o + a), i = !0)
                })
            })
        }(e, {
            start() {
                l = t(e, r)
            },
            during() {
                s = t(e, n)
            },
            before: o,
            end() {
                l(), u = t(e, i)
            },
            after: a,
            cleanup() {
                s(), u()
            }
        })
    }

    function Oe(e, t, n) {
        if (-1 === e.indexOf(t)) return n;
        let r = e[e.indexOf(t) + 1];
        if (!r || "scale" === t && isNaN(r)) return n;
        if ("duration" === t) {
            let e = r.match(/([0-9]+)ms/);
            if (e) return e[1]
        }
        return "origin" === t && ["top", "right", "left", "center", "bottom"].includes(e[e.indexOf(t) + 2]) ? [r, e[e.indexOf(t) + 2]].join(" ") : r
    }
    F("transition", (e, {
        value: t,
        modifiers: n,
        expression: r
    }, {
        evaluate: i
    }) => {
        "function" == typeof r && (r = i(r)), r ? function (e, t, n) {
            Ae(e, xe, ""), {
                enter: t => {
                    e._x_transition.enter.during = t
                },
                "enter-start": t => {
                    e._x_transition.enter.start = t
                },
                "enter-end": t => {
                    e._x_transition.enter.end = t
                },
                leave: t => {
                    e._x_transition.leave.during = t
                },
                "leave-start": t => {
                    e._x_transition.leave.start = t
                },
                "leave-end": t => {
                    e._x_transition.leave.end = t
                }
            } [n](t)
        }(e, r, t) : function (e, t, n) {
            Ae(e, we);
            let r = !t.includes("in") && !t.includes("out") && !n,
                i = r || t.includes("in") || ["enter"].includes(n),
                o = r || t.includes("out") || ["leave"].includes(n);
            t.includes("in") && !r && (t = t.filter((e, n) => n < t.indexOf("out"))), t.includes("out") && !r && (t = t.filter((e, n) => n > t.indexOf("out")));
            let a = !t.includes("opacity") && !t.includes("scale"),
                l = a || t.includes("opacity") ? 0 : 1,
                s = a || t.includes("scale") ? Oe(t, "scale", 95) / 100 : 1,
                u = Oe(t, "delay", 0),
                c = Oe(t, "origin", "center"),
                f = "opacity, transform",
                d = Oe(t, "duration", 150) / 1e3,
                p = Oe(t, "duration", 75) / 1e3,
                _ = "cubic-bezier(0.4, 0.0, 0.2, 1)";
            i && (e._x_transition.enter.during = {
                transformOrigin: c,
                transitionDelay: u,
                transitionProperty: f,
                transitionDuration: `${d}s`,
                transitionTimingFunction: _
            }, e._x_transition.enter.start = {
                opacity: l,
                transform: `scale(${s})`
            }, e._x_transition.enter.end = {
                opacity: 1,
                transform: "scale(1)"
            }), o && (e._x_transition.leave.during = {
                transformOrigin: c,
                transitionDelay: u,
                transitionProperty: f,
                transitionDuration: `${p}s`,
                transitionTimingFunction: _
            }, e._x_transition.leave.start = {
                opacity: 1,
                transform: "scale(1)"
            }, e._x_transition.leave.end = {
                opacity: l,
                transform: `scale(${s})`
            })
        }(e, n, t)
    }), window.Element.prototype._x_toggleAndCascadeWithTransitions = function (e, t, n, r) {
        let i = () => {
            "visible" === document.visibilityState ? requestAnimationFrame(n) : setTimeout(n)
        };
        t ? e._x_transition && (e._x_transition.enter || e._x_transition.leave) ? e._x_transition.enter && (Object.entries(e._x_transition.enter.during).length || Object.entries(e._x_transition.enter.start).length || Object.entries(e._x_transition.enter.end).length) ? e._x_transition.in(n) : i() : e._x_transition ? e._x_transition.in(n) : i() : (e._x_hidePromise = e._x_transition ? new Promise((t, n) => {
            e._x_transition.out(() => {}, () => t(r)), e._x_transitioning.beforeCancel(() => n({
                isFromCancelledTransition: !0
            }))
        }) : Promise.resolve(r), queueMicrotask(() => {
            let t = function e(t) {
                let n = t.parentNode;
                if (n) return n._x_hidePromise ? n : e(n)
            }(e);
            t ? (t._x_hideChildren || (t._x_hideChildren = []), t._x_hideChildren.push(e)) : queueMicrotask(() => {
                let t = e => {
                    let n = Promise.all([e._x_hidePromise, ...(e._x_hideChildren || []).map(t)]).then(([e]) => e());
                    return delete e._x_hidePromise, delete e._x_hideChildren, n
                };
                t(e).catch(e => {
                    if (!e.isFromCancelledTransition) throw e
                })
            })
        }))
    };
    var Se = !1;

    function Ce(e, t = (() => {})) {
        return (...n) => Se ? t(...n) : e(...n)
    }

    function je(e, t) {
        var n;
        return function () {
            var r = this,
                i = arguments;
            clearTimeout(n), n = setTimeout(function () {
                n = null, e.apply(r, i)
            }, t)
        }
    }

    function $e(e, t) {
        let n;
        return function () {
            let r = arguments;
            n || (e.apply(this, r), n = !0, setTimeout(() => n = !1, t))
        }
    }
    var Me = {},
        Ne = !1,
        Pe = {},
        Le = {
            get reactive() {
                return o
            },
            get release() {
                return l
            },
            get effect() {
                return a
            },
            get raw() {
                return s
            },
            version: "3.7.0",
            flushAndStopDeferringMutations: function () {
                b = !1, E(w), w = []
            },
            disableEffectScheduling: function (e) {
                u = !1, e(), u = !0
            },
            setReactivityEngine: function (e) {
                o = e.reactive, l = e.release, a = (t => e.effect(t, {
                    scheduler: e => {
                        u ? r(e) : e()
                    }
                })), s = e.raw
            },
            closestDataStack: O,
            skipDuringClone: Ce,
            addRootSelector: he,
            addInitSelector: me,
            addScopeToNode: A,
            deferMutations: function () {
                b = !0
            },
            mapAttributes: X,
            evaluateLater: R,
            setEvaluator: function (e) {
                T = e
            },
            mergeProxies: S,
            closestRoot: ge,
            interceptor: j,
            transition: ke,
            setStyles: we,
            mutateDom: x,
            directive: F,
            throttle: $e,
            debounce: je,
            evaluate: L,
            initTree: ve,
            nextTick: le,
            prefixed: B,
            prefix: function (e) {
                D = e
            },
            plugin: function (e) {
                e(Le)
            },
            magic: M,
            store: function (e, t) {
                if (Ne || (Me = o(Me), Ne = !0), void 0 === t) return Me[e];
                Me[e] = t, "object" == typeof t && null !== t && t.hasOwnProperty("init") && "function" == typeof t.init && Me[e].init(), C(Me[e])
            },
            start: function () {
                document.body || ce("Unable to initialize. Trying to load Alpine before `<body>` is available. Did you forget to add `defer` in Alpine's `<script>` tag?"), ie(document, "alpine:init"), ie(document, "alpine:initializing"), g(), p.push(e => ve(e, ue)), d.push(e => (function (e) {
                    ue(e, e => _(e))
                })(e)), f.push((e, t) => {
                    V(e, t).forEach(e => e())
                }), Array.from(document.querySelectorAll(_e())).filter(e => !ge(e.parentElement, !0)).forEach(e => {
                    ve(e)
                }), ie(document, "alpine:initialized")
            },
            clone: function (e, t) {
                t._x_dataStack || (t._x_dataStack = e._x_dataStack), Se = !0,
                    function (e) {
                        let t = a;
                        c((e, n) => {
                            let r = t(e);
                            return l(r), () => {}
                        }), e(), c(t)
                    }(() => {
                        ! function (e) {
                            let t = !1;
                            ve(e, (e, n) => {
                                ue(e, (e, r) => {
                                    if (t && function (e) {
                                            return pe().some(t => e.matches(t))
                                        }(e)) return r();
                                    t = !0, n(e, r)
                                })
                            })
                        }(t)
                    }), Se = !1
            },
            data: function (e, t) {
                Pe[e] = t
            }
        };

    function Re(e, t) {
        let n = Object.create(null),
            r = e.split(",");
        for (let e = 0; e < r.length; e++) n[r[e]] = !0;
        return t ? e => !!n[e.toLowerCase()] : e => !!n[e]
    }
    Re("itemscope,allowfullscreen,formnovalidate,ismap,nomodule,novalidate,readonly,async,autofocus,autoplay,controls,default,defer,disabled,hidden,loop,open,required,reversed,scoped,seamless,checked,muted,multiple,selected");
    var Te, ze = Object.freeze({}),
        Ie = (Object.freeze([]), Object.assign),
        qe = Object.prototype.hasOwnProperty,
        De = (e, t) => qe.call(e, t),
        Be = Array.isArray,
        We = e => "[object Map]" === Ue(e),
        Fe = e => "symbol" == typeof e,
        Ve = e => null !== e && "object" == typeof e,
        Ke = Object.prototype.toString,
        Ue = e => Ke.call(e),
        Ze = e => Ue(e).slice(8, -1),
        He = e => (e => "string" == typeof e)(e) && "NaN" !== e && "-" !== e[0] && "" + parseInt(e, 10) === e,
        Ge = e => {
            let t = Object.create(null);
            return n => t[n] || (t[n] = e(n))
        },
        Je = /-(\w)/g,
        Qe = (Ge(e => e.replace(Je, (e, t) => t ? t.toUpperCase() : "")), /\B([A-Z])/g),
        Xe = (Ge(e => e.replace(Qe, "-$1").toLowerCase()), Ge(e => e.charAt(0).toUpperCase() + e.slice(1))),
        Ye = (Ge(e => e ? `on${Xe(e)}` : ""), (e, t) => e !== t && (e == e || t == t)),
        et = new WeakMap,
        tt = [],
        nt = Symbol("iterate"),
        rt = Symbol("Map key iterate"),
        it = 0;

    function ot(e) {
        let {
            deps: t
        } = e;
        if (t.length) {
            for (let n = 0; n < t.length; n++) t[n].delete(e);
            t.length = 0
        }
    }
    var at = !0,
        lt = [];

    function st() {
        let e = lt.pop();
        at = void 0 === e || e
    }

    function ut(e, t, n) {
        if (!at || void 0 === Te) return;
        let r = et.get(e);
        r || et.set(e, r = new Map);
        let i = r.get(n);
        i || r.set(n, i = new Set), i.has(Te) || (i.add(Te), Te.deps.push(i), Te.options.onTrack && Te.options.onTrack({
            effect: Te,
            target: e,
            type: t,
            key: n
        }))
    }

    function ct(e, t, n, r, i, o) {
        let a = et.get(e);
        if (!a) return;
        let l = new Set,
            s = e => {
                e && e.forEach(e => {
                    (e !== Te || e.allowRecurse) && l.add(e)
                })
            };
        if ("clear" === t) a.forEach(s);
        else if ("length" === n && Be(e)) a.forEach((e, t) => {
            ("length" === t || t >= r) && s(e)
        });
        else switch (void 0 !== n && s(a.get(n)), t) {
            case "add":
                Be(e) ? He(n) && s(a.get("length")) : (s(a.get(nt)), We(e) && s(a.get(rt)));
                break;
            case "delete":
                Be(e) || (s(a.get(nt)), We(e) && s(a.get(rt)));
                break;
            case "set":
                We(e) && s(a.get(nt))
        }
        l.forEach(a => {
            a.options.onTrigger && a.options.onTrigger({
                effect: a,
                target: e,
                key: n,
                type: t,
                newValue: r,
                oldValue: i,
                oldTarget: o
            }), a.options.scheduler ? a.options.scheduler(a) : a()
        })
    }
    var ft = Re("__proto__,__v_isRef,__isVue"),
        dt = new Set(Object.getOwnPropertyNames(Symbol).map(e => Symbol[e]).filter(Fe)),
        pt = yt(),
        _t = yt(!1, !0),
        ht = yt(!0),
        mt = yt(!0, !0),
        gt = {};

    function yt(e = !1, t = !1) {
        return function (n, r, i) {
            if ("__v_isReactive" === r) return !e;
            if ("__v_isReadonly" === r) return e;
            if ("__v_raw" === r && i === (e ? t ? Gt : Ht : t ? Zt : Ut).get(n)) return n;
            let o = Be(n);
            if (!e && o && De(gt, r)) return Reflect.get(gt, r, i);
            let a = Reflect.get(n, r, i);
            return (Fe(r) ? dt.has(r) : ft(r)) || (e || ut(n, "get", r), t) ? a : en(a) ? o && He(r) ? a : a.value : Ve(a) ? e ? Qt(a) : Jt(a) : a
        }
    } ["includes", "indexOf", "lastIndexOf"].forEach(e => {
        let t = Array.prototype[e];
        gt[e] = function (...e) {
            let n = Yt(this);
            for (let e = 0, t = this.length; e < t; e++) ut(n, "get", e + "");
            let r = t.apply(n, e);
            return -1 === r || !1 === r ? t.apply(n, e.map(Yt)) : r
        }
    }), ["push", "pop", "shift", "unshift", "splice"].forEach(e => {
        let t = Array.prototype[e];
        gt[e] = function (...e) {
            lt.push(at), at = !1;
            let n = t.apply(this, e);
            return st(), n
        }
    });
    var vt = bt(),
        xt = bt(!0);

    function bt(e = !1) {
        return function (t, n, r, i) {
            let o = t[n];
            if (!e && (r = Yt(r), o = Yt(o), !Be(t) && en(o) && !en(r))) return o.value = r, !0;
            let a = Be(t) && He(n) ? Number(n) < t.length : De(t, n),
                l = Reflect.set(t, n, r, i);
            return t === Yt(i) && (a ? Ye(r, o) && ct(t, "set", n, r, o) : ct(t, "add", n, r)), l
        }
    }
    var wt = {
            get: pt,
            set: vt,
            deleteProperty: function (e, t) {
                let n = De(e, t),
                    r = e[t],
                    i = Reflect.deleteProperty(e, t);
                return i && n && ct(e, "delete", t, void 0, r), i
            },
            has: function (e, t) {
                let n = Reflect.has(e, t);
                return (!Fe(t) || !dt.has(t)) && ut(e, "has", t), n
            },
            ownKeys: function (e) {
                return ut(e, "iterate", Be(e) ? "length" : nt), Reflect.ownKeys(e)
            }
        },
        Et = {
            get: ht,
            set: (e, t) => (console.warn(`Set operation on key "${String(t)}" failed: target is readonly.`, e), !0),
            deleteProperty: (e, t) => (console.warn(`Delete operation on key "${String(t)}" failed: target is readonly.`, e), !0)
        },
        At = (Ie({}, wt, {
            get: _t,
            set: xt
        }), Ie({}, Et, {
            get: mt
        }), e => Ve(e) ? Jt(e) : e),
        kt = e => Ve(e) ? Qt(e) : e,
        Ot = e => e,
        St = e => Reflect.getPrototypeOf(e);

    function Ct(e, t, n = !1, r = !1) {
        let i = Yt(e = e.__v_raw),
            o = Yt(t);
        t !== o && !n && ut(i, "get", t), !n && ut(i, "get", o);
        let {
            has: a
        } = St(i), l = r ? Ot : n ? kt : At;
        return a.call(i, t) ? l(e.get(t)) : a.call(i, o) ? l(e.get(o)) : void(e !== i && e.get(t))
    }

    function jt(e, t = !1) {
        let n = this.__v_raw,
            r = Yt(n),
            i = Yt(e);
        return e !== i && !t && ut(r, "has", e), !t && ut(r, "has", i), e === i ? n.has(e) : n.has(e) || n.has(i)
    }

    function $t(e, t = !1) {
        return e = e.__v_raw, !t && ut(Yt(e), "iterate", nt), Reflect.get(e, "size", e)
    }

    function Mt(e) {
        e = Yt(e);
        let t = Yt(this);
        return St(t).has.call(t, e) || (t.add(e), ct(t, "add", e, e)), this
    }

    function Nt(e, t) {
        t = Yt(t);
        let n = Yt(this),
            {
                has: r,
                get: i
            } = St(n),
            o = r.call(n, e);
        o ? Kt(n, r, e) : (e = Yt(e), o = r.call(n, e));
        let a = i.call(n, e);
        return n.set(e, t), o ? Ye(t, a) && ct(n, "set", e, t, a) : ct(n, "add", e, t), this
    }

    function Pt(e) {
        let t = Yt(this),
            {
                has: n,
                get: r
            } = St(t),
            i = n.call(t, e);
        i ? Kt(t, n, e) : (e = Yt(e), i = n.call(t, e));
        let o = r ? r.call(t, e) : void 0,
            a = t.delete(e);
        return i && ct(t, "delete", e, void 0, o), a
    }

    function Lt() {
        let e = Yt(this),
            t = 0 !== e.size,
            n = We(e) ? new Map(e) : new Set(e),
            r = e.clear();
        return t && ct(e, "clear", void 0, void 0, n), r
    }

    function Rt(e, t) {
        return function (n, r) {
            let i = this,
                o = i.__v_raw,
                a = Yt(o),
                l = t ? Ot : e ? kt : At;
            return !e && ut(a, "iterate", nt), o.forEach((e, t) => n.call(r, l(e), l(t), i))
        }
    }

    function Tt(e, t, n) {
        return function (...r) {
            let i = this.__v_raw,
                o = Yt(i),
                a = We(o),
                l = "entries" === e || e === Symbol.iterator && a,
                s = "keys" === e && a,
                u = i[e](...r),
                c = n ? Ot : t ? kt : At;
            return !t && ut(o, "iterate", s ? rt : nt), {
                next() {
                    let {
                        value: e,
                        done: t
                    } = u.next();
                    return t ? {
                        value: e,
                        done: t
                    } : {
                        value: l ? [c(e[0]), c(e[1])] : c(e),
                        done: t
                    }
                },
                [Symbol.iterator]() {
                    return this
                }
            }
        }
    }

    function zt(e) {
        return function (...t) {
            {
                let n = t[0] ? `on key "${t[0]}" ` : "";
                console.warn(`${Xe(e)} operation ${n}failed: target is readonly.`, Yt(this))
            }
            return "delete" !== e && this
        }
    }
    var It = {
            get(e) {
                return Ct(this, e)
            },
            get size() {
                return $t(this)
            },
            has: jt,
            add: Mt,
            set: Nt,
            delete: Pt,
            clear: Lt,
            forEach: Rt(!1, !1)
        },
        qt = {
            get(e) {
                return Ct(this, e, !1, !0)
            },
            get size() {
                return $t(this)
            },
            has: jt,
            add: Mt,
            set: Nt,
            delete: Pt,
            clear: Lt,
            forEach: Rt(!1, !0)
        },
        Dt = {
            get(e) {
                return Ct(this, e, !0)
            },
            get size() {
                return $t(this, !0)
            },
            has(e) {
                return jt.call(this, e, !0)
            },
            add: zt("add"),
            set: zt("set"),
            delete: zt("delete"),
            clear: zt("clear"),
            forEach: Rt(!0, !1)
        },
        Bt = {
            get(e) {
                return Ct(this, e, !0, !0)
            },
            get size() {
                return $t(this, !0)
            },
            has(e) {
                return jt.call(this, e, !0)
            },
            add: zt("add"),
            set: zt("set"),
            delete: zt("delete"),
            clear: zt("clear"),
            forEach: Rt(!0, !0)
        };

    function Wt(e, t) {
        let n = t ? e ? Bt : qt : e ? Dt : It;
        return (t, r, i) => "__v_isReactive" === r ? !e : "__v_isReadonly" === r ? e : "__v_raw" === r ? t : Reflect.get(De(n, r) && r in t ? n : t, r, i)
    } ["keys", "values", "entries", Symbol.iterator].forEach(e => {
        It[e] = Tt(e, !1, !1), Dt[e] = Tt(e, !0, !1), qt[e] = Tt(e, !1, !0), Bt[e] = Tt(e, !0, !0)
    });
    var Ft = {
            get: Wt(!1, !1)
        },
        Vt = (Wt(!1, !0), {
            get: Wt(!0, !1)
        });

    function Kt(e, t, n) {
        let r = Yt(n);
        if (r !== n && t.call(e, r)) {
            let t = Ze(e);
            console.warn(`Reactive ${t} contains both the raw and reactive versions of the same object${"Map"===t?" as keys":""}, which can lead to inconsistencies. Avoid differentiating between the raw and reactive versions of an object and only use the reactive version if possible.`)
        }
    }
    Wt(!0, !0);
    var Ut = new WeakMap,
        Zt = new WeakMap,
        Ht = new WeakMap,
        Gt = new WeakMap;

    function Jt(e) {
        return e && e.__v_isReadonly ? e : Xt(e, !1, wt, Ft, Ut)
    }

    function Qt(e) {
        return Xt(e, !0, Et, Vt, Ht)
    }

    function Xt(e, t, n, r, i) {
        if (!Ve(e)) return console.warn(`value cannot be made reactive: ${String(e)}`), e;
        if (e.__v_raw && (!t || !e.__v_isReactive)) return e;
        let o = i.get(e);
        if (o) return o;
        let a = function (e) {
            return e.__v_skip || !Object.isExtensible(e) ? 0 : function (e) {
                switch (e) {
                    case "Object":
                    case "Array":
                        return 1;
                    case "Map":
                    case "Set":
                    case "WeakMap":
                    case "WeakSet":
                        return 2;
                    default:
                        return 0
                }
            }(Ze(e))
        }(e);
        if (0 === a) return e;
        let l = new Proxy(e, 2 === a ? r : n);
        return i.set(e, l), l
    }

    function Yt(e) {
        return e && Yt(e.__v_raw) || e
    }

    function en(e) {
        return Boolean(e && !0 === e.__v_isRef)
    }
    M("nextTick", () => le), M("dispatch", e => ie.bind(ie, e)), M("watch", e => (t, n) => {
        let r, i = R(e, t),
            o = !0;
        a(() => i(e => {
            document.createElement("div").dataset.throwAway = e, o ? r = e : queueMicrotask(() => {
                n(e, r), r = e
            }), o = !1
        }))
    }), M("store", function () {
        return Me
    }), M("data", e => S(O(e))), M("root", e => ge(e)), M("refs", e => (e._x_refs_proxy || (e._x_refs_proxy = S(function (e) {
        let t = [],
            n = e;
        for (; n;) n._x_refs && t.push(n._x_refs), n = n.parentNode;
        return t
    }(e))), e._x_refs_proxy));
    var tn = {};

    function nn(e) {
        return tn[e] || (tn[e] = 0), ++tn[e]
    }
    M("id", e => (t, n = null) => {
        let r = function (e, t) {
                return ye(e, e => {
                    if (e._x_ids && e._x_ids[t]) return !0
                })
            }(e, t),
            i = r ? r._x_ids[t] : nn(t);
        return new rn(n ? `${t}-${i}-${n}` : `${t}-${i}`)
    });
    var rn = class {
        constructor(e) {
            this.id = e
        }
        toString() {
            return this.id
        }
    };
    M("el", e => e), F("teleport", (e, {
        expression: t
    }, {
        cleanup: n
    }) => {
        let r = document.querySelector(t),
            i = e.content.cloneNode(!0).firstElementChild;
        e._x_teleport = i, i._x_teleportBack = e, e._x_forwardEvents && e._x_forwardEvents.forEach(t => {
            i.addEventListener(t, t => {
                t.stopPropagation(), e.dispatchEvent(new t.constructor(t.type, t))
            })
        }), A(i, {}, e), x(() => {
            r.appendChild(i), ve(i), i._x_ignore = !0
        }), n(() => i.remove())
    });
    var on = () => {};

    function an(e, t, n, r = []) {
        switch (e._x_bindings || (e._x_bindings = o({})), e._x_bindings[t] = n, t = r.includes("camel") ? t.toLowerCase().replace(/-(\w)/g, (e, t) => t.toUpperCase()) : t) {
            case "value":
                ! function (e, t) {
                    if ("radio" === e.type) void 0 === e.attributes.value && (e.value = t), window.fromModel && (e.checked = ln(e.value, t));
                    else if ("checkbox" === e.type) Number.isInteger(t) ? e.value = t : Number.isInteger(t) || Array.isArray(t) || "boolean" == typeof t || [null, void 0].includes(t) ? Array.isArray(t) ? e.checked = t.some(t => ln(t, e.value)) : e.checked = !!t : e.value = String(t);
                    else if ("SELECT" === e.tagName) ! function (e, t) {
                        let n = [].concat(t).map(e => e + "");
                        Array.from(e.options).forEach(e => {
                            e.selected = n.includes(e.value)
                        })
                    }(e, t);
                    else {
                        if (e.value === t) return;
                        e.value = t
                    }
                }(e, n);
                break;
            case "style":
                ! function (e, t) {
                    e._x_undoAddedStyles && e._x_undoAddedStyles(), e._x_undoAddedStyles = we(e, t)
                }(e, n);
                break;
            case "class":
                ! function (e, t) {
                    e._x_undoAddedClasses && e._x_undoAddedClasses(), e._x_undoAddedClasses = xe(e, t)
                }(e, n);
                break;
            default:
                ! function (e, t, n) {
                    [null, void 0, !1].includes(n) && !["aria-pressed", "aria-checked", "aria-expanded"].includes(t) ? e.removeAttribute(t) : (["disabled", "checked", "required", "readonly", "hidden", "open", "selected", "autofocus", "itemscope", "multiple", "novalidate", "allowfullscreen", "allowpaymentrequest", "formnovalidate", "autoplay", "controls", "loop", "muted", "playsinline", "default", "ismap", "reversed", "async", "defer", "nomodule"].includes(t) && (n = t), function (e, t, n) {
                        e.getAttribute(t) != n && e.setAttribute(t, n)
                    }(e, t, n))
                }(e, t, n)
        }
    }

    function ln(e, t) {
        return e == t
    }

    function sn(e, t, n, r) {
        let i = e,
            o = e => r(e),
            a = {},
            l = (e, t) => n => t(e, n);
        if (n.includes("dot") && (t = t.replace(/-/g, ".")), n.includes("camel") && (t = t.toLowerCase().replace(/-(\w)/g, (e, t) => t.toUpperCase())), n.includes("passive") && (a.passive = !0), n.includes("capture") && (a.capture = !0), n.includes("window") && (i = window), n.includes("document") && (i = document), n.includes("prevent") && (o = l(o, (e, t) => {
                t.preventDefault(), e(t)
            })), n.includes("stop") && (o = l(o, (e, t) => {
                t.stopPropagation(), e(t)
            })), n.includes("self") && (o = l(o, (t, n) => {
                n.target === e && t(n)
            })), (n.includes("away") || n.includes("outside")) && (i = document, o = l(o, (t, n) => {
                e.contains(n.target) || e.offsetWidth < 1 && e.offsetHeight < 1 || !1 !== e._x_isShown && t(n)
            })), o = l(o, (e, r) => {
                (function (e) {
                    return ["keydown", "keyup"].includes(t)
                })() && function (e, t) {
                    let n = t.filter(e => !["window", "document", "prevent", "stop", "once"].includes(e));
                    if (n.includes("debounce")) {
                        let e = n.indexOf("debounce");
                        n.splice(e, un((n[e + 1] || "invalid-wait").split("ms")[0]) ? 2 : 1)
                    }
                    if (0 === n.length || 1 === n.length && cn(e.key).includes(n[0])) return !1;
                    let r = ["ctrl", "shift", "alt", "meta", "cmd", "super"].filter(e => n.includes(e));
                    return n = n.filter(e => !r.includes(e)), !(r.length > 0 && r.filter(t => (("cmd" === t || "super" === t) && (t = "meta"), e[`${t}Key`])).length === r.length && cn(e.key).includes(n[0]))
                }(r, n) || e(r)
            }), n.includes("debounce")) {
            let e = n[n.indexOf("debounce") + 1] || "invalid-wait",
                t = un(e.split("ms")[0]) ? Number(e.split("ms")[0]) : 250;
            o = je(o, t)
        }
        if (n.includes("throttle")) {
            let e = n[n.indexOf("throttle") + 1] || "invalid-wait",
                t = un(e.split("ms")[0]) ? Number(e.split("ms")[0]) : 250;
            o = $e(o, t)
        }
        return n.includes("once") && (o = l(o, (e, n) => {
            e(n), i.removeEventListener(t, o, a)
        })), i.addEventListener(t, o, a), () => {
            i.removeEventListener(t, o, a)
        }
    }

    function un(e) {
        return !Array.isArray(e) && !isNaN(e)
    }

    function cn(e) {
        if (!e) return [];
        e = function (e) {
            return e.replace(/([a-z])([A-Z])/g, "$1-$2").replace(/[_\s]/, "-").toLowerCase()
        }(e);
        let t = {
            ctrl: "control",
            slash: "/",
            space: "-",
            spacebar: "-",
            cmd: "meta",
            esc: "escape",
            up: "arrow-up",
            down: "arrow-down",
            left: "arrow-left",
            right: "arrow-right",
            period: ".",
            equal: "="
        };
        return t[e] = e, Object.keys(t).map(n => {
            if (t[n] === e) return n
        }).filter(e => e)
    }

    function fn(e) {
        let t = e ? parseFloat(e) : null;
        return function (e) {
            return !Array.isArray(e) && !isNaN(e)
        }(t) ? t : e
    }

    function dn(e, t, n, r) {
        let i = {};
        return /^\[.*\]$/.test(e.item) && Array.isArray(t) ? e.item.replace("[", "").replace("]", "").split(",").map(e => e.trim()).forEach((e, n) => {
            i[e] = t[n]
        }) : /^\{.*\}$/.test(e.item) && !Array.isArray(t) && "object" == typeof t ? e.item.replace("{", "").replace("}", "").split(",").map(e => e.trim()).forEach(e => {
            i[e] = t[e]
        }) : i[e.item] = t, e.index && (i[e.index] = n), e.collection && (i[e.collection] = r), i
    }

    function pn() {}
    on.inline = ((e, {
        modifiers: t
    }, {
        cleanup: n
    }) => {
        t.includes("self") ? e._x_ignoreSelf = !0 : e._x_ignore = !0, n(() => {
            t.includes("self") ? delete e._x_ignoreSelf : delete e._x_ignore
        })
    }), F("ignore", on), F("effect", (e, {
        expression: t
    }, {
        effect: n
    }) => n(R(e, t))), F("model", (e, {
        modifiers: t,
        expression: n
    }, {
        effect: r,
        cleanup: i
    }) => {
        let o = R(e, n),
            a = R(e, `${n} = rightSideOfExpression($event, ${n})`);
        var l = "select" === e.tagName.toLowerCase() || ["checkbox", "radio"].includes(e.type) || t.includes("lazy") ? "change" : "input";
        let s = function (e, t, n) {
                return "radio" === e.type && x(() => {
                    e.hasAttribute("name") || e.setAttribute("name", n)
                }), (n, r) => x(() => {
                    if (n instanceof CustomEvent && void 0 !== n.detail) return n.detail || n.target.value;
                    if ("checkbox" === e.type) {
                        if (Array.isArray(r)) {
                            let e = t.includes("number") ? fn(n.target.value) : n.target.value;
                            return n.target.checked ? r.concat([e]) : r.filter(t => ! function (e, t) {
                                return e == t
                            }(t, e))
                        }
                        return n.target.checked
                    }
                    if ("select" === e.tagName.toLowerCase() && e.multiple) return t.includes("number") ? Array.from(n.target.selectedOptions).map(e => {
                        return fn(e.value || e.text)
                    }) : Array.from(n.target.selectedOptions).map(e => e.value || e.text); {
                        let e = n.target.value;
                        return t.includes("number") ? fn(e) : t.includes("trim") ? e.trim() : e
                    }
                })
            }(e, t, n),
            u = sn(e, l, t, e => {
                a(() => {}, {
                    scope: {
                        $event: e,
                        rightSideOfExpression: s
                    }
                })
            });
        i(() => u());
        let c = R(e, `${n} = __placeholder`);
        e._x_model = {
            get() {
                let e;
                return o(t => e = t), e
            },
            set(e) {
                c(() => {}, {
                    scope: {
                        __placeholder: e
                    }
                })
            }
        }, e._x_forceModelUpdate = (() => {
            o(t => {
                void 0 === t && n.match(/\./) && (t = ""), window.fromModel = !0, x(() => an(e, "value", t)), delete window.fromModel
            })
        }), r(() => {
            t.includes("unintrusive") && document.activeElement.isSameNode(e) || e._x_forceModelUpdate()
        })
    }), F("cloak", e => queueMicrotask(() => x(() => e.removeAttribute(B("cloak"))))), me(() => `[${B("init")}]`), F("init", Ce((e, {
        expression: t
    }) => "string" == typeof t ? !!t.trim() && L(e, t, {}) : L(e, t, {}))), F("text", (e, {
        expression: t
    }, {
        effect: n,
        evaluateLater: r
    }) => {
        let i = r(t);
        n(() => {
            i(t => {
                x(() => {
                    e.textContent = t
                })
            })
        })
    }), F("html", (e, {
        expression: t
    }, {
        effect: n,
        evaluateLater: r
    }) => {
        let i = r(t);
        n(() => {
            i(t => {
                e.innerHTML = t
            })
        })
    }), X(H(":", G(B("bind:")))), F("bind", (e, {
        value: t,
        modifiers: n,
        expression: r,
        original: i
    }, {
        effect: o
    }) => {
        if (!t) return function (e, t, n, r) {
            let i = R(e, t),
                o = [];
            r(() => {
                for (; o.length;) o.pop()();
                i(t => {
                    let r = Object.entries(t).map(([e, t]) => ({
                            name: e,
                            value: t
                        })),
                        i = function (e) {
                            return Array.from(e).map(J()).filter(e => !Y(e))
                        }(r = r.filter(e => !("object" == typeof e.value && !Array.isArray(e.value) && null !== e.value)));
                    r = r.map(e => i.find(t => t.name === e.name) ? {
                        name: `x-bind:${e.name}`,
                        value: `"${e.value}"`
                    } : e), V(e, r, n).map(e => {
                        o.push(e.runCleanups), e()
                    })
                })
            })
        }(e, r, i, o);
        if ("key" === t) return function (e, t) {
            e._x_keyExpression = t
        }(e, r);
        let a = R(e, r);
        o(() => a(i => {
            void 0 === i && r.match(/\./) && (i = ""), x(() => an(e, t, i, n))
        }))
    }), he(() => `[${B("data")}]`), F("data", Ce((e, {
        expression: t
    }, {
        cleanup: n
    }) => {
        t = "" === t ? "{}" : t;
        let r = {};
        N(r, e);
        let i = {};
        ! function (e, t) {
            Object.entries(Pe).forEach(([n, r]) => {
                Object.defineProperty(e, n, {
                    get: () => (...e) => r.bind(t)(...e),
                    enumerable: !1
                })
            })
        }(i, r);
        let a = L(e, t, {
            scope: i
        });
        void 0 === a && (a = {}), N(a, e);
        let l = o(a);
        C(l);
        let s = A(e, l);
        l.init && L(e, l.init), n(() => {
            s(), l.destroy && L(e, l.destroy)
        })
    })), F("show", (e, {
        modifiers: t,
        expression: n
    }, {
        effect: r
    }) => {
        let i, o = R(e, n),
            a = () => x(() => {
                e.style.display = "none", e._x_isShown = !1
            }),
            l = () => x(() => {
                1 === e.style.length && "none" === e.style.display ? e.removeAttribute("style") : e.style.removeProperty("display"), e._x_isShown = !0
            }),
            s = () => setTimeout(l),
            u = Ee(e => e ? l() : a(), t => {
                "function" == typeof e._x_toggleAndCascadeWithTransitions ? e._x_toggleAndCascadeWithTransitions(e, t, l, a) : t ? s() : a()
            }),
            c = !0;
        r(() => o(e => {
            !c && e === i || (t.includes("immediate") && (e ? s() : a()), u(e), i = e, c = !1)
        }))
    }), F("for", (e, {
        expression: t
    }, {
        effect: n,
        cleanup: r
    }) => {
        let i = function (e) {
                let t = /,([^,\}\]]*)(?:,([^,\}\]]*))?$/,
                    n = e.match(/([\s\S]*?)\s+(?:in|of)\s+([\s\S]*)/);
                if (!n) return;
                let r = {};
                r.items = n[2].trim();
                let i = n[1].replace(/^\s*\(|\)\s*$/g, "").trim(),
                    o = i.match(t);
                return o ? (r.item = i.replace(t, "").trim(), r.index = o[1].trim(), o[2] && (r.collection = o[2].trim())) : r.item = i, r
            }(t),
            a = R(e, i.items),
            l = R(e, e._x_keyExpression || "index");
        e._x_prevKeys = [], e._x_lookup = {}, n(() => (function (e, t, n, r) {
            let i = e;
            a(n => {
                (function (e) {
                    return !Array.isArray(e) && !isNaN(e)
                })(n) && n >= 0 && (n = Array.from(Array(n).keys(), e => e + 1)), void 0 === n && (n = []);
                let a = e._x_lookup,
                    l = e._x_prevKeys,
                    s = [],
                    u = [];
                if ((e => "object" == typeof e && !Array.isArray(e))(n)) n = Object.entries(n).map(([e, i]) => {
                    let o = dn(t, i, e, n);
                    r(e => u.push(e), {
                        scope: {
                            index: e,
                            ...o
                        }
                    }), s.push(o)
                });
                else
                    for (let e = 0; e < n.length; e++) {
                        let i = dn(t, n[e], e, n);
                        r(e => u.push(e), {
                            scope: {
                                index: e,
                                ...i
                            }
                        }), s.push(i)
                    }
                let c = [],
                    f = [],
                    d = [],
                    p = [];
                for (let e = 0; e < l.length; e++) {
                    let t = l[e]; - 1 === u.indexOf(t) && d.push(t)
                }
                l = l.filter(e => !d.includes(e));
                let _ = "template";
                for (let e = 0; e < u.length; e++) {
                    let t = u[e],
                        n = l.indexOf(t);
                    if (-1 === n) l.splice(e, 0, t), c.push([_, e]);
                    else if (n !== e) {
                        let t = l.splice(e, 1)[0],
                            r = l.splice(n - 1, 1)[0];
                        l.splice(e, 0, r), l.splice(n, 0, t), f.push([t, r])
                    } else p.push(t);
                    _ = t
                }
                for (let e = 0; e < d.length; e++) {
                    let t = d[e];
                    a[t].remove(), a[t] = null, delete a[t]
                }
                for (let e = 0; e < f.length; e++) {
                    let [t, n] = f[e], r = a[t], i = a[n], o = document.createElement("div");
                    x(() => {
                        i.after(o), r.after(i), i._x_currentIfEl && i.after(i._x_currentIfEl), o.before(r), r._x_currentIfEl && r.after(r._x_currentIfEl), o.remove()
                    }), k(i, s[u.indexOf(n)])
                }
                for (let e = 0; e < c.length; e++) {
                    let [t, n] = c[e], r = "template" === t ? i : a[t];
                    r._x_currentIfEl && (r = r._x_currentIfEl);
                    let l = s[n],
                        f = u[n],
                        d = document.importNode(i.content, !0).firstElementChild;
                    A(d, o(l), i), x(() => {
                        r.after(d), ve(d)
                    }), "object" == typeof f && ce("x-for key cannot be an object, it must be a string or an integer", i), a[f] = d
                }
                for (let e = 0; e < p.length; e++) k(a[p[e]], s[u.indexOf(p[e])]);
                i._x_prevKeys = u
            })
        })(e, i, 0, l)), r(() => {
            Object.values(e._x_lookup).forEach(e => e.remove()), delete e._x_prevKeys, delete e._x_lookup
        })
    }), pn.inline = ((e, {
        expression: t
    }, {
        cleanup: n
    }) => {
        let r = ge(e);
        r._x_refs || (r._x_refs = {}), r._x_refs[t] = e, n(() => delete r._x_refs[t])
    }), F("ref", pn), F("if", (e, {
        expression: t
    }, {
        effect: n,
        cleanup: r
    }) => {
        let i = R(e, t);
        n(() => i(t => {
            t ? (() => {
                if (e._x_currentIfEl) return e._x_currentIfEl;
                let t = e.content.cloneNode(!0).firstElementChild;
                A(t, {}, e), x(() => {
                    e.after(t), ve(t)
                }), e._x_currentIfEl = t, e._x_undoIf = (() => {
                    t.remove(), delete e._x_currentIfEl
                })
            })() : !e._x_undoIf || (e._x_undoIf(), delete e._x_undoIf)
        })), r(() => e._x_undoIf && e._x_undoIf())
    }), F("id", (e, {
        expression: t
    }, {
        evaluate: n
    }) => {
        n(t).forEach(t => (function (e, t) {
            e._x_ids || (e._x_ids = {}), e._x_ids[t] || (e._x_ids[t] = nn(t))
        })(e, t))
    }), X(H("@", G(B("on:")))), F("on", Ce((e, {
        value: t,
        modifiers: n,
        expression: r
    }, {
        cleanup: i
    }) => {
        let o = r ? R(e, r) : () => {};
        "template" === e.tagName.toLowerCase() && (e._x_forwardEvents || (e._x_forwardEvents = []), e._x_forwardEvents.includes(t) || e._x_forwardEvents.push(t));
        let a = sn(e, t, n, e => {
            o(() => {}, {
                scope: {
                    $event: e
                },
                params: [e]
            })
        });
        i(() => a())
    })), Le.setEvaluator(z), Le.setReactivityEngine({
        reactive: Jt,
        effect: function (e, t = ze) {
            (function (e) {
                return e && !0 === e._isEffect
            })(e) && (e = e.raw);
            let n = function (e, t) {
                let n = function () {
                    if (!n.active) return e();
                    if (!tt.includes(n)) {
                        ot(n);
                        try {
                            return lt.push(at), at = !0, tt.push(n), Te = n, e()
                        } finally {
                            tt.pop(), st(), Te = tt[tt.length - 1]
                        }
                    }
                };
                return n.id = it++, n.allowRecurse = !!t.allowRecurse, n._isEffect = !0, n.active = !0, n.raw = e, n.deps = [], n.options = t, n
            }(e, t);
            return t.lazy || n(), n
        },
        release: function (e) {
            e.active && (ot(e), e.options.onStop && e.options.onStop(), e.active = !1)
        },
        raw: Yt
    });
    var _n = Le;
    window.Alpine = _n, queueMicrotask(() => {
        _n.start()
    })
})();