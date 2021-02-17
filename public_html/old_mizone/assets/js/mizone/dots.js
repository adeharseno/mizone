var bezierData = MorphSVGPlugin.pathDataToBezier("#curve");

// TweenLite.set(".dots", {autoAlpha:1, xPercent:-50, yPercent:-50});

var action = new TimelineMax({repeat:-1})
.to(".dots", 12, {bezier:{curviness:1.25, values:[{x:0, y:0}, {x: 250, y: 100}, {x:500, y:0}]}, ease:Linear.easeNone},1)
.to(".dots", 12, {bezier:{curviness:1.25, values:[{x:500, y:0}, {x: 250, y: 100}, {x:0, y:0}]}, ease:Linear.easeNone},1)

action;