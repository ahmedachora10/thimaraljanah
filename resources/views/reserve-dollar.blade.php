<x-main-layout title="نموذج حجز">

    @push('styles')
        <style>
            /* خطوط وتنسيقات أساسية */
            @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');

            body {
                font-family: 'Cairo', sans-serif;
                margin: 0;
                padding: 0;
                background: linear-gradient(120deg, #f6d365, #fda085);
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                color: #333;
            }

            .container {
                background: #fff;
                padding: 20px 30px;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                max-width: 600px;
                width: 100%;
                animation: fadeIn 1.5s ease-out;
            }

            h1 {
                text-align: center;
                font-size: 2rem;
                margin-bottom: 20px;
                color: #444;
            }

            .form-group {
                margin-bottom: 20px;
            }

            label {
                font-weight: bold;
                display: block;
                margin-bottom: 5px;
            }

            input,
            select,
            button {
                width: 100%;
                padding: 10px 15px;
                border: 2px solid #ddd;
                border-radius: 10px;
                font-size: 14px;
                outline: none;
                transition: all 0.3s ease;
            }

            input:focus,
            select:focus {
                border-color: #fda085;
                box-shadow: 0 0 10px rgba(253, 160, 133, 0.5);
            }

            button {
                background: linear-gradient(90deg, #ff9a9e, #fad0c4);
                color: white;
                font-weight: bold;
                border: none;
                cursor: pointer;
                text-transform: uppercase;
                font-size: 16px;
            }

            button:hover {
                background: linear-gradient(90deg, #fad0c4, #ff9a9e);
                transform: scale(1.05);
            }

            button:active {
                transform: scale(0.95);
            }

            .alert {
                background: rgba(255, 0, 0, 0.1);
                color: red;
                padding: 10px;
                border-radius: 10px;
                margin-bottom: 20px;
                display: none;
            }

            /* تأثيرات الرسوم المتحركة */
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @media (max-width: 768px) {
                body {
                    padding: 20px;
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#send-money-form').on('submit', function(e) {
                    e.preventDefault(); // Prevent the form from submitting normally


                        // Collect form data
                        let form = this;
                        let formData = new FormData(form);

                        // Make the AJAX request
                        $.ajax({
                            url: '{{ route("reserve-dollar-request.store") }}', // Update with the store route URL
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
                });
            });
        </script>
    @endpush

    <div class="container" style=" margin-top: 40rem;">
        <h1>نموذج الحجز</h1>
        <div id="alert" class="alert"></div>
        <form id="send-money-form" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="travelType">نوع السفر</label>
                <select id="travelType" name="travel_type" required>
                    <option value="">اختر نوع السفر</option>
                    <option value="سفر بري">سفر بري</option>
                    <option value="سفر طيران">سفر طيران</option>
                </select>
            </div>

            <div class="form-group">
                <label for="city">المحافظة</label>
                <select id="city" name="governorate" required>
                    <option value="">اختر المحافظة</option>
                    <option value="بغداد">بغداد</option>
                    <option value="البصرة">البصرة</option>
                    <option value="أربيل">أربيل</option>
                    <option value="النجف">النجف</option>
                </select>
            </div>

            <div class="form-group">
                <label for="receive_place">حدد مكان استلام الدولار</label>
                <select id="receive_place" name="receive_place" required>
                    <option value="بغداد - فروع المحافظات">بغداد - فروع المحافظات</option>
                    <option value="النجف - مطار">النجف - مطار</option>
                    <option value="النجف - فروع المحافظات">النجف - فروع المحافظات</option>
                    <option value="البصرة - مطار">البصرة - مطار</option>
                    <option value="البصرة - فروع المحافظات">البصرة - فروع المحافظات</option>
                    <option value="اربيل  - مطار ">اربيل - مطار </option>
                    <option value="السليمانية - مطار">السليمانية - مطار</option>
                    <option value="السليمانية - فروع المحافظات">السليمانية - فروع المحافظات</option>
                    <option value="مطار كركوك الدولي	">مطار كركوك الدولي </option>
                    <option value="مطار الموصل الدولي	">مطار الموصل الدولي </option>
                </select>
            </div>

            <div class="form-group">
                <label for="destination">جهة السفر</label>
                <input type="text" id="destination" name="destination" placeholder="جهة السفر" required>
            </div>

            <div class="form-group">
                <label for="travel_date">تاريخ السفر</label>
                <input type="date" id="travel_date" name="travel_date" placeholder="تاريخ السفر" required>
            </div>

            <div class="form-group">
                <label for="passport_expiry_date">تاريخ انتهاء الجواز</label>
                <input type="date" id="passport_expiry_date" name="passport_expiry_date"
                    placeholder="تاريخ انتهاء الجواز" required>
            </div>

            <div class="form-group">
                <label for="name">الاسم</label>
                <input type="text" id="name" name="name" placeholder="الاسم الثلاثي" required>
            </div>

            <div class="form-group">
                <label for="phone_number">رقم الهاتف</label>
                <input type="text" id="phone_number" name="phone_number" placeholder="رقم الهاتف" required>
            </div>
            <div class="form-group">
                <label for="passportPhoto">صورة الجواز</label>
                <input type="file" id="passportPhoto" name="passport_photo" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="ticket_photo"> صورة تذكرة السفر </label>
                <input type="file" id="ticket_photo" name="ticket_photo" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="card_front_photo">صورة البطاقة الموحدة من الامام</label>
                <input type="file" id="card_front_photo" name="card_front_photo" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="residence_card_front_photo">صورة بطاقة السكن من الامام</label>
                <input type="file" id="residence_card_front_photo" name="residence_card_front_photo" accept="image/*"
                    required>
            </div>
            <button type="submit">إرسال الطلب</button>
        </form>

        <div class="success-message secure-message" style="display: none">
            <p></p>
        </div>
    </div>
</x-main-layout>
