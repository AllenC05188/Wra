// 確保DOM已經載入完成
document.addEventListener("DOMContentLoaded", function() {
    // 選擇所有需要的元素
    const bmManagementBtn = document.querySelector("[data-w-id='90af207a-a776-7d65-b9ca-61de9ae824ff']");
    const userManagementBtn = document.querySelector("[data-w-id='76806980-cced-8770-63aa-a9a93afcf219']");
    const roleManagementBtn = document.querySelector("[data-w-id='0f0b23af-65e4-1893-3f11-349e6c572247']");
    const reportAnalysisBtn = document.querySelector("[data-w-id='bde8cb6d-17ab-c873-68a4-a584b2669cd3']");
    const systemSettingsBtn = document.querySelector("[data-w-id='c97383f5-fc8b-6f89-bb5e-b2d2a8a83206']");
    
    const sections = document.querySelectorAll('.interface .hidden');

    // 顯示指定的部分
    function showSection(index) {
        sections.forEach((section, i) => {
            if (i === index) {
                section.style.display = 'block';
            } else {
                section.style.display = 'none';
            }
        });
    }

    // 添加事件監聽器
    bmManagementBtn.addEventListener("click", function() {
        showSection(0);
    });

    userManagementBtn.addEventListener("click", function() {
        showSection(1);
    });

    roleManagementBtn.addEventListener("click", function() {
        showSection(2);
    });

    reportAnalysisBtn.addEventListener("click", function() {
        showSection(3);
    });

    systemSettingsBtn.addEventListener("click", function() {
        showSection(4);
    });

    // 初始化顯示第一部分
    showSection(0);
});
