<style>
    body,
    html {
        margin: 20;
        font-family: Arial, sans-serif;
    }

    .full-width-table {
        width: 100%;
        border-collapse: collapse;
    }

    .full-width-table th,
    .full-width-table td {
        border: 1px solid black;
        padding: 8px;
    }

    /* Kolom pertama dan ketiga */
    .full-width-table td:first-child,
    .full-width-table td:last-child {
        width: auto; /* Set lebar ke otomatis untuk menyesuaikan teks */
        text-align: center; /* Pusatkan teks */
    }

    /* Kolom kedua */
    .full-width-table td:nth-child(2) {
        width: 100%; /* Menetapkan lebar sisa untuk kolom kedua */
    }
    .page-break {
    page-break-after: always;
}
</style>

