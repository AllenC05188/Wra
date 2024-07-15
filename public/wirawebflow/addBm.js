window.fbAsyncInit = function() {
    FB.init({
        appId      : '{{ env('FACEBOOK_APP_ID') }}', // 使用環境變數
        cookie     : true,
        xfbml      : true,
        version    : '{{ env('FACEBOOK_DEFAULT_GRAPH_VERSION') }}' // 使用環境變數
    });

    FB.AppEvents.logPageView();
};

function facebookLogin() {
    FB.login(function(response) {
        if (response.authResponse) {
            console.log('歡迎！正在獲取您的信息.... ');
            FB.api('/me', function(response) {
                console.log('很高興見到你, ' + response.name);
                // 將訪問令牌附加到表單並提交
                document.getElementById('access_token').value = FB.getAuthResponse().accessToken;
                // 可以生成appsecret_proof，如果需要的話
                const appSecret = '{{ env('FACEBOOK_APP_SECRET') }}';
                const accessToken = FB.getAuthResponse().accessToken;
                const appsecret_proof = CryptoJS.HmacSHA256(accessToken, appSecret).toString();
                document.getElementById('appsecret_proof').value = appsecret_proof;

                document.getElementById('addBmForm').submit();
            });
        } else {
            console.log('用戶取消登錄或未完全授權。');
        }
    }, {scope: 'email,public_profile,business_management'});
}

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
