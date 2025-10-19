document.addEventListener("DOMContentLoaded", function() {
    const container = document.getElementById("data-container");
    const BASE_URL = window.location.origin + '/public/index.php';

    function loadData(page = 1, updateURL = true) {
        fetch(`${BASE_URL}/pegawai/${page}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
            .then(res => res.text())
            .then(html => {
                container.innerHTML = html;
                if (updateURL) {
                    history.pushState(null, '', `${BASE_URL}/pegawai/${page}`);
                }
            });
    }

    loadData();

    // klik pagination (termasuk tombol prev/next)
    container.addEventListener("click", e => {
        if (e.target.closest(".page-link")) {
            e.preventDefault();
            const page = e.target.closest(".page-link").dataset.page;
            loadData(page);
        }
    });

    // menangani tombol back browser
    window.addEventListener("popstate", () => {
        const pathParts = window.location.pathname.split("/");
        const page = parseInt(pathParts[pathParts.length - 1]) || 1;
        loadData(page, false);
    });
});

// document.addEventListener("DOMContentLoaded", function() {
//     const container = document.getElementById("data-container");
//     const BASE_URL = window.location.origin + '/public/index.php';

//     function loadData(page = 1, updateURL = true) {
//         fetch(`${BASE_URL}?url=pegawai/${page}`, {
//             headers: { 'X-Requested-With': 'XMLHttpRequest' }
//         })
//         .then(res => res.text())
//         .then(html => {
//             container.innerHTML = html;
//             if (updateURL) {
//                 history.pushState(null, '', `${BASE_URL}?url=pegawai/${page}`);
//             }
//         })
//         .catch(err => console.error('AJAX Error:', err));
//     }

//     loadData();

//     container.addEventListener("click", e => {
//         const link = e.target.closest(".page-link");
//         if (link) {
//             e.preventDefault();
//             const page = link.dataset.page;
//             loadData(page);
//         }
//     });

//     window.addEventListener("popstate", () => {
//         const params = new URLSearchParams(window.location.search);
//         const path = params.get('url') || '';
//         const page = parseInt(path.split('/').pop()) || 1;
//         loadData(page, false);
//     });
// });
