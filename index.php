<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Jurnal Otomatis</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        /* ========================================
        CSS Reset & General Styling
        ========================================
        */
        :root {
            --primary-color: #3685fb;
            --primary-hover: #2f73d9;
            --secondary-color: #f0f5ff;
            --background-color: #f7f9fc;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --border-color: #e2e8f0;
            --white: #ffffff;
            --success-color: #10b981;
            --success-hover: #059669;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --border-radius: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-color);
            color: var(--text-dark);
            display: flex;
            flex-direction: column; /* Stack form and output vertically */
            justify-content:center;
            align-items: center; 
            min-height: 100vh;
            padding: 2rem 1rem;
            gap: 2rem; /* Space between form and output */
        }

        /* ========================================
        Main Container Card (Form)
        ========================================
        */
        .card-container {
            background-color: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            width: 100%;
            max-width: 600px;
            padding: 2.5rem;
            transition: all 0.3s ease-in-out;
        }

        .card-container h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 2.5rem;
            text-align: center;
            position: relative;
        }
        
        .card-container h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 4px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }

        /* ========================================
        Form Styling
        ========================================
        */
        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        input, select {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-color);
            transition: border-color 0.3s, box-shadow 0.3s;
            color: var(--text-dark);
        }

        input:focus, select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(54, 133, 251, 0.2);
            outline: none;
        }
        
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1em;
        }

        .input-row {
            display: flex;
            gap: 1.5rem;
        }

        .input-row .form-group {
            flex: 1;
        }

        /* ========================================
        Button Styling
        ========================================
        */
        button[type="submit"] {
            width: 100%;
            padding: 0.8rem 1rem;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--white);
            background: linear-gradient(45deg, var(--primary-color), var(--primary-hover));
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 1rem;
            box-shadow: var(--shadow-md);
        }

        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }
        
        button[type="submit"]:active {
            transform: translateY(0);
            box-shadow: var(--shadow-sm);
        }

        /* ========================================
        Journal Output Table
        ========================================
        */
        .jurnal-output {
            width: 100%;
            max-width: 600px;
            background-color: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            padding: 2rem;
        }

        .jurnal-output h2 {
            font-size: 1.75rem;
            color: var(--text-dark);
            text-align: center;
            margin-bottom: 2rem;
        }

        .jurnal-table-wrapper {
            overflow-x: auto;
        }

        .jurnal-table {
            width: 100%;
            border-collapse: collapse;
            border-style: hidden;
        }

        .jurnal-table th, .jurnal-table td {
            padding: 1rem 1.5rem;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        .jurnal-table th {
            background-color: var(--secondary-color);
            color: var(--text-dark);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }
        
        .jurnal-table thead th:first-child { border-top-left-radius: 8px; }
        .jurnal-table thead th:last-child { border-top-right-radius: 8px; }
        .jurnal-table tbody tr:last-child td:first-child { border-bottom-left-radius: 8px; }
        .jurnal-table tbody tr:last-child td:last-child { border-bottom-right-radius: 8px; }
        .jurnal-table tbody tr:last-child td { border-bottom: none; }


        .jurnal-table tbody tr {
            transition: background-color 0.2s;
        }

        .jurnal-table tbody tr:hover {
            background-color: var(--secondary-color);
        }

        .jurnal-table td:nth-child(2),
        .jurnal-table td:nth-child(3) {
            text-align: right;
            font-family: 'Roboto Mono', monospace;
            font-weight: 500;
            color: var(--text-light);
        }
        
        .jurnal-table td {
            color: var(--text-dark);
        }

        /* ========================================
        Responsive Design
        ========================================
        */
        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            .card-container, .jurnal-output {
                padding: 2rem;
                max-width: 100%;
            }
        }

        @media (max-width: 600px) {
            .card-container, .jurnal-output {
                padding: 1.5rem;
            }
            .card-container h1 {
                font-size: 1.5rem;
            }
            .input-row {
                flex-direction: column;
                gap: 1.5rem;
            }
            .jurnal-table th, .jurnal-table td {
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
            }
            .jurnal-output h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>

    <div class="card-container">
        <h1>Sistem Pencatatan Jurnal</h1>
        <form action="hasil.php" method="post">
            <div class="form-group">
                <label for="pembelian">Jumlah Pembelian</label>
                <input name="pembelian" id="pembelian" type="number" placeholder="Masukan Pembelian" required>
            </div>

            <div class="input-row">
                <div class="form-group">
                    <label for="type">Jenis Aset</label>
                    <select name="type" id="type">
                        <option value="persediaan">Persediaan</option>
                        <option value="kendaraan">Kendaraan</option>
                        <option value="perlengkapan">Perlengkapan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jurnal">Metode Pembayaran</label>
                    <select name="jurnal" id="jurnal">
                        <option value="debit">Tunai</option>
                        <option value="kredit">Kredit</option>
                    </select>
                </div>
            </div>
            <button name="submit" type="submit" value="submit">Buat Jurnal</button>
        </form>
    </div>
    
   

</body>
</html>
