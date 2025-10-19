<?php

class Alert {
    public static function setAlert($judul, $pesan, $icon)
    {
        $_SESSION['alert'] = [
            'judul' => $judul,
            'pesan' => $pesan,
            'icon'  => $icon 
        ];
    }

    public static function alert()
    {
        if (isset($_SESSION['alert'])) {
            echo '
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        title: "' . $_SESSION['alert']['judul'] . '",
                        text: "' . $_SESSION['alert']['pesan'] . '",
                        icon: "' . $_SESSION['alert']['icon'] . '",
                        confirmButtonText: "OK",
                        confirmButtonColor: "#3085d6"
                    });
                });
            </script>
            ';
            unset($_SESSION['alert']);
        }
    }
}
