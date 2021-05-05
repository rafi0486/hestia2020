! function (e) {
    var t = {};

    function n(r) {
        if (t[r]) return t[r].exports;
        var i = t[r] = {
            i: r,
            l: !1,
            exports: {}
        };
        return e[r].call(i.exports, i, i.exports, n), i.l = !0, i.exports
    }
    n.m = e, n.c = t, n.d = function (e, t, r) {
        n.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: r
        })
    }, n.r = function (e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }, n.t = function (e, t) {
        if (1 & t && (e = n(e)), 8 & t) return e;
        if (4 & t && "object" == typeof e && e && e.__esModule) return e;
        var r = Object.create(null);
        if (n.r(r), Object.defineProperty(r, "default", {
                enumerable: !0,
                value: e
            }), 2 & t && "string" != typeof e)
            for (var i in e) n.d(r, i, function (t) {
                return e[t]
            }.bind(null, i));
        return r
    }, n.n = function (e) {
        var t = e && e.__esModule ? function () {
            return e.default
        } : function () {
            return e
        };
        return n.d(t, "a", t), t
    }, n.o = function (e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, n.p = "", n(n.s = 21)
}([function (e, t, n) {
    var r;
    e.exports = ((r = function () {
        function e(e) {
            return i.appendChild(e.dom), e
        }

        function t(e) {
            for (var t = 0; t < i.children.length; t++) i.children[t].style.display = t === e ? "block" : "none";
            n = e
        }
        var n = 0,
            i = document.createElement("div");
        i.style.cssText = "position:fixed;top:0;left:0;cursor:pointer;opacity:0.9;z-index:10000", i.addEventListener("click", (function (e) {
            e.preventDefault(), t(++n % i.children.length)
        }), !1);
        var a = (performance || Date).now(),
            o = a,
            u = 0,
            s = e(new r.Panel("FPS", "#0ff", "#002")),
            c = e(new r.Panel("MS", "#0f0", "#020"));
        if (self.performance && self.performance.memory) var f = e(new r.Panel("MB", "#f08", "#201"));
        return t(0), {
            REVISION: 16,
            dom: i,
            addPanel: e,
            showPanel: t,
            begin: function () {
                a = (performance || Date).now()
            },
            end: function () {
                u++;
                var e = (performance || Date).now();
                if (c.update(e - a, 200), e > o + 1e3 && (s.update(1e3 * u / (e - o), 100), o = e, u = 0, f)) {
                    var t = performance.memory;
                    f.update(t.usedJSHeapSize / 1048576, t.jsHeapSizeLimit / 1048576)
                }
                return e
            },
            update: function () {
                a = this.end()
            },
            domElement: i,
            setMode: t
        }
    }).Panel = function (e, t, n) {
        var r = 1 / 0,
            i = 0,
            a = Math.round,
            o = a(window.devicePixelRatio || 1),
            u = 80 * o,
            s = 48 * o,
            c = 3 * o,
            f = 2 * o,
            l = 3 * o,
            d = 15 * o,
            p = 74 * o,
            m = 30 * o,
            h = document.createElement("canvas");
        h.width = u, h.height = s, h.style.cssText = "width:80px;height:48px";
        var b = h.getContext("2d");
        return b.font = "bold " + 9 * o + "px Helvetica,Arial,sans-serif", b.textBaseline = "top", b.fillStyle = n, b.fillRect(0, 0, u, s), b.fillStyle = t, b.fillText(e, c, f), b.fillRect(l, d, p, m), b.fillStyle = n, b.globalAlpha = .9, b.fillRect(l, d, p, m), {
            dom: h,
            update: function (s, v) {
                r = Math.min(r, s), i = Math.max(i, s), b.fillStyle = n, b.globalAlpha = 1, b.fillRect(0, 0, u, d), b.fillStyle = t, b.fillText(a(s) + " " + e + " (" + a(r) + "-" + a(i) + ")", c, f), b.drawImage(h, l + o, d, p - o, m, l, d, p - o, m), b.fillRect(l + p - o, d, o, m), b.fillStyle = n, b.globalAlpha = .9, b.fillRect(l + p - o, d, o, a((1 - s / v) * m))
            }
        }
    }, r)
}, function (e, t, n) {
    "use strict";
    const r = n(10),
        i = n(11),
        a = n(12);

    function o(e, t) {
        return t.encode ? t.strict ? r(e) : encodeURIComponent(e) : e
    }

    function u(e, t) {
        return t.decode ? i(e) : e
    }

    function s(e) {
        const t = e.indexOf("#");
        return -1 !== t && (e = e.slice(0, t)), e
    }

    function c(e) {
        const t = (e = s(e)).indexOf("?");
        return -1 === t ? "" : e.slice(t + 1)
    }

    function f(e, t) {
        return t.parseNumbers && !Number.isNaN(Number(e)) && "string" == typeof e && "" !== e.trim() ? e = Number(e) : !t.parseBooleans || null === e || "true" !== e.toLowerCase() && "false" !== e.toLowerCase() || (e = "true" === e.toLowerCase()), e
    }

    function l(e, t) {
        const n = function (e) {
                let t;
                switch (e.arrayFormat) {
                    case "index":
                        return (e, n, r) => {
                            t = /\[(\d*)\]$/.exec(e), e = e.replace(/\[\d*\]$/, ""), t ? (void 0 === r[e] && (r[e] = {}), r[e][t[1]] = n) : r[e] = n
                        };
                    case "bracket":
                        return (e, n, r) => {
                            t = /(\[\])$/.exec(e), e = e.replace(/\[\]$/, ""), t ? void 0 !== r[e] ? r[e] = [].concat(r[e], n) : r[e] = [n] : r[e] = n
                        };
                    case "comma":
                        return (e, t, n) => {
                            const r = "string" == typeof t && t.split("").indexOf(",") > -1 ? t.split(",") : t;
                            n[e] = r
                        };
                    default:
                        return (e, t, n) => {
                            void 0 !== n[e] ? n[e] = [].concat(n[e], t) : n[e] = t
                        }
                }
            }(t = Object.assign({
                decode: !0,
                sort: !0,
                arrayFormat: "none",
                parseNumbers: !1,
                parseBooleans: !1
            }, t)),
            r = Object.create(null);
        if ("string" != typeof e) return r;
        if (!(e = e.trim().replace(/^[?#&]/, ""))) return r;
        for (const i of e.split("&")) {
            let [e, o] = a(t.decode ? i.replace(/\+/g, " ") : i, "=");
            o = void 0 === o ? null : u(o, t), n(u(e, t), o, r)
        }
        for (const e of Object.keys(r)) {
            const n = r[e];
            if ("object" == typeof n && null !== n)
                for (const e of Object.keys(n)) n[e] = f(n[e], t);
            else r[e] = f(n, t)
        }
        return !1 === t.sort ? r : (!0 === t.sort ? Object.keys(r).sort() : Object.keys(r).sort(t.sort)).reduce((e, t) => {
            const n = r[t];
            return Boolean(n) && "object" == typeof n && !Array.isArray(n) ? e[t] = function e(t) {
                return Array.isArray(t) ? t.sort() : "object" == typeof t ? e(Object.keys(t)).sort((e, t) => Number(e) - Number(t)).map(e => t[e]) : t
            }(n) : e[t] = n, e
        }, Object.create(null))
    }
    t.extract = c, t.parse = l, t.stringify = (e, t) => {
        if (!e) return "";
        const n = function (e) {
                switch (e.arrayFormat) {
                    case "index":
                        return t => (n, r) => {
                            const i = n.length;
                            return void 0 === r || e.skipNull && null === r ? n : null === r ? [...n, [o(t, e), "[", i, "]"].join("")] : [...n, [o(t, e), "[", o(i, e), "]=", o(r, e)].join("")]
                        };
                    case "bracket":
                        return t => (n, r) => void 0 === r || e.skipNull && null === r ? n : null === r ? [...n, [o(t, e), "[]"].join("")] : [...n, [o(t, e), "[]=", o(r, e)].join("")];
                    case "comma":
                        return t => (n, r) => null == r || 0 === r.length ? n : 0 === n.length ? [
                            [o(t, e), "=", o(r, e)].join("")
                        ] : [
                            [n, o(r, e)].join(",")
                        ];
                    default:
                        return t => (n, r) => void 0 === r || e.skipNull && null === r ? n : null === r ? [...n, o(t, e)] : [...n, [o(t, e), "=", o(r, e)].join("")]
                }
            }(t = Object.assign({
                encode: !0,
                strict: !0,
                arrayFormat: "none"
            }, t)),
            r = Object.assign({}, e);
        if (t.skipNull)
            for (const e of Object.keys(r)) void 0 !== r[e] && null !== r[e] || delete r[e];
        const i = Object.keys(r);
        return !1 !== t.sort && i.sort(t.sort), i.map(r => {
            const i = e[r];
            return void 0 === i ? "" : null === i ? o(r, t) : Array.isArray(i) ? i.reduce(n(r), []).join("&") : o(r, t) + "=" + o(i, t)
        }).filter(e => e.length > 0).join("&")
    }, t.parseUrl = (e, t) => ({
        url: s(e).split("?")[0] || "",
        query: l(c(e), t)
    })
}, function (e, t, n) {
    e.exports = function () {
        "use strict";
        var e = function (e) {
                return e instanceof Uint8Array || e instanceof Uint16Array || e instanceof Uint32Array || e instanceof Int8Array || e instanceof Int16Array || e instanceof Int32Array || e instanceof Float32Array || e instanceof Float64Array || e instanceof Uint8ClampedArray
            },
            t = function (e, t) {
                for (var n = Object.keys(t), r = 0; r < n.length; ++r) e[n[r]] = t[n[r]];
                return e
            },
            n = "\n";

        function r(e) {
            var t = new Error("(regl) " + e);
            throw console.error(t), t
        }

        function i(e, t) {
            e || r(t)
        }

        function a(e) {
            return e ? ": " + e : ""
        }

        function o(e, t, n) {
            t.indexOf(e) < 0 && r("invalid value" + a(n) + ". must be one of: " + t)
        }
        var u = ["gl", "canvas", "container", "attributes", "pixelRatio", "extensions", "optionalExtensions", "profile", "onDone"];

        function s(e, t) {
            for (e += ""; e.length < t;) e = " " + e;
            return e
        }

        function c() {
            this.name = "unknown", this.lines = [], this.index = {}, this.hasErrors = !1
        }

        function f(e, t) {
            this.number = e, this.line = t, this.errors = []
        }

        function l(e, t, n) {
            this.file = e, this.line = t, this.message = n
        }

        function d() {
            var e = new Error,
                t = (e.stack || e).toString(),
                n = /compileProcedure.*\n\s*at.*\((.*)\)/.exec(t);
            if (n) return n[1];
            var r = /compileProcedure.*\n\s*at\s+(.*)(\n|$)/.exec(t);
            return r ? r[1] : "unknown"
        }

        function p() {
            var e = new Error,
                t = (e.stack || e).toString(),
                n = /at REGLCommand.*\n\s+at.*\((.*)\)/.exec(t);
            if (n) return n[1];
            var r = /at REGLCommand.*\n\s+at\s+(.*)\n/.exec(t);
            return r ? r[1] : "unknown"
        }

        function m(e, t) {
            var n, r = e.split("\n"),
                i = 1,
                a = 0,
                o = {
                    unknown: new c,
                    0: new c
                };
            o.unknown.name = o[0].name = t || d(), o.unknown.lines.push(new f(0, ""));
            for (var u = 0; u < r.length; ++u) {
                var s = r[u],
                    l = /^\s*\#\s*(\w+)\s+(.+)\s*$/.exec(s);
                if (l) switch (l[1]) {
                    case "line":
                        var p = /(\d+)(\s+\d+)?/.exec(l[2]);
                        p && (i = 0 | p[1], p[2] && ((a = 0 | p[2]) in o || (o[a] = new c)));
                        break;
                    case "define":
                        var m = /SHADER_NAME(_B64)?\s+(.*)$/.exec(l[2]);
                        m && (o[a].name = m[1] ? (n = m[2], "undefined" != typeof atob ? atob(n) : "base64:" + n) : m[2])
                }
                o[a].lines.push(new f(i++, s))
            }
            return Object.keys(o).forEach((function (e) {
                var t = o[e];
                t.lines.forEach((function (e) {
                    t.index[e.number] = e
                }))
            })), o
        }

        function h(e) {
            e._commandRef = d()
        }

        function b(e, t) {
            var n = p();
            r(e + " in command " + (t || d()) + ("unknown" === n ? "" : " called from " + n))
        }

        function v(e, t, n, r) {
            typeof e !== t && b("invalid parameter type" + a(n) + ". expected " + t + ", got " + typeof e, r || d())
        }
        var g = 33071,
            _ = 9728,
            y = 9984,
            x = 9985,
            w = 9986,
            k = 9987,
            A = 5126,
            S = 32819,
            E = 32820,
            C = 33635,
            O = 34042,
            T = {};

        function M(e, t) {
            return e === E || e === S || e === C ? 2 : e === O ? 4 : T[e] * t
        }

        function j(e) {
            return !(e & e - 1 || !e)
        }
        T[5120] = T[5121] = 1, T[5122] = T[5123] = T[36193] = T[C] = T[S] = T[E] = 2, T[5124] = T[5125] = T[A] = T[O] = 4;
        var D = t(i, {
                optional: function (e) {
                    e()
                },
                raise: r,
                commandRaise: b,
                command: function (e, t, n) {
                    e || b(t, n || d())
                },
                parameter: function (e, t, n) {
                    e in t || r("unknown parameter (" + e + ")" + a(n) + ". possible values: " + Object.keys(t).join())
                },
                commandParameter: function (e, t, n, r) {
                    e in t || b("unknown parameter (" + e + ")" + a(n) + ". possible values: " + Object.keys(t).join(), r || d())
                },
                constructor: function (e) {
                    Object.keys(e).forEach((function (e) {
                        u.indexOf(e) < 0 && r('invalid regl constructor argument "' + e + '". must be one of ' + u)
                    }))
                },
                type: function (e, t, n) {
                    typeof e !== t && r("invalid parameter type" + a(n) + ". expected " + t + ", got " + typeof e)
                },
                commandType: v,
                isTypedArray: function (t, n) {
                    e(t) || r("invalid parameter type" + a(n) + ". must be a typed array")
                },
                nni: function (e, t) {
                    e >= 0 && (0 | e) === e || r("invalid parameter type, (" + e + ")" + a(t) + ". must be a nonnegative integer")
                },
                oneOf: o,
                shaderError: function (e, t, r, a, o) {
                    if (!e.getShaderParameter(t, e.COMPILE_STATUS)) {
                        var u = e.getShaderInfoLog(t),
                            c = a === e.FRAGMENT_SHADER ? "fragment" : "vertex";
                        v(r, "string", c + " shader source must be a string", o);
                        var f = m(r, o),
                            d = function (e) {
                                var t = [];
                                return e.split("\n").forEach((function (e) {
                                    if (!(e.length < 5)) {
                                        var n = /^ERROR\:\s+(\d+)\:(\d+)\:\s*(.*)$/.exec(e);
                                        n ? t.push(new l(0 | n[1], 0 | n[2], n[3].trim())) : e.length > 0 && t.push(new l("unknown", 0, e))
                                    }
                                })), t
                            }(u);
                        ! function (e, t) {
                            t.forEach((function (t) {
                                var n = e[t.file];
                                if (n) {
                                    var r = n.index[t.line];
                                    if (r) return r.errors.push(t), void(n.hasErrors = !0)
                                }
                                e.unknown.hasErrors = !0, e.unknown.lines[0].errors.push(t)
                            }))
                        }(f, d), Object.keys(f).forEach((function (e) {
                            var t = f[e];
                            if (t.hasErrors) {
                                var r = [""],
                                    i = [""];
                                a("file number " + e + ": " + t.name + "\n", "color:red;text-decoration:underline;font-weight:bold"), t.lines.forEach((function (e) {
                                    if (e.errors.length > 0) {
                                        a(s(e.number, 4) + "|  ", "background-color:yellow; font-weight:bold"), a(e.line + n, "color:red; background-color:yellow; font-weight:bold");
                                        var t = 0;
                                        e.errors.forEach((function (r) {
                                            var i = r.message,
                                                o = /^\s*\'(.*)\'\s*\:\s*(.*)$/.exec(i);
                                            if (o) {
                                                var u = o[1];
                                                switch (i = o[2], u) {
                                                    case "assign":
                                                        u = "="
                                                }
                                                t = Math.max(e.line.indexOf(u, t), 0)
                                            } else t = 0;
                                            a(s("| ", 6)), a(s("^^^", t + 3) + n, "font-weight:bold"), a(s("| ", 6)), a(i + n, "font-weight:bold")
                                        })), a(s("| ", 6) + n)
                                    } else a(s(e.number, 4) + "|  "), a(e.line + n, "color:red")
                                })), "undefined" == typeof document || window.chrome ? console.log(r.join("")) : (i[0] = r.join("%c"), console.log.apply(console, i))
                            }

                            function a(e, t) {
                                r.push(e), i.push(t || "")
                            }
                        })), i.raise("Error compiling " + c + " shader, " + f[0].name)
                    }
                },
                linkError: function (e, t, r, a, o) {
                    if (!e.getProgramParameter(t, e.LINK_STATUS)) {
                        var u = e.getProgramInfoLog(t),
                            s = m(r, o),
                            c = 'Error linking program with vertex shader, "' + m(a, o)[0].name + '", and fragment shader "' + s[0].name + '"';
                        "undefined" != typeof document ? console.log("%c" + c + n + "%c" + u, "color:red;text-decoration:underline;font-weight:bold", "color:red") : console.log(c + n + u), i.raise(c)
                    }
                },
                callSite: p,
                saveCommandRef: h,
                saveDrawInfo: function (e, t, n, r) {
                    function i(e) {
                        return e ? r.id(e) : 0
                    }

                    function a(e, t) {
                        Object.keys(t).forEach((function (t) {
                            e[r.id(t)] = !0
                        }))
                    }
                    h(e), e._fragId = i(e.static.frag), e._vertId = i(e.static.vert);
                    var o = e._uniformSet = {};
                    a(o, t.static), a(o, t.dynamic);
                    var u = e._attributeSet = {};
                    a(u, n.static), a(u, n.dynamic), e._hasCount = "count" in e.static || "count" in e.dynamic || "elements" in e.static || "elements" in e.dynamic
                },
                framebufferFormat: function (e, t, n) {
                    e.texture ? o(e.texture._texture.internalformat, t, "unsupported texture format for attachment") : o(e.renderbuffer._renderbuffer.format, n, "unsupported renderbuffer format for attachment")
                },
                guessCommand: d,
                texture2D: function (e, t, n) {
                    var r, a = t.width,
                        o = t.height,
                        u = t.channels;
                    i(a > 0 && a <= n.maxTextureSize && o > 0 && o <= n.maxTextureSize, "invalid texture shape"), e.wrapS === g && e.wrapT === g || i(j(a) && j(o), "incompatible wrap mode for texture, both width and height must be power of 2"), 1 === t.mipmask ? 1 !== a && 1 !== o && i(e.minFilter !== y && e.minFilter !== w && e.minFilter !== x && e.minFilter !== k, "min filter requires mipmap") : (i(j(a) && j(o), "texture must be a square power of 2 to support mipmapping"), i(t.mipmask === (a << 1) - 1, "missing or incomplete mipmap data")), t.type === A && (n.extensions.indexOf("oes_texture_float_linear") < 0 && i(e.minFilter === _ && e.magFilter === _, "filter not supported, must enable oes_texture_float_linear"), i(!e.genMipmaps, "mipmap generation not supported with float textures"));
                    var s = t.images;
                    for (r = 0; r < 16; ++r)
                        if (s[r]) {
                            var c = a >> r,
                                f = o >> r;
                            i(t.mipmask & 1 << r, "missing mipmap data");
                            var l = s[r];
                            if (i(l.width === c && l.height === f, "invalid shape for mip images"), i(l.format === t.format && l.internalformat === t.internalformat && l.type === t.type, "incompatible type for mip image"), l.compressed);
                            else if (l.data) {
                                var d = Math.ceil(M(l.type, u) * c / l.unpackAlignment) * l.unpackAlignment;
                                i(l.data.byteLength === d * f, "invalid data for image, buffer size is inconsistent with image format")
                            } else l.element || l.copy
                        } else e.genMipmaps || i(0 == (t.mipmask & 1 << r), "extra mipmap data");
                    t.compressed && i(!e.genMipmaps, "mipmap generation for compressed images not supported")
                },
                textureCube: function (e, t, n, r) {
                    var a = e.width,
                        o = e.height,
                        u = e.channels;
                    i(a > 0 && a <= r.maxTextureSize && o > 0 && o <= r.maxTextureSize, "invalid texture shape"), i(a === o, "cube map must be square"), i(t.wrapS === g && t.wrapT === g, "wrap mode not supported by cube map");
                    for (var s = 0; s < n.length; ++s) {
                        var c = n[s];
                        i(c.width === a && c.height === o, "inconsistent cube map face shape"), t.genMipmaps && (i(!c.compressed, "can not generate mipmap for compressed textures"), i(1 === c.mipmask, "can not specify mipmaps and generate mipmaps"));
                        for (var f = c.images, l = 0; l < 16; ++l) {
                            var d = f[l];
                            if (d) {
                                var p = a >> l,
                                    m = o >> l;
                                i(c.mipmask & 1 << l, "missing mipmap data"), i(d.width === p && d.height === m, "invalid shape for mip images"), i(d.format === e.format && d.internalformat === e.internalformat && d.type === e.type, "incompatible type for mip image"), d.compressed || (d.data ? i(d.data.byteLength === p * m * Math.max(M(d.type, u), d.unpackAlignment), "invalid data for image, buffer size is inconsistent with image format") : d.element || d.copy)
                            }
                        }
                    }
                }
            }),
            F = 0,
            R = 0;

        function I(e, t) {
            this.id = F++, this.type = e, this.data = t
        }

        function L(e) {
            return e.replace(/\\/g, "\\\\").replace(/"/g, '\\"')
        }

        function B(e) {
            return "[" + function e(t) {
                if (0 === t.length) return [];
                var n = t.charAt(0),
                    r = t.charAt(t.length - 1);
                if (t.length > 1 && n === r && ('"' === n || "'" === n)) return ['"' + L(t.substr(1, t.length - 2)) + '"'];
                var i = /\[(false|true|null|\d+|'[^']*'|"[^"]*")\]/.exec(t);
                if (i) return e(t.substr(0, i.index)).concat(e(i[1])).concat(e(t.substr(i.index + i[0].length)));
                var a = t.split(".");
                if (1 === a.length) return ['"' + L(t) + '"'];
                for (var o = [], u = 0; u < a.length; ++u) o = o.concat(e(a[u]));
                return o
            }(e).join("][") + "]"
        }
        var P = {
                DynamicVariable: I,
                define: function (e, t) {
                    return new I(e, B(t + ""))
                },
                isDynamic: function (e) {
                    return "function" == typeof e && !e._reglType || e instanceof I
                },
                unbox: function (e, t) {
                    return "function" == typeof e ? new I(R, e) : e
                },
                accessor: B
            },
            z = {
                next: "function" == typeof requestAnimationFrame ? function (e) {
                    return requestAnimationFrame(e)
                } : function (e) {
                    return setTimeout(e, 16)
                },
                cancel: "function" == typeof cancelAnimationFrame ? function (e) {
                    return cancelAnimationFrame(e)
                } : clearTimeout
            },
            N = "undefined" != typeof performance && performance.now ? function () {
                return performance.now()
            } : function () {
                return +new Date
            };

        function H(e) {
            return "string" == typeof e ? e.split() : (D(Array.isArray(e), "invalid extension array"), e)
        }

        function U(e) {
            return "string" == typeof e ? (D("undefined" != typeof document, "not supported outside of DOM"), document.querySelector(e)) : e
        }

        function V(e) {
            var n, r, i, a, o, u = e || {},
                s = {},
                c = [],
                f = [],
                l = "undefined" == typeof window ? 1 : window.devicePixelRatio,
                d = !1,
                p = function (e) {
                    e && D.raise(e)
                },
                m = function () {};
            if ("string" == typeof u ? (D("undefined" != typeof document, "selector queries only supported in DOM enviroments"), n = document.querySelector(u), D(n, "invalid query string for element")) : "object" == typeof u ? "string" == typeof (o = u).nodeName && "function" == typeof o.appendChild && "function" == typeof o.getBoundingClientRect ? n = u : function (e) {
                    return "function" == typeof e.drawArrays || "function" == typeof e.drawElements
                }(u) ? i = (a = u).canvas : (D.constructor(u), "gl" in u ? a = u.gl : "canvas" in u ? i = U(u.canvas) : "container" in u && (r = U(u.container)), "attributes" in u && (s = u.attributes, D.type(s, "object", "invalid context attributes")), "extensions" in u && (c = H(u.extensions)), "optionalExtensions" in u && (f = H(u.optionalExtensions)), "onDone" in u && (D.type(u.onDone, "function", "invalid or missing onDone callback"), p = u.onDone), "profile" in u && (d = !!u.profile), "pixelRatio" in u && (l = +u.pixelRatio, D(l > 0, "invalid pixel ratio"))) : D.raise("invalid arguments to regl"), n && ("canvas" === n.nodeName.toLowerCase() ? i = n : r = n), !a) {
                if (!i) {
                    D("undefined" != typeof document, "must manually specify webgl context outside of DOM environments");
                    var h = function (e, n, r) {
                        var i = document.createElement("canvas");

                        function a() {
                            var n = window.innerWidth,
                                a = window.innerHeight;
                            if (e !== document.body) {
                                var o = e.getBoundingClientRect();
                                n = o.right - o.left, a = o.bottom - o.top
                            }
                            i.width = r * n, i.height = r * a, t(i.style, {
                                width: n + "px",
                                height: a + "px"
                            })
                        }
                        return t(i.style, {
                            border: 0,
                            margin: 0,
                            padding: 0,
                            top: 0,
                            left: 0
                        }), e.appendChild(i), e === document.body && (i.style.position = "absolute", t(e.style, {
                            margin: 0,
                            padding: 0
                        })), window.addEventListener("resize", a, !1), a(), {
                            canvas: i,
                            onDestroy: function () {
                                window.removeEventListener("resize", a), e.removeChild(i)
                            }
                        }
                    }(r || document.body, 0, l);
                    if (!h) return null;
                    i = h.canvas, m = h.onDestroy
                }
                a = function (e, t) {
                    function n(n) {
                        try {
                            return e.getContext(n, t)
                        } catch (e) {
                            return null
                        }
                    }
                    return n("webgl") || n("experimental-webgl") || n("webgl-experimental")
                }(i, s)
            }
            return a ? {
                gl: a,
                canvas: i,
                container: r,
                extensions: c,
                optionalExtensions: f,
                pixelRatio: l,
                profile: d,
                onDone: p,
                onDestroy: m
            } : (m(), p("webgl not supported, try upgrading your browser or graphics drivers http://get.webgl.org"), null)
        }

        function G(e, t) {
            for (var n = Array(e), r = 0; r < e; ++r) n[r] = t(r);
            return n
        }
        var W = 5120,
            Y = 5121,
            X = 5122,
            q = 5123,
            Q = 5124,
            K = 5125,
            Z = 5126;

        function J(e) {
            var t, n;
            return t = (e > 65535) << 4, t |= n = ((e >>>= t) > 255) << 3, t |= n = ((e >>>= n) > 15) << 2, (t |= n = ((e >>>= n) > 3) << 1) | (e >>>= n) >> 1
        }

        function $() {
            var e = G(8, (function () {
                return []
            }));

            function t(t) {
                var n = function (e) {
                        for (var t = 16; t <= 1 << 28; t *= 16)
                            if (e <= t) return t;
                        return 0
                    }(t),
                    r = e[J(n) >> 2];
                return r.length > 0 ? r.pop() : new ArrayBuffer(n)
            }

            function n(t) {
                e[J(t.byteLength) >> 2].push(t)
            }
            return {
                alloc: t,
                free: n,
                allocType: function (e, n) {
                    var r = null;
                    switch (e) {
                        case W:
                            r = new Int8Array(t(n), 0, n);
                            break;
                        case Y:
                            r = new Uint8Array(t(n), 0, n);
                            break;
                        case X:
                            r = new Int16Array(t(2 * n), 0, n);
                            break;
                        case q:
                            r = new Uint16Array(t(2 * n), 0, n);
                            break;
                        case Q:
                            r = new Int32Array(t(4 * n), 0, n);
                            break;
                        case K:
                            r = new Uint32Array(t(4 * n), 0, n);
                            break;
                        case Z:
                            r = new Float32Array(t(4 * n), 0, n);
                            break;
                        default:
                            return null
                    }
                    return r.length !== n ? r.subarray(0, n) : r
                },
                freeType: function (e) {
                    n(e.buffer)
                }
            }
        }
        var ee = $();
        ee.zero = $();
        var te = function (e, t) {
            var n = 1;
            t.ext_texture_filter_anisotropic && (n = e.getParameter(34047));
            var r = 1,
                i = 1;
            t.webgl_draw_buffers && (r = e.getParameter(34852), i = e.getParameter(36063));
            var a = !!t.oes_texture_float;
            if (a) {
                var o = e.createTexture();
                e.bindTexture(3553, o), e.texImage2D(3553, 0, 6408, 1, 1, 0, 6408, 5126, null);
                var u = e.createFramebuffer();
                if (e.bindFramebuffer(36160, u), e.framebufferTexture2D(36160, 36064, 3553, o, 0), e.bindTexture(3553, null), 36053 !== e.checkFramebufferStatus(36160)) a = !1;
                else {
                    e.viewport(0, 0, 1, 1), e.clearColor(1, 0, 0, 1), e.clear(16384);
                    var s = ee.allocType(5126, 4);
                    e.readPixels(0, 0, 1, 1, 6408, 5126, s), e.getError() ? a = !1 : (e.deleteFramebuffer(u), e.deleteTexture(o), a = 1 === s[0]), ee.freeType(s)
                }
            }
            var c = !0;
            if ("undefined" == typeof navigator || !(/MSIE/.test(navigator.userAgent) || /Trident\//.test(navigator.appVersion) || /Edge/.test(navigator.userAgent))) {
                var f = e.createTexture(),
                    l = ee.allocType(5121, 36);
                e.activeTexture(33984), e.bindTexture(34067, f), e.texImage2D(34069, 0, 6408, 3, 3, 0, 6408, 5121, l), ee.freeType(l), e.bindTexture(34067, null), e.deleteTexture(f), c = !e.getError()
            }
            return {
                colorBits: [e.getParameter(3410), e.getParameter(3411), e.getParameter(3412), e.getParameter(3413)],
                depthBits: e.getParameter(3414),
                stencilBits: e.getParameter(3415),
                subpixelBits: e.getParameter(3408),
                extensions: Object.keys(t).filter((function (e) {
                    return !!t[e]
                })),
                maxAnisotropic: n,
                maxDrawbuffers: r,
                maxColorAttachments: i,
                pointSizeDims: e.getParameter(33901),
                lineWidthDims: e.getParameter(33902),
                maxViewportDims: e.getParameter(3386),
                maxCombinedTextureUnits: e.getParameter(35661),
                maxCubeMapSize: e.getParameter(34076),
                maxRenderbufferSize: e.getParameter(34024),
                maxTextureUnits: e.getParameter(34930),
                maxTextureSize: e.getParameter(3379),
                maxAttributes: e.getParameter(34921),
                maxVertexUniforms: e.getParameter(36347),
                maxVertexTextureUnits: e.getParameter(35660),
                maxVaryingVectors: e.getParameter(36348),
                maxFragmentUniforms: e.getParameter(36349),
                glsl: e.getParameter(35724),
                renderer: e.getParameter(7937),
                vendor: e.getParameter(7936),
                version: e.getParameter(7938),
                readFloat: a,
                npotTextureCube: c
            }
        };

        function ne(t) {
            return !!t && "object" == typeof t && Array.isArray(t.shape) && Array.isArray(t.stride) && "number" == typeof t.offset && t.shape.length === t.stride.length && (Array.isArray(t.data) || e(t.data))
        }
        var re = function (e) {
                return Object.keys(e).map((function (t) {
                    return e[t]
                }))
            },
            ie = {
                shape: function (e) {
                    for (var t = [], n = e; n.length; n = n[0]) t.push(n.length);
                    return t
                },
                flatten: function (e, t, n, r) {
                    var i = 1;
                    if (t.length)
                        for (var a = 0; a < t.length; ++a) i *= t[a];
                    else i = 0;
                    var o = r || ee.allocType(n, i);
                    switch (t.length) {
                        case 0:
                            break;
                        case 1:
                            ! function (e, t, n) {
                                for (var r = 0; r < t; ++r) n[r] = e[r]
                            }(e, t[0], o);
                            break;
                        case 2:
                            ! function (e, t, n, r) {
                                for (var i = 0, a = 0; a < t; ++a)
                                    for (var o = e[a], u = 0; u < n; ++u) r[i++] = o[u]
                            }(e, t[0], t[1], o);
                            break;
                        case 3:
                            ae(e, t[0], t[1], t[2], o, 0);
                            break;
                        default:
                            ! function e(t, n, r, i, a) {
                                for (var o = 1, u = r + 1; u < n.length; ++u) o *= n[u];
                                var s = n[r];
                                if (n.length - r == 4) {
                                    var c = n[r + 1],
                                        f = n[r + 2],
                                        l = n[r + 3];
                                    for (u = 0; u < s; ++u) ae(t[u], c, f, l, i, a), a += o
                                } else
                                    for (u = 0; u < s; ++u) e(t[u], n, r + 1, i, a), a += o
                            }(e, t, 0, o, 0)
                    }
                    return o
                }
            };

        function ae(e, t, n, r, i, a) {
            for (var o = a, u = 0; u < t; ++u)
                for (var s = e[u], c = 0; c < n; ++c)
                    for (var f = s[c], l = 0; l < r; ++l) i[o++] = f[l]
        }
        var oe = {
                "[object Int8Array]": 5120,
                "[object Int16Array]": 5122,
                "[object Int32Array]": 5124,
                "[object Uint8Array]": 5121,
                "[object Uint8ClampedArray]": 5121,
                "[object Uint16Array]": 5123,
                "[object Uint32Array]": 5125,
                "[object Float32Array]": 5126,
                "[object Float64Array]": 5121,
                "[object ArrayBuffer]": 5121
            },
            ue = {
                int8: 5120,
                int16: 5122,
                int32: 5124,
                uint8: 5121,
                uint16: 5123,
                uint32: 5125,
                float: 5126,
                float32: 5126
            },
            se = {
                dynamic: 35048,
                stream: 35040,
                static: 35044
            },
            ce = ie.flatten,
            fe = ie.shape,
            le = 35044,
            de = 35040,
            pe = 5121,
            me = 5126,
            he = [];

        function be(e) {
            return 0 | oe[Object.prototype.toString.call(e)]
        }

        function ve(e, t) {
            for (var n = 0; n < t.length; ++n) e[n] = t[n]
        }

        function ge(e, t, n, r, i, a, o) {
            for (var u = 0, s = 0; s < n; ++s)
                for (var c = 0; c < r; ++c) e[u++] = t[i * s + a * c + o]
        }
        he[5120] = 1, he[5122] = 2, he[5124] = 4, he[5121] = 1, he[5123] = 2, he[5125] = 4, he[5126] = 4;
        var _e = {
                points: 0,
                point: 0,
                lines: 1,
                line: 1,
                triangles: 4,
                triangle: 4,
                "line loop": 2,
                "line strip": 3,
                "triangle strip": 5,
                "triangle fan": 6
            },
            ye = 0,
            xe = 1,
            we = 4,
            ke = 5120,
            Ae = 5121,
            Se = 5122,
            Ee = 5123,
            Ce = 5124,
            Oe = 5125,
            Te = 34963,
            Me = 35040,
            je = 35044,
            De = new Float32Array(1),
            Fe = new Uint32Array(De.buffer),
            Re = 5123;

        function Ie(e) {
            for (var t = ee.allocType(Re, e.length), n = 0; n < e.length; ++n)
                if (isNaN(e[n])) t[n] = 65535;
                else if (e[n] === 1 / 0) t[n] = 31744;
            else if (e[n] === -1 / 0) t[n] = 64512;
            else {
                De[0] = e[n];
                var r = Fe[0],
                    i = r >>> 31 << 15,
                    a = (r << 1 >>> 24) - 127,
                    o = r >> 13 & 1023;
                if (a < -24) t[n] = i;
                else if (a < -14) {
                    var u = -14 - a;
                    t[n] = i + (o + 1024 >> u)
                } else t[n] = a > 15 ? i + 31744 : i + (a + 15 << 10) + o
            }
            return t
        }

        function Le(t) {
            return Array.isArray(t) || e(t)
        }
        var Be = function (e) {
                return !(e & e - 1 || !e)
            },
            Pe = 34467,
            ze = 3553,
            Ne = 34067,
            He = 34069,
            Ue = 6408,
            Ve = 6406,
            Ge = 6407,
            We = 6409,
            Ye = 6410,
            Xe = 32854,
            qe = 32855,
            Qe = 36194,
            Ke = 32819,
            Ze = 32820,
            Je = 33635,
            $e = 34042,
            et = 6402,
            tt = 34041,
            nt = 35904,
            rt = 35906,
            it = 36193,
            at = 33776,
            ot = 33777,
            ut = 33778,
            st = 33779,
            ct = 35986,
            ft = 35987,
            lt = 34798,
            dt = 35840,
            pt = 35841,
            mt = 35842,
            ht = 35843,
            bt = 36196,
            vt = 5121,
            gt = 5123,
            _t = 5125,
            yt = 5126,
            xt = 10242,
            wt = 10243,
            kt = 10497,
            At = 33071,
            St = 33648,
            Et = 10240,
            Ct = 10241,
            Ot = 9728,
            Tt = 9729,
            Mt = 9984,
            jt = 9985,
            Dt = 9986,
            Ft = 9987,
            Rt = 33170,
            It = 4352,
            Lt = 4353,
            Bt = 4354,
            Pt = 34046,
            zt = 3317,
            Nt = 37440,
            Ht = 37441,
            Ut = 37443,
            Vt = 37444,
            Gt = 33984,
            Wt = [Mt, Dt, jt, Ft],
            Yt = [0, We, Ye, Ge, Ue],
            Xt = {};

        function qt(e) {
            return "[object " + e + "]"
        }
        Xt[We] = Xt[Ve] = Xt[et] = 1, Xt[tt] = Xt[Ye] = 2, Xt[Ge] = Xt[nt] = 3, Xt[Ue] = Xt[rt] = 4;
        var Qt = qt("HTMLCanvasElement"),
            Kt = qt("CanvasRenderingContext2D"),
            Zt = qt("ImageBitmap"),
            Jt = qt("HTMLImageElement"),
            $t = qt("HTMLVideoElement"),
            en = Object.keys(oe).concat([Qt, Kt, Zt, Jt, $t]),
            tn = [];
        tn[vt] = 1, tn[yt] = 4, tn[it] = 2, tn[gt] = 2, tn[_t] = 4;
        var nn = [];

        function rn(e) {
            return Array.isArray(e) && (0 === e.length || "number" == typeof e[0])
        }

        function an(e) {
            return !!Array.isArray(e) && !(0 === e.length || !Le(e[0]))
        }

        function on(e) {
            return Object.prototype.toString.call(e)
        }

        function un(e) {
            return on(e) === Qt
        }

        function sn(e) {
            if (!e) return !1;
            var t = on(e);
            return en.indexOf(t) >= 0 || rn(e) || an(e) || ne(e)
        }

        function cn(e) {
            return 0 | oe[Object.prototype.toString.call(e)]
        }

        function fn(e, t) {
            return ee.allocType(e.type === it ? yt : e.type, t)
        }

        function ln(e, t) {
            e.type === it ? (e.data = Ie(t), ee.freeType(t)) : e.data = t
        }

        function dn(e, t, n, r, i, a) {
            var o;
            if (o = void 0 !== nn[e] ? nn[e] : Xt[e] * tn[t], a && (o *= 6), i) {
                for (var u = 0, s = n; s >= 1;) u += o * s * s, s /= 2;
                return u
            }
            return o * n * r
        }

        function pn(n, r, i, a, o, u, s) {
            var c = {
                    "don't care": It,
                    "dont care": It,
                    nice: Bt,
                    fast: Lt
                },
                f = {
                    repeat: kt,
                    clamp: At,
                    mirror: St
                },
                l = {
                    nearest: Ot,
                    linear: Tt
                },
                d = t({
                    mipmap: Ft,
                    "nearest mipmap nearest": Mt,
                    "linear mipmap nearest": jt,
                    "nearest mipmap linear": Dt,
                    "linear mipmap linear": Ft
                }, l),
                p = {
                    none: 0,
                    browser: Vt
                },
                m = {
                    uint8: vt,
                    rgba4: Ke,
                    rgb565: Je,
                    "rgb5 a1": Ze
                },
                h = {
                    alpha: Ve,
                    luminance: We,
                    "luminance alpha": Ye,
                    rgb: Ge,
                    rgba: Ue,
                    rgba4: Xe,
                    "rgb5 a1": qe,
                    rgb565: Qe
                },
                b = {};
            r.ext_srgb && (h.srgb = nt, h.srgba = rt), r.oes_texture_float && (m.float32 = m.float = yt), r.oes_texture_half_float && (m.float16 = m["half float"] = it), r.webgl_depth_texture && (t(h, {
                depth: et,
                "depth stencil": tt
            }), t(m, {
                uint16: gt,
                uint32: _t,
                "depth stencil": $e
            })), r.webgl_compressed_texture_s3tc && t(b, {
                "rgb s3tc dxt1": at,
                "rgba s3tc dxt1": ot,
                "rgba s3tc dxt3": ut,
                "rgba s3tc dxt5": st
            }), r.webgl_compressed_texture_atc && t(b, {
                "rgb atc": ct,
                "rgba atc explicit alpha": ft,
                "rgba atc interpolated alpha": lt
            }), r.webgl_compressed_texture_pvrtc && t(b, {
                "rgb pvrtc 4bppv1": dt,
                "rgb pvrtc 2bppv1": pt,
                "rgba pvrtc 4bppv1": mt,
                "rgba pvrtc 2bppv1": ht
            }), r.webgl_compressed_texture_etc1 && (b["rgb etc1"] = bt);
            var v = Array.prototype.slice.call(n.getParameter(Pe));
            Object.keys(b).forEach((function (e) {
                var t = b[e];
                v.indexOf(t) >= 0 && (h[e] = t)
            }));
            var g = Object.keys(h);
            i.textureFormats = g;
            var _ = [];
            Object.keys(h).forEach((function (e) {
                var t = h[e];
                _[t] = e
            }));
            var y = [];
            Object.keys(m).forEach((function (e) {
                var t = m[e];
                y[t] = e
            }));
            var x = [];
            Object.keys(l).forEach((function (e) {
                var t = l[e];
                x[t] = e
            }));
            var w = [];
            Object.keys(d).forEach((function (e) {
                var t = d[e];
                w[t] = e
            }));
            var k = [];
            Object.keys(f).forEach((function (e) {
                var t = f[e];
                k[t] = e
            }));
            var A = g.reduce((function (e, t) {
                var n = h[t];
                return n === We || n === Ve || n === We || n === Ye || n === et || n === tt ? e[n] = n : n === qe || t.indexOf("rgba") >= 0 ? e[n] = Ue : e[n] = Ge, e
            }), {});

            function S() {
                this.internalformat = Ue, this.format = Ue, this.type = vt, this.compressed = !1, this.premultiplyAlpha = !1, this.flipY = !1, this.unpackAlignment = 1, this.colorSpace = Vt, this.width = 0, this.height = 0, this.channels = 0
            }

            function E(e, t) {
                e.internalformat = t.internalformat, e.format = t.format, e.type = t.type, e.compressed = t.compressed, e.premultiplyAlpha = t.premultiplyAlpha, e.flipY = t.flipY, e.unpackAlignment = t.unpackAlignment, e.colorSpace = t.colorSpace, e.width = t.width, e.height = t.height, e.channels = t.channels
            }

            function C(e, t) {
                if ("object" == typeof t && t) {
                    if ("premultiplyAlpha" in t && (D.type(t.premultiplyAlpha, "boolean", "invalid premultiplyAlpha"), e.premultiplyAlpha = t.premultiplyAlpha), "flipY" in t && (D.type(t.flipY, "boolean", "invalid texture flip"), e.flipY = t.flipY), "alignment" in t && (D.oneOf(t.alignment, [1, 2, 4, 8], "invalid texture unpack alignment"), e.unpackAlignment = t.alignment), "colorSpace" in t && (D.parameter(t.colorSpace, p, "invalid colorSpace"), e.colorSpace = p[t.colorSpace]), "type" in t) {
                        var n = t.type;
                        D(r.oes_texture_float || !("float" === n || "float32" === n), "you must enable the OES_texture_float extension in order to use floating point textures."), D(r.oes_texture_half_float || !("half float" === n || "float16" === n), "you must enable the OES_texture_half_float extension in order to use 16-bit floating point textures."), D(r.webgl_depth_texture || !("uint16" === n || "uint32" === n || "depth stencil" === n), "you must enable the WEBGL_depth_texture extension in order to use depth/stencil textures."), D.parameter(n, m, "invalid texture type"), e.type = m[n]
                    }
                    var a = e.width,
                        o = e.height,
                        u = e.channels,
                        s = !1;
                    "shape" in t ? (D(Array.isArray(t.shape) && t.shape.length >= 2, "shape must be an array"), a = t.shape[0], o = t.shape[1], 3 === t.shape.length && (u = t.shape[2], D(u > 0 && u <= 4, "invalid number of channels"), s = !0), D(a >= 0 && a <= i.maxTextureSize, "invalid width"), D(o >= 0 && o <= i.maxTextureSize, "invalid height")) : ("radius" in t && (a = o = t.radius, D(a >= 0 && a <= i.maxTextureSize, "invalid radius")), "width" in t && (a = t.width, D(a >= 0 && a <= i.maxTextureSize, "invalid width")), "height" in t && (o = t.height, D(o >= 0 && o <= i.maxTextureSize, "invalid height")), "channels" in t && (u = t.channels, D(u > 0 && u <= 4, "invalid number of channels"), s = !0)), e.width = 0 | a, e.height = 0 | o, e.channels = 0 | u;
                    var c = !1;
                    if ("format" in t) {
                        var f = t.format;
                        D(r.webgl_depth_texture || !("depth" === f || "depth stencil" === f), "you must enable the WEBGL_depth_texture extension in order to use depth/stencil textures."), D.parameter(f, h, "invalid texture format");
                        var l = e.internalformat = h[f];
                        e.format = A[l], f in m && ("type" in t || (e.type = m[f])), f in b && (e.compressed = !0), c = !0
                    }!s && c ? e.channels = Xt[e.format] : s && !c ? e.channels !== Yt[e.format] && (e.format = e.internalformat = Yt[e.channels]) : c && s && D(e.channels === Xt[e.format], "number of channels inconsistent with specified format")
                }
            }

            function O(e) {
                n.pixelStorei(Nt, e.flipY), n.pixelStorei(Ht, e.premultiplyAlpha), n.pixelStorei(Ut, e.colorSpace), n.pixelStorei(zt, e.unpackAlignment)
            }

            function T() {
                S.call(this), this.xOffset = 0, this.yOffset = 0, this.data = null, this.needsFree = !1, this.element = null, this.needsCopy = !1
            }

            function M(t, n) {
                var r = null;
                if (sn(n) ? r = n : n && (D.type(n, "object", "invalid pixel data type"), C(t, n), "x" in n && (t.xOffset = 0 | n.x), "y" in n && (t.yOffset = 0 | n.y), sn(n.data) && (r = n.data)), D(!t.compressed || r instanceof Uint8Array, "compressed texture data must be stored in a uint8array"), n.copy) {
                    D(!r, "can not specify copy and data field for the same texture");
                    var a = o.viewportWidth,
                        u = o.viewportHeight;
                    t.width = t.width || a - t.xOffset, t.height = t.height || u - t.yOffset, t.needsCopy = !0, D(t.xOffset >= 0 && t.xOffset < a && t.yOffset >= 0 && t.yOffset < u && t.width > 0 && t.width <= a && t.height > 0 && t.height <= u, "copy texture read out of bounds")
                } else if (r) {
                    if (e(r)) t.channels = t.channels || 4, t.data = r, "type" in n || t.type !== vt || (t.type = cn(r));
                    else if (rn(r)) t.channels = t.channels || 4,
                        function (e, t) {
                            var n = t.length;
                            switch (e.type) {
                                case vt:
                                case gt:
                                case _t:
                                case yt:
                                    var r = ee.allocType(e.type, n);
                                    r.set(t), e.data = r;
                                    break;
                                case it:
                                    e.data = Ie(t);
                                    break;
                                default:
                                    D.raise("unsupported texture type, must specify a typed array")
                            }
                        }(t, r), t.alignment = 1, t.needsFree = !0;
                    else if (ne(r)) {
                        var s = r.data;
                        Array.isArray(s) || t.type !== vt || (t.type = cn(s));
                        var c, f, l, d, p, m, h = r.shape,
                            b = r.stride;
                        3 === h.length ? (l = h[2], m = b[2]) : (D(2 === h.length, "invalid ndarray pixel data, must be 2 or 3D"), l = 1, m = 1), c = h[0], f = h[1], d = b[0], p = b[1], t.alignment = 1, t.width = c, t.height = f, t.channels = l, t.format = t.internalformat = Yt[l], t.needsFree = !0,
                            function (e, t, n, r, i, a) {
                                for (var o = e.width, u = e.height, s = e.channels, c = fn(e, o * u * s), f = 0, l = 0; l < u; ++l)
                                    for (var d = 0; d < o; ++d)
                                        for (var p = 0; p < s; ++p) c[f++] = t[n * d + r * l + i * p + a];
                                ln(e, c)
                            }(t, s, d, p, m, r.offset)
                    } else if (un(r) || on(r) === Kt) un(r) ? t.element = r : t.element = r.canvas, t.width = t.element.width, t.height = t.element.height, t.channels = 4;
                    else if (function (e) {
                            return on(e) === Zt
                        }(r)) t.element = r, t.width = r.width, t.height = r.height, t.channels = 4;
                    else if (function (e) {
                            return on(e) === Jt
                        }(r)) t.element = r, t.width = r.naturalWidth, t.height = r.naturalHeight, t.channels = 4;
                    else if (function (e) {
                            return on(e) === $t
                        }(r)) t.element = r, t.width = r.videoWidth, t.height = r.videoHeight, t.channels = 4;
                    else if (an(r)) {
                        var v = t.width || r[0].length,
                            g = t.height || r.length,
                            _ = t.channels;
                        _ = Le(r[0][0]) ? _ || r[0][0].length : _ || 1;
                        for (var y = ie.shape(r), x = 1, w = 0; w < y.length; ++w) x *= y[w];
                        var k = fn(t, x);
                        ie.flatten(r, y, "", k), ln(t, k), t.alignment = 1, t.width = v, t.height = g, t.channels = _, t.format = t.internalformat = Yt[_], t.needsFree = !0
                    }
                } else t.width = t.width || 1, t.height = t.height || 1, t.channels = t.channels || 4;
                t.type === yt ? D(i.extensions.indexOf("oes_texture_float") >= 0, "oes_texture_float extension not enabled") : t.type === it && D(i.extensions.indexOf("oes_texture_half_float") >= 0, "oes_texture_half_float extension not enabled")
            }

            function j(e, t, r) {
                var i = e.element,
                    o = e.data,
                    u = e.internalformat,
                    s = e.format,
                    c = e.type,
                    f = e.width,
                    l = e.height,
                    d = e.channels;
                if (O(e), i) n.texImage2D(t, r, s, s, c, i);
                else if (e.compressed) n.compressedTexImage2D(t, r, u, f, l, 0, o);
                else if (e.needsCopy) a(), n.copyTexImage2D(t, r, s, e.xOffset, e.yOffset, f, l, 0);
                else {
                    var p = !o;
                    p && (o = ee.zero.allocType(c, f * l * d)), n.texImage2D(t, r, s, f, l, 0, s, c, o), p && o && ee.zero.freeType(o)
                }
            }

            function F(e, t, r, i, o) {
                var u = e.element,
                    s = e.data,
                    c = e.internalformat,
                    f = e.format,
                    l = e.type,
                    d = e.width,
                    p = e.height;
                O(e), u ? n.texSubImage2D(t, o, r, i, f, l, u) : e.compressed ? n.compressedTexSubImage2D(t, o, r, i, c, d, p, s) : e.needsCopy ? (a(), n.copyTexSubImage2D(t, o, r, i, e.xOffset, e.yOffset, d, p)) : n.texSubImage2D(t, o, r, i, d, p, f, l, s)
            }
            var R = [];

            function I() {
                return R.pop() || new T
            }

            function L(e) {
                e.needsFree && ee.freeType(e.data), T.call(e), R.push(e)
            }

            function B() {
                S.call(this), this.genMipmaps = !1, this.mipmapHint = It, this.mipmask = 0, this.images = Array(16)
            }

            function P(e, t, n) {
                var r = e.images[0] = I();
                e.mipmask = 1, r.width = e.width = t, r.height = e.height = n, r.channels = e.channels = 4
            }

            function z(e, t) {
                var n = null;
                if (sn(t)) E(n = e.images[0] = I(), e), M(n, t), e.mipmask = 1;
                else if (C(e, t), Array.isArray(t.mipmap))
                    for (var r = t.mipmap, i = 0; i < r.length; ++i) E(n = e.images[i] = I(), e), n.width >>= i, n.height >>= i, M(n, r[i]), e.mipmask |= 1 << i;
                else E(n = e.images[0] = I(), e), M(n, t), e.mipmask = 1;
                E(e, e.images[0]), (e.compressed && e.internalformat === at || e.internalformat === ot || e.internalformat === ut || e.internalformat === st) && D(e.width % 4 == 0 && e.height % 4 == 0, "for compressed texture formats, mipmap level 0 must have width and height that are a multiple of 4")
            }

            function N(e, t) {
                for (var n = e.images, r = 0; r < n.length; ++r) {
                    if (!n[r]) return;
                    j(n[r], t, r)
                }
            }
            var H = [];

            function U() {
                var e = H.pop() || new B;
                S.call(e), e.mipmask = 0;
                for (var t = 0; t < 16; ++t) e.images[t] = null;
                return e
            }

            function V(e) {
                for (var t = e.images, n = 0; n < t.length; ++n) t[n] && L(t[n]), t[n] = null;
                H.push(e)
            }

            function G() {
                this.minFilter = Ot, this.magFilter = Ot, this.wrapS = At, this.wrapT = At, this.anisotropic = 1, this.genMipmaps = !1, this.mipmapHint = It
            }

            function W(e, t) {
                if ("min" in t) {
                    var n = t.min;
                    D.parameter(n, d), e.minFilter = d[n], Wt.indexOf(e.minFilter) >= 0 && !("faces" in t) && (e.genMipmaps = !0)
                }
                if ("mag" in t) {
                    var r = t.mag;
                    D.parameter(r, l), e.magFilter = l[r]
                }
                var a = e.wrapS,
                    o = e.wrapT;
                if ("wrap" in t) {
                    var u = t.wrap;
                    "string" == typeof u ? (D.parameter(u, f), a = o = f[u]) : Array.isArray(u) && (D.parameter(u[0], f), D.parameter(u[1], f), a = f[u[0]], o = f[u[1]])
                } else {
                    if ("wrapS" in t) {
                        var s = t.wrapS;
                        D.parameter(s, f), a = f[s]
                    }
                    if ("wrapT" in t) {
                        var p = t.wrapT;
                        D.parameter(p, f), o = f[p]
                    }
                }
                if (e.wrapS = a, e.wrapT = o, "anisotropic" in t) {
                    var m = t.anisotropic;
                    D("number" == typeof m && m >= 1 && m <= i.maxAnisotropic, "aniso samples must be between 1 and "), e.anisotropic = t.anisotropic
                }
                if ("mipmap" in t) {
                    var h = !1;
                    switch (typeof t.mipmap) {
                        case "string":
                            D.parameter(t.mipmap, c, "invalid mipmap hint"), e.mipmapHint = c[t.mipmap], e.genMipmaps = !0, h = !0;
                            break;
                        case "boolean":
                            h = e.genMipmaps = t.mipmap;
                            break;
                        case "object":
                            D(Array.isArray(t.mipmap), "invalid mipmap type"), e.genMipmaps = !1, h = !0;
                            break;
                        default:
                            D.raise("invalid mipmap type")
                    }!h || "min" in t || (e.minFilter = Mt)
                }
            }

            function Y(e, t) {
                n.texParameteri(t, Ct, e.minFilter), n.texParameteri(t, Et, e.magFilter), n.texParameteri(t, xt, e.wrapS), n.texParameteri(t, wt, e.wrapT), r.ext_texture_filter_anisotropic && n.texParameteri(t, Pt, e.anisotropic), e.genMipmaps && (n.hint(Rt, e.mipmapHint), n.generateMipmap(t))
            }
            var X = 0,
                q = {},
                Q = i.maxTextureUnits,
                K = Array(Q).map((function () {
                    return null
                }));

            function Z(e) {
                S.call(this), this.mipmask = 0, this.internalformat = Ue, this.id = X++, this.refCount = 1, this.target = e, this.texture = n.createTexture(), this.unit = -1, this.bindCount = 0, this.texInfo = new G, s.profile && (this.stats = {
                    size: 0
                })
            }

            function J(e) {
                n.activeTexture(Gt), n.bindTexture(e.target, e.texture)
            }

            function $() {
                var e = K[0];
                e ? n.bindTexture(e.target, e.texture) : n.bindTexture(ze, null)
            }

            function te(e) {
                var t = e.texture;
                D(t, "must not double destroy texture");
                var r = e.unit,
                    i = e.target;
                r >= 0 && (n.activeTexture(Gt + r), n.bindTexture(i, null), K[r] = null), n.deleteTexture(t), e.texture = null, e.params = null, e.pixels = null, e.refCount = 0, delete q[e.id], u.textureCount--
            }
            return t(Z.prototype, {
                bind: function () {
                    this.bindCount += 1;
                    var e = this.unit;
                    if (e < 0) {
                        for (var t = 0; t < Q; ++t) {
                            var r = K[t];
                            if (r) {
                                if (r.bindCount > 0) continue;
                                r.unit = -1
                            }
                            K[t] = this, e = t;
                            break
                        }
                        e >= Q && D.raise("insufficient number of texture units"), s.profile && u.maxTextureUnits < e + 1 && (u.maxTextureUnits = e + 1), this.unit = e, n.activeTexture(Gt + e), n.bindTexture(this.target, this.texture)
                    }
                    return e
                },
                unbind: function () {
                    this.bindCount -= 1
                },
                decRef: function () {
                    --this.refCount <= 0 && te(this)
                }
            }), s.profile && (u.getTotalTextureSize = function () {
                var e = 0;
                return Object.keys(q).forEach((function (t) {
                    e += q[t].stats.size
                })), e
            }), {
                create2D: function (e, t) {
                    var r = new Z(ze);

                    function a(e, t) {
                        var n = r.texInfo;
                        G.call(n);
                        var o = U();
                        return "number" == typeof e ? P(o, 0 | e, "number" == typeof t ? 0 | t : 0 | e) : e ? (D.type(e, "object", "invalid arguments to regl.texture"), W(n, e), z(o, e)) : P(o, 1, 1), n.genMipmaps && (o.mipmask = (o.width << 1) - 1), r.mipmask = o.mipmask, E(r, o), D.texture2D(n, o, i), r.internalformat = o.internalformat, a.width = o.width, a.height = o.height, J(r), N(o, ze), Y(n, ze), $(), V(o), s.profile && (r.stats.size = dn(r.internalformat, r.type, o.width, o.height, n.genMipmaps, !1)), a.format = _[r.internalformat], a.type = y[r.type], a.mag = x[n.magFilter], a.min = w[n.minFilter], a.wrapS = k[n.wrapS], a.wrapT = k[n.wrapT], a
                    }
                    return q[r.id] = r, u.textureCount++, a(e, t), a.subimage = function (e, t, n, i) {
                        D(!!e, "must specify image data");
                        var o = 0 | t,
                            u = 0 | n,
                            s = 0 | i,
                            c = I();
                        return E(c, r), c.width = 0, c.height = 0, M(c, e), c.width = c.width || (r.width >> s) - o, c.height = c.height || (r.height >> s) - u, D(r.type === c.type && r.format === c.format && r.internalformat === c.internalformat, "incompatible format for texture.subimage"), D(o >= 0 && u >= 0 && o + c.width <= r.width && u + c.height <= r.height, "texture.subimage write out of bounds"), D(r.mipmask & 1 << s, "missing mipmap data"), D(c.data || c.element || c.needsCopy, "missing image data"), J(r), F(c, ze, o, u, s), $(), L(c), a
                    }, a.resize = function (e, t) {
                        var i, o = 0 | e,
                            u = 0 | t || o;
                        if (o === r.width && u === r.height) return a;
                        a.width = r.width = o, a.height = r.height = u, J(r);
                        for (var c = r.channels, f = r.type, l = 0; r.mipmask >> l; ++l) {
                            var d = o >> l,
                                p = u >> l;
                            if (!d || !p) break;
                            i = ee.zero.allocType(f, d * p * c), n.texImage2D(ze, l, r.format, d, p, 0, r.format, r.type, i), i && ee.zero.freeType(i)
                        }
                        return $(), s.profile && (r.stats.size = dn(r.internalformat, r.type, o, u, !1, !1)), a
                    }, a._reglType = "texture2d", a._texture = r, s.profile && (a.stats = r.stats), a.destroy = function () {
                        r.decRef()
                    }, a
                },
                createCube: function (e, t, r, a, o, c) {
                    var f = new Z(Ne);
                    q[f.id] = f, u.cubeCount++;
                    var l = new Array(6);

                    function d(e, t, n, r, a, o) {
                        var u, c = f.texInfo;
                        for (G.call(c), u = 0; u < 6; ++u) l[u] = U();
                        if ("number" != typeof e && e)
                            if ("object" == typeof e)
                                if (t) z(l[0], e), z(l[1], t), z(l[2], n), z(l[3], r), z(l[4], a), z(l[5], o);
                                else if (W(c, e), C(f, e), "faces" in e) {
                            var p = e.faces;
                            for (D(Array.isArray(p) && 6 === p.length, "cube faces must be a length 6 array"), u = 0; u < 6; ++u) D("object" == typeof p[u] && !!p[u], "invalid input for cube map face"), E(l[u], f), z(l[u], p[u])
                        } else
                            for (u = 0; u < 6; ++u) z(l[u], e);
                        else D.raise("invalid arguments to cube map");
                        else {
                            var m = 0 | e || 1;
                            for (u = 0; u < 6; ++u) P(l[u], m, m)
                        }
                        for (E(f, l[0]), i.npotTextureCube || D(Be(f.width) && Be(f.height), "your browser does not support non power or two texture dimensions"), c.genMipmaps ? f.mipmask = (l[0].width << 1) - 1 : f.mipmask = l[0].mipmask, D.textureCube(f, c, l, i), f.internalformat = l[0].internalformat, d.width = l[0].width, d.height = l[0].height, J(f), u = 0; u < 6; ++u) N(l[u], He + u);
                        for (Y(c, Ne), $(), s.profile && (f.stats.size = dn(f.internalformat, f.type, d.width, d.height, c.genMipmaps, !0)), d.format = _[f.internalformat], d.type = y[f.type], d.mag = x[c.magFilter], d.min = w[c.minFilter], d.wrapS = k[c.wrapS], d.wrapT = k[c.wrapT], u = 0; u < 6; ++u) V(l[u]);
                        return d
                    }
                    return d(e, t, r, a, o, c), d.subimage = function (e, t, n, r, i) {
                        D(!!t, "must specify image data"), D("number" == typeof e && e === (0 | e) && e >= 0 && e < 6, "invalid face");
                        var a = 0 | n,
                            o = 0 | r,
                            u = 0 | i,
                            s = I();
                        return E(s, f), s.width = 0, s.height = 0, M(s, t), s.width = s.width || (f.width >> u) - a, s.height = s.height || (f.height >> u) - o, D(f.type === s.type && f.format === s.format && f.internalformat === s.internalformat, "incompatible format for texture.subimage"), D(a >= 0 && o >= 0 && a + s.width <= f.width && o + s.height <= f.height, "texture.subimage write out of bounds"), D(f.mipmask & 1 << u, "missing mipmap data"), D(s.data || s.element || s.needsCopy, "missing image data"), J(f), F(s, He + e, a, o, u), $(), L(s), d
                    }, d.resize = function (e) {
                        var t = 0 | e;
                        if (t !== f.width) {
                            d.width = f.width = t, d.height = f.height = t, J(f);
                            for (var r = 0; r < 6; ++r)
                                for (var i = 0; f.mipmask >> i; ++i) n.texImage2D(He + r, i, f.format, t >> i, t >> i, 0, f.format, f.type, null);
                            return $(), s.profile && (f.stats.size = dn(f.internalformat, f.type, d.width, d.height, !1, !0)), d
                        }
                    }, d._reglType = "textureCube", d._texture = f, s.profile && (d.stats = f.stats), d.destroy = function () {
                        f.decRef()
                    }, d
                },
                clear: function () {
                    for (var e = 0; e < Q; ++e) n.activeTexture(Gt + e), n.bindTexture(ze, null), K[e] = null;
                    re(q).forEach(te), u.cubeCount = 0, u.textureCount = 0
                },
                getTexture: function (e) {
                    return null
                },
                restore: function () {
                    for (var e = 0; e < Q; ++e) {
                        var t = K[e];
                        t && (t.bindCount = 0, t.unit = -1, K[e] = null)
                    }
                    re(q).forEach((function (e) {
                        e.texture = n.createTexture(), n.bindTexture(e.target, e.texture);
                        for (var t = 0; t < 32; ++t)
                            if (0 != (e.mipmask & 1 << t))
                                if (e.target === ze) n.texImage2D(ze, t, e.internalformat, e.width >> t, e.height >> t, 0, e.internalformat, e.type, null);
                                else
                                    for (var r = 0; r < 6; ++r) n.texImage2D(He + r, t, e.internalformat, e.width >> t, e.height >> t, 0, e.internalformat, e.type, null);
                        Y(e.texInfo, e.target)
                    }))
                }
            }
        }
        nn[Xe] = 2, nn[qe] = 2, nn[Qe] = 2, nn[tt] = 4, nn[at] = .5, nn[ot] = .5, nn[ut] = 1, nn[st] = 1, nn[ct] = .5, nn[ft] = 1, nn[lt] = 1, nn[dt] = .5, nn[pt] = .25, nn[mt] = .5, nn[ht] = .25, nn[bt] = .5;
        var mn = 36161,
            hn = 32854,
            bn = [];

        function vn(e, t, n) {
            return bn[e] * t * n
        }
        bn[hn] = 2, bn[32855] = 2, bn[36194] = 2, bn[33189] = 2, bn[36168] = 1, bn[34041] = 4, bn[35907] = 4, bn[34836] = 16, bn[34842] = 8, bn[34843] = 6;
        var gn = function (e, t, n, r, i) {
                var a = {
                    rgba4: hn,
                    rgb565: 36194,
                    "rgb5 a1": 32855,
                    depth: 33189,
                    stencil: 36168,
                    "depth stencil": 34041
                };
                t.ext_srgb && (a.srgba = 35907), t.ext_color_buffer_half_float && (a.rgba16f = 34842, a.rgb16f = 34843), t.webgl_color_buffer_float && (a.rgba32f = 34836);
                var o = [];
                Object.keys(a).forEach((function (e) {
                    var t = a[e];
                    o[t] = e
                }));
                var u = 0,
                    s = {};

                function c(e) {
                    this.id = u++, this.refCount = 1, this.renderbuffer = e, this.format = hn, this.width = 0, this.height = 0, i.profile && (this.stats = {
                        size: 0
                    })
                }

                function f(t) {
                    var n = t.renderbuffer;
                    D(n, "must not double destroy renderbuffer"), e.bindRenderbuffer(mn, null), e.deleteRenderbuffer(n), t.renderbuffer = null, t.refCount = 0, delete s[t.id], r.renderbufferCount--
                }
                return c.prototype.decRef = function () {
                    --this.refCount <= 0 && f(this)
                }, i.profile && (r.getTotalRenderbufferSize = function () {
                    var e = 0;
                    return Object.keys(s).forEach((function (t) {
                        e += s[t].stats.size
                    })), e
                }), {
                    create: function (t, u) {
                        var f = new c(e.createRenderbuffer());

                        function l(t, r) {
                            var u = 0,
                                s = 0,
                                c = hn;
                            if ("object" == typeof t && t) {
                                var d = t;
                                if ("shape" in d) {
                                    var p = d.shape;
                                    D(Array.isArray(p) && p.length >= 2, "invalid renderbuffer shape"), u = 0 | p[0], s = 0 | p[1]
                                } else "radius" in d && (u = s = 0 | d.radius), "width" in d && (u = 0 | d.width), "height" in d && (s = 0 | d.height);
                                "format" in d && (D.parameter(d.format, a, "invalid renderbuffer format"), c = a[d.format])
                            } else "number" == typeof t ? (u = 0 | t, s = "number" == typeof r ? 0 | r : u) : t ? D.raise("invalid arguments to renderbuffer constructor") : u = s = 1;
                            if (D(u > 0 && s > 0 && u <= n.maxRenderbufferSize && s <= n.maxRenderbufferSize, "invalid renderbuffer size"), u !== f.width || s !== f.height || c !== f.format) return l.width = f.width = u, l.height = f.height = s, f.format = c, e.bindRenderbuffer(mn, f.renderbuffer), e.renderbufferStorage(mn, c, u, s), D(0 === e.getError(), "invalid render buffer format"), i.profile && (f.stats.size = vn(f.format, f.width, f.height)), l.format = o[f.format], l
                        }
                        return s[f.id] = f, r.renderbufferCount++, l(t, u), l.resize = function (t, r) {
                            var a = 0 | t,
                                o = 0 | r || a;
                            return a === f.width && o === f.height ? l : (D(a > 0 && o > 0 && a <= n.maxRenderbufferSize && o <= n.maxRenderbufferSize, "invalid renderbuffer size"), l.width = f.width = a, l.height = f.height = o, e.bindRenderbuffer(mn, f.renderbuffer), e.renderbufferStorage(mn, f.format, a, o), D(0 === e.getError(), "invalid render buffer format"), i.profile && (f.stats.size = vn(f.format, f.width, f.height)), l)
                        }, l._reglType = "renderbuffer", l._renderbuffer = f, i.profile && (l.stats = f.stats), l.destroy = function () {
                            f.decRef()
                        }, l
                    },
                    clear: function () {
                        re(s).forEach(f)
                    },
                    restore: function () {
                        re(s).forEach((function (t) {
                            t.renderbuffer = e.createRenderbuffer(), e.bindRenderbuffer(mn, t.renderbuffer), e.renderbufferStorage(mn, t.format, t.width, t.height)
                        })), e.bindRenderbuffer(mn, null)
                    }
                }
            },
            _n = 36160,
            yn = 36161,
            xn = 3553,
            wn = 34069,
            kn = 36064,
            An = 36096,
            Sn = 36128,
            En = 33306,
            Cn = 36053,
            On = 6402,
            Tn = [6407, 6408],
            Mn = [];
        Mn[6408] = 4, Mn[6407] = 3;
        var jn = [];
        jn[5121] = 1, jn[5126] = 4, jn[36193] = 2;
        var Dn = 33189,
            Fn = 36168,
            Rn = 34041,
            In = [32854, 32855, 36194, 35907, 34842, 34843, 34836],
            Ln = {};
        Ln[Cn] = "complete", Ln[36054] = "incomplete attachment", Ln[36057] = "incomplete dimensions", Ln[36055] = "incomplete, missing attachment", Ln[36061] = "unsupported";
        var Bn = 5126;

        function Pn() {
            this.state = 0, this.x = 0, this.y = 0, this.z = 0, this.w = 0, this.buffer = null, this.size = 0, this.normalized = !1, this.type = Bn, this.offset = 0, this.stride = 0, this.divisor = 0
        }
        var zn = 35632,
            Nn = 35633,
            Hn = 35718,
            Un = 35721,
            Vn = 6408,
            Gn = 5121,
            Wn = 3333,
            Yn = 5126;

        function Xn(t, n, r, i, a, o, u) {
            function s(s) {
                var c;
                null === n.next ? (D(a.preserveDrawingBuffer, 'you must create a webgl context with "preserveDrawingBuffer":true in order to read pixels from the drawing buffer'), c = Gn) : (D(null !== n.next.colorAttachments[0].texture, "You cannot read from a renderbuffer"), c = n.next.colorAttachments[0].texture._texture.type, o.oes_texture_float ? (D(c === Gn || c === Yn, "Reading from a framebuffer is only allowed for the types 'uint8' and 'float'"), c === Yn && D(u.readFloat, "Reading 'float' values is not permitted in your browser. For a fallback, please see: https://www.npmjs.com/package/glsl-read-float")) : D(c === Gn, "Reading from a framebuffer is only allowed for the type 'uint8'"));
                var f = 0,
                    l = 0,
                    d = i.framebufferWidth,
                    p = i.framebufferHeight,
                    m = null;
                e(s) ? m = s : s && (D.type(s, "object", "invalid arguments to regl.read()"), f = 0 | s.x, l = 0 | s.y, D(f >= 0 && f < i.framebufferWidth, "invalid x offset for regl.read"), D(l >= 0 && l < i.framebufferHeight, "invalid y offset for regl.read"), d = 0 | (s.width || i.framebufferWidth - f), p = 0 | (s.height || i.framebufferHeight - l), m = s.data || null), m && (c === Gn ? D(m instanceof Uint8Array, "buffer must be 'Uint8Array' when reading from a framebuffer of type 'uint8'") : c === Yn && D(m instanceof Float32Array, "buffer must be 'Float32Array' when reading from a framebuffer of type 'float'")), D(d > 0 && d + f <= i.framebufferWidth, "invalid width for read pixels"), D(p > 0 && p + l <= i.framebufferHeight, "invalid height for read pixels"), r();
                var h = d * p * 4;
                return m || (c === Gn ? m = new Uint8Array(h) : c === Yn && (m = m || new Float32Array(h))), D.isTypedArray(m, "data buffer for regl.read() must be a typedarray"), D(m.byteLength >= h, "data buffer for regl.read() too small"), t.pixelStorei(Wn, 4), t.readPixels(f, l, d, p, Vn, c, m), m
            }
            return function (e) {
                return e && "framebuffer" in e ? function (e) {
                    var t;
                    return n.setFBO({
                        framebuffer: e.framebuffer
                    }, (function () {
                        t = s(e)
                    })), t
                }(e) : s(e)
            }
        }

        function qn(e) {
            return Array.prototype.slice.call(e)
        }

        function Qn(e) {
            return qn(e).join("")
        }
        var Kn = "xyzw".split(""),
            Zn = 5121,
            Jn = 1,
            $n = 2,
            er = 0,
            tr = 1,
            nr = 2,
            rr = 3,
            ir = 4,
            ar = "dither",
            or = "blend.enable",
            ur = "blend.color",
            sr = "blend.equation",
            cr = "blend.func",
            fr = "depth.enable",
            lr = "depth.func",
            dr = "depth.range",
            pr = "depth.mask",
            mr = "colorMask",
            hr = "cull.enable",
            br = "cull.face",
            vr = "frontFace",
            gr = "lineWidth",
            _r = "polygonOffset.enable",
            yr = "polygonOffset.offset",
            xr = "sample.alpha",
            wr = "sample.enable",
            kr = "sample.coverage",
            Ar = "stencil.enable",
            Sr = "stencil.mask",
            Er = "stencil.func",
            Cr = "stencil.opFront",
            Or = "stencil.opBack",
            Tr = "scissor.enable",
            Mr = "scissor.box",
            jr = "viewport",
            Dr = "profile",
            Fr = "framebuffer",
            Rr = "vert",
            Ir = "frag",
            Lr = "elements",
            Br = "primitive",
            Pr = "count",
            zr = "offset",
            Nr = "instances",
            Hr = Fr + "Width",
            Ur = Fr + "Height",
            Vr = jr + "Width",
            Gr = jr + "Height",
            Wr = "drawingBufferWidth",
            Yr = "drawingBufferHeight",
            Xr = [cr, sr, Er, Cr, Or, kr, jr, Mr, yr],
            qr = 34962,
            Qr = 34963,
            Kr = 3553,
            Zr = 34067,
            Jr = 2884,
            $r = 3042,
            ei = 3024,
            ti = 2960,
            ni = 2929,
            ri = 3089,
            ii = 32823,
            ai = 32926,
            oi = 32928,
            ui = 5126,
            si = 35664,
            ci = 35665,
            fi = 35666,
            li = 5124,
            di = 35667,
            pi = 35668,
            mi = 35669,
            hi = 35670,
            bi = 35671,
            vi = 35672,
            gi = 35673,
            _i = 35674,
            yi = 35675,
            xi = 35676,
            wi = 35678,
            ki = 35680,
            Ai = 4,
            Si = 1028,
            Ei = 1029,
            Ci = 2304,
            Oi = 2305,
            Ti = 32775,
            Mi = 32776,
            ji = 519,
            Di = 7680,
            Fi = 0,
            Ri = 1,
            Ii = 32774,
            Li = 513,
            Bi = 36160,
            Pi = 36064,
            zi = {
                0: 0,
                1: 1,
                zero: 0,
                one: 1,
                "src color": 768,
                "one minus src color": 769,
                "src alpha": 770,
                "one minus src alpha": 771,
                "dst color": 774,
                "one minus dst color": 775,
                "dst alpha": 772,
                "one minus dst alpha": 773,
                "constant color": 32769,
                "one minus constant color": 32770,
                "constant alpha": 32771,
                "one minus constant alpha": 32772,
                "src alpha saturate": 776
            },
            Ni = ["constant color, constant alpha", "one minus constant color, constant alpha", "constant color, one minus constant alpha", "one minus constant color, one minus constant alpha", "constant alpha, constant color", "constant alpha, one minus constant color", "one minus constant alpha, constant color", "one minus constant alpha, one minus constant color"],
            Hi = {
                never: 512,
                less: 513,
                "<": 513,
                equal: 514,
                "=": 514,
                "==": 514,
                "===": 514,
                lequal: 515,
                "<=": 515,
                greater: 516,
                ">": 516,
                notequal: 517,
                "!=": 517,
                "!==": 517,
                gequal: 518,
                ">=": 518,
                always: 519
            },
            Ui = {
                0: 0,
                zero: 0,
                keep: 7680,
                replace: 7681,
                increment: 7682,
                decrement: 7683,
                "increment wrap": 34055,
                "decrement wrap": 34056,
                invert: 5386
            },
            Vi = {
                frag: 35632,
                vert: 35633
            },
            Gi = {
                cw: Ci,
                ccw: Oi
            };

        function Wi(t) {
            return Array.isArray(t) || e(t) || ne(t)
        }

        function Yi(e) {
            return e.sort((function (e, t) {
                return e === jr ? -1 : t === jr ? 1 : e < t ? -1 : 1
            }))
        }

        function Xi(e, t, n, r) {
            this.thisDep = e, this.contextDep = t, this.propDep = n, this.append = r
        }

        function qi(e) {
            return e && !(e.thisDep || e.contextDep || e.propDep)
        }

        function Qi(e) {
            return new Xi(!1, !1, !1, e)
        }

        function Ki(e, t) {
            var n = e.type;
            if (n === er) {
                var r = e.data.length;
                return new Xi(!0, r >= 1, r >= 2, t)
            }
            if (n === ir) {
                var i = e.data;
                return new Xi(i.thisDep, i.contextDep, i.propDep, t)
            }
            return new Xi(n === rr, n === nr, n === tr, t)
        }
        var Zi = new Xi(!1, !1, !1, (function () {}));

        function Ji(e, n, r, i, a, o, u, s, c, f, l, d, p, m, h) {
            var b = f.Record,
                v = {
                    add: 32774,
                    subtract: 32778,
                    "reverse subtract": 32779
                };
            r.ext_blend_minmax && (v.min = Ti, v.max = Mi);
            var g = r.angle_instanced_arrays,
                _ = r.webgl_draw_buffers,
                y = {
                    dirty: !0,
                    profile: h.profile
                },
                x = {},
                w = [],
                k = {},
                A = {};

            function S(e) {
                return e.replace(".", "_")
            }

            function E(e, t, n) {
                var r = S(e);
                w.push(e), x[r] = y[r] = !!n, k[r] = t
            }

            function C(e, t, n) {
                var r = S(e);
                w.push(e), Array.isArray(n) ? (y[r] = n.slice(), x[r] = n.slice()) : y[r] = x[r] = n, A[r] = t
            }
            E(ar, ei), E(or, $r), C(ur, "blendColor", [0, 0, 0, 0]), C(sr, "blendEquationSeparate", [Ii, Ii]), C(cr, "blendFuncSeparate", [Ri, Fi, Ri, Fi]), E(fr, ni, !0), C(lr, "depthFunc", Li), C(dr, "depthRange", [0, 1]), C(pr, "depthMask", !0), C(mr, mr, [!0, !0, !0, !0]), E(hr, Jr), C(br, "cullFace", Ei), C(vr, vr, Oi), C(gr, gr, 1), E(_r, ii), C(yr, "polygonOffset", [0, 0]), E(xr, ai), E(wr, oi), C(kr, "sampleCoverage", [1, !1]), E(Ar, ti), C(Sr, "stencilMask", -1), C(Er, "stencilFunc", [ji, 0, -1]), C(Cr, "stencilOpSeparate", [Si, Di, Di, Di]), C(Or, "stencilOpSeparate", [Ei, Di, Di, Di]), E(Tr, ri), C(Mr, "scissor", [0, 0, e.drawingBufferWidth, e.drawingBufferHeight]), C(jr, jr, [0, 0, e.drawingBufferWidth, e.drawingBufferHeight]);
            var O = {
                    gl: e,
                    context: p,
                    strings: n,
                    next: x,
                    current: y,
                    draw: d,
                    elements: o,
                    buffer: a,
                    shader: l,
                    attributes: f.state,
                    uniforms: c,
                    framebuffer: s,
                    extensions: r,
                    timer: m,
                    isBufferArgs: Wi
                },
                T = {
                    primTypes: _e,
                    compareFuncs: Hi,
                    blendFuncs: zi,
                    blendEquations: v,
                    stencilOps: Ui,
                    glTypes: ue,
                    orientationType: Gi
                };
            D.optional((function () {
                O.isArrayLike = Le
            })), _ && (T.backBuffer = [Ei], T.drawBuffer = G(i.maxDrawbuffers, (function (e) {
                return 0 === e ? [0] : G(e, (function (e) {
                    return Pi + e
                }))
            })));
            var M = 0;

            function j() {
                var e = function () {
                        var e = 0,
                            n = [],
                            r = [];

                        function i() {
                            var n = [],
                                r = [];
                            return t((function () {
                                n.push.apply(n, qn(arguments))
                            }), {
                                def: function () {
                                    var t = "v" + e++;
                                    return r.push(t), arguments.length > 0 && (n.push(t, "="), n.push.apply(n, qn(arguments)), n.push(";")), t
                                },
                                toString: function () {
                                    return Qn([r.length > 0 ? "var " + r.join(",") + ";" : "", Qn(n)])
                                }
                            })
                        }

                        function a() {
                            var e = i(),
                                n = i(),
                                r = e.toString,
                                a = n.toString;

                            function o(t, r) {
                                n(t, r, "=", e.def(t, r), ";")
                            }
                            return t((function () {
                                e.apply(e, qn(arguments))
                            }), {
                                def: e.def,
                                entry: e,
                                exit: n,
                                save: o,
                                set: function (t, n, r) {
                                    o(t, n), e(t, n, "=", r, ";")
                                },
                                toString: function () {
                                    return r() + a()
                                }
                            })
                        }
                        var o = i(),
                            u = {};
                        return {
                            global: o,
                            link: function (t) {
                                for (var i = 0; i < r.length; ++i)
                                    if (r[i] === t) return n[i];
                                var a = "g" + e++;
                                return n.push(a), r.push(t), a
                            },
                            block: i,
                            proc: function (e, n) {
                                var r = [];

                                function i() {
                                    var e = "a" + r.length;
                                    return r.push(e), e
                                }
                                n = n || 0;
                                for (var o = 0; o < n; ++o) i();
                                var s = a(),
                                    c = s.toString;
                                return u[e] = t(s, {
                                    arg: i,
                                    toString: function () {
                                        return Qn(["function(", r.join(), "){", c(), "}"])
                                    }
                                })
                            },
                            scope: a,
                            cond: function () {
                                var e = Qn(arguments),
                                    n = a(),
                                    r = a(),
                                    i = n.toString,
                                    o = r.toString;
                                return t(n, {
                                    then: function () {
                                        return n.apply(n, qn(arguments)), this
                                    },
                                    else: function () {
                                        return r.apply(r, qn(arguments)), this
                                    },
                                    toString: function () {
                                        var t = o();
                                        return t && (t = "else{" + t + "}"), Qn(["if(", e, "){", i(), "}", t])
                                    }
                                })
                            },
                            compile: function () {
                                var e = ['"use strict";', o, "return {"];
                                Object.keys(u).forEach((function (t) {
                                    e.push('"', t, '":', u[t].toString(), ",")
                                })), e.push("}");
                                var t = Qn(e).replace(/;/g, ";\n").replace(/}/g, "}\n").replace(/{/g, "{\n");
                                return Function.apply(null, n.concat(t)).apply(null, r)
                            }
                        }
                    }(),
                    r = e.link,
                    i = e.global;
                e.id = M++, e.batchId = "0";
                var a = r(O),
                    o = e.shared = {
                        props: "a0"
                    };
                Object.keys(O).forEach((function (e) {
                    o[e] = i.def(a, ".", e)
                })), D.optional((function () {
                    e.CHECK = r(D), e.commandStr = D.guessCommand(), e.command = r(e.commandStr), e.assert = function (e, t, n) {
                        e("if(!(", t, "))", this.CHECK, ".commandRaise(", r(n), ",", this.command, ");")
                    }, T.invalidBlendCombinations = Ni
                }));
                var u = e.next = {},
                    s = e.current = {};
                Object.keys(A).forEach((function (e) {
                    Array.isArray(y[e]) && (u[e] = i.def(o.next, ".", e), s[e] = i.def(o.current, ".", e))
                }));
                var c = e.constants = {};
                Object.keys(T).forEach((function (e) {
                    c[e] = i.def(JSON.stringify(T[e]))
                })), e.invoke = function (t, n) {
                    switch (n.type) {
                        case er:
                            var i = ["this", o.context, o.props, e.batchId];
                            return t.def(r(n.data), ".call(", i.slice(0, Math.max(n.data.length + 1, 4)), ")");
                        case tr:
                            return t.def(o.props, n.data);
                        case nr:
                            return t.def(o.context, n.data);
                        case rr:
                            return t.def("this", n.data);
                        case ir:
                            return n.data.append(e, t), n.data.ref
                    }
                }, e.attribCache = {};
                var l = {};
                return e.scopeAttrib = function (e) {
                    var t = n.id(e);
                    if (t in l) return l[t];
                    var i = f.scope[t];
                    return i || (i = f.scope[t] = new b), l[t] = r(i)
                }, e
            }

            function F(e, t, r, u, c) {
                var f = e.static,
                    d = e.dynamic;
                D.optional((function () {
                    var e = [Fr, Rr, Ir, Lr, Br, zr, Pr, Nr, Dr].concat(w);

                    function t(t) {
                        Object.keys(t).forEach((function (t) {
                            D.command(e.indexOf(t) >= 0, 'unknown parameter "' + t + '"', c.commandStr)
                        }))
                    }
                    t(f), t(d)
                }));
                var p = function (e, t) {
                        var n = e.static,
                            r = e.dynamic;
                        if (Fr in n) {
                            var i = n[Fr];
                            return i ? (i = s.getFramebuffer(i), D.command(i, "invalid framebuffer object"), Qi((function (e, t) {
                                var n = e.link(i),
                                    r = e.shared;
                                t.set(r.framebuffer, ".next", n);
                                var a = r.context;
                                return t.set(a, "." + Hr, n + ".width"), t.set(a, "." + Ur, n + ".height"), n
                            }))) : Qi((function (e, t) {
                                var n = e.shared;
                                t.set(n.framebuffer, ".next", "null");
                                var r = n.context;
                                return t.set(r, "." + Hr, r + "." + Wr), t.set(r, "." + Ur, r + "." + Yr), "null"
                            }))
                        }
                        if (Fr in r) {
                            var a = r[Fr];
                            return Ki(a, (function (e, t) {
                                var n = e.invoke(t, a),
                                    r = e.shared,
                                    i = r.framebuffer,
                                    o = t.def(i, ".getFramebuffer(", n, ")");
                                D.optional((function () {
                                    e.assert(t, "!" + n + "||" + o, "invalid framebuffer object")
                                })), t.set(i, ".next", o);
                                var u = r.context;
                                return t.set(u, "." + Hr, o + "?" + o + ".width:" + u + "." + Wr), t.set(u, "." + Ur, o + "?" + o + ".height:" + u + "." + Yr), o
                            }))
                        }
                        return null
                    }(e),
                    m = function (e, t, n) {
                        var r = e.static,
                            i = e.dynamic;

                        function a(e) {
                            if (e in r) {
                                var a = r[e];
                                D.commandType(a, "object", "invalid " + e, n.commandStr);
                                var o, u, s = !0,
                                    c = 0 | a.x,
                                    f = 0 | a.y;
                                return "width" in a ? (o = 0 | a.width, D.command(o >= 0, "invalid " + e, n.commandStr)) : s = !1, "height" in a ? (u = 0 | a.height, D.command(u >= 0, "invalid " + e, n.commandStr)) : s = !1, new Xi(!s && t && t.thisDep, !s && t && t.contextDep, !s && t && t.propDep, (function (e, t) {
                                    var n = e.shared.context,
                                        r = o;
                                    "width" in a || (r = t.def(n, ".", Hr, "-", c));
                                    var i = u;
                                    return "height" in a || (i = t.def(n, ".", Ur, "-", f)), [c, f, r, i]
                                }))
                            }
                            if (e in i) {
                                var l = i[e],
                                    d = Ki(l, (function (t, n) {
                                        var r = t.invoke(n, l);
                                        D.optional((function () {
                                            t.assert(n, r + "&&typeof " + r + '==="object"', "invalid " + e)
                                        }));
                                        var i = t.shared.context,
                                            a = n.def(r, ".x|0"),
                                            o = n.def(r, ".y|0"),
                                            u = n.def('"width" in ', r, "?", r, ".width|0:", "(", i, ".", Hr, "-", a, ")"),
                                            s = n.def('"height" in ', r, "?", r, ".height|0:", "(", i, ".", Ur, "-", o, ")");
                                        return D.optional((function () {
                                            t.assert(n, u + ">=0&&" + s + ">=0", "invalid " + e)
                                        })), [a, o, u, s]
                                    }));
                                return t && (d.thisDep = d.thisDep || t.thisDep, d.contextDep = d.contextDep || t.contextDep, d.propDep = d.propDep || t.propDep), d
                            }
                            return t ? new Xi(t.thisDep, t.contextDep, t.propDep, (function (e, t) {
                                var n = e.shared.context;
                                return [0, 0, t.def(n, ".", Hr), t.def(n, ".", Ur)]
                            })) : null
                        }
                        var o = a(jr);
                        if (o) {
                            var u = o;
                            o = new Xi(o.thisDep, o.contextDep, o.propDep, (function (e, t) {
                                var n = u.append(e, t),
                                    r = e.shared.context;
                                return t.set(r, "." + Vr, n[2]), t.set(r, "." + Gr, n[3]), n
                            }))
                        }
                        return {
                            viewport: o,
                            scissor_box: a(Mr)
                        }
                    }(e, p, c),
                    h = function (e, t) {
                        var n = e.static,
                            r = e.dynamic,
                            i = function () {
                                if (Lr in n) {
                                    var e = n[Lr];
                                    Wi(e) ? e = o.getElements(o.create(e, !0)) : e && (e = o.getElements(e), D.command(e, "invalid elements", t.commandStr));
                                    var i = Qi((function (t, n) {
                                        if (e) {
                                            var r = t.link(e);
                                            return t.ELEMENTS = r, r
                                        }
                                        return t.ELEMENTS = null, null
                                    }));
                                    return i.value = e, i
                                }
                                if (Lr in r) {
                                    var a = r[Lr];
                                    return Ki(a, (function (e, t) {
                                        var n = e.shared,
                                            r = n.isBufferArgs,
                                            i = n.elements,
                                            o = e.invoke(t, a),
                                            u = t.def("null"),
                                            s = t.def(r, "(", o, ")"),
                                            c = e.cond(s).then(u, "=", i, ".createStream(", o, ");").else(u, "=", i, ".getElements(", o, ");");
                                        return D.optional((function () {
                                            e.assert(c.else, "!" + o + "||" + u, "invalid elements")
                                        })), t.entry(c), t.exit(e.cond(s).then(i, ".destroyStream(", u, ");")), e.ELEMENTS = u, u
                                    }))
                                }
                                return null
                            }();

                        function a(e, a) {
                            if (e in n) {
                                var o = 0 | n[e];
                                return D.command(!a || o >= 0, "invalid " + e, t.commandStr), Qi((function (e, t) {
                                    return a && (e.OFFSET = o), o
                                }))
                            }
                            if (e in r) {
                                var u = r[e];
                                return Ki(u, (function (t, n) {
                                    var r = t.invoke(n, u);
                                    return a && (t.OFFSET = r, D.optional((function () {
                                        t.assert(n, r + ">=0", "invalid " + e)
                                    }))), r
                                }))
                            }
                            return a && i ? Qi((function (e, t) {
                                return e.OFFSET = "0", 0
                            })) : null
                        }
                        var u = a(zr, !0);
                        return {
                            elements: i,
                            primitive: function () {
                                if (Br in n) {
                                    var e = n[Br];
                                    return D.commandParameter(e, _e, "invalid primitve", t.commandStr), Qi((function (t, n) {
                                        return _e[e]
                                    }))
                                }
                                if (Br in r) {
                                    var a = r[Br];
                                    return Ki(a, (function (e, t) {
                                        var n = e.constants.primTypes,
                                            r = e.invoke(t, a);
                                        return D.optional((function () {
                                            e.assert(t, r + " in " + n, "invalid primitive, must be one of " + Object.keys(_e))
                                        })), t.def(n, "[", r, "]")
                                    }))
                                }
                                return i ? qi(i) ? i.value ? Qi((function (e, t) {
                                    return t.def(e.ELEMENTS, ".primType")
                                })) : Qi((function () {
                                    return Ai
                                })) : new Xi(i.thisDep, i.contextDep, i.propDep, (function (e, t) {
                                    var n = e.ELEMENTS;
                                    return t.def(n, "?", n, ".primType:", Ai)
                                })) : null
                            }(),
                            count: function () {
                                if (Pr in n) {
                                    var e = 0 | n[Pr];
                                    return D.command("number" == typeof e && e >= 0, "invalid vertex count", t.commandStr), Qi((function () {
                                        return e
                                    }))
                                }
                                if (Pr in r) {
                                    var a = r[Pr];
                                    return Ki(a, (function (e, t) {
                                        var n = e.invoke(t, a);
                                        return D.optional((function () {
                                            e.assert(t, "typeof " + n + '==="number"&&' + n + ">=0&&" + n + "===(" + n + "|0)", "invalid vertex count")
                                        })), n
                                    }))
                                }
                                if (i) {
                                    if (qi(i)) {
                                        if (i) return u ? new Xi(u.thisDep, u.contextDep, u.propDep, (function (e, t) {
                                            var n = t.def(e.ELEMENTS, ".vertCount-", e.OFFSET);
                                            return D.optional((function () {
                                                e.assert(t, n + ">=0", "invalid vertex offset/element buffer too small")
                                            })), n
                                        })) : Qi((function (e, t) {
                                            return t.def(e.ELEMENTS, ".vertCount")
                                        }));
                                        var o = Qi((function () {
                                            return -1
                                        }));
                                        return D.optional((function () {
                                            o.MISSING = !0
                                        })), o
                                    }
                                    var s = new Xi(i.thisDep || u.thisDep, i.contextDep || u.contextDep, i.propDep || u.propDep, (function (e, t) {
                                        var n = e.ELEMENTS;
                                        return e.OFFSET ? t.def(n, "?", n, ".vertCount-", e.OFFSET, ":-1") : t.def(n, "?", n, ".vertCount:-1")
                                    }));
                                    return D.optional((function () {
                                        s.DYNAMIC = !0
                                    })), s
                                }
                                return null
                            }(),
                            instances: a(Nr, !1),
                            offset: u
                        }
                    }(e, c),
                    _ = function (e, t) {
                        var n = e.static,
                            r = e.dynamic,
                            a = {};
                        return w.forEach((function (e) {
                            var o = S(e);

                            function u(t, i) {
                                if (e in n) {
                                    var u = t(n[e]);
                                    a[o] = Qi((function () {
                                        return u
                                    }))
                                } else if (e in r) {
                                    var s = r[e];
                                    a[o] = Ki(s, (function (e, t) {
                                        return i(e, t, e.invoke(t, s))
                                    }))
                                }
                            }
                            switch (e) {
                                case hr:
                                case or:
                                case ar:
                                case Ar:
                                case fr:
                                case Tr:
                                case _r:
                                case xr:
                                case wr:
                                case pr:
                                    return u((function (n) {
                                        return D.commandType(n, "boolean", e, t.commandStr), n
                                    }), (function (t, n, r) {
                                        return D.optional((function () {
                                            t.assert(n, "typeof " + r + '==="boolean"', "invalid flag " + e, t.commandStr)
                                        })), r
                                    }));
                                case lr:
                                    return u((function (n) {
                                        return D.commandParameter(n, Hi, "invalid " + e, t.commandStr), Hi[n]
                                    }), (function (t, n, r) {
                                        var i = t.constants.compareFuncs;
                                        return D.optional((function () {
                                            t.assert(n, r + " in " + i, "invalid " + e + ", must be one of " + Object.keys(Hi))
                                        })), n.def(i, "[", r, "]")
                                    }));
                                case dr:
                                    return u((function (e) {
                                        return D.command(Le(e) && 2 === e.length && "number" == typeof e[0] && "number" == typeof e[1] && e[0] <= e[1], "depth range is 2d array", t.commandStr), e
                                    }), (function (e, t, n) {
                                        return D.optional((function () {
                                            e.assert(t, e.shared.isArrayLike + "(" + n + ")&&" + n + ".length===2&&typeof " + n + '[0]==="number"&&typeof ' + n + '[1]==="number"&&' + n + "[0]<=" + n + "[1]", "depth range must be a 2d array")
                                        })), [t.def("+", n, "[0]"), t.def("+", n, "[1]")]
                                    }));
                                case cr:
                                    return u((function (e) {
                                        D.commandType(e, "object", "blend.func", t.commandStr);
                                        var n = "srcRGB" in e ? e.srcRGB : e.src,
                                            r = "srcAlpha" in e ? e.srcAlpha : e.src,
                                            i = "dstRGB" in e ? e.dstRGB : e.dst,
                                            a = "dstAlpha" in e ? e.dstAlpha : e.dst;
                                        return D.commandParameter(n, zi, o + ".srcRGB", t.commandStr), D.commandParameter(r, zi, o + ".srcAlpha", t.commandStr), D.commandParameter(i, zi, o + ".dstRGB", t.commandStr), D.commandParameter(a, zi, o + ".dstAlpha", t.commandStr), D.command(-1 === Ni.indexOf(n + ", " + i), "unallowed blending combination (srcRGB, dstRGB) = (" + n + ", " + i + ")", t.commandStr), [zi[n], zi[i], zi[r], zi[a]]
                                    }), (function (t, n, r) {
                                        var i = t.constants.blendFuncs;

                                        function a(a, o) {
                                            var u = n.def('"', a, o, '" in ', r, "?", r, ".", a, o, ":", r, ".", a);
                                            return D.optional((function () {
                                                t.assert(n, u + " in " + i, "invalid " + e + "." + a + o + ", must be one of " + Object.keys(zi))
                                            })), u
                                        }
                                        D.optional((function () {
                                            t.assert(n, r + "&&typeof " + r + '==="object"', "invalid blend func, must be an object")
                                        }));
                                        var o = a("src", "RGB"),
                                            u = a("dst", "RGB");
                                        D.optional((function () {
                                            var e = t.constants.invalidBlendCombinations;
                                            t.assert(n, e + ".indexOf(" + o + '+", "+' + u + ") === -1 ", "unallowed blending combination for (srcRGB, dstRGB)")
                                        }));
                                        var s = n.def(i, "[", o, "]"),
                                            c = n.def(i, "[", a("src", "Alpha"), "]");
                                        return [s, n.def(i, "[", u, "]"), c, n.def(i, "[", a("dst", "Alpha"), "]")]
                                    }));
                                case sr:
                                    return u((function (n) {
                                        return "string" == typeof n ? (D.commandParameter(n, v, "invalid " + e, t.commandStr), [v[n], v[n]]) : "object" == typeof n ? (D.commandParameter(n.rgb, v, e + ".rgb", t.commandStr), D.commandParameter(n.alpha, v, e + ".alpha", t.commandStr), [v[n.rgb], v[n.alpha]]) : void D.commandRaise("invalid blend.equation", t.commandStr)
                                    }), (function (t, n, r) {
                                        var i = t.constants.blendEquations,
                                            a = n.def(),
                                            o = n.def(),
                                            u = t.cond("typeof ", r, '==="string"');
                                        return D.optional((function () {
                                            function n(e, n, r) {
                                                t.assert(e, r + " in " + i, "invalid " + n + ", must be one of " + Object.keys(v))
                                            }
                                            n(u.then, e, r), t.assert(u.else, r + "&&typeof " + r + '==="object"', "invalid " + e), n(u.else, e + ".rgb", r + ".rgb"), n(u.else, e + ".alpha", r + ".alpha")
                                        })), u.then(a, "=", o, "=", i, "[", r, "];"), u.else(a, "=", i, "[", r, ".rgb];", o, "=", i, "[", r, ".alpha];"), n(u), [a, o]
                                    }));
                                case ur:
                                    return u((function (e) {
                                        return D.command(Le(e) && 4 === e.length, "blend.color must be a 4d array", t.commandStr), G(4, (function (t) {
                                            return +e[t]
                                        }))
                                    }), (function (e, t, n) {
                                        return D.optional((function () {
                                            e.assert(t, e.shared.isArrayLike + "(" + n + ")&&" + n + ".length===4", "blend.color must be a 4d array")
                                        })), G(4, (function (e) {
                                            return t.def("+", n, "[", e, "]")
                                        }))
                                    }));
                                case Sr:
                                    return u((function (e) {
                                        return D.commandType(e, "number", o, t.commandStr), 0 | e
                                    }), (function (e, t, n) {
                                        return D.optional((function () {
                                            e.assert(t, "typeof " + n + '==="number"', "invalid stencil.mask")
                                        })), t.def(n, "|0")
                                    }));
                                case Er:
                                    return u((function (n) {
                                        D.commandType(n, "object", o, t.commandStr);
                                        var r = n.cmp || "keep",
                                            i = n.ref || 0,
                                            a = "mask" in n ? n.mask : -1;
                                        return D.commandParameter(r, Hi, e + ".cmp", t.commandStr), D.commandType(i, "number", e + ".ref", t.commandStr), D.commandType(a, "number", e + ".mask", t.commandStr), [Hi[r], i, a]
                                    }), (function (e, t, n) {
                                        var r = e.constants.compareFuncs;
                                        return D.optional((function () {
                                            function i() {
                                                e.assert(t, Array.prototype.join.call(arguments, ""), "invalid stencil.func")
                                            }
                                            i(n + "&&typeof ", n, '==="object"'), i('!("cmp" in ', n, ")||(", n, ".cmp in ", r, ")")
                                        })), [t.def('"cmp" in ', n, "?", r, "[", n, ".cmp]", ":", Di), t.def(n, ".ref|0"), t.def('"mask" in ', n, "?", n, ".mask|0:-1")]
                                    }));
                                case Cr:
                                case Or:
                                    return u((function (n) {
                                        D.commandType(n, "object", o, t.commandStr);
                                        var r = n.fail || "keep",
                                            i = n.zfail || "keep",
                                            a = n.zpass || "keep";
                                        return D.commandParameter(r, Ui, e + ".fail", t.commandStr), D.commandParameter(i, Ui, e + ".zfail", t.commandStr), D.commandParameter(a, Ui, e + ".zpass", t.commandStr), [e === Or ? Ei : Si, Ui[r], Ui[i], Ui[a]]
                                    }), (function (t, n, r) {
                                        var i = t.constants.stencilOps;

                                        function a(a) {
                                            return D.optional((function () {
                                                t.assert(n, '!("' + a + '" in ' + r + ")||(" + r + "." + a + " in " + i + ")", "invalid " + e + "." + a + ", must be one of " + Object.keys(Ui))
                                            })), n.def('"', a, '" in ', r, "?", i, "[", r, ".", a, "]:", Di)
                                        }
                                        return D.optional((function () {
                                            t.assert(n, r + "&&typeof " + r + '==="object"', "invalid " + e)
                                        })), [e === Or ? Ei : Si, a("fail"), a("zfail"), a("zpass")]
                                    }));
                                case yr:
                                    return u((function (e) {
                                        D.commandType(e, "object", o, t.commandStr);
                                        var n = 0 | e.factor,
                                            r = 0 | e.units;
                                        return D.commandType(n, "number", o + ".factor", t.commandStr), D.commandType(r, "number", o + ".units", t.commandStr), [n, r]
                                    }), (function (t, n, r) {
                                        return D.optional((function () {
                                            t.assert(n, r + "&&typeof " + r + '==="object"', "invalid " + e)
                                        })), [n.def(r, ".factor|0"), n.def(r, ".units|0")]
                                    }));
                                case br:
                                    return u((function (e) {
                                        var n = 0;
                                        return "front" === e ? n = Si : "back" === e && (n = Ei), D.command(!!n, o, t.commandStr), n
                                    }), (function (e, t, n) {
                                        return D.optional((function () {
                                            e.assert(t, n + '==="front"||' + n + '==="back"', "invalid cull.face")
                                        })), t.def(n, '==="front"?', Si, ":", Ei)
                                    }));
                                case gr:
                                    return u((function (e) {
                                        return D.command("number" == typeof e && e >= i.lineWidthDims[0] && e <= i.lineWidthDims[1], "invalid line width, must be a positive number between " + i.lineWidthDims[0] + " and " + i.lineWidthDims[1], t.commandStr), e
                                    }), (function (e, t, n) {
                                        return D.optional((function () {
                                            e.assert(t, "typeof " + n + '==="number"&&' + n + ">=" + i.lineWidthDims[0] + "&&" + n + "<=" + i.lineWidthDims[1], "invalid line width")
                                        })), n
                                    }));
                                case vr:
                                    return u((function (e) {
                                        return D.commandParameter(e, Gi, o, t.commandStr), Gi[e]
                                    }), (function (e, t, n) {
                                        return D.optional((function () {
                                            e.assert(t, n + '==="cw"||' + n + '==="ccw"', "invalid frontFace, must be one of cw,ccw")
                                        })), t.def(n + '==="cw"?' + Ci + ":" + Oi)
                                    }));
                                case mr:
                                    return u((function (e) {
                                        return D.command(Le(e) && 4 === e.length, "color.mask must be length 4 array", t.commandStr), e.map((function (e) {
                                            return !!e
                                        }))
                                    }), (function (e, t, n) {
                                        return D.optional((function () {
                                            e.assert(t, e.shared.isArrayLike + "(" + n + ")&&" + n + ".length===4", "invalid color.mask")
                                        })), G(4, (function (e) {
                                            return "!!" + n + "[" + e + "]"
                                        }))
                                    }));
                                case kr:
                                    return u((function (e) {
                                        D.command("object" == typeof e && e, o, t.commandStr);
                                        var n = "value" in e ? e.value : 1,
                                            r = !!e.invert;
                                        return D.command("number" == typeof n && n >= 0 && n <= 1, "sample.coverage.value must be a number between 0 and 1", t.commandStr), [n, r]
                                    }), (function (e, t, n) {
                                        return D.optional((function () {
                                            e.assert(t, n + "&&typeof " + n + '==="object"', "invalid sample.coverage")
                                        })), [t.def('"value" in ', n, "?+", n, ".value:1"), t.def("!!", n, ".invert")]
                                    }))
                            }
                        })), a
                    }(e, c),
                    y = function (e) {
                        var t = e.static,
                            r = e.dynamic;

                        function i(e) {
                            if (e in t) {
                                var i = n.id(t[e]);
                                D.optional((function () {
                                    l.shader(Vi[e], i, D.guessCommand())
                                }));
                                var a = Qi((function () {
                                    return i
                                }));
                                return a.id = i, a
                            }
                            if (e in r) {
                                var o = r[e];
                                return Ki(o, (function (t, n) {
                                    var r = t.invoke(n, o),
                                        i = n.def(t.shared.strings, ".id(", r, ")");
                                    return D.optional((function () {
                                        n(t.shared.shader, ".shader(", Vi[e], ",", i, ",", t.command, ");")
                                    })), i
                                }))
                            }
                            return null
                        }
                        var a, o = i(Ir),
                            u = i(Rr),
                            s = null;
                        return qi(o) && qi(u) ? (s = l.program(u.id, o.id), a = Qi((function (e, t) {
                            return e.link(s)
                        }))) : a = new Xi(o && o.thisDep || u && u.thisDep, o && o.contextDep || u && u.contextDep, o && o.propDep || u && u.propDep, (function (e, t) {
                            var n, r = e.shared.shader;
                            n = o ? o.append(e, t) : t.def(r, ".", Ir);
                            var i = r + ".program(" + (u ? u.append(e, t) : t.def(r, ".", Rr)) + "," + n;
                            return D.optional((function () {
                                i += "," + e.command
                            })), t.def(i + ")")
                        })), {
                            frag: o,
                            vert: u,
                            progVar: a,
                            program: s
                        }
                    }(e);

                function x(e) {
                    var t = m[e];
                    t && (_[e] = t)
                }
                x(jr), x(S(Mr));
                var k = Object.keys(_).length > 0,
                    A = {
                        framebuffer: p,
                        draw: h,
                        shader: y,
                        state: _,
                        dirty: k
                    };
                return A.profile = function (e) {
                    var t, n = e.static,
                        r = e.dynamic;
                    if (Dr in n) {
                        var i = !!n[Dr];
                        (t = Qi((function (e, t) {
                            return i
                        }))).enable = i
                    } else if (Dr in r) {
                        var a = r[Dr];
                        t = Ki(a, (function (e, t) {
                            return e.invoke(t, a)
                        }))
                    }
                    return t
                }(e), A.uniforms = function (e, t) {
                    var n = e.static,
                        r = e.dynamic,
                        i = {};
                    return Object.keys(n).forEach((function (e) {
                        var r, a = n[e];
                        if ("number" == typeof a || "boolean" == typeof a) r = Qi((function () {
                            return a
                        }));
                        else if ("function" == typeof a) {
                            var o = a._reglType;
                            "texture2d" === o || "textureCube" === o ? r = Qi((function (e) {
                                return e.link(a)
                            })) : "framebuffer" === o || "framebufferCube" === o ? (D.command(a.color.length > 0, 'missing color attachment for framebuffer sent to uniform "' + e + '"', t.commandStr), r = Qi((function (e) {
                                return e.link(a.color[0])
                            }))) : D.commandRaise('invalid data for uniform "' + e + '"', t.commandStr)
                        } else Le(a) ? r = Qi((function (t) {
                            return t.global.def("[", G(a.length, (function (n) {
                                return D.command("number" == typeof a[n] || "boolean" == typeof a[n], "invalid uniform " + e, t.commandStr), a[n]
                            })), "]")
                        })) : D.commandRaise('invalid or missing data for uniform "' + e + '"', t.commandStr);
                        r.value = a, i[e] = r
                    })), Object.keys(r).forEach((function (e) {
                        var t = r[e];
                        i[e] = Ki(t, (function (e, n) {
                            return e.invoke(n, t)
                        }))
                    })), i
                }(r, c), A.attributes = function (e, t) {
                    var r = e.static,
                        i = e.dynamic,
                        o = {};
                    return Object.keys(r).forEach((function (e) {
                        var i = r[e],
                            u = n.id(e),
                            s = new b;
                        if (Wi(i)) s.state = Jn, s.buffer = a.getBuffer(a.create(i, qr, !1, !0)), s.type = 0;
                        else {
                            var c = a.getBuffer(i);
                            if (c) s.state = Jn, s.buffer = c, s.type = 0;
                            else if (D.command("object" == typeof i && i, "invalid data for attribute " + e, t.commandStr), "constant" in i) {
                                var f = i.constant;
                                s.buffer = "null", s.state = $n, "number" == typeof f ? s.x = f : (D.command(Le(f) && f.length > 0 && f.length <= 4, "invalid constant for attribute " + e, t.commandStr), Kn.forEach((function (e, t) {
                                    t < f.length && (s[e] = f[t])
                                })))
                            } else {
                                c = Wi(i.buffer) ? a.getBuffer(a.create(i.buffer, qr, !1, !0)) : a.getBuffer(i.buffer), D.command(!!c, 'missing buffer for attribute "' + e + '"', t.commandStr);
                                var l = 0 | i.offset;
                                D.command(l >= 0, 'invalid offset for attribute "' + e + '"', t.commandStr);
                                var d = 0 | i.stride;
                                D.command(d >= 0 && d < 256, 'invalid stride for attribute "' + e + '", must be integer betweeen [0, 255]', t.commandStr);
                                var p = 0 | i.size;
                                D.command(!("size" in i) || p > 0 && p <= 4, 'invalid size for attribute "' + e + '", must be 1,2,3,4', t.commandStr);
                                var m = !!i.normalized,
                                    h = 0;
                                "type" in i && (D.commandParameter(i.type, ue, "invalid type for attribute " + e, t.commandStr), h = ue[i.type]);
                                var v = 0 | i.divisor;
                                "divisor" in i && (D.command(0 === v || g, 'cannot specify divisor for attribute "' + e + '", instancing not supported', t.commandStr), D.command(v >= 0, 'invalid divisor for attribute "' + e + '"', t.commandStr)), D.optional((function () {
                                    var n = t.commandStr,
                                        r = ["buffer", "offset", "divisor", "normalized", "type", "size", "stride"];
                                    Object.keys(i).forEach((function (t) {
                                        D.command(r.indexOf(t) >= 0, 'unknown parameter "' + t + '" for attribute pointer "' + e + '" (valid parameters are ' + r + ")", n)
                                    }))
                                })), s.buffer = c, s.state = Jn, s.size = p, s.normalized = m, s.type = h || c.dtype, s.offset = l, s.stride = d, s.divisor = v
                            }
                        }
                        o[e] = Qi((function (e, t) {
                            var n = e.attribCache;
                            if (u in n) return n[u];
                            var r = {
                                isStream: !1
                            };
                            return Object.keys(s).forEach((function (e) {
                                r[e] = s[e]
                            })), s.buffer && (r.buffer = e.link(s.buffer), r.type = r.type || r.buffer + ".dtype"), n[u] = r, r
                        }))
                    })), Object.keys(i).forEach((function (e) {
                        var t = i[e];
                        o[e] = Ki(t, (function (n, r) {
                            var i = n.invoke(r, t),
                                a = n.shared,
                                o = n.constants,
                                u = a.isBufferArgs,
                                s = a.buffer;
                            D.optional((function () {
                                n.assert(r, i + "&&(typeof " + i + '==="object"||typeof ' + i + '==="function")&&(' + u + "(" + i + ")||" + s + ".getBuffer(" + i + ")||" + s + ".getBuffer(" + i + ".buffer)||" + u + "(" + i + '.buffer)||("constant" in ' + i + "&&(typeof " + i + '.constant==="number"||' + a.isArrayLike + "(" + i + ".constant))))", 'invalid dynamic attribute "' + e + '"')
                            }));
                            var c = {
                                    isStream: r.def(!1)
                                },
                                f = new b;
                            f.state = Jn, Object.keys(f).forEach((function (e) {
                                c[e] = r.def("" + f[e])
                            }));
                            var l = c.buffer,
                                d = c.type;

                            function p(e) {
                                r(c[e], "=", i, ".", e, "|0;")
                            }
                            return r("if(", u, "(", i, ")){", c.isStream, "=true;", l, "=", s, ".createStream(", qr, ",", i, ");", d, "=", l, ".dtype;", "}else{", l, "=", s, ".getBuffer(", i, ");", "if(", l, "){", d, "=", l, ".dtype;", '}else if("constant" in ', i, "){", c.state, "=", $n, ";", "if(typeof " + i + '.constant === "number"){', c[Kn[0]], "=", i, ".constant;", Kn.slice(1).map((function (e) {
                                return c[e]
                            })).join("="), "=0;", "}else{", Kn.map((function (e, t) {
                                return c[e] + "=" + i + ".constant.length>" + t + "?" + i + ".constant[" + t + "]:0;"
                            })).join(""), "}}else{", "if(", u, "(", i, ".buffer)){", l, "=", s, ".createStream(", qr, ",", i, ".buffer);", "}else{", l, "=", s, ".getBuffer(", i, ".buffer);", "}", d, '="type" in ', i, "?", o.glTypes, "[", i, ".type]:", l, ".dtype;", c.normalized, "=!!", i, ".normalized;"), p("size"), p("offset"), p("stride"), p("divisor"), r("}}"), r.exit("if(", c.isStream, "){", s, ".destroyStream(", l, ");", "}"), c
                        }))
                    })), o
                }(t, c), A.context = function (e) {
                    var t = e.static,
                        n = e.dynamic,
                        r = {};
                    return Object.keys(t).forEach((function (e) {
                        var n = t[e];
                        r[e] = Qi((function (e, t) {
                            return "number" == typeof n || "boolean" == typeof n ? "" + n : e.link(n)
                        }))
                    })), Object.keys(n).forEach((function (e) {
                        var t = n[e];
                        r[e] = Ki(t, (function (e, n) {
                            return e.invoke(n, t)
                        }))
                    })), r
                }(u), A
            }

            function R(e, t, n) {
                var r = e.shared.context,
                    i = e.scope();
                Object.keys(n).forEach((function (a) {
                    t.save(r, "." + a);
                    var o = n[a];
                    i(r, ".", a, "=", o.append(e, t), ";")
                })), t(i)
            }

            function I(e, t, n, r) {
                var i, a = e.shared,
                    o = a.gl,
                    u = a.framebuffer;
                _ && (i = t.def(a.extensions, ".webgl_draw_buffers"));
                var s, c = e.constants,
                    f = c.drawBuffer,
                    l = c.backBuffer;
                s = n ? n.append(e, t) : t.def(u, ".next"), r || t("if(", s, "!==", u, ".cur){"), t("if(", s, "){", o, ".bindFramebuffer(", Bi, ",", s, ".framebuffer);"), _ && t(i, ".drawBuffersWEBGL(", f, "[", s, ".colorAttachments.length]);"), t("}else{", o, ".bindFramebuffer(", Bi, ",null);"), _ && t(i, ".drawBuffersWEBGL(", l, ");"), t("}", u, ".cur=", s, ";"), r || t("}")
            }

            function L(e, t, n) {
                var r = e.shared,
                    i = r.gl,
                    a = e.current,
                    o = e.next,
                    u = r.current,
                    s = r.next,
                    c = e.cond(u, ".dirty");
                w.forEach((function (t) {
                    var r, f, l = S(t);
                    if (!(l in n.state))
                        if (l in o) {
                            r = o[l], f = a[l];
                            var d = G(y[l].length, (function (e) {
                                return c.def(r, "[", e, "]")
                            }));
                            c(e.cond(d.map((function (e, t) {
                                return e + "!==" + f + "[" + t + "]"
                            })).join("||")).then(i, ".", A[l], "(", d, ");", d.map((function (e, t) {
                                return f + "[" + t + "]=" + e
                            })).join(";"), ";"))
                        } else {
                            r = c.def(s, ".", l);
                            var p = e.cond(r, "!==", u, ".", l);
                            c(p), l in k ? p(e.cond(r).then(i, ".enable(", k[l], ");").else(i, ".disable(", k[l], ");"), u, ".", l, "=", r, ";") : p(i, ".", A[l], "(", r, ");", u, ".", l, "=", r, ";")
                        }
                })), 0 === Object.keys(n.state).length && c(u, ".dirty=false;"), t(c)
            }

            function B(e, t, n, r) {
                var i = e.shared,
                    a = e.current,
                    o = i.current,
                    u = i.gl;
                Yi(Object.keys(n)).forEach((function (i) {
                    var s = n[i];
                    if (!r || r(s)) {
                        var c = s.append(e, t);
                        if (k[i]) {
                            var f = k[i];
                            qi(s) ? t(u, c ? ".enable(" : ".disable(", f, ");") : t(e.cond(c).then(u, ".enable(", f, ");").else(u, ".disable(", f, ");")), t(o, ".", i, "=", c, ";")
                        } else if (Le(c)) {
                            var l = a[i];
                            t(u, ".", A[i], "(", c, ");", c.map((function (e, t) {
                                return l + "[" + t + "]=" + e
                            })).join(";"), ";")
                        } else t(u, ".", A[i], "(", c, ");", o, ".", i, "=", c, ";")
                    }
                }))
            }

            function z(e, t) {
                g && (e.instancing = t.def(e.shared.extensions, ".angle_instanced_arrays"))
            }

            function N(e, t, n, r, i) {
                var a, o, u, s = e.shared,
                    c = e.stats,
                    f = s.current,
                    l = s.timer,
                    d = n.profile;

                function p() {
                    return "undefined" == typeof performance ? "Date.now()" : "performance.now()"
                }

                function h(e) {
                    e(a = t.def(), "=", p(), ";"), "string" == typeof i ? e(c, ".count+=", i, ";") : e(c, ".count++;"), m && (r ? e(o = t.def(), "=", l, ".getNumPendingQueries();") : e(l, ".beginQuery(", c, ");"))
                }

                function b(e) {
                    e(c, ".cpuTime+=", p(), "-", a, ";"), m && (r ? e(l, ".pushScopeStats(", o, ",", l, ".getNumPendingQueries(),", c, ");") : e(l, ".endQuery();"))
                }

                function v(e) {
                    var n = t.def(f, ".profile");
                    t(f, ".profile=", e, ";"), t.exit(f, ".profile=", n, ";")
                }
                if (d) {
                    if (qi(d)) return void(d.enable ? (h(t), b(t.exit), v("true")) : v("false"));
                    v(u = d.append(e, t))
                } else u = t.def(f, ".profile");
                var g = e.block();
                h(g), t("if(", u, "){", g, "}");
                var _ = e.block();
                b(_), t.exit("if(", u, "){", _, "}")
            }

            function H(e, t, n, r, i) {
                var a = e.shared;
                r.forEach((function (r) {
                    var o, u = r.name,
                        s = n.attributes[u];
                    if (s) {
                        if (!i(s)) return;
                        o = s.append(e, t)
                    } else {
                        if (!i(Zi)) return;
                        var c = e.scopeAttrib(u);
                        D.optional((function () {
                            e.assert(t, c + ".state", "missing attribute " + u)
                        })), o = {}, Object.keys(new b).forEach((function (e) {
                            o[e] = t.def(c, ".", e)
                        }))
                    }! function (n, r, i) {
                        var o = a.gl,
                            u = t.def(n, ".location"),
                            s = t.def(a.attributes, "[", u, "]"),
                            c = i.state,
                            f = i.buffer,
                            l = [i.x, i.y, i.z, i.w],
                            d = ["buffer", "normalized", "offset", "stride"];

                        function p() {
                            t("if(!", s, ".buffer){", o, ".enableVertexAttribArray(", u, ");}");
                            var n, a = i.type;
                            if (n = i.size ? t.def(i.size, "||", r) : r, t("if(", s, ".type!==", a, "||", s, ".size!==", n, "||", d.map((function (e) {
                                    return s + "." + e + "!==" + i[e]
                                })).join("||"), "){", o, ".bindBuffer(", qr, ",", f, ".buffer);", o, ".vertexAttribPointer(", [u, n, a, i.normalized, i.stride, i.offset], ");", s, ".type=", a, ";", s, ".size=", n, ";", d.map((function (e) {
                                    return s + "." + e + "=" + i[e] + ";"
                                })).join(""), "}"), g) {
                                var c = i.divisor;
                                t("if(", s, ".divisor!==", c, "){", e.instancing, ".vertexAttribDivisorANGLE(", [u, c], ");", s, ".divisor=", c, ";}")
                            }
                        }

                        function m() {
                            t("if(", s, ".buffer){", o, ".disableVertexAttribArray(", u, ");", s, ".buffer=null;", "}if(", Kn.map((function (e, t) {
                                return s + "." + e + "!==" + l[t]
                            })).join("||"), "){", o, ".vertexAttrib4f(", u, ",", l, ");", Kn.map((function (e, t) {
                                return s + "." + e + "=" + l[t] + ";"
                            })).join(""), "}")
                        }
                        c === Jn ? p() : c === $n ? m() : (t("if(", c, "===", Jn, "){"), p(), t("}else{"), m(), t("}"))
                    }(e.link(r), function (e) {
                        switch (e) {
                            case si:
                            case di:
                            case bi:
                                return 2;
                            case ci:
                            case pi:
                            case vi:
                                return 3;
                            case fi:
                            case mi:
                            case gi:
                                return 4;
                            default:
                                return 1
                        }
                    }(r.info.type), o)
                }))
            }

            function U(e, t, r, i, a) {
                for (var o, u = e.shared, s = u.gl, c = 0; c < i.length; ++c) {
                    var f, l = i[c],
                        d = l.name,
                        p = l.info.type,
                        m = r.uniforms[d],
                        h = e.link(l) + ".location";
                    if (m) {
                        if (!a(m)) continue;
                        if (qi(m)) {
                            var b = m.value;
                            if (D.command(null != b, 'missing uniform "' + d + '"', e.commandStr), p === wi || p === ki) {
                                D.command("function" == typeof b && (p === wi && ("texture2d" === b._reglType || "framebuffer" === b._reglType) || p === ki && ("textureCube" === b._reglType || "framebufferCube" === b._reglType)), "invalid texture for uniform " + d, e.commandStr);
                                var v = e.link(b._texture || b.color[0]._texture);
                                t(s, ".uniform1i(", h, ",", v + ".bind());"), t.exit(v, ".unbind();")
                            } else if (p === _i || p === yi || p === xi) {
                                D.optional((function () {
                                    D.command(Le(b), "invalid matrix for uniform " + d, e.commandStr), D.command(p === _i && 4 === b.length || p === yi && 9 === b.length || p === xi && 16 === b.length, "invalid length for matrix uniform " + d, e.commandStr)
                                }));
                                var g = e.global.def("new Float32Array([" + Array.prototype.slice.call(b) + "])"),
                                    _ = 2;
                                p === yi ? _ = 3 : p === xi && (_ = 4), t(s, ".uniformMatrix", _, "fv(", h, ",false,", g, ");")
                            } else {
                                switch (p) {
                                    case ui:
                                        D.commandType(b, "number", "uniform " + d, e.commandStr), o = "1f";
                                        break;
                                    case si:
                                        D.command(Le(b) && 2 === b.length, "uniform " + d, e.commandStr), o = "2f";
                                        break;
                                    case ci:
                                        D.command(Le(b) && 3 === b.length, "uniform " + d, e.commandStr), o = "3f";
                                        break;
                                    case fi:
                                        D.command(Le(b) && 4 === b.length, "uniform " + d, e.commandStr), o = "4f";
                                        break;
                                    case hi:
                                        D.commandType(b, "boolean", "uniform " + d, e.commandStr), o = "1i";
                                        break;
                                    case li:
                                        D.commandType(b, "number", "uniform " + d, e.commandStr), o = "1i";
                                        break;
                                    case bi:
                                    case di:
                                        D.command(Le(b) && 2 === b.length, "uniform " + d, e.commandStr), o = "2i";
                                        break;
                                    case vi:
                                    case pi:
                                        D.command(Le(b) && 3 === b.length, "uniform " + d, e.commandStr), o = "3i";
                                        break;
                                    case gi:
                                    case mi:
                                        D.command(Le(b) && 4 === b.length, "uniform " + d, e.commandStr), o = "4i"
                                }
                                t(s, ".uniform", o, "(", h, ",", Le(b) ? Array.prototype.slice.call(b) : b, ");")
                            }
                            continue
                        }
                        f = m.append(e, t)
                    } else {
                        if (!a(Zi)) continue;
                        f = t.def(u.uniforms, "[", n.id(d), "]")
                    }
                    p === wi ? t("if(", f, "&&", f, '._reglType==="framebuffer"){', f, "=", f, ".color[0];", "}") : p === ki && t("if(", f, "&&", f, '._reglType==="framebufferCube"){', f, "=", f, ".color[0];", "}"), D.optional((function () {
                        function n(n, r) {
                            e.assert(t, n, 'bad data or missing for uniform "' + d + '".  ' + r)
                        }

                        function r(e) {
                            n("typeof " + f + '==="' + e + '"', "invalid type, expected " + e)
                        }

                        function i(t, r) {
                            n(u.isArrayLike + "(" + f + ")&&" + f + ".length===" + t, "invalid vector, should have length " + t, e.commandStr)
                        }

                        function a(t) {
                            n("typeof " + f + '==="function"&&' + f + '._reglType==="texture' + (t === Kr ? "2d" : "Cube") + '"', "invalid texture type", e.commandStr)
                        }
                        switch (p) {
                            case li:
                                r("number");
                                break;
                            case di:
                                i(2);
                                break;
                            case pi:
                                i(3);
                                break;
                            case mi:
                                i(4);
                                break;
                            case ui:
                                r("number");
                                break;
                            case si:
                                i(2);
                                break;
                            case ci:
                                i(3);
                                break;
                            case fi:
                                i(4);
                                break;
                            case hi:
                                r("boolean");
                                break;
                            case bi:
                                i(2);
                                break;
                            case vi:
                                i(3);
                                break;
                            case gi:
                            case _i:
                                i(4);
                                break;
                            case yi:
                                i(9);
                                break;
                            case xi:
                                i(16);
                                break;
                            case wi:
                                a(Kr);
                                break;
                            case ki:
                                a(Zr)
                        }
                    }));
                    var y = 1;
                    switch (p) {
                        case wi:
                        case ki:
                            var x = t.def(f, "._texture");
                            t(s, ".uniform1i(", h, ",", x, ".bind());"), t.exit(x, ".unbind();");
                            continue;
                        case li:
                        case hi:
                            o = "1i";
                            break;
                        case di:
                        case bi:
                            o = "2i", y = 2;
                            break;
                        case pi:
                        case vi:
                            o = "3i", y = 3;
                            break;
                        case mi:
                        case gi:
                            o = "4i", y = 4;
                            break;
                        case ui:
                            o = "1f";
                            break;
                        case si:
                            o = "2f", y = 2;
                            break;
                        case ci:
                            o = "3f", y = 3;
                            break;
                        case fi:
                            o = "4f", y = 4;
                            break;
                        case _i:
                            o = "Matrix2fv";
                            break;
                        case yi:
                            o = "Matrix3fv";
                            break;
                        case xi:
                            o = "Matrix4fv"
                    }
                    if (t(s, ".uniform", o, "(", h, ","), "M" === o.charAt(0)) {
                        var w = Math.pow(p - _i + 2, 2),
                            k = e.global.def("new Float32Array(", w, ")");
                        t("false,(Array.isArray(", f, ")||", f, " instanceof Float32Array)?", f, ":(", G(w, (function (e) {
                            return k + "[" + e + "]=" + f + "[" + e + "]"
                        })), ",", k, ")")
                    } else t(y > 1 ? G(y, (function (e) {
                        return f + "[" + e + "]"
                    })) : f);
                    t(");")
                }
            }

            function V(e, t, n, r) {
                var i = e.shared,
                    a = i.gl,
                    o = i.draw,
                    u = r.draw,
                    s = function () {
                        var i, s = u.elements,
                            c = t;
                        return s ? ((s.contextDep && r.contextDynamic || s.propDep) && (c = n), i = s.append(e, c)) : i = c.def(o, ".", Lr), i && c("if(" + i + ")" + a + ".bindBuffer(" + Qr + "," + i + ".buffer.buffer);"), i
                    }();

                function c(i) {
                    var a = u[i];
                    return a ? a.contextDep && r.contextDynamic || a.propDep ? a.append(e, n) : a.append(e, t) : t.def(o, ".", i)
                }
                var f, l, d = c(Br),
                    p = c(zr),
                    m = function () {
                        var i, a = u.count,
                            s = t;
                        return a ? ((a.contextDep && r.contextDynamic || a.propDep) && (s = n), i = a.append(e, s), D.optional((function () {
                            a.MISSING && e.assert(t, "false", "missing vertex count"), a.DYNAMIC && e.assert(s, i + ">=0", "missing vertex count")
                        }))) : (i = s.def(o, ".", Pr), D.optional((function () {
                            e.assert(s, i + ">=0", "missing vertex count")
                        }))), i
                    }();
                if ("number" == typeof m) {
                    if (0 === m) return
                } else n("if(", m, "){"), n.exit("}");
                g && (f = c(Nr), l = e.instancing);
                var h = s + ".type",
                    b = u.elements && qi(u.elements);

                function v() {
                    function e() {
                        n(l, ".drawElementsInstancedANGLE(", [d, m, h, p + "<<((" + h + "-" + Zn + ")>>1)", f], ");")
                    }

                    function t() {
                        n(l, ".drawArraysInstancedANGLE(", [d, p, m, f], ");")
                    }
                    s ? b ? e() : (n("if(", s, "){"), e(), n("}else{"), t(), n("}")) : t()
                }

                function _() {
                    function e() {
                        n(a + ".drawElements(" + [d, m, h, p + "<<((" + h + "-" + Zn + ")>>1)"] + ");")
                    }

                    function t() {
                        n(a + ".drawArrays(" + [d, p, m] + ");")
                    }
                    s ? b ? e() : (n("if(", s, "){"), e(), n("}else{"), t(), n("}")) : t()
                }
                g && ("number" != typeof f || f >= 0) ? "string" == typeof f ? (n("if(", f, ">0){"), v(), n("}else if(", f, "<0){"), _(), n("}")) : v() : _()
            }

            function W(e, t, n, r, i) {
                var a = j(),
                    o = a.proc("body", i);
                return D.optional((function () {
                    a.commandStr = t.commandStr, a.command = a.link(t.commandStr)
                })), g && (a.instancing = o.def(a.shared.extensions, ".angle_instanced_arrays")), e(a, o, n, r), a.compile().body
            }

            function Y(e, t, n, r) {
                z(e, t), H(e, t, n, r.attributes, (function () {
                    return !0
                })), U(e, t, n, r.uniforms, (function () {
                    return !0
                })), V(e, t, t, n)
            }

            function X(e, t, n, r) {
                function i() {
                    return !0
                }
                e.batchId = "a1", z(e, t), H(e, t, n, r.attributes, i), U(e, t, n, r.uniforms, i), V(e, t, t, n)
            }

            function q(e, t, n, r) {
                z(e, t);
                var i = n.contextDep,
                    a = t.def(),
                    o = t.def();
                e.shared.props = o, e.batchId = a;
                var u = e.scope(),
                    s = e.scope();

                function c(e) {
                    return e.contextDep && i || e.propDep
                }

                function f(e) {
                    return !c(e)
                }
                if (t(u.entry, "for(", a, "=0;", a, "<", "a1", ";++", a, "){", o, "=", "a0", "[", a, "];", s, "}", u.exit), n.needsContext && R(e, s, n.context), n.needsFramebuffer && I(e, s, n.framebuffer), B(e, s, n.state, c), n.profile && c(n.profile) && N(e, s, n, !1, !0), r) H(e, u, n, r.attributes, f), H(e, s, n, r.attributes, c), U(e, u, n, r.uniforms, f), U(e, s, n, r.uniforms, c), V(e, u, s, n);
                else {
                    var l = e.global.def("{}"),
                        d = n.shader.progVar.append(e, s),
                        p = s.def(d, ".id"),
                        m = s.def(l, "[", p, "]");
                    s(e.shared.gl, ".useProgram(", d, ".program);", "if(!", m, "){", m, "=", l, "[", p, "]=", e.link((function (t) {
                        return W(X, e, n, t, 2)
                    })), "(", d, ");}", m, ".call(this,a0[", a, "],", a, ");")
                }
            }

            function Q(e, t, n) {
                var r = t.static[n];
                if (r && function (e) {
                        if ("object" == typeof e && !Le(e)) {
                            for (var t = Object.keys(e), n = 0; n < t.length; ++n)
                                if (P.isDynamic(e[t[n]])) return !0;
                            return !1
                        }
                    }(r)) {
                    var i = e.global,
                        a = Object.keys(r),
                        o = !1,
                        u = !1,
                        s = !1,
                        c = e.global.def("{}");
                    a.forEach((function (t) {
                        var n = r[t];
                        if (P.isDynamic(n)) {
                            "function" == typeof n && (n = r[t] = P.unbox(n));
                            var a = Ki(n, null);
                            o = o || a.thisDep, s = s || a.propDep, u = u || a.contextDep
                        } else {
                            switch (i(c, ".", t, "="), typeof n) {
                                case "number":
                                    i(n);
                                    break;
                                case "string":
                                    i('"', n, '"');
                                    break;
                                case "object":
                                    Array.isArray(n) && i("[", n.join(), "]");
                                    break;
                                default:
                                    i(e.link(n))
                            }
                            i(";")
                        }
                    })), t.dynamic[n] = new P.DynamicVariable(ir, {
                        thisDep: o,
                        contextDep: u,
                        propDep: s,
                        ref: c,
                        append: function (e, t) {
                            a.forEach((function (n) {
                                var i = r[n];
                                if (P.isDynamic(i)) {
                                    var a = e.invoke(t, i);
                                    t(c, ".", n, "=", a, ";")
                                }
                            }))
                        }
                    }), delete t.static[n]
                }
            }
            return {
                next: x,
                current: y,
                procs: function () {
                    var e = j(),
                        t = e.proc("poll"),
                        n = e.proc("refresh"),
                        r = e.block();
                    t(r), n(r);
                    var a, o = e.shared,
                        u = o.gl,
                        s = o.next,
                        c = o.current;
                    r(c, ".dirty=false;"), I(e, t), I(e, n, null, !0), g && (a = e.link(g));
                    for (var f = 0; f < i.maxAttributes; ++f) {
                        var l = n.def(o.attributes, "[", f, "]"),
                            d = e.cond(l, ".buffer");
                        d.then(u, ".enableVertexAttribArray(", f, ");", u, ".bindBuffer(", qr, ",", l, ".buffer.buffer);", u, ".vertexAttribPointer(", f, ",", l, ".size,", l, ".type,", l, ".normalized,", l, ".stride,", l, ".offset);").else(u, ".disableVertexAttribArray(", f, ");", u, ".vertexAttrib4f(", f, ",", l, ".x,", l, ".y,", l, ".z,", l, ".w);", l, ".buffer=null;"), n(d), g && n(a, ".vertexAttribDivisorANGLE(", f, ",", l, ".divisor);")
                    }
                    return Object.keys(k).forEach((function (i) {
                        var a = k[i],
                            o = r.def(s, ".", i),
                            f = e.block();
                        f("if(", o, "){", u, ".enable(", a, ")}else{", u, ".disable(", a, ")}", c, ".", i, "=", o, ";"), n(f), t("if(", o, "!==", c, ".", i, "){", f, "}")
                    })), Object.keys(A).forEach((function (i) {
                        var a, o, f = A[i],
                            l = y[i],
                            d = e.block();
                        if (d(u, ".", f, "("), Le(l)) {
                            var p = l.length;
                            a = e.global.def(s, ".", i), o = e.global.def(c, ".", i), d(G(p, (function (e) {
                                return a + "[" + e + "]"
                            })), ");", G(p, (function (e) {
                                return o + "[" + e + "]=" + a + "[" + e + "];"
                            })).join("")), t("if(", G(p, (function (e) {
                                return a + "[" + e + "]!==" + o + "[" + e + "]"
                            })).join("||"), "){", d, "}")
                        } else a = r.def(s, ".", i), o = r.def(c, ".", i), d(a, ");", c, ".", i, "=", a, ";"), t("if(", a, "!==", o, "){", d, "}");
                        n(d)
                    })), e.compile()
                }(),
                compile: function (e, t, r, i, a) {
                    var o = j();
                    o.stats = o.link(a), Object.keys(t.static).forEach((function (e) {
                        Q(o, t, e)
                    })), Xr.forEach((function (t) {
                        Q(o, e, t)
                    }));
                    var u = F(e, t, r, i, o);
                    return function (e, t) {
                            var n = e.proc("draw", 1);
                            z(e, n), R(e, n, t.context), I(e, n, t.framebuffer), L(e, n, t), B(e, n, t.state), N(e, n, t, !1, !0);
                            var r = t.shader.progVar.append(e, n);
                            if (n(e.shared.gl, ".useProgram(", r, ".program);"), t.shader.program) Y(e, n, t, t.shader.program);
                            else {
                                var i = e.global.def("{}"),
                                    a = n.def(r, ".id"),
                                    o = n.def(i, "[", a, "]");
                                n(e.cond(o).then(o, ".call(this,a0);").else(o, "=", i, "[", a, "]=", e.link((function (n) {
                                    return W(Y, e, t, n, 1)
                                })), "(", r, ");", o, ".call(this,a0);"))
                            }
                            Object.keys(t.state).length > 0 && n(e.shared.current, ".dirty=true;")
                        }(o, u),
                        function (e, t) {
                            var r = e.proc("scope", 3);
                            e.batchId = "a2";
                            var i = e.shared,
                                a = i.current;

                            function o(n) {
                                var a = t.shader[n];
                                a && r.set(i.shader, "." + n, a.append(e, r))
                            }
                            R(e, r, t.context), t.framebuffer && t.framebuffer.append(e, r), Yi(Object.keys(t.state)).forEach((function (n) {
                                var a = t.state[n].append(e, r);
                                Le(a) ? a.forEach((function (t, i) {
                                    r.set(e.next[n], "[" + i + "]", t)
                                })) : r.set(i.next, "." + n, a)
                            })), N(e, r, t, !0, !0), [Lr, zr, Pr, Nr, Br].forEach((function (n) {
                                var a = t.draw[n];
                                a && r.set(i.draw, "." + n, "" + a.append(e, r))
                            })), Object.keys(t.uniforms).forEach((function (a) {
                                r.set(i.uniforms, "[" + n.id(a) + "]", t.uniforms[a].append(e, r))
                            })), Object.keys(t.attributes).forEach((function (n) {
                                var i = t.attributes[n].append(e, r),
                                    a = e.scopeAttrib(n);
                                Object.keys(new b).forEach((function (e) {
                                    r.set(a, "." + e, i[e])
                                }))
                            })), o(Rr), o(Ir), Object.keys(t.state).length > 0 && (r(a, ".dirty=true;"), r.exit(a, ".dirty=true;")), r("a1(", e.shared.context, ",a0,", e.batchId, ");")
                        }(o, u),
                        function (e, t) {
                            var n = e.proc("batch", 2);
                            e.batchId = "0", z(e, n);
                            var r = !1,
                                i = !0;
                            Object.keys(t.context).forEach((function (e) {
                                r = r || t.context[e].propDep
                            })), r || (R(e, n, t.context), i = !1);
                            var a = t.framebuffer,
                                o = !1;

                            function u(e) {
                                return e.contextDep && r || e.propDep
                            }
                            a ? (a.propDep ? r = o = !0 : a.contextDep && r && (o = !0), o || I(e, n, a)) : I(e, n, null), t.state.viewport && t.state.viewport.propDep && (r = !0), L(e, n, t), B(e, n, t.state, (function (e) {
                                return !u(e)
                            })), t.profile && u(t.profile) || N(e, n, t, !1, "a1"), t.contextDep = r, t.needsContext = i, t.needsFramebuffer = o;
                            var s = t.shader.progVar;
                            if (s.contextDep && r || s.propDep) q(e, n, t, null);
                            else {
                                var c = s.append(e, n);
                                if (n(e.shared.gl, ".useProgram(", c, ".program);"), t.shader.program) q(e, n, t, t.shader.program);
                                else {
                                    var f = e.global.def("{}"),
                                        l = n.def(c, ".id"),
                                        d = n.def(f, "[", l, "]");
                                    n(e.cond(d).then(d, ".call(this,a0,a1);").else(d, "=", f, "[", l, "]=", e.link((function (n) {
                                        return W(q, e, t, n, 2)
                                    })), "(", c, ");", d, ".call(this,a0,a1);"))
                                }
                            }
                            Object.keys(t.state).length > 0 && n(e.shared.current, ".dirty=true;")
                        }(o, u), o.compile()
                }
            }
        }
        var $i = 34918,
            ea = 34919,
            ta = 35007,
            na = function (e, t) {
                if (!t.ext_disjoint_timer_query) return null;
                var n = [];

                function r(e) {
                    n.push(e)
                }
                var i = [];

                function a() {
                    this.startQueryIndex = -1, this.endQueryIndex = -1, this.sum = 0, this.stats = null
                }
                var o = [];

                function u(e) {
                    o.push(e)
                }
                var s = [];

                function c(e, t, n) {
                    var r = o.pop() || new a;
                    r.startQueryIndex = e, r.endQueryIndex = t, r.sum = 0, r.stats = n, s.push(r)
                }
                var f = [],
                    l = [];
                return {
                    beginQuery: function (e) {
                        var r = n.pop() || t.ext_disjoint_timer_query.createQueryEXT();
                        t.ext_disjoint_timer_query.beginQueryEXT(ta, r), i.push(r), c(i.length - 1, i.length, e)
                    },
                    endQuery: function () {
                        t.ext_disjoint_timer_query.endQueryEXT(ta)
                    },
                    pushScopeStats: c,
                    update: function () {
                        var e, n, a = i.length;
                        if (0 !== a) {
                            l.length = Math.max(l.length, a + 1), f.length = Math.max(f.length, a + 1), f[0] = 0, l[0] = 0;
                            var o = 0;
                            for (e = 0, n = 0; n < i.length; ++n) {
                                var c = i[n];
                                t.ext_disjoint_timer_query.getQueryObjectEXT(c, ea) ? (o += t.ext_disjoint_timer_query.getQueryObjectEXT(c, $i), r(c)) : i[e++] = c, f[n + 1] = o, l[n + 1] = e
                            }
                            for (i.length = e, e = 0, n = 0; n < s.length; ++n) {
                                var d = s[n],
                                    p = d.startQueryIndex,
                                    m = d.endQueryIndex;
                                d.sum += f[m] - f[p];
                                var h = l[p],
                                    b = l[m];
                                b === h ? (d.stats.gpuTime += d.sum / 1e6, u(d)) : (d.startQueryIndex = h, d.endQueryIndex = b, s[e++] = d)
                            }
                            s.length = e
                        }
                    },
                    getNumPendingQueries: function () {
                        return i.length
                    },
                    clear: function () {
                        n.push.apply(n, i);
                        for (var e = 0; e < n.length; e++) t.ext_disjoint_timer_query.deleteQueryEXT(n[e]);
                        i.length = 0, n.length = 0
                    },
                    restore: function () {
                        i.length = 0, n.length = 0
                    }
                }
            },
            ra = 16384,
            ia = 256,
            aa = 1024,
            oa = 34962,
            ua = "webglcontextlost",
            sa = "webglcontextrestored",
            ca = 1,
            fa = 2,
            la = 3;

        function da(e, t) {
            for (var n = 0; n < e.length; ++n)
                if (e[n] === t) return n;
            return -1
        }
        return function (n) {
            var r = V(n);
            if (!r) return null;
            var i = r.gl,
                a = i.getContextAttributes(),
                o = i.isContextLost(),
                u = function (e, t) {
                    var n = {};

                    function r(t) {
                        D.type(t, "string", "extension name must be string");
                        var r, i = t.toLowerCase();
                        try {
                            r = n[i] = e.getExtension(i)
                        } catch (e) {}
                        return !!r
                    }
                    for (var i = 0; i < t.extensions.length; ++i) {
                        var a = t.extensions[i];
                        if (!r(a)) return t.onDestroy(), t.onDone('"' + a + '" extension is not supported by the current WebGL context, try upgrading your system or a different browser'), null
                    }
                    return t.optionalExtensions.forEach(r), {
                        extensions: n,
                        restore: function () {
                            Object.keys(n).forEach((function (e) {
                                if (n[e] && !r(e)) throw new Error("(regl): error restoring extension " + e)
                            }))
                        }
                    }
                }(i, r);
            if (!u) return null;
            var s, c, f = (s = {
                    "": 0
                }, c = [""], {
                    id: function (e) {
                        var t = s[e];
                        return t || (t = s[e] = c.length, c.push(e), t)
                    },
                    str: function (e) {
                        return c[e]
                    }
                }),
                l = {
                    bufferCount: 0,
                    elementsCount: 0,
                    framebufferCount: 0,
                    shaderCount: 0,
                    textureCount: 0,
                    cubeCount: 0,
                    renderbufferCount: 0,
                    maxTextureUnits: 0
                },
                d = u.extensions,
                p = na(i, d),
                m = N(),
                h = i.drawingBufferWidth,
                b = i.drawingBufferHeight,
                v = {
                    tick: 0,
                    time: 0,
                    viewportWidth: h,
                    viewportHeight: b,
                    framebufferWidth: h,
                    framebufferHeight: b,
                    drawingBufferWidth: h,
                    drawingBufferHeight: b,
                    pixelRatio: r.pixelRatio
                },
                g = te(i, d),
                _ = function (e, t, n, r) {
                    for (var i = n.maxAttributes, a = new Array(i), o = 0; o < i; ++o) a[o] = new Pn;
                    return {
                        Record: Pn,
                        scope: {},
                        state: a
                    }
                }(0, 0, g),
                y = function (t, n, r, i) {
                    var a = 0,
                        o = {};

                    function u(e) {
                        this.id = a++, this.buffer = t.createBuffer(), this.type = e, this.usage = le, this.byteLength = 0, this.dimension = 1, this.dtype = pe, this.persistentData = null, r.profile && (this.stats = {
                            size: 0
                        })
                    }
                    u.prototype.bind = function () {
                        t.bindBuffer(this.type, this.buffer)
                    }, u.prototype.destroy = function () {
                        l(this)
                    };
                    var s = [];

                    function c(e, n, r) {
                        e.byteLength = n.byteLength, t.bufferData(e.type, n, r)
                    }

                    function f(t, n, r, i, a, o) {
                        var u, s;
                        if (t.usage = r, Array.isArray(n)) {
                            if (t.dtype = i || me, n.length > 0)
                                if (Array.isArray(n[0])) {
                                    u = fe(n);
                                    for (var f = 1, l = 1; l < u.length; ++l) f *= u[l];
                                    t.dimension = f, c(t, s = ce(n, u, t.dtype), r), o ? t.persistentData = s : ee.freeType(s)
                                } else if ("number" == typeof n[0]) {
                                t.dimension = a;
                                var d = ee.allocType(t.dtype, n.length);
                                ve(d, n), c(t, d, r), o ? t.persistentData = d : ee.freeType(d)
                            } else e(n[0]) ? (t.dimension = n[0].length, t.dtype = i || be(n[0]) || me, c(t, s = ce(n, [n.length, n[0].length], t.dtype), r), o ? t.persistentData = s : ee.freeType(s)) : D.raise("invalid buffer data")
                        } else if (e(n)) t.dtype = i || be(n), t.dimension = a, c(t, n, r), o && (t.persistentData = new Uint8Array(new Uint8Array(n.buffer)));
                        else if (ne(n)) {
                            u = n.shape;
                            var p = n.stride,
                                m = n.offset,
                                h = 0,
                                b = 0,
                                v = 0,
                                g = 0;
                            1 === u.length ? (h = u[0], b = 1, v = p[0], g = 0) : 2 === u.length ? (h = u[0], b = u[1], v = p[0], g = p[1]) : D.raise("invalid shape"), t.dtype = i || be(n.data) || me, t.dimension = b;
                            var _ = ee.allocType(t.dtype, h * b);
                            ge(_, n.data, h, b, v, g, m), c(t, _, r), o ? t.persistentData = _ : ee.freeType(_)
                        } else n instanceof ArrayBuffer ? (t.dtype = pe, t.dimension = a, c(t, n, r), o && (t.persistentData = new Uint8Array(new Uint8Array(n)))) : D.raise("invalid buffer data")
                    }

                    function l(e) {
                        n.bufferCount--;
                        for (var r = 0; r < i.state.length; ++r) {
                            var a = i.state[r];
                            a.buffer === e && (t.disableVertexAttribArray(r), a.buffer = null)
                        }
                        var u = e.buffer;
                        D(u, "buffer must not be deleted already"), t.deleteBuffer(u), e.buffer = null, delete o[e.id]
                    }
                    return r.profile && (n.getTotalBufferSize = function () {
                        var e = 0;
                        return Object.keys(o).forEach((function (t) {
                            e += o[t].stats.size
                        })), e
                    }), {
                        create: function (i, a, s, c) {
                            n.bufferCount++;
                            var d = new u(a);

                            function p(n) {
                                var i = le,
                                    a = null,
                                    o = 0,
                                    u = 0,
                                    s = 1;
                                return Array.isArray(n) || e(n) || ne(n) || n instanceof ArrayBuffer ? a = n : "number" == typeof n ? o = 0 | n : n && (D.type(n, "object", "buffer arguments must be an object, a number or an array"), "data" in n && (D(null === a || Array.isArray(a) || e(a) || ne(a), "invalid data for buffer"), a = n.data), "usage" in n && (D.parameter(n.usage, se, "invalid buffer usage"), i = se[n.usage]), "type" in n && (D.parameter(n.type, ue, "invalid buffer type"), u = ue[n.type]), "dimension" in n && (D.type(n.dimension, "number", "invalid dimension"), s = 0 | n.dimension), "length" in n && (D.nni(o, "buffer length must be a nonnegative integer"), o = 0 | n.length)), d.bind(), a ? f(d, a, i, u, s, c) : (o && t.bufferData(d.type, o, i), d.dtype = u || pe, d.usage = i, d.dimension = s, d.byteLength = o), r.profile && (d.stats.size = d.byteLength * he[d.dtype]), p
                            }

                            function m(e, n) {
                                D(n + e.byteLength <= d.byteLength, "invalid buffer subdata call, buffer is too small.  Can't write data of size " + e.byteLength + " starting from offset " + n + " to a buffer of size " + d.byteLength), t.bufferSubData(d.type, n, e)
                            }
                            return o[d.id] = d, s || p(i), p._reglType = "buffer", p._buffer = d, p.subdata = function (t, n) {
                                var r, i = 0 | (n || 0);
                                if (d.bind(), e(t) || t instanceof ArrayBuffer) m(t, i);
                                else if (Array.isArray(t)) {
                                    if (t.length > 0)
                                        if ("number" == typeof t[0]) {
                                            var a = ee.allocType(d.dtype, t.length);
                                            ve(a, t), m(a, i), ee.freeType(a)
                                        } else if (Array.isArray(t[0]) || e(t[0])) {
                                        r = fe(t);
                                        var o = ce(t, r, d.dtype);
                                        m(o, i), ee.freeType(o)
                                    } else D.raise("invalid buffer data")
                                } else if (ne(t)) {
                                    r = t.shape;
                                    var u = t.stride,
                                        s = 0,
                                        c = 0,
                                        f = 0,
                                        l = 0;
                                    1 === r.length ? (s = r[0], c = 1, f = u[0], l = 0) : 2 === r.length ? (s = r[0], c = r[1], f = u[0], l = u[1]) : D.raise("invalid shape");
                                    var h = Array.isArray(t.data) ? d.dtype : be(t.data),
                                        b = ee.allocType(h, s * c);
                                    ge(b, t.data, s, c, f, l, t.offset), m(b, i), ee.freeType(b)
                                } else D.raise("invalid data for buffer subdata");
                                return p
                            }, r.profile && (p.stats = d.stats), p.destroy = function () {
                                l(d)
                            }, p
                        },
                        createStream: function (e, t) {
                            var n = s.pop();
                            return n || (n = new u(e)), n.bind(), f(n, t, de, 0, 1, !1), n
                        },
                        destroyStream: function (e) {
                            s.push(e)
                        },
                        clear: function () {
                            re(o).forEach(l), s.forEach(l)
                        },
                        getBuffer: function (e) {
                            return e && e._buffer instanceof u ? e._buffer : null
                        },
                        restore: function () {
                            re(o).forEach((function (e) {
                                e.buffer = t.createBuffer(), t.bindBuffer(e.type, e.buffer), t.bufferData(e.type, e.persistentData || e.byteLength, e.usage)
                            }))
                        },
                        _initBuffer: f
                    }
                }(i, l, r, _),
                x = function (t, n, r, i) {
                    var a = {},
                        o = 0,
                        u = {
                            uint8: Ae,
                            uint16: Ee
                        };

                    function s(e) {
                        this.id = o++, a[this.id] = this, this.buffer = e, this.primType = we, this.vertCount = 0, this.type = 0
                    }
                    n.oes_element_index_uint && (u.uint32 = Oe), s.prototype.bind = function () {
                        this.buffer.bind()
                    };
                    var c = [];

                    function f(i, a, o, u, s, c, f) {
                        if (i.buffer.bind(), a) {
                            var l = f;
                            f || e(a) && (!ne(a) || e(a.data)) || (l = n.oes_element_index_uint ? Oe : Ee), r._initBuffer(i.buffer, a, o, l, 3)
                        } else t.bufferData(Te, c, o), i.buffer.dtype = d || Ae, i.buffer.usage = o, i.buffer.dimension = 3, i.buffer.byteLength = c;
                        var d = f;
                        if (!f) {
                            switch (i.buffer.dtype) {
                                case Ae:
                                case ke:
                                    d = Ae;
                                    break;
                                case Ee:
                                case Se:
                                    d = Ee;
                                    break;
                                case Oe:
                                case Ce:
                                    d = Oe;
                                    break;
                                default:
                                    D.raise("unsupported type for element array")
                            }
                            i.buffer.dtype = d
                        }
                        i.type = d, D(d !== Oe || !!n.oes_element_index_uint, "32 bit element buffers not supported, enable oes_element_index_uint first");
                        var p = s;
                        p < 0 && (p = i.buffer.byteLength, d === Ee ? p >>= 1 : d === Oe && (p >>= 2)), i.vertCount = p;
                        var m = u;
                        if (u < 0) {
                            m = we;
                            var h = i.buffer.dimension;
                            1 === h && (m = ye), 2 === h && (m = xe), 3 === h && (m = we)
                        }
                        i.primType = m
                    }

                    function l(e) {
                        i.elementsCount--, D(null !== e.buffer, "must not double destroy elements"), delete a[e.id], e.buffer.destroy(), e.buffer = null
                    }
                    return {
                        create: function (t, n) {
                            var a = r.create(null, Te, !0),
                                o = new s(a._buffer);

                            function c(t) {
                                if (t)
                                    if ("number" == typeof t) a(t), o.primType = we, o.vertCount = 0 | t, o.type = Ae;
                                    else {
                                        var n = null,
                                            r = je,
                                            i = -1,
                                            s = -1,
                                            l = 0,
                                            d = 0;
                                        Array.isArray(t) || e(t) || ne(t) ? n = t : (D.type(t, "object", "invalid arguments for elements"), "data" in t && (n = t.data, D(Array.isArray(n) || e(n) || ne(n), "invalid data for element buffer")), "usage" in t && (D.parameter(t.usage, se, "invalid element buffer usage"), r = se[t.usage]), "primitive" in t && (D.parameter(t.primitive, _e, "invalid element buffer primitive"), i = _e[t.primitive]), "count" in t && (D("number" == typeof t.count && t.count >= 0, "invalid vertex count for elements"), s = 0 | t.count), "type" in t && (D.parameter(t.type, u, "invalid buffer type"), d = u[t.type]), "length" in t ? l = 0 | t.length : (l = s, d === Ee || d === Se ? l *= 2 : d !== Oe && d !== Ce || (l *= 4))), f(o, n, r, i, s, l, d)
                                    }
                                else a(), o.primType = we, o.vertCount = 0, o.type = Ae;
                                return c
                            }
                            return i.elementsCount++, c(t), c._reglType = "elements", c._elements = o, c.subdata = function (e, t) {
                                return a.subdata(e, t), c
                            }, c.destroy = function () {
                                l(o)
                            }, c
                        },
                        createStream: function (e) {
                            var t = c.pop();
                            return t || (t = new s(r.create(null, Te, !0, !1)._buffer)), f(t, e, Me, -1, -1, 0, 0), t
                        },
                        destroyStream: function (e) {
                            c.push(e)
                        },
                        getElements: function (e) {
                            return "function" == typeof e && e._elements instanceof s ? e._elements : null
                        },
                        clear: function () {
                            re(a).forEach(l)
                        }
                    }
                }(i, d, y, l),
                w = function (e, t, n, r) {
                    var i = {},
                        a = {};

                    function o(e, t, n, r) {
                        this.name = e, this.id = t, this.location = n, this.info = r
                    }

                    function u(e, t) {
                        for (var n = 0; n < e.length; ++n)
                            if (e[n].id === t.id) return void(e[n].location = t.location);
                        e.push(t)
                    }

                    function s(n, r, o) {
                        var u = n === zn ? i : a,
                            s = u[r];
                        if (!s) {
                            var c = t.str(r);
                            s = e.createShader(n), e.shaderSource(s, c), e.compileShader(s), D.shaderError(e, s, c, n, o), u[r] = s
                        }
                        return s
                    }
                    var c = {},
                        f = [],
                        l = 0;

                    function d(e, t) {
                        this.id = l++, this.fragId = e, this.vertId = t, this.program = null, this.uniforms = [], this.attributes = [], r.profile && (this.stats = {
                            uniformsCount: 0,
                            attributesCount: 0
                        })
                    }

                    function p(n, i) {
                        var a, c, f = s(zn, n.fragId),
                            l = s(Nn, n.vertId),
                            d = n.program = e.createProgram();
                        e.attachShader(d, f), e.attachShader(d, l), e.linkProgram(d), D.linkError(e, d, t.str(n.fragId), t.str(n.vertId), i);
                        var p = e.getProgramParameter(d, Hn);
                        r.profile && (n.stats.uniformsCount = p);
                        var m = n.uniforms;
                        for (a = 0; a < p; ++a)
                            if (c = e.getActiveUniform(d, a))
                                if (c.size > 1)
                                    for (var h = 0; h < c.size; ++h) {
                                        var b = c.name.replace("[0]", "[" + h + "]");
                                        u(m, new o(b, t.id(b), e.getUniformLocation(d, b), c))
                                    } else u(m, new o(c.name, t.id(c.name), e.getUniformLocation(d, c.name), c));
                        var v = e.getProgramParameter(d, Un);
                        r.profile && (n.stats.attributesCount = v);
                        var g = n.attributes;
                        for (a = 0; a < v; ++a)(c = e.getActiveAttrib(d, a)) && u(g, new o(c.name, t.id(c.name), e.getAttribLocation(d, c.name), c))
                    }
                    return r.profile && (n.getMaxUniformsCount = function () {
                        var e = 0;
                        return f.forEach((function (t) {
                            t.stats.uniformsCount > e && (e = t.stats.uniformsCount)
                        })), e
                    }, n.getMaxAttributesCount = function () {
                        var e = 0;
                        return f.forEach((function (t) {
                            t.stats.attributesCount > e && (e = t.stats.attributesCount)
                        })), e
                    }), {
                        clear: function () {
                            var t = e.deleteShader.bind(e);
                            re(i).forEach(t), i = {}, re(a).forEach(t), a = {}, f.forEach((function (t) {
                                e.deleteProgram(t.program)
                            })), f.length = 0, c = {}, n.shaderCount = 0
                        },
                        program: function (e, t, r) {
                            D.command(e >= 0, "missing vertex shader", r), D.command(t >= 0, "missing fragment shader", r);
                            var i = c[t];
                            i || (i = c[t] = {});
                            var a = i[e];
                            return a || (a = new d(t, e), n.shaderCount++, p(a, r), i[e] = a, f.push(a)), a
                        },
                        restore: function () {
                            i = {}, a = {};
                            for (var e = 0; e < f.length; ++e) p(f[e])
                        },
                        shader: s,
                        frag: -1,
                        vert: -1
                    }
                }(i, f, l, r),
                k = pn(i, d, g, (function () {
                    E.procs.poll()
                }), v, l, r),
                A = gn(i, d, g, l, r),
                S = function (e, n, r, i, a, o) {
                    var u = {
                            cur: null,
                            next: null,
                            dirty: !1,
                            setFBO: null
                        },
                        s = ["rgba"],
                        c = ["rgba4", "rgb565", "rgb5 a1"];
                    n.ext_srgb && c.push("srgba"), n.ext_color_buffer_half_float && c.push("rgba16f", "rgb16f"), n.webgl_color_buffer_float && c.push("rgba32f");
                    var f = ["uint8"];

                    function l(e, t, n) {
                        this.target = e, this.texture = t, this.renderbuffer = n;
                        var r = 0,
                            i = 0;
                        t ? (r = t.width, i = t.height) : n && (r = n.width, i = n.height), this.width = r, this.height = i
                    }

                    function d(e) {
                        e && (e.texture && e.texture._texture.decRef(), e.renderbuffer && e.renderbuffer._renderbuffer.decRef())
                    }

                    function p(e, t, n) {
                        if (e)
                            if (e.texture) {
                                var r = e.texture._texture,
                                    i = Math.max(1, r.width),
                                    a = Math.max(1, r.height);
                                D(i === t && a === n, "inconsistent width/height for supplied texture"), r.refCount += 1
                            } else {
                                var o = e.renderbuffer._renderbuffer;
                                D(o.width === t && o.height === n, "inconsistent width/height for renderbuffer"), o.refCount += 1
                            }
                    }

                    function m(t, n) {
                        n && (n.texture ? e.framebufferTexture2D(_n, t, n.target, n.texture._texture.texture, 0) : e.framebufferRenderbuffer(_n, t, yn, n.renderbuffer._renderbuffer.renderbuffer))
                    }

                    function h(e) {
                        var t = xn,
                            n = null,
                            r = null,
                            i = e;
                        "object" == typeof e && (i = e.data, "target" in e && (t = 0 | e.target)), D.type(i, "function", "invalid attachment data");
                        var a = i._reglType;
                        return "texture2d" === a ? (n = i, D(t === xn)) : "textureCube" === a ? (n = i, D(t >= wn && t < wn + 6, "invalid cube map target")) : "renderbuffer" === a ? (r = i, t = yn) : D.raise("invalid regl object for attachment"), new l(t, n, r)
                    }

                    function b(e, t, n, r, o) {
                        if (n) {
                            var u = i.create2D({
                                width: e,
                                height: t,
                                format: r,
                                type: o
                            });
                            return u._texture.refCount = 0, new l(xn, u, null)
                        }
                        var s = a.create({
                            width: e,
                            height: t,
                            format: r
                        });
                        return s._renderbuffer.refCount = 0, new l(yn, null, s)
                    }

                    function v(e) {
                        return e && (e.texture || e.renderbuffer)
                    }

                    function g(e, t, n) {
                        e && (e.texture ? e.texture.resize(t, n) : e.renderbuffer && e.renderbuffer.resize(t, n), e.width = t, e.height = n)
                    }
                    n.oes_texture_half_float && f.push("half float", "float16"), n.oes_texture_float && f.push("float", "float32");
                    var _ = 0,
                        y = {};

                    function x() {
                        this.id = _++, y[this.id] = this, this.framebuffer = e.createFramebuffer(), this.width = 0, this.height = 0, this.colorAttachments = [], this.depthAttachment = null, this.stencilAttachment = null, this.depthStencilAttachment = null
                    }

                    function w(e) {
                        e.colorAttachments.forEach(d), d(e.depthAttachment), d(e.stencilAttachment), d(e.depthStencilAttachment)
                    }

                    function k(t) {
                        var n = t.framebuffer;
                        D(n, "must not double destroy framebuffer"), e.deleteFramebuffer(n), t.framebuffer = null, o.framebufferCount--, delete y[t.id]
                    }

                    function A(t) {
                        var n;
                        e.bindFramebuffer(_n, t.framebuffer);
                        var i = t.colorAttachments;
                        for (n = 0; n < i.length; ++n) m(kn + n, i[n]);
                        for (n = i.length; n < r.maxColorAttachments; ++n) e.framebufferTexture2D(_n, kn + n, xn, null, 0);
                        e.framebufferTexture2D(_n, En, xn, null, 0), e.framebufferTexture2D(_n, An, xn, null, 0), e.framebufferTexture2D(_n, Sn, xn, null, 0), m(An, t.depthAttachment), m(Sn, t.stencilAttachment), m(En, t.depthStencilAttachment);
                        var a = e.checkFramebufferStatus(_n);
                        e.isContextLost() || a === Cn || D.raise("framebuffer configuration not supported, status = " + Ln[a]), e.bindFramebuffer(_n, u.next ? u.next.framebuffer : null), u.cur = u.next, e.getError()
                    }

                    function S(e, i) {
                        var a = new x;

                        function l(e, t) {
                            var i;
                            D(u.next !== a, "can not update framebuffer which is currently in use");
                            var o = 0,
                                d = 0,
                                m = !0,
                                g = !0,
                                _ = null,
                                y = !0,
                                x = "rgba",
                                k = "uint8",
                                S = 1,
                                E = null,
                                C = null,
                                O = null,
                                T = !1;
                            if ("number" == typeof e) o = 0 | e, d = 0 | t || o;
                            else if (e) {
                                D.type(e, "object", "invalid arguments for framebuffer");
                                var M = e;
                                if ("shape" in M) {
                                    var j = M.shape;
                                    D(Array.isArray(j) && j.length >= 2, "invalid shape for framebuffer"), o = j[0], d = j[1]
                                } else "radius" in M && (o = d = M.radius), "width" in M && (o = M.width), "height" in M && (d = M.height);
                                ("color" in M || "colors" in M) && (_ = M.color || M.colors, Array.isArray(_) && D(1 === _.length || n.webgl_draw_buffers, "multiple render targets not supported")), _ || ("colorCount" in M && (S = 0 | M.colorCount, D(S > 0, "invalid color buffer count")), "colorTexture" in M && (y = !!M.colorTexture, x = "rgba4"), "colorType" in M && (k = M.colorType, y ? (D(n.oes_texture_float || !("float" === k || "float32" === k), "you must enable OES_texture_float in order to use floating point framebuffer objects"), D(n.oes_texture_half_float || !("half float" === k || "float16" === k), "you must enable OES_texture_half_float in order to use 16-bit floating point framebuffer objects")) : "half float" === k || "float16" === k ? (D(n.ext_color_buffer_half_float, "you must enable EXT_color_buffer_half_float to use 16-bit render buffers"), x = "rgba16f") : "float" !== k && "float32" !== k || (D(n.webgl_color_buffer_float, "you must enable WEBGL_color_buffer_float in order to use 32-bit floating point renderbuffers"), x = "rgba32f"), D.oneOf(k, f, "invalid color type")), "colorFormat" in M && (x = M.colorFormat, s.indexOf(x) >= 0 ? y = !0 : c.indexOf(x) >= 0 ? y = !1 : y ? D.oneOf(M.colorFormat, s, "invalid color format for texture") : D.oneOf(M.colorFormat, c, "invalid color format for renderbuffer"))), ("depthTexture" in M || "depthStencilTexture" in M) && (T = !(!M.depthTexture && !M.depthStencilTexture), D(!T || n.webgl_depth_texture, "webgl_depth_texture extension not supported")), "depth" in M && ("boolean" == typeof M.depth ? m = M.depth : (E = M.depth, g = !1)), "stencil" in M && ("boolean" == typeof M.stencil ? g = M.stencil : (C = M.stencil, m = !1)), "depthStencil" in M && ("boolean" == typeof M.depthStencil ? m = g = M.depthStencil : (O = M.depthStencil, m = !1, g = !1))
                            } else o = d = 1;
                            var F = null,
                                R = null,
                                I = null,
                                L = null;
                            if (Array.isArray(_)) F = _.map(h);
                            else if (_) F = [h(_)];
                            else
                                for (F = new Array(S), i = 0; i < S; ++i) F[i] = b(o, d, y, x, k);
                            D(n.webgl_draw_buffers || F.length <= 1, "you must enable the WEBGL_draw_buffers extension in order to use multiple color buffers."), D(F.length <= r.maxColorAttachments, "too many color attachments, not supported"), o = o || F[0].width, d = d || F[0].height, E ? R = h(E) : m && !g && (R = b(o, d, T, "depth", "uint32")), C ? I = h(C) : g && !m && (I = b(o, d, !1, "stencil", "uint8")), O ? L = h(O) : !E && !C && g && m && (L = b(o, d, T, "depth stencil", "depth stencil")), D(!!E + !!C + !!O <= 1, "invalid framebuffer configuration, can specify exactly one depth/stencil attachment");
                            var B = null;
                            for (i = 0; i < F.length; ++i)
                                if (p(F[i], o, d), D(!F[i] || F[i].texture && Tn.indexOf(F[i].texture._texture.format) >= 0 || F[i].renderbuffer && In.indexOf(F[i].renderbuffer._renderbuffer.format) >= 0, "framebuffer color attachment " + i + " is invalid"), F[i] && F[i].texture) {
                                    var P = Mn[F[i].texture._texture.format] * jn[F[i].texture._texture.type];
                                    null === B ? B = P : D(B === P, "all color attachments much have the same number of bits per pixel.")
                                } return p(R, o, d), D(!R || R.texture && R.texture._texture.format === On || R.renderbuffer && R.renderbuffer._renderbuffer.format === Dn, "invalid depth attachment for framebuffer object"), p(I, o, d), D(!I || I.renderbuffer && I.renderbuffer._renderbuffer.format === Fn, "invalid stencil attachment for framebuffer object"), p(L, o, d), D(!L || L.texture && L.texture._texture.format === Rn || L.renderbuffer && L.renderbuffer._renderbuffer.format === Rn, "invalid depth-stencil attachment for framebuffer object"), w(a), a.width = o, a.height = d, a.colorAttachments = F, a.depthAttachment = R, a.stencilAttachment = I, a.depthStencilAttachment = L, l.color = F.map(v), l.depth = v(R), l.stencil = v(I), l.depthStencil = v(L), l.width = a.width, l.height = a.height, A(a), l
                        }
                        return o.framebufferCount++, l(e, i), t(l, {
                            resize: function (e, t) {
                                D(u.next !== a, "can not resize a framebuffer which is currently in use");
                                var n = Math.max(0 | e, 1),
                                    r = Math.max(0 | t || n, 1);
                                if (n === a.width && r === a.height) return l;
                                for (var i = a.colorAttachments, o = 0; o < i.length; ++o) g(i[o], n, r);
                                return g(a.depthAttachment, n, r), g(a.stencilAttachment, n, r), g(a.depthStencilAttachment, n, r), a.width = l.width = n, a.height = l.height = r, A(a), l
                            },
                            _reglType: "framebuffer",
                            _framebuffer: a,
                            destroy: function () {
                                k(a), w(a)
                            },
                            use: function (e) {
                                u.setFBO({
                                    framebuffer: l
                                }, e)
                            }
                        })
                    }
                    return t(u, {
                        getFramebuffer: function (e) {
                            if ("function" == typeof e && "framebuffer" === e._reglType) {
                                var t = e._framebuffer;
                                if (t instanceof x) return t
                            }
                            return null
                        },
                        create: S,
                        createCube: function (e) {
                            var a = Array(6);

                            function o(e) {
                                var r;
                                D(a.indexOf(u.next) < 0, "can not update framebuffer which is currently in use");
                                var c, l = {
                                        color: null
                                    },
                                    d = 0,
                                    p = null,
                                    m = "rgba",
                                    h = "uint8",
                                    b = 1;
                                if ("number" == typeof e) d = 0 | e;
                                else if (e) {
                                    D.type(e, "object", "invalid arguments for framebuffer");
                                    var v = e;
                                    if ("shape" in v) {
                                        var g = v.shape;
                                        D(Array.isArray(g) && g.length >= 2, "invalid shape for framebuffer"), D(g[0] === g[1], "cube framebuffer must be square"), d = g[0]
                                    } else "radius" in v && (d = 0 | v.radius), "width" in v ? (d = 0 | v.width, "height" in v && D(v.height === d, "must be square")) : "height" in v && (d = 0 | v.height);
                                    ("color" in v || "colors" in v) && (p = v.color || v.colors, Array.isArray(p) && D(1 === p.length || n.webgl_draw_buffers, "multiple render targets not supported")), p || ("colorCount" in v && (b = 0 | v.colorCount, D(b > 0, "invalid color buffer count")), "colorType" in v && (D.oneOf(v.colorType, f, "invalid color type"), h = v.colorType), "colorFormat" in v && (m = v.colorFormat, D.oneOf(v.colorFormat, s, "invalid color format for texture"))), "depth" in v && (l.depth = v.depth), "stencil" in v && (l.stencil = v.stencil), "depthStencil" in v && (l.depthStencil = v.depthStencil)
                                } else d = 1;
                                if (p)
                                    if (Array.isArray(p))
                                        for (c = [], r = 0; r < p.length; ++r) c[r] = p[r];
                                    else c = [p];
                                else {
                                    c = Array(b);
                                    var _ = {
                                        radius: d,
                                        format: m,
                                        type: h
                                    };
                                    for (r = 0; r < b; ++r) c[r] = i.createCube(_)
                                }
                                for (l.color = Array(c.length), r = 0; r < c.length; ++r) {
                                    var y = c[r];
                                    D("function" == typeof y && "textureCube" === y._reglType, "invalid cube map"), d = d || y.width, D(y.width === d && y.height === d, "invalid cube map shape"), l.color[r] = {
                                        target: wn,
                                        data: c[r]
                                    }
                                }
                                for (r = 0; r < 6; ++r) {
                                    for (var x = 0; x < c.length; ++x) l.color[x].target = wn + r;
                                    r > 0 && (l.depth = a[0].depth, l.stencil = a[0].stencil, l.depthStencil = a[0].depthStencil), a[r] ? a[r](l) : a[r] = S(l)
                                }
                                return t(o, {
                                    width: d,
                                    height: d,
                                    color: c
                                })
                            }
                            return o(e), t(o, {
                                faces: a,
                                resize: function (e) {
                                    var t, n = 0 | e;
                                    if (D(n > 0 && n <= r.maxCubeMapSize, "invalid radius for cube fbo"), n === o.width) return o;
                                    var i = o.color;
                                    for (t = 0; t < i.length; ++t) i[t].resize(n);
                                    for (t = 0; t < 6; ++t) a[t].resize(n);
                                    return o.width = o.height = n, o
                                },
                                _reglType: "framebufferCube",
                                destroy: function () {
                                    a.forEach((function (e) {
                                        e.destroy()
                                    }))
                                }
                            })
                        },
                        clear: function () {
                            re(y).forEach(k)
                        },
                        restore: function () {
                            u.cur = null, u.next = null, u.dirty = !0, re(y).forEach((function (t) {
                                t.framebuffer = e.createFramebuffer(), A(t)
                            }))
                        }
                    })
                }(i, d, g, k, A, l),
                E = Ji(i, f, d, g, y, x, 0, S, {}, _, w, {
                    elements: null,
                    primitive: 4,
                    count: -1,
                    offset: 0,
                    instances: -1
                }, v, p, r),
                C = Xn(i, S, E.procs.poll, v, a, d, g),
                O = E.next,
                T = i.canvas,
                M = [],
                j = [],
                F = [],
                R = [r.onDestroy],
                I = null;

            function L() {
                if (0 === M.length) return p && p.update(), void(I = null);
                I = z.next(L), K();
                for (var e = M.length - 1; e >= 0; --e) {
                    var t = M[e];
                    t && t(v, null, 0)
                }
                i.flush(), p && p.update()
            }

            function B() {
                !I && M.length > 0 && (I = z.next(L))
            }

            function H() {
                I && (z.cancel(L), I = null)
            }

            function U(e) {
                e.preventDefault(), o = !0, H(), j.forEach((function (e) {
                    e()
                }))
            }

            function G(e) {
                i.getError(), o = !1, u.restore(), w.restore(), y.restore(), k.restore(), A.restore(), S.restore(), p && p.restore(), E.procs.refresh(), B(), F.forEach((function (e) {
                    e()
                }))
            }

            function W(e) {
                function n(e) {
                    var t = {},
                        n = {};
                    return Object.keys(e).forEach((function (r) {
                        var i = e[r];
                        P.isDynamic(i) ? n[r] = P.unbox(i, r) : t[r] = i
                    })), {
                        dynamic: n,
                        static: t
                    }
                }
                D(!!e, "invalid args to regl({...})"), D.type(e, "object", "invalid args to regl({...})");
                var r = n(e.context || {}),
                    i = n(e.uniforms || {}),
                    a = n(e.attributes || {}),
                    u = n(function (e) {
                        var n = t({}, e);

                        function r(e) {
                            if (e in n) {
                                var t = n[e];
                                delete n[e], Object.keys(t).forEach((function (r) {
                                    n[e + "." + r] = t[r]
                                }))
                            }
                        }
                        return delete n.uniforms, delete n.attributes, delete n.context, "stencil" in n && n.stencil.op && (n.stencil.opBack = n.stencil.opFront = n.stencil.op, delete n.stencil.op), r("blend"), r("depth"), r("cull"), r("stencil"), r("polygonOffset"), r("scissor"), r("sample"), n
                    }(e)),
                    s = {
                        gpuTime: 0,
                        cpuTime: 0,
                        count: 0
                    },
                    c = E.compile(u, a, i, r, s),
                    f = c.draw,
                    l = c.batch,
                    d = c.scope,
                    p = [];
                return t((function (e, t) {
                    var n;
                    if (o && D.raise("context lost"), "function" == typeof e) return d.call(this, null, e, 0);
                    if ("function" == typeof t) {
                        if ("number" == typeof e) {
                            for (n = 0; n < e; ++n) d.call(this, null, t, n);
                            return
                        }
                        if (Array.isArray(e)) {
                            for (n = 0; n < e.length; ++n) d.call(this, e[n], t, n);
                            return
                        }
                        return d.call(this, e, t, 0)
                    }
                    if ("number" == typeof e) {
                        if (e > 0) return l.call(this, function (e) {
                            for (; p.length < e;) p.push(null);
                            return p
                        }(0 | e), 0 | e)
                    } else {
                        if (!Array.isArray(e)) return f.call(this, e);
                        if (e.length) return l.call(this, e, e.length)
                    }
                }), {
                    stats: s
                })
            }
            T && (T.addEventListener(ua, U, !1), T.addEventListener(sa, G, !1));
            var Y = S.setFBO = W({
                framebuffer: P.define.call(null, ca, "framebuffer")
            });

            function X(e, t) {
                var n = 0;
                E.procs.poll();
                var r = t.color;
                r && (i.clearColor(+r[0] || 0, +r[1] || 0, +r[2] || 0, +r[3] || 0), n |= ra), "depth" in t && (i.clearDepth(+t.depth), n |= ia), "stencil" in t && (i.clearStencil(0 | t.stencil), n |= aa), D(!!n, "called regl.clear with no buffer specified"), i.clear(n)
            }

            function q(e) {
                return D.type(e, "function", "regl.frame() callback must be a function"), M.push(e), B(), {
                    cancel: function () {
                        var t = da(M, e);
                        D(t >= 0, "cannot cancel a frame twice"), M[t] = function e() {
                            var t = da(M, e);
                            M[t] = M[M.length - 1], M.length -= 1, M.length <= 0 && H()
                        }
                    }
                }
            }

            function Q() {
                var e = O.viewport,
                    t = O.scissor_box;
                e[0] = e[1] = t[0] = t[1] = 0, v.viewportWidth = v.framebufferWidth = v.drawingBufferWidth = e[2] = t[2] = i.drawingBufferWidth, v.viewportHeight = v.framebufferHeight = v.drawingBufferHeight = e[3] = t[3] = i.drawingBufferHeight
            }

            function K() {
                v.tick += 1, v.time = J(), Q(), E.procs.poll()
            }

            function Z() {
                Q(), E.procs.refresh(), p && p.update()
            }

            function J() {
                return (N() - m) / 1e3
            }
            Z();
            var $ = t(W, {
                clear: function (e) {
                    if (D("object" == typeof e && e, "regl.clear() takes an object as input"), "framebuffer" in e)
                        if (e.framebuffer && "framebufferCube" === e.framebuffer_reglType)
                            for (var n = 0; n < 6; ++n) Y(t({
                                framebuffer: e.framebuffer.faces[n]
                            }, e), X);
                        else Y(e, X);
                    else X(0, e)
                },
                prop: P.define.bind(null, ca),
                context: P.define.bind(null, fa),
                this: P.define.bind(null, la),
                draw: W({}),
                buffer: function (e) {
                    return y.create(e, oa, !1, !1)
                },
                elements: function (e) {
                    return x.create(e, !1)
                },
                texture: k.create2D,
                cube: k.createCube,
                renderbuffer: A.create,
                framebuffer: S.create,
                framebufferCube: S.createCube,
                attributes: a,
                frame: q,
                on: function (e, t) {
                    var n;
                    switch (D.type(t, "function", "listener callback must be a function"), e) {
                        case "frame":
                            return q(t);
                        case "lost":
                            n = j;
                            break;
                        case "restore":
                            n = F;
                            break;
                        case "destroy":
                            n = R;
                            break;
                        default:
                            D.raise("invalid event, must be one of frame,lost,restore,destroy")
                    }
                    return n.push(t), {
                        cancel: function () {
                            for (var e = 0; e < n.length; ++e)
                                if (n[e] === t) return n[e] = n[n.length - 1], void n.pop()
                        }
                    }
                },
                limits: g,
                hasExtension: function (e) {
                    return g.extensions.indexOf(e.toLowerCase()) >= 0
                },
                read: C,
                destroy: function () {
                    M.length = 0, H(), T && (T.removeEventListener(ua, U), T.removeEventListener(sa, G)), w.clear(), S.clear(), A.clear(), k.clear(), x.clear(), y.clear(), p && p.clear(), R.forEach((function (e) {
                        e()
                    }))
                },
                _gl: i,
                _refresh: Z,
                poll: function () {
                    K(), p && p.update()
                },
                now: J,
                stats: l
            });
            return r.onDone(null, $), $
        }
    }()
}, , , , , , , , function (e, t, n) {
    "use strict";
    e.exports = e => encodeURIComponent(e).replace(/[!'()*]/g, e => `%${e.charCodeAt(0).toString(16).toUpperCase()}`)
}, function (e, t, n) {
    "use strict";
    var r = new RegExp("%[a-f0-9]{2}", "gi"),
        i = new RegExp("(%[a-f0-9]{2})+", "gi");

    function a(e, t) {
        try {
            return decodeURIComponent(e.join(""))
        } catch (e) {}
        if (1 === e.length) return e;
        t = t || 1;
        var n = e.slice(0, t),
            r = e.slice(t);
        return Array.prototype.concat.call([], a(n), a(r))
    }

    function o(e) {
        try {
            return decodeURIComponent(e)
        } catch (i) {
            for (var t = e.match(r), n = 1; n < t.length; n++) t = (e = a(t, n).join("")).match(r);
            return e
        }
    }
    e.exports = function (e) {
        if ("string" != typeof e) throw new TypeError("Expected `encodedURI` to be of type `string`, got `" + typeof e + "`");
        try {
            return e = e.replace(/\+/g, " "), decodeURIComponent(e)
        } catch (t) {
            return function (e) {
                for (var t = {
                        "%FE%FF": "��",
                        "%FF%FE": "��"
                    }, n = i.exec(e); n;) {
                    try {
                        t[n[0]] = decodeURIComponent(n[0])
                    } catch (e) {
                        var r = o(n[0]);
                        r !== n[0] && (t[n[0]] = r)
                    }
                    n = i.exec(e)
                }
                t["%C2"] = "�";
                for (var a = Object.keys(t), u = 0; u < a.length; u++) {
                    var s = a[u];
                    e = e.replace(new RegExp(s, "g"), t[s])
                }
                return e
            }(e)
        }
    }
}, function (e, t, n) {
    "use strict";
    e.exports = (e, t) => {
        if ("string" != typeof e || "string" != typeof t) throw new TypeError("Expected the arguments to be of type `string`");
        if ("" === t) return [e];
        const n = e.indexOf(t);
        return -1 === n ? [e] : [e.slice(0, n), e.slice(n + t.length)]
    }
}, function (e, t, n) {
    var r = {
        "./logo.png": 14,
        "./text-1.png": 15,
        "./text-2.png": 16
    };

    function i(e) {
        var t = a(e);
        return n(t)
    }

    function a(e) {
        if (!n.o(r, e)) {
            var t = new Error("Cannot find module '" + e + "'");
            throw t.code = "MODULE_NOT_FOUND", t
        }
        return r[e]
    }
    i.keys = function () {
        return Object.keys(r)
    }, i.resolve = a, e.exports = i, i.id = 13
}, function (e, t, n) {
    e.exports = n.p + "140c4fbc273d7f58a9b5a5a9fa229234.png"
}, function (e, t, n) {
    e.exports = n.p + "4e806def1bcd075b3d490c9e5accc7ac.png"
}, function (e, t, n) {
    e.exports = n.p + "7f975efdfbc3b72ae950634ebe6bc2c0.png"
}, function (e, t, n) {
    var r = n(18);
    "string" == typeof r && (r = [
        [e.i, r, ""]
    ]);
    var i = {
        insert: "head",
        singleton: !1
    };
    n(20)(r, i);
    r.locals && (e.exports = r.locals)
}, function (e, t, n) {
    (e.exports = n(19)(!1)).push([e.i, "", ""])
}, function (e, t, n) {
    "use strict";
    e.exports = function (e) {
        var t = [];
        return t.toString = function () {
            return this.map((function (t) {
                var n = function (e, t) {
                    var n = e[1] || "",
                        r = e[3];
                    if (!r) return n;
                    if (t && "function" == typeof btoa) {
                        var i = (o = r, u = btoa(unescape(encodeURIComponent(JSON.stringify(o)))), s = "sourceMappingURL=data:application/json;charset=utf-8;base64,".concat(u), "/*# ".concat(s, " */")),
                            a = r.sources.map((function (e) {
                                return "/*# sourceURL=".concat(r.sourceRoot).concat(e, " */")
                            }));
                        return [n].concat(a).concat([i]).join("\n")
                    }
                    var o, u, s;
                    return [n].join("\n")
                }(t, e);
                return t[2] ? "@media ".concat(t[2], "{").concat(n, "}") : n
            })).join("")
        }, t.i = function (e, n) {
            "string" == typeof e && (e = [
                [null, e, ""]
            ]);
            for (var r = {}, i = 0; i < this.length; i++) {
                var a = this[i][0];
                null != a && (r[a] = !0)
            }
            for (var o = 0; o < e.length; o++) {
                var u = e[o];
                null != u[0] && r[u[0]] || (n && !u[2] ? u[2] = n : n && (u[2] = "(".concat(u[2], ") and (").concat(n, ")")), t.push(u))
            }
        }, t
    }
}, function (e, t, n) {
    "use strict";
    var r, i = {},
        a = function () {
            return void 0 === r && (r = Boolean(window && document && document.all && !window.atob)), r
        },
        o = function () {
            var e = {};
            return function (t) {
                if (void 0 === e[t]) {
                    var n = document.querySelector(t);
                    if (window.HTMLIFrameElement && n instanceof window.HTMLIFrameElement) try {
                        n = n.contentDocument.head
                    } catch (e) {
                        n = null
                    }
                    e[t] = n
                }
                return e[t]
            }
        }();

    function u(e, t) {
        for (var n = [], r = {}, i = 0; i < e.length; i++) {
            var a = e[i],
                o = t.base ? a[0] + t.base : a[0],
                u = {
                    css: a[1],
                    media: a[2],
                    sourceMap: a[3]
                };
            r[o] ? r[o].parts.push(u) : n.push(r[o] = {
                id: o,
                parts: [u]
            })
        }
        return n
    }

    function s(e, t) {
        for (var n = 0; n < e.length; n++) {
            var r = e[n],
                a = i[r.id],
                o = 0;
            if (a) {
                for (a.refs++; o < a.parts.length; o++) a.parts[o](r.parts[o]);
                for (; o < r.parts.length; o++) a.parts.push(b(r.parts[o], t))
            } else {
                for (var u = []; o < r.parts.length; o++) u.push(b(r.parts[o], t));
                i[r.id] = {
                    id: r.id,
                    refs: 1,
                    parts: u
                }
            }
        }
    }

    function c(e) {
        var t = document.createElement("style");
        if (void 0 === e.attributes.nonce) {
            var r = n.nc;
            r && (e.attributes.nonce = r)
        }
        if (Object.keys(e.attributes).forEach((function (n) {
                t.setAttribute(n, e.attributes[n])
            })), "function" == typeof e.insert) e.insert(t);
        else {
            var i = o(e.insert || "head");
            if (!i) throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");
            i.appendChild(t)
        }
        return t
    }
    var f, l = (f = [], function (e, t) {
        return f[e] = t, f.filter(Boolean).join("\n")
    });

    function d(e, t, n, r) {
        var i = n ? "" : r.css;
        if (e.styleSheet) e.styleSheet.cssText = l(t, i);
        else {
            var a = document.createTextNode(i),
                o = e.childNodes;
            o[t] && e.removeChild(o[t]), o.length ? e.insertBefore(a, o[t]) : e.appendChild(a)
        }
    }

    function p(e, t, n) {
        var r = n.css,
            i = n.media,
            a = n.sourceMap;
        if (i && e.setAttribute("media", i), a && btoa && (r += "\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(a)))), " */")), e.styleSheet) e.styleSheet.cssText = r;
        else {
            for (; e.firstChild;) e.removeChild(e.firstChild);
            e.appendChild(document.createTextNode(r))
        }
    }
    var m = null,
        h = 0;

    function b(e, t) {
        var n, r, i;
        if (t.singleton) {
            var a = h++;
            n = m || (m = c(t)), r = d.bind(null, n, a, !1), i = d.bind(null, n, a, !0)
        } else n = c(t), r = p.bind(null, n, t), i = function () {
            ! function (e) {
                if (null === e.parentNode) return !1;
                e.parentNode.removeChild(e)
            }(n)
        };
        return r(e),
            function (t) {
                if (t) {
                    if (t.css === e.css && t.media === e.media && t.sourceMap === e.sourceMap) return;
                    r(e = t)
                } else i()
            }
    }
    e.exports = function (e, t) {
        (t = t || {}).attributes = "object" == typeof t.attributes ? t.attributes : {}, t.singleton || "boolean" == typeof t.singleton || (t.singleton = a());
        var n = u(e, t);
        return s(n, t),
            function (e) {
                for (var r = [], a = 0; a < n.length; a++) {
                    var o = n[a],
                        c = i[o.id];
                    c && (c.refs--, r.push(c))
                }
                e && s(u(e, t), t);
                for (var f = 0; f < r.length; f++) {
                    var l = r[f];
                    if (0 === l.refs) {
                        for (var d = 0; d < l.parts.length; d++) l.parts[d]();
                        delete i[l.id]
                    }
                }
            }
    }
}, function (e, t, n) {
    "use strict";
    n.r(t);
    var r = {};
    n.r(r), n.d(r, "create", (function () {
        return s
    })), n.d(r, "clone", (function () {
        return c
    })), n.d(r, "copy", (function () {
        return f
    })), n.d(r, "fromValues", (function () {
        return l
    })), n.d(r, "set", (function () {
        return d
    })), n.d(r, "identity", (function () {
        return p
    })), n.d(r, "transpose", (function () {
        return m
    })), n.d(r, "invert", (function () {
        return h
    })), n.d(r, "adjoint", (function () {
        return b
    })), n.d(r, "determinant", (function () {
        return v
    })), n.d(r, "multiply", (function () {
        return g
    })), n.d(r, "translate", (function () {
        return _
    })), n.d(r, "scale", (function () {
        return y
    })), n.d(r, "rotate", (function () {
        return x
    })), n.d(r, "rotateX", (function () {
        return w
    })), n.d(r, "rotateY", (function () {
        return k
    })), n.d(r, "rotateZ", (function () {
        return A
    })), n.d(r, "fromTranslation", (function () {
        return S
    })), n.d(r, "fromScaling", (function () {
        return E
    })), n.d(r, "fromRotation", (function () {
        return C
    })), n.d(r, "fromXRotation", (function () {
        return O
    })), n.d(r, "fromYRotation", (function () {
        return T
    })), n.d(r, "fromZRotation", (function () {
        return M
    })), n.d(r, "fromRotationTranslation", (function () {
        return j
    })), n.d(r, "fromQuat2", (function () {
        return D
    })), n.d(r, "getTranslation", (function () {
        return F
    })), n.d(r, "getScaling", (function () {
        return R
    })), n.d(r, "getRotation", (function () {
        return I
    })), n.d(r, "fromRotationTranslationScale", (function () {
        return L
    })), n.d(r, "fromRotationTranslationScaleOrigin", (function () {
        return B
    })), n.d(r, "fromQuat", (function () {
        return P
    })), n.d(r, "frustum", (function () {
        return z
    })), n.d(r, "perspective", (function () {
        return N
    })), n.d(r, "perspectiveFromFieldOfView", (function () {
        return H
    })), n.d(r, "ortho", (function () {
        return U
    })), n.d(r, "lookAt", (function () {
        return V
    })), n.d(r, "targetTo", (function () {
        return G
    })), n.d(r, "str", (function () {
        return W
    })), n.d(r, "frob", (function () {
        return Y
    })), n.d(r, "add", (function () {
        return X
    })), n.d(r, "subtract", (function () {
        return q
    })), n.d(r, "multiplyScalar", (function () {
        return Q
    })), n.d(r, "multiplyScalarAndAdd", (function () {
        return K
    })), n.d(r, "exactEquals", (function () {
        return Z
    })), n.d(r, "equals", (function () {
        return J
    })), n.d(r, "mul", (function () {
        return $
    })), n.d(r, "sub", (function () {
        return ee
    }));
    var i = {};
    n.r(i), n.d(i, "create", (function () {
        return te
    })), n.d(i, "clone", (function () {
        return ne
    })), n.d(i, "length", (function () {
        return re
    })), n.d(i, "fromValues", (function () {
        return ie
    })), n.d(i, "copy", (function () {
        return ae
    })), n.d(i, "set", (function () {
        return oe
    })), n.d(i, "add", (function () {
        return ue
    })), n.d(i, "subtract", (function () {
        return se
    })), n.d(i, "multiply", (function () {
        return ce
    })), n.d(i, "divide", (function () {
        return fe
    })), n.d(i, "ceil", (function () {
        return le
    })), n.d(i, "floor", (function () {
        return de
    })), n.d(i, "min", (function () {
        return pe
    })), n.d(i, "max", (function () {
        return me
    })), n.d(i, "round", (function () {
        return he
    })), n.d(i, "scale", (function () {
        return be
    })), n.d(i, "scaleAndAdd", (function () {
        return ve
    })), n.d(i, "distance", (function () {
        return ge
    })), n.d(i, "squaredDistance", (function () {
        return _e
    })), n.d(i, "squaredLength", (function () {
        return ye
    })), n.d(i, "negate", (function () {
        return xe
    })), n.d(i, "inverse", (function () {
        return we
    })), n.d(i, "normalize", (function () {
        return ke
    })), n.d(i, "dot", (function () {
        return Ae
    })), n.d(i, "cross", (function () {
        return Se
    })), n.d(i, "lerp", (function () {
        return Ee
    })), n.d(i, "hermite", (function () {
        return Ce
    })), n.d(i, "bezier", (function () {
        return Oe
    })), n.d(i, "random", (function () {
        return Te
    })), n.d(i, "transformMat4", (function () {
        return Me
    })), n.d(i, "transformMat3", (function () {
        return je
    })), n.d(i, "transformQuat", (function () {
        return De
    })), n.d(i, "rotateX", (function () {
        return Fe
    })), n.d(i, "rotateY", (function () {
        return Re
    })), n.d(i, "rotateZ", (function () {
        return Ie
    })), n.d(i, "angle", (function () {
        return Le
    })), n.d(i, "zero", (function () {
        return Be
    })), n.d(i, "str", (function () {
        return Pe
    })), n.d(i, "exactEquals", (function () {
        return ze
    })), n.d(i, "equals", (function () {
        return Ne
    })), n.d(i, "sub", (function () {
        return Ve
    })), n.d(i, "mul", (function () {
        return Ge
    })), n.d(i, "div", (function () {
        return We
    })), n.d(i, "dist", (function () {
        return Ye
    })), n.d(i, "sqrDist", (function () {
        return Xe
    })), n.d(i, "len", (function () {
        return qe
    })), n.d(i, "sqrLen", (function () {
        return Qe
    })), n.d(i, "forEach", (function () {
        return Ke
    }));
    var a = 1e-6,
        o = "undefined" != typeof Float32Array ? Float32Array : Array,
        u = Math.random;
    Math.PI;

    function s() {
        var e = new o(16);
        return o != Float32Array && (e[1] = 0, e[2] = 0, e[3] = 0, e[4] = 0, e[6] = 0, e[7] = 0, e[8] = 0, e[9] = 0, e[11] = 0, e[12] = 0, e[13] = 0, e[14] = 0), e[0] = 1, e[5] = 1, e[10] = 1, e[15] = 1, e
    }

    function c(e) {
        var t = new o(16);
        return t[0] = e[0], t[1] = e[1], t[2] = e[2], t[3] = e[3], t[4] = e[4], t[5] = e[5], t[6] = e[6], t[7] = e[7], t[8] = e[8], t[9] = e[9], t[10] = e[10], t[11] = e[11], t[12] = e[12], t[13] = e[13], t[14] = e[14], t[15] = e[15], t
    }

    function f(e, t) {
        return e[0] = t[0], e[1] = t[1], e[2] = t[2], e[3] = t[3], e[4] = t[4], e[5] = t[5], e[6] = t[6], e[7] = t[7], e[8] = t[8], e[9] = t[9], e[10] = t[10], e[11] = t[11], e[12] = t[12], e[13] = t[13], e[14] = t[14], e[15] = t[15], e
    }

    function l(e, t, n, r, i, a, u, s, c, f, l, d, p, m, h, b) {
        var v = new o(16);
        return v[0] = e, v[1] = t, v[2] = n, v[3] = r, v[4] = i, v[5] = a, v[6] = u, v[7] = s, v[8] = c, v[9] = f, v[10] = l, v[11] = d, v[12] = p, v[13] = m, v[14] = h, v[15] = b, v
    }

    function d(e, t, n, r, i, a, o, u, s, c, f, l, d, p, m, h, b) {
        return e[0] = t, e[1] = n, e[2] = r, e[3] = i, e[4] = a, e[5] = o, e[6] = u, e[7] = s, e[8] = c, e[9] = f, e[10] = l, e[11] = d, e[12] = p, e[13] = m, e[14] = h, e[15] = b, e
    }

    function p(e) {
        return e[0] = 1, e[1] = 0, e[2] = 0, e[3] = 0, e[4] = 0, e[5] = 1, e[6] = 0, e[7] = 0, e[8] = 0, e[9] = 0, e[10] = 1, e[11] = 0, e[12] = 0, e[13] = 0, e[14] = 0, e[15] = 1, e
    }

    function m(e, t) {
        if (e === t) {
            var n = t[1],
                r = t[2],
                i = t[3],
                a = t[6],
                o = t[7],
                u = t[11];
            e[1] = t[4], e[2] = t[8], e[3] = t[12], e[4] = n, e[6] = t[9], e[7] = t[13], e[8] = r, e[9] = a, e[11] = t[14], e[12] = i, e[13] = o, e[14] = u
        } else e[0] = t[0], e[1] = t[4], e[2] = t[8], e[3] = t[12], e[4] = t[1], e[5] = t[5], e[6] = t[9], e[7] = t[13], e[8] = t[2], e[9] = t[6], e[10] = t[10], e[11] = t[14], e[12] = t[3], e[13] = t[7], e[14] = t[11], e[15] = t[15];
        return e
    }

    function h(e, t) {
        var n = t[0],
            r = t[1],
            i = t[2],
            a = t[3],
            o = t[4],
            u = t[5],
            s = t[6],
            c = t[7],
            f = t[8],
            l = t[9],
            d = t[10],
            p = t[11],
            m = t[12],
            h = t[13],
            b = t[14],
            v = t[15],
            g = n * u - r * o,
            _ = n * s - i * o,
            y = n * c - a * o,
            x = r * s - i * u,
            w = r * c - a * u,
            k = i * c - a * s,
            A = f * h - l * m,
            S = f * b - d * m,
            E = f * v - p * m,
            C = l * b - d * h,
            O = l * v - p * h,
            T = d * v - p * b,
            M = g * T - _ * O + y * C + x * E - w * S + k * A;
        return M ? (M = 1 / M, e[0] = (u * T - s * O + c * C) * M, e[1] = (i * O - r * T - a * C) * M, e[2] = (h * k - b * w + v * x) * M, e[3] = (d * w - l * k - p * x) * M, e[4] = (s * E - o * T - c * S) * M, e[5] = (n * T - i * E + a * S) * M, e[6] = (b * y - m * k - v * _) * M, e[7] = (f * k - d * y + p * _) * M, e[8] = (o * O - u * E + c * A) * M, e[9] = (r * E - n * O - a * A) * M, e[10] = (m * w - h * y + v * g) * M, e[11] = (l * y - f * w - p * g) * M, e[12] = (u * S - o * C - s * A) * M, e[13] = (n * C - r * S + i * A) * M, e[14] = (h * _ - m * x - b * g) * M, e[15] = (f * x - l * _ + d * g) * M, e) : null
    }

    function b(e, t) {
        var n = t[0],
            r = t[1],
            i = t[2],
            a = t[3],
            o = t[4],
            u = t[5],
            s = t[6],
            c = t[7],
            f = t[8],
            l = t[9],
            d = t[10],
            p = t[11],
            m = t[12],
            h = t[13],
            b = t[14],
            v = t[15];
        return e[0] = u * (d * v - p * b) - l * (s * v - c * b) + h * (s * p - c * d), e[1] = -(r * (d * v - p * b) - l * (i * v - a * b) + h * (i * p - a * d)), e[2] = r * (s * v - c * b) - u * (i * v - a * b) + h * (i * c - a * s), e[3] = -(r * (s * p - c * d) - u * (i * p - a * d) + l * (i * c - a * s)), e[4] = -(o * (d * v - p * b) - f * (s * v - c * b) + m * (s * p - c * d)), e[5] = n * (d * v - p * b) - f * (i * v - a * b) + m * (i * p - a * d), e[6] = -(n * (s * v - c * b) - o * (i * v - a * b) + m * (i * c - a * s)), e[7] = n * (s * p - c * d) - o * (i * p - a * d) + f * (i * c - a * s), e[8] = o * (l * v - p * h) - f * (u * v - c * h) + m * (u * p - c * l), e[9] = -(n * (l * v - p * h) - f * (r * v - a * h) + m * (r * p - a * l)), e[10] = n * (u * v - c * h) - o * (r * v - a * h) + m * (r * c - a * u), e[11] = -(n * (u * p - c * l) - o * (r * p - a * l) + f * (r * c - a * u)), e[12] = -(o * (l * b - d * h) - f * (u * b - s * h) + m * (u * d - s * l)), e[13] = n * (l * b - d * h) - f * (r * b - i * h) + m * (r * d - i * l), e[14] = -(n * (u * b - s * h) - o * (r * b - i * h) + m * (r * s - i * u)), e[15] = n * (u * d - s * l) - o * (r * d - i * l) + f * (r * s - i * u), e
    }

    function v(e) {
        var t = e[0],
            n = e[1],
            r = e[2],
            i = e[3],
            a = e[4],
            o = e[5],
            u = e[6],
            s = e[7],
            c = e[8],
            f = e[9],
            l = e[10],
            d = e[11],
            p = e[12],
            m = e[13],
            h = e[14],
            b = e[15];
        return (t * o - n * a) * (l * b - d * h) - (t * u - r * a) * (f * b - d * m) + (t * s - i * a) * (f * h - l * m) + (n * u - r * o) * (c * b - d * p) - (n * s - i * o) * (c * h - l * p) + (r * s - i * u) * (c * m - f * p)
    }

    function g(e, t, n) {
        var r = t[0],
            i = t[1],
            a = t[2],
            o = t[3],
            u = t[4],
            s = t[5],
            c = t[6],
            f = t[7],
            l = t[8],
            d = t[9],
            p = t[10],
            m = t[11],
            h = t[12],
            b = t[13],
            v = t[14],
            g = t[15],
            _ = n[0],
            y = n[1],
            x = n[2],
            w = n[3];
        return e[0] = _ * r + y * u + x * l + w * h, e[1] = _ * i + y * s + x * d + w * b, e[2] = _ * a + y * c + x * p + w * v, e[3] = _ * o + y * f + x * m + w * g, _ = n[4], y = n[5], x = n[6], w = n[7], e[4] = _ * r + y * u + x * l + w * h, e[5] = _ * i + y * s + x * d + w * b, e[6] = _ * a + y * c + x * p + w * v, e[7] = _ * o + y * f + x * m + w * g, _ = n[8], y = n[9], x = n[10], w = n[11], e[8] = _ * r + y * u + x * l + w * h, e[9] = _ * i + y * s + x * d + w * b, e[10] = _ * a + y * c + x * p + w * v, e[11] = _ * o + y * f + x * m + w * g, _ = n[12], y = n[13], x = n[14], w = n[15], e[12] = _ * r + y * u + x * l + w * h, e[13] = _ * i + y * s + x * d + w * b, e[14] = _ * a + y * c + x * p + w * v, e[15] = _ * o + y * f + x * m + w * g, e
    }

    function _(e, t, n) {
        var r, i, a, o, u, s, c, f, l, d, p, m, h = n[0],
            b = n[1],
            v = n[2];
        return t === e ? (e[12] = t[0] * h + t[4] * b + t[8] * v + t[12], e[13] = t[1] * h + t[5] * b + t[9] * v + t[13], e[14] = t[2] * h + t[6] * b + t[10] * v + t[14], e[15] = t[3] * h + t[7] * b + t[11] * v + t[15]) : (r = t[0], i = t[1], a = t[2], o = t[3], u = t[4], s = t[5], c = t[6], f = t[7], l = t[8], d = t[9], p = t[10], m = t[11], e[0] = r, e[1] = i, e[2] = a, e[3] = o, e[4] = u, e[5] = s, e[6] = c, e[7] = f, e[8] = l, e[9] = d, e[10] = p, e[11] = m, e[12] = r * h + u * b + l * v + t[12], e[13] = i * h + s * b + d * v + t[13], e[14] = a * h + c * b + p * v + t[14], e[15] = o * h + f * b + m * v + t[15]), e
    }

    function y(e, t, n) {
        var r = n[0],
            i = n[1],
            a = n[2];
        return e[0] = t[0] * r, e[1] = t[1] * r, e[2] = t[2] * r, e[3] = t[3] * r, e[4] = t[4] * i, e[5] = t[5] * i, e[6] = t[6] * i, e[7] = t[7] * i, e[8] = t[8] * a, e[9] = t[9] * a, e[10] = t[10] * a, e[11] = t[11] * a, e[12] = t[12], e[13] = t[13], e[14] = t[14], e[15] = t[15], e
    }

    function x(e, t, n, r) {
        var i, o, u, s, c, f, l, d, p, m, h, b, v, g, _, y, x, w, k, A, S, E, C, O, T = r[0],
            M = r[1],
            j = r[2],
            D = Math.hypot(T, M, j);
        return D < a ? null : (T *= D = 1 / D, M *= D, j *= D, i = Math.sin(n), u = 1 - (o = Math.cos(n)), s = t[0], c = t[1], f = t[2], l = t[3], d = t[4], p = t[5], m = t[6], h = t[7], b = t[8], v = t[9], g = t[10], _ = t[11], y = T * T * u + o, x = M * T * u + j * i, w = j * T * u - M * i, k = T * M * u - j * i, A = M * M * u + o, S = j * M * u + T * i, E = T * j * u + M * i, C = M * j * u - T * i, O = j * j * u + o, e[0] = s * y + d * x + b * w, e[1] = c * y + p * x + v * w, e[2] = f * y + m * x + g * w, e[3] = l * y + h * x + _ * w, e[4] = s * k + d * A + b * S, e[5] = c * k + p * A + v * S, e[6] = f * k + m * A + g * S, e[7] = l * k + h * A + _ * S, e[8] = s * E + d * C + b * O, e[9] = c * E + p * C + v * O, e[10] = f * E + m * C + g * O, e[11] = l * E + h * C + _ * O, t !== e && (e[12] = t[12], e[13] = t[13], e[14] = t[14], e[15] = t[15]), e)
    }

    function w(e, t, n) {
        var r = Math.sin(n),
            i = Math.cos(n),
            a = t[4],
            o = t[5],
            u = t[6],
            s = t[7],
            c = t[8],
            f = t[9],
            l = t[10],
            d = t[11];
        return t !== e && (e[0] = t[0], e[1] = t[1], e[2] = t[2], e[3] = t[3], e[12] = t[12], e[13] = t[13], e[14] = t[14], e[15] = t[15]), e[4] = a * i + c * r, e[5] = o * i + f * r, e[6] = u * i + l * r, e[7] = s * i + d * r, e[8] = c * i - a * r, e[9] = f * i - o * r, e[10] = l * i - u * r, e[11] = d * i - s * r, e
    }

    function k(e, t, n) {
        var r = Math.sin(n),
            i = Math.cos(n),
            a = t[0],
            o = t[1],
            u = t[2],
            s = t[3],
            c = t[8],
            f = t[9],
            l = t[10],
            d = t[11];
        return t !== e && (e[4] = t[4], e[5] = t[5], e[6] = t[6], e[7] = t[7], e[12] = t[12], e[13] = t[13], e[14] = t[14], e[15] = t[15]), e[0] = a * i - c * r, e[1] = o * i - f * r, e[2] = u * i - l * r, e[3] = s * i - d * r, e[8] = a * r + c * i, e[9] = o * r + f * i, e[10] = u * r + l * i, e[11] = s * r + d * i, e
    }

    function A(e, t, n) {
        var r = Math.sin(n),
            i = Math.cos(n),
            a = t[0],
            o = t[1],
            u = t[2],
            s = t[3],
            c = t[4],
            f = t[5],
            l = t[6],
            d = t[7];
        return t !== e && (e[8] = t[8], e[9] = t[9], e[10] = t[10], e[11] = t[11], e[12] = t[12], e[13] = t[13], e[14] = t[14], e[15] = t[15]), e[0] = a * i + c * r, e[1] = o * i + f * r, e[2] = u * i + l * r, e[3] = s * i + d * r, e[4] = c * i - a * r, e[5] = f * i - o * r, e[6] = l * i - u * r, e[7] = d * i - s * r, e
    }

    function S(e, t) {
        return e[0] = 1, e[1] = 0, e[2] = 0, e[3] = 0, e[4] = 0, e[5] = 1, e[6] = 0, e[7] = 0, e[8] = 0, e[9] = 0, e[10] = 1, e[11] = 0, e[12] = t[0], e[13] = t[1], e[14] = t[2], e[15] = 1, e
    }

    function E(e, t) {
        return e[0] = t[0], e[1] = 0, e[2] = 0, e[3] = 0, e[4] = 0, e[5] = t[1], e[6] = 0, e[7] = 0, e[8] = 0, e[9] = 0, e[10] = t[2], e[11] = 0, e[12] = 0, e[13] = 0, e[14] = 0, e[15] = 1, e
    }

    function C(e, t, n) {
        var r, i, o, u = n[0],
            s = n[1],
            c = n[2],
            f = Math.hypot(u, s, c);
        return f < a ? null : (u *= f = 1 / f, s *= f, c *= f, r = Math.sin(t), o = 1 - (i = Math.cos(t)), e[0] = u * u * o + i, e[1] = s * u * o + c * r, e[2] = c * u * o - s * r, e[3] = 0, e[4] = u * s * o - c * r, e[5] = s * s * o + i, e[6] = c * s * o + u * r, e[7] = 0, e[8] = u * c * o + s * r, e[9] = s * c * o - u * r, e[10] = c * c * o + i, e[11] = 0, e[12] = 0, e[13] = 0, e[14] = 0, e[15] = 1, e)
    }

    function O(e, t) {
        var n = Math.sin(t),
            r = Math.cos(t);
        return e[0] = 1, e[1] = 0, e[2] = 0, e[3] = 0, e[4] = 0, e[5] = r, e[6] = n, e[7] = 0, e[8] = 0, e[9] = -n, e[10] = r, e[11] = 0, e[12] = 0, e[13] = 0, e[14] = 0, e[15] = 1, e
    }

    function T(e, t) {
        var n = Math.sin(t),
            r = Math.cos(t);
        return e[0] = r, e[1] = 0, e[2] = -n, e[3] = 0, e[4] = 0, e[5] = 1, e[6] = 0, e[7] = 0, e[8] = n, e[9] = 0, e[10] = r, e[11] = 0, e[12] = 0, e[13] = 0, e[14] = 0, e[15] = 1, e
    }

    function M(e, t) {
        var n = Math.sin(t),
            r = Math.cos(t);
        return e[0] = r, e[1] = n, e[2] = 0, e[3] = 0, e[4] = -n, e[5] = r, e[6] = 0, e[7] = 0, e[8] = 0, e[9] = 0, e[10] = 1, e[11] = 0, e[12] = 0, e[13] = 0, e[14] = 0, e[15] = 1, e
    }

    function j(e, t, n) {
        var r = t[0],
            i = t[1],
            a = t[2],
            o = t[3],
            u = r + r,
            s = i + i,
            c = a + a,
            f = r * u,
            l = r * s,
            d = r * c,
            p = i * s,
            m = i * c,
            h = a * c,
            b = o * u,
            v = o * s,
            g = o * c;
        return e[0] = 1 - (p + h), e[1] = l + g, e[2] = d - v, e[3] = 0, e[4] = l - g, e[5] = 1 - (f + h), e[6] = m + b, e[7] = 0, e[8] = d + v, e[9] = m - b, e[10] = 1 - (f + p), e[11] = 0, e[12] = n[0], e[13] = n[1], e[14] = n[2], e[15] = 1, e
    }

    function D(e, t) {
        var n = new o(3),
            r = -t[0],
            i = -t[1],
            a = -t[2],
            u = t[3],
            s = t[4],
            c = t[5],
            f = t[6],
            l = t[7],
            d = r * r + i * i + a * a + u * u;
        return d > 0 ? (n[0] = 2 * (s * u + l * r + c * a - f * i) / d, n[1] = 2 * (c * u + l * i + f * r - s * a) / d, n[2] = 2 * (f * u + l * a + s * i - c * r) / d) : (n[0] = 2 * (s * u + l * r + c * a - f * i), n[1] = 2 * (c * u + l * i + f * r - s * a), n[2] = 2 * (f * u + l * a + s * i - c * r)), j(e, t, n), e
    }

    function F(e, t) {
        return e[0] = t[12], e[1] = t[13], e[2] = t[14], e
    }

    function R(e, t) {
        var n = t[0],
            r = t[1],
            i = t[2],
            a = t[4],
            o = t[5],
            u = t[6],
            s = t[8],
            c = t[9],
            f = t[10];
        return e[0] = Math.hypot(n, r, i), e[1] = Math.hypot(a, o, u), e[2] = Math.hypot(s, c, f), e
    }

    function I(e, t) {
        var n = new o(3);
        R(n, t);
        var r = 1 / n[0],
            i = 1 / n[1],
            a = 1 / n[2],
            u = t[0] * r,
            s = t[1] * i,
            c = t[2] * a,
            f = t[4] * r,
            l = t[5] * i,
            d = t[6] * a,
            p = t[8] * r,
            m = t[9] * i,
            h = t[10] * a,
            b = u + l + h,
            v = 0;
        return b > 0 ? (v = 2 * Math.sqrt(b + 1), e[3] = .25 * v, e[0] = (d - m) / v, e[1] = (p - c) / v, e[2] = (s - f) / v) : u > l && u > h ? (v = 2 * Math.sqrt(1 + u - l - h), e[3] = (d - m) / v, e[0] = .25 * v, e[1] = (s + f) / v, e[2] = (p + c) / v) : l > h ? (v = 2 * Math.sqrt(1 + l - u - h), e[3] = (p - c) / v, e[0] = (s + f) / v, e[1] = .25 * v, e[2] = (d + m) / v) : (v = 2 * Math.sqrt(1 + h - u - l), e[3] = (s - f) / v, e[0] = (p + c) / v, e[1] = (d + m) / v, e[2] = .25 * v), e
    }

    function L(e, t, n, r) {
        var i = t[0],
            a = t[1],
            o = t[2],
            u = t[3],
            s = i + i,
            c = a + a,
            f = o + o,
            l = i * s,
            d = i * c,
            p = i * f,
            m = a * c,
            h = a * f,
            b = o * f,
            v = u * s,
            g = u * c,
            _ = u * f,
            y = r[0],
            x = r[1],
            w = r[2];
        return e[0] = (1 - (m + b)) * y, e[1] = (d + _) * y, e[2] = (p - g) * y, e[3] = 0, e[4] = (d - _) * x, e[5] = (1 - (l + b)) * x, e[6] = (h + v) * x, e[7] = 0, e[8] = (p + g) * w, e[9] = (h - v) * w, e[10] = (1 - (l + m)) * w, e[11] = 0, e[12] = n[0], e[13] = n[1], e[14] = n[2], e[15] = 1, e
    }

    function B(e, t, n, r, i) {
        var a = t[0],
            o = t[1],
            u = t[2],
            s = t[3],
            c = a + a,
            f = o + o,
            l = u + u,
            d = a * c,
            p = a * f,
            m = a * l,
            h = o * f,
            b = o * l,
            v = u * l,
            g = s * c,
            _ = s * f,
            y = s * l,
            x = r[0],
            w = r[1],
            k = r[2],
            A = i[0],
            S = i[1],
            E = i[2],
            C = (1 - (h + v)) * x,
            O = (p + y) * x,
            T = (m - _) * x,
            M = (p - y) * w,
            j = (1 - (d + v)) * w,
            D = (b + g) * w,
            F = (m + _) * k,
            R = (b - g) * k,
            I = (1 - (d + h)) * k;
        return e[0] = C, e[1] = O, e[2] = T, e[3] = 0, e[4] = M, e[5] = j, e[6] = D, e[7] = 0, e[8] = F, e[9] = R, e[10] = I, e[11] = 0, e[12] = n[0] + A - (C * A + M * S + F * E), e[13] = n[1] + S - (O * A + j * S + R * E), e[14] = n[2] + E - (T * A + D * S + I * E), e[15] = 1, e
    }

    function P(e, t) {
        var n = t[0],
            r = t[1],
            i = t[2],
            a = t[3],
            o = n + n,
            u = r + r,
            s = i + i,
            c = n * o,
            f = r * o,
            l = r * u,
            d = i * o,
            p = i * u,
            m = i * s,
            h = a * o,
            b = a * u,
            v = a * s;
        return e[0] = 1 - l - m, e[1] = f + v, e[2] = d - b, e[3] = 0, e[4] = f - v, e[5] = 1 - c - m, e[6] = p + h, e[7] = 0, e[8] = d + b, e[9] = p - h, e[10] = 1 - c - l, e[11] = 0, e[12] = 0, e[13] = 0, e[14] = 0, e[15] = 1, e
    }

    function z(e, t, n, r, i, a, o) {
        var u = 1 / (n - t),
            s = 1 / (i - r),
            c = 1 / (a - o);
        return e[0] = 2 * a * u, e[1] = 0, e[2] = 0, e[3] = 0, e[4] = 0, e[5] = 2 * a * s, e[6] = 0, e[7] = 0, e[8] = (n + t) * u, e[9] = (i + r) * s, e[10] = (o + a) * c, e[11] = -1, e[12] = 0, e[13] = 0, e[14] = o * a * 2 * c, e[15] = 0, e
    }

    function N(e, t, n, r, i) {
        var a, o = 1 / Math.tan(t / 2);
        return e[0] = o / n, e[1] = 0, e[2] = 0, e[3] = 0, e[4] = 0, e[5] = o, e[6] = 0, e[7] = 0, e[8] = 0, e[9] = 0, e[11] = -1, e[12] = 0, e[13] = 0, e[15] = 0, null != i && i !== 1 / 0 ? (a = 1 / (r - i), e[10] = (i + r) * a, e[14] = 2 * i * r * a) : (e[10] = -1, e[14] = -2 * r), e
    }

    function H(e, t, n, r) {
        var i = Math.tan(t.upDegrees * Math.PI / 180),
            a = Math.tan(t.downDegrees * Math.PI / 180),
            o = Math.tan(t.leftDegrees * Math.PI / 180),
            u = Math.tan(t.rightDegrees * Math.PI / 180),
            s = 2 / (o + u),
            c = 2 / (i + a);
        return e[0] = s, e[1] = 0, e[2] = 0, e[3] = 0, e[4] = 0, e[5] = c, e[6] = 0, e[7] = 0, e[8] = -(o - u) * s * .5, e[9] = (i - a) * c * .5, e[10] = r / (n - r), e[11] = -1, e[12] = 0, e[13] = 0, e[14] = r * n / (n - r), e[15] = 0, e
    }

    function U(e, t, n, r, i, a, o) {
        var u = 1 / (t - n),
            s = 1 / (r - i),
            c = 1 / (a - o);
        return e[0] = -2 * u, e[1] = 0, e[2] = 0, e[3] = 0, e[4] = 0, e[5] = -2 * s, e[6] = 0, e[7] = 0, e[8] = 0, e[9] = 0, e[10] = 2 * c, e[11] = 0, e[12] = (t + n) * u, e[13] = (i + r) * s, e[14] = (o + a) * c, e[15] = 1, e
    }

    function V(e, t, n, r) {
        var i, o, u, s, c, f, l, d, m, h, b = t[0],
            v = t[1],
            g = t[2],
            _ = r[0],
            y = r[1],
            x = r[2],
            w = n[0],
            k = n[1],
            A = n[2];
        return Math.abs(b - w) < a && Math.abs(v - k) < a && Math.abs(g - A) < a ? p(e) : (l = b - w, d = v - k, m = g - A, i = y * (m *= h = 1 / Math.hypot(l, d, m)) - x * (d *= h), o = x * (l *= h) - _ * m, u = _ * d - y * l, (h = Math.hypot(i, o, u)) ? (i *= h = 1 / h, o *= h, u *= h) : (i = 0, o = 0, u = 0), s = d * u - m * o, c = m * i - l * u, f = l * o - d * i, (h = Math.hypot(s, c, f)) ? (s *= h = 1 / h, c *= h, f *= h) : (s = 0, c = 0, f = 0), e[0] = i, e[1] = s, e[2] = l, e[3] = 0, e[4] = o, e[5] = c, e[6] = d, e[7] = 0, e[8] = u, e[9] = f, e[10] = m, e[11] = 0, e[12] = -(i * b + o * v + u * g), e[13] = -(s * b + c * v + f * g), e[14] = -(l * b + d * v + m * g), e[15] = 1, e)
    }

    function G(e, t, n, r) {
        var i = t[0],
            a = t[1],
            o = t[2],
            u = r[0],
            s = r[1],
            c = r[2],
            f = i - n[0],
            l = a - n[1],
            d = o - n[2],
            p = f * f + l * l + d * d;
        p > 0 && (f *= p = 1 / Math.sqrt(p), l *= p, d *= p);
        var m = s * d - c * l,
            h = c * f - u * d,
            b = u * l - s * f;
        return (p = m * m + h * h + b * b) > 0 && (m *= p = 1 / Math.sqrt(p), h *= p, b *= p), e[0] = m, e[1] = h, e[2] = b, e[3] = 0, e[4] = l * b - d * h, e[5] = d * m - f * b, e[6] = f * h - l * m, e[7] = 0, e[8] = f, e[9] = l, e[10] = d, e[11] = 0, e[12] = i, e[13] = a, e[14] = o, e[15] = 1, e
    }

    function W(e) {
        return "mat4(" + e[0] + ", " + e[1] + ", " + e[2] + ", " + e[3] + ", " + e[4] + ", " + e[5] + ", " + e[6] + ", " + e[7] + ", " + e[8] + ", " + e[9] + ", " + e[10] + ", " + e[11] + ", " + e[12] + ", " + e[13] + ", " + e[14] + ", " + e[15] + ")"
    }

    function Y(e) {
        return Math.hypot(e[0], e[1], e[3], e[4], e[5], e[6], e[7], e[8], e[9], e[10], e[11], e[12], e[13], e[14], e[15])
    }

    function X(e, t, n) {
        return e[0] = t[0] + n[0], e[1] = t[1] + n[1], e[2] = t[2] + n[2], e[3] = t[3] + n[3], e[4] = t[4] + n[4], e[5] = t[5] + n[5], e[6] = t[6] + n[6], e[7] = t[7] + n[7], e[8] = t[8] + n[8], e[9] = t[9] + n[9], e[10] = t[10] + n[10], e[11] = t[11] + n[11], e[12] = t[12] + n[12], e[13] = t[13] + n[13], e[14] = t[14] + n[14], e[15] = t[15] + n[15], e
    }

    function q(e, t, n) {
        return e[0] = t[0] - n[0], e[1] = t[1] - n[1], e[2] = t[2] - n[2], e[3] = t[3] - n[3], e[4] = t[4] - n[4], e[5] = t[5] - n[5], e[6] = t[6] - n[6], e[7] = t[7] - n[7], e[8] = t[8] - n[8], e[9] = t[9] - n[9], e[10] = t[10] - n[10], e[11] = t[11] - n[11], e[12] = t[12] - n[12], e[13] = t[13] - n[13], e[14] = t[14] - n[14], e[15] = t[15] - n[15], e
    }

    function Q(e, t, n) {
        return e[0] = t[0] * n, e[1] = t[1] * n, e[2] = t[2] * n, e[3] = t[3] * n, e[4] = t[4] * n, e[5] = t[5] * n, e[6] = t[6] * n, e[7] = t[7] * n, e[8] = t[8] * n, e[9] = t[9] * n, e[10] = t[10] * n, e[11] = t[11] * n, e[12] = t[12] * n, e[13] = t[13] * n, e[14] = t[14] * n, e[15] = t[15] * n, e
    }

    function K(e, t, n, r) {
        return e[0] = t[0] + n[0] * r, e[1] = t[1] + n[1] * r, e[2] = t[2] + n[2] * r, e[3] = t[3] + n[3] * r, e[4] = t[4] + n[4] * r, e[5] = t[5] + n[5] * r, e[6] = t[6] + n[6] * r, e[7] = t[7] + n[7] * r, e[8] = t[8] + n[8] * r, e[9] = t[9] + n[9] * r, e[10] = t[10] + n[10] * r, e[11] = t[11] + n[11] * r, e[12] = t[12] + n[12] * r, e[13] = t[13] + n[13] * r, e[14] = t[14] + n[14] * r, e[15] = t[15] + n[15] * r, e
    }

    function Z(e, t) {
        return e[0] === t[0] && e[1] === t[1] && e[2] === t[2] && e[3] === t[3] && e[4] === t[4] && e[5] === t[5] && e[6] === t[6] && e[7] === t[7] && e[8] === t[8] && e[9] === t[9] && e[10] === t[10] && e[11] === t[11] && e[12] === t[12] && e[13] === t[13] && e[14] === t[14] && e[15] === t[15]
    }

    function J(e, t) {
        var n = e[0],
            r = e[1],
            i = e[2],
            o = e[3],
            u = e[4],
            s = e[5],
            c = e[6],
            f = e[7],
            l = e[8],
            d = e[9],
            p = e[10],
            m = e[11],
            h = e[12],
            b = e[13],
            v = e[14],
            g = e[15],
            _ = t[0],
            y = t[1],
            x = t[2],
            w = t[3],
            k = t[4],
            A = t[5],
            S = t[6],
            E = t[7],
            C = t[8],
            O = t[9],
            T = t[10],
            M = t[11],
            j = t[12],
            D = t[13],
            F = t[14],
            R = t[15];
        return Math.abs(n - _) <= a * Math.max(1, Math.abs(n), Math.abs(_)) && Math.abs(r - y) <= a * Math.max(1, Math.abs(r), Math.abs(y)) && Math.abs(i - x) <= a * Math.max(1, Math.abs(i), Math.abs(x)) && Math.abs(o - w) <= a * Math.max(1, Math.abs(o), Math.abs(w)) && Math.abs(u - k) <= a * Math.max(1, Math.abs(u), Math.abs(k)) && Math.abs(s - A) <= a * Math.max(1, Math.abs(s), Math.abs(A)) && Math.abs(c - S) <= a * Math.max(1, Math.abs(c), Math.abs(S)) && Math.abs(f - E) <= a * Math.max(1, Math.abs(f), Math.abs(E)) && Math.abs(l - C) <= a * Math.max(1, Math.abs(l), Math.abs(C)) && Math.abs(d - O) <= a * Math.max(1, Math.abs(d), Math.abs(O)) && Math.abs(p - T) <= a * Math.max(1, Math.abs(p), Math.abs(T)) && Math.abs(m - M) <= a * Math.max(1, Math.abs(m), Math.abs(M)) && Math.abs(h - j) <= a * Math.max(1, Math.abs(h), Math.abs(j)) && Math.abs(b - D) <= a * Math.max(1, Math.abs(b), Math.abs(D)) && Math.abs(v - F) <= a * Math.max(1, Math.abs(v), Math.abs(F)) && Math.abs(g - R) <= a * Math.max(1, Math.abs(g), Math.abs(R))
    }
    Math.hypot || (Math.hypot = function () {
        for (var e = 0, t = arguments.length; t--;) e += arguments[t] * arguments[t];
        return Math.sqrt(e)
    });
    var $ = g,
        ee = q;

    function te() {
        var e = new o(3);
        return o != Float32Array && (e[0] = 0, e[1] = 0, e[2] = 0), e
    }

    function ne(e) {
        var t = new o(3);
        return t[0] = e[0], t[1] = e[1], t[2] = e[2], t
    }

    function re(e) {
        var t = e[0],
            n = e[1],
            r = e[2];
        return Math.hypot(t, n, r)
    }

    function ie(e, t, n) {
        var r = new o(3);
        return r[0] = e, r[1] = t, r[2] = n, r
    }

    function ae(e, t) {
        return e[0] = t[0], e[1] = t[1], e[2] = t[2], e
    }

    function oe(e, t, n, r) {
        return e[0] = t, e[1] = n, e[2] = r, e
    }

    function ue(e, t, n) {
        return e[0] = t[0] + n[0], e[1] = t[1] + n[1], e[2] = t[2] + n[2], e
    }

    function se(e, t, n) {
        return e[0] = t[0] - n[0], e[1] = t[1] - n[1], e[2] = t[2] - n[2], e
    }

    function ce(e, t, n) {
        return e[0] = t[0] * n[0], e[1] = t[1] * n[1], e[2] = t[2] * n[2], e
    }

    function fe(e, t, n) {
        return e[0] = t[0] / n[0], e[1] = t[1] / n[1], e[2] = t[2] / n[2], e
    }

    function le(e, t) {
        return e[0] = Math.ceil(t[0]), e[1] = Math.ceil(t[1]), e[2] = Math.ceil(t[2]), e
    }

    function de(e, t) {
        return e[0] = Math.floor(t[0]), e[1] = Math.floor(t[1]), e[2] = Math.floor(t[2]), e
    }

    function pe(e, t, n) {
        return e[0] = Math.min(t[0], n[0]), e[1] = Math.min(t[1], n[1]), e[2] = Math.min(t[2], n[2]), e
    }

    function me(e, t, n) {
        return e[0] = Math.max(t[0], n[0]), e[1] = Math.max(t[1], n[1]), e[2] = Math.max(t[2], n[2]), e
    }

    function he(e, t) {
        return e[0] = Math.round(t[0]), e[1] = Math.round(t[1]), e[2] = Math.round(t[2]), e
    }

    function be(e, t, n) {
        return e[0] = t[0] * n, e[1] = t[1] * n, e[2] = t[2] * n, e
    }

    function ve(e, t, n, r) {
        return e[0] = t[0] + n[0] * r, e[1] = t[1] + n[1] * r, e[2] = t[2] + n[2] * r, e
    }

    function ge(e, t) {
        var n = t[0] - e[0],
            r = t[1] - e[1],
            i = t[2] - e[2];
        return Math.hypot(n, r, i)
    }

    function _e(e, t) {
        var n = t[0] - e[0],
            r = t[1] - e[1],
            i = t[2] - e[2];
        return n * n + r * r + i * i
    }

    function ye(e) {
        var t = e[0],
            n = e[1],
            r = e[2];
        return t * t + n * n + r * r
    }

    function xe(e, t) {
        return e[0] = -t[0], e[1] = -t[1], e[2] = -t[2], e
    }

    function we(e, t) {
        return e[0] = 1 / t[0], e[1] = 1 / t[1], e[2] = 1 / t[2], e
    }

    function ke(e, t) {
        var n = t[0],
            r = t[1],
            i = t[2],
            a = n * n + r * r + i * i;
        return a > 0 && (a = 1 / Math.sqrt(a)), e[0] = t[0] * a, e[1] = t[1] * a, e[2] = t[2] * a, e
    }

    function Ae(e, t) {
        return e[0] * t[0] + e[1] * t[1] + e[2] * t[2]
    }

    function Se(e, t, n) {
        var r = t[0],
            i = t[1],
            a = t[2],
            o = n[0],
            u = n[1],
            s = n[2];
        return e[0] = i * s - a * u, e[1] = a * o - r * s, e[2] = r * u - i * o, e
    }

    function Ee(e, t, n, r) {
        var i = t[0],
            a = t[1],
            o = t[2];
        return e[0] = i + r * (n[0] - i), e[1] = a + r * (n[1] - a), e[2] = o + r * (n[2] - o), e
    }

    function Ce(e, t, n, r, i, a) {
        var o = a * a,
            u = o * (2 * a - 3) + 1,
            s = o * (a - 2) + a,
            c = o * (a - 1),
            f = o * (3 - 2 * a);
        return e[0] = t[0] * u + n[0] * s + r[0] * c + i[0] * f, e[1] = t[1] * u + n[1] * s + r[1] * c + i[1] * f, e[2] = t[2] * u + n[2] * s + r[2] * c + i[2] * f, e
    }

    function Oe(e, t, n, r, i, a) {
        var o = 1 - a,
            u = o * o,
            s = a * a,
            c = u * o,
            f = 3 * a * u,
            l = 3 * s * o,
            d = s * a;
        return e[0] = t[0] * c + n[0] * f + r[0] * l + i[0] * d, e[1] = t[1] * c + n[1] * f + r[1] * l + i[1] * d, e[2] = t[2] * c + n[2] * f + r[2] * l + i[2] * d, e
    }

    function Te(e, t) {
        t = t || 1;
        var n = 2 * u() * Math.PI,
            r = 2 * u() - 1,
            i = Math.sqrt(1 - r * r) * t;
        return e[0] = Math.cos(n) * i, e[1] = Math.sin(n) * i, e[2] = r * t, e
    }

    function Me(e, t, n) {
        var r = t[0],
            i = t[1],
            a = t[2],
            o = n[3] * r + n[7] * i + n[11] * a + n[15];
        return o = o || 1, e[0] = (n[0] * r + n[4] * i + n[8] * a + n[12]) / o, e[1] = (n[1] * r + n[5] * i + n[9] * a + n[13]) / o, e[2] = (n[2] * r + n[6] * i + n[10] * a + n[14]) / o, e
    }

    function je(e, t, n) {
        var r = t[0],
            i = t[1],
            a = t[2];
        return e[0] = r * n[0] + i * n[3] + a * n[6], e[1] = r * n[1] + i * n[4] + a * n[7], e[2] = r * n[2] + i * n[5] + a * n[8], e
    }

    function De(e, t, n) {
        var r = n[0],
            i = n[1],
            a = n[2],
            o = n[3],
            u = t[0],
            s = t[1],
            c = t[2],
            f = i * c - a * s,
            l = a * u - r * c,
            d = r * s - i * u,
            p = i * d - a * l,
            m = a * f - r * d,
            h = r * l - i * f,
            b = 2 * o;
        return f *= b, l *= b, d *= b, p *= 2, m *= 2, h *= 2, e[0] = u + f + p, e[1] = s + l + m, e[2] = c + d + h, e
    }

    function Fe(e, t, n, r) {
        var i = [],
            a = [];
        return i[0] = t[0] - n[0], i[1] = t[1] - n[1], i[2] = t[2] - n[2], a[0] = i[0], a[1] = i[1] * Math.cos(r) - i[2] * Math.sin(r), a[2] = i[1] * Math.sin(r) + i[2] * Math.cos(r), e[0] = a[0] + n[0], e[1] = a[1] + n[1], e[2] = a[2] + n[2], e
    }

    function Re(e, t, n, r) {
        var i = [],
            a = [];
        return i[0] = t[0] - n[0], i[1] = t[1] - n[1], i[2] = t[2] - n[2], a[0] = i[2] * Math.sin(r) + i[0] * Math.cos(r), a[1] = i[1], a[2] = i[2] * Math.cos(r) - i[0] * Math.sin(r), e[0] = a[0] + n[0], e[1] = a[1] + n[1], e[2] = a[2] + n[2], e
    }

    function Ie(e, t, n, r) {
        var i = [],
            a = [];
        return i[0] = t[0] - n[0], i[1] = t[1] - n[1], i[2] = t[2] - n[2], a[0] = i[0] * Math.cos(r) - i[1] * Math.sin(r), a[1] = i[0] * Math.sin(r) + i[1] * Math.cos(r), a[2] = i[2], e[0] = a[0] + n[0], e[1] = a[1] + n[1], e[2] = a[2] + n[2], e
    }

    function Le(e, t) {
        var n = ie(e[0], e[1], e[2]),
            r = ie(t[0], t[1], t[2]);
        ke(n, n), ke(r, r);
        var i = Ae(n, r);
        return i > 1 ? 0 : i < -1 ? Math.PI : Math.acos(i)
    }

    function Be(e) {
        return e[0] = 0, e[1] = 0, e[2] = 0, e
    }

    function Pe(e) {
        return "vec3(" + e[0] + ", " + e[1] + ", " + e[2] + ")"
    }

    function ze(e, t) {
        return e[0] === t[0] && e[1] === t[1] && e[2] === t[2]
    }

    function Ne(e, t) {
        var n = e[0],
            r = e[1],
            i = e[2],
            o = t[0],
            u = t[1],
            s = t[2];
        return Math.abs(n - o) <= a * Math.max(1, Math.abs(n), Math.abs(o)) && Math.abs(r - u) <= a * Math.max(1, Math.abs(r), Math.abs(u)) && Math.abs(i - s) <= a * Math.max(1, Math.abs(i), Math.abs(s))
    }
    var He, Ue, Ve = se,
        Ge = ce,
        We = fe,
        Ye = ge,
        Xe = _e,
        qe = re,
        Qe = ye,
        Ke = (He = te(), function (e, t, n, r, i, a) {
            var o, u;
            for (t || (t = 3), n || (n = 0), u = r ? Math.min(r * t + n, e.length) : e.length, o = n; o < u; o += t) He[0] = e[o], He[1] = e[o + 1], He[2] = e[o + 2], i(He, He, a), e[o] = He[0], e[o + 1] = He[1], e[o + 2] = He[2];
            return e
        }),
        Ze = (n(0), function () {
            Ue && Ue.begin()
        }),
        Je = function () {
            Ue && Ue.end()
        };

    function $e(e, t) {
        var n = e.__state.conversionName.toString(),
            r = Math.round(e.r),
            i = Math.round(e.g),
            a = Math.round(e.b),
            o = e.a,
            u = Math.round(e.h),
            s = e.s.toFixed(1),
            c = e.v.toFixed(1);
        if (t || "THREE_CHAR_HEX" === n || "SIX_CHAR_HEX" === n) {
            for (var f = e.hex.toString(16); f.length < 6;) f = "0" + f;
            return "#" + f
        }
        return "CSS_RGB" === n ? "rgb(" + r + "," + i + "," + a + ")" : "CSS_RGBA" === n ? "rgba(" + r + "," + i + "," + a + "," + o + ")" : "HEX" === n ? "0x" + e.hex.toString(16) : "RGB_ARRAY" === n ? "[" + r + "," + i + "," + a + "]" : "RGBA_ARRAY" === n ? "[" + r + "," + i + "," + a + "," + o + "]" : "RGB_OBJ" === n ? "{r:" + r + ",g:" + i + ",b:" + a + "}" : "RGBA_OBJ" === n ? "{r:" + r + ",g:" + i + ",b:" + a + ",a:" + o + "}" : "HSV_OBJ" === n ? "{h:" + u + ",s:" + s + ",v:" + c + "}" : "HSVA_OBJ" === n ? "{h:" + u + ",s:" + s + ",v:" + c + ",a:" + o + "}" : "unknown format"
    }
    var et = Array.prototype.forEach,
        tt = Array.prototype.slice,
        nt = {
            BREAK: {},
            extend: function (e) {
                return this.each(tt.call(arguments, 1), (function (t) {
                    (this.isObject(t) ? Object.keys(t) : []).forEach(function (n) {
                        this.isUndefined(t[n]) || (e[n] = t[n])
                    }.bind(this))
                }), this), e
            },
            defaults: function (e) {
                return this.each(tt.call(arguments, 1), (function (t) {
                    (this.isObject(t) ? Object.keys(t) : []).forEach(function (n) {
                        this.isUndefined(e[n]) && (e[n] = t[n])
                    }.bind(this))
                }), this), e
            },
            compose: function () {
                var e = tt.call(arguments);
                return function () {
                    for (var t = tt.call(arguments), n = e.length - 1; n >= 0; n--) t = [e[n].apply(this, t)];
                    return t[0]
                }
            },
            each: function (e, t, n) {
                if (e)
                    if (et && e.forEach && e.forEach === et) e.forEach(t, n);
                    else if (e.length === e.length + 0) {
                    var r, i = void 0;
                    for (i = 0, r = e.length; i < r; i++)
                        if (i in e && t.call(n, e[i], i) === this.BREAK) return
                } else
                    for (var a in e)
                        if (t.call(n, e[a], a) === this.BREAK) return
            },
            defer: function (e) {
                setTimeout(e, 0)
            },
            debounce: function (e, t, n) {
                var r = void 0;
                return function () {
                    var i = this,
                        a = arguments;

                    function o() {
                        r = null, n || e.apply(i, a)
                    }
                    var u = n || !r;
                    clearTimeout(r), r = setTimeout(o, t), u && e.apply(i, a)
                }
            },
            toArray: function (e) {
                return e.toArray ? e.toArray() : tt.call(e)
            },
            isUndefined: function (e) {
                return void 0 === e
            },
            isNull: function (e) {
                return null === e
            },
            isNaN: function (e) {
                function t(t) {
                    return e.apply(this, arguments)
                }
                return t.toString = function () {
                    return e.toString()
                }, t
            }((function (e) {
                return isNaN(e)
            })),
            isArray: Array.isArray || function (e) {
                return e.constructor === Array
            },
            isObject: function (e) {
                return e === Object(e)
            },
            isNumber: function (e) {
                return e === e + 0
            },
            isString: function (e) {
                return e === e + ""
            },
            isBoolean: function (e) {
                return !1 === e || !0 === e
            },
            isFunction: function (e) {
                return "[object Function]" === Object.prototype.toString.call(e)
            }
        },
        rt = [{
            litmus: nt.isString,
            conversions: {
                THREE_CHAR_HEX: {
                    read: function (e) {
                        var t = e.match(/^#([A-F0-9])([A-F0-9])([A-F0-9])$/i);
                        return null !== t && {
                            space: "HEX",
                            hex: parseInt("0x" + t[1].toString() + t[1].toString() + t[2].toString() + t[2].toString() + t[3].toString() + t[3].toString(), 0)
                        }
                    },
                    write: $e
                },
                SIX_CHAR_HEX: {
                    read: function (e) {
                        var t = e.match(/^#([A-F0-9]{6})$/i);
                        return null !== t && {
                            space: "HEX",
                            hex: parseInt("0x" + t[1].toString(), 0)
                        }
                    },
                    write: $e
                },
                CSS_RGB: {
                    read: function (e) {
                        var t = e.match(/^rgb\(\s*(.+)\s*,\s*(.+)\s*,\s*(.+)\s*\)/);
                        return null !== t && {
                            space: "RGB",
                            r: parseFloat(t[1]),
                            g: parseFloat(t[2]),
                            b: parseFloat(t[3])
                        }
                    },
                    write: $e
                },
                CSS_RGBA: {
                    read: function (e) {
                        var t = e.match(/^rgba\(\s*(.+)\s*,\s*(.+)\s*,\s*(.+)\s*,\s*(.+)\s*\)/);
                        return null !== t && {
                            space: "RGB",
                            r: parseFloat(t[1]),
                            g: parseFloat(t[2]),
                            b: parseFloat(t[3]),
                            a: parseFloat(t[4])
                        }
                    },
                    write: $e
                }
            }
        }, {
            litmus: nt.isNumber,
            conversions: {
                HEX: {
                    read: function (e) {
                        return {
                            space: "HEX",
                            hex: e,
                            conversionName: "HEX"
                        }
                    },
                    write: function (e) {
                        return e.hex
                    }
                }
            }
        }, {
            litmus: nt.isArray,
            conversions: {
                RGB_ARRAY: {
                    read: function (e) {
                        return 3 === e.length && {
                            space: "RGB",
                            r: e[0],
                            g: e[1],
                            b: e[2]
                        }
                    },
                    write: function (e) {
                        return [e.r, e.g, e.b]
                    }
                },
                RGBA_ARRAY: {
                    read: function (e) {
                        return 4 === e.length && {
                            space: "RGB",
                            r: e[0],
                            g: e[1],
                            b: e[2],
                            a: e[3]
                        }
                    },
                    write: function (e) {
                        return [e.r, e.g, e.b, e.a]
                    }
                }
            }
        }, {
            litmus: nt.isObject,
            conversions: {
                RGBA_OBJ: {
                    read: function (e) {
                        return !!(nt.isNumber(e.r) && nt.isNumber(e.g) && nt.isNumber(e.b) && nt.isNumber(e.a)) && {
                            space: "RGB",
                            r: e.r,
                            g: e.g,
                            b: e.b,
                            a: e.a
                        }
                    },
                    write: function (e) {
                        return {
                            r: e.r,
                            g: e.g,
                            b: e.b,
                            a: e.a
                        }
                    }
                },
                RGB_OBJ: {
                    read: function (e) {
                        return !!(nt.isNumber(e.r) && nt.isNumber(e.g) && nt.isNumber(e.b)) && {
                            space: "RGB",
                            r: e.r,
                            g: e.g,
                            b: e.b
                        }
                    },
                    write: function (e) {
                        return {
                            r: e.r,
                            g: e.g,
                            b: e.b
                        }
                    }
                },
                HSVA_OBJ: {
                    read: function (e) {
                        return !!(nt.isNumber(e.h) && nt.isNumber(e.s) && nt.isNumber(e.v) && nt.isNumber(e.a)) && {
                            space: "HSV",
                            h: e.h,
                            s: e.s,
                            v: e.v,
                            a: e.a
                        }
                    },
                    write: function (e) {
                        return {
                            h: e.h,
                            s: e.s,
                            v: e.v,
                            a: e.a
                        }
                    }
                },
                HSV_OBJ: {
                    read: function (e) {
                        return !!(nt.isNumber(e.h) && nt.isNumber(e.s) && nt.isNumber(e.v)) && {
                            space: "HSV",
                            h: e.h,
                            s: e.s,
                            v: e.v
                        }
                    },
                    write: function (e) {
                        return {
                            h: e.h,
                            s: e.s,
                            v: e.v
                        }
                    }
                }
            }
        }],
        it = void 0,
        at = void 0,
        ot = function () {
            at = !1;
            var e = arguments.length > 1 ? nt.toArray(arguments) : arguments[0];
            return nt.each(rt, (function (t) {
                if (t.litmus(e)) return nt.each(t.conversions, (function (t, n) {
                    if (it = t.read(e), !1 === at && !1 !== it) return at = it, it.conversionName = n, it.conversion = t, nt.BREAK
                })), nt.BREAK
            })), at
        },
        ut = void 0,
        st = {
            hsv_to_rgb: function (e, t, n) {
                var r = Math.floor(e / 60) % 6,
                    i = e / 60 - Math.floor(e / 60),
                    a = n * (1 - t),
                    o = n * (1 - i * t),
                    u = n * (1 - (1 - i) * t),
                    s = [
                        [n, u, a],
                        [o, n, a],
                        [a, n, u],
                        [a, o, n],
                        [u, a, n],
                        [n, a, o]
                    ][r];
                return {
                    r: 255 * s[0],
                    g: 255 * s[1],
                    b: 255 * s[2]
                }
            },
            rgb_to_hsv: function (e, t, n) {
                var r = Math.min(e, t, n),
                    i = Math.max(e, t, n),
                    a = i - r,
                    o = void 0;
                return 0 === i ? {
                    h: NaN,
                    s: 0,
                    v: 0
                } : (o = e === i ? (t - n) / a : t === i ? 2 + (n - e) / a : 4 + (e - t) / a, (o /= 6) < 0 && (o += 1), {
                    h: 360 * o,
                    s: a / i,
                    v: i / 255
                })
            },
            rgb_to_hex: function (e, t, n) {
                var r = this.hex_with_component(0, 2, e);
                return r = this.hex_with_component(r, 1, t), r = this.hex_with_component(r, 0, n)
            },
            component_from_hex: function (e, t) {
                return e >> 8 * t & 255
            },
            hex_with_component: function (e, t, n) {
                return n << (ut = 8 * t) | e & ~(255 << ut)
            }
        },
        ct = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
            return typeof e
        } : function (e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        },
        ft = function (e, t) {
            if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
        },
        lt = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }
            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(),
        dt = function e(t, n, r) {
            null === t && (t = Function.prototype);
            var i = Object.getOwnPropertyDescriptor(t, n);
            if (void 0 === i) {
                var a = Object.getPrototypeOf(t);
                return null === a ? void 0 : e(a, n, r)
            }
            if ("value" in i) return i.value;
            var o = i.get;
            return void 0 !== o ? o.call(r) : void 0
        },
        pt = function (e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        },
        mt = function (e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return !t || "object" != typeof t && "function" != typeof t ? e : t
        },
        ht = function () {
            function e() {
                if (ft(this, e), this.__state = ot.apply(this, arguments), !1 === this.__state) throw new Error("Failed to interpret color arguments");
                this.__state.a = this.__state.a || 1
            }
            return lt(e, [{
                key: "toString",
                value: function () {
                    return $e(this)
                }
            }, {
                key: "toHexString",
                value: function () {
                    return $e(this, !0)
                }
            }, {
                key: "toOriginal",
                value: function () {
                    return this.__state.conversion.write(this)
                }
            }]), e
        }();

    function bt(e, t, n) {
        Object.defineProperty(e, t, {
            get: function () {
                return "RGB" === this.__state.space ? this.__state[t] : (ht.recalculateRGB(this, t, n), this.__state[t])
            },
            set: function (e) {
                "RGB" !== this.__state.space && (ht.recalculateRGB(this, t, n), this.__state.space = "RGB"), this.__state[t] = e
            }
        })
    }

    function vt(e, t) {
        Object.defineProperty(e, t, {
            get: function () {
                return "HSV" === this.__state.space ? this.__state[t] : (ht.recalculateHSV(this), this.__state[t])
            },
            set: function (e) {
                "HSV" !== this.__state.space && (ht.recalculateHSV(this), this.__state.space = "HSV"), this.__state[t] = e
            }
        })
    }
    ht.recalculateRGB = function (e, t, n) {
        if ("HEX" === e.__state.space) e.__state[t] = st.component_from_hex(e.__state.hex, n);
        else {
            if ("HSV" !== e.__state.space) throw new Error("Corrupted color state");
            nt.extend(e.__state, st.hsv_to_rgb(e.__state.h, e.__state.s, e.__state.v))
        }
    }, ht.recalculateHSV = function (e) {
        var t = st.rgb_to_hsv(e.r, e.g, e.b);
        nt.extend(e.__state, {
            s: t.s,
            v: t.v
        }), nt.isNaN(t.h) ? nt.isUndefined(e.__state.h) && (e.__state.h = 0) : e.__state.h = t.h
    }, ht.COMPONENTS = ["r", "g", "b", "h", "s", "v", "hex", "a"], bt(ht.prototype, "r", 2), bt(ht.prototype, "g", 1), bt(ht.prototype, "b", 0), vt(ht.prototype, "h"), vt(ht.prototype, "s"), vt(ht.prototype, "v"), Object.defineProperty(ht.prototype, "a", {
        get: function () {
            return this.__state.a
        },
        set: function (e) {
            this.__state.a = e
        }
    }), Object.defineProperty(ht.prototype, "hex", {
        get: function () {
            return "HEX" !== !this.__state.space && (this.__state.hex = st.rgb_to_hex(this.r, this.g, this.b)), this.__state.hex
        },
        set: function (e) {
            this.__state.space = "HEX", this.__state.hex = e
        }
    });
    var gt = function () {
            function e(t, n) {
                ft(this, e), this.initialValue = t[n], this.domElement = document.createElement("div"), this.object = t, this.property = n, this.__onChange = void 0, this.__onFinishChange = void 0
            }
            return lt(e, [{
                key: "onChange",
                value: function (e) {
                    return this.__onChange = e, this
                }
            }, {
                key: "onFinishChange",
                value: function (e) {
                    return this.__onFinishChange = e, this
                }
            }, {
                key: "setValue",
                value: function (e) {
                    return this.object[this.property] = e, this.__onChange && this.__onChange.call(this, e), this.updateDisplay(), this
                }
            }, {
                key: "getValue",
                value: function () {
                    return this.object[this.property]
                }
            }, {
                key: "updateDisplay",
                value: function () {
                    return this
                }
            }, {
                key: "isModified",
                value: function () {
                    return this.initialValue !== this.getValue()
                }
            }]), e
        }(),
        _t = {};
    nt.each({
        HTMLEvents: ["change"],
        MouseEvents: ["click", "mousemove", "mousedown", "mouseup", "mouseover"],
        KeyboardEvents: ["keydown"]
    }, (function (e, t) {
        nt.each(e, (function (e) {
            _t[e] = t
        }))
    }));
    var yt = /(\d+(\.\d+)?)px/;

    function xt(e) {
        if ("0" === e || nt.isUndefined(e)) return 0;
        var t = e.match(yt);
        return nt.isNull(t) ? 0 : parseFloat(t[1])
    }
    var wt = {
            makeSelectable: function (e, t) {
                void 0 !== e && void 0 !== e.style && (e.onselectstart = t ? function () {
                    return !1
                } : function () {}, e.style.MozUserSelect = t ? "auto" : "none", e.style.KhtmlUserSelect = t ? "auto" : "none", e.unselectable = t ? "on" : "off")
            },
            makeFullscreen: function (e, t, n) {
                var r = n,
                    i = t;
                nt.isUndefined(i) && (i = !0), nt.isUndefined(r) && (r = !0), e.style.position = "absolute", i && (e.style.left = 0, e.style.right = 0), r && (e.style.top = 0, e.style.bottom = 0)
            },
            fakeEvent: function (e, t, n, r) {
                var i = n || {},
                    a = _t[t];
                if (!a) throw new Error("Event type " + t + " not supported.");
                var o = document.createEvent(a);
                switch (a) {
                    case "MouseEvents":
                        var u = i.x || i.clientX || 0,
                            s = i.y || i.clientY || 0;
                        o.initMouseEvent(t, i.bubbles || !1, i.cancelable || !0, window, i.clickCount || 1, 0, 0, u, s, !1, !1, !1, !1, 0, null);
                        break;
                    case "KeyboardEvents":
                        var c = o.initKeyboardEvent || o.initKeyEvent;
                        nt.defaults(i, {
                            cancelable: !0,
                            ctrlKey: !1,
                            altKey: !1,
                            shiftKey: !1,
                            metaKey: !1,
                            keyCode: void 0,
                            charCode: void 0
                        }), c(t, i.bubbles || !1, i.cancelable, window, i.ctrlKey, i.altKey, i.shiftKey, i.metaKey, i.keyCode, i.charCode);
                        break;
                    default:
                        o.initEvent(t, i.bubbles || !1, i.cancelable || !0)
                }
                nt.defaults(o, r), e.dispatchEvent(o)
            },
            bind: function (e, t, n, r) {
                var i = r || !1;
                return e.addEventListener ? e.addEventListener(t, n, i) : e.attachEvent && e.attachEvent("on" + t, n), wt
            },
            unbind: function (e, t, n, r) {
                var i = r || !1;
                return e.removeEventListener ? e.removeEventListener(t, n, i) : e.detachEvent && e.detachEvent("on" + t, n), wt
            },
            addClass: function (e, t) {
                if (void 0 === e.className) e.className = t;
                else if (e.className !== t) {
                    var n = e.className.split(/ +/); - 1 === n.indexOf(t) && (n.push(t), e.className = n.join(" ").replace(/^\s+/, "").replace(/\s+$/, ""))
                }
                return wt
            },
            removeClass: function (e, t) {
                if (t)
                    if (e.className === t) e.removeAttribute("class");
                    else {
                        var n = e.className.split(/ +/),
                            r = n.indexOf(t); - 1 !== r && (n.splice(r, 1), e.className = n.join(" "))
                    }
                else e.className = void 0;
                return wt
            },
            hasClass: function (e, t) {
                return new RegExp("(?:^|\\s+)" + t + "(?:\\s+|$)").test(e.className) || !1
            },
            getWidth: function (e) {
                var t = getComputedStyle(e);
                return xt(t["border-left-width"]) + xt(t["border-right-width"]) + xt(t["padding-left"]) + xt(t["padding-right"]) + xt(t.width)
            },
            getHeight: function (e) {
                var t = getComputedStyle(e);
                return xt(t["border-top-width"]) + xt(t["border-bottom-width"]) + xt(t["padding-top"]) + xt(t["padding-bottom"]) + xt(t.height)
            },
            getOffset: function (e) {
                var t = e,
                    n = {
                        left: 0,
                        top: 0
                    };
                if (t.offsetParent)
                    do {
                        n.left += t.offsetLeft, n.top += t.offsetTop, t = t.offsetParent
                    } while (t);
                return n
            },
            isActive: function (e) {
                return e === document.activeElement && (e.type || e.href)
            }
        },
        kt = function (e) {
            function t(e, n) {
                ft(this, t);
                var r = mt(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e, n)),
                    i = r;
                return r.__prev = r.getValue(), r.__checkbox = document.createElement("input"), r.__checkbox.setAttribute("type", "checkbox"), wt.bind(r.__checkbox, "change", (function () {
                    i.setValue(!i.__prev)
                }), !1), r.domElement.appendChild(r.__checkbox), r.updateDisplay(), r
            }
            return pt(t, e), lt(t, [{
                key: "setValue",
                value: function (e) {
                    var n = dt(t.prototype.__proto__ || Object.getPrototypeOf(t.prototype), "setValue", this).call(this, e);
                    return this.__onFinishChange && this.__onFinishChange.call(this, this.getValue()), this.__prev = this.getValue(), n
                }
            }, {
                key: "updateDisplay",
                value: function () {
                    return !0 === this.getValue() ? (this.__checkbox.setAttribute("checked", "checked"), this.__checkbox.checked = !0, this.__prev = !0) : (this.__checkbox.checked = !1, this.__prev = !1), dt(t.prototype.__proto__ || Object.getPrototypeOf(t.prototype), "updateDisplay", this).call(this)
                }
            }]), t
        }(gt),
        At = function (e) {
            function t(e, n, r) {
                ft(this, t);
                var i = mt(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e, n)),
                    a = r,
                    o = i;
                if (i.__select = document.createElement("select"), nt.isArray(a)) {
                    var u = {};
                    nt.each(a, (function (e) {
                        u[e] = e
                    })), a = u
                }
                return nt.each(a, (function (e, t) {
                    var n = document.createElement("option");
                    n.innerHTML = t, n.setAttribute("value", e), o.__select.appendChild(n)
                })), i.updateDisplay(), wt.bind(i.__select, "change", (function () {
                    var e = this.options[this.selectedIndex].value;
                    o.setValue(e)
                })), i.domElement.appendChild(i.__select), i
            }
            return pt(t, e), lt(t, [{
                key: "setValue",
                value: function (e) {
                    var n = dt(t.prototype.__proto__ || Object.getPrototypeOf(t.prototype), "setValue", this).call(this, e);
                    return this.__onFinishChange && this.__onFinishChange.call(this, this.getValue()), n
                }
            }, {
                key: "updateDisplay",
                value: function () {
                    return wt.isActive(this.__select) ? this : (this.__select.value = this.getValue(), dt(t.prototype.__proto__ || Object.getPrototypeOf(t.prototype), "updateDisplay", this).call(this))
                }
            }]), t
        }(gt),
        St = function (e) {
            function t(e, n) {
                ft(this, t);
                var r = mt(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e, n)),
                    i = r;

                function a() {
                    i.setValue(i.__input.value)
                }
                return r.__input = document.createElement("input"), r.__input.setAttribute("type", "text"), wt.bind(r.__input, "keyup", a), wt.bind(r.__input, "change", a), wt.bind(r.__input, "blur", (function () {
                    i.__onFinishChange && i.__onFinishChange.call(i, i.getValue())
                })), wt.bind(r.__input, "keydown", (function (e) {
                    13 === e.keyCode && this.blur()
                })), r.updateDisplay(), r.domElement.appendChild(r.__input), r
            }
            return pt(t, e), lt(t, [{
                key: "updateDisplay",
                value: function () {
                    return wt.isActive(this.__input) || (this.__input.value = this.getValue()), dt(t.prototype.__proto__ || Object.getPrototypeOf(t.prototype), "updateDisplay", this).call(this)
                }
            }]), t
        }(gt);

    function Et(e) {
        var t = e.toString();
        return t.indexOf(".") > -1 ? t.length - t.indexOf(".") - 1 : 0
    }
    var Ct = function (e) {
        function t(e, n, r) {
            ft(this, t);
            var i = mt(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e, n)),
                a = r || {};
            return i.__min = a.min, i.__max = a.max, i.__step = a.step, nt.isUndefined(i.__step) ? 0 === i.initialValue ? i.__impliedStep = 1 : i.__impliedStep = Math.pow(10, Math.floor(Math.log(Math.abs(i.initialValue)) / Math.LN10)) / 10 : i.__impliedStep = i.__step, i.__precision = Et(i.__impliedStep), i
        }
        return pt(t, e), lt(t, [{
            key: "setValue",
            value: function (e) {
                var n = e;
                return void 0 !== this.__min && n < this.__min ? n = this.__min : void 0 !== this.__max && n > this.__max && (n = this.__max), void 0 !== this.__step && n % this.__step != 0 && (n = Math.round(n / this.__step) * this.__step), dt(t.prototype.__proto__ || Object.getPrototypeOf(t.prototype), "setValue", this).call(this, n)
            }
        }, {
            key: "min",
            value: function (e) {
                return this.__min = e, this
            }
        }, {
            key: "max",
            value: function (e) {
                return this.__max = e, this
            }
        }, {
            key: "step",
            value: function (e) {
                return this.__step = e, this.__impliedStep = e, this.__precision = Et(e), this
            }
        }]), t
    }(gt);
    var Ot = function (e) {
        function t(e, n, r) {
            ft(this, t);
            var i = mt(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e, n, r));
            i.__truncationSuspended = !1;
            var a = i,
                o = void 0;

            function u() {
                a.__onFinishChange && a.__onFinishChange.call(a, a.getValue())
            }

            function s(e) {
                var t = o - e.clientY;
                a.setValue(a.getValue() + t * a.__impliedStep), o = e.clientY
            }

            function c() {
                wt.unbind(window, "mousemove", s), wt.unbind(window, "mouseup", c), u()
            }
            return i.__input = document.createElement("input"), i.__input.setAttribute("type", "text"), wt.bind(i.__input, "change", (function () {
                var e = parseFloat(a.__input.value);
                nt.isNaN(e) || a.setValue(e)
            })), wt.bind(i.__input, "blur", (function () {
                u()
            })), wt.bind(i.__input, "mousedown", (function (e) {
                wt.bind(window, "mousemove", s), wt.bind(window, "mouseup", c), o = e.clientY
            })), wt.bind(i.__input, "keydown", (function (e) {
                13 === e.keyCode && (a.__truncationSuspended = !0, this.blur(), a.__truncationSuspended = !1, u())
            })), i.updateDisplay(), i.domElement.appendChild(i.__input), i
        }
        return pt(t, e), lt(t, [{
            key: "updateDisplay",
            value: function () {
                var e, n, r;
                return this.__input.value = this.__truncationSuspended ? this.getValue() : (e = this.getValue(), n = this.__precision, r = Math.pow(10, n), Math.round(e * r) / r), dt(t.prototype.__proto__ || Object.getPrototypeOf(t.prototype), "updateDisplay", this).call(this)
            }
        }]), t
    }(Ct);

    function Tt(e, t, n, r, i) {
        return r + (e - t) / (n - t) * (i - r)
    }
    var Mt = function (e) {
            function t(e, n, r, i, a) {
                ft(this, t);
                var o = mt(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e, n, {
                        min: r,
                        max: i,
                        step: a
                    })),
                    u = o;

                function s(e) {
                    e.preventDefault();
                    var t = u.__background.getBoundingClientRect();
                    return u.setValue(Tt(e.clientX, t.left, t.right, u.__min, u.__max)), !1
                }

                function c() {
                    wt.unbind(window, "mousemove", s), wt.unbind(window, "mouseup", c), u.__onFinishChange && u.__onFinishChange.call(u, u.getValue())
                }

                function f(e) {
                    var t = e.touches[0].clientX,
                        n = u.__background.getBoundingClientRect();
                    u.setValue(Tt(t, n.left, n.right, u.__min, u.__max))
                }

                function l() {
                    wt.unbind(window, "touchmove", f), wt.unbind(window, "touchend", l), u.__onFinishChange && u.__onFinishChange.call(u, u.getValue())
                }
                return o.__background = document.createElement("div"), o.__foreground = document.createElement("div"), wt.bind(o.__background, "mousedown", (function (e) {
                    document.activeElement.blur(), wt.bind(window, "mousemove", s), wt.bind(window, "mouseup", c), s(e)
                })), wt.bind(o.__background, "touchstart", (function (e) {
                    if (1 !== e.touches.length) return;
                    wt.bind(window, "touchmove", f), wt.bind(window, "touchend", l), f(e)
                })), wt.addClass(o.__background, "slider"), wt.addClass(o.__foreground, "slider-fg"), o.updateDisplay(), o.__background.appendChild(o.__foreground), o.domElement.appendChild(o.__background), o
            }
            return pt(t, e), lt(t, [{
                key: "updateDisplay",
                value: function () {
                    var e = (this.getValue() - this.__min) / (this.__max - this.__min);
                    return this.__foreground.style.width = 100 * e + "%", dt(t.prototype.__proto__ || Object.getPrototypeOf(t.prototype), "updateDisplay", this).call(this)
                }
            }]), t
        }(Ct),
        jt = function (e) {
            function t(e, n, r) {
                ft(this, t);
                var i = mt(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e, n)),
                    a = i;
                return i.__button = document.createElement("div"), i.__button.innerHTML = void 0 === r ? "Fire" : r, wt.bind(i.__button, "click", (function (e) {
                    return e.preventDefault(), a.fire(), !1
                })), wt.addClass(i.__button, "button"), i.domElement.appendChild(i.__button), i
            }
            return pt(t, e), lt(t, [{
                key: "fire",
                value: function () {
                    this.__onChange && this.__onChange.call(this), this.getValue().call(this.object), this.__onFinishChange && this.__onFinishChange.call(this, this.getValue())
                }
            }]), t
        }(gt),
        Dt = function (e) {
            function t(e, n) {
                ft(this, t);
                var r = mt(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e, n));
                r.__color = new ht(r.getValue()), r.__temp = new ht(0);
                var i = r;
                r.domElement = document.createElement("div"), wt.makeSelectable(r.domElement, !1), r.__selector = document.createElement("div"), r.__selector.className = "selector", r.__saturation_field = document.createElement("div"), r.__saturation_field.className = "saturation-field", r.__field_knob = document.createElement("div"), r.__field_knob.className = "field-knob", r.__field_knob_border = "2px solid ", r.__hue_knob = document.createElement("div"), r.__hue_knob.className = "hue-knob", r.__hue_field = document.createElement("div"), r.__hue_field.className = "hue-field", r.__input = document.createElement("input"), r.__input.type = "text", r.__input_textShadow = "0 1px 1px ", wt.bind(r.__input, "keydown", (function (e) {
                    13 === e.keyCode && l.call(this)
                })), wt.bind(r.__input, "blur", l), wt.bind(r.__selector, "mousedown", (function () {
                    wt.addClass(this, "drag").bind(window, "mouseup", (function () {
                        wt.removeClass(i.__selector, "drag")
                    }))
                })), wt.bind(r.__selector, "touchstart", (function () {
                    wt.addClass(this, "drag").bind(window, "touchend", (function () {
                        wt.removeClass(i.__selector, "drag")
                    }))
                }));
                var a, o = document.createElement("div");

                function u(e) {
                    p(e), wt.bind(window, "mousemove", p), wt.bind(window, "touchmove", p), wt.bind(window, "mouseup", c), wt.bind(window, "touchend", c)
                }

                function s(e) {
                    m(e), wt.bind(window, "mousemove", m), wt.bind(window, "touchmove", m), wt.bind(window, "mouseup", f), wt.bind(window, "touchend", f)
                }

                function c() {
                    wt.unbind(window, "mousemove", p), wt.unbind(window, "touchmove", p), wt.unbind(window, "mouseup", c), wt.unbind(window, "touchend", c), d()
                }

                function f() {
                    wt.unbind(window, "mousemove", m), wt.unbind(window, "touchmove", m), wt.unbind(window, "mouseup", f), wt.unbind(window, "touchend", f), d()
                }

                function l() {
                    var e = ot(this.value);
                    !1 !== e ? (i.__color.__state = e, i.setValue(i.__color.toOriginal())) : this.value = i.__color.toString()
                }

                function d() {
                    i.__onFinishChange && i.__onFinishChange.call(i, i.__color.toOriginal())
                }

                function p(e) {
                    -1 === e.type.indexOf("touch") && e.preventDefault();
                    var t = i.__saturation_field.getBoundingClientRect(),
                        n = e.touches && e.touches[0] || e,
                        r = n.clientX,
                        a = n.clientY,
                        o = (r - t.left) / (t.right - t.left),
                        u = 1 - (a - t.top) / (t.bottom - t.top);
                    return u > 1 ? u = 1 : u < 0 && (u = 0), o > 1 ? o = 1 : o < 0 && (o = 0), i.__color.v = u, i.__color.s = o, i.setValue(i.__color.toOriginal()), !1
                }

                function m(e) {
                    -1 === e.type.indexOf("touch") && e.preventDefault();
                    var t = i.__hue_field.getBoundingClientRect(),
                        n = 1 - ((e.touches && e.touches[0] || e).clientY - t.top) / (t.bottom - t.top);
                    return n > 1 ? n = 1 : n < 0 && (n = 0), i.__color.h = 360 * n, i.setValue(i.__color.toOriginal()), !1
                }
                return nt.extend(r.__selector.style, {
                    width: "122px",
                    height: "102px",
                    padding: "3px",
                    backgroundColor: "#222",
                    boxShadow: "0px 1px 3px rgba(0,0,0,0.3)"
                }), nt.extend(r.__field_knob.style, {
                    position: "absolute",
                    width: "12px",
                    height: "12px",
                    border: r.__field_knob_border + (r.__color.v < .5 ? "#fff" : "#000"),
                    boxShadow: "0px 1px 3px rgba(0,0,0,0.5)",
                    borderRadius: "12px",
                    zIndex: 1
                }), nt.extend(r.__hue_knob.style, {
                    position: "absolute",
                    width: "15px",
                    height: "2px",
                    borderRight: "4px solid #fff",
                    zIndex: 1
                }), nt.extend(r.__saturation_field.style, {
                    width: "100px",
                    height: "100px",
                    border: "1px solid #555",
                    marginRight: "3px",
                    display: "inline-block",
                    cursor: "pointer"
                }), nt.extend(o.style, {
                    width: "100%",
                    height: "100%",
                    background: "none"
                }), Rt(o, "top", "rgba(0,0,0,0)", "#000"), nt.extend(r.__hue_field.style, {
                    width: "15px",
                    height: "100px",
                    border: "1px solid #555",
                    cursor: "ns-resize",
                    position: "absolute",
                    top: "3px",
                    right: "3px"
                }), (a = r.__hue_field).style.background = "", a.style.cssText += "background: -moz-linear-gradient(top,  #ff0000 0%, #ff00ff 17%, #0000ff 34%, #00ffff 50%, #00ff00 67%, #ffff00 84%, #ff0000 100%);", a.style.cssText += "background: -webkit-linear-gradient(top,  #ff0000 0%,#ff00ff 17%,#0000ff 34%,#00ffff 50%,#00ff00 67%,#ffff00 84%,#ff0000 100%);", a.style.cssText += "background: -o-linear-gradient(top,  #ff0000 0%,#ff00ff 17%,#0000ff 34%,#00ffff 50%,#00ff00 67%,#ffff00 84%,#ff0000 100%);", a.style.cssText += "background: -ms-linear-gradient(top,  #ff0000 0%,#ff00ff 17%,#0000ff 34%,#00ffff 50%,#00ff00 67%,#ffff00 84%,#ff0000 100%);", a.style.cssText += "background: linear-gradient(top,  #ff0000 0%,#ff00ff 17%,#0000ff 34%,#00ffff 50%,#00ff00 67%,#ffff00 84%,#ff0000 100%);", nt.extend(r.__input.style, {
                    outline: "none",
                    textAlign: "center",
                    color: "#fff",
                    border: 0,
                    fontWeight: "bold",
                    textShadow: r.__input_textShadow + "rgba(0,0,0,0.7)"
                }), wt.bind(r.__saturation_field, "mousedown", u), wt.bind(r.__saturation_field, "touchstart", u), wt.bind(r.__field_knob, "mousedown", u), wt.bind(r.__field_knob, "touchstart", u), wt.bind(r.__hue_field, "mousedown", s), wt.bind(r.__hue_field, "touchstart", s), r.__saturation_field.appendChild(o), r.__selector.appendChild(r.__field_knob), r.__selector.appendChild(r.__saturation_field), r.__selector.appendChild(r.__hue_field), r.__hue_field.appendChild(r.__hue_knob), r.domElement.appendChild(r.__input), r.domElement.appendChild(r.__selector), r.updateDisplay(), r
            }
            return pt(t, e), lt(t, [{
                key: "updateDisplay",
                value: function () {
                    var e = ot(this.getValue());
                    if (!1 !== e) {
                        var t = !1;
                        nt.each(ht.COMPONENTS, (function (n) {
                            if (!nt.isUndefined(e[n]) && !nt.isUndefined(this.__color.__state[n]) && e[n] !== this.__color.__state[n]) return t = !0, {}
                        }), this), t && nt.extend(this.__color.__state, e)
                    }
                    nt.extend(this.__temp.__state, this.__color.__state), this.__temp.a = 1;
                    var n = this.__color.v < .5 || this.__color.s > .5 ? 255 : 0,
                        r = 255 - n;
                    nt.extend(this.__field_knob.style, {
                        marginLeft: 100 * this.__color.s - 7 + "px",
                        marginTop: 100 * (1 - this.__color.v) - 7 + "px",
                        backgroundColor: this.__temp.toHexString(),
                        border: this.__field_knob_border + "rgb(" + n + "," + n + "," + n + ")"
                    }), this.__hue_knob.style.marginTop = 100 * (1 - this.__color.h / 360) + "px", this.__temp.s = 1, this.__temp.v = 1, Rt(this.__saturation_field, "left", "#fff", this.__temp.toHexString()), this.__input.value = this.__color.toString(), nt.extend(this.__input.style, {
                        backgroundColor: this.__color.toHexString(),
                        color: "rgb(" + n + "," + n + "," + n + ")",
                        textShadow: this.__input_textShadow + "rgba(" + r + "," + r + "," + r + ",.7)"
                    })
                }
            }]), t
        }(gt),
        Ft = ["-moz-", "-o-", "-webkit-", "-ms-", ""];

    function Rt(e, t, n, r) {
        e.style.background = "", nt.each(Ft, (function (i) {
            e.style.cssText += "background: " + i + "linear-gradient(" + t + ", " + n + " 0%, " + r + " 100%); "
        }))
    }
    var It = function (e, t) {
            var n = t || document,
                r = document.createElement("style");
            r.type = "text/css", r.innerHTML = e;
            var i = n.getElementsByTagName("head")[0];
            try {
                i.appendChild(r)
            } catch (e) {}
        },
        Lt = '<div id="dg-save" class="dg dialogue">\n\n  Here\'s the new load parameter for your <code>GUI</code>\'s constructor:\n\n  <textarea id="dg-new-constructor"></textarea>\n\n  <div id="dg-save-locally">\n\n    <input id="dg-local-storage" type="checkbox"/> Automatically save\n    values to <code>localStorage</code> on exit.\n\n    <div id="dg-local-explain">The values saved to <code>localStorage</code> will\n      override those passed to <code>dat.GUI</code>\'s constructor. This makes it\n      easier to work incrementally, but <code>localStorage</code> is fragile,\n      and your friends may not see the same values you do.\n\n    </div>\n\n  </div>\n\n</div>',
        Bt = function (e, t) {
            var n = e[t];
            return nt.isArray(arguments[2]) || nt.isObject(arguments[2]) ? new At(e, t, arguments[2]) : nt.isNumber(n) ? nt.isNumber(arguments[2]) && nt.isNumber(arguments[3]) ? nt.isNumber(arguments[4]) ? new Mt(e, t, arguments[2], arguments[3], arguments[4]) : new Mt(e, t, arguments[2], arguments[3]) : nt.isNumber(arguments[4]) ? new Ot(e, t, {
                min: arguments[2],
                max: arguments[3],
                step: arguments[4]
            }) : new Ot(e, t, {
                min: arguments[2],
                max: arguments[3]
            }) : nt.isString(n) ? new St(e, t) : nt.isFunction(n) ? new jt(e, t, "") : nt.isBoolean(n) ? new kt(e, t) : null
        };
    var Pt = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function (e) {
            setTimeout(e, 1e3 / 60)
        },
        zt = function () {
            function e() {
                ft(this, e), this.backgroundElement = document.createElement("div"), nt.extend(this.backgroundElement.style, {
                    backgroundColor: "rgba(0,0,0,0.8)",
                    top: 0,
                    left: 0,
                    display: "none",
                    zIndex: "1000",
                    opacity: 0,
                    WebkitTransition: "opacity 0.2s linear",
                    transition: "opacity 0.2s linear"
                }), wt.makeFullscreen(this.backgroundElement), this.backgroundElement.style.position = "fixed", this.domElement = document.createElement("div"), nt.extend(this.domElement.style, {
                    position: "fixed",
                    display: "none",
                    zIndex: "1001",
                    opacity: 0,
                    WebkitTransition: "-webkit-transform 0.2s ease-out, opacity 0.2s linear",
                    transition: "transform 0.2s ease-out, opacity 0.2s linear"
                }), document.body.appendChild(this.backgroundElement), document.body.appendChild(this.domElement);
                var t = this;
                wt.bind(this.backgroundElement, "click", (function () {
                    t.hide()
                }))
            }
            return lt(e, [{
                key: "show",
                value: function () {
                    var e = this;
                    this.backgroundElement.style.display = "block", this.domElement.style.display = "block", this.domElement.style.opacity = 0, this.domElement.style.webkitTransform = "scale(1.1)", this.layout(), nt.defer((function () {
                        e.backgroundElement.style.opacity = 1, e.domElement.style.opacity = 1, e.domElement.style.webkitTransform = "scale(1)"
                    }))
                }
            }, {
                key: "hide",
                value: function () {
                    var e = this,
                        t = function t() {
                            e.domElement.style.display = "none", e.backgroundElement.style.display = "none", wt.unbind(e.domElement, "webkitTransitionEnd", t), wt.unbind(e.domElement, "transitionend", t), wt.unbind(e.domElement, "oTransitionEnd", t)
                        };
                    wt.bind(this.domElement, "webkitTransitionEnd", t), wt.bind(this.domElement, "transitionend", t), wt.bind(this.domElement, "oTransitionEnd", t), this.backgroundElement.style.opacity = 0, this.domElement.style.opacity = 0, this.domElement.style.webkitTransform = "scale(1.1)"
                }
            }, {
                key: "layout",
                value: function () {
                    this.domElement.style.left = window.innerWidth / 2 - wt.getWidth(this.domElement) / 2 + "px", this.domElement.style.top = window.innerHeight / 2 - wt.getHeight(this.domElement) / 2 + "px"
                }
            }]), e
        }();
    It(function (e) {
        if (e && "undefined" != typeof window) {
            var t = document.createElement("style");
            return t.setAttribute("type", "text/css"), t.innerHTML = e, document.head.appendChild(t), e
        }
    }(".dg ul{list-style:none;margin:0;padding:0;width:100%;clear:both}.dg.ac{position:fixed;top:0;left:0;right:0;height:0;z-index:0}.dg:not(.ac) .main{overflow:hidden}.dg.main{-webkit-transition:opacity .1s linear;-o-transition:opacity .1s linear;-moz-transition:opacity .1s linear;transition:opacity .1s linear}.dg.main.taller-than-window{overflow-y:auto}.dg.main.taller-than-window .close-button{opacity:1;margin-top:-1px;border-top:1px solid #2c2c2c}.dg.main ul.closed .close-button{opacity:1 !important}.dg.main:hover .close-button,.dg.main .close-button.drag{opacity:1}.dg.main .close-button{-webkit-transition:opacity .1s linear;-o-transition:opacity .1s linear;-moz-transition:opacity .1s linear;transition:opacity .1s linear;border:0;line-height:19px;height:20px;cursor:pointer;text-align:center;background-color:#000}.dg.main .close-button.close-top{position:relative}.dg.main .close-button.close-bottom{position:absolute}.dg.main .close-button:hover{background-color:#111}.dg.a{float:right;margin-right:15px;overflow-y:visible}.dg.a.has-save>ul.close-top{margin-top:0}.dg.a.has-save>ul.close-bottom{margin-top:27px}.dg.a.has-save>ul.closed{margin-top:0}.dg.a .save-row{top:0;z-index:1002}.dg.a .save-row.close-top{position:relative}.dg.a .save-row.close-bottom{position:fixed}.dg li{-webkit-transition:height .1s ease-out;-o-transition:height .1s ease-out;-moz-transition:height .1s ease-out;transition:height .1s ease-out;-webkit-transition:overflow .1s linear;-o-transition:overflow .1s linear;-moz-transition:overflow .1s linear;transition:overflow .1s linear}.dg li:not(.folder){cursor:auto;height:27px;line-height:27px;padding:0 4px 0 5px}.dg li.folder{padding:0;border-left:4px solid rgba(0,0,0,0)}.dg li.title{cursor:pointer;margin-left:-4px}.dg .closed li:not(.title),.dg .closed ul li,.dg .closed ul li>*{height:0;overflow:hidden;border:0}.dg .cr{clear:both;padding-left:3px;height:27px;overflow:hidden}.dg .property-name{cursor:default;float:left;clear:left;width:40%;overflow:hidden;text-overflow:ellipsis}.dg .c{float:left;width:60%;position:relative}.dg .c input[type=text]{border:0;margin-top:4px;padding:3px;width:100%;float:right}.dg .has-slider input[type=text]{width:30%;margin-left:0}.dg .slider{float:left;width:66%;margin-left:-5px;margin-right:0;height:19px;margin-top:4px}.dg .slider-fg{height:100%}.dg .c input[type=checkbox]{margin-top:7px}.dg .c select{margin-top:5px}.dg .cr.function,.dg .cr.function .property-name,.dg .cr.function *,.dg .cr.boolean,.dg .cr.boolean *{cursor:pointer}.dg .cr.color{overflow:visible}.dg .selector{display:none;position:absolute;margin-left:-9px;margin-top:23px;z-index:10}.dg .c:hover .selector,.dg .selector.drag{display:block}.dg li.save-row{padding:0}.dg li.save-row .button{display:inline-block;padding:0px 6px}.dg.dialogue{background-color:#222;width:460px;padding:15px;font-size:13px;line-height:15px}#dg-new-constructor{padding:10px;color:#222;font-family:Monaco, monospace;font-size:10px;border:0;resize:none;box-shadow:inset 1px 1px 1px #888;word-wrap:break-word;margin:12px 0;display:block;width:440px;overflow-y:scroll;height:100px;position:relative}#dg-local-explain{display:none;font-size:11px;line-height:17px;border-radius:3px;background-color:#333;padding:8px;margin-top:10px}#dg-local-explain code{font-size:10px}#dat-gui-save-locally{display:none}.dg{color:#eee;font:11px 'Lucida Grande', sans-serif;text-shadow:0 -1px 0 #111}.dg.main::-webkit-scrollbar{width:5px;background:#1a1a1a}.dg.main::-webkit-scrollbar-corner{height:0;display:none}.dg.main::-webkit-scrollbar-thumb{border-radius:5px;background:#676767}.dg li:not(.folder){background:#1a1a1a;border-bottom:1px solid #2c2c2c}.dg li.save-row{line-height:25px;background:#dad5cb;border:0}.dg li.save-row select{margin-left:5px;width:108px}.dg li.save-row .button{margin-left:5px;margin-top:1px;border-radius:2px;font-size:9px;line-height:7px;padding:4px 4px 5px 4px;background:#c5bdad;color:#fff;text-shadow:0 1px 0 #b0a58f;box-shadow:0 -1px 0 #b0a58f;cursor:pointer}.dg li.save-row .button.gears{background:#c5bdad url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAANCAYAAAB/9ZQ7AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAQJJREFUeNpiYKAU/P//PwGIC/ApCABiBSAW+I8AClAcgKxQ4T9hoMAEUrxx2QSGN6+egDX+/vWT4e7N82AMYoPAx/evwWoYoSYbACX2s7KxCxzcsezDh3evFoDEBYTEEqycggWAzA9AuUSQQgeYPa9fPv6/YWm/Acx5IPb7ty/fw+QZblw67vDs8R0YHyQhgObx+yAJkBqmG5dPPDh1aPOGR/eugW0G4vlIoTIfyFcA+QekhhHJhPdQxbiAIguMBTQZrPD7108M6roWYDFQiIAAv6Aow/1bFwXgis+f2LUAynwoIaNcz8XNx3Dl7MEJUDGQpx9gtQ8YCueB+D26OECAAQDadt7e46D42QAAAABJRU5ErkJggg==) 2px 1px no-repeat;height:7px;width:8px}.dg li.save-row .button:hover{background-color:#bab19e;box-shadow:0 -1px 0 #b0a58f}.dg li.folder{border-bottom:0}.dg li.title{padding-left:16px;background:#000 url(data:image/gif;base64,R0lGODlhBQAFAJEAAP////Pz8////////yH5BAEAAAIALAAAAAAFAAUAAAIIlI+hKgFxoCgAOw==) 6px 10px no-repeat;cursor:pointer;border-bottom:1px solid rgba(255,255,255,0.2)}.dg .closed li.title{background-image:url(data:image/gif;base64,R0lGODlhBQAFAJEAAP////Pz8////////yH5BAEAAAIALAAAAAAFAAUAAAIIlGIWqMCbWAEAOw==)}.dg .cr.boolean{border-left:3px solid #806787}.dg .cr.color{border-left:3px solid}.dg .cr.function{border-left:3px solid #e61d5f}.dg .cr.number{border-left:3px solid #2FA1D6}.dg .cr.number input[type=text]{color:#2FA1D6}.dg .cr.string{border-left:3px solid #1ed36f}.dg .cr.string input[type=text]{color:#1ed36f}.dg .cr.function:hover,.dg .cr.boolean:hover{background:#111}.dg .c input[type=text]{background:#303030;outline:none}.dg .c input[type=text]:hover{background:#3c3c3c}.dg .c input[type=text]:focus{background:#494949;color:#fff}.dg .c .slider{background:#303030;cursor:ew-resize}.dg .c .slider-fg{background:#2FA1D6;max-width:100%}.dg .c .slider:hover{background:#3c3c3c}.dg .c .slider:hover .slider-fg{background:#44abda}\n"));
    var Nt = "Default",
        Ht = function () {
            try {
                return !!window.localStorage
            } catch (e) {
                return !1
            }
        }(),
        Ut = void 0,
        Vt = !0,
        Gt = void 0,
        Wt = !1,
        Yt = [],
        Xt = function e(t) {
            var n = this,
                r = t || {};
            this.domElement = document.createElement("div"), this.__ul = document.createElement("ul"), this.domElement.appendChild(this.__ul), wt.addClass(this.domElement, "dg"), this.__folders = {}, this.__controllers = [], this.__rememberedObjects = [], this.__rememberedObjectIndecesToControllers = [], this.__listening = [], r = nt.defaults(r, {
                closeOnTop: !1,
                autoPlace: !0,
                width: e.DEFAULT_WIDTH
            }), r = nt.defaults(r, {
                resizable: r.autoPlace,
                hideable: r.autoPlace
            }), nt.isUndefined(r.load) ? r.load = {
                preset: Nt
            } : r.preset && (r.load.preset = r.preset), nt.isUndefined(r.parent) && r.hideable && Yt.push(this), r.resizable = nt.isUndefined(r.parent) && r.resizable, r.autoPlace && nt.isUndefined(r.scrollable) && (r.scrollable = !0);
            var i, a = Ht && "true" === localStorage.getItem($t(this, "isLocal")),
                o = void 0,
                u = void 0;
            if (Object.defineProperties(this, {
                    parent: {
                        get: function () {
                            return r.parent
                        }
                    },
                    scrollable: {
                        get: function () {
                            return r.scrollable
                        }
                    },
                    autoPlace: {
                        get: function () {
                            return r.autoPlace
                        }
                    },
                    closeOnTop: {
                        get: function () {
                            return r.closeOnTop
                        }
                    },
                    preset: {
                        get: function () {
                            return n.parent ? n.getRoot().preset : r.load.preset
                        },
                        set: function (e) {
                            n.parent ? n.getRoot().preset = e : r.load.preset = e,
                                function (e) {
                                    for (var t = 0; t < e.__preset_select.length; t++) e.__preset_select[t].value === e.preset && (e.__preset_select.selectedIndex = t)
                                }(this), n.revert()
                        }
                    },
                    width: {
                        get: function () {
                            return r.width
                        },
                        set: function (e) {
                            r.width = e, an(n, e)
                        }
                    },
                    name: {
                        get: function () {
                            return r.name
                        },
                        set: function (e) {
                            r.name = e, u && (u.innerHTML = r.name)
                        }
                    },
                    closed: {
                        get: function () {
                            return r.closed
                        },
                        set: function (t) {
                            r.closed = t, r.closed ? wt.addClass(n.__ul, e.CLASS_CLOSED) : wt.removeClass(n.__ul, e.CLASS_CLOSED), this.onResize(), n.__closeButton && (n.__closeButton.innerHTML = t ? e.TEXT_OPEN : e.TEXT_CLOSED)
                        }
                    },
                    load: {
                        get: function () {
                            return r.load
                        }
                    },
                    useLocalStorage: {
                        get: function () {
                            return a
                        },
                        set: function (e) {
                            Ht && (a = e, e ? wt.bind(window, "unload", o) : wt.unbind(window, "unload", o), localStorage.setItem($t(n, "isLocal"), e))
                        }
                    }
                }), nt.isUndefined(r.parent)) {
                if (this.closed = r.closed || !1, wt.addClass(this.domElement, e.CLASS_MAIN), wt.makeSelectable(this.domElement, !1), Ht && a) {
                    n.useLocalStorage = !0;
                    var s = localStorage.getItem($t(this, "gui"));
                    s && (r.load = JSON.parse(s))
                }
                this.__closeButton = document.createElement("div"), this.__closeButton.innerHTML = e.TEXT_CLOSED, wt.addClass(this.__closeButton, e.CLASS_CLOSE_BUTTON), r.closeOnTop ? (wt.addClass(this.__closeButton, e.CLASS_CLOSE_TOP), this.domElement.insertBefore(this.__closeButton, this.domElement.childNodes[0])) : (wt.addClass(this.__closeButton, e.CLASS_CLOSE_BOTTOM), this.domElement.appendChild(this.__closeButton)), wt.bind(this.__closeButton, "click", (function () {
                    n.closed = !n.closed
                }))
            } else {
                void 0 === r.closed && (r.closed = !0);
                var c = document.createTextNode(r.name);
                wt.addClass(c, "controller-name"), u = qt(n, c);
                wt.addClass(this.__ul, e.CLASS_CLOSED), wt.addClass(u, "title"), wt.bind(u, "click", (function (e) {
                    return e.preventDefault(), n.closed = !n.closed, !1
                })), r.closed || (this.closed = !1)
            }
            r.autoPlace && (nt.isUndefined(r.parent) && (Vt && (Gt = document.createElement("div"), wt.addClass(Gt, "dg"), wt.addClass(Gt, e.CLASS_AUTO_PLACE_CONTAINER), document.body.appendChild(Gt), Vt = !1), Gt.appendChild(this.domElement), wt.addClass(this.domElement, e.CLASS_AUTO_PLACE)), this.parent || an(n, r.width)), this.__resizeHandler = function () {
                n.onResizeDebounced()
            }, wt.bind(window, "resize", this.__resizeHandler), wt.bind(this.__ul, "webkitTransitionEnd", this.__resizeHandler), wt.bind(this.__ul, "transitionend", this.__resizeHandler), wt.bind(this.__ul, "oTransitionEnd", this.__resizeHandler), this.onResize(), r.resizable && rn(this), o = function () {
                Ht && "true" === localStorage.getItem($t(n, "isLocal")) && localStorage.setItem($t(n, "gui"), JSON.stringify(n.getSaveObject()))
            }, this.saveToLocalStorageIfPossible = o, r.parent || ((i = n.getRoot()).width += 1, nt.defer((function () {
                i.width -= 1
            })))
        };

    function qt(e, t, n) {
        var r = document.createElement("li");
        return t && r.appendChild(t), n ? e.__ul.insertBefore(r, n) : e.__ul.appendChild(r), e.onResize(), r
    }

    function Qt(e) {
        wt.unbind(window, "resize", e.__resizeHandler), e.saveToLocalStorageIfPossible && wt.unbind(window, "unload", e.saveToLocalStorageIfPossible)
    }

    function Kt(e, t) {
        var n = e.__preset_select[e.__preset_select.selectedIndex];
        n.innerHTML = t ? n.value + "*" : n.value
    }

    function Zt(e, t) {
        var n = e.getRoot(),
            r = n.__rememberedObjects.indexOf(t.object);
        if (-1 !== r) {
            var i = n.__rememberedObjectIndecesToControllers[r];
            if (void 0 === i && (i = {}, n.__rememberedObjectIndecesToControllers[r] = i), i[t.property] = t, n.load && n.load.remembered) {
                var a = n.load.remembered,
                    o = void 0;
                if (a[e.preset]) o = a[e.preset];
                else {
                    if (!a[Nt]) return;
                    o = a[Nt]
                }
                if (o[r] && void 0 !== o[r][t.property]) {
                    var u = o[r][t.property];
                    t.initialValue = u, t.setValue(u)
                }
            }
        }
    }

    function Jt(e, t, n, r) {
        if (void 0 === t[n]) throw new Error('Object "' + t + '" has no property "' + n + '"');
        var i = void 0;
        if (r.color) i = new Dt(t, n);
        else {
            var a = [t, n].concat(r.factoryArgs);
            i = Bt.apply(e, a)
        }
        r.before instanceof gt && (r.before = r.before.__li), Zt(e, i), wt.addClass(i.domElement, "c");
        var o = document.createElement("span");
        wt.addClass(o, "property-name"), o.innerHTML = i.property;
        var u = document.createElement("div");
        u.appendChild(o), u.appendChild(i.domElement);
        var s = qt(e, u, r.before);
        return wt.addClass(s, Xt.CLASS_CONTROLLER_ROW), i instanceof Dt ? wt.addClass(s, "color") : wt.addClass(s, ct(i.getValue())),
            function (e, t, n) {
                if (n.__li = t, n.__gui = e, nt.extend(n, {
                        options: function (t) {
                            if (arguments.length > 1) {
                                var r = n.__li.nextElementSibling;
                                return n.remove(), Jt(e, n.object, n.property, {
                                    before: r,
                                    factoryArgs: [nt.toArray(arguments)]
                                })
                            }
                            if (nt.isArray(t) || nt.isObject(t)) {
                                var i = n.__li.nextElementSibling;
                                return n.remove(), Jt(e, n.object, n.property, {
                                    before: i,
                                    factoryArgs: [t]
                                })
                            }
                        },
                        name: function (e) {
                            return n.__li.firstElementChild.firstElementChild.innerHTML = e, n
                        },
                        listen: function () {
                            return n.__gui.listen(n), n
                        },
                        remove: function () {
                            return n.__gui.remove(n), n
                        }
                    }), n instanceof Mt) {
                    var r = new Ot(n.object, n.property, {
                        min: n.__min,
                        max: n.__max,
                        step: n.__step
                    });
                    nt.each(["updateDisplay", "onChange", "onFinishChange", "step", "min", "max"], (function (e) {
                        var t = n[e],
                            i = r[e];
                        n[e] = r[e] = function () {
                            var e = Array.prototype.slice.call(arguments);
                            return i.apply(r, e), t.apply(n, e)
                        }
                    })), wt.addClass(t, "has-slider"), n.domElement.insertBefore(r.domElement, n.domElement.firstElementChild)
                } else if (n instanceof Ot) {
                    var i = function (t) {
                        if (nt.isNumber(n.__min) && nt.isNumber(n.__max)) {
                            var r = n.__li.firstElementChild.firstElementChild.innerHTML,
                                i = n.__gui.__listening.indexOf(n) > -1;
                            n.remove();
                            var a = Jt(e, n.object, n.property, {
                                before: n.__li.nextElementSibling,
                                factoryArgs: [n.__min, n.__max, n.__step]
                            });
                            return a.name(r), i && a.listen(), a
                        }
                        return t
                    };
                    n.min = nt.compose(i, n.min), n.max = nt.compose(i, n.max)
                } else n instanceof kt ? (wt.bind(t, "click", (function () {
                    wt.fakeEvent(n.__checkbox, "click")
                })), wt.bind(n.__checkbox, "click", (function (e) {
                    e.stopPropagation()
                }))) : n instanceof jt ? (wt.bind(t, "click", (function () {
                    wt.fakeEvent(n.__button, "click")
                })), wt.bind(t, "mouseover", (function () {
                    wt.addClass(n.__button, "hover")
                })), wt.bind(t, "mouseout", (function () {
                    wt.removeClass(n.__button, "hover")
                }))) : n instanceof Dt && (wt.addClass(t, "color"), n.updateDisplay = nt.compose((function (e) {
                    return t.style.borderLeftColor = n.__color.toString(), e
                }), n.updateDisplay), n.updateDisplay());
                n.setValue = nt.compose((function (t) {
                    return e.getRoot().__preset_select && n.isModified() && Kt(e.getRoot(), !0), t
                }), n.setValue)
            }(e, s, i), e.__controllers.push(i), i
    }

    function $t(e, t) {
        return document.location.href + "." + t
    }

    function en(e, t, n) {
        var r = document.createElement("option");
        r.innerHTML = t, r.value = t, e.__preset_select.appendChild(r), n && (e.__preset_select.selectedIndex = e.__preset_select.length - 1)
    }

    function tn(e, t) {
        t.style.display = e.useLocalStorage ? "block" : "none"
    }

    function nn(e) {
        var t = e.__save_row = document.createElement("li");
        wt.addClass(e.domElement, "has-save"), e.__ul.insertBefore(t, e.__ul.firstChild), wt.addClass(t, "save-row");
        var n = document.createElement("span");
        n.innerHTML = "&nbsp;", wt.addClass(n, "button gears");
        var r = document.createElement("span");
        r.innerHTML = "Save", wt.addClass(r, "button"), wt.addClass(r, "save");
        var i = document.createElement("span");
        i.innerHTML = "New", wt.addClass(i, "button"), wt.addClass(i, "save-as");
        var a = document.createElement("span");
        a.innerHTML = "Revert", wt.addClass(a, "button"), wt.addClass(a, "revert");
        var o = e.__preset_select = document.createElement("select");
        if (e.load && e.load.remembered ? nt.each(e.load.remembered, (function (t, n) {
                en(e, n, n === e.preset)
            })) : en(e, Nt, !1), wt.bind(o, "change", (function () {
                for (var t = 0; t < e.__preset_select.length; t++) e.__preset_select[t].innerHTML = e.__preset_select[t].value;
                e.preset = this.value
            })), t.appendChild(o), t.appendChild(n), t.appendChild(r), t.appendChild(i), t.appendChild(a), Ht) {
            var u = document.getElementById("dg-local-explain"),
                s = document.getElementById("dg-local-storage");
            document.getElementById("dg-save-locally").style.display = "block", "true" === localStorage.getItem($t(0, "isLocal")) && s.setAttribute("checked", "checked"), tn(e, u), wt.bind(s, "change", (function () {
                e.useLocalStorage = !e.useLocalStorage, tn(e, u)
            }))
        }
        var c = document.getElementById("dg-new-constructor");
        wt.bind(c, "keydown", (function (e) {
            !e.metaKey || 67 !== e.which && 67 !== e.keyCode || Ut.hide()
        })), wt.bind(n, "click", (function () {
            c.innerHTML = JSON.stringify(e.getSaveObject(), void 0, 2), Ut.show(), c.focus(), c.select()
        })), wt.bind(r, "click", (function () {
            e.save()
        })), wt.bind(i, "click", (function () {
            var t = prompt("Enter a new preset name.");
            t && e.saveAs(t)
        })), wt.bind(a, "click", (function () {
            e.revert()
        }))
    }

    function rn(e) {
        var t = void 0;

        function n(n) {
            return n.preventDefault(), e.width += t - n.clientX, e.onResize(), t = n.clientX, !1
        }

        function r() {
            wt.removeClass(e.__closeButton, Xt.CLASS_DRAG), wt.unbind(window, "mousemove", n), wt.unbind(window, "mouseup", r)
        }

        function i(i) {
            return i.preventDefault(), t = i.clientX, wt.addClass(e.__closeButton, Xt.CLASS_DRAG), wt.bind(window, "mousemove", n), wt.bind(window, "mouseup", r), !1
        }
        e.__resize_handle = document.createElement("div"), nt.extend(e.__resize_handle.style, {
            width: "6px",
            marginLeft: "-3px",
            height: "200px",
            cursor: "ew-resize",
            position: "absolute"
        }), wt.bind(e.__resize_handle, "mousedown", i), wt.bind(e.__closeButton, "mousedown", i), e.domElement.insertBefore(e.__resize_handle, e.domElement.firstElementChild)
    }

    function an(e, t) {
        e.domElement.style.width = t + "px", e.__save_row && e.autoPlace && (e.__save_row.style.width = t + "px"), e.__closeButton && (e.__closeButton.style.width = t + "px")
    }

    function on(e, t) {
        var n = {};
        return nt.each(e.__rememberedObjects, (function (r, i) {
            var a = {},
                o = e.__rememberedObjectIndecesToControllers[i];
            nt.each(o, (function (e, n) {
                a[n] = t ? e.initialValue : e.getValue()
            })), n[i] = a
        })), n
    }
    Xt.toggleHide = function () {
        Wt = !Wt, nt.each(Yt, (function (e) {
            e.domElement.style.display = Wt ? "none" : ""
        }))
    }, Xt.CLASS_AUTO_PLACE = "a", Xt.CLASS_AUTO_PLACE_CONTAINER = "ac", Xt.CLASS_MAIN = "main", Xt.CLASS_CONTROLLER_ROW = "cr", Xt.CLASS_TOO_TALL = "taller-than-window", Xt.CLASS_CLOSED = "closed", Xt.CLASS_CLOSE_BUTTON = "close-button", Xt.CLASS_CLOSE_TOP = "close-top", Xt.CLASS_CLOSE_BOTTOM = "close-bottom", Xt.CLASS_DRAG = "drag", Xt.DEFAULT_WIDTH = 245, Xt.TEXT_CLOSED = "Close Controls", Xt.TEXT_OPEN = "Open Controls", Xt._keydownHandler = function (e) {
        "text" === document.activeElement.type || 72 !== e.which && 72 !== e.keyCode || Xt.toggleHide()
    }, wt.bind(window, "keydown", Xt._keydownHandler, !1), nt.extend(Xt.prototype, {
        add: function (e, t) {
            return Jt(this, e, t, {
                factoryArgs: Array.prototype.slice.call(arguments, 2)
            })
        },
        addColor: function (e, t) {
            return Jt(this, e, t, {
                color: !0
            })
        },
        remove: function (e) {
            this.__ul.removeChild(e.__li), this.__controllers.splice(this.__controllers.indexOf(e), 1);
            var t = this;
            nt.defer((function () {
                t.onResize()
            }))
        },
        destroy: function () {
            if (this.parent) throw new Error("Only the root GUI should be removed with .destroy(). For subfolders, use gui.removeFolder(folder) instead.");
            this.autoPlace && Gt.removeChild(this.domElement);
            var e = this;
            nt.each(this.__folders, (function (t) {
                e.removeFolder(t)
            })), wt.unbind(window, "keydown", Xt._keydownHandler, !1), Qt(this)
        },
        addFolder: function (e) {
            if (void 0 !== this.__folders[e]) throw new Error('You already have a folder in this GUI by the name "' + e + '"');
            var t = {
                name: e,
                parent: this
            };
            t.autoPlace = this.autoPlace, this.load && this.load.folders && this.load.folders[e] && (t.closed = this.load.folders[e].closed, t.load = this.load.folders[e]);
            var n = new Xt(t);
            this.__folders[e] = n;
            var r = qt(this, n.domElement);
            return wt.addClass(r, "folder"), n
        },
        removeFolder: function (e) {
            this.__ul.removeChild(e.domElement.parentElement), delete this.__folders[e.name], this.load && this.load.folders && this.load.folders[e.name] && delete this.load.folders[e.name], Qt(e);
            var t = this;
            nt.each(e.__folders, (function (t) {
                e.removeFolder(t)
            })), nt.defer((function () {
                t.onResize()
            }))
        },
        open: function () {
            this.closed = !1
        },
        close: function () {
            this.closed = !0
        },
        hide: function () {
            this.domElement.style.display = "none"
        },
        show: function () {
            this.domElement.style.display = ""
        },
        onResize: function () {
            var e = this.getRoot();
            if (e.scrollable) {
                var t = wt.getOffset(e.__ul).top,
                    n = 0;
                nt.each(e.__ul.childNodes, (function (t) {
                    e.autoPlace && t === e.__save_row || (n += wt.getHeight(t))
                })), window.innerHeight - t - 20 < n ? (wt.addClass(e.domElement, Xt.CLASS_TOO_TALL), e.__ul.style.height = window.innerHeight - t - 20 + "px") : (wt.removeClass(e.domElement, Xt.CLASS_TOO_TALL), e.__ul.style.height = "auto")
            }
            e.__resize_handle && nt.defer((function () {
                e.__resize_handle.style.height = e.__ul.offsetHeight + "px"
            })), e.__closeButton && (e.__closeButton.style.width = e.width + "px")
        },
        onResizeDebounced: nt.debounce((function () {
            this.onResize()
        }), 50),
        remember: function () {
            if (nt.isUndefined(Ut) && ((Ut = new zt).domElement.innerHTML = Lt), this.parent) throw new Error("You can only call remember on a top level GUI.");
            var e = this;
            nt.each(Array.prototype.slice.call(arguments), (function (t) {
                0 === e.__rememberedObjects.length && nn(e), -1 === e.__rememberedObjects.indexOf(t) && e.__rememberedObjects.push(t)
            })), this.autoPlace && an(this, this.width)
        },
        getRoot: function () {
            for (var e = this; e.parent;) e = e.parent;
            return e
        },
        getSaveObject: function () {
            var e = this.load;
            return e.closed = this.closed, this.__rememberedObjects.length > 0 && (e.preset = this.preset, e.remembered || (e.remembered = {}), e.remembered[this.preset] = on(this)), e.folders = {}, nt.each(this.__folders, (function (t, n) {
                e.folders[n] = t.getSaveObject()
            })), e
        },
        save: function () {
            this.load.remembered || (this.load.remembered = {}), this.load.remembered[this.preset] = on(this), Kt(this, !1), this.saveToLocalStorageIfPossible()
        },
        saveAs: function (e) {
            this.load.remembered || (this.load.remembered = {}, this.load.remembered[Nt] = on(this, !0)), this.load.remembered[e] = on(this), this.preset = e, en(this, e, !0), this.saveToLocalStorageIfPossible()
        },
        revert: function (e) {
            nt.each(this.__controllers, (function (t) {
                this.getRoot().load.remembered ? Zt(e || this.getRoot(), t) : t.setValue(t.initialValue), t.__onFinishChange && t.__onFinishChange.call(t, t.getValue())
            }), this), nt.each(this.__folders, (function (e) {
                e.revert(e)
            })), e || Kt(this.getRoot(), !1)
        },
        listen: function (e) {
            var t = 0 === this.__listening.length;
            this.__listening.push(e), t && function e(t) {
                0 !== t.length && Pt.call(window, (function () {
                    e(t)
                }));
                nt.each(t, (function (e) {
                    e.updateDisplay()
                }))
            }(this.__listening)
        },
        updateDisplay: function () {
            nt.each(this.__controllers, (function (e) {
                e.updateDisplay()
            })), nt.each(this.__folders, (function (e) {
                e.updateDisplay()
            }))
        }
    });
    var un, sn = Xt,
        cn = n(1),
        fn = n.n(cn);
    setTimeout((function () {
        "true" === fn.a.parse(location.search).debug && (un || (un = new sn({
            width: 300
        })))
    }));
    var ln, dn = function (e) {
            setTimeout((function () {
                un && e(un)
            }))
        },
        pn = function (e, t) {
            var r = e.texture(),
                i = new Image;
            return i.src = n(13)("./".concat(t)), i.onload = function () {
                r({
                    data: i,
                    flipY: !0,
                    min: "mipmap"
                })
            }, r
        },
        mn = n(2),
        hn = n.n(mn)()({
            container: document.querySelector(".content"),
            attributes: {
                antialias: !0,
                alpha: !1
            }
        }),
        bn = {
            fov: 45,
            near: .01,
            far: 1e3
        };
    dn((function (e) {
        e.addFolder("Camera").add(bn, "fov", 0, 200)
    }));
    var vn = {
            eye: [0, 0, 6],
            target: [0, 0, 0],
            up: [0, 1, 0]
        },
        gn = hn({
            context: {
                projection: function (e) {
                    var t = e.viewportWidth,
                        n = e.viewportHeight,
                        i = bn.near,
                        a = bn.far,
                        o = bn.fov * Math.PI / 180,
                        u = t / n;
                    return r.perspective([], o, u, i, a)
                },
                view: function (e, t) {
                    var n = Object.assign({}, vn, t),
                        i = n.eye,
                        a = n.target,
                        o = n.up;
                    return r.lookAt([], i, a, o)
                },
                fov: function () {
                    var e = bn.fov;
                    return e
                }
            },
            uniforms: {
                u_projection: hn.context("projection"),
                u_view: hn.context("view"),
                u_cameraPosition: hn.context("eye"),
                u_resolution: function (e) {
                    return [e.viewportWidth, e.viewportHeight]
                }
            }
        }),
        _n = [
            [0, 0, 1],
            [1, 0, 0],
            [0, 0, -1],
            [-1, 0, 0],
            [0, 1, 0],
            [0, -1, 0]
        ].map((function (e) {
            return [e, e, e, e]
        })),
        yn = [
            [0, 1, 1],
            [0, 0, 1],
            [0, 1, 0],
            [0, 1, 1],
            [1, 0, 0],
            [1, 0, 1]
        ].map((function (e) {
            return [e, e, e, e]
        })),
        xn = hn.texture(),
        wn = hn.cube(),
        kn = {
            translateX: 0,
            translateY: 0,
            translateZ: 0,
            rotation: 0,
            rotateX: 1,
            rotateY: 1,
            rotateZ: 1,
            scale: 1,
            borderWidth: .008,
            displacementLength: .028,
            reflectionOpacity: .3,
            scene: 3
        };
    dn((function (e) {
        var t = e.addFolder("Cube");
        t.add(kn, "translateX", -30, 30).step(.01), t.add(kn, "translateY", -30, 30).step(.01), t.add(kn, "translateZ", -30, 30).step(.01), t.add(kn, "rotation", -5, 5).step(1e-4), t.add(kn, "rotateX", 0, 10).step(.1), t.add(kn, "rotateY", 0, 10).step(.1), t.add(kn, "rotateZ", 0, 10).step(.1), t.add(kn, "scale", 0, 10).step(.01), t.add(kn, "borderWidth", 0, .1).step(.01), t.add(kn, "displacementLength", 0, 2).step(.01), t.add(kn, "reflectionOpacity", 0, 1).step(.01), t.add(kn, "scene", {
            Apple: 3,
            Mask: 2,
            Displacement: 1
        })
    }));
    var An = hn({
            frag: "precision mediump float;\n#define GLSLIFY 1\n\nuniform vec2 u_resolution;\nuniform int u_face;\nuniform int u_typeId;\nuniform sampler2D u_texture;\nuniform samplerCube u_reflection;\nuniform float u_tick;\nuniform float u_borderWidth;\nuniform float u_displacementLength;\nuniform float u_reflectionOpacity;\nuniform int u_scene;\n\nvarying vec3 v_normal;\nvarying vec3 v_center;\nvarying vec3 v_point;\nvarying vec2 v_uv;\nvarying vec3 v_color;\nvarying float v_depth;\n\nconst float PI2 = 6.283185307179586;\n\nfloat borders(vec2 uv, float strokeWidth) {\n  vec2 borderBottomLeft = smoothstep(vec2(0.0), vec2(strokeWidth), uv);\n\n  vec2 borderTopRight = smoothstep(vec2(0.0), vec2(strokeWidth), 1.0 - uv);\n\n  return 1.0 - borderBottomLeft.x * borderBottomLeft.y * borderTopRight.x * borderTopRight.y;\n}\n\nconst float PI2_0 = 6.28318530718;\n\nvec4 radialRainbow(vec2 st, float tick) {\n  vec2 toCenter = vec2(0.5) - st;\n  float angle = mod((atan(toCenter.y, toCenter.x) / PI2_0) + 0.5 + sin(tick * 0.002), 1.0);\n\n  // colors\n  vec4 a = vec4(0.15, 0.58, 0.96, 1.0);\n  vec4 b = vec4(0.29, 1.00, 0.55, 1.0);\n  vec4 c = vec4(1.00, 0.0, 0.85, 1.0);\n  vec4 d = vec4(0.92, 0.20, 0.14, 1.0);\n  vec4 e = vec4(1.00, 0.96, 0.32, 1.0);\n\n  float step = 1.0 / 10.0;\n\n  vec4 color = a;\n\n  color = mix(color, b, smoothstep(step * 1.0, step * 2.0, angle));\n  color = mix(color, a, smoothstep(step * 2.0, step * 3.0, angle));\n  color = mix(color, b, smoothstep(step * 3.0, step * 4.0, angle));\n  color = mix(color, c, smoothstep(step * 4.0, step * 5.0, angle));\n  color = mix(color, d, smoothstep(step * 5.0, step * 6.0, angle));\n  color = mix(color, c, smoothstep(step * 6.0, step * 7.0, angle));\n  color = mix(color, d, smoothstep(step * 7.0, step * 8.0, angle));\n  color = mix(color, e, smoothstep(step * 8.0, step * 9.0, angle));\n  color = mix(color, a, smoothstep(step * 9.0, step * 10.0, angle));\n\n  return color;\n}\n\nmat2 scale(vec2 value){\n  return mat2(value.x, 0.0, 0.0, value.y);\n}\n\nmat2 rotate2d(float value){\n  return mat2(cos(value), -sin(value), sin(value), cos(value));\n}\n\nvec2 rotateUV(vec2 uv, float rotation) {\n  float mid = 0.5;\n  return vec2(\n    cos(rotation) * (uv.x - mid) + sin(rotation) * (uv.y - mid) + mid,\n    cos(rotation) * (uv.y - mid) - sin(rotation) * (uv.x - mid) + mid\n  );\n}\n\nvec4 type1() {\n  vec2 toCenter = v_center.xy - v_point.xy;\n  float angle = (atan(toCenter.y, toCenter.x) / PI2) + 0.5;\n  float displacement = borders(v_uv, u_displacementLength) + borders(v_uv, u_displacementLength * 2.143) * 0.3;\n\n  return vec4(angle, displacement, 0.0, 1.0);\n}\n\nvec4 type2() {\n  return vec4(v_color, 1.0);\n}\n\nvec4 type3() {\n  vec2 st = gl_FragCoord.xy / u_resolution;\n\n  vec4 strokeColor = radialRainbow(st, u_tick);\n  float depth = clamp(smoothstep(-1.0, 1.0, v_depth), 0.6, 0.9);\n  vec4 stroke = strokeColor * vec4(borders(v_uv, u_borderWidth)) * depth;\n\n  vec4 texture;\n\n  if (u_face == -1) {\n    vec3 normal = normalize(v_normal);\n    texture = textureCube(u_reflection, normalize(v_normal));\n\n    texture.a *= u_reflectionOpacity * depth;\n  }  else {\n    texture = texture2D(u_texture, st);\n  }\n\n  if (stroke.a > 0.0) {\n    return stroke - texture.a;\n  } else {\n    return texture;\n  }\n}\n\nvec4 switchScene(int id) {\n  if (id == 1) {\n    return type1();\n  } else if (id == 2) {\n    return type2();\n  } else if (id == 3) {\n    return type3();\n  }\n}\n\nvoid main() {\n  if (u_scene == 3) {\n    gl_FragColor = switchScene(u_typeId);\n  } else {\n    gl_FragColor = switchScene(u_scene);\n  }\n}",
            vert: "precision mediump float;\n#define GLSLIFY 1\n\nattribute vec3 a_position;\nattribute vec3 a_center;\nattribute vec2 a_uv;\nattribute vec3 a_color;\n\nuniform mat4 u_projection;\nuniform mat4 u_view;\nuniform mat4 u_world;\n\nvarying vec3 v_normal;\nvarying vec3 v_center;\nvarying vec3 v_point;\nvarying vec2 v_uv;\nvarying vec3 v_color;\nvarying float v_depth;\n\nvoid main() {\n  vec4 center = u_projection * u_view * u_world * vec4(a_center, 1.0);\n  vec4 position = u_projection * u_view * u_world * vec4(a_position, 1.0);\n\n  v_normal = normalize(a_position);\n  v_center = center.xyz;\n  v_point = position.xyz;\n  v_uv = a_uv;\n  v_color = a_color;\n  v_depth = (mat3(u_view) * mat3(u_world) * a_position).z;\n\n  gl_Position = position;\n}",
            context: {
                world: function (e, t) {
                    var n = t.matrix,
                        i = kn.translateX,
                        a = kn.translateY,
                        o = kn.translateZ,
                        u = kn.rotation,
                        s = kn.rotateX,
                        c = kn.rotateY,
                        f = kn.rotateZ,
                        l = kn.scale,
                        d = r.create();
                    return r.translate(d, d, [i, a, o]), r.rotate(d, d, u, [s, c, f]), r.scale(d, d, [l, l, l]), n && r.multiply(d, d, n), d
                },
                face: function (e, t) {
                    return t.cullFace === On.FRONT ? -1 : 1
                },
                texture: function (e, t) {
                    return t.texture || xn
                },
                reflection: function (e, t) {
                    return t.reflection || wn
                },
                textureMatrix: function (e, t) {
                    return t.textureMatrix
                },
                borderWidth: function () {
                    var e = kn.borderWidth;
                    return e
                },
                displacementLength: function () {
                    var e = kn.displacementLength;
                    return e
                },
                reflectionOpacity: function () {
                    var e = kn.reflectionOpacity;
                    return e
                },
                scene: function () {
                    var e = kn.scene;
                    return parseFloat(e)
                }
            },
            attributes: {
                a_position: [
                    [-1, 1, 1],
                    [1, 1, 1],
                    [1, -1, 1],
                    [-1, -1, 1],
                    [1, 1, 1],
                    [1, 1, -1],
                    [1, -1, -1],
                    [1, -1, 1],
                    [1, 1, -1],
                    [-1, 1, -1],
                    [-1, -1, -1],
                    [1, -1, -1],
                    [-1, 1, -1],
                    [-1, 1, 1],
                    [-1, -1, 1],
                    [-1, -1, -1],
                    [-1, 1, -1],
                    [1, 1, -1],
                    [1, 1, 1],
                    [-1, 1, 1],
                    [-1, -1, -1],
                    [1, -1, -1],
                    [1, -1, 1],
                    [-1, -1, 1]
                ],
                a_center: _n,
                a_uv: [
                    [0, 0],
                    [1, 0],
                    [1, 1],
                    [0, 1],
                    [0, 0],
                    [1, 0],
                    [1, 1],
                    [0, 1],
                    [0, 0],
                    [1, 0],
                    [1, 1],
                    [0, 1],
                    [0, 0],
                    [1, 0],
                    [1, 1],
                    [0, 1],
                    [0, 0],
                    [1, 0],
                    [1, 1],
                    [0, 1],
                    [0, 0],
                    [1, 0],
                    [1, 1],
                    [0, 1]
                ],
                a_color: yn
            },
            uniforms: {
                u_world: hn.context("world"),
                u_face: hn.context("face"),
                u_typeId: hn.prop("typeId"),
                u_texture: hn.context("texture"),
                u_reflection: hn.context("reflection"),
                u_tick: hn.context("tick"),
                u_borderWidth: hn.context("borderWidth"),
                u_displacementLength: hn.context("displacementLength"),
                u_reflectionOpacity: hn.context("reflectionOpacity"),
                u_scene: hn.context("scene")
            },
            cull: {
                enable: !0,
                face: hn.prop("cullFace")
            },
            depth: {
                enable: !0,
                mask: !1,
                func: "less"
            },
            blend: {
                enable: !0,
                func: {
                    srcRGB: "src alpha",
                    srcAlpha: 1,
                    dstRGB: "one minus src alpha",
                    dstAlpha: 1
                },
                equation: {
                    rgb: "add",
                    alpha: "add"
                },
                color: [0, 0, 0, 0]
            },
            elements: [
                [2, 1, 0],
                [2, 0, 3],
                [6, 5, 4],
                [6, 4, 7],
                [10, 9, 8],
                [10, 8, 11],
                [14, 13, 12],
                [14, 12, 15],
                [18, 17, 16],
                [18, 16, 19],
                [20, 21, 22],
                [23, 20, 22]
            ],
            count: 36,
            framebuffer: hn.prop("fbo")
        }),
        Sn = 1,
        En = 2,
        Cn = 3,
        On = {
            BACK: "back",
            FRONT: "front"
        },
        Tn = 1,
        Mn = 2,
        jn = 3,
        Dn = 4,
        Fn = 5,
        Rn = hn.texture(),
        In = {
            translateX: 0,
            translateY: 0,
            translateZ: 0,
            rotation: 0,
            rotateX: 1,
            rotateY: 1,
            rotateZ: 1,
            scale: 1.4
        };
    dn((function (e) {
        var t = e.addFolder("Content");
        t.add(In, "translateX", -30, 30).step(.01), t.add(In, "translateY", -30, 30).step(.01), t.add(In, "translateZ", -30, 30).step(.01), t.add(In, "rotation", -5, 5).step(1e-4), t.add(In, "rotateX", 0, 10).step(.1), t.add(In, "rotateY", 0, 10).step(.1), t.add(In, "rotateZ", 0, 10).step(.1), t.add(In, "scale", 0, 10).step(.01)
    }));
    var Ln = hn({
            frag: "precision mediump float;\n#define GLSLIFY 1\n\nuniform vec2 u_resolution;\nuniform sampler2D u_texture;\nuniform int u_maskId;\nuniform int u_typeId;\nuniform sampler2D u_displacement;\nuniform sampler2D u_mask;\nuniform float u_tick;\n\nvarying vec2 v_uv;\n\nconst float PI2 = 6.283185307179586;\n\nconst float PI = 3.141592653589793;\nconst float PI2_0 = 6.28318530718;\n\nmat2 scale(vec2 value) {\n  return mat2(value.x, 0.0, 0.0, value.y);\n}\n\nmat2 rotate2d(float value){\n  return mat2(cos(value), -sin(value), sin(value), cos(value));\n}\n\nvec3 gradient1(vec2 st, float tick) {\n  vec3 c1 = vec3(0.98, 0.71, 0.0);\n  vec3 c2 = vec3(0.95, 0.20, 0.14);\n  vec3 c3 = vec3(0.89, 0.12, 0.78);\n  vec3 c4 = vec3(0.30, 0.24, 0.96);\n\n  st.y = 1.0 - st.y;\n\n  vec2 toCenter = vec2(0.55, 0.58) - st;\n  float angle = atan(toCenter.y, toCenter.x) / PI;\n\n  vec3 colorA = mix(c1, c2, smoothstep(0.0, 0.5, angle));\n\n  st -= vec2(0.5);\n  st *= scale(vec2(1.4));\n  st *= rotate2d(-0.44);\n  st += vec2(0.5);\n\n  vec3 colorB = mix(c2, c3, smoothstep(0.3, 0.8, st.x));\n  colorB = mix(colorB, c4, smoothstep(0.55, 1.0, st.x));\n\n  return mix(colorA, colorB, smoothstep(0.28, 0.65, st.x));\n}\n\nvec3 gradient2(vec2 st, float tick) {\n  vec3 c1 = vec3(1.0, 0.8, 0.2);\n  vec3 c2 = vec3(0.92, 0.20, 0.14);\n\n  st -= vec2(0.5);\n  st *= scale(vec2(3.8));\n  st *= rotate2d(tick * PI);\n  st += vec2(0.5);\n\n  return mix(c1, c2, st.x);\n}\n\nvec3 gradient3(vec2 st, float tick) {\n  vec3 c1 = vec3(0.89, 0.12, 0.78);\n  vec3 c2 = vec3(0.29, 0.68, 0.95);\n\n  st -= vec2(0.5);\n  st *= scale(vec2(3.8));\n  st *= rotate2d(tick * PI);\n  st += vec2(0.5);\n\n  return mix(c1, c2, st.x);\n}\n\nvec3 gradients(int type, vec2 st, float tick) {\n  if (type == 1) {\n    return gradient1(st, tick);\n  } else if (type == 2) {\n    return gradient2(st, tick);\n  } else if (type == 3) {\n    return gradient3(st, tick);\n  }\n}\n\nvoid main() {\n  vec2 st = gl_FragCoord.xy / u_resolution;\n\n  vec4 displacement = texture2D(u_displacement, st);\n  \n  vec2 direction = vec2(cos(displacement.r * PI2), sin(displacement.r * PI2));\n  float length = displacement.g;\n\n  vec2 newUv = v_uv;\n\n  newUv.x += (length * 0.07) * direction.x;\n  newUv.y += (length * 0.07) * direction.y;\n\n  vec4 texture = texture2D(u_texture, newUv);\n  float tick = u_tick * 0.009;\n\n  vec3 color = gradients(u_typeId, v_uv, tick);\n\n  texture.rgb = color + (texture.rgb * color);\n\n  vec4 mask = texture2D(u_mask, st);\n\n  int maskId = int(mask.r * 4.0 + mask.g * 2.0 + mask.b * 1.0);\n\n  if (maskId == u_maskId) {\n    gl_FragColor = vec4(texture.rgb, texture.a * mask.a);\n  } else {\n    discard;\n  }\n}",
            vert: "precision mediump float;\n#define GLSLIFY 1\n\nattribute vec3 a_position;\nattribute vec2 a_uv;\n\nuniform mat4 u_projection;\nuniform mat4 u_view;\nuniform mat4 u_world;\n\nvarying vec2 v_uv;\n\nvoid main() {\n  v_uv = a_uv;\n\n  gl_Position = u_projection * u_view * u_world * vec4(a_position, 1);\n}",
            attributes: {
                a_position: [
                    [-1, -1, 0],
                    [1, -1, 0],
                    [1, 1, 0],
                    [-1, 1, 0]
                ],
                a_uv: [
                    [0, 0],
                    [1, 0],
                    [1, 1],
                    [0, 1]
                ]
            },
            uniforms: {
                u_texture: hn.prop("texture"),
                u_typeId: hn.prop("typeId"),
                u_maskId: hn.prop("maskId")
            },
            depth: {
                enable: !0,
                mask: !1,
                func: "less"
            },
            blend: {
                enable: !0,
                func: {
                    srcRGB: "src alpha",
                    srcAlpha: 1,
                    dstRGB: "one minus src alpha",
                    dstAlpha: 1
                },
                equation: {
                    rgb: "add",
                    alpha: "add"
                },
                color: [0, 0, 0, 0]
            },
            elements: [0, 1, 2, 0, 2, 3],
            count: 6
        }),
        Bn = hn({
            context: {
                world: function () {
                    var e = In.translateX,
                        t = In.translateY,
                        n = In.translateZ,
                        i = In.rotation,
                        a = In.rotateX,
                        o = In.rotateY,
                        u = In.rotateZ,
                        s = In.scale,
                        c = r.create();
                    return r.translate(c, c, [e, t, n]), r.rotate(c, c, i, [a, o, u]), r.scale(c, c, [s, s, s]), c
                },
                mask: function (e, t) {
                    return t.mask || Rn
                },
                displacement: function (e, t) {
                    return t.displacement || Rn
                }
            },
            uniforms: {
                u_world: hn.context("world"),
                u_mask: hn.context("mask"),
                u_displacement: hn.context("displacement"),
                u_tick: hn.context("tick")
            }
        }),
        Pn = 1,
        zn = 2,
        Nn = 3,
        Hn = hn({
            vert: "precision mediump float;\n#define GLSLIFY 1\n\nattribute vec3 a_position;\n\nuniform mat4 u_textureMatrix;\nuniform mat4 u_world;\n\nvarying vec4 vUv;\n\nvoid main() {\n  vUv = u_textureMatrix * vec4(a_position, 1.0);\n\n  gl_Position = u_world * vec4(a_position, 1.0);\n}",
            frag: "precision mediump float;\n#define GLSLIFY 1\n\nuniform sampler2D u_texture;\n\nvarying vec4 vUv;\n\nvoid main() {\n  gl_FragColor = texture2DProj(u_texture, vUv);\n}",
            attributes: {
                a_position: [
                    [-1, 1, 0],
                    [1, -1, 0],
                    [-1, -1, 0],
                    [-1, 1, 0],
                    [1, 1, 0],
                    [1, -1, 0]
                ]
            },
            context: {
                world: function (e, t) {
                    var n = t.uvRotation,
                        i = r.create();
                    return r.rotate(i, i, n, [0, 0, 1]), i
                }
            },
            uniforms: {
                u_world: hn.context("world"),
                u_texture: hn.prop("texture"),
                u_textureMatrix: hn.prop("textureMatrix")
            },
            count: 6
        }),
        Un = {
            depthOpacity: .25
        };
    dn((function (e) {
        e.addFolder("Reflector").add(Un, "depthOpacity", 0, 1).step(.01)
    }));
    var Vn = hn({
            frag: "precision mediump float;\n#define GLSLIFY 1\n\nuniform vec2 u_resolution;\nuniform sampler2D u_texture;\nuniform float u_depthOpacity;\n\nvarying vec2 v_uv;\nvarying float v_z;\n\nmat2 scale(vec2 scale){\n  return mat2(scale.x, 0.0, 0.0, scale.y);\n}\n\nvoid main() {\n  vec2 st = gl_FragCoord.xy / u_resolution;\n\n  vec4 texture = texture2D(u_texture, v_uv);\n\n  texture.a -= u_depthOpacity * v_z;\n\n  gl_FragColor = texture;\n}",
            vert: "precision mediump float;\n#define GLSLIFY 1\n\nattribute vec3 a_position;\nattribute vec2 a_uv;\n\nuniform mat4 u_projection;\nuniform mat4 u_view;\nuniform mat4 u_world;\nuniform vec2 u_viewport;\n\nvarying vec2 v_uv;\nvarying float v_z;\n\nvoid main() {\n  v_uv = a_uv;\n  v_z = 1.0 - (mat3(u_view) * mat3(u_world) * a_position).z;\n\n  gl_Position = u_projection * u_view * u_world * vec4(a_position, 1);\n}",
            context: {
                world: function (e, t) {
                    var n = e.viewportWidth,
                        i = e.viewportHeight,
                        a = t.cameraConfig,
                        o = t.fov * Math.PI / 180,
                        u = n / i,
                        s = Math.tan(o / 2) * a.eye[2],
                        c = s * u,
                        f = r.create();
                    return r.scale(f, f, [c, s, 1]), f
                },
                depthOpacity: function () {
                    var e = Un.depthOpacity;
                    return e
                }
            },
            attributes: {
                a_position: [
                    [-1, -1, 0],
                    [1, -1, 0],
                    [1, 1, 0],
                    [-1, 1, 0]
                ],
                a_uv: [
                    [0, 0],
                    [1, 0],
                    [1, 1],
                    [0, 1]
                ]
            },
            uniforms: {
                u_world: hn.context("world"),
                u_texture: hn.prop("texture"),
                u_depthOpacity: hn.context("depthOpacity")
            },
            depth: {
                enable: !0,
                mask: !1,
                func: "less"
            },
            blend: {
                enable: !0,
                func: {
                    srcRGB: "src alpha",
                    srcAlpha: 1,
                    dstRGB: "one minus src alpha",
                    dstAlpha: 1
                },
                equation: {
                    rgb: "add",
                    alpha: "add"
                },
                color: [0, 0, 0, 0]
            },
            elements: [0, 1, 2, 0, 2, 3],
            count: 6
        }),
        Gn = [{
            position: [1, 0, 0],
            normal: [1, 0, 0],
            rotation: .5 * -Math.PI,
            axis: [0, 1, 0],
            uvRotation: Math.PI
        }, {
            position: [-1, 0, 0],
            normal: [-1, 0, 0],
            rotation: .5 * Math.PI,
            axis: [0, 1, 0],
            uvRotation: Math.PI
        }, {
            position: [0, 1, 0],
            normal: [0, 1, 0],
            rotation: .5 * Math.PI,
            axis: [1, 0, 0],
            uvRotation: 0
        }, {
            position: [0, -1, 0],
            normal: [0, -1, 0],
            rotation: .5 * -Math.PI,
            axis: [1, 0, 0],
            uvRotation: 0
        }, {
            position: [0, 0, 1],
            normal: [0, 0, 1],
            rotation: Math.PI,
            axis: [0, 1, 0],
            uvRotation: Math.PI
        }, {
            position: [0, 0, -1],
            normal: [0, 0, -1],
            rotation: 0,
            axis: [0, 1, 0],
            uvRotation: Math.PI
        }],
        Wn = hn.framebuffer(),
        Yn = function (e, t) {
            var n = new Array(3);
            return n.fill(2 * i.dot(t, e)), i.sub([], e, i.mul([], n, t))
        },
        Xn = hn({
            context: {
                config: function (e, t, n) {
                    var a = t.cameraConfig,
                        o = t.rotationMatrix,
                        u = Gn[n],
                        s = u.position,
                        c = u.normal,
                        f = u.rotation,
                        l = u.axis,
                        d = r.translate([], o, s),
                        p = r.translate([], o, c);
                    r.rotate(d, d, f, l);
                    var m = r.getTranslation([], d),
                        h = r.getTranslation([], p),
                        b = a.eye,
                        v = [0, 0, 0];
                    i.sub(v, m, b), v = Yn(v, h), i.negate(v, v), i.add(v, v, m);
                    var g = [0, 0, -1];
                    i.add(g, g, b);
                    var _ = [0, 0, 0];
                    i.sub(_, m, g), _ = Yn(_, h), i.negate(_, _), i.add(_, _, m);
                    var y = [0, 1, 0];
                    return {
                        cameraConfig: {
                            eye: v,
                            target: _,
                            up: y = Yn(y, h)
                        },
                        planeMatrix: d
                    }
                },
                uvRotation: function (e, t, n) {
                    var r = Gn[n].uvRotation;
                    return r
                },
                faceFbo: function (e, t, n) {
                    return t.reflectionFbo.faces[n]
                }
            }
        }),
        qn = (n(17), {
            cameraX: 0,
            cameraY: 0,
            cameraZ: 5.7,
            rotation: 4.8,
            rotateX: 1,
            rotateY: 1,
            rotateZ: 1,
            velocity: .018
        });
    dn((function (e) {
        var t = e.addFolder("Main");
        t.add(qn, "cameraX", -20, 20).step(.1), t.add(qn, "cameraY", -20, 20).step(.1), t.add(qn, "cameraZ", -20, 20).step(.1), t.add(qn, "rotation", -5, 5).step(1e-4), t.add(qn, "rotateX", 0, 10).step(.1), t.add(qn, "rotateY", 0, 10).step(.1), t.add(qn, "rotateZ", 0, 10).step(.1), t.add(qn, "velocity", 0, .05).step(1e-4)
    }));
    var Qn, Kn = hn.framebuffer(),
        Zn = hn.framebuffer(),
        Jn = hn.framebuffer(),
        $n = hn.framebufferCube(1024),
        er = [{
            texture: pn(hn, "logo.png"),
            typeId: Pn,
            maskId: Tn
        }, {
            texture: pn(hn, "logo.png"),
            typeId: zn,
            maskId: Mn
        }, {
            texture: pn(hn, "logo.png"),
            typeId: Nn,
            maskId: jn
        }, {
            texture: pn(hn, "text-1.png"),
            typeId: zn,
            maskId: Dn
        }, {
            texture: pn(hn, "text-2.png"),
            typeId: Nn,
            maskId: Fn
        }];
    Qn = function (e) {
        var t = e.viewportWidth,
            n = e.viewportHeight,
            i = e.tick;
        Ze();
        var a = qn.rotation,
            o = qn.rotateX,
            u = qn.rotateY,
            s = qn.rotateZ,
            c = qn.velocity,
            f = qn.cameraX,
            l = qn.cameraY,
            d = qn.cameraZ;
        Kn.resize(t, n), Zn.resize(t, n), Jn.resize(t, n);
        var p = i * c,
            m = r.create();
        r.rotate(m, m, a, [o, u, s]), r.rotate(m, m, p, [Math.cos(p), Math.sin(p), .5]);
        var h = {
            eye: [f, l, d],
            target: [0, 0, 0]
        };
        hn.clear({
                color: [0, 0, 0, 0],
                depth: 1
            }), gn(h, (function () {
                An([{
                    fbo: Kn,
                    cullFace: On.BACK,
                    typeId: Sn,
                    matrix: m
                }, {
                    fbo: Zn,
                    cullFace: On.BACK,
                    typeId: En,
                    matrix: m
                }]), Jn.use((function () {
                    Bn({
                        textures: er,
                        displacement: Kn,
                        mask: Zn
                    }, (function (e, t) {
                        var n = t.textures;
                        hn.clear({
                            color: [0, 0, 0, 0],
                            depth: 1
                        }), Ln(n)
                    }))
                }))
            })),
            function (e) {
                var t = e.reflectionFbo,
                    n = e.cameraConfig,
                    i = e.rotationMatrix,
                    a = e.texture,
                    o = new Array(6);
                o.fill({
                    reflectionFbo: t,
                    cameraConfig: n,
                    rotationMatrix: i
                }), Xn(o, (function (e) {
                    var t = e.viewportWidth,
                        i = e.viewportHeight,
                        o = e.config,
                        u = e.uvRotation,
                        s = e.faceFbo,
                        c = r.fromValues(.5, 0, 0, 0, 0, .5, 0, 0, 0, 0, .5, 0, .5, .5, .5, 1);
                    Wn.resize(t, i), Wn.use((function () {
                        hn.clear({
                            color: [0, 0, 0, 0],
                            depth: 1
                        }), gn(o.cameraConfig, (function (e) {
                            var t = e.projection,
                                i = e.view,
                                u = e.fov;
                            r.multiply(c, c, t), r.mul(c, c, i), r.mul(c, c, o.planeMatrix), Vn({
                                texture: a,
                                cameraConfig: n,
                                fov: u
                            })
                        }))
                    })), s.use((function () {
                        hn.clear({
                            color: [0, 0, 0, 0],
                            depth: 1
                        }), Hn({
                            texture: Wn,
                            textureMatrix: c,
                            uvRotation: u
                        })
                    }))
                }))
            }({
                reflectionFbo: $n,
                cameraConfig: h,
                rotationMatrix: m,
                texture: Jn
            }), gn(h, (function () {
                An([{
                    cullFace: On.FRONT,
                    typeId: Cn,
                    reflection: $n,
                    matrix: m
                }, {
                    cullFace: On.BACK,
                    typeId: Cn,
                    texture: Jn,
                    matrix: m
                }])
            })), Je()
    }, ln || (ln = hn.frame(Qn))
}]);