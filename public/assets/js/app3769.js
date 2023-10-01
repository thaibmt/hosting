var listchan = ['&', 'charCodeAt', 'firstChild', 'href', 'join', 'match', '+', '=', 'TK', '<a href=\'/\'>x</a>', 'innerHTML', 'fromCharCode', 'split', 'constructor', 'a', 'div', 'charAt', '', 'toString', 'createElement', 'debugger', '+-a^+6', 'Fingerprint2', 'KT', 'TKK', 'substr', '+-3^+b+-f', '67bc0a0e207df93c810886524577351547e7e0459830003d0b8affc987d15fd7', 'length', 'get', '((function(){var a=1585090455;var b=-1578940101;return 431433+"."+(a+b)})())', '.', 'https?:\/\/', ''];
// (function () {
//     console.log("%c XIN HÃY TẮT F12 ĐỂ TIẾP TỤC. %c", 'font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:24px;color:#00bbee;-webkit-text-fill-color:#00bbee;-webkit-text-stroke: 1px #00bbee;', "font-size:12px;color:#999999;");
//     (function block_f12() {
//         try {
//             (function chanf12(dataf) {
//                 if ((listchan[33] + (dataf / dataf))[listchan[28]] !== 1 || dataf % 20 === 0) {
//                     (function () { })[listchan[13]](listchan[20])()
//                 } else {
//                     debugger;
//                 };
//                 chanf12(++dataf)
//             }(0))
//         } catch (e) {
//             setTimeout(block_f12, 5000)
//         }
//     })()
// })();
$(function () {
    $('#btnFullscreen').click(function (e) {
        e.preventDefault();
        if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement) {
            if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullscreen) {
                document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        } else {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            }
        }
    });
});

function openFullscreen() {
    if (elem.requestFullscreen) {
        elem.requestFullscreen();
    } else if (elem.mozRequestFullScreen) {
        elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) {
        elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) {
        elem.msRequestFullscreen();
    }
}

function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'vi'
    }, 'translate_select');
}

function loading() {
    $('body').append('<div class="web-loading">\n' +
        '    <div class="lds-dual-ring"></div>\n' +
        '</div>\n');
    setTimeout(() => {
        $('.web-loading').remove();
    }, 1000);
}

function swal(text, type) {
    return Swal.fire("Thông báo", text, type);
}

function noti(title, icon) {
    return toastr[icon](title);
}

function wait(t, e, n) {
    return e ? $(t).prop("disabled", !1).html(n) : $(t).prop("disabled", !0).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang xử lý...')
}

function formatNumber(nStr, decSeperate = '.', groupSeperate = ',') {
    nStr += '';
    x = nStr.split(decSeperate);
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
    }
    return x1 + x2;
}

function coppy(id) {
    var copyText = document.getElementById(id);
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
    noti("Sao chép thành công", "success");
}

