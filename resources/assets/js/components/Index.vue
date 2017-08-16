<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="rows" v-if="!loading">
                            <button class="btn" v-on:click="upload">上传照片</button>
                            <button class="btn" v-on:click="showInfo">显示用户信息</button>
                        </div>
                        <div class="rows" v-if="serverId">
                            {{serverId}}
                        </div>
                        <div class="rows" v-if="user" style="margin-top:40px;">
                            <div class="col-md-4">
                                <img v-bind:src="user.avatar" class="img-rounded img-responsive" />
                            </div>
                            <div class="col-md-8">
                                <div>昵称：{{user.nickname}}</div>
                                <div>用户openid：{{user.id}}</div>
                            </div>
                        </div>
                        <div class="rows" v-if="loading">Loading...</div>
                        <div class="rows" v-if="images && !loading" style="margin-top:40px;">
                            <div class="col-md-6" v-for="image in images">
                                <div class="img-responsive" style="margin-bottom:20px;">
                                    <h4>{{image.title}}</h4>
                                    <img v-bind:src="image.url" class="img-responsive" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <v-touch tag="div" v-on:panend="onPanend" v-on:panmove="onPanmove" style="overflow:hidden;width:100%;height:400px;"><img ref="img" src="/storage/IMG_0008.JPG" width="920" height="1234" /></v-touch>
            </div>
        </div>
    </div>
</template>
<script>
var deltaX = 0;
var deltaY = 0;
var nLeftTemp = 0;
var nTopTemp = 0;
var liveScale = 1;
var currentScale = 1;
//var nWidth = img.width() || 0;
//var nHeight = img.height() || 0;  //获取目标图片的高宽
//var mWidth = $("#custom-album").width();
//var mHeight = $("#custom-album").height();
var minScale = 1;
    export default {
        name: 'index',
        data() {
            return {
                user: null,
                images: null,
                serverId: null,
                loading: false
            }
        },
        mounted() {
            //console.log('Component mounted.')
        },
        methods: {
            onPanmove: function(e){
                var dX = deltaX + e.deltaX;
                var dY = deltaY + e.deltaY;
                Velocity.hook(this.$refs.img, 'translateX', dX + 'px');
                Velocity.hook(this.$refs.img, 'translateY', dY + 'px');
            },
            onPanend: function(e){
                console.log(e);
            },
            showInfo: function(event){
                var _this = this;
                axios.get('/user',{})
                .then((response) => {
                    _this.user = response.data;
                    console.log(_this.user)
                })
            },
            upload: function(event){
                var _this = this;
                _this.loading = true;
                wx.chooseImage({
                    count: 1,
                    sizeType: ['compressed'],
                    sourceType: ['album', 'camera'],
                    success: function (res) {
                        var localIds = res.localIds;
                        wx.uploadImage({
                            localId: localIds[0],
                            isShowProgressTips: 1,
                            success: function (res) {
                                var serverId = res.serverId;
                                //_this.serverId = serverId;
                                axios.post('/image/'+serverId,{
                                })
                                .then((response) => {
                                    _this.loading = false
                                    if( response.data && response.data.ret == 0){
                                        _this.images = response.data.images;
                                    }
                                })
                                .catch(function (error) {
                                    _this.loading = false
                                    alert(JSON.stringify(error));
                                    console.log(error);
                                });
                            }
                        });
                    }
                });
            }
        }
    }
</script>
