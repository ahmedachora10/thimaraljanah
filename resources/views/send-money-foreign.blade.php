<x-main-layout title="إرسال الأموال إلى الخارج | شركة ثمار الجنة للصرافة">

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

                const country = document.getElementById('country');
                const amount = document.getElementById('amount');
                const source = document.getElementById('source_of_funds');
                const purpose = document.getElementById('transaction_purpose');
                const bankAccount = document.getElementById('bank-account');
                const paymentMethod = document.getElementById('payment_method');
                const paymentReceipt = document.getElementById('payment-receipt');

                if (country.value === "") {
                    document.getElementById('country-error').textContent = 'يرجى اختيار البلد';
                    isValid = false;
                }

                if (amount.value === "") {
                    document.getElementById('amount-error').textContent = 'يرجى اختيار المبلغ';
                    isValid = false;
                }

                if (source.value === "") {
                    document.getElementById('source_of_funds-error').textContent = 'يرجى اختيار مصدر الأموال';
                    isValid = false;
                }

                if (purpose.value === "") {
                    document.getElementById('transaction_purpose-error').textContent = 'يرجى اختيار الغرض';
                    isValid = false;
                }

                if (paymentMethod.value === "") {
                    document.getElementById('payment_method-error').textContent = 'يرجى اختيار طريقة الدفع';
                    isValid = false;
                }

                if (!paymentReceipt.files.length) {
                    document.getElementById('payment-receipt-error').textContent = 'يرجى إرفاق صورة التحويل';
                    isValid = false;
                }

                return isValid;
            }

            // التحقق من اختيار طريقة الدفع لعرض معلومات الدفع
            document.getElementById('payment_method').addEventListener('change', function() {
                const paymentInfo = document.getElementById('payment-info');
                if (this.value !== "") {
                    paymentInfo.style.display = 'block';
                } else {
                    paymentInfo.style.display = 'none';
                }
            });

            // إرسال البيانات بعد التحقق
            // document.getElementById('submit-btn').addEventListener('click', function() {
            $(document).ready(function() {
                $('#send-money-form').on('submit', function(e) {
                    e.preventDefault(); // Prevent the form from submitting normally
                    if (validateForm()) {

                        // Collect form data
                        let form = this;
                        let formData = new FormData(form);

                        // Make the AJAX request
                        $.ajax({
                            url: '{{ route('send-money-out.store') }}', // Update with the store route URL
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
                                        'backgroundColor' : 'green',
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

    <!-- الشريط العلوي -->
    <div class="navbar">
        <div class="logo">
            <a href="{{route('home')}}" style="color: inherit; text-decoration:none">
                شركة ثمار الجنة للصرافة
            </a>
        </div>
    </div>

    <!-- نموذج إرسال الأموال إلى الخارج -->
    <form class="form-container" id="send-money-form" method="POST" enctype="multipart/form-data">
        <!-- حقل اختيار البلد -->
        <div>
            <label for="country">بلد الوجهة</label>
            <select id="country" name="country" required>
                <option value="">اختر البلد</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cabo Verde">Cabo Verde</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Eswatini">Eswatini</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Greece">Greece</option>
                <option value="Grenada">Grenada</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-Bissau">Guinea-Bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Honduras">Honduras</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Libya">Libya</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Malta">Malta</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mexico">Mexico</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Panama">Panama</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Qatar">Qatar</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Singapore">Singapore</option>
                <option value="South Korea">South Korea</option>
                <option value="South Africa">South Africa</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
            <div class="error-message" id="country-error"></div>
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

        <!-- حقل مصدر الأموال -->
        <div>
            <label for="source_of_funds">مصدر الأموال</label>
            <select id="source_of_funds" name="source_of_funds" required>
                <option value="">اختر مصدر الأموال</option>
                <option value="loan">الأموال المقترضة</option>
                <option value="gift">هدية</option>
                <option value="inheritance">ميراث</option>
                <option value="salary">راتب</option>
                <option value="business">أعمال تجارية</option>
            </select>
            <div class="error-message" id="source_of_funds-error"></div>
        </div>

        <!-- حقل الغرض من المعاملة -->
        <div>
            <label for="transaction_purpose">الغرض من المعاملة</label>
            <select id="transaction_purpose" name="transaction_purpose" required>
                <option value="">اختر الغرض</option>
                <option value="gift">هدية</option>
                <option value="education">مصاريف دراسية</option>
                <option value="installment">تسديد إقساط</option>
                <option value="debt">دين</option>
            </select>
            <div class="error-message" id="transaction_purpose-error"></div>
        </div>

        <!-- حقل رقم الحساب المصرفي -->
        <div>
            <label for="bank-account">معلومات الحساب المصرفي (إذا اخترت التحويل إلى حساب مصرفي)</label>
            <input type="text" id="bank-account" name="account_info" placeholder="رقم الحساب المصرفي" required>
            <div class="error-message" id="bank-account-error"></div>
        </div>

        <!-- حقل طريقة الدفع -->
        <div>
            <label for="payment_method">طريقة الدفع</label>
            <select id="payment_method" required name="payment_method">
                <option value="">اختر طريقة الدفع</option>
                <option value="zen-cash">زين كاش</option>
                <option value="mastercard">ماستر كارد</option>
            </select>
            <div class="error-message" id="payment_method-error"></div>
        </div>

        <!-- حقل رقم زين كاش أو ماستر كارد الخاصة بك -->
        <div id="payment-info" class="payment-info" style="display: none;">
            <p><strong>رقم زين كاش الخاص بي: 123456789</strong></p>
            <p><strong>رقم ماستر كارد الخاص بي: 987654321</strong></p>
        </div>

        <!-- حقل إرفاق صورة التحويل -->
        <div>
            <label for="payment-receipt">أرفق صورة الإيصال</label>
            <input type="file" id="payment-receipt" name="attachment" required>
            <div class="error-message" id="payment-receipt-error"></div>
        </div>

        <!-- حقل الشروط والأحكام -->
        <div class="checkbox-container">
            <input type="checkbox" id="terms" required>
            <label for="terms">أوافق على الشروط والأحكام</label>
        </div>

        <button class="submit-button" type="submit" id="submit-btn">إرسال الأموال</button>
    </form>

    <div class="success-message secure-message" style="display: none">
        <p></p>
    </div>
    <div class="secure-message">
        <p>ملاحظة: لضمان أمان المعاملات، تأكد من إدخال جميع البيانات بشكل صحيح.</p>
    </div>

</x-main-layout>
