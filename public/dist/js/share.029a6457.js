(function(t){function a(a){for(var n,o,c=a[0],s=a[1],u=a[2],l=0,_=[];l<c.length;l++)o=c[l],i[o]&&_.push(i[o][0]),i[o]=0;for(n in s)Object.prototype.hasOwnProperty.call(s,n)&&(t[n]=s[n]);d&&d(a);while(_.length)_.shift()();return r.push.apply(r,u||[]),e()}function e(){for(var t,a=0;a<r.length;a++){for(var e=r[a],n=!0,c=1;c<e.length;c++){var s=e[c];0!==i[s]&&(n=!1)}n&&(r.splice(a--,1),t=o(o.s=e[0]))}return t}var n={},i={share:0},r=[];function o(a){if(n[a])return n[a].exports;var e=n[a]={i:a,l:!1,exports:{}};return t[a].call(e.exports,e,e.exports,o),e.l=!0,e.exports}o.m=t,o.c=n,o.d=function(t,a,e){o.o(t,a)||Object.defineProperty(t,a,{enumerable:!0,get:e})},o.r=function(t){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},o.t=function(t,a){if(1&a&&(t=o(t)),8&a)return t;if(4&a&&"object"===typeof t&&t&&t.__esModule)return t;var e=Object.create(null);if(o.r(e),Object.defineProperty(e,"default",{enumerable:!0,value:t}),2&a&&"string"!=typeof t)for(var n in t)o.d(e,n,function(a){return t[a]}.bind(null,n));return e},o.n=function(t){var a=t&&t.__esModule?function(){return t["default"]}:function(){return t};return o.d(a,"a",a),a},o.o=function(t,a){return Object.prototype.hasOwnProperty.call(t,a)},o.p="";var c=window["webpackJsonp"]=window["webpackJsonp"]||[],s=c.push.bind(c);c.push=a,c=c.slice();for(var u=0;u<c.length;u++)a(c[u]);var d=s;r.push([1,"chunk-vendors"]),e()})({1:function(t,a,e){t.exports=e("2d1e")},2324:function(t,a,e){},"2d1e":function(t,a,e){"use strict";e.r(a);e("cadf"),e("551c"),e("097d");var n=e("2b0e"),i=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{attrs:{id:"app"}},[e("header-bar",{staticClass:"header-bar"}),e("transition",{attrs:{name:"fade"}},[e(t.currentComp,{tag:"component",attrs:{seller_id:t.seller_id,activity_id:t.activity_id,cut_id:t.currentCutId,wx_data:t.wx_data}})],1)],1)},r=[],o=e("6bde"),c=e("68d8"),s=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"comp-bargain-detail"},[e("div",{staticClass:"comp-bargain-detail-banner"}),e("div",{staticClass:"comp-bargain-detail-container"},[e("div",{staticClass:"comp-bargain-detail-wrapper comp-bargain-detail-profile"},[e("div",{staticClass:"comp-bargain-detail-profile-avatar",style:{"background-image":"url("+t.wx_data.wx_head_img_url+")"}}),e("div",{staticClass:"comp-bargain-detail-profile-name"},[t._v(t._s(t.wx_data.wx_name))]),e("div",{staticClass:"comp-bargain-detail-profile-slogan"},[t._v("“我正在0元抢这个宝贝，快来帮我助攻”")]),e("div",{staticClass:"comp-bargain-detail-profile-info"},[e("div",{staticClass:"comp-bargain-detail-profile-info-image",style:{"background-image":"url("+t.goods_info.goods_img+")"}}),e("div",{staticClass:"comp-bargain-detail-profile-info-desc"},[e("div",[t._v(t._s(t.goods_info.coupon_title))]),e("strong",[e("i",{staticClass:"comp-bargain-detail-profile-icon-bargain"}),t._v("\n            ¥"+t._s(t.goods_info.goods_price)+"\n          ")])])])]),e("div",{staticClass:"comp-bargain-detail-wrapper comp-bargain-detail-action"},[e("div",{staticClass:"comp-bargain-detail-action-timer"},[t._v("\n        距结束还剩："),e("comp-timer",{attrs:{end_time:t.activity_info.end_time}})],1),e("div",{staticClass:"comp-bargain-detail-action-status"},[t.cut_info.is_finish?e("span",[t._v("砍价已结束")]):e("span",[t._v("砍价进行中")])]),e("div",{staticClass:"comp-bargain-detail-action-money"},[t._v("\n        已砍："),e("strong",[t._v(t._s(t.cut_info.already_cut_num))]),t._v("元，还剩："),e("strong",[t._v(t._s(t.goods_info.goods_price-t.cut_info.already_cut_num))]),t._v("元\n      ")]),e("div",{staticClass:"comp-bargain-detail-action-progress"},[e("comp-progress",{attrs:{full:t.goods_info.goods_price,curr:t.cut_info.already_cut_num}})],1),e("div",{staticClass:"comp-bargain-detail-action-btn"},[e("button",{staticClass:"primate-btn",on:{click:t.submit}},[t._v("帮TA砍一刀")]),e("button",{staticClass:"primate-btn",on:{click:t.gotoIndex}},[t._v("这个好玩，我也要砍")])])]),e("div",{staticClass:"comp-bargain-detail-wrapper comp-bargain-detail-ranking"},[t._m(0),t.cut_ranking.length?e("div",{staticClass:"comp-bargain-detail-ranking-list"},t._l(t.cut_ranking,function(a,n){return e("div",{key:n,staticClass:"comp-bargain-detail-ranking-item"},[e("div",{staticClass:"comp-bargain-detail-ranking-item-avatar",style:{"background-image":"url("+a.wx_head_img_url+")"}}),e("div",{staticClass:"comp-bargain-detail-ranking-item-name"},[e("div",[t._v(t._s(a.wx_name))]),e("span",[t._v(t._s(t._f("formatDate")(a.time||Date.now())))])]),e("div",{staticClass:"comp-bargain-detail-ranking-item-money"},[t._v(t._s(a.money||0)+"元")])])})):e("div",{staticClass:"comp-bargain-detail-ranking-empty"},[t._v("暂无数据")])])])])},u=[function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"comp-bargain-detail-ranking-title"},[e("span",[t._v("砍价榜")])])}],d=(e("386d"),e("956b")),l=e("d1ca"),_={name:"compBargainDetail",components:{compTimer:d["a"],compProgress:l["a"]},props:{cut_id:"",seller_id:"",wx_data:{type:Object,default:function(){return{}}}},filters:{formatDate:function(t){function a(t){return t>=10?t:"0".concat(t)}var e=new Date(t),n=a(e.getMonth()+1),i=a(e.getDate()),r=a(e.getHours()),o=a(e.getMinutes()),c=a(e.getSeconds());return"".concat(n,"/").concat(i," ").concat(r,":").concat(o,":").concat(c)}},data:function(){return{activity_info:{},goods_info:{},cut_info:{},cut_ranking:[]}},methods:{getCutInfo:function(){var t=this;this.$store.dispatch("product/getCutInfo",this.cut_id).then(function(a){"object"===Object(o["a"])(a.activity_info)&&(t.activity_info=a.activity_info),"object"===Object(o["a"])(a.goods_info)&&(t.goods_info=a.goods_info),"object"===Object(o["a"])(a.cut_info)&&(t.cut_info=a.cut_info)}).catch(function(t){console.log(t)})},getCutVisitor:function(){var t=this;this.$store.dispatch("product/getCutVisitor",this.cut_id).then(function(a){t.cut_ranking=a}).catch(function(t){console.log(t)})},submit:function(){this.$store.dispatch("product/cut",{cut_id:this.cut_id,wx_openid:this.wx_data.wx_openid,wx_name:this.wx_data.wx_name,wx_head_img_url:this.wx_data.wx_head_img_url,seller_id:this.seller_id}).then(function(t){console.log(t);try{0!==t.code?alert(t.data.msg):alert("砍价成功！")}catch(t){console.log(t)}}).catch(function(t){console.log(t)})},gotoIndex:function(){window.location.href=window.location.path+window.location.search}},created:function(){this.getCutInfo(),this.getCutVisitor()}},f=_,p=(e("c0a2"),e("2877")),g=Object(p["a"])(f,s,u,!1,null,null,null);g.options.__file="index.vue";var m=g.exports,h=e("ed08"),v={name:"app",components:{headerBar:c["a"],compBargainDetail:m},data:function(){return{currentComp:"compBargainDetail",currentCutId:h["a"].getParam("cut_id"),seller_id:h["a"].getParam("seller_id"),activity_id:h["a"].getParam("activity_id"),wx_data:{wx_name:"飞行家",wx_openid:"test",wx_head_img_url:"https://puui.qpic.cn/tv/0/37883357/0"}}},mounted:function(){var t=window.wx_result;"object"===Object(o["a"])(t)&&(this.wx_data.wx_name=t.nickname,this.wx_data.wx_openid=t.openid,this.wx_data.wx_head_img_url=t.headimgurl)}},b=v,w=(e("9859"),Object(p["a"])(b,i,r,!1,null,null,null));w.options.__file="index.vue";var x=w.exports,S=e("4360");n["a"].config.productionTip=!1,new n["a"]({store:S["a"],render:function(t){return t(x)}}).$mount("#app")},4360:function(t,a,e){"use strict";var n=e("2b0e"),i=e("2f62"),r=e("bc3a"),o=e.n(r),c=o.a.create({timeout:1e4});c.interceptors.request.use(function(t){return t},function(t){Promise.reject(t)});var s=c,u=e("ed08"),d={namespaced:!0,state:{userid:u["a"].getStorage("userid"),token:u["a"].getStorage("token")},mutations:{SET_USERID:function(t,a){t.userid=a,u["a"].setStorage("userid",a)},SET_TOKEN:function(t,a){t.token=a,u["a"].setStorage("token",a)}},actions:{adduser:function(t){var a=this,e=t.commit,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};return new Promise(function(t,i){s({url:a.$store.dispatch("url_prefix/get_api_prefix")+"/wangxun/api_adduser",method:"get",params:n}).then(function(a){a.data&&0===a.data.code&&a.data.data&&a.data.data.token?(e("SET_USERID",a.data.data.userid),e("SET_TOKEN",a.data.data.token),t(a.data.data)):i(a)}).catch(function(t){return i(t)})})},sendPhoneCode:function(t,a){var e=this;return new Promise(function(t,n){s({url:e.$store.dispatch("url_prefix/get_api_prefix")+"/wangxun/thirdApi_sendSmsCode?mobile=".concat(a),method:"get"}).then(function(a){a.data&&0===a.data.code?t(a.data):n(a)}).catch(function(t){return n(t)})})}}},l=d,_={namespaced:!0,state:{carSeries:[],sellerGoods:[]},mutations:{SET_CAR_SERIES:function(t,a){t.carSeries=a},SET_SELLER_GOODS:function(t,a){t.sellerGoods=a}},actions:{getCarSeries:function(t){var a=this,e=t.commit;return new Promise(function(t,n){s({url:a.$store.dispatch("url_prefix/get_api_prefix")+"/wangxun/api_getSeries",method:"get"}).then(function(a){a.data&&0===a.data.code&&Array.isArray(a.data.data)?(e("SET_CAR_SERIES",a.data.data),t(a.data.data)):n(a)}).catch(function(t){return n(t)})})},getSellerGoods:function(t,a){var e=this,n=t.commit;return new Promise(function(t,i){s({url:e.$store.dispatch("url_prefix/get_api_prefix")+"/wangxun/api_getAllSellerGoods",method:"get",params:a}).then(function(a){a.data&&0===a.data.code&&Array.isArray(a.data.data)?(n("SET_SELLER_GOODS",a.data.data),t(a.data.data)):i(a)}).catch(function(t){return i(t)})})},addGoodsToCut:function(t,a){var e=this;return new Promise(function(t,n){s({url:e.$store.dispatch("url_prefix/get_api_prefix")+"/wangxun/api_getaddGoodsToCut",method:"get",params:a}).then(function(a){a.data&&0===a.data.code&&a.data.data&&a.data.data.cut_id?t(a.data.data.cut_id):n(a)}).catch(function(t){return n(t)})})},getCutInfo:function(t,a){var e=this;return new Promise(function(t,n){s({url:e.$store.dispatch("url_prefix/get_api_prefix")+"/wangxun/api_getCutInfo?cut_id=".concat(a),method:"get"}).then(function(a){a.data&&0===a.data.code&&a.data.data?t(a.data.data):n(a)}).catch(function(t){return n(t)})})},getCutVisitor:function(t,a){var e=this;return new Promise(function(t,n){s({url:e.$store.dispatch("url_prefix/get_api_prefix")+"/wangxun/api_getCutVisitor?cut_id=".concat(a),method:"get"}).then(function(a){a.data&&0===a.data.code&&a.data.data&&Array.isArray(a.data.data.visitor_cut_list)?t(a.data.data.visitor_cut_list):n(a)}).catch(function(t){return n(t)})})},cut:function(t,a){var e=this;return new Promise(function(t,n){s({url:e.$store.dispatch("url_prefix/get_api_prefix")+"/wangxun/api_cut",method:"get",params:a}).then(function(a){a.data&&0===a.data.code?t(a.data):n(a)}).catch(function(t){return n(t)})})}}},f=_,p=(e("cadf"),e("551c"),e("097d"),{namespaced:!0,state:{share_info:{}},mutations:{SET_SHARE_INFO:function(t,a){t.share_info=a}},actions:{getWxShareInfo:function(t,a){var e=this,n=t.commit;return new Promise(function(t,i){s({url:e.$store.dispatch("url_prefix/get_api_prefix")+"/wangxun/api_getShareInfo?http_referer=".concat(a),method:"get"}).then(function(a){a.data?(n("SET_SHARE_INFO",a.data),t(a.data)):i(a)}).catch(function(t){return i(t)})})}}}),g=p,m={namespaced:!0,actions:{get_api_prefix:function(){return"http://horse-activity.chebaba.com"},get_h5_prefix:function(){return"http://h5.chebaba.com"}}},h=m;n["a"].use(i["a"]);var v=new i["a"].Store({modules:{user:l,product:f,wx:g,url_prefix:h}});a["a"]=v},4950:function(t,a,e){},"4daa":function(t,a,e){"use strict";var n=e("520d"),i=e.n(n);i.a},"510c":function(t,a,e){"use strict";var n=e("99bb"),i=e.n(n);i.a},"520d":function(t,a,e){},"68d8":function(t,a,e){"use strict";var n=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"header"})},i=[],r={name:"headerBar"},o=r,c=(e("510c"),e("2877")),s=Object(c["a"])(o,n,i,!1,null,"7aa4a800",null);s.options.__file="index.vue";a["a"]=s.exports},"956b":function(t,a,e){"use strict";var n=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("span",{staticClass:"comp-timer"},[e("span",[t._v(t._s(t.hour))]),t._v(" : "),e("span",[t._v(t._s(t.minute))]),t._v(" : "),e("span",[t._v(t._s(t.second))])])},i=[],r=(e("c5f6"),{name:"compTimer",props:{end_time:Number},data:function(){return{rest_time:0,countdown_timer:null,hour:"00",minute:"00",second:"00"}},methods:{countdown:function(){var t=this;this.countdown_timer=setInterval(function(){t.rest_time-=1,t.rest_time<=0?clearInterval(t.countdown_timer):t.update()},1e3)},setRestTime:function(){var t=this.end_time-Date.now()/1e3>>0;this.rest_time=t>0?t:0},update:function(){function t(t){return t>=10?t:"0".concat(t)}var a=this.rest_time,e=a/3600>>0,n=a%3600/60>>0,i=a%3600%60>>0;this.hour=t(e),this.minute=t(n),this.second=t(i)}},mounted:function(){this.setRestTime(),this.countdown()}}),o=r,c=(e("4daa"),e("2877")),s=Object(c["a"])(o,n,i,!1,null,null,null);s.options.__file="timer.vue";a["a"]=s.exports},"97f0":function(t,a,e){},9859:function(t,a,e){"use strict";var n=e("4950"),i=e.n(n);i.a},"99bb":function(t,a,e){},c0a2:function(t,a,e){"use strict";var n=e("2324"),i=e.n(n);i.a},d1ca:function(t,a,e){"use strict";var n=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("span",{staticClass:"comp-progress"},[e("div",{staticClass:"comp-progress-full"},[e("div",{staticClass:"comp-progress-curr",style:{width:t.percentage+"%"}})])])},i=[],r=(e("c5f6"),{name:"compProgress",props:{full:Number,curr:Number},computed:{percentage:function(){return this.curr/this.full*100}}}),o=r,c=(e("fbf1"),e("2877")),s=Object(c["a"])(o,n,i,!1,null,null,null);s.options.__file="progress.vue";a["a"]=s.exports},ed08:function(t,a,e){"use strict";e("6b54"),e("3b2b"),e("a481");a["a"]={getParam:function(t,a){if("string"!==typeof t)return!1;a||(a=window.location.href),t=t.replace(/[[\]]/g,"\\$&");var e=new RegExp("[?&]"+t+"(=([^&#]*)|&|#|$)"),n=e.exec(a);return n?n[2]?decodeURIComponent(n[2].replace(/\+/g," ")):"":null},clone:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};return JSON.parse(JSON.stringify(t))},getDay:function(t){return new Date(t).getDay()},setStorage:function(t,a){var e={val:a};e=JSON.stringify(e),t=t.toString(),window.localStorage.setItem(t,e)},getStorage:function(t){t=t.toString();var a=window.localStorage.getItem(t);return a&&(a=JSON.parse(a),a=a.val),a},removeStorage:function(t){t=t.toString(),window.localStorage.removeItem(t)},clearStorage:function(){window.localStorage.clear()}}},fbf1:function(t,a,e){"use strict";var n=e("97f0"),i=e.n(n);i.a}});
//# sourceMappingURL=share.029a6457.js.map