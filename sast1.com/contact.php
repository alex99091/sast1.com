<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SAST1</title>

    <!-- favicon setting-->
    <link rel="icon" href="images/favicon.ico/favicon-16x16.png" sizes="16x16" type="image/x-icon" />

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
    <div class="hero_area">
        <!-- Header를 불러올 div -->
        <div id="header-container"></div>
        <!-- end header section -->
    </div>

    <!-- contact section -->

    <section class="contact_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Contact Form
                </h2>
            </div>
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="col-md-9 mx-auto">
                            <div class="contact-form">
                                <!-- form 부분만 수정 -->
                                <form action="send.php" method="post">
                                    <div>
                                        <input type="text" name="name" placeholder="Full Name" required>
                                    </div>
                                    <div>
                                        <input type="text" name="number" placeholder="Phone Number" required>
                                    </div>
                                    <div>
                                        <input type="email" name="email" placeholder="Email Address" required>
                                    </div>
                                    <div>
                                        <input type="text" name="message" placeholder="Message" class="input_message" required>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="send" class="btn_on-hover">Send</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end contact section -->

    <!-- Footer 불러올 div -->
    <div id="footer-container"></div>
    <!-- end header section -->

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- owl carousel script -->
    <script type="text/javascript">
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 0,
            navText: [],
            center: true,
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                1000: {
                    items: 3
                }
            }
        });
    </script>
    <!-- end owl carousel script -->

    <!-- JavaScript 코드 -->
    <script>
        // Header를 불러오는 함수
        function loadHeader() {
            fetch('header.html')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('header-container').innerHTML = data;
                })
                .catch(error => {
                    console.error('Header를 불러오는 동안 오류가 발생했습니다.', error);
                });
        }

        // Footer를 불러오는 함수
        function loadFooter() {
            fetch('footer.html')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('footer-container').innerHTML = data;
                })
                .catch(error => {
                    console.error('Footer를 불러오는 동안 오류가 발생했습니다.', error);
                });
        }

        // 페이지가 로드될 때 Header와 Footer를 불러옴
        window.addEventListener('load', () => {
            loadHeader();
            loadFooter();
        });
    </script>

</body>

</html>
