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
    <div class="row">
        <div class="col-12 mb-2 text-start">
            <router-link :to='{name:"categoryAdd"}' class="btn btn-primary">Create Rate</router-link>
        </div>
        <div class="row" v-for="(item,key) in companyRates" :key="key">
            <div class="col-md-10">
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
                                <router-link :to='{name:"categoryEdit",params:{id:item.id}}' class="btn btn-success">Edit</router-link>
                                <button type="button" @click="deleteCategory(item.id)" class="btn btn-danger">Delete</button>

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
    </div>
</template>

<script>
import api from '../client'
import moment from 'moment';

export default {
    name:"companyRates",
    data(){
        return {
            companyRates:[],
            amount: 0,
            selected: 'SA',
            amount_received: 0
        }
    },
    mounted(){
        this.getcompanyRates()
    },
    methods:{
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
                    this.companyRates = res.data.rates;
                    }
                ).catch(error => {
                console.log(error);

            });
        },
        async getcompanyRates(){
            await api.get('/company-rates-crud').then(response=>{
                this.companyRates = response.data
            }).catch(error=>{
                console.log(error)
                this.companyRates = []
            })
        },
        deleteCategory(id){
            if(confirm("Are you sure to delete this category ?")){
                api.delete(`/company-rates-crud/${id}`).then(response=>{
                    this.getcompanyRates()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>
