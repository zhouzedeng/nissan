(function(t){function e(e){for(var a,o,r=e[0],c=e[1],d=e[2],l=0,p=[];l<r.length;l++)o=r[l],n[o]&&p.push(n[o][0]),n[o]=0;for(a in c)Object.prototype.hasOwnProperty.call(c,a)&&(t[a]=c[a]);u&&u(e);while(p.length)p.shift()();return s.push.apply(s,d||[]),i()}function i(){for(var t,e=0;e<s.length;e++){for(var i=s[e],a=!0,r=1;r<i.length;r++){var c=i[r];0!==n[c]&&(a=!1)}a&&(s.splice(e--,1),t=o(o.s=i[0]))}return t}var a={},n={kanjia:0},s=[];function o(e){if(a[e])return a[e].exports;var i=a[e]={i:e,l:!1,exports:{}};return t[e].call(i.exports,i,i.exports,o),i.l=!0,i.exports}o.m=t,o.c=a,o.d=function(t,e,i){o.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:i})},o.r=function(t){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},o.t=function(t,e){if(1&e&&(t=o(t)),8&e)return t;if(4&e&&"object"===typeof t&&t&&t.__esModule)return t;var i=Object.create(null);if(o.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var a in t)o.d(i,a,function(e){return t[e]}.bind(null,a));return i},o.n=function(t){var e=t&&t.__esModule?function(){return t["default"]}:function(){return t};return o.d(e,"a",e),e},o.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},o.p="";var r=window["webpackJsonp"]=window["webpackJsonp"]||[],c=r.push.bind(r);r.push=e,r=r.slice();for(var d=0;d<r.length;d++)e(r[d]);var u=c;s.push([0,"chunk-vendors"]),i()})({0:function(t,e,i){t.exports=i("0a97")},"09fb":function(t,e,i){},"0a97":function(t,e,i){"use strict";i.r(e);i("cadf"),i("551c"),i("097d");var a=i("2b0e"),n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{attrs:{id:"app"}},[i("header-bar",{staticClass:"header-bar"}),i("div",{directives:[{name:"show",rawName:"v-show",value:!t.currentComp,expression:"!currentComp"}],staticClass:"home-btn-container"},[i("div",{staticClass:"home-btn",on:{click:t.bargain}},[t._v("立即砍价")])]),i("transition",{attrs:{name:"fade"}},[t.isShowSignup?i("dialogs-signup",{attrs:{seller_id:t.seller_id,wx_data:t.wx_data},on:{signupSuccess:t.signupSuccess}}):t._e()],1),i("transition",{attrs:{name:"fade"}},[i(t.currentComp,{tag:"component",attrs:{seller_id:t.seller_id,activity_id:t.activity_id,car_series_id:t.car_series_id,cut_id:t.currentCutId,wx_data:t.wx_data},on:{onAddGoodsToCut:t.onAddGoodsToCut,gotoList:t.gotoList}})],1)],1)},s=[],o=i("6bde"),r=i("68d8"),c=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("dialogs",{staticClass:"dialogs-signup"},[i("div",{staticClass:"dialogs-signup-bg"},[i("h2",{staticClass:"dialogs-signup-title"},[t._v("离砍价还差一步"),i("br"),t._v("请先留下大名")]),i("div",{staticClass:"dialogs-signup-main"},[i("div",{staticClass:"dialogs-signup-cell"},[i("div",{staticClass:"dialogs-signup-cell-label"},[t._v("姓名：")]),i("div",{staticClass:"dialogs-signup-cell-input"},[i("input",{directives:[{name:"model",rawName:"v-model",value:t.username,expression:"username"}],attrs:{type:"text"},domProps:{value:t.username},on:{input:function(e){e.target.composing||(t.username=e.target.value)}}})])]),i("div",{staticClass:"dialogs-signup-cell"},[i("div",{staticClass:"dialogs-signup-cell-label"},[t._v("手机号码：")]),i("div",{staticClass:"dialogs-signup-cell-input"},[i("input",{directives:[{name:"model",rawName:"v-model",value:t.phone,expression:"phone"}],attrs:{type:"text",maxlength:"11"},domProps:{value:t.phone},on:{input:function(e){e.target.composing||(t.phone=e.target.value)}}})])]),i("div",{staticClass:"dialogs-signup-cell dialogs-signup-cell-code"},[i("div",{staticClass:"dialogs-signup-cell-label"},[t._v("验证码：")]),i("div",{staticClass:"dialogs-signup-cell-input"},[i("input",{directives:[{name:"model",rawName:"v-model",value:t.code,expression:"code"}],attrs:{type:"text"},domProps:{value:t.code},on:{input:function(e){e.target.composing||(t.code=e.target.value)}}}),i("button",{staticClass:"dialogs-signup-cell-input-btn",attrs:{disabled:t.isSendPhoneCodeDisabled},on:{click:t.sendPhoneCode}},[t._v(t._s(t.sendPhoneCodeText))])])]),i("div",{staticClass:"dialogs-signup-cell"},[i("div",{staticClass:"dialogs-signup-cell-label"},[t._v("车系：")]),i("div",{staticClass:"dialogs-signup-cell-input"},[i("select",{directives:[{name:"model",rawName:"v-model",value:t.car_series_id,expression:"car_series_id"}],on:{change:function(e){var i=Array.prototype.filter.call(e.target.options,function(t){return t.selected}).map(function(t){var e="_value"in t?t._value:t.value;return e});t.car_series_id=e.target.multiple?i:i[0]}}},[i("option",{attrs:{value:"",selected:""}},[t._v("请选择车系")]),t._l(t.carSeries,function(e,a){return i("option",{key:a,domProps:{value:e.gc_id}},[t._v(t._s(e.gc_name))])})],2)])]),i("div",{staticClass:"dialogs-signup-tip"},[t._v(t._s(t.tip))])]),i("div",{staticClass:"dialogs-signup-submit"},[i("button",{staticClass:"primate-btn",attrs:{disabled:t.isSubmitDisabled},on:{click:t.submit}},[t._v("立即砍价")])])])])},d=[],u=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"dialogs"},[i("div",{staticClass:"dialogs-mask"}),i("div",{staticClass:"dialogs-content"},[t._t("default")],2)])},l=[],p={name:"dialogs"},_=p,g=(i("7cca"),i("2877")),f=Object(g["a"])(_,u,l,!1,null,null,null);f.options.__file="index.vue";var m=f.exports,h={name:"dialogsSignup",components:{dialogs:m},props:{seller_id:"",wx_data:{type:Object,default:function(){return{}}}},data:function(){return{username:"",phone:"",code:"",car_series_id:"",isSubmitDisabled:!1,isSendPhoneCodeDisabled:!1,sendPhoneCodeSecond:60,sendPhoneCodeCountDown:60,sendPhoneCodeTimer:null,tip:""}},computed:{carSeries:function(){return this.$store.state.product.carSeries},sendPhoneCodeText:function(){return this.isSendPhoneCodeDisabled?this.sendPhoneCodeCountDown+"s":"获取验证码"}},methods:{sendPhoneCode:function(){var t=this;this.isSendPhoneCodeDisabled||(/^[0-9]{11}$/.test(this.phone)?(this.isSendPhoneCodeDisabled=!0,this.$store.dispatch("user/sendPhoneCode",this.phone).then(function(){t.countDown()}).catch(function(){t.isSendPhoneCodeDisabled=!1})):this.tip="手机号码错误")},countDown:function(){var t=this;this.sendPhoneCodeTimer=setInterval(function(){t.sendPhoneCodeCountDown-=1,t.sendPhoneCodeCountDown<=0&&(t.isSendPhoneCodeDisabled=!1,t.sendPhoneCodeCountDown=t.sendPhoneCodeSecond,clearInterval(t.sendPhoneCodeTimer))},1e3)},validate:function(){return this.seller_id?this.wx_data.wx_name&&this.wx_data.wx_openid&&this.wx_data.wx_head_img_url?this.username?/^[0-9]{11}$/.test(this.phone)?this.code?this.car_series_id?(this.tip="",!0):(this.tip="请选择车系",!1):(this.tip="手机验证码不能为空",!1):(this.tip="手机号码错误",!1):(this.tip="姓名不能为空",!1):(this.tip="缺少微信用户数据",!1):(this.tip="缺少参数seller_id",!1)},submit:function(){var t=this;this.isSubmitDisabled||this.validate()&&(this.isSubmitDisabled=!0,this.tip="正在提交，请稍后",this.$store.dispatch("user/adduser",{username:this.username,phone:this.phone,code:this.code,car_series_id:this.car_series_id,seller_id:this.seller_id,wx_name:this.wx_data.wx_name,wx_openid:this.wx_data.wx_openid,wx_head_img_url:this.wx_data.wx_head_img_url}).then(function(e){t.$emit("signupSuccess",{token:e.token,car_series_id:t.car_series_id}),t.isSubmitDisabled=!1,t.tip=""}).catch(function(e){t.isSubmitDisabled=!1,e.data&&e.data.msg?t.tip=e.data.msg:t.tip="提交失败，请重试"}))}}},v=h,b=(i("b40a"),Object(g["a"])(v,c,d,!1,null,null,null));b.options.__file="index.vue";var C=b.exports,w=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"comp-bargain-list"},[i("div",{staticClass:"comp-bargain-list-banner"}),t.sellerGoods.length?i("div",{staticClass:"comp-bargain-list-container"},t._l(t.sellerGoods,function(e,a){return i("div",{key:a,staticClass:"comp-bargain-list-item"},[i("div",{staticClass:"comp-bargain-list-item-image",style:{"background-image":"url("+e.goods_img+")"}}),i("div",{staticClass:"comp-bargain-list-item-title"},[t._v(t._s(e.coupon_title))]),i("div",{staticClass:"comp-bargain-list-item-tool"},[i("span",[t._v("¥"+t._s(e.goods_price))]),i("button",{staticClass:"primate-btn",on:{click:function(i){t.addGoodsToCut(e.id)}}},[t._v("立即砍价")])])])})):i("div",{staticClass:"comp-bargain-list-empty"},[t._v("暂无数据")])])},x=[],S={name:"compBargainList",props:{seller_id:"",activity_id:"",car_series_id:""},computed:{sellerGoods:function(){return this.$store.state.product.sellerGoods},userid:function(){return this.$store.state.user.userid},token:function(){return this.$store.state.user.token}},methods:{getSellerGoods:function(){this.$store.dispatch("product/getSellerGoods",{seller_id:this.seller_id,activity_id:this.activity_id,car_series_id:this.car_series_id}).then(function(t){console.log(t)}).catch(function(t){console.log(t)})},addGoodsToCut:function(t){var e=this;this.$store.dispatch("product/addGoodsToCut",{goods_id:t,activity_id:this.activity_id,user_id:this.userid,token:this.token}).then(function(t){console.log(t),e.$emit("onAddGoodsToCut",t)}).catch(function(t){console.log(t)})}},created:function(){this.getSellerGoods()}},y=S,P=(i("14ab"),Object(g["a"])(y,w,x,!1,null,null,null));P.options.__file="index.vue";var k=P.exports,$=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"comp-bargain-detail"},[i("div",{staticClass:"comp-bargain-detail-banner"}),i("div",{staticClass:"comp-bargain-detail-container"},[i("div",{staticClass:"comp-bargain-detail-wrapper comp-bargain-detail-profile"},[i("div",{staticClass:"comp-bargain-detail-profile-avatar",style:{"background-image":"url("+t.wx_data.wx_head_img_url+")"}}),i("div",{staticClass:"comp-bargain-detail-profile-name"},[t._v(t._s(t.wx_data.wx_name))]),i("div",{staticClass:"comp-bargain-detail-profile-slogan"},[t._v("“我正在0元抢这个宝贝，快来帮我助攻”")]),i("div",{staticClass:"comp-bargain-detail-profile-info"},[i("div",{staticClass:"comp-bargain-detail-profile-info-image",style:{"background-image":"url("+t.goods_info.goods_img+")"}}),i("div",{staticClass:"comp-bargain-detail-profile-info-desc"},[i("div",[t._v(t._s(t.goods_info.coupon_title))]),i("strong",[i("i",{staticClass:"comp-bargain-detail-profile-icon-bargain"}),t._v("\n            ¥"+t._s(t.goods_info.goods_price)+"\n          ")])])])]),i("div",{staticClass:"comp-bargain-detail-wrapper comp-bargain-detail-action"},[i("div",{staticClass:"comp-bargain-detail-action-timer"},[t._v("\n        距结束还剩："),i("comp-timer",{attrs:{end_time:t.activity_info.end_time}})],1),i("div",{staticClass:"comp-bargain-detail-action-status"},[t.cut_info.is_finish?i("span",[t._v("砍价已完成")]):i("span",[t._v("砍价进行中")])]),i("div",{staticClass:"comp-bargain-detail-action-money"},[t._v("\n        已砍："),i("strong",[t._v(t._s(t.cut_info.already_cut_num))]),t._v("次，总价："),i("strong",[t._v(t._s(t.goods_info.goods_price))]),t._v("元\n      ")]),i("div",{staticClass:"comp-bargain-detail-action-progress"},[i("comp-progress",{attrs:{full:t.goods_info.goods_price,curr:t.cut_info.already_cut_num}})],1),i("div",{staticClass:"comp-bargain-detail-action-btn"},[i("button",{staticClass:"primate-btn",on:{click:t.gotoList}},[t._v("换个商品")]),i("button",{staticClass:"primate-btn",on:{click:t.share}},[t._v("分享好友，喊我帮砍")])])]),i("div",{staticClass:"comp-bargain-detail-wrapper comp-bargain-detail-ranking"},[t._m(0),t.cut_ranking.length?i("div",{staticClass:"comp-bargain-detail-ranking-list"},t._l(t.cut_ranking,function(e,a){return i("div",{key:a,staticClass:"comp-bargain-detail-ranking-item"},[i("div",{staticClass:"comp-bargain-detail-ranking-item-avatar",style:{"background-image":"url("+e.wx_head_img_url+")"}}),i("div",{staticClass:"comp-bargain-detail-ranking-item-name"},[i("div",[t._v(t._s(e.wx_name))]),i("span",[t._v(t._s(t._f("formatDate")(e.time||Date.now())))])]),i("div",{staticClass:"comp-bargain-detail-ranking-item-money"},[t._v(t._s(e.money||0)+"元")])])})):i("div",{staticClass:"comp-bargain-detail-ranking-empty"},[t._v("暂无数据")])])])])},D=[function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"comp-bargain-detail-ranking-title"},[i("span",[t._v("砍价榜")])])}],O=i("956b"),E=i("d1ca"),T={name:"compBargainDetail",components:{compTimer:O["a"],compProgress:E["a"]},props:{cut_id:"",seller_id:"",wx_data:{type:Object,default:function(){return{}}}},filters:{formatDate:function(t){function e(t){return t>=10?t:"0".concat(t)}var i=new Date(t),a=e(i.getMonth()+1),n=e(i.getDate()),s=e(i.getHours()),o=e(i.getMinutes()),r=e(i.getSeconds());return"".concat(a,"/").concat(n," ").concat(s,":").concat(o,":").concat(r)}},data:function(){return{activity_info:{},goods_info:{},cut_info:{},cut_ranking:[]}},methods:{getCutInfo:function(){var t=this;this.$store.dispatch("product/getCutInfo",this.cut_id).then(function(e){"object"===Object(o["a"])(e.activity_info)&&(t.activity_info=e.activity_info),"object"===Object(o["a"])(e.goods_info)&&(t.goods_info=e.goods_info),"object"===Object(o["a"])(e.cut_info)&&(t.cut_info=e.cut_info)}).catch(function(t){console.log(t)})},getCutVisitor:function(){var t=this;this.$store.dispatch("product/getCutVisitor",this.cut_id).then(function(e){t.cut_ranking=e}).catch(function(t){console.log(t)})},submit:function(){},gotoList:function(){this.$emit("gotoList")},share:function(){alert("点击右上角分享图标，马上分享出去哦！");try{var t={title:this.goods_info.coupon_title,desc:"我正在0元抢这个宝贝，快来帮我助攻!",imgUrl:this.goods_info.goods_img};window.wx.onMenuShareAppMessage({title:t.title,desc:t.desc,link:this.$store.dispatch("url_prefix/get_h5_prefix")+"/share.html?cut_id="+this.cut_id+"&activity_id="+this.activity_info.id+"&seller_id="+this.seller_id,imgUrl:t.imgUrl,success:function(t){console.log("已分享",t)},cancel:function(t){console.log("已取消",t)},fail:function(t){console.log(JSON.stringify(t))}})}catch(t){console.log(t)}}},created:function(){this.getCutInfo(),this.getCutVisitor()}},I=T,j=(i("f72b"),Object(g["a"])(I,$,D,!1,null,null,null));j.options.__file="index.vue";var G=j.exports,A=i("ed08"),N={name:"app",components:{headerBar:r["a"],dialogsSignup:C,compBargainList:k,compBargainDetail:G},computed:{token:function(){return this.$store.state.user.token}},data:function(){return{isShowSignup:!1,currentComp:"",currentCutId:"",seller_id:A["a"].getParam("seller_id"),activity_id:A["a"].getParam("activity_id"),car_series_id:A["a"].getStorage("car_series_id"),wx_data:{wx_name:"飞行家",wx_openid:"test",wx_head_img_url:"https://puui.qpic.cn/tv/0/37883357/0"}}},methods:{bargain:function(){this.token?(this.isShowSignup=!1,this.currentComp="compBargainList"):this.isShowSignup=!0},getCarSeries:function(){this.$store.dispatch("product/getCarSeries")},signupSuccess:function(t){var e=t.car_series_id;this.isShowSignup=!1,this.currentComp="compBargainList",this.car_series_id=e,A["a"].setStorage("car_series_id",e)},onAddGoodsToCut:function(t){this.currentCutId=t,this.currentComp="compBargainDetail"},gotoList:function(){this.currentComp="compBargainList"},getWxShareInfo:function(){var t=this,e=window.location.href||window.location.href;this.$store.dispatch("wx/getWxShareInfo",encodeURIComponent(e)).then(function(e){console.log(e),t.wxConfig(e),t.wxReady()}).catch(function(t){console.log(t)})},wxConfig:function(t){try{console.log(t),window.wx.config({debug:!1,appId:t.data.appId,timestamp:t.data.timestamp,nonceStr:t.data.nonceStr,signature:t.data.signature,jsApiList:["onMenuShareTimeline","onMenuShareAppMessage","onMenuShareQQ","onMenuShareWeibo","onMenuShareQZone"]})}catch(t){console.log(t)}},wxReady:function(){try{window.wx.ready(function(){console.log("wx.ready")})}catch(t){console.log(t)}}},created:function(){this.getCarSeries(),this.getWxShareInfo()},mounted:function(){var t=window.wx_result;"object"===Object(o["a"])(t)&&(this.wx_data.wx_name=t.nickname,this.wx_data.wx_openid=t.openid,this.wx_data.wx_head_img_url=t.headimgurl)}},R=N,L=(i("2ae7"),Object(g["a"])(R,n,s,!1,null,null,null));L.options.__file="index.vue";var M=L.exports,B=i("4360");a["a"].config.productionTip=!1,new a["a"]({store:B["a"],render:function(t){return t(M)}}).$mount("#app")},"14ab":function(t,e,i){"use strict";var a=i("4252"),n=i.n(a);n.a},"2ae7":function(t,e,i){"use strict";var a=i("60fb"),n=i.n(a);n.a},4252:function(t,e,i){},4360:function(t,e,i){"use strict";var a=i("2b0e"),n=i("2f62"),s=i("bc3a"),o=i.n(s),r=o.a.create({timeout:1e4});r.interceptors.request.use(function(t){return t},function(t){Promise.reject(t)});var c=r,d=i("ed08"),u={namespaced:!0,state:{userid:d["a"].getStorage("userid"),token:d["a"].getStorage("token")},mutations:{SET_USERID:function(t,e){t.userid=e,d["a"].setStorage("userid",e)},SET_TOKEN:function(t,e){t.token=e,d["a"].setStorage("token",e)}},actions:{adduser:function(t){var e=this,i=t.commit,a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};return new Promise(function(t,n){c({url:e.$store.dispatch("url_prefix/get_api_prefix")+"/wangxun/api_adduser",method:"get",params:a}).then(function(e){e.data&&0===e.data.code&&e.data.data&&e.data.data.token?(i("SET_USERID",e.data.data.userid),i("SET_TOKEN",e.data.data.token),t(e.data.data)):n(e)}).catch(function(t){return n(t)})})},sendPhoneCode:function(t,e){var i=this;return new Promise(function(t,a){c({url:i.$store.dispatch("url_prefix/get_api_prefix")+"/wangxun/thirdApi_sendSmsCode?mobile=".concat(e),method:"get"}).then(function(e){e.data&&0===e.data.code?t(e.data):a(e)}).catch(function(t){return a(t)})})}}},l=u,p={namespaced:!0,state:{carSeries:[],sellerGoods:[]},mutations:{SET_CAR_SERIES:function(t,e){t.carSeries=e},SET_SELLER_GOODS:function(t,e){t.sellerGoods=e}},actions:{getCarSeries:function(t){var e=this,i=t.commit;return new Promise(function(t,a){c({url:e.$store.dispatch("url_prefix/get_api_prefix")+"/wangxun/api_getSeries",method:"get"}).then(function(e){e.data&&0===e.data.code&&Array.isArray(e.data.data)?(i("SET_CAR_SERIES",e.data.data),t(e.data.data)):a(e)}).catch(function(t){return a(t)})})},getSellerGoods:function(t,e){var i=this,a=t.commit;return new Promise(function(t,n){c({url:i.$store.dispatch("url_prefix/get_api_prefix")+"/wangxun/api_getAllSellerGoods",method:"get",params:e}).then(function(e){e.data&&0===e.data.code&&Array.isArray(e.data.data)?(a("SET_SELLER_GOODS",e.data.data),t(e.data.data)):n(e)}).catch(function(t){return n(t)})})},addGoodsToCut:function(t,e){var i=this;return new Promise(function(t,a){c({url:i.$store.dispatch("url_prefix/get_api_prefix")+"/wangxun/api_getaddGoodsToCut",method:"get",params:e}).then(function(e){e.data&&0===e.data.code&&e.data.data&&e.data.data.cut_id?t(e.data.data.cut_id):a(e)}).catch(function(t){return a(t)})})},getCutInfo:function(t,e){var i=this;return new Promise(function(t,a){c({url:i.$store.dispatch("url_prefix/get_api_prefix")+"/wangxun/api_getCutInfo?cut_id=".concat(e),method:"get"}).then(function(e){e.data&&0===e.data.code&&e.data.data?t(e.data.data):a(e)}).catch(function(t){return a(t)})})},getCutVisitor:function(t,e){var i=this;return new Promise(function(t,a){c({url:i.$store.dispatch("url_prefix/get_api_prefix")+"/wangxun/api_getCutVisitor?cut_id=".concat(e),method:"get"}).then(function(e){e.data&&0===e.data.code&&e.data.data&&Array.isArray(e.data.data.visitor_cut_list)?t(e.data.data.visitor_cut_list):a(e)}).catch(function(t){return a(t)})})},cut:function(t,e){var i=this;return new Promise(function(t,a){c({url:i.$store.dispatch("url_prefix/get_api_prefix")+"/wangxun/api_cut",method:"get",params:e}).then(function(e){e.data&&0===e.data.code?t(e.data):a(e)}).catch(function(t){return a(t)})})}}},_=p,g=(i("cadf"),i("551c"),i("097d"),{namespaced:!0,state:{share_info:{}},mutations:{SET_SHARE_INFO:function(t,e){t.share_info=e}},actions:{getWxShareInfo:function(t,e){var i=this,a=t.commit;return new Promise(function(t,n){c({url:i.$store.dispatch("url_prefix/get_api_prefix")+"/wangxun/api_getShareInfo?http_referer=".concat(e),method:"get"}).then(function(e){e.data?(a("SET_SHARE_INFO",e.data),t(e.data)):n(e)}).catch(function(t){return n(t)})})}}}),f=g,m={namespaced:!0,actions:{get_api_prefix:function(){return"http://orse-activity.chebaba.com"},get_h5_prefix:function(){return"http://h.chebaba.com"}}},h=m;a["a"].use(n["a"]);var v=new n["a"].Store({modules:{user:l,product:_,wx:f,url_prefix:h}});e["a"]=v},"4daa":function(t,e,i){"use strict";var a=i("520d"),n=i.n(a);n.a},"510c":function(t,e,i){"use strict";var a=i("99bb"),n=i.n(a);n.a},"520d":function(t,e,i){},"5bd0":function(t,e,i){},"60fb":function(t,e,i){},"68d8":function(t,e,i){"use strict";var a=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"header"})},n=[],s={name:"headerBar"},o=s,r=(i("510c"),i("2877")),c=Object(r["a"])(o,a,n,!1,null,"7aa4a800",null);c.options.__file="index.vue";e["a"]=c.exports},"7cca":function(t,e,i){"use strict";var a=i("09fb"),n=i.n(a);n.a},"956b":function(t,e,i){"use strict";var a=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("span",{staticClass:"comp-timer"},[i("span",[t._v(t._s(t.hour))]),t._v(" : "),i("span",[t._v(t._s(t.minute))]),t._v(" : "),i("span",[t._v(t._s(t.second))])])},n=[],s=(i("c5f6"),{name:"compTimer",props:{end_time:Number},data:function(){return{rest_time:0,countdown_timer:null,hour:"00",minute:"00",second:"00"}},methods:{countdown:function(){var t=this;this.countdown_timer=setInterval(function(){t.rest_time-=1,t.rest_time<=0?clearInterval(t.countdown_timer):t.update()},1e3)},setRestTime:function(){var t=this.end_time-Date.now()/1e3>>0;this.rest_time=t>0?t:0},update:function(){function t(t){return t>=10?t:"0".concat(t)}var e=this.rest_time,i=e/3600>>0,a=e%3600/60>>0,n=e%3600%60>>0;this.hour=t(i),this.minute=t(a),this.second=t(n)}},mounted:function(){this.setRestTime(),this.countdown()}}),o=s,r=(i("4daa"),i("2877")),c=Object(r["a"])(o,a,n,!1,null,null,null);c.options.__file="timer.vue";e["a"]=c.exports},"97f0":function(t,e,i){},"99bb":function(t,e,i){},"9a59":function(t,e,i){},b40a:function(t,e,i){"use strict";var a=i("9a59"),n=i.n(a);n.a},d1ca:function(t,e,i){"use strict";var a=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("span",{staticClass:"comp-progress"},[i("div",{staticClass:"comp-progress-full"},[i("div",{staticClass:"comp-progress-curr",style:{width:t.percentage+"%"}})])])},n=[],s=(i("c5f6"),{name:"compProgress",props:{full:Number,curr:Number},computed:{percentage:function(){return this.curr/this.full*100}}}),o=s,r=(i("fbf1"),i("2877")),c=Object(r["a"])(o,a,n,!1,null,null,null);c.options.__file="progress.vue";e["a"]=c.exports},ed08:function(t,e,i){"use strict";i("6b54"),i("3b2b"),i("a481");e["a"]={getParam:function(t,e){if("string"!==typeof t)return!1;e||(e=window.location.href),t=t.replace(/[[\]]/g,"\\$&");var i=new RegExp("[?&]"+t+"(=([^&#]*)|&|#|$)"),a=i.exec(e);return a?a[2]?decodeURIComponent(a[2].replace(/\+/g," ")):"":null},clone:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};return JSON.parse(JSON.stringify(t))},getDay:function(t){return new Date(t).getDay()},setStorage:function(t,e){var i={val:e};i=JSON.stringify(i),t=t.toString(),window.localStorage.setItem(t,i)},getStorage:function(t){t=t.toString();var e=window.localStorage.getItem(t);return e&&(e=JSON.parse(e),e=e.val),e},removeStorage:function(t){t=t.toString(),window.localStorage.removeItem(t)},clearStorage:function(){window.localStorage.clear()}}},f72b:function(t,e,i){"use strict";var a=i("5bd0"),n=i.n(a);n.a},fbf1:function(t,e,i){"use strict";var a=i("97f0"),n=i.n(a);n.a}});
//# sourceMappingURL=kanjia.670b77f5.js.map