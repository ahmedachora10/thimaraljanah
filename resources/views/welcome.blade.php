<x-main-layout>
    @push('styles')
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Tajawal', sans-serif;
                background: linear-gradient(135deg, #2B2B2B, #000000);
                color: white;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
                padding-top: 150px;
                animation: fadeIn 1.5s ease-in-out;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: scale(0.9);
                }

                to {
                    opacity: 1;
                    transform: scale(1);
                }
            }

            .navbar {
                width: 100%;
                height: 90px;
                background: linear-gradient(135deg, #333333, #1a1a1a);
                display: flex;
                justify-content: center;
                align-items: center;
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.5);
                position: fixed;
                top: 0;
                left: 0;
                z-index: 1000;
            }

            .logo {
                font-size: 50px;
                font-weight: 900;
                color: #FFD700;
                text-shadow: 0 8px 15px rgba(255, 255, 255, 0.5);
            }

            .button-container {
                width: 90%;
                max-width: 1200px;
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
                margin-top: 100px;
            }

            .custom-button {
                background: linear-gradient(135deg, #FFD700, #FFAA00);
                color: #333333;
                font-size: 22px;
                font-weight: 700;
                text-align: center;
                padding: 20px;
                border: none;
                border-radius: 15px;
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.6);
                cursor: pointer;
                transition: all 0.5s ease;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 10px;
                text-decoration: none;
            }

            .custom-button:hover {
                transform: translateY(-8px) scale(1.05);
                box-shadow: 0 20px 30px rgba(0, 0, 0, 0.8);
            }

            .custom-button i {
                font-size: 34px;
                color: #333333;
            }

            .custom-button span {
                font-size: 18px;
                color: #333333;
                text-align: center;
            }

            .social-container {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 20px;
                padding: 15px 0;
                background: linear-gradient(135deg, #333333, #1a1a1a);
                box-shadow: 0 -8px 15px rgba(0, 0, 0, 0.5);
            }

            .social-icon {
                font-size: 30px;
                color: #FFD700;
                text-decoration: none;
                transition: transform 0.4s ease, color 0.3s ease;
            }

            .social-icon:hover {
                transform: scale(1.3);
                color: #FFAA00;
            }

            .whatsapp-float {
                position: fixed;
                bottom: 120px;
                right: 30px;
                background: #25D366;
                color: white;
                width: 70px;
                height: 70px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 36px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.7);
                cursor: pointer;
                z-index: 1000;
                text-decoration: none;
                transition: transform 0.5s ease;
            }

            .whatsapp-float:hover {
                transform: scale(1.4) rotate(10deg);
            }

            /* تجاوب التصميم */
            @media (max-width: 1024px) {
                .button-container {
                    grid-template-columns: repeat(2, 1fr);
                }

                .custom-button {
                    font-size: 20px;
                    padding: 20px;
                }

                .logo {
                    font-size: 42px;
                }
            }

            @media (max-width: 768px) {
                .button-container {
                    grid-template-columns: 1fr;
                }

                .custom-button {
                    font-size: 18px;
                    padding: 15px;
                }

                .logo {
                    font-size: 36px;
                }

                .social-icon {
                    font-size: 26px;
                }

                .whatsapp-float {
                    width: 60px;
                    height: 60px;
                    font-size: 30px;
                }
            }

            @media (max-width: 480px) {
                .custom-button {
                    font-size: 16px;
                    padding: 10px;
                }

                .logo {
                    font-size: 32px;
                }

                .social-icon {
                    font-size: 22px;
                }

                .whatsapp-float {
                    width: 50px;
                    height: 50px;
                    font-size: 26px;
                }
            }
        </style>
    @endpush
    <div class="navbar">
        <div class="logo">شركة ثمار الجنة للصرافة</div>
    </div>
    <!-- الأزرار -->
    <div class="button-container">
        <a href="{{route('send-money')}}" class="custom-button">
            <i class="fas fa-exchange-alt"></i>
            <span>حوالات ويسترن يونيون</span>
        </a>
        <a href="{{route('reserve-dollar')}}" class="custom-button">
            <i class="fas fa-dollar-sign"></i>
            <span>حجز الدولار للمسافرين</span>
        </a>
        <a href="agent-transfer.html" class="custom-button">
            <i class="fas fa-user-tie"></i>
            <span>ويسترن يونيون عبر الوكيل</span>
        </a>
        <a href="{{route('sell-digital-currency')}}" class="custom-button">
            <i class="fas fa-coins"></i>
            <span>بيع العملات الرقمية</span>
        </a>
    </div>

    <!-- أيقونات التواصل الاجتماعي -->
    <div class="social-container">
        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
    </div>

    <!-- أيقونة واتساب -->
    <a href="https://wa.me/123456789" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </a>

    @push('scripts')
        <script>
            const links = document.querySelectorAll(".custom-button");
            links.forEach(link => {
                link.addEventListener("click", (e) => {
                    e.preventDefault();
                    const target = e.target.closest("a").href;
                    document.body.style.opacity = 0;
                    setTimeout(() => {
                        window.location.href = target;
                    }, 500);
                });
            });
        </script>
    @endpush
</x-main-layout>
