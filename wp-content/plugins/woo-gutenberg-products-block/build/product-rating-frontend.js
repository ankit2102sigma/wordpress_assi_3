(window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[]).push([[74],{114:function(t,e,n){"use strict";n.d(e,"a",(function(){return c})),n(53);var r=n(34);const c=()=>r.n>1},115:function(t,e,n){"use strict";n.d(e,"a",(function(){return s}));var r=n(24),c=n(22);const s=t=>Object(r.a)(t)?JSON.parse(t)||{}:Object(c.a)(t)?t:{}},22:function(t,e,n){"use strict";n.d(e,"a",(function(){return r})),n.d(e,"b",(function(){return c}));const r=t=>!(t=>null===t)(t)&&t instanceof Object&&t.constructor===Object;function c(t,e){return r(t)&&e in t}},286:function(t,e,n){"use strict";n.d(e,"a",(function(){return a}));var r=n(65),c=n(114),s=n(22),o=n(115);const a=t=>{if(!Object(c.a)())return{className:"",style:{}};const e=Object(s.a)(t)?t:{},n=Object(o.a)(e.style);return Object(r.__experimentalUseColorProps)({...e,style:n})}},290:function(t,e,n){"use strict";n.d(e,"a",(function(){return o}));var r=n(22),c=n(24),s=n(115);const o=t=>{const e=Object(r.a)(t)?t:{},n=Object(s.a)(e.style),o=Object(r.a)(n.typography)?n.typography:{},a=Object(c.a)(o.fontFamily)?o.fontFamily:"";return{className:e.fontFamily?`has-${e.fontFamily}-font-family`:a,style:{fontSize:e.fontSize?`var(--wp--preset--font-size--${e.fontSize})`:o.fontSize,fontStyle:o.fontStyle,fontWeight:o.fontWeight,letterSpacing:o.letterSpacing,lineHeight:o.lineHeight,textDecoration:o.textDecoration,textTransform:o.textTransform}}}},307:function(t,e,n){"use strict";n.d(e,"a",(function(){return o}));var r=n(65),c=n(22),s=n(115);const o=t=>{if("function"!=typeof r.__experimentalGetSpacingClassesAndStyles)return{style:{}};const e=Object(c.a)(t)?t:{},n=Object(s.a)(e.style);return Object(r.__experimentalGetSpacingClassesAndStyles)({...e,style:n})}},356:function(t,e){},385:function(t,e,n){"use strict";n.r(e),n.d(e,"Block",(function(){return d}));var r=n(0),c=n(1),s=n(6),o=n.n(s),a=n(52),i=n(286),u=n(290),l=n(307),f=n(135),p=n(90);n(356);const b=t=>{const{rating:e,reviews:n,parentClassName:s}=t,a={width:e/5*100+"%"},i=Object(c.sprintf)(
/* translators: %f is referring to the average rating value */
Object(c.__)("Rated %f out of 5","woo-gutenberg-products-block"),e),u={__html:Object(c.sprintf)(
/* translators: %1$s is referring to the average rating value, %2$s is referring to the number of ratings */
Object(c._n)("Rated %1$s out of 5 based on %2$s customer rating","Rated %1$s out of 5 based on %2$s customer ratings",n,"woo-gutenberg-products-block"),Object(c.sprintf)('<strong class="rating">%f</strong>',e),Object(c.sprintf)('<span class="rating">%d</span>',n))};return Object(r.createElement)("div",{className:o()("wc-block-components-product-rating__stars",s+"__product-rating__stars"),role:"img","aria-label":i},Object(r.createElement)("span",{style:a,dangerouslySetInnerHTML:u}))},g=t=>{const{href:e}=t,n=Object(c.__)("Add review","woo-gutenberg-products-block");return e?Object(r.createElement)("a",{className:"wc-block-components-product-rating__link",href:e},n):null},d=t=>{const{textAlign:e}=t,{parentClassName:n}=Object(a.useInnerBlockLayoutContext)(),{product:c}=Object(a.useProductDataContext)(),s=(t=>{const e=parseFloat(t.average_rating);return Number.isFinite(e)&&e>0?e:0})(c),f=Object(i.a)(t),d=Object(u.a)(t),j=Object(l.a)(t),O=(t=>{const e=Object(p.a)(t.review_count)?t.review_count:parseInt(t.review_count,10);return Number.isFinite(e)&&e>0?e:0})(c),m=(t=>{const{permalink:e}=t;return e+"#reviews"})(c),y=o()(f.className,"wc-block-components-product-rating",{[n+"__product-rating"]:n,["has-text-align-"+e]:e}),_=O?Object(r.createElement)(b,{rating:s,reviews:O,parentClassName:n}):Object(r.createElement)(g,{href:m});return Object(r.createElement)("div",{className:y,style:{...f.style,...d.style,...j.style}},_)};e.default=Object(f.withProductDataContext)(d)},6:function(t,e,n){var r;!function(){"use strict";var n={}.hasOwnProperty;function c(){for(var t=[],e=0;e<arguments.length;e++){var r=arguments[e];if(r){var s=typeof r;if("string"===s||"number"===s)t.push(r);else if(Array.isArray(r)){if(r.length){var o=c.apply(null,r);o&&t.push(o)}}else if("object"===s)if(r.toString===Object.prototype.toString)for(var a in r)n.call(r,a)&&r[a]&&t.push(a);else t.push(r.toString())}}return t.join(" ")}t.exports?(c.default=c,t.exports=c):void 0===(r=function(){return c}.apply(e,[]))||(t.exports=r)}()}}]);