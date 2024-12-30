<x-main-layout title="حاسبة الرسوم والصرف | شركة ثمار الجنة للصرافة">

    @push('styles')
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Tajawal', sans-serif;
                background: linear-gradient(135deg, #4a8eab, #0a4e7f);
                /* السماء الغامق */
                color: #333333;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
                padding-top: 120px;
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
                background: #003f63;
                /* السماء الغامق */
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
                color: white;
                text-shadow: 0 8px 15px rgba(255, 255, 255, 0.5);
            }

            .content-container {
                width: 80%;
                max-width: 1200px;
                margin-top: 150px;
                background: #ffffff;
                padding: 30px;
                border-radius: 15px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
                font-size: 18px;
            }

            .content-container h2 {
                font-size: 26px;
                color: #333333;
                margin-bottom: 20px;
                text-align: center;
                font-weight: 900;
            }

            .note {
                background: #f4f4f4;
                padding: 20px;
                border-radius: 8px;
                font-size: 18px;
                color: #333333;
                margin-bottom: 30px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                line-height: 1.8;
            }

            .calculator {
                margin-top: 30px;
                color: #003f63;
                line-height: 2;
            }

            .calculator p {
                font-size: 20px;
                margin-bottom: 15px;
            }

            .calculator p strong {
                font-size: 22px;
                color: #004b6f;
            }

            /* لإضافة تباين */
            .submit-button {
                background: #003f63;
                /* السماء الغامق */
                color: white;
                font-size: 22px;
                font-weight: 700;
                text-align: center;
                padding: 20px;
                border: none;
                border-radius: 15px;
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.4);
                cursor: pointer;
                transition: all 0.5s ease;
                width: 100%;
                margin-top: 20px;
            }

            .submit-button:hover {
                transform: translateY(-8px) scale(1.05);
                box-shadow: 0 20px 30px rgba(0, 0, 0, 0.7);
            }

            .submit-button:active {
                transform: translateY(2px);
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            }
        </style>
    @endpush
<!-- الشريط العلوي -->
<div class="navbar">
    <div class="logo">شركة ثمار الجنة للصرافة</div>
</div>

<!-- المحتوى -->
<div class="content-container">
    <!-- ملاحظة مهمة -->
    <div class="note">
        <p>قرر البنك المركزي العراقي التزام الوكلاء الرئيسيين لشركات التحويل المالي العالمية (ويسترن يونين ، موني غرام)
            باعتماد سعر الصرف الرسمي 1320 دينار /دولار للمستفيد النهائي للحوالات الواردة والصادرة استناداً الى تعليماتنا
            الصادرة بهذا الشأن، وسوف تقبل طلباتهم لغرض تعزيز ارصدتهم مع الشركات اعلاه وفقاً لضوابط التحويل الخارجي.</p>
    </div>

    <h2>حاسبة الرسوم والصرف</h2>

    <div class="calculator">
        <p><strong>من 100 دولار إلى 1000 دولار:</strong><br> برسوم تحويل منخفضة $2 فقط</p>
        <p><strong>من 1000 دولار إلى 5000 دولار:</strong><br> برسوم تحويل منخفضة $5 فقط</p>
        <p><strong>من 5000 دولار إلى 7500 دولار:</strong><br> برسوم تحويل منخفضة $12 فقط</p>
    </div>
</div>
</x-main-layout>
