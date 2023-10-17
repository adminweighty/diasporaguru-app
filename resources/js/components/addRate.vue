<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Company Rate</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">

                                    <div class="row justify-content-center">
                                        <div class="mx-4 my-4">
                                            <p class="text-muted">
                                                <img class="img-responsive" :src="companyRate.company_logo">
                                            </p>
                                        </div>
                                    </div>
                                    <label>Logo Url</label>
                                    <input type="text" class="form-control" v-model="companyRate.company_logo" required>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Rates Type</label>
                                    <select name="selected" class="form-control" id="" v-model="companyRate.company_rates_type" required>
                                        <option value="SA">South Africa <i class="flag flag-south-africa"></i> to Zimbabwe <i
                                            class="flag flag-zimbabwe"></i></option>
                                        <option value="UK">United Kingdom <i class="flag flag-united-kingdom"></i> to Zimbabwe
                                            <i class="flag flag-zimbabwe"></i></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="companyRate.company_name" required>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Exchange Rate</label>
                                    <input type="text" class="form-control" v-model="companyRate.company_exchange_rate" required>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Charges</label>
                                    <input type="text" class="form-control" v-model="companyRate.company_charges_rate" required>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Mark Up / 100</label>
                                    <input type="text" class="form-control" v-model="companyRate.company_mark_up" required>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Website url</label>
                                    <input type="text" class="form-control" v-model="companyRate.company_website" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import api from '../client'
export default {
    name:"add-company-rate",
    data(){
        return {
            companyRate:{
                company_logo:"",
                company_rates_type:"",
                company_name:"",
                company_exchange_rate:0,
                company_charges_rate:0,
                company_mark_up:0,
                company_total:0,
                company_website:""
            }
        }
    },
    methods:{
        async create(){
            await api.post('https://api.diasporaguru.com/public/api/company-rates-crud',this.companyRate).then(response=>{
                this.$router.push({name:"companyRateList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>
