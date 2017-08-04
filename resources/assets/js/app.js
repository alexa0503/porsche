
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 function wxShare(data) {
     wx.ready(function () {
         wx.onMenuShareAppMessage({
             title: data.title, // 分享标题
             desc: data.desc, // 分享描述
             link: data.link, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
             imgUrl: data.imgUrl, // 分享图标
             type: data.type || 'link', // 分享类型,music、video或link，不填默认为link
             dataUrl: data.dataUrl || '', // 如果type是music或video，则要提供数据链接，默认为空
             success: function () {
                 // 用户确认分享后执行的回调函数
                 _czc.push(["_trackEvent","abilix-H5","bt-分享完成"]);
             },
             cancel: function () {
                 // 用户取消分享后执行的回调函数
             }
         });
         wx.onMenuShareTimeline({
             title: data.title, // 分享标题
             desc: data.desc, // 分享描述
             link: data.link, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
             imgUrl: data.imgUrl, // 分享图标
             type: data.type || 'link', // 分享类型,music、video或link，不填默认为link
             dataUrl: data.dataUrl || 'link', // 如果type是music或video，则要提供数据链接，默认为空
             success: function () {
                 // 用户确认分享后执行的回调函数
                 _czc.push(["_trackEvent","abilix-H5","bt-分享完成"]);
             },
             cancel: function () {
                 // 用户取消分享后执行的回调函数
             }
         });
     });

 }
 
require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('index', require('./components/Index.vue'));

const app = new Vue({
    el: '#app'
});
