<x-main-layout title="نموذج حجز">

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

            .form-container {
                width: 80%;
                max-width: 1200px;
                margin-top: 150px;
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
                padding: 20px;
                border-radius: 15px;
                background: #ffffff;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            }

            .form-container label {
                font-size: 18px;
                color: #333333;
                margin-bottom: 10px;
                font-weight: 600;
            }

            .form-container select,
            .form-container input[type="text"],
            .form-container input[type="number"],
            .form-container input[type="file"],
            .form-container input[type="checkbox"] {
                width: 100%;
                padding: 15px;
                font-size: 16px;
                border-radius: 10px;
                border: 1px solid #4a8eab;
                background-color: #f9f9f9;
                color: #333333;
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
                transition: 0.3s ease;
            }

            .form-container select:focus,
            .form-container input[type="text"]:focus,
            .form-container input[type="number"]:focus,
            .form-container input[type="file"]:focus,
            .form-container input[type="checkbox"]:focus {
                outline: none;
                border-color: #003f63;
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            }

            .checkbox-container {
                margin-top: 20px;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .checkbox-container input {
                transform: scale(1.5);
            }

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

            .error {
                border-color: red;
                box-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
            }

            .error-message {
                color: red;
                font-size: 14px;
            }

            .payment-info {
                background: #f4f4f4;
                padding: 15px;
                margin-top: 20px;
                border-radius: 10px;
            }

            .secure-message {
                background-color: #f2f2f2;
                padding: 15px;
                margin-top: 15px;
                border-radius: 8px;
                font-size: 16px;
                color: #333333;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            // التحقق من الحقول المطلوبة
            function validateForm() {
                let isValid = true;

                // إزالة أي أخطاء سابقة
                document.querySelectorAll('.error-message').forEach(function(error) {
                    error.textContent = '';
                });

                const currency = document.getElementById('currency');
                const amount = document.getElementById('amount');
                const senderName = document.getElementById('sender-name');
                const receiverName = document.getElementById('receiver-name');
                const senderPhone = document.getElementById('sender-phone');
                const receiverPhone = document.getElementById('receiver-phone');
                const transferLocation = document.getElementById('transfer-location');
                const transferReason = document.getElementById('transfer-reason');
                const idImage = document.getElementById('id-image');

                if (currency.value === "") {
                    document.getElementById('currency-error').textContent = 'يرجى اختيار العملة';
                    isValid = false;
                }

                if (amount.value === "") {
                    document.getElementById('amount-error').textContent = 'يرجى اختيار المبلغ';
                    isValid = false;
                }

                if (senderName.value === "") {
                    document.getElementById('sender-name-error').textContent = 'يرجى إدخال اسم المرسل';
                    isValid = false;
                }

                if (receiverName.value === "") {
                    document.getElementById('receiver-name-error').textContent = 'يرجى إدخال اسم المستلم';
                    isValid = false;
                }

                if (senderPhone.value === "") {
                    document.getElementById('sender-phone-error').textContent = 'يرجى إدخال رقم الهاتف للمرسل';
                    isValid = false;
                }

                if (receiverPhone.value === "") {
                    document.getElementById('receiver-phone-error').textContent = 'يرجى إدخال رقم الهاتف للمستلم';
                    isValid = false;
                }

                if (transferLocation.value === "") {
                    document.getElementById('transfer-location-error').textContent = 'يرجى اختيار جهة التحويل';
                    isValid = false;
                }

                if (transferReason.value === "") {
                    document.getElementById('transfer-reason-error').textContent = 'يرجى اختيار سبب التحويل';
                    isValid = false;
                }

                if (!idImage.files.length) {
                    document.getElementById('id-image-error').textContent = 'يرجى إرفاق صورة جواز السفر أو البطاقة الموحدة';
                    isValid = false;
                }

                return isValid;
            }

            $(document).ready(function() {
                $('#send-money-form').on('submit', function(e) {
                    e.preventDefault(); // Prevent the form from submitting normally
                    if (validateForm()) {

                        // Collect form data
                        let form = this;
                        let formData = new FormData(form);

                        // Make the AJAX request
                        $.ajax({
                            url: '{{ route("modify-transfer-request.store") }}', // Update with the store route URL
                            type: 'POST',
                            data: formData,
                            dataType: 'json',
                            processData: false, // Prevent jQuery from automatically transforming the data into a query string
                            contentType: false,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content') // Include the CSRF token
                            },
                            success: function(response) {
                                if (response.success) {
                                    $('.success-message p').text(response.message);

                                    $('.success-message').css({
                                        'backgroundColor': 'green',
                                        'color': 'white'
                                    });

                                    $('.success-message').show();

                                    $('select').val('');
                                    $('input').val('');
                                } else {
                                    $('#response-message').html(
                                        '<span style="color:red;">An error occurred.</span>'
                                    );
                                }
                            },
                            error: function(xhr) {
                                let errors = xhr.responseJSON.errors;
                                let errorMessage = 'Error: ';
                                if (errors) {
                                    for (const key in errors) {
                                        errorMessage += errors[key][0] + '<br>';
                                    }
                                } else {
                                    errorMessage += 'Unknown error.';
                                }
                                $('#response-message').html(
                                    '<span style="color:red;">' + errorMessage +
                                    '</span>');
                            }
                        });
                    }
                });
            });
        </script>
    @endpush

    <form class="form-container" id="send-money-form" method="POST" enctype="multipart/form-data">
        <!-- حقل اختيار العملة -->
        <div>
            <label for="currency">عملة الاستلام</label>
            <select id="currency" name="currency" required>
                <option value="">اختر العملة</option>
                <option value="USD">USD</option>
                <option value="IQD">IQD</option>
            </select>
            <div class="error-message" id="currency-error"></div>
        </div>

        <!-- حقل المبلغ -->
        <div>
            <label for="amount">حدد المبلغ (من 100 دولار إلى 7400 دولار)</label>
            <select id="amount" name="amount" required>
                <option value="">اختر المبلغ</option>
                <option value="100">100 دولار</option>
                <option value="150">150 دولار</option>
                <option value="200">200 دولار</option>
                <option value="250">250 دولار</option>
                <option value="300">300 دولار</option>
                <option value="350">350 دولار</option>
                <option value="400">400 دولار</option>
                <option value="450">450 دولار</option>
                <option value="500">500 دولار</option>
                <option value="1000">1000 دولار</option>
                <option value="1500">1500 دولار</option>
                <option value="2000">2000 دولار</option>
                <option value="3000">3000 دولار</option>
                <option value="4000">4000 دولار</option>
                <option value="5000">5000 دولار</option>
                <option value="6000">6000 دولار</option>
                <option value="7000">7000 دولار</option>
                <option value="7400">7400 دولار</option>
            </select>
            <div class="error-message" id="amount-error"></div>
        </div>

        <!-- حقل اسم المرسل -->
        <div>
            <label for="sender-name">اسم المرسل</label>
            <input type="text" id="sender-name" name="sender_name" placeholder="اسم المرسل" required>
            <div class="error-message" id="sender-name-error"></div>
        </div>

        <!-- حقل اسم المستلم -->
        <div>
            <label for="receiver-name">اسم المستلم</label>
            <input type="text" id="receiver-name" name="recipient_name" placeholder="اسم المستلم" required>
            <div class="error-message" id="receiver-name-error"></div>
        </div>

        <!-- حقل رقم الهاتف للمرسل -->
        <div>
            <label for="sender-phone">رقم الهاتف للمرسل</label>
            <input type="text" id="sender-phone" name="sender_phone_number" placeholder="+9647xxxxxxxxx" required>
            <div class="error-message" id="sender-phone-error"></div>
        </div>

        <!-- حقل رقم الهاتف للمستلم -->
        <div>
            <label for="receiver-phone">رقم الهاتف للمستلم</label>
            <input type="text" id="receiver-phone" name="recipient_phone_number" placeholder="+9647xxxxxxxxx"
                required>
            <div class="error-message" id="receiver-phone-error"></div>
        </div>

        <!-- حقل جهة التحويل -->
        <div>
            <label for="transfer-location">جهة التحويل</label>
            <select id="transfer-location" name="location" required>
                <option value="">اختر الجهة</option>
                <option value="بغداد">بغداد</option>
                <option value="البصرة">البصرة</option>
                <option value="النجف">النجف</option>
                <option value="اربيل">اربيل</option>
                <option value="ديالى">ديالى</option>
                <option value="الموصل">الموصل</option>
                <option value="الانبار">الانبار</option>
                <option value="سليمانية">سليمانية</option>
                <option value="الديوانية">الديوانية</option>
                <option value="ذي قار">ذي قار</option>
                <option value="دهوك">دهوك</option>
                <option value="بابل">بابل</option>
                <option value="ميسان">ميسان</option>
                <option value="كربلاء">كربلاء</option>
                <option value="كركوك">كركوك</option>
                <option value="المثنى">المثنى</option>
                <option value="واسط">واسط</option>
                <option value="صلاح الدين">صلاح الدين</option>
            </select>
            <div class="error-message" id="transfer-location-error"></div>
        </div>

        <!-- حقل سبب التحويل -->
        <div>
            <label for="transfer-reason">سبب التحويل</label>
            <select id="transfer-reason" name="transaction_purpose" required>
                <option value="">اختر السبب</option>
                <option value="هدية">هدية</option>
                <option value="مصاريف دراسية">مصاريف دراسية</option>
                <option value="تسديد إقساط">تسديد إقساط</option>
                <option value="دين">دين</option>
                <option value="علاج">علاج</option>
            </select>
            <div class="error-message" id="transfer-reason-error"></div>
        </div>

        <!-- حقل صورة جواز السفر أو البطاقة الموحدة -->
        <div>
            <label for="id-image">صورة جواز السفر أو البطاقة الموحدة للمستلم</label>
            <input type="file" id="id-image" name="passport" required>
            <div class="error-message" id="id-image-error"></div>
        </div>

        <!-- حقل التحويل اليدوي -->
        <div>
            <label for="manual-transfer-method" style=" display:block">طريقة التحويل </label>
            <a href="https://wa.me/"><i class="fab fa-whatsapp text-green-600"></i></a>
        </div>


        <button class="submit-button" type="submit" id="submit-btn">إرسال الأموال</button>
    </form>

    <div class="success-message secure-message" style="display: none">
        <p></p>
    </div>

    <div class="secure-message">
        <p>ملاحظة: تأكد من صحة البيانات المدخلة للتحقق من صحة المعاملة.</p>
    </div>
    {{--
    <!-- الشريط العلوي -->
    <div class="navbar">
        <div class="logo">شركة ثمار الجنة للصرافة</div>
    </div>

    <!-- نموذج تعديل التحويل -->
    <div class="form-container">
        <!-- حقل اختيار العملة -->
        <div>
            <label for="currency">عملة الاستلام</label>
            <select id="currency">
                <option value="USD">USD</option>
                <option value="IQD">IQD</option>
            </select>
            <div class="error-message" id="currency-error"></div>
        </div>

        <!-- حقل المبلغ -->
        <div>
            <label for="amount">حدد المبلغ</label>
            <select id="amount">
                <option value="100">100 دولار</option>
                <option value="150">150 دولار</option>
                <option value="200">200 دولار</option>
                <option value="250">250 دولار</option>
                <option value="300">300 دولار</option>
                <option value="350">350 دولار</option>
                <option value="400">400 دولار</option>
                <option value="450">450 دولار</option>
                <option value="500">500 دولار</option>
                <option value="550">550 دولار</option>
                <option value="600">600 دولار</option>
                <option value="650">650 دولار</option>
                <option value="700">700 دولار</option>
                <option value="750">750 دولار</option>
                <option value="800">800 دولار</option>
                <option value="850">850 دولار</option>
                <option value="900">900 دولار</option>
                <option value="1000">1000 دولار</option>
                <option value="1500">1500 دولار</option>
                <option value="2000">2000 دولار</option>
                <option value="2500">2500 دولار</option>
                <option value="3000">3000 دولار</option>
                <option value="3500">3500 دولار</option>
                <option value="4000">4000 دولار</option>
                <option value="4500">4500 دولار</option>
                <option value="5000">5000 دولار</option>
                <option value="5500">5500 دولار</option>
                <option value="6000">6000 دولار</option>
                <option value="6500">6500 دولار</option>
                <option value="7000">7000 دولار</option>
                <option value="7400">7400 دولار</option>
            </select>
            <div class="error-message" id="amount-error"></div>
        </div>

        <!-- حقل اسم المرسل -->
        <div>
            <label for="sender-name">اسم المرسل</label>
            <input type="text" id="sender-name" placeholder="اسم المرسل">
            <div class="error-message" id="sender-name-error"></div>
        </div>

        <!-- حقل اسم المستلم -->
        <div>
            <label for="receiver-name">اسم المستلم</label>
            <input type="text" id="receiver-name" placeholder="اسم المستلم">
            <div class="error-message" id="receiver-name-error"></div>
        </div>

        <!-- حقل رقم الهاتف للمرسل -->
        <div>
            <label for="sender-phone">رقم الهاتف للمرسل</label>
            <input type="text" id="sender-phone" placeholder="+9647xxxxxxxxx">
            <div class="error-message" id="sender-phone-error"></div>
        </div>

        <!-- حقل رقم الهاتف للمستلم -->
        <div>
            <label for="receiver-phone">رقم الهاتف للمستلم</label>
            <input type="text" id="receiver-phone" placeholder="+9647xxxxxxxxx">
            <div class="error-message" id="receiver-phone-error"></div>
        </div>

        <!-- حقل جهة التحويل -->
        <div>
            <label for="transfer-location">جهة التحويل</label>
            <select id="transfer-location">
                <option value="بغداد">بغداد</option>
                <option value="البصرة">البصرة</option>
                <option value="النجف">النجف</option>
                <option value="اربيل">اربيل</option>
                <option value="ديالى">ديالى</option>
                <option value="الموصل">الموصل</option>
                <option value="الانبار">الانبار</option>
                <option value="سليمانية">سليمانية</option>
                <option value="الديوانية">الديوانية</option>
                <option value="ذي قار">ذي قار</option>
                <option value="دهوك">دهوك</option>
                <option value="بابل">بابل</option>
                <option value="ميسان">ميسان</option>
                <option value="كربلاء">كربلاء</option>
                <option value="كركوك">كركوك</option>
                <option value="المثنى">المثنى</option>
                <option value="واسط">واسط</option>
                <option value="صلاح الدين">صلاح الدين</option>
            </select>
            <div class="error-message" id="transfer-location-error"></div>
        </div>

        <!-- حقل سبب التحويل -->
        <div>
            <label for="transfer-reason">سبب التحويل</label>
            <select id="transfer-reason">
                <option value="هدية">هدية</option>
                <option value="مصاريف دراسية">مصاريف دراسية</option>
                <option value="تسديد إقساط">تسديد إقساط</option>
                <option value="دين">دين</option>
                <option value="علاج">علاج</option>
            </select>
            <div class="error-message" id="transfer-reason-error"></div>
        </div>

        <!-- حقل تعديل صورة جواز السفر أو البطاقة الموحدة -->
        <div>
            <label for="id-image">صورة جواز السفر أو البطاقة الموحدة للمستلم</label>
            <input type="file" id="id-image">
            <div class="error-message" id="id-image-error"></div>
        </div>

        <!-- زر حفظ التعديلات -->
        <button class="submit-button" id="save-btn">حفظ التعديلات</button>
    </div>
--}}

</x-main-layout>
