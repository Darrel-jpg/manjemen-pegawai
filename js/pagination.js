document.addEventListener("DOMContentLoaded", function() {
    const container = document.getElementById("data-container");
    const BASE_URL = window.location.origin + '/index.php';

    function loadData(page = 1, updateURL = true) {
        fetch(`${BASE_URL}?c=pegawai&m=index&page=${page}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.text())
        .then(html => {
            container.innerHTML = html;
            if (updateURL) {
                history.pushState(null, '', `${BASE_URL}?c=pegawai&m=index&page=${page}`);
            }
        })
        .catch(err => console.error('Gagal memuat data:', err));
    }

    container.addEventListener("click", e => {
        const link = e.target.closest(".page-link");
        if (link) {
            e.preventDefault();
            const page = link.dataset.page;
            loadData(page);
        }
    });

    window.addEventListener("popstate", () => {
        const params = new URLSearchParams(window.location.search);
        const page = parseInt(params.get("page")) || 1;
        loadData(page, false);
    });
});
