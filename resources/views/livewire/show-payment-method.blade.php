<div class="mx-4">
    @if($selected === 'cellphonePayment')
        <div class="flex flex-col md:flex-row md:justify-center gap-2 2xl:gap-44 mb-5">
            <div class="bg-gray-100 p-5">
                <div class="my-3">
                    <h3 class="font-bold text-xl uppercase">Cellphone payment information</h3>
                </div>
                <div>
                    <p class="text-lg leading-10">Bank: <span class="font-bold">xxxxxxxxxxx</span></p>
                    <P class="text-lg leading-10">Cellphone number: <span class="font-bold">xxx-xxxxx</span></p>
                    <p class="text-lg leading-10">Identification document: <span class="font-bold">xxxxxxxx</span></p>
                </div>
            </div>
            <div>
                <form action="{{route('payment.store', 'cellphone')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="border border-solid border-gray-300 p-3">
                        <legend class="font-bold text-xl uppercase my-2">Your payment information</legend>

                        <div class="flex flex-col xl:flex-row mb-2">
                            <label class="grow-0 md:p-2 text-lg" for="bank">Bank you transferred from: </label>
                            <input 
                                id="bank"
                                class="grow"
                                name="bank" 
                                type="text"
                                placeholder="Bank name"
                            >
                        </div>
    
                        <div class="flex flex-col xl:flex-row mb-2">
                            <label class="grow-0 md:p-2 text-lg" for="paymentNumber">Payment number: </label>
                            <input 
                                id="paymentNumber"
                                class="grow"
                                name="paymentNumber" 
                                type="number"
                                placeholder="Confirmation number"
                            >
                        </div>
    
                        <div class="flex flex-col xl:flex-row mb-2">
                            <label class="grow-0 md:p-2 text-lg" for="date">Payment date: </label>
                            <input 
                                id="date" 
                                class="grow"
                                name="date" 
                                type="date"
                            >
                        </div>

                        <div class="flex flex-col xl:flex-row mb-2">
                            <label class="grow-0 md:p-2 text-lg" for="date">Payment Voucher: </label>
                            <input 
                                id="voucher" 
                                name="voucher" 
                                type="file"
                                accept=".pdf,.jpg,.jpeg"
                            >
                        </div>
                    </fieldset>

                    <input 
                        type="submit" 
                        value="Submit"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                        uppercase font-bold w-full md:w-1/2  p-2 text-white rounded-lg mt-4"
                    >
                </form>
            </div>
        </div>
    @endif

    @if($selected === 'bankTransfer')
        <div class="flex flex-col md:flex-row md:justify-center gap-2 2xl:gap-44 mb-5">
            <div class="bg-gray-100 p-5">
                <div class="my-3">
                    <h3 class="font-bold text-xl uppercase">Bank transfer information</h3>
                </div>
                <div>
                    <p class="text-lg leading-10">Bank: <span class="font-bold">xxxxxxxxxxx</span></p>
                    <P class="text-lg leading-10">Type of account: <span class="font-bold">xxx-xxxxxxxxxx-xx</span></p>
                    <P class="text-lg leading-10">Account number: <span class="font-bold">xxx-xxxxx</span></p>
                    <p class="text-lg leading-10">Identification document: <span class="font-bold">xxxxxxxx</span></p>
                </div>
            </div>
            <div>
                <form action="{{route('payment.store', 'Bank')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="border border-solid border-gray-300 p-3">
                        <legend class="font-bold text-xl uppercase my-2">Your payment information</legend>

                        <div class="flex flex-col xl:flex-row mb-2">
                            <label class="grow-0 md:p-2 text-lg" for="bank">Bank you transferred from: </label>
                            <input 
                                id="bank"
                                class="grow"
                                name="bank" 
                                type="text"
                                placeholder="Bank name"
                            >
                        </div>

                        <div class="flex flex-col xl:flex-row mb-2">
                            <label class="grow-0 md:p-2 text-lg" for="paymentNumber">Payment number: </label>
                            <input 
                                id="paymentNumber"
                                class="grow"
                                name="paymentNumber" 
                                type="number"
                                placeholder="Confirmation number"
                            >
                        </div>

                        <div class="flex flex-col xl:flex-row mb-2">
                            <label class="grow-0 md:p-2 text-lg" for="date">Payment date: </label>
                            <input 
                                id="date" 
                                class="grow"
                                name="date" 
                                type="date"
                            >
                        </div>

                        <div class="flex flex-col xl:flex-row mb-2">
                            <label class="grow-0 md:p-2 text-lg" for="date">Payment Voucher: </label>
                            <input 
                                id="voucher" 
                                name="voucher" 
                                type="file"
                                accept=".pdf,.jpg,.jpeg"
                            >
                        </div>
                    </fieldset>

                    <input 
                        type="submit" 
                        value="Submit"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                        uppercase font-bold w-full md:w-1/2  p-2 text-white rounded-lg mt-4"
                    >
                </form>
            </div>
        </div>
    @endif

    @if($selected === 'paypal')
        <div class="md:my-6">
            <form action="{{route('paypal')}}" method="POST">
                @csrf
                <button class="w-full p-5 bg-sky-600 hover:bg-sky-700 rounded-lg uppercase text-white font-bold">Pay with Paypal</button>
            </form>
        </div>
    @endif
</div>
