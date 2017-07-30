var messageField = $('#messageInput');  //メッセージ内容入力蘭
var nameField = $('#nameInput');        // 名前入力蘭
var messageList = $('#messages');       // メッセージ表示蘭

// メッセージ投稿時にLocalに保存したname情報を読み込む
if (localStorage.getItem('local_name')){
    $('#nameInput').val(localStorage.getItem('local_name'));
}

// MSG送受信準備
var newPostRef = firebase.database().ref();

// ENTERキーを押した時に発動
messageField.keypress(function (e) {
    if (e.keyCode == 13) {
        newPostRef.push({
            username: nameField.val(),
            text: messageField.val()
        });

        // メッセージ欄の中身を一旦空にし、name情報をlocalStorageに保存
        messageField.val("");
        localStorage.setItem('local_name', $('#nameInput').val());

        // 新投稿を見るためにスクロールさせる
        $('#scroller').scrollTop($('#messages').height());
    }
});

// 画像読み込み
var obj1 = document.getElementById("selfile");

obj1.addEventListener("change", function(evt){
    var file = evt.target.files;
    var reader = new FileReader();

    // dataURL形式でファイルを読み込む
    reader.readAsDataURL(file[0]);

    // ファイルの読込が終了した時の処理
    reader.onload = function(){
        var dataUrl = reader.result;

        // 画像をリサイズする関数
        var resizeImage = function(base64image, callback) {
            const MIN_SIZE = 380;   // 横幅サイズ
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
            var image = new Image();
            image.crossOrigin = "Anonymous";
            image.onload = function(event){
              var dstWidth, dstHeight;
              if (this.width > this.height) {
                dstWidth = MIN_SIZE;
                dstHeight = this.height * MIN_SIZE / this.width;
              } else {
                dstHeight = MIN_SIZE;
                dstWidth = this.width * MIN_SIZE / this.height;
              }
              canvas.width = dstWidth;
              canvas.height = dstHeight;
              ctx.drawImage(this, 0, 0, this.width, this.height, 0, 0, dstWidth, dstHeight);
              callback(canvas.toDataURL());
            };
            image.src = base64image;
        };

        // リサイズした画像をアップロードする処理
        resizeImage(dataUrl, function(resizedfile) {
            //読み込んだdataURLをサーバに送信する
            newPostRef.push({
                username: nameField.val(),
                text: resizedfile
            });
        });
    }
  dataUrl = "";
},false);


// データベースにデータが追加されたときに発動
newPostRef.on('child_added',function(data) {

    var v = data.val();        // データ取得
    var username = v.username; // 名前取得
    var message = v.text;      // メッセージ取得
    var k = data.key;          // ユニークKEY取得

    // messageにdata:image(画像)を含む場合の処理
    if ( message.match(/data:image/) ) {
        //取得したデータの名前が自分の名前なら右側に吹き出しを出す
        if ( username == nameField.val() ) {
            var messageElement = $("<il><p class='sender_name me'>" + username + "</p><p id='k' class='right_balloon'>" + "<img src='" + message + "'>" + "</p><p class='clear_balloon'></p></il>");
        } else {
            var messageElement = $("<il><p class='sender_name'>" + username + "</p><p id='k' class='left_balloon'>" + "<img src='" + message + "'>" + "</p><p class='clear_balloon'></p></il>");
        }
    }else {
        if ( username == nameField.val() ) {
            var messageElement = $("<il><p class='sender_name me'>" + username + "</p><p id='k' class='right_balloon'>" + message + "</p><p class='clear_balloon'></p></il>");
        } else {
            var messageElement = $("<il><p class='sender_name'>" + username + "</p><p id='k' class='left_balloon'>" + message + "</p><p class='clear_balloon'></p></il>");
        }
    }

    // 新投稿を見るためにスクロールさせる
    $('#scroller').scrollTop($('#messages').height());

    // 音声録音準備
    window.SpeechRecognition = window.SpeechRecognition || webkitSpeechRecognition;
    var recognition = new webkitSpeechRecognition();
    recognition.lang = 'ja';
    // 中間結果の表示オン
    recognition.interimResults = true;

    // 録音開始
    $('#rec_start').on("click",function(){
        recognition.start();
        // 話し声の認識中
        recognition.onsoundstart = function(){
            $("#state").text("認識しています...");
        };
        // マッチする認識が無い
        recognition.onnomatch = function(){
            $("#recognizedText").text("もう一度試してください");
        };
        // エラー
        recognition.onerror= function(){
            $("#recognizedText").text("エラー");
        };

       // 話し声の認識終了
        recognition.onsoundend = function(){
            $("#state").text("停止中");
        };
        // 認識が終了したときのイベント
        recognition.onresult = function(event){
            var results = event.results;
            for (var i = event.resultIndex; i<results.length; i++){
                // 認識の最終結果
                if(results[i].isFinal){
                    $('#messageInput').val(results[i][0].transcript);
                }
                // 認識の中間結果
                else{
                    $('#messageInput').val(results[i][0].transcript);
                }
            }
        };
    });

    //HTMLに取得したデータを追加する
    messageList.append(messageElement)

    //一番下にスクロールする
    messageList[0].scrollTop = messageList[0].scrollHeight;
});


