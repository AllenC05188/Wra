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
