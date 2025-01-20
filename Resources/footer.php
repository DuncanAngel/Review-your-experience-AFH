<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .footer {
            background-color: #f9f9f9; /* Light background color */
            padding: 40px 0;
            border-top: 1px solid #ddd;
        }

        .footer .quick-links h5 {
            text-transform: uppercase;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .footer .quick-links a {
            color: black;
            text-decoration: none;
            font-size: 14px;
            display: block;
            margin-bottom: 5px;
        }

        .footer .quick-links a:hover {
            color: #b22222; /* Red hover color */
        }

        .footer .back-to-top {
            width: 40px;
            height: 40px;
            background-color: black;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            margin: 20px auto;
            cursor: pointer;
            font-size: 18px;
        }

        .footer .back-to-top:hover {
            background-color: #b22222;
        }

        .footer .payment-icons img {
            width: 40px;
            margin: 0 10px;
        }

        .footer .copyright {
            font-size: 14px;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Quick Links -->
                <div class="col-md-6">
                    <div class="quick-links">
                        <h5>Quick Links</h5>
                        <a href="#refund">Refund Policy</a>
                        <a href="#shipping">Shipping Policy</a>
                        <a href="#terms">Terms of Conditions</a>
                        <a href="#privacy">Privacy Policy</a>
                    </div>
                </div>

                <!-- Payment Icons -->
                <div class="col-md-6 text-md-end text-center">
                    <div class="payment-icons">
                        <img src="https://via.placeholder.com/40x25?text=AMEX" alt="Amex">
                        <img src="https://via.placeholder.com/40x25?text=Visa" alt="Visa">
                        <img src="https://via.placeholder.com/40x25?text=MasterCard" alt="MasterCard">
                        <img src="https://via.placeholder.com/40x25?text=Discover" alt="Discover">
                    </div>
                </div>
            </div>

            <!-- Back to Top Button -->
            <div class="back-to-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">
                &#x25B2;
            </div>

            <!-- Copyright -->
            <div class="text-center copyright">9
                Copyright © 2025 Angels from hell
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>