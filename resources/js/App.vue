<style>

#header {
    color: #0a53be;
}
h1{
     font-size:28pt;
     color: #0a53be;
 }
.image-container {
    width:260px;
    height:85px;
    text-align:center;
}
td {
    vertical-align: middle !important;
}
img {
    width:260px;
    height:85px;
    height:100%;
}

/* Landscape phones and portrait tablets */
@media (max-width: 767px) {
    h1{
        font-size:8pt;
        color: #0a53be;
    }
    button {
        font-size:8pt !important;
    }
    #header {
        color: #0a53be;
        font-size:8pt !important;
    }
    .image-container {
        width:72px !important;
        height:46px !important;
        text-align:center;
    }
    th {
        font-size:8pt !important;
    }
    td {
        vertical-align: middle !important;
        font-size:8pt !important;
    }
     img {
        width:72px !important;
        height:100% !important;
    }
    input{
        font-size:8pt !important;
    }
}

/* Portrait phones and smaller */
@media (max-width: 480px) {
    h1{
        font-size:8pt;
        color: #0a53be;
    }
    #header {
        color: #0a53be;
        font-size:8pt !important;
    }
    button {
        font-size:8pt !important;
    }
    .image-container {
        width:72px !important;
        height:46px !important;
        text-align:center;
    }
    th {
        font-size:8pt !important;
    }
    td {
        vertical-align: middle !important;
        font-size:8pt !important;
    }
     img {
        width:72px !important;
        height:100% !important;
    }
   input{
        font-size:8pt !important;
    }
}
</style>
<template>
    <div class="container">
        <div class="row">
            <div class="mt-4 col-md-12 col-lg-12">


                   <form>
                        <div class="row">

                            <div class="col">
                                <label id="header" for="exampleInputEmail1"><strong>Receiving Amount USD {{amount_received}}</strong></label>
                                <input type="number" v-model="amount" class="form-control" placeholder="Receiving Amount">
                            </div>
                            <div class="col">


                                <button  v-on:click="submit()" type="button" style="background: #0a53be" class="mt-4 btn btn-primary">COMPARE</button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        <hr class="mt-4"/>
        <div class="row">
            <div class="mt-4 col-md-12">
                <div class="panel-body">
                <div class="table-responsive">
                    <div class="text-center"><h1><strong>SOUTH AFRICA TO ZIMBABWE</strong></h1></div>

                    <table class="table table-responsive-sm" style="color:black">
                        <thead>
                        <tr>
                            <th  id="header" scope="col"></th>
                            <th  id="header" scope="col">ExchangeRate</th>
                            <th  id="header" scope="col">Charges</th>
                            <th  id="header" scope="col">MarkUp</th>
                            <th  id="header" scope="col">Pay</th>
                        </tr>
                        </thead>
                        <tbody v-for="item in remittance_list">

                        <tr v-if="item.company_rates_type==='SA'">
                            <td>
                                <a class="link-info" :href="item.company_website" target="_blank"> <img class="img-fluid" v-bind:src="item.company_logo"
                                /></a>
                            </td>
                            <td>{{ item.company_exchange_rate }}</td>
                            <td>{{ item.company_charges_rate }}</td>
                            <td>{{ item.company_mark_up*100 }}%</td>
                            <td>R{{ item.company_total }}</td>
                        </tr>

                        </tbody>
                    </table>

                </div>
                </div>

            </div>

            <div class="col-md-12">
                <div class="panel-body">
                <div class="table-responsive">
                    <div class="text-center"><h1><strong>UK TO ZIMBABWE</strong></h1></div>
                    <table class="table table-responsive-sm" style="color:black">
                        <thead>
                        <tr>
                            <th  id="header" scope="col"></th>
                            <th  id="header" scope="col">ExchangeRate</th>
                            <th  id="header" scope="col">Charges</th>
                            <th  id="header" scope="col">MarkUp</th>
                            <th  id="header" scope="col">Pay</th>
                        </tr>
                        </thead>
                        <tbody v-for="item in remittance_list">

                        <tr v-if="item.company_rates_type==='UK'">
                            <td>
                                <a class="link-info" :href="item.company_website" target="_blank">  <img class="img-fluid"  v-bind:src="item.company_logo"
                                /></a>
                            </td>
                            <td>{{ item.company_exchange_rate }}</td>
                            <td>{{ item.company_charges_rate }}</td>
                            <td>{{ item.company_mark_up*100 }}%</td>
                            <td>${{ item.company_total }}</td>
                        </tr>

                        </tbody>
                    </table>

                </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import api from './client'

export default {
    name: "Remittance Calculator",
    data() {
        return {
            remittance_list: [],
            amount: 0,
            amount_received: 0
        };
    },
    mounted() {
        console.log('Component mounted.')
        this.getData();
    },
    methods: {
        submit() {
            this.amount_received=this.amount;
            const headers = {
                Accept: "application/json"
            };
            api.post("https://api.diasporaguru.com/public/api/company-rates-receive/"+this.amount,  {headers})
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
