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
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            document.getElementById('response').innerText = '子BM創建失敗: ' + data.error;
        } else {
            document.getElementById('response').innerText = '子BM創建成功，ID: ' + data.ID; // 注意這裡的 "ID" 大寫
        }
    })
    .catch(error => {
        document.getElementById('response').innerText = '子BM創建失敗，請檢查控制台日誌獲取更多信息。';
        console.error('Error:', error);
    });
}
