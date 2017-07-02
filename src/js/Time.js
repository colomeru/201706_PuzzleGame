var Time = function(){
    this.time = 0;
    this.isUpdate = false;
}

Time.prototype = {
    // 初期化
    init : function(){
        this.time = 0;
        this.isUpdate = true;
    },
    // 更新
    update : function(){
        if(this.isUpdate){
            this.time++;
        }
    },
    // 時間取得
    getTime : function(){
        return this.time;
    },
    // 時間取得（分：秒）
    getTimeText : function(){
        var min = Math.floor(this.time / 60 / 60);
        var sec = Math.floor((this.time - 60 * min) / 60) % 60;
        var result = min + ":" + sec;

        return result;
    },
    // 変換
    format : function(time){
        var min = Math.floor(time / 60 / 60);
        var sec = Math.floor((time - 60 * min) / 60) % 60;
        var result = min + ":" + sec;

        return result;
    },
    // 停止
    stop : function(){
        this.isUpdate = false;
    },
    // ミス
    miss : function(){
        this.time += 60 * 10;
    }
}