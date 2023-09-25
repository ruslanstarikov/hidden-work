<div class="flex">

    <!-- Currency Converter Widget -->
    <div class="ml-4 w-64"> <!-- ml-4 is for margin-left, w-64 is the width of the widget -->
        <div class="bg-white p-4 rounded shadow-md">
            <h2 class="text-1xl font-extrabold text-gray-900">Bitcoin currency converter</h2>
            <form action="/convert" method="POST" hx-post="/convert" hx-target="#convertedAmount">
                @csrf
            <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
            <input id="amount" name="amount" type="number" class="mt-1 block w-full border-gray-300 rounded-md" placeholder="Enter amount in fiat">

            <label for="currency" class="block text-sm font-medium text-gray-700 mt-2">Currency</label>
            <select id="currency" name="currency" class="mt-1 block w-full border-gray-300 rounded-md">
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="GBP">GBP</option>
            </select>

            <button type="submit" id="convert" class="mt-2 px-4 py-2 bg-primary-600 text-white rounded-md" >
            Calculate
            </button>
            <div id="convertedAmount" class="mt-2 text-gray-700">

            </div>
            </form>
        </div>
    </div>
</div>
