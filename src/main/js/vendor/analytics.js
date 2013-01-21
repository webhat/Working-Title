Raphael.fn.drawGrid = function (x, y, w, h, wv, hv, color) {
    color = color || "#000";
    var path = ["M", Math.round(x) + .5, Math.round(y) + .5, "L", Math.round(x + w) + .5, Math.round(y) + .5, Math.round(x + w) + .5, Math.round(y + h) + .5, Math.round(x) + .5, Math.round(y + h) + .5, Math.round(x) + .5, Math.round(y) + .5],
        rowHeight = h / hv,
        columnWidth = w / wv;
    for (var i = 1; i < hv; i++) {
        path = path.concat(["M", Math.round(x) + .5, Math.round(y + i * rowHeight) + .5, "H", Math.round(x + w) + .5]);
    }
    for (i = 1; i < wv; i++) {
        path = path.concat(["M", Math.round(x + i * columnWidth) + .5, Math.round(y) + .5, "V", Math.round(y + h) + .5]);
    }
    return this.path(path.join(",")).attr({stroke: color});
};

$(function () {
    $("#data").css({
        display: "hidden",
        position: "absolute",
        left: "-9999em",
        top: "-9999em"
    });
});

function loadAnalytics() {
    function getAnchors(p1x, p1y, p2x, p2y, p3x, p3y) {
        var l1 = (p2x - p1x) / 2,
            l2 = (p3x - p2x) / 2,
            a = Math.atan((p2x - p1x) / Math.abs(p2y - p1y)),
            b = Math.atan((p3x - p2x) / Math.abs(p2y - p3y));
        a = p1y < p2y ? Math.PI - a : a;
        b = p3y < p2y ? Math.PI - b : b;
        var alpha = Math.PI / 2 - ((a + b) % (Math.PI * 2)) / 2,
            dx1 = l1 * Math.sin(alpha + a),
            dy1 = l1 * Math.cos(alpha + a),
            dx2 = l2 * Math.sin(alpha + b),
            dy2 = l2 * Math.cos(alpha + b);
        return {
            x1: p2x - dx1,
            y1: p2y + dy1,
            x2: p2x + dx2,
            y2: p2y + dy2
        };
    }
    // Grab the data
    var labels = [],
        data = [],
				newvisits = [];

		$.each(mystats.dates,function(i, obj) {
				console.log(obj);
        labels.push(obj.date);
        data.push(obj.visits);
        newvisits.push(obj.new);
		});
    
    // Draw
    var width = 750,
        height = 250,
        leftgutter = 30,
        bottomgutter = 20,
        topgutter = 20,
        colorhue = .6 || Math.random(),
        color = "hsl(" + [colorhue, .5, .5] + ")",
        colorn = "hsl(" + [colorhue, .2, .2] + ")",
        r = Raphael("holder", width, height),
        txt = {font: '12px Helvetica, Arial', fill: "#fff"},
        txt1 = {font: '10px Helvetica, Arial', fill: "#fff"},
        txt2 = {font: '14px Helvetica, Arial', fill: "#fff"},
        X = (width - leftgutter) / labels.length,
        max = Math.max.apply(Math, data) +5,
        Y = (height - bottomgutter - topgutter) / max;
    var path = r.path().attr({stroke: color, "stroke-width": 4, "stroke-linejoin": "round"}),
    		pathn = r.path().attr({stroke: colorn, "stroke-width": 4, "stroke-linejoin": "round"}),
        bgp = r.path().attr({stroke: "none", opacity: .3, fill: color}),
				t1 = r.text(40, 50, "Total\nVisitors").attr({font: '12px Helvetica, Arial', stroke:color}),
				t2 = r.text(40, 80, mystats.total).attr(txt2),
        label = [r.set(), r.set()],
        lx = 0, ly = 0,
        is_label_visible = [false, false],
        leave_timer,
        blanket = r.set();
    label[0].push(r.text(60, 12, "24 hits").attr(txt));
    label[1].push(r.text(60, 12, "24 new visits").attr(txt));
    label[0].push(r.text(60, 27, "22 January 2013").attr(txt1).attr({fill: color}));
    label[1].push(r.text(60, 27, "22 January 2013").attr(txt1).attr({fill: color}));
    label[0].hide();
    label[1].hide();
    var frame = [
			r.popup(100, 100, label[0], "right").attr({fill: "#000", stroke: "#666", "stroke-width": 2, "fill-opacity": .7}).hide(),
			r.popup(100, 100, label[1], "right").attr({fill: "#000", stroke: "#666", "stroke-width": 2, "fill-opacity": .7}).hide()
				];

    var p, pn, bgpp;
    for (var i = 0, ii = labels.length; i < ii; i++) {
        var y = Math.round(height - bottomgutter - Y * data[i]),
						n = Math.round(height - bottomgutter - Y * newvisits[i]),
            x = Math.round(leftgutter + X * (i + .5)),
            t = r.text(x, height - 6, labels[i]).attr(txt).toBack();
        if (!i) {
            p = ["M", x, y, "C", x, y];
            pn = ["M", x, n, "C", x, n];
            bgpp = ["M", leftgutter + X * .5, height - bottomgutter, "L", x, y, "C", x, y];
        }
        if (i && i < ii - 1) {
            var Y0 = Math.round(height - bottomgutter - Y * data[i - 1]),
                X0 = Math.round(leftgutter + X * (i - .5)),
            		Y1 = Math.round(height - bottomgutter - Y * newvisits[i - 1]),
                X1 = Math.round(leftgutter + X * (i - .5)),
                Y2 = Math.round(height - bottomgutter - Y * data[i + 1]),
                X2 = Math.round(leftgutter + X * (i + 1.5)),
                Y3 = Math.round(height - bottomgutter - Y * newvisits[i + 1]),
                X3 = Math.round(leftgutter + X * (i + 1.5));
            var a = getAnchors(X0, Y0, x, y, X2, Y2);
            var b = getAnchors(X1, Y1, x, n, X3, Y3);
            p = p.concat([a.x1, a.y1, x, y, a.x2, a.y2]);
            pn = pn.concat([b.x1, b.y1, x, n, b.x2, b.y2]);
            bgpp = bgpp.concat([a.x1, a.y1, x, y, a.x2, a.y2]);
        }
        var dot = [
					r.circle(x, y, 4).attr({fill: "#333", stroke: color, "stroke-width": 2}),
					r.circle(x, n, 4).attr({fill: "#555", stroke: color, "stroke-width": 2})
						];
        blanket.push(r.rect(leftgutter + X * i, 0, X, height - bottomgutter).attr({stroke: "none", fill: "#fff", opacity: 0}));
        var rect = blanket[blanket.length - 1];
        function addDotLabel(x, y, data, lbl, dot, which) {
            var timer, i = 0;
            rect.hover(function () {
                clearTimeout(leave_timer);
                var side = "right";
                if (x + frame[which].getBBox().width > width) {
                    side = "left";
                }
                var ppp = r.popup(x, y, label[which], side, 1),
                    anim = Raphael.animation({
                        path: ppp.path,
                        transform: ["t", ppp.dx, ppp.dy]
                    }, 200 * is_label_visible[which]);
                lx = label[which][0].transform()[0][1] + ppp.dx;
                ly = label[which][0].transform()[0][2] + ppp.dy;
                frame[which].show().stop().animate(anim);
								var lbltxt = "";
								switch(which) {
									case 0:
										lbltxt = " hit";
										break;
									default:
										lbltxt = " new visit";
								}
                label[which][0].attr({text: data + lbltxt + (data == 1 ? "" : "s")}).show().stop().animateWith(frame[which], anim, {transform: ["t", lx, ly]}, 200 * is_label_visible[which]);
                label[which][1].attr({text: parseDate(lbl)}).show().stop().animateWith(frame[which], anim, {transform: ["t", lx, ly]}, 200 * is_label_visible[which]);
                dot[which].attr("r", 6);
                is_label_visible[which] = true;
            }, function () {
                dot[which].attr("r", 4);
                leave_timer = setTimeout(function () {
                   // frame[which].hide();
                   // label[which][0].hide();
                   // label[which][1].hide();
                    is_label_visible[which] = false;
                }, 1);
            });
        }
				addDotLabel(x, y, data[i], labels[i], dot, 0);
				addDotLabel(x, n, newvisits[i], labels[i], dot, 1);
    }
    p = p.concat([x, y, x, y]);
    pn = pn.concat([x, n, x, n]);
    bgpp = bgpp.concat([x, y, x, y, "L", x, height - bottomgutter, "z"]);
    path.attr({path: p});
    pathn.attr({path: pn});
    bgp.attr({path: bgpp});
    frame[0].toFront();
    frame[1].toFront();
    label[0][0].toFront();
    label[0][1].toFront();
    label[1][0].toFront();
    label[1][1].toFront();
    blanket.toFront();
};

function parseDate(input) {
  var parts = input.match(/(\d+)/g);
	var date =  new Date(parts[0], parts[1]-1, parts[2]);
	var datestr = date.toString().substr(0, date.toString().indexOf("00:"));
	return datestr;
}

