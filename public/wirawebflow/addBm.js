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
        if (!response.ok) {
            return response.json().then(data => {
                throw new Error(data.message || 'Unprocessable Content');
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.error) {
            document.getElementById('response').innerText = '子BM創建失敗: ' + data.error;
        } else {
            document.getElementById('response').innerText = '子BM創建成功，ID: ' + data.ID;
        }
    })
    .catch(error => {
        document.getElementById('response').innerText = '子BM創建失敗: ' + error.message;
        console.error('Error:', error);
    });
}
