document.addEventListener("DOMContentLoaded", function() {
    window.fbAsyncInit = function() {
        FB.init({
            appId: document.querySelector('meta[name="facebook-app-id"]').getAttribute('content'),
            cookie: true,
            xfbml: true,
            version: document.querySelector('meta[name="facebook-default-graph-version"]').getAttribute('content')
        });

        FB.AppEvents.logPageView();
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) { return; }
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function getAccessToken() {
        FB.login(function(response) {
            if (response.authResponse) {
                const accessToken = FB.getAuthResponse().accessToken;
                document.getElementById('access_token').value = accessToken;
                alert('Access Token 已獲取並填入表單');
            } else {
                console.log('用戶取消登錄或未完全授權。');
            }
        }, {scope: 'email,public_profile,business_management'});
    }

    function addBm() {
        const form = document.getElementById('addBmForm');
        const formData = new FormData(form);
        const jsonObject = {};

        formData.forEach((value, key) => {
            jsonObject[key] = value;
        });

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonObject)
        })
        .then(response => {
            return response.json().then(data => ({status: response.status, ok: response.ok, body: data}));
        })
        .then(data => {
            if (data.ok && data.body && data.body.ID) {
                document.getElementById('response').innerText = '子BM創建成功，ID: ' + data.body.ID;
            } else {
                let errorMessage = '子BM創建失敗:\n';
                for (const [key, value] of Object.entries(data.body.errors || {})) {
                    errorMessage += `${key}: ${value.join(', ')}\n`;
                }
                if (data.body.error) {
                    errorMessage += `\nError: ${data.body.error}`;
                    if (data.body.details) {
                        errorMessage += `\nDetails: ${data.body.details}`;
                    }
                }
                document.getElementById('response').innerText = errorMessage;
            }
        })
        .catch(error => {
            document.getElementById('response').innerText = '子BM創建失敗，請檢查控制台日誌獲取更多信息。';
            console.error('錯誤:', error);
        });
    }

    window.getAccessToken = getAccessToken;  // 将 getAccessToken 函数暴露到全局，以便在 HTML 中调用
    window.addBm = addBm;  // 将 addBm 函数暴露到全局，以便在 HTML 中调用
});