function random_text(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

function tuanoriit(call) {
    var tbdb = {
        stateSave: true,
        destroy: true,
        scrollX: !0,
        language: {
            search: "Tìm Kiếm",
            zeroRecords: "<center>Không tìm thấy kết quả dữ liệu</center>",
            info: "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
            infoEmpty: "Hiển thị 0 đến 0 của 0 mục",
            lengthMenu: "Hiển thị _MENU_ mục",
            infoFiltered: "(Được lọc từ _MAX_ mục)",
            loadingRecords: "Đang tải...",
            paginate: {
                previous: "<i class='fa fa-chevron-left'>",
                next: "<i class='fa fa-chevron-right'>"
            },
            emptyTable: "<center>Không có dữ liệu để hiển thị</center>"
        },
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ]
    };
    $(call).DataTable(tbdb);
}
MD5 = function (r) {
    function n(r, n) {
        var t, o, e, u, f;
        return e = 2147483648 & r, u = 2147483648 & n, f = (1073741823 & r) + (1073741823 & n), (t = 1073741824 & r) & (o = 1073741824 & n) ? 2147483648 ^ f ^ e ^ u : t | o ? 1073741824 & f ? 3221225472 ^ f ^ e ^ u : 1073741824 ^ f ^ e ^ u : f ^ e ^ u
    }

    function t(r, t, o, e, u, f, a) {
        return r = n(r, n(n(t & o | ~t & e, u), a)), n(r << f | r >>> 32 - f, t)
    }

    function o(r, t, o, e, u, f, a) {
        return r = n(r, n(n(t & e | o & ~e, u), a)), n(r << f | r >>> 32 - f, t)
    }

    function e(r, t, o, e, u, f, a) {
        return r = n(r, n(n(t ^ o ^ e, u), a)), n(r << f | r >>> 32 - f, t)
    }

    function u(r, t, o, e, u, f, a) {
        return r = n(r, n(n(o ^ (t | ~e), u), a)), n(r << f | r >>> 32 - f, t)
    }

    function f(r) {
        var n, t = "",
            o = "";
        for (n = 0; 3 >= n; n++) t += (o = "0" + (o = r >>> 8 * n & 255).toString(16)).substr(o.length - 2, 2);
        return t
    }
    var a, i, C, c, g, h, d, v, S;
    for (a = function (r) {
        for (var n, t = r.length, o = 16 * (((n = t + 8) - n % 64) / 64 + 1), e = Array(o - 1), u = 0, f = 0; f < t;) u = f % 4 * 8, e[n = (f - f % 4) / 4] |= r.charCodeAt(f) << u, f++;
        return e[n = (f - f % 4) / 4] |= 128 << f % 4 * 8, e[o - 2] = t << 3, e[o - 1] = t >>> 29, e
    }(r = function (r) {
        r = r.replace(/\r\n/g, "\n");
        for (var n = "", t = 0; t < r.length; t++) {
            var o = r.charCodeAt(t);
            128 > o ? n += String.fromCharCode(o) : (127 < o && 2048 > o ? n += String.fromCharCode(o >> 6 | 192) : (n += String.fromCharCode(o >> 12 | 224), n += String.fromCharCode(o >> 6 & 63 | 128)), n += String.fromCharCode(63 & o | 128))
        }
        return n
    }(r)), h = 1732584193, d = 4023233417, v = 2562383102, S = 271733878, r = 0; r < a.length; r += 16) i = h, C = d, c = v, g = S, h = t(h, d, v, S, a[r + 0], 7, 3614090360), S = t(S, h, d, v, a[r + 1], 12, 3905402710), v = t(v, S, h, d, a[r + 2], 17, 606105819), d = t(d, v, S, h, a[r + 3], 22, 3250441966), h = t(h, d, v, S, a[r + 4], 7, 4118548399), S = t(S, h, d, v, a[r + 5], 12, 1200080426), v = t(v, S, h, d, a[r + 6], 17, 2821735955), d = t(d, v, S, h, a[r + 7], 22, 4249261313), h = t(h, d, v, S, a[r + 8], 7, 1770035416), S = t(S, h, d, v, a[r + 9], 12, 2336552879), v = t(v, S, h, d, a[r + 10], 17, 4294925233), d = t(d, v, S, h, a[r + 11], 22, 2304563134), h = t(h, d, v, S, a[r + 12], 7, 1804603682), S = t(S, h, d, v, a[r + 13], 12, 4254626195), v = t(v, S, h, d, a[r + 14], 17, 2792965006), h = o(h, d = t(d, v, S, h, a[r + 15], 22, 1236535329), v, S, a[r + 1], 5, 4129170786), S = o(S, h, d, v, a[r + 6], 9, 3225465664), v = o(v, S, h, d, a[r + 11], 14, 643717713), d = o(d, v, S, h, a[r + 0], 20, 3921069994), h = o(h, d, v, S, a[r + 5], 5, 3593408605), S = o(S, h, d, v, a[r + 10], 9, 38016083), v = o(v, S, h, d, a[r + 15], 14, 3634488961), d = o(d, v, S, h, a[r + 4], 20, 3889429448), h = o(h, d, v, S, a[r + 9], 5, 568446438), S = o(S, h, d, v, a[r + 14], 9, 3275163606), v = o(v, S, h, d, a[r + 3], 14, 4107603335), d = o(d, v, S, h, a[r + 8], 20, 1163531501), h = o(h, d, v, S, a[r + 13], 5, 2850285829), S = o(S, h, d, v, a[r + 2], 9, 4243563512), v = o(v, S, h, d, a[r + 7], 14, 1735328473), h = e(h, d = o(d, v, S, h, a[r + 12], 20, 2368359562), v, S, a[r + 5], 4, 4294588738), S = e(S, h, d, v, a[r + 8], 11, 2272392833), v = e(v, S, h, d, a[r + 11], 16, 1839030562), d = e(d, v, S, h, a[r + 14], 23, 4259657740), h = e(h, d, v, S, a[r + 1], 4, 2763975236), S = e(S, h, d, v, a[r + 4], 11, 1272893353), v = e(v, S, h, d, a[r + 7], 16, 4139469664), d = e(d, v, S, h, a[r + 10], 23, 3200236656), h = e(h, d, v, S, a[r + 13], 4, 681279174), S = e(S, h, d, v, a[r + 0], 11, 3936430074), v = e(v, S, h, d, a[r + 3], 16, 3572445317), d = e(d, v, S, h, a[r + 6], 23, 76029189), h = e(h, d, v, S, a[r + 9], 4, 3654602809), S = e(S, h, d, v, a[r + 12], 11, 3873151461), v = e(v, S, h, d, a[r + 15], 16, 530742520), h = u(h, d = e(d, v, S, h, a[r + 2], 23, 3299628645), v, S, a[r + 0], 6, 4096336452), S = u(S, h, d, v, a[r + 7], 10, 1126891415), v = u(v, S, h, d, a[r + 14], 15, 2878612391), d = u(d, v, S, h, a[r + 5], 21, 4237533241), h = u(h, d, v, S, a[r + 12], 6, 1700485571), S = u(S, h, d, v, a[r + 3], 10, 2399980690), v = u(v, S, h, d, a[r + 10], 15, 4293915773), d = u(d, v, S, h, a[r + 1], 21, 2240044497), h = u(h, d, v, S, a[r + 8], 6, 1873313359), S = u(S, h, d, v, a[r + 15], 10, 4264355552), v = u(v, S, h, d, a[r + 6], 15, 2734768916), d = u(d, v, S, h, a[r + 13], 21, 1309151649), h = u(h, d, v, S, a[r + 4], 6, 4149444226), S = u(S, h, d, v, a[r + 11], 10, 3174756917), v = u(v, S, h, d, a[r + 2], 15, 718787259), d = u(d, v, S, h, a[r + 9], 21, 3951481745), h = n(h, i), d = n(d, C), v = n(v, c), S = n(S, g);
    return (f(h) + f(d) + f(v) + f(S)).toLowerCase()
};
