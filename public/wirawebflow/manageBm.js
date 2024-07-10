function updateCredit(bmId) {
    const creditAllocation = document.querySelector(`input[name="credit_allocation_${bmId}"]`).value;
    const xhr = new XMLHttpRequest();

    xhr.open('POST', `/update-bm/${bmId}`, true);
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            const response = JSON.parse(xhr.responseText);
            if (xhr.status === 200) {
                if (response.error) {
                    alert('更新失敗: ' + response.error);
                } else {
                    alert('更新成功');
                    window.location.reload();  // Refresh the page
                }
            } else {
                alert('更新失敗，請檢查控制台日誌獲取更多信息。');
                console.error('Error:', xhr.responseText);
            }
        }
    };

    xhr.send(JSON.stringify({ credit_limit: creditAllocation }));
}

function deleteBm(bmId) {
    if (!confirm('確定要刪除這個子BM嗎？')) {
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('DELETE', `/delete-bm/${bmId}`, true);
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            const response = JSON.parse(xhr.responseText);
            if (xhr.status === 200) {
                if (response.error) {
                    alert('刪除失敗: ' + response.error);
                } else {
                    alert('刪除成功');
                    window.location.reload();  // Refresh the page
                }
            } else {
                alert('刪除失敗，請檢查控制台日誌獲取更多信息。');
                console.error('Error:', xhr.responseText);
            }
        }
    };

    xhr.send();
}

function updateCredits() {
    const formData = new FormData();
    document.querySelectorAll('input[type="number"]').forEach(input => {
        formData.append(input.name, input.value);
    });

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/update-budgets', true);
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            const response = JSON.parse(xhr.responseText);
            if (xhr.status === 200) {
                if (response.error) {
                    alert('更新失敗: ' + response.error);
                } else {
                    alert('更新成功');
                    window.location.reload();  // Refresh the page
                }
            } else {
                alert('更新失敗，請檢查控制台日誌獲取更多信息。');
                console.error('Error:', xhr.responseText);
            }
        }
    };

    xhr.send(formData);
}
