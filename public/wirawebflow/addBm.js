function validateForm() {
    const form = document.getElementById('addBmForm');
    const requiredFields = ['parentBmId', 'bmName', 'shared_page_id', 'bmVertical', 'access_token'];
    let isValid = true;

    requiredFields.forEach(field => {
        const input = document.getElementById(field);
        if (!input.value) {
            isValid = false;
            input.style.border = '1px solid red';
        } else {
            input.style.border = '';
        }
    });

    return isValid;
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
        return response.json().then(data => ({status: response.status, body: data}));
    })
    .then(data => {
        if (data.status === 422) {
            console.log('Validation errors:', data.body.errors);
            document.getElementById('response').innerText = '子BM創建失敗: ' + JSON.stringify(data.body.errors);
        } else if (data.status === 200) {
            document.getElementById('response').innerText = '子BM創建成功，ID: ' + data.body.ID;
        } else {
            document.getElementById('response').innerText = '子BM創建失敗: ' + data.body.message;
        }
    })
    .catch(error => {
        document.getElementById('response').innerText = '子BM創建失敗，請檢查控制台日誌獲取更多信息。';
        console.error('Error:', error);
    });
}
