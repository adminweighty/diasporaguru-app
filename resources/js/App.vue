<style>

#header {
    color: #0a53be;
}

h1 {
    font-size: 28pt;
    color: #0a53be;
}


img {
    width: 260px;
    height: 125px;
    height: 100%;
}

.bs-linebreak {
    height: 48px;
}

</style>
<template>
    <div class="container">
        <div class="row">
            <div class="mt-4 col-md-12 col-lg-12">

                <form>
                    <div class="row">
                        <div class="col">
                            <label id="header" for="exampleInputEmail1"><strong>Select Countries </strong></label>
                            <select name="selected" class="form-control" id="" v-model="selected">
                                <option value="SA">South Africa <i class="flag flag-south-africa"></i> to Zimbabwe <i
                                    class="flag flag-zimbabwe"></i></option>
                                <option value="UK">United Kingdom <i class="flag flag-united-kingdom"></i> to Zimbabwe
                                    <i class="flag flag-zimbabwe"></i></option>
                            </select>
                        </div>
                        <div class="col">
                            <label id="header" for="exampleInputEmail1"><strong>Receiving USD </strong></label>
                            <input type="number" v-model="amount" class="form-control" placeholder="Receiving Amount">
                        </div>
                        <div class="col">


                            <button v-on:click="submit()" type="button" style="background: #0a53be"
                                    class="mt-4 btn btn-primary">COMPARE
                            </button>

                        </div>
                    </div>
                </form>

            </div>
        </div>
        <hr class="mt-4"/>
        <div class="row" v-for="item in remittance_list">
            <div class="col-md-10" v-if="item.company_rates_type===selected">
                <div class="card-body px-0 py-0">
                    <div class="row" style="box-shadow: 0px 0px 10px 1px #aaaaaa !important;">
                        <div class="col-md-8 py-2" style="background-color: white;">
                            <div class="mx-4 my-4">
                                <p class="text-muted"><img class="img-responsive" :src="item.company_logo"></p>
                                <p class="text-uppercase text-primary mb-0 new-section" style="font-size: 13px !important;"
                                   v-if="item.company_rates_type==='SA'"><strong>SOUTH AFRICA<i
                                    class="flag flag-south-africa"></i>TO ZIMBABWE<i
                                    class="flag flag-zimbabwe"></i></strong>
                                    <span class="line-pricing"></span></p>

                                <p class="text-uppercase text-primary mb-0 new-section" style="font-size: 13px !important;"
                                   v-if="item.company_rates_type==='UK'"><strong>United Kingdom <i
                                    class="flag flag-united-kingdom"></i>TO ZIMBABWE<i class="flag flag-zimbabwe"></i></strong>

                                    <span class="line-pricing"></span></p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <ol class="list-unstyled mb-0 pt-0 pb-0">
                                            <p class="my-3 fw-bold text-muted text-center">
                                            </p>
                                            <li class="mb-3" v-if="item.company_rates_type==='SA'">
                                                <i class="fas fa-check text-success me-3"></i><small>Exchange Rate -
                                                R{{ item.company_exchange_rate }}</small>
                                            </li>
                                            <li class="mb-3" v-if="item.company_rates_type==='SA'">
                                                <i class="fas fa-check text-success me-3"></i><small>Charges -
                                                R{{ item.company_charges_rate }}</small>
                                            </li>
                                            <li class="mb-3" v-if="item.company_rates_type==='UK'">
                                                <i class="fas fa-check text-success me-3"></i><small>Exchange Rate -
                                                £{{ item.company_exchange_rate }}</small>
                                            </li>
                                            <li class="mb-3" v-if="item.company_rates_type==='UK'">
                                                <i class="fas fa-check text-success me-3"></i><small>Charges -
                                                £{{ item.company_charges_rate }}</small>
                                            </li>
                                        </ol>
                                    </div>
                                    <div class="col-md-6">
                                        <ol class="list-unstyled mb-0 pt-0 pb-0">
                                            <p class="my-3 fw-bold text-muted text-center">
                                            </p>
                                            <li class="mb-3">
                                                <i class="fas fa-check text-success me-3"></i><small>Mark Up -
                                                {{ item.company_mark_up * 100 }}%</small>
                                            </li>
                                            <li class="mb-3">
                                                <i class="fas fa-check text-success me-3"></i><small>Updated -
                                                {{ format_date(item.updated_at) }}</small>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center"
                             style="background-color:#F9FAFB ; box-shadow: 0px 0px 10px 1px #aaaaaa;">
                            <div class=" mt-5 pt-4 me-4">
                                <p class="h5">Sender will pay</p>
                                <p v-if="item.company_rates_type==='UK'" class="h2 fw-bold text-black"
                                   style="font-size: 40px;">£{{ item.company_total }} <small class="text-muted"
                                                                                             style="font-size: 15px;">GBP</small>
                                </p>
                                <p v-if="item.company_rates_type==='SA'" class="h2 fw-bold text-black"
                                   style="font-size: 40px;">R{{ item.company_total }} <small class="text-muted"
                                                                                             style="font-size: 15px;">ZAR</small>
                                </p>
                                <p class="text-decoration-underline text-black-50 " style="font-size: 15px;"><strong>Recipient will receive
                                    ${{
                                        amount_received
                                    }} USD</strong>
                                </p>

                                <p class="text-decoration-underline text-black-50 " style="font-size: 15px;">Learn more
                                    about the company</p>
                                <a :href="item.company_website" style="background: #0a53be" target="_blank"
                                   class="btn btn-dark d-block mb-2 mt-3 text-capitalize">Visit site</a>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 bs-linebreak">
                    <hr/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mt-4 col-md-12 col-lg-12">

                <h2>Price Comparison Disclaimer</h2>
                <p>
                    Our price comparison tool, Diasporaguru, enables you to compare the total cost of international transfers between various providers. We consider the complete expenses involved, including exchange rates and transfer fees
                </p>
                <h2>What are the costs of sending a transfer?</h2>
                <p>
                    The cost of a transfer typically consists of two main components: the exchange rate and the transfer fee.
                    <br/><br/>
                    <strong>Exchange rate</strong>: When sending money internationally, there are usually two currencies involved, the one you use to pay and the one the recipient receives. Thus, international transfers often include an exchange rate. The difference between this rate and the market rate (such as the one found on Google) is known as the "markup". Some providers transparently display this markup alongside the exchange rate, while others incorporate it within the rate itself.
                    <br/><br/>
                    <strong>Transfer fee</strong>: This fee is charged by the provider for the transfer, usually comprising a fixed fee and a variable fee based on the transfer amount, after the currency exchange has taken place.
                    <br/><br/>
                    Please note that the comparison table may not include fees imposed by the receiving bank or correspondent banks for international transfers. As we do not have visibility over these additional fees, they are not reflected in the comparison table.
                </p>
                <h2>How is this data collected?</h2>
                <p>
                    We obtain providers' data by directly collecting publicly available transfer costs from their websites or by simulating transactions as if we were customers using their remittance services. It's important to note that we gather data based on various transfer amount thresholds (e.g., US$100, US$500, US$1000) rather than specific amounts.
                   <br/><br/>
                   While we make every effort to provide accurate and reliable information through our widget, it's important to note that the data is not updated in real-time. We strive to update it regularly, typically on a daily basis. Therefore, we cannot guarantee that the information is always 100% accurate, complete, or up to date at any given moment. Additionally, since we collect data using thresholds rather than precise amounts, the total cost displayed in our comparison table may differ from the cost stated on the provider's website.
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import api from './client'
import moment from 'moment';

export default {
    name: "Remittance Calculator",
    data() {
        return {
            remittance_list: [],
            amount: 0,
            selected: 'SA',
            amount_received: 0
        };
    },
    mounted() {
        console.log('Component mounted.')
        this.getData();
    },
    methods: {
        format_date(value) {
            if (value) {
                return moment(String(value)).format('DD MMMM YYYY')
            }
        },
        submit() {
            this.amount_received = this.amount;
            const headers = {
                Accept: "application/json"
            };
            api.post("https://api.diasporaguru.com/public/api/company-rates-receive/" + this.amount, {headers})
                .then(res => {
                        console.log(res.data.rates)
                        this.remittance_list = res.data.rates;
                    }
                ).catch(error => {
                console.log(error);

            });
        },
        getData() {
            const headers = {
                Accept: "application/json"
            };
            api.get("https://api.diasporaguru.com/public/api/company-rates", {headers})
                .then(res => {
                        console.log(res.data.rates)
                        this.remittance_list = res.data.rates;
                    }
                ).catch(error => {
                console.log(error);

            });
        },

    }
}
</script>
