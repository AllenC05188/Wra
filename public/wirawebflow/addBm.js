function addBm() {
    if (!validateForm()) {
        document.getElementById('response').innerText = '请填写所有必填字段。';
        return;
    }

    const form = document.getElementById('addBmForm');
    const formData = new FormData(form);

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(form.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        },
        body: formData
    })
    .then(response => response.json().then(data => ({status: response.status, body: data})))
    .then(data => {
        console.log('Response data:', data);
        if (data.status === 422) {
            console.log('Validation errors:', data.body.errors);
            document.getElementById('response').innerText = '子BM创建失败: ' + JSON.stringify(data.body.errors);
        } else if (data.status === 200) {
            document.getElementById('response').innerText = '子BM创建成功，ID: ' + data.body.ID;
        } else {
            document.getElementById('response').innerText = '子BM创建失败: ' + data.body.message;
        }
    })
    .catch(error => {
        document.getElementById('response').innerText = '子BM创建失败，请检查控制台日志获取更多信息。';
        console.error('Error:', error);
    });
}
