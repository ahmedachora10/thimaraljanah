<x-main-layout title="بيع العملات الرقمية">
    @push('styles')
        <style>
            body {
                font-family: Arial, sans-serif;
                direction: rtl;
                background-color: #001f3d;
                /* خلفية زرقاء داكنة */
                color: #fff;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 1200px;
                margin: 50px auto;
                padding: 20px;
                background-color: #1e2a47;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            h1 {
                text-align: center;
                color: #4CAF50;
            }

            .currency-container {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
            }

            .currency-card {
                border: 1px solid #444;
                border-radius: 8px;
                padding: 15px;
                background-color: #2a3b5c;
                text-align: center;
                color: #fff;
                transition: transform 0.3s ease;
            }

            .currency-card:hover {
                transform: scale(1.05);
            }

            .currency-card img {
                width: 50px;
                height: 50px;
                margin-bottom: 10px;
            }

            .currency-card h3 {
                margin: 10px 0;
            }

            .currency-card p {
                font-size: 16px;
                color: #ddd;
            }

            .currency-card .price {
                font-size: 20px;
                font-weight: bold;
                color: #28a745;
            }

            .currency-card .percentage {
                font-size: 14px;
                color: #ff6347;
            }

            .error-message {
                color: red;
                text-align: center;
                margin-top: 20px;
            }

            .loader {
                text-align: center;
                font-size: 18px;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            const apiUrl = 'https://api.coingecko.com/api/v3/simple/price';
            const currencyIds = ['bitcoin', 'ethereum', 'litecoin', 'ripple', 'cardano', 'polkadot', 'binancecoin', 'solana', 'dogecoin', 'shiba-inu', 'avalanche-2', 'polygon', 'uniswap', 'wrapped-bitcoin', 'chainlink', 'ethereum-classic', 'terra-luna', 'stellar', 'tron', 'vechain'];

            async function fetchCurrencyPrices() {
                const currencies = currencyIds.join(',');
                const url = `${apiUrl}?ids=${currencies}&vs_currencies=usd&include_24hr_change=true`;

                try {
                    const response = await fetch(url);
                    if (!response.ok) {
                        throw new Error('فشل في جلب البيانات من API');
                    }
                    const data = await response.json();
                    renderCurrencies(data);
                } catch (error) {
                    document.getElementById('error-message').innerText = 'حدث خطأ أثناء جلب البيانات، يرجى المحاولة لاحقًا.';
                    console.error('Error fetching currency prices:', error);
                } finally {
                    document.getElementById('loader').style.display = 'none';
                }
            }

            function renderCurrencies(data) {
                const container = document.getElementById('currency-container');
                Object.keys(data).forEach(currency => {
                    const currencyData = data[currency];
                    const card = document.createElement('div');
                    card.className = 'currency-card';

                    console.log(data);


                    // بناء رابط الصورة باستخدام معرف العملة
                    const imageUrl = `https://assets.coingecko.com/coins/images/${currencyData.usd}/large/${currency}.png`;

                    card.innerHTML = `
                        <img src="${imageUrl}" alt="${currency}">
                        <h3>${currency.charAt(0).toUpperCase() + currency.slice(1)}</h3>
                        <p class="price">$${currencyData.usd.toFixed(2)}</p>
                        <p class="percentage">${currencyData.usd_24h_change.toFixed(2)}% في آخر 24 ساعة</p>
                    `;
                    container.appendChild(card);
                });
            }

            // Call the function on page load
            fetchCurrencyPrices();
        </script>
    @endpush

    <div class="container">
        <h1>أسعار العملات الرقمية بالدولار الأمريكي</h1>
        <div class="loader" id="loader">جارٍ تحميل البيانات...</div>
        <div class="currency-container" id="currency-container"></div>
        <div class="error-message" id="error-message"></div>
    </div>

        <div class="success-message secure-message" style="display: none">
            <p></p>
        </div>

</x-main-layout>
